<?php
/**
 * 会员发布信息修改文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	user
 */
require_once('../config/config.inc.php');
require_once("../class/user.class.php");
require_once ('../../useradmin/checklogin.php');

$objWebInit = new user();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$arrGSmarty['caching'] = false;
$objWebInit->arrGSmarty = $arrGSmarty;
$objWebInit->db();
$objWebInit->arrGPic = $arrGPic;

$user_id = $_SESSION['user_id'];
$arrInfo=current($objWebInit->getUser($user_id));
if ($_SERVER["REQUEST_METHOD"] == "POST"){

	//图片上传
	if ($_FILES['Filedata']['name'] != "") {
		$strOldFile = $arrGPic['FileSavePath'].'s/'.$_POST['savefilename'];
		if (is_file($strOldFile)) {	// 缩略图删除
			unlink($strOldFile);
		}
		$strOldFile = $arrGPic['FileSavePath'].'b/'.$_POST['savefilename'];
		if (is_file($strOldFile)) {	// 原文件删除
			unlink($strOldFile);
		}
		$_POST['photo1'] = $objWebInit->uploadInfoImage($_FILES['Filedata'],'',$_POST['FileListPicSize'],$_POST['csize0'],$arrInfo['user_id']);
	}else{
		$_POST['photo1'] = $_POST['savefilename'];
	}

	// 取会员信息
	$arrInfo['photo1'] = $_POST['photo1'];

	//修改状态表明正在申请验证,必须设定为字符串形式
	$arrInfo['pass'] = '0';
	if (!empty($arrInfo)) {
		$objWebInit->saveInfo($arrInfo,1);
		echo "<script>" . check::WindowLocation('/user/adminu/licence.php')."</script>";
		exit();
	}
}

$arrInfo = $_SESSION;

// 输出到模板
$arrMOutput["smarty_assign"]['info'] = $arrInfo;
$arrMOutput["smarty_assign"]['FileCallPath'] = $arrGPic['FileCallPath'];
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['adminu_main_dir'].'licence.html';
$objWebInit->output($arrMOutput);
?>