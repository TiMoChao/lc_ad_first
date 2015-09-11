<?php
/**
 * wap列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	wap
 */
require_once('config/config.inc.php');
require_once("class/wap.class.php");

$objWebInit = new wap();

if (empty($_GET['page'])) {
	$intPage = 1 ;
} else {
	$intPage = intval($_GET['page']);
}
if (empty($_GET['cpage'])) {
	$intCPage = 1 ;
} else {
	$intCPage = intval($_GET['cpage']);
}
if (!empty($_GET['mod'])) {
	$strModuleID = strval($_GET['mod']);
	include_once('../'.$strModuleID.'/config/var.inc.php');
	$objWebInit->setDBG($arrGPdoDB);
	$objWebInit->db();
	$arrLink[] = 'mod=' . $strModuleID;
}else{
	include_once('include/title.php');
	include_once('include/head.php');
	$myText = new HAW_text($arrGWeb['name'].'欢迎您!');
	$objHaw->add_text($myText);
	include_once('include/foot.php');
	exit;
}
$intID = intval($_GET['id']);
$arrInfo = $objWebInit->getInfo($intID,'*',1,true);

include_once('include/title.php');
include_once('include/head.php');

$myText = new HAW_text("标题:".$arrInfo['title']);
$objHaw->add_text($myText);
if(!empty($arrInfo['photo']) && $intCPage == 1){
	$strWapPhoto = $arrGPic['FileSavePath'].'wap/'.$arrInfo['photo'];
	if(!is_file($strWapPhoto)){
		//生成压缩图
		check::make_dir($strWapPhoto);
		copy($arrGPic['FileSavePath'].'/b/'.$arrInfo['photo'], $strWapPhoto);
		$objGDImage = new GDImage();
		if($objGDImage->makePRThumb($strWapPhoto,0,$arrMHaw['image_width'],$arrMHaw['image_height'])){
			$myImage = new HAW_image("photo.wbmp", $arrGPic['FileCallPath'].'wap/'.$arrInfo['photo'], $arrInfo['title']);
			$myImage->set_br(1);
			$myImage->set_html_width($arrMHaw['image_width']);
			$objHaw->add_image($myImage);
		}
	}else{
		$myImage = new HAW_image("photo.wbmp", $arrGPic['FileCallPath'].'wap/'.$arrInfo['photo'], $arrInfo['title']);
		$myImage->set_br(1);
		$myImage->set_html_width($arrMHaw['image_width']);
		$objHaw->add_image($myImage);
	}

}
$arrData = check::WordPage($arrInfo['intro'],$arrMHaw['detail_charnum'],$intCPage);
$myText = new HAW_text($arrData['centent']);
$objHaw->add_text($myText);

if(!empty($arrData['pagedown'])){
	$myLink = new HAW_link('下一页', "detail.php?id=".$intID."&mod=".$strModuleID."&cpage=".$arrData['pagedown']."&page=".$intPage);
	if(!empty($arrData['pageup'])) $myLink->br = 0;
	$objHaw->add_link($myLink);
}
if(!empty($arrData['pageup'])){
	$myLink = new HAW_link('上一页', "detail.php?id=".$intID."&mod=".$strModuleID."&cpage=".$arrData['pageup']."&page=".$intPage);
	$objHaw->add_link($myLink);
}


$myText = new HAW_text($arrData['pagenav']);
$myText->set_br(1);
$objHaw->add_text($myText);

$myText = new HAW_text("发布时间:".date('m-d H:i',strtotime($arrInfo['submit_date'])));
$myText->set_br(1);
$objHaw->add_text($myText);

if(!empty($_SESSION['keywords'])) $myLink = new HAW_link('返回列表', "search.php?page=".$intPage."&mod=".$strModuleID);
else $myLink = new HAW_link('返回列表', "list.php?page=".$intPage."&mod=".$strModuleID);
$objHaw->add_link($myLink);
include_once('include/foot.php');
?>