<?php
/*
 * 友情链接数据库安装文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * modified		2009-1-3
 */
include_once('config/config.inc.php');
include_once("class/links.class.php");

$objWebInit = new links();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
$objWebInit->db();

$charset = str_replace('-', '', $arrGWeb['charset']);
$extend = $objWebInit->db->getAttribute(PDO::ATTR_SERVER_VERSION) > '4.1' ? " DEFAULT CHARSET={$charset} " : "";

//写入频道数组
$strWEB_ROOT_pre = $arrGWeb['WEB_ROOT_pre'];
unset($arrGWeb);
$strFilename = __WEB_ROOT.'/data/webconfig.inc.php';
include($strFilename);
$arrGMeta['links']['name'] = '友情链接';
$arrGMeta['links']['admin'] = array(
									array(
										  'href'=>'../links/admin/index.php',
										  'name'=>'友情链接管理',),
									);
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

//sql语句
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
) ENGINE=MyISAM ;";

$sql[] = "INSERT INTO `".$arrGPdoDB['db_tablepre']."links` VALUES (1, 1, 1, 'array (\n  ''webname'' => ''BIWEB WMS'',\n  ''webhost'' => ''http://www.biweb.cn'',\n  ''summary'' => ''BIWEB商务智能网站关系系统'',\n  ''weblogo'' => '''',\n  ''width'' => '''',\n  ''height'' => '''',\n  ''UploadFile'' => '''',\n)', '2009-08-29 15:47:34', 1, 1, 1);";
$sql[] = "INSERT INTO `".$arrGPdoDB['db_tablepre']."links` VALUES (2, 1, 1, 'array (\n  ''webname'' => ''网务公司'',\n  ''webhost'' => ''http://www.bizeway.com'',\n  ''summary'' => ''上海网务网络信息有限公司'',\n  ''weblogo'' => '''',\n  ''width'' => '''',\n  ''height'' => '''',\n)', '2009-08-29 16:06:12', 1, 1, 1);";

foreach($sql as $val){
	$objWebInit->db->query($val);
}
if(empty($arrModule)){
	check::AlertExit('配置文件分类的友情链接系统安装成功!',"$strWEB_ROOT_pre/admin/");
}
?>