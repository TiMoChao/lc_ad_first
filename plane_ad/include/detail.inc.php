<?php
/**
 * 平面广告 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	plane_ad
 */
require_once('config/config.inc.php');
require_once("class/plane_ad.class.php");

$objWebInit = new plane_ad();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
$objWebInit->db();
//图像参数
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
			alert('该页面已经删除！');
			parent.location='/';
		  </script>";
}
if($arrInfo['stars'] > 0){
	if(!empty($_SESSION['user_id'])){
		if($arrInfo['stars'] > $_SESSION['user_grade']){
			check::AlertExit("你的权限不够，无法查看",-1);
		}
	}else{
		check::AlertExit("请先登陆",-1);
	}
}

if(!empty($arrInfo['meta_Title'])) $strTitle = $arrInfo['meta_Title'];
else  $strTitle = $arrInfo['title'];
if(!empty($arrInfo['meta_Description'])) $strDescription = $arrInfo['meta_Description'];
else  $strDescription = $strTitle.','.$arrInfo['summary'];
if(!empty($arrInfo['meta_Keywords'])) $strKeywords = $arrInfo['meta_Keywords'];
else  $strKeywords = $arrInfo['title'];

if(!is_array($arrMType)||empty($arrMType)){
	$arrMType = $objWebInit->getTypeList();
	$arrMType = $objWebInit->formatTypeList(0,$arrMType);
}

include '_block.php';

//print_r($arrInfo);
// 输出到模板
$arrMOutput["smarty_assign"]['arrData'] = $arrInfo;
$arrMOutput["smarty_assign"]['FileCallPath'] = $objWebInit->arrGPic['FileCallPath'];
$arrMOutput["smarty_assign"]['arrMType'] = $arrMType;
$arrMOutput['smarty_assign']['Title'] = $strTitle.' - '.$arrGWeb['name'];
$arrMOutput['smarty_assign']['Description'] = $strDescription.' - '.$arrGWeb['name'];
$arrMOutput['smarty_assign']['Keywords'] = $strKeywords.' - '.$arrGWeb['name'];
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'detail.html';
$objWebInit->output($arrMOutput);
?>