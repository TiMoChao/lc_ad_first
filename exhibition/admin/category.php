<?php
/**
 * 会展信息会展信息会展信息
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
//会展信息接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$arrMOutput["template_file"] = "admin.html";
$objWebInit->arrGSmarty = $arrGSmarty;
$objWebInit->db();
//会展信息
$objWebInit->arrGPic = $arrGPic;
//会展信息检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'])) {
	check::AlertExit('会展信息会展信息会展信息页',-1);
}
if(isset($_GET['action'])){
	switch ($_GET['action']){
		// 会展信息页面
		case 'add':
			$arrTypeList = $objWebInit->getTypeList(null,' order by type_id desc');
			$arrTypeList = $objWebInit->formatTypeList(0,$arrTypeList);
			$arrMOutput["smarty_assign"]['arrData'] = $arrTypeList;
			$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'add_category.htm';
			$objWebInit->output($arrMOutput);
			break;
		// 会展信息会展信息
		case 'insert':
			if (empty($_POST['type_title']))   {
				check::AlertExit("会展信息会展信息空!",-1);
			}
			if (!empty($_POST['type_link'])) $_POST['type_link'] = str_replace("http://","",strtolower($_POST['type_link']));
			$objWebInit->makeInsertType($_POST);
			unset($_GET['action']);
			break;
		// 会展信息会展信息
		case 'del':
			$id = intval($_GET['id']);
			if (empty($id))   {
				check::AlertExit("会展信息会展信息空!",-1);
			}
			$objWebInit->deleteType($id);
			unset($_GET['action']);
			break;
		// 会展信息会展信息
		case 'edit':
			$id = intval($_GET['id']);
			if (empty($id))   {
				check::AlertExit("会展信息会展信息空!",-1);
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
		// 会展信息会展信息
		case 'update':
			if (empty($_POST['type_title']))   {
				check::AlertExit("会展信息会展信息空!",-1);
			}
			if (!empty($_POST['type_link'])) $_POST['type_link'] = str_replace("http://","",strtolower($_POST['type_link']));
			$objWebInit->makeUpdateType($_POST);
			unset($_GET['action']);
			break;
	}
}
if(!isset($_GET['action'])){
	// 会展信息会展信息
	$arrTypeList = $objWebInit->getTypeList();
	$arrTypeList = $objWebInit->formatTypeList(0,$arrTypeList);
	// 会展信息板
	$arrMOutput["smarty_assign"]['arrData'] = $arrTypeList;
	$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'category.htm';
	$objWebInit->output($arrMOutput);
}
?>