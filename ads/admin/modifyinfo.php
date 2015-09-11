<?php
/**
 * 图形广告后台管理栏目修改文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	ads
 */
require_once('../config/config.inc.php');
require_once("../class/ads.class.php");
require_once ('../../admin/checklogin.php');

$objWebInit = new ads();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
$objWebInit->db();
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
//图片上传参数
$objWebInit->arrGPic = $arrGPic;
//JS生成参数
$objWebInit->arrGjs = $arrGjs;


//访问权限检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'])) {
	check::AlertExit('对不起，您没有权限访问此页',-1);
}

// 取得文章信息
$arrInfo = $objWebInit->getInfo($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST['position'])){
		check::AlertExit("错误：显示位置必须选择!",-1);
	}
	if (empty($_POST['webname'])){
		check::AlertExit("错误：广告名称必须填写!",-1);
	}
	if ($_FILES['UploadFile']['name'] != "") {
		$strOldFile = $arrGPic['FileSavePath'] . $_POST['savefilename'];
		if (is_file($strOldFile)) {	// 原文件删除
			unlink($strOldFile);			
		}
		$_POST['UploadFile'] = $objWebInit->uploadInfoImage($_FILES['UploadFile'],$objWebInit->arrGPic['FileSourPicSize'],$_POST['id']);
	}else{
		$_POST['UploadFile'] = $_POST['savefilename'];
	}
	//取得图片链接的文件类型
	if(!empty($_POST['UploadFile'])){
	$Uploadfile = $_POST['UploadFile'];
	$_POST['FileExt'] = strrchr($Uploadfile,".");
	}else{
		if(!empty($_POST['weblogo']))
		$_POST['FileExt'] = strrchr($_POST['weblogo'],".");
	}
	unset($_POST['savefilename']);
	if(!empty($_POST['position']))
		$position = $_POST['position'];
	//print_r($_POST);
	$_POST = array_merge($arrInfo,$_POST);
	$objWebInit->saveInfo($_POST,1);
	if($position>0){
		$strWhere = "  where pass=1 and deadline_date > now() and position=".$position;
		$arrData = $objWebInit->getInfoList($strWhere,' ORDER BY submit_date DESC');
		//print_r($arrData);
		$objWebInit->creatJS($arrData,$position);
	}

	echo "<script>" . check::WindowLocation('index.php','page='.$_GET['page'])."</script>";
	exit();
}

// 输出到模板
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['arrPosition'] = $arrMType;
$arrMOutput["smarty_assign"]['FileCallPath'] = $arrGPic['FileCallPath'];
$arrMOutput["smarty_assign"]['arrData'] = $arrInfo;
$arrMOutput["smarty_assign"]['action_type'] = "save";
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'submit.htm';
$objWebInit->output($arrMOutput); 
?>