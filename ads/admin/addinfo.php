<?php
/**
 * 图形广告后台管理栏目新增文件
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
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
//图片上传参数
$objWebInit->arrGPic = $arrGPic;
//JS生成参数
$objWebInit->arrGjs = $arrGjs;
$objWebInit->db();
//访问权限检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'])) {
	check::AlertExit('对不起，您没有权限访问此页',-1);
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST['position'])){
		check::AlertExit("错误：显示位置必须选择!",-1);
	}
	if (empty($_POST['webname'])){
		check::AlertExit("错误：请填写广告名称!",-1);
	}
	if ($_FILES['UploadFile']['name'] != "") {
		$_POST['UploadFile'] = $objWebInit->uploadInfoImage($_FILES['UploadFile']);
	}

	//取得图片链接的文件类型
	if(!empty($_POST['UploadFile'])){
	$Uploadfile = $_POST['UploadFile'];
	$_POST['FileExt'] = strrchr($Uploadfile,".");
	}else{
		if(!empty($_POST['weblogo']))
		$_POST['FileExt'] = strrchr($_POST['weblogo'],".");
	}
	//清除不要的字段
	unset($_POST['savefilename']);

	$objWebInit->saveInfo($_POST,0);
	if(!empty($_POST['position'])){
		$position = $_POST['position'];
	if($position>0){
		$strWhere = "  where pass=1 and deadline_date > now() and position=".$position;
		$arrData = $objWebInit->getInfoList($strWhere,' ORDER BY submit_date DESC');
		$objWebInit->creatJS($arrData,$position);
	}
	}
	echo "<script>" . check::WindowLocation('index.php','page='.$_GET['page'])."</script>";
	exit();
}
// 输出到模板
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['arrPosition'] = $arrMType;
$arrMOutput["smarty_assign"]['FileCallPath'] = $arrGPic['FileCallPath'];
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'submit.htm';
$objWebInit->output($arrMOutput);
?>