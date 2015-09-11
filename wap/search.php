<?php
/**
 * wap搜索列表文件
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
//翻页参数
$objWebInit->arrGPage = $arrGPage;


// 公用block
//include '_block.php';

if (empty($_GET['page'])) {
	$intPage = 1 ;
} else {
	$intPage = intval($_GET['page']);
}
$arrWhere = array();
$arrLink = array();
$arrWhere[] = "pass='1'";
if(empty($_SESSION['wapmod'])){
	include_once('include/title.php');
	include_once('include/head.php');
	$myText = new HAW_text($arrGWeb['name'].'欢迎您!');
	$objHaw->add_text($myText);
	include_once('include/foot.php');
	exit;
}else{
	$strModuleID = strval($_SESSION['wapmod']);
	include_once('../'.$strModuleID.'/config/var.inc.php');
	$objWebInit->setDBG($arrGPdoDB);
	$objWebInit->db();
	$arrLink[] = 'mod=' . $strModuleID;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$_SESSION['keywords'] = strval($_POST['keywords']);
}
$arrWhere[] = " title like '%".$_SESSION['keywords']."%'";
$strWhere = implode(' AND ',$arrWhere);
$strWhere = 'where '.$strWhere;

$arrInfoList = $objWebInit->getInfoList($strWhere,'  ORDER BY topflag DESC,submit_date DESC',($intPage-1)*$arrGPage['page_size'],$arrGPage['page_size']);
$intRows = $arrInfoList['COUNT_ROWS'];
unset($arrInfoList['COUNT_ROWS']);

//翻页跳转
if (!empty($arrLink)) $strLink = implode('&',$arrLink);
$arrListPage= $objWebInit->makeInfoListPage($intRows,$strLink,$link_type=2);
//print_r($arrListPage);

include_once('include/title.php');
include_once('include/head.php');

$intRowNum = ($intPage-1)*$arrGPage['page_size']+1;
foreach($arrInfoList as $k=>$v){
	$v['title'] = check::csubstr($v['title'],0,$arrMHaw['list_charnum']);
	$myText = new HAW_text($intRowNum.":");
	$myText->br = 0;
	$objHaw->add_text($myText);
	$myLink = new HAW_link($v['title'], "detail.php?id=".$v['id']."&mod=".$strModuleID."&page=".$intPage);
	$myLink->br = 0;
	$objHaw->add_link($myLink);
	$myText = new HAW_text(" (".$v['clicktimes'].")");
	$objHaw->add_text($myText);
	$intRowNum++;
}


if(!empty($arrListPage['pagedown'])){
	$myLink = new HAW_link('下页', "search.php?page=".$arrListPage['pagedown']);
	$myLink->set_br(0);
	$objHaw->add_link($myLink);
}
if(!empty($arrListPage['pageup'])){
	$myLink = new HAW_link('上页', "search.php?page=".$arrListPage['pageup']);
	$myLink->set_br(0);
	$objHaw->add_link($myLink);
}
if(!empty($arrListPage['page_count'])){
	$myLink = new HAW_link('末页', "search.php?page=".$arrListPage['page_count']);
	$myLink->set_br(0);
	$objHaw->add_link($myLink);
}
$myLink = new HAW_link('首页', "search.php?page=1");
$objHaw->add_link($myLink);

$myText = new HAW_text($arrListPage['pagenav']);
$objHaw->add_text($myText);
/*
2/39页
总350条
至<input name="ridpage"  format="*N" value="0" size="2" emptyok="true"/>页
<anchor title="GO">GO<go href="list.aspx?CD=31930&amp;menuid=1139428" method="post">
<postfield name="total" value="350" />
<postfield name="page" value="$(ridpage)" /></go></anchor>
*/
include_once('include/foot.php');
?>