<?php
/**
 * 会展信息会展信息会展信息文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	exhibition
 */
require_once('../config/config.inc.php');
require_once("../class/exhibition.class.php");
require_once ('../../admin/checklogin.php');

$objWebInit = new exhibition();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
//图片上传参数
$objWebInit->arrGPic = $arrGPic;
$objWebInit->db();

//访问权限检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'])) {
	check::AlertExit('对不起：您没有权限访问此页',-1);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST['title'])||empty($_POST['intro'])||empty($_POST['type_id'])){
		check::AlertExit("错误：加*号的为必填项!",-1);
	}

	//新图上传
	if ($_FILES['Filedata']['name'] != "") {
		$_POST['photo'] = $objWebInit->uploadInfoImage($_FILES['Filedata'],'',$_POST['FileListPicSize'],$objWebInit->arrGPic['FileSourPicSize']);
	}else $_POST['photo'] = '';

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

	//自动拆字生成tag
	if(empty($_POST['tag'])){
		//选定底层功能模块数组
		$arrMModule = array('SplitWord');
		//调用选定的底层功能模块
		//GModuleLoad($arrMModule,$arrGModule);
		$objSP = new SplitWord();
		$_POST['tag'] = $objSP->SplitRMM($_POST['title'],false);
	}

	$objWebInit->saveInfo($_POST,0);

	$objWebInit->updateCache($objWebInit->lastInsertIdG(),$_POST['type_id'],$arrMOutput);

	check::WindowLocation('index.php','page='.$_GET['page']);
}
if(!is_array($arrMType)||empty($arrMType)){
	$arrMType = $objWebInit->getTypeList();
	$arrMType = $objWebInit->formatTypeList(0,$arrMType);
}

// 输出到模板
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['arrMType'] = $arrMType;
$arrMOutput["smarty_assign"]['FileListPicSize'] = $objWebInit->arrGPic['FileListPicSize'];
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'submit.htm';
$objWebInit->output($arrMOutput);
?>