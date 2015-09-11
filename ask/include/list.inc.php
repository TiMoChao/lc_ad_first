<?php
/**
 * 行业资讯 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	ask
 */

require_once('config/config.inc.php');
require_once("class/ask.class.php");

$objWebInit = new ask();
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
if(!isset($_GET['status'])) $is_answer=0;
else	$is_answer = intval($_GET['status']);


$arrWhere = array();
$arrLink = array();
$arrWhere[] = "pass='1'";
$arrWhere[] = "is_answer='".$is_answer."'";


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

if(!empty($arrMOutput["smarty_assign"]['strTypeTitle'])) $strTitle =$arrMOutput["smarty_assign"]['strTypeTitle'];
else $strTitle = '';

// 输出到模板
$arrMOutput["smarty_assign"]['arrMType'] = $arrMType;
$arrMOutput["smarty_assign"]['arrInfoList'] = $arrInfoList;
$arrMOutput["smarty_assign"]['strPage'] = $strPage;
$arrMOutput['smarty_assign']['Title'] = $strTitle.'列表'.$intPage.' - '.$arrGWeb['name'];
$arrMOutput['smarty_assign']['Description'] = $arrMOutput['smarty_assign']['Title'];
$arrMOutput['smarty_assign']['Keywords'] = $arrMOutput['smarty_assign']['Title'];
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'list.html';
$objWebInit->output($arrMOutput);
?>