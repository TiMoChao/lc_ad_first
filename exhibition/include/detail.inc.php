<?php
/**
 * 会展信息 会展信息
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	exhibition
 */
require_once('config/config.inc.php');
require_once("class/exhibition.class.php");

$objWebInit = new exhibition();
//会展信息接参数
$objWebInit->setDBG($arrGPdoDB);
$objWebInit->db();
//会展信息
$objWebInit->arrGPic = $arrGPic;
//smarty参数
if($arrGWeb['URL_static']){
	$arrGSmarty['caching'] = false;
}else{
	$arrGSmarty['cache_lifetime'] = 3600;
}
$objWebInit->arrGSmarty = $arrGSmarty;

if($_GET['id'] === null) exit;



$intID = intval($_GET['id']);
$arrInfo = $objWebInit->getInfo($intID);
if($arrInfo['id'] == '') {
	echo "<script language=JavaScript>
			alert('会展信息会展信息');
			parent.location='/';
		  </script>";
}
if($arrInfo['stars'] > 0){
	if(!empty($_SESSION['user_id'])){
		if($arrInfo['stars'] > $_SESSION['user_grade']){
			check::AlertExit("会展信息会展信息法查看",-1);
		}
	}else{
		check::AlertExit("会展信息",-1);
	}
}

//会展信息题
$intTypeID = $arrInfo['type_id'];
if(is_array($arrMType)&&!empty($arrMType)){
		$arrMOutput["smarty_assign"]['strTypeTitle'] = $arrMType[$intTypeID];
}else{
	$arrTypeInfo = $objWebInit->getTypeInfo($intTypeID);
	$strTypeTitle = $arrTypeInfo['type_title'];
	$arrMOutput["smarty_assign"]['strTypeTitle'] = $strTypeTitle;
}

//SEO优化
if(!empty($arrInfo['meta_Title'])) $strTitle = $arrInfo['meta_Title'];
else  $strTitle = $arrInfo['title'];
if(!empty($arrInfo['meta_Description'])) $strDescription = $arrInfo['meta_Description'];
else  $strDescription = $strTitle.','.$arrInfo['summary'];
if(!empty($arrInfo['meta_Keywords'])) $strKeywords = $arrInfo['meta_Keywords'];
else  $strKeywords = $arrInfo['title'];

//会展信息会展信息面没此需会展信息
if(!is_array($arrMType)||empty($arrMType)){
	$arrMType = $objWebInit->getTypeList();
	$arrMType = $objWebInit->formatTypeList(0,$arrMType);
}
// 公用block
include '_block.php';

// 会展信息板
$arrMOutput["smarty_assign"]['arrData'] = $arrInfo;
$arrMOutput["smarty_assign"]['FileCallPath'] = $objWebInit->arrGPic['FileCallPath'];
$arrMOutput["smarty_assign"]['arrMType'] = $arrMType;
$arrMOutput['smarty_assign']['Title'] = $strTitle.' - '.$arrGWeb['name'];
$arrMOutput['smarty_assign']['Description'] = $strDescription.' - '.$arrGWeb['name'];
$arrMOutput['smarty_assign']['Keywords'] = $strKeywords.' - '.$arrGWeb['name'];
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'detail.html';
$objWebInit->output($arrMOutput);
?>