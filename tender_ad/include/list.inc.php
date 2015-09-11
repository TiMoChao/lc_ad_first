<?php
/**
 * 广告招标 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	tender_ad
 */
 
require_once('config/config.inc.php');
require_once("class/tender_ad.class.php");

$objWebInit = new tender_ad();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
//翻页参数
$objWebInit->arrGPage = $arrGPage;
$objWebInit->db();

if (empty($_GET['page'])) {
	$intPage = 1 ;
} else {
	$intPage = intval($_GET['page']);
}
$arrWhere = array();
$arrLink = array();
$arrWhere[] = "pass='1'";

if (!empty($_GET['type_id'])) {
	$intTypeID = intval($_GET['type_id']);
	$arrWhere[] = "type_id='".$intTypeID."'";
	$arrLink[] = 'type_id=' . $intTypeID;

	if(is_array($arrMType)&&!empty($arrMType)){
		$arrMOutput["smarty_assign"]['strTypeTitle'] = $arrMType[$intTypeID];
	}else{
		$arrTypeInfo = $objWebInit->getTypeInfo($intTypeID);
		$strTypeTitle = $arrTypeInfo['type_title'];
		$arrMOutput["smarty_assign"]['strTypeTitle'] = $strTypeTitle;		
	}
}

$strWhere = implode(' AND ',$arrWhere);
$strWhere = 'where '.$strWhere;

$arrInfoList = $objWebInit->getInfoList($strWhere,' ORDER BY topflag DESC,submit_date DESC',($intPage-1)*$arrGPage['page_size'],$arrGPage['page_size'],true);
$intRows = $arrInfoList['COUNT_ROWS'];
unset($arrInfoList['COUNT_ROWS']);


//静态url处理
$strLink = '';
if($arrGWeb['URL_static']){
	if (!empty($arrLink)) $strLink = str_replace('=','-',implode('-',$arrLink));
}else{
	if (!empty($arrLink)) $strLink = implode('&',$arrLink);
}

//翻页跳转link
$strPage= $objWebInit->makeInfoListPage($intRows,$strLink,$link_type=$arrGWeb['URL_static']);

if(!is_array($arrMType)||empty($arrMType)){
	$arrMType = $objWebInit->getTypeList();
	$arrMType = $objWebInit->formatTypeList(0,$arrMType);
}

// 输出到模板
$arrMOutput["smarty_assign"]['arrInfoList'] = $arrInfoList;
$arrMOutput["smarty_assign"]['strPage'] = $strPage;
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'list.html';

$arrMOutput["smarty_assign"]['FileCallPath'] = $arrGPic['FileCallPath'];
$arrMOutput['smarty_assign']['Title'] = $strTitle.'列表'.$intPage.' - '.$arrGWeb['name'];
$arrMOutput['smarty_assign']['Description'] = $arrMOutput['smarty_assign']['Title'];
$arrMOutput['smarty_assign']['Keywords'] = $arrMOutput['smarty_assign']['Title'];
$objWebInit->output($arrMOutput);





?>