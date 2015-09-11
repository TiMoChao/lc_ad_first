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
//会展信息接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
//会展信息
$objWebInit->arrGPage = $arrGPage;
//会展信息参数
$objWebInit->arrGPic = $arrGPic;
$objWebInit->db();
//会展信息检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'])) {
	check::AlertExit('会展信息会展信息会展信息页',-1);
}

$arrWhere = array();
$arrLink = array();
if(isset($_GET['action'])){
	if($_GET['action']=='search') {
		// 构造会展信息会展信息数
		$arrLink[] = 'action=search';
		if (!empty($_GET['title'])) {
			$strKeywords = strval(urldecode($_GET['title']));
			if($strKeywords[0] == '/'){
				//会展信息ID
				$strKeywords = substr($strKeywords,1);
				if(is_numeric($strKeywords)) $arrWhere[] = "id = '" . $strKeywords . "'";
			}else{
				$arrWhere[] = "tag LIKE '%" . $_GET['title'] . "%'";
			}
			$arrLink[] = 'title=' . $_GET['title'];
		}
		if ($_GET['pass'] == '1' || $_GET['pass'] == '0') {
			$arrWhere[] = "pass='".$_GET['pass']."'";
			$arrLink[] = 'pass=' . $_GET['pass'];
		}
		if (!empty($_GET['type_id'])) {
			$intTypeID = intval($_GET['type_id']);
			$arrWhere[] = "type_id='".$intTypeID."' or type_roue_id like '%:$intTypeID:%'";
			$arrLink[] = 'type_id='.$intTypeID;
		}
		if(!empty($_GET['state'])) {
			$intState = intval($_GET['state']);
			$arrWhere[] = " state = '$intState' ";
			$arrLink[] = 'state=' . $intState;
		}
	} else {
		$objWebInit->doInfoAction($_GET['action'],$_POST['select']);
	}
}
$strWhere = implode(' AND ', $arrWhere);
if (!empty($strWhere))	$strWhere = ' WHERE '.$strWhere;

if(!isset($_GET['page'])||$_GET['page']=='') $_GET['page'] = $arrGPage['page'];
$arrData = $objWebInit->getInfoList($strWhere,' ORDER BY submit_date DESC',($_GET['page']-1)*$arrGPage['page_size'],$arrGPage['page_size'],true);
if($arrData == "") $arrData=null;

//会展信息link
$strLink = '';
if (!empty($arrLink))	$strLink = implode('&',$arrLink);
$strPage= $objWebInit->makeInfoListPage($arrData['COUNT_ROWS'],$strLink);
unset($arrData['COUNT_ROWS']);


// 会展信息题
if(is_array($arrMType)&&!empty($arrMType)){
	foreach ($arrData as $k => $data) {
		foreach ($arrMType as $k1 => $type) {
			if ($data['type_id'] == $k1) {
				$arrData[$k]['type_title'] = $type;
			}
		}
	}
}else{
	$arrType = $objWebInit->getTypeList();
	foreach ($arrData as $k => $data) {
		foreach ($arrType as $k1 => $type) {
			if ($data['type_id'] == $type['type_id']) {
				$arrData[$k]['type_title'] = $type['type_title'];
			}
		}
	}
	// 会展信息类别
	$arrMType = $objWebInit->formatTypeList(0,$arrType);
}

// 会展信息板
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['FileCallPath'] = $arrGPic['FileCallPath'];
$arrMOutput["smarty_assign"]['arrType'] = $arrMType;
$arrMOutput["smarty_assign"]['arrData'] = $arrData;
$arrMOutput["smarty_assign"]['strPage'] = $strPage;
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'index.htm';

$objWebInit->output($arrMOutput);
?>