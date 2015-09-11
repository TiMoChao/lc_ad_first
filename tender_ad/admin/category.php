<?php
/**
 * 广告招标后台分类管理文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	tender_ad
 */
require_once('../config/config.inc.php');
require_once("../class/tender_ad.class.php");
require_once ('../..'.__WEBADMIN_ROOT.'/checklogin.php');
$objWebInit = new tender_ad();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$arrMOutput["template_file"] = "admin.html";
$objWebInit->arrGSmarty = $arrGSmarty;
$objWebInit->db();
//图形参数
$objWebInit->arrGPic = $arrGPic;
//访问权限检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'])) {
	check::AlertExit('对不起，您没有权限访问此页',-1);
}
if(isset($_GET['action'])){
	switch ($_GET['action']){
		// 显示新增页面
		case 'add':
			$arrTypeList = $objWebInit->getTypeList(null,' order by type_id desc');
			$arrTypeList = $objWebInit->formatTypeList(0,$arrTypeList);
			$arrMOutput["smarty_assign"]['arrData'] = $arrTypeList;
			$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'add_category.htm';
			$objWebInit->output($arrMOutput);
			break;
		// 新增课程培训类型
		case 'insert':
			if (empty($_POST['type_title']))   {
				check::AlertExit("错误：提交数据为空!",-1);
			}
			if (!empty($_POST['type_link'])) $_POST['type_link'] = str_replace("http://","",strtolower($_POST['type_link']));
			$objWebInit->makeInsertType($_POST);
			unset($_GET['action']);
			break;
		// 删除课程培训类型
		case 'del':
			$id = intval($_GET['id']);
			if (empty($id))   {
				check::AlertExit("错误：提交数据为空!",-1);
			}
			$objWebInit->deleteType($id);
			unset($_GET['action']);
			break;
		// 编辑课程培训类型
		case 'edit':
			$id = intval($_GET['id']);
			if (empty($id))   {
				check::AlertExit("错误：提交数据为空!",-1);
			}
			$arrTypeList = $objWebInit->getTypeList();
			$arrType = array();
			foreach ($arrTypeList as $k => $types){
				if ($types['type_id'] == $id) {
					$arrType = $types;
				}
			}
			$arrTypeList = $objWebInit->formatTypeList(0,$arrTypeList);
			$arrMOutput["smarty_assign"]['type_id'] = $id;
			$arrMOutput["smarty_assign"]['arrType'] = $arrType;
			$arrMOutput["smarty_assign"]['arrData'] = $arrTypeList;
			$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'edit_category.htm';
			$objWebInit->output($arrMOutput);
			break;
		// 更新课程培训类别
		case 'update':
			if (empty($_POST['type_title']))   {
				check::AlertExit("错误：提交数据为空!",-1);
			}
			if (!empty($_POST['type_link'])) $_POST['type_link'] = str_replace("http://","",strtolower($_POST['type_link']));
			$objWebInit->makeUpdateType($_POST);
			unset($_GET['action']);
			break;
	}
}
if(!isset($_GET['action'])){
	// 课程培训类型列表
	$arrTypeList = $objWebInit->getTypeList();
	$arrTypeList = $objWebInit->formatTypeList(0,$arrTypeList);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrData'] = $arrTypeList;
	$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'category.htm';
	$objWebInit->output($arrMOutput);
}
?>