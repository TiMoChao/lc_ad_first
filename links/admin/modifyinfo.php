<?php
/**
 * 友情链接后台管理栏目修改文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	links
 */
require_once('../config/config.inc.php');
require_once("../class/links.class.php");
require_once ('../..'.__WEBADMIN_ROOT.'/checklogin.php');

$objWebInit = new links();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
//图片上传参数
$objWebInit->arrGPic = $arrGPic;
$objWebInit->db();

//访问权限检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'])) {
	check::AlertExit('对不起，您没有权限访问此页',-1);
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if ($_FILES['Filedata']['name'] != "") {
		$strOldFile = $arrGPic['FileSavePath'] . $_POST['savefilename'];
		if (is_file($strOldFile)) {	// 原文件删除
			unlink($strOldFile);
		}
		$_POST['UploadFile'] = $objWebInit->uploadInfoImage($_FILES['Filedata'],$objWebInit->arrGPic['FileSourPicSize'],$_POST['id']);
	}else{
		$_POST['UploadFile'] = $_POST['savefilename'];
	}

//取得图片链接的文件类型
	if(!empty($_POST['UploadFile'])){
		if($_POST['UploadFile'] != '') $_POST['FileExt'] = strrchr($_POST['UploadFile'],".");
		else $_POST['FileExt'] = strrchr($_POST['weblogo'],".");
		$_POST['picflag'] = 1;
	}
	unset($_POST['savefilename']);
	unset($_POST['okgo']);

	$objWebInit->saveInfo($_POST,1);
	echo "<script>" . check::WindowLocation('index.php','page='.$_GET['page'])."</script>";
	exit();
}
// 取得文章信息
$arrInfo = $objWebInit->getInfo($_GET['id']);

// 输出到模板
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['arrType'] = $arrMType;
$arrMOutput["smarty_assign"]['FileCallPath'] = $arrGPic['FileCallPath'];
$arrMOutput["smarty_assign"]['arrData'] = $arrInfo;
$arrMOutput["smarty_assign"]['action_type'] = "save";
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'submit.htm';
$objWebInit->output($arrMOutput);
?>