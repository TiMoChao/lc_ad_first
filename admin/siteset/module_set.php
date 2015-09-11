<?php
/**
 * 后台管理栏目清空静态页面文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	admin
 */
require_once('../config/config.inc.php');
require_once('../checklogin.php');

$objWebInit = new ArthurXF();
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;

//访问权限检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'],'siteset')) {
	check::AlertExit('对不起，您没有权限访问此页',-1);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['id'])){
	if(in_array($_GET['id'],array('wap','user','rss','guest','archives','install'))){
		check::AlertExit("设定栏目非法，不允许操作!",-1);
	}
	if($_GET['ac'] == 'del'){
		if($_GET['type'] == 0){
			//删除数据库卸载栏目
			if (! $objWebInit->checkPopedomG($_SESSION['user_id'],$_GET['id'])) {
				check::AlertExit('对不起，您没有权限访问此页',-1);
			}
			//数据库连接参数
			$objWebInit->setDBG($arrGPdoDB);
			$objWebInit->db();
			$strSql = "DROP TABLE IF EXISTS `".$arrGPdoDB['db_tablepre'].$_GET['id']."_type`";
			$objWebInit->db->query($strSql);
			$strSql = "DROP TABLE IF EXISTS `".$arrGPdoDB['db_tablepre'].$_GET['id']."`";
			$objWebInit->db->query($strSql);
		}

		$strWebRoot_pre = $arrGWeb['WEB_ROOT_pre'];
		$strWebAdmin_root = $arrGWeb['WEBADMIN_ROOT'];
		unset($arrGWeb);
		$strFilename = '../../data/webconfig.inc.php';
		include($strFilename);
		unset($arrGMeta[$_GET['id']]);

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
echo <<<EOT
<script language="JavaScript">
	alert("卸载成功！");
	parent.location="$strWebRoot_pre$strWebAdmin_root/";
</script>
EOT;
		} else {
			check::AlertExit("错误：文件 $strFilename 不可写!",-1);
		}
	}else{
		$strTypeFile = '../../'.$_GET['id'].'/config/type.inc.php';
		@include($strTypeFile );
		if($_GET['type'] == 0){
			//数据库分类的安装
			if(!empty($arrMType)) check::AlertExit('请清除 '.$strTypeFile.' 文件中的$arrMType数组后，再执行安装!',-1);
		}else{
			if(empty($arrMType)) check::AlertExit('请将分类设定到 '.$strTypeFile.' 文件中的$arrMType数组后，再执行安装!',-1);
		}
		header("Location:$arrGWeb[WEB_ROOT_pre]/$_GET[id]/install.php");
	}
}

$arrTreeDirs = array();
check::mapTreeDirs('../../',false,false);

$arrModuleDirs = array();
foreach($arrTreeDirs as $k => $v){
	if(in_array($v,array('useradmin','uploadfile','templates','plug-in','html','data','config','compile','cache',substr(__WEBADMIN_ROOT,1),'install'))){
		continue;
	}
	if(in_array($v,array('wap','user','rss','guest','archives'))){
		//$arrModuleDirs[$k]['id'] = $v;
		//$arrModuleDirs[$k]['state'] = 2;
		continue;
	}
	if(!is_dir('../../'.$v.'/config')) continue;
	if(empty($arrGMeta[$v])){
		$arrModuleDirs[$k]['id'] = $v;
		$arrModuleDirs[$k]['state'] = 0;
		@include('../../'.$v.'/config/var.inc.php');
		$arrModuleDirs[$k]['name'] = $arrGWeb['module_name'];
	}else{
		$arrModuleDirs[$k]['id'] = $v;
		$arrModuleDirs[$k]['state'] = 1;
		$arrModuleDirs[$k]['name'] = $arrGMeta[$v]['name'];
	}
}

// 输出到模板
$arrMOutput["smarty_assign"]['strNav'] = '功能栏目设置';
$arrMOutput["smarty_assign"]['arrModuleDirs'] = $arrModuleDirs;
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'siteset/module_set.htm';
$objWebInit->output($arrMOutput);
?>