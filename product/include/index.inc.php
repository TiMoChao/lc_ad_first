<?php
/**
 * 商展信息 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF | Jerry
 * @subpackage	product
 */
//配置文件调用
require_once('config/config.inc.php');
require_once("class/product.class.php");

$objWebInit = new product();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
//翻页参数
$objWebInit->arrGPage = $arrGPage;
$objWebInit->arrGPic = $arrGPic;
$objWebInit->db();


//如果分类配置文件未配置 获取数据库分类配置信息
if(!is_array($arrMType)||empty($arrMType)){
	$arrMType = $objWebInit->getTypeList();
	$arrMType = $objWebInit->formatTypeList(0,$arrMType);
}
	
$arrInfoList = array();
//获取数据库数据数组 getInfoList($where='',$order='',$intStartID = 0,$intListNum = 0,$field = '*',$arrData = array(),$blCount = true,$blComplex = false)
$arrInfoList = $objWebInit->getInfoList("where pass=1","  ORDER BY recommendflag DESC,clicktimes DESC,submit_date DESC", 0, 10,'*','',false);
//print_r($arrInfoList);

// 调用产品分类
include 'block/type.php';

// 输出到模板
$arrMOutput["smarty_assign"]['arrInfoList'] = $arrInfoList;
$arrMOutput["smarty_assign"]['FileCallPath'] = $objWebInit->arrGPic['FileCallPath'];
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'index.html';
$objWebInit->output($arrMOutput);
?>