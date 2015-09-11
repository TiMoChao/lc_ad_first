<?php
/**
 * 图形广告后台管理栏目首页文件
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
//翻页参数
$objWebInit->arrGPage = $arrGPage;
//图片上传参数
$objWebInit->arrGPic = $arrGPic;
$objWebInit->db();
//JS生成参数
$objWebInit->arrGjs = $arrGjs;
//访问权限检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'])) {
	check::AlertExit('对不起，您没有权限访问此页',-1);
}
$arrWhere = array();
$arrLink = array();
if(isset($_GET['action'])){
	if($_GET['action']=='search') {
		// 构造搜索条件和翻页参数
		$arrLink[] = 'action=search';		
		if(!empty($_GET['pass'])){
		if ($_GET['pass'] == '1' || $_GET['pass'] == '0') {
			$arrWhere[] = "pass='".$_GET['pass']."'";
			$arrLink[] = 'pass=' . $_GET['pass'];
		}
		}
		if(!empty($_GET['id'])){
			$arrWhere[] = "id='".$_GET['id']."'";
			$arrLink[] = 'id=' . $_GET['id'];
		}
		if (!empty($_GET['ads_id'])) {
			$arrWhere[] = "id='".$_GET['ads_id']."'";
			$arrLink[] = 'id=' . $_GET['ads_id'];
		}
	} else {

		// 取得JS文件名列表
		$arrPositions = array();
		foreach($_POST['select'] as $id) {
			$arrTemp = $objWebInit->getInfo($id,'position');
			$arrPositions[] = $arrTemp['position'];
		}

		// 去除重复文件名
		$arrPositions = array_unique($arrPositions);

		$objWebInit->doInfoAction($_GET['action'],$_POST['select']);

		// 生成JS文件
		foreach($arrPositions as $position) {
			$strWhere = "  where pass=1 and deadline_date > now() and position=$position  ";
			$arrData = $objWebInit->getInfoList($strWhere,' ORDER BY submit_date DESC');
			$objWebInit->creatJS($arrData,$position);
		}
	}
}
if (!empty($_GET['title'])) {
	$arrWhere[] = "structon_tb LIKE '%" . $_GET['title'] . "%'";
	$arrLink[] = 'title=' . $_GET['title'];
}

$strWhere = implode(' AND ', $arrWhere);
if (!empty($strWhere))	$strWhere = ' WHERE '.$strWhere;
if(!isset($_GET['page'])||$_GET['page']=='') $_GET['page'] = $arrGPage['page'];
$arrData = $objWebInit->getInfoList($strWhere,' ORDER BY submit_date DESC',($_GET['page']-1)*$arrGPage['page_size'],$arrGPage['page_size']);
if($arrData == "") $arrData=null;
//翻页跳转link
$strLink = '';
if (!empty($arrLink))	$strLink = implode('&',$arrLink);
$strPage= $objWebInit->makeInfoListPage($arrData['COUNT_ROWS'],$strLink);
unset($arrData['COUNT_ROWS']);
// 输出到模板
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['arrPosition'] = $arrMType;
$arrMOutput["smarty_assign"]['FileCallPath'] = $arrGPic['FileCallPath'];
$arrMOutput["smarty_assign"]['arrData'] = $arrData;
$arrMOutput["smarty_assign"]['strPage'] = $strPage;
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'index.htm';
$objWebInit->output($arrMOutput);
?>