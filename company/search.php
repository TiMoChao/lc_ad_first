<?php
/**
 * 企业黄页 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	company
 */
require_once('config/config.inc.php');
require_once("class/company.class.php");
require_once('config/area_code.inc.php');

$objWebInit = new company();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$arrGSmarty['caching'] = false;
$objWebInit->arrGSmarty = $arrGSmarty;
//翻页参数
$objWebInit->arrGPage = $arrGPage;
$objWebInit->db();


$arrWhere = array();
$arrLink = array();
$arrWhere[] = "pass='1'";

$strLink = '';
$isGo = false;

if (empty($_GET['page'])) {
	$isGo = true;
	$intPage = 1 ;
	$strKeywords = strval(urldecode($_REQUEST['keywords']));
} else {
	$intPage = intval($_GET['page']);
}

if(!empty($_REQUEST['keywords'])){
	$strKeywords = strval(urldecode($_REQUEST['keywords']));
	if($strKeywords[0] == '/'){
		//精确查询ID
		$strKeywords = substr($strKeywords,1);
		if(is_numeric($strKeywords)) $arrWhere[] = "id = '" . $strKeywords . "'";
	}else{
		//选定底层功能模块数组
		$arrMModule = array('SplitWord');

		$strKeywords = strval(urldecode($_REQUEST['keywords']));

		$arrKeywords = explode(' ', $strKeywords);
		foreach($arrKeywords as $v){
			$v = trim($v);
			if(!empty($v)) $arrWhere[] = "title LIKE '%$v%'";
		}
		$_SESSION['arrWhere']		= $arrWhere;
		$_SESSION['strKeywords']	= $strKeywords;
	}

}elseif(!empty($_REQUEST['province'])){
	$province = intval($_GET['province']);	
	$arrWhere[] = "province = '".$province."'";

	$arrLink[] = 'province';
	$arrLink[] = $province;
	unset($strKeywords);

}else if(empty($_REQUEST['keywords']) && $isGo){
	check::AlertExit("错误：关键词必须填写!",-1);
}else{
	$arrWhere = $_SESSION['arrWhere'];
	$strKeywords = $_SESSION['strKeywords'];
}

$strWhere = implode(' AND ',$arrWhere);
$strWhere = 'where '.$strWhere;

$arrInfoList = $objWebInit->getInfoList($strWhere,'  ORDER BY topflag DESC,submit_date DESC',($intPage-1)*$arrGPage['page_size'],$arrGPage['page_size']);
$intRows = $arrInfoList['COUNT_ROWS'];
unset($arrInfoList['COUNT_ROWS']);

if($arrGWeb['URL_static']){
	if (!empty($arrLink)) $strLink = str_replace('=','-',implode('-',$arrLink));
}else{
	if (!empty($arrLink)) $strLink = implode('&',$arrLink);
}

//翻页跳转link
$strPage= $objWebInit->makeInfoListPage($intRows,$strLink,$link_type=$arrGWeb['URL_static']);


//echo $strKeywords;
// 输出到模板
$arrMOutput["smarty_assign"]['arrInfoList'] = $arrInfoList;
$arrMOutput["smarty_assign"]['strPage'] = $strPage;
$arrMOutput["smarty_assign"]['page'] = $intPage;
$arrMOutput["smarty_assign"]['arrMType'] = $arrMType;
$arrMOutput["smarty_assign"]['arrMArea'] = $arrMArea;
$arrMOutput["smarty_assign"]['province'] = $arrMArea[$province].'地区搜索结果';
$arrMOutput['smarty_assign']['Title'] = $strKeywords.'搜索结果 - '.$arrGWeb['name'];
$arrMOutput['smarty_assign']['Description'] = $strKeywords.'搜索结果 - '.$arrGWeb['name'];
//$arrMOutput['smarty_assign']['Keywords'] = $strKeywords.'搜索结果 - '.$arrGWeb['name'];
$arrMOutput["smarty_assign"]['strKeywords'] = $strKeywords;
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'list.html';
$objWebInit->output($arrMOutput);
?>