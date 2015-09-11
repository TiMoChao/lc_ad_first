<?php
/**
 * 行业资讯后台管理栏目修改文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	ask
 */
require_once('../config/config.inc.php');
require_once("../class/ask.class.php");
require_once ('../../admin/checklogin.php');

$objWebInit = new ask();
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
	if (empty($_POST['type_id'])||empty($_POST['title'])||empty($_POST['intro'])){
		check::AlertExit("错误：有必填选项没填!",-1);
	}

	if ($_FILES['Filedata']['name'] != "") {
		$strOldFile = $arrGPic['FileSavePath'].'s/'.$_POST['savephoto'];
		if (is_file($strOldFile)) {	// 缩略图删除
			unlink($strOldFile);
		}
		$strOldFile = $arrGPic['FileSavePath'].'b/'.$_POST['savephoto'];
		if (is_file($strOldFile)) {	// 原文件删除
			unlink($strOldFile);
		}
		$_POST['photo'] = $objWebInit->uploadInfoImage($_FILES['Filedata'],'',$_POST['FileListPicSize'],$objWebInit->arrGPic['FileSourPicSize'],$_POST['id']);
	}else{
		$_POST['photo'] = $_POST['savephoto'];
	}

	if(strpos($_POST['type_id'],'|')!==false){
		$arrTemp = explode('|',$_POST['type_id']);
		$_POST['type_id'] = $arrTemp[0];
		$_POST['type_roue_id'] = $arrTemp[1];
	}else{
		$_POST['type_roue_id'] = ':'.$_POST['type_id'].':';
	}
	if($_POST['summary'] == '') $_POST['summary'] = check::csubstr(trim(str_replace("&nbsp;"," ",str_replace("\r\n","",strip_tags($_POST['intro'])))),0,$arrGWeb['db_summary_len']);
	if($_POST['title'] != '') $_POST['title_md5'] = md5($_POST['title']);
	$_POST['thumbnail'] = $_POST['photo'];

	#自动拆字生成tag
	if(empty($_POST['tag'])){
		//选定底层功能模块数组
		$arrMModule = array('SplitWord');
		//调用选定的底层功能模块
		//GModuleLoad($arrMModule,$arrGModule);
		$objSP = new SplitWord();
		$_POST['tag'] = $objSP->SplitRMM($_POST['title'],false);
	}

	//print_r($_POST);//exit;
	$objWebInit->saveInfo($_POST,1);

	$objWebInit->updateCache($_POST['id'],$_POST['type_id'],$arrMOutput);

	check::WindowLocation('index.php','page='.$_GET['page']);
}

// 取得文章信息
$arrInfo = $objWebInit->getInfo($_REQUEST['id']);

if(!is_array($arrMType)||empty($arrMType)){
	$arrMType = $objWebInit->getTypeList();
	$arrMType = $objWebInit->formatTypeList(0,$arrMType);
}

// 输出到模板
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['FileCallPath'] = $objWebInit->arrGPic['FileCallPath'];
$arrMOutput["smarty_assign"]['FileListPicSize'] = $objWebInit->arrGPic['FileListPicSize'];
$arrMOutput["smarty_assign"]['arrData'] = $arrInfo;
$arrMOutput["smarty_assign"]['arrMType'] = $arrMType;
$arrMOutput["smarty_assign"]['action_type'] = "save";
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'submit.htm';
$objWebInit->output($arrMOutput);
?>