<?php
/**
 * 系统安装 索引文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	install
 */
require_once('config/config.inc.php');

$objWebInit = new ArthurXF();
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
if(is_file(__WEB_ROOT.'/data/install.lock')) check::AlertExit('BIWEB网站系统已经安装,请勿重复安装！',-1);
$_GET['step'] = $_GET['step'] ? $_GET['step'] : '1' ;
if($_GET['step']==1){
	$_SESSION['session_test'] = 1;
	$arrMOutput["smarty_assign"]['step'] = 1;
	$arrMOutput["smarty_assign"]['info'] = '阅读版权协议';
	$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'step1.html';
	$arrMOutput['smarty_assign']['Title'] =  $arrMOutput["smarty_assign"]['info'].' - BIWEB WMS安装第一步';
}elseif($_GET['step']==2){
	$arrMOutput["smarty_assign"]['step'] = 2;
	$arrMOutput["smarty_assign"]['info'] = '阅读安装说明';
	$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'step2.html';
	$arrMOutput['smarty_assign']['Title'] =  $arrMOutput["smarty_assign"]['info'].' - BIWEB WMS安装第二步';
}elseif($_GET['step']==3){
	$arrDirs = array(
		'../data/'=>array('explain'=>'可写配置参数目录','popedom'=>'权限为 0777'),
		'../cache/'=>array('explain'=>'缓存存放目录连同下属所有目录','popedom'=>'权限为 0777'),
		'../html/'=>array('explain'=>'纯静态页面存放目录连同下属所有目录','popedom'=>'权限为 0777'),
		'../compile/'=>array('explain'=>'smarty模板编译目录','popedom'=>'权限为 0777'),
		'../uploadfile/'=>array('explain'=>'文件上传存放目录连同下属所有目录','popedom'=>'权限为 0777'),
		'../sitemap.xml'=>array('explain'=>'google sitemap文件','popedom'=>'权限为 0666'),
		'../templates'=>array('explain'=>'模板目录(所有子目录都要有写权限)','popedom'=>'权限为 0777'),
	);
	$intStop = 0;
	foreach($arrDirs as $k=>$v){
		if (is_writable($k)) {
			$arrDirs[$k]['writable'] = true;
		}else{
			$arrDirs[$k]['writable'] = false;
			$intStop = 1;
		}
	}
	$arrSysInfo = array();
	$arrSysInfo['os'] = PHP_OS;
	$arrSysInfo['php'] = PHP_VERSION;
	if(function_exists('mysql_connect')) $arrSysInfo['mysql'] = true;
	else{
		$arrSysInfo['mysql'] = false;
		$intStop = 1;
	}
	foreach(get_loaded_extensions() as $key=>$value){
		if($value == 'PDO') $arrSysInfo['PDO'] = true;
		if($value == 'pdo_mysql') $arrSysInfo['pdo_mysql'] = true;
		if($value == 'gd') $arrSysInfo['GD'] = true;
	}
	if(empty($arrSysInfo['PDO']) || empty($arrSysInfo['pdo_mysql']) || empty($arrSysInfo['GD'])){
		$intStop = 1;
	}
	if(empty($_SESSION['session_test'])){
		$intStop = 1;
	}
	if(ini_get('allow_url_fopen')){
		$arrSysInfo['allow_url_fopen'] = true;

		if(file_get_contents('http://www.baidu.com')){
			$arrSysInfo['file_get_contents'] = true;
		}else{
			$arrSysInfo['file_get_contents'] = false;
		}
	}else{
		$arrSysInfo['allow_url_fopen'] = false;
		$arrSysInfo['file_get_contents'] = false;
	}


	$arrSysInfo['upload'] = ini_get("upload_max_filesize");

	$arrMOutput['smarty_assign']['arrSysInfo'] = $arrSysInfo;
	$arrMOutput['smarty_assign']['arrDirs'] = $arrDirs;
	$arrMOutput['smarty_assign']['intStop'] = $intStop;
	$arrMOutput["smarty_assign"]['step'] = 3;
	$arrMOutput["smarty_assign"]['info'] = '检查系统环境';
	$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'step3.html';
	$arrMOutput['smarty_assign']['Title'] = $arrMOutput["smarty_assign"]['info'].' - BIWEB WMS安装第三步';
}elseif($_GET['step']==4){
	$arrMOutput["smarty_assign"]['step'] = 4;
	$arrMOutput["smarty_assign"]['info'] = '设置数据库及管理员信息';
	$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'step4.html';
	$arrMOutput['smarty_assign']['Title'] = $arrMOutput["smarty_assign"]['info'].' - BIWEB WMS安装第四步';
}elseif($_GET['step']==5){
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty($_POST['db_host'])||empty($_POST['db_port'])||empty($_POST['db_user'])||empty($_POST['db_name'])){
			check::AlertExit("错误：数据库地址、端口、用户名和库名信息必须填写!",-1);
		}
		if(empty($_POST['password'])||empty($_POST['user_name'])||empty($_POST['real_name'])||empty($_POST['email'])) check::AlertExit("错误：管理员的信息必须全部填写!",-1);
		if($_POST['password'] != $_POST['password_c']) check::AlertExit("错误：两次输入的密码不相同!",-1);
		$_SESSION['user_name'] = $_POST['user_name'];
		$_SESSION['real_name'] = $_POST['real_name'];
		$_SESSION['email'] = $_POST['email'];
		if(!empty($_POST['user_pass_type']) && $_POST['user_pass_type'])
			$_SESSION['password'] = check::strEncryption($_POST['password'],$_POST['jamstr']);
		else
			$_SESSION['password'] = $_POST['password'];
		$_SESSION['install_type'] = $_POST['install_type'];
		$_SESSION['user_pass_type'] = $_POST['user_pass_type'];
		$_SESSION['jamstr'] = $_POST['jamstr'];
		unset($_POST['user_name']);
		unset($_POST['real_name']);
		unset($_POST['email']);
		unset($_POST['password']);
		unset($_POST['password_c']);
		unset($_POST['install_type']);
		unset($_POST['biweb']);

		unset($arrGWeb);
		$strFilename = '../data/webconfig.inc.php';
		include($strFilename);
		foreach($_POST as $k=>$v){
			$arrGWeb[$k] = $v;
		}
		if(ini_get('allow_url_fopen') && file_get_contents('http://www.baidu.com')){
			$arrGWeb['is_file_static'] = '1';
		}else{
			$arrGWeb['is_file_static'] = '0';
		}
		$somecontent = '<?php' . "\n" . '$arrGWeb = ' . var_export( $arrGWeb, true ) . ';' . "\n" . '$arrGMeta = ' . var_export( $arrGMeta, true ) . ';' . "\n" . '?>';

		// 首先我们要确定文件存在并且可写。
		if (is_writable($strFilename)) {

			if (!$handle = fopen($strFilename, 'w')) {
				 check::AlertExit("错误：不能打开文件 $strFilename !",-1);
			}

			// 将$somecontent写入到我们打开的文件中。
			if (fwrite($handle, $somecontent) === FALSE) {
				check::AlertExit("错误：不能写入到文件 $strFilename !",-1);
			}
			fclose($handle);
		} else {
			check::AlertExit("错误：文件 $strFilename 不可写!",-1);
		}
	}elseif(empty($arrGPdoDB['db_name']) || empty($arrGPdoDB['db_user'])){
		check::AlertExit("错误：数据库名和数据库用户名必须填写!",-1);
	}

	$arrTreeDirs = array();
	check::mapTreeDirs('../',false,false);

	$arrModuleDirs = array();
	foreach($arrTreeDirs as $k => $v){
		if(in_array($v,array('useradmin','uploadfile','templates','plug-in','html','data','config','compile','cache',substr(__WEBADMIN_ROOT,1),'install'))){
			continue;
		}
		if(!is_dir('../'.$v.'/config')) continue;

		if(in_array($v,array('wap','user','rss','links','guest','archives'))){
			$arrModuleDirs[$k]['state'] = 2;
		}else $arrModuleDirs[$k]['state'] = 0;
		$arrModuleDirs[$k]['id'] = $v;
		@include('../'.$v.'/config/var.inc.php');
		$arrModuleDirs[$k]['name'] = $arrGWeb['module_name'];

	}
	$arrMOutput["smarty_assign"]['arrModuleDirs'] = $arrModuleDirs;
	$arrMOutput["smarty_assign"]['step'] = 5;
	$arrMOutput["smarty_assign"]['info'] = '选择需要安装的栏目';
	$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'step5.html';
	$arrMOutput['smarty_assign']['Title'] = $arrMOutput["smarty_assign"]['info'].' - BIWEB WMS安装第五步';
}elseif($_GET['step']==6){
	//数据库连接参数
	$objWebInit->setDBG($arrGPdoDB);
	$objWebInit->db();

	$charset = str_replace('-', '', $arrGWeb['charset']);
	$extend = $objWebInit->db->getAttribute(PDO::ATTR_SERVER_VERSION) > '4.1' ? " DEFAULT CHARSET={$charset} " : "";

	//写入频道数组
	$strWEB_ROOT_pre = $arrGWeb['WEB_ROOT_pre'];
	unset($arrGWeb);
	$strFilename = __WEB_ROOT.'/data/webconfig.inc.php';
	@include($strFilename);
	if(!is_file(__WEB_ROOT.'/data/install.lock')){
		$arrGMeta = array();
		$arrGMeta['index']['name'] = '网站首页';
		$arrGMeta['index']['meta'] = array(
										  'Title' => '',
										  'Description' => '',
										  'Keywords' => '',
										);
		$arrGMeta['user']['name'] = '用户系统';
		$arrGMeta['user']['admin'] = array(
											array ('href' => '../user/admin/',
												   'name' => '网站会员管理',)
											);
		$arrGMeta['user']['meta'] = array(
										  'Title' => $arrGMeta['user']['name'],
										  'Description' => $arrGMeta['user']['name'],
										  'Keywords' => $arrGMeta['user']['name'],
										);
		$arrGMeta['links']['name'] = '友情链接';
		$arrGMeta['links']['admin'] = array(
											array ('href' => '../links/admin/',
												   'name' => '友情链接管理',)
											);
		$arrGMeta['links']['meta'] = array(
										  'Title' => $arrGMeta['links']['name'],
										  'Description' => $arrGMeta['links']['name'],
										  'Keywords' => $arrGMeta['links']['name'],
										);
		$arrGWeb['templates_id'] = '1';
		$arrGWeb['smarty_caching'] = '0';
		$arrGWeb['smarty_cache_lifetime'] = '7200';
		$arrGWeb['SquidTime'] = '0';
		$arrGWeb['PDO_CACHE'] = '0';
		$arrGWeb['PDO_CACHE_LIFETIME'] = '7200';
		$arrGWeb['FileExt_state'] = '0';
		$arrGWeb['URL_static'] = '1';
		$arrGWeb['file_suffix'] = '.html';
		$arrGWeb['file_static'] = '0';
		$arrGWeb['name'] = 'BIWEB WMS SEO效果最好的网站管理系统';
		$arrGWeb['host'] = 'www.biweb.cn';
		$arrGWeb['company'] = '上海网务网络信息有限公司';

		$somecontent = '<?php' . "\n" . '$arrGWeb = ' . var_export( $arrGWeb, true ) . ';' . "\n" . '$arrGMeta = ' . var_export( $arrGMeta, true ) . ';' . "\n" . '?>';

		if (!$handle = fopen($strFilename, 'w')) {
			 check::AlertExit("错误：不能打开文件 $strFilename !",-1);
		}

		// 将$somecontent写入到我们打开的文件中。
		if (fwrite($handle, $somecontent) === FALSE) {
			check::AlertExit("错误：不能写入到文件 $strFilename !",-1);
		}
		fclose($handle);

	}else check::AlertExit('BIWEB网站系统已经安装,请勿重复安装！',-1);

	//sql语句
	if(in_array('ads',$_POST)){
		if($_SESSION['install_type']) $sql[] = "DROP TABLE IF EXISTS `".$arrGPdoDB['db_tablepre']."ads`;";
		$sql[] = "CREATE TABLE IF NOT EXISTS `".$arrGPdoDB['db_tablepre']."ads` (
		  `id` int(10) NOT NULL auto_increment,
		  `user_id` mediumint(10) unsigned NOT NULL,
		  `position` tinyint(1) NOT NULL default '0' COMMENT '广告位置',
		  `structon_tb` text,
		  `submit_date` datetime NOT NULL default '0000-00-00 00:00:00',
		  `deadline_date` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '到期时间',
		  `height` smallint(5) NOT NULL default '0',
		  `width` smallint(5) NOT NULL default '0',
		  `pass` tinyint(1) NOT NULL default '1',
		  PRIMARY KEY  (`id`)
		) ENGINE=MyISAM  {$extend} COMMENT='图形广告表' ;";
	}

	if(in_array('textads',$_POST)){
		if($_SESSION['install_type']) $sql[] = "DROP TABLE IF EXISTS `".$arrGPdoDB['db_tablepre']."textads`;";
		$sql[] = "CREATE TABLE IF NOT EXISTS `".$arrGPdoDB['db_tablepre']."textads` (
		  `id` int(10) NOT NULL auto_increment,
		  `user_id` int(10) default NULL,
		  `position` tinyint(1) NOT NULL default '0' COMMENT '广告位置',
		  `structon_tb` text,
		  `submit_date` datetime NOT NULL default '0000-00-00 00:00:00',
		  `deadline_date` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '到期时间',
		  `pass` tinyint(1) NOT NULL default '1',
		  PRIMARY KEY  (`id`)
		) ENGINE=MyISAM  {$extend} COMMENT='文字广告表' ;";
	}

	if($_SESSION['install_type']) $sql[] = "DROP TABLE IF EXISTS `".$arrGPdoDB['db_tablepre']."links`;";
	$sql[] = "CREATE TABLE IF NOT EXISTS `".$arrGPdoDB['db_tablepre']."links` (
	  `id` int(10) unsigned NOT NULL auto_increment,
	  `type_id` tinyint(1) NOT NULL default '0',
	  `user_id` int(10) unsigned NOT NULL,
	  `structon_tb` text,
	  `submit_date` datetime NOT NULL default '0000-00-00 00:00:00',
	  `picflag` tinyint(1) NOT NULL default '1' COMMENT '图片链接',
	  `flag` tinyint(1) NOT NULL default '1' COMMENT '显示位置',
	  `pass` tinyint(1) NOT NULL default '1',
	  PRIMARY KEY  (`id`),
	  KEY `submit_date` (`submit_date`)
	) ENGINE=MyISAM {$extend} COMMENT='友情链接表' ;";
	$sql[] = "INSERT INTO `".$arrGPdoDB['db_tablepre']."links` VALUES ('', 1, 1, 'array (\n  ''webname'' => ''BIWEB WMS'',\n  ''webhost'' => ''http://www.biweb.cn'',\n  ''summary'' => ''BIWEB商务智能网站管理系统'',\n  ''weblogo'' => '''',\n  ''width'' => '''',\n  ''height'' => '''',\n  ''UploadFile'' => '''',\n)', '2009-08-29 15:47:34', 1,1, 1);";
	$sql[] = "INSERT INTO `".$arrGPdoDB['db_tablepre']."links` VALUES ('', 1, 1, 'array (\n  ''webname'' => ''网务公司'',\n  ''webhost'' => ''http://www.bizeway.com'',\n  ''summary'' => ''上海网务网络信息有限公司'',\n  ''weblogo'' => '''',\n  ''width'' => '''',\n  ''height'' => '''',\n)', '2009-08-29 16:06:12',1, 1, 1);";


	if($_SESSION['install_type']) $sql[] = "DROP TABLE IF EXISTS `".$arrGPdoDB['db_tablepre']."archives`;";
	$sql[] = "CREATE TABLE IF NOT EXISTS `".$arrGPdoDB['db_tablepre']."archives` (
	  `id` varchar(30) NOT NULL default '',
	  `structon_tb` text,
	  PRIMARY KEY  (`id`)
	) ENGINE=MyISAM {$extend} COMMENT='单页栏目表' ;";


	foreach($sql as $val){
		try{
			$objWebInit->db->query($val);
		}catch(PDOException $e){
			$strMessage = $e->getMessage();
			echo $strMessage.'<br />';
			die($val);
		}
	}

	//各栏目安装
	if(!empty($_POST['install_module'])){
		$arrModule = $_POST['install_module'];
		$arrModule[] = 'user';
		foreach($arrModule as $v){
			$sql = array();
			include('../'.$v.'/install.php');
		}
	}

	file_put_contents(__WEB_ROOT.'/data/install.lock',1);
	unset($_SESSION['session_test']);
	include('config/config.inc.php');
	$arrMOutput["smarty_assign"]['step'] = 6;
	$arrMOutput["smarty_assign"]['info'] = '安装完成';
	$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'step6.html';
	$arrMOutput['smarty_assign']['Title'] = $arrMOutput["smarty_assign"]['info'].' - BIWEB WMS安装第六步';
}

// 输出到模板
$objWebInit->output($arrMOutput);
?>