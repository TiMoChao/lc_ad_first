<?php
/**
 * 商展信息 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	product
 */
require_once('config/config.inc.php');
require_once("class/product.class.php");

$objWebInit = new product();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
//翻页参数
$objWebInit->arrGPage = $arrGPage;
$objWebInit->db();

//获取当前页面的页面(分页使用)
if (empty($_GET['page'])) {
	$intPage = 1 ;
} else {
	$intPage = intval($_GET['page']);
}


$arrWhere = array();
$arrLink = array();
$arrWhere[] = "pass='1'";

//获取当前页面分类id
if (!empty($_GET['type_id'])) {
	$intTypeID = intval($_GET['type_id']);
	$arrWhere[] = "type_id='".$intTypeID."'";
	$arrLink[] = 'type_id=' . $intTypeID;

//获取分类名称
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

//商展信息独有模块：获取公司名称md5值
if(isset($_GET['com'])&&!empty($_GET['com'])) $strWhere = "where company_md5='".$_GET['com']."'";
//echo $strWhere;

//获取数据库数据数组 getInfoList($where='',$order='',$intStartID = 0,$intListNum = 0,$field = '*',$arrData = array(),$blCount = true,$blComplex = false)
$arrInfoList = $objWebInit->getInfoList($strWhere,' ORDER BY topflag DESC,submit_date DESC',($intPage-1)*$arrGPage['page_size'],$arrGPage['page_size']);
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

//获取分类信息数组
if(!is_array($arrMType)||empty($arrMType)){
	$arrMType = $objWebInit->getTypeList();
	$arrMType = $objWebInit->formatTypeList(0,$arrMType);
}

//获取页面标题
if(!empty($arrMOutput["smarty_assign"]['strTypeTitle'])) $strTitle =$arrMOutput["smarty_assign"]['strTypeTitle'];
else $strTitle = '';

//调用产品分类
include 'block/type.php';
//print_r($arrInfoList);

// 输出到模板
$arrMOutput["smarty_assign"]['FileCallPath'] = $arrGPic['FileCallPath'];
$arrMOutput["smarty_assign"]['arrInfoList'] = $arrInfoList;
$arrMOutput["smarty_assign"]['strPage'] = $strPage;
$arrMOutput['smarty_assign']['Title'] = $strTitle.'列表'.$intPage.' - '.$arrGWeb['name'];
$arrMOutput['smarty_assign']['Description'] = $arrMOutput['smarty_assign']['Title'];
$arrMOutput['smarty_assign']['Keywords'] = $arrMOutput['smarty_assign']['Title'];
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'list.html';
$objWebInit->output($arrMOutput);
?>