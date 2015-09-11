<?php
/**
 * rss详细文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	rss
 */
require_once('config/config.inc.php');
require_once("class/rss.class.php");

$objWebInit = new rss();
//数据库连接参数

if (empty($_GET['page'])) {
	$intPage = 1 ;
} else {
	$intPage = intval($_GET['page']);
}
if (!empty($_GET['mod'])) {
	$strModuleID = strval($_GET['mod']);
	include_once('../'.$strModuleID.'/config/var.inc.php');
	$objWebInit->setDBG($arrGPdoDB);
	$objWebInit->db();
}else{
	check::AlertExit('未知栏目',-1);
	exit;
}
//类别ID
$arrWhere = array();
$arrLink = array();
$arrWhere[] = "pass='1'";

if(!empty($_GET['type_id'])){
	$intTypeID = intval($_GET['type_id']);
	$arrWhere[] = "type_id='".$intTypeID."'";
	$arrLink[] = 'type_id=' . $intTypeID;
}
$strWhere = implode(' AND ',$arrWhere);
$strWhere = 'where '.$strWhere;

$arrInfoList = $objWebInit->getInfoList($strWhere,'  ORDER BY topflag DESC,submit_date DESC',($intPage-1)*$arrGPage['page_size'],$arrGPage['page_size'],true);
$intRows = $arrInfoList['COUNT_ROWS'];
unset($arrInfoList['COUNT_ROWS']);

$strDomain = 'http://'.$_SERVER['HTTP_HOST'];
$objRss = new UniversalFeedCreator();
$objRss->useCached();
$objRss->title = $arrGMeta[$strModuleID]['meta']['Title'].'RSS订阅 -'.$arrGWeb['name'];
$objRss->description = $arrGMeta[$strModuleID]['meta']['Description'].'RSS订阅 -'.$arrGWeb['name'];
$objRss->descriptionTruncSize = 500;
$objRss->descriptionHtmlSyndicated = true;

$objRss->link = $strDomain."/".$strModuleID.'/';
$objRss->syndicationURL = $strDomain.'/'.$_SERVER["PHP_SELF"];

foreach($arrInfoList as $key => $val){
	$objItem = new FeedItem();
    $objItem->title = $val['title'];
	$strDir = ceil($val['id']/$arrGCache['cache_filenum']);
	if($arrGWeb['URL_static']){
		if($arrGWeb['file_static']){
			$strUrl = $strDomain.'/'.$arrGWeb['cache_url'].'/'.$strModuleID.'-'.$strDir.'/'.$val['id'].$arrGWeb['file_suffix'];
		}else $strUrl = $strDomain.'/'.$strModuleID.'/detail/id-'.$val['id'].$arrGWeb['file_suffix'];
	}else $strUrl = $strDomain.'/'.$strModuleID.'/detail.php?id='.$val['id'];
    $objItem->link = $strUrl;
    $objItem->description = $val['summary'];

    //optional
    $objItem->descriptionTruncSize = 500;
    $objItem->descriptionHtmlSyndicated = true;

    $objItem->date = strtotime($val['submit_date']);
    $objItem->source = $strDomain;
    $objItem->author = $_SERVER['HTTP_HOST'];

    $objRss->addItem($objItem);
}

echo $objRss->saveFeed("RSS2.0", $arrGSmarty['cache_dir'].$objRss->_generateFilename());
?>