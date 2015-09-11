<?php
/**
 * 阅报亭广告 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	read_ad
 */
require_once('config/config.inc.php');
require_once("class/read_ad.class.php");


$objWebInit = new read_ad();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
//翻页参数
$objWebInit->arrGPage = $arrGPage;
$objWebInit->db();


if(!is_array($arrMType)||empty($arrMType)){
	$arrMType = $objWebInit->getTypeList();
	$arrMType = $objWebInit->formatTypeList(0,$arrMType);
}

foreach($arrMType as $k=>$v){
	$arrTopread_ad[$k] = array();
	if(is_array($v)) {
		$arrTopread_ad[$k]['type_title'] = $v['type_title'];
		$arrTopread_ad[$k]['type_id'] = $v['type_id'];
	}else{
		$arrTopread_ad[$k]['type_title'] = $v;
		$arrTopread_ad[$k]['type_id'] = $k;
	}
	$arrTopread_ad[$k]['datas'] = $objWebInit->getInfoList("where pass=1 and type_id=".$arrTopread_ad[$k]['type_id'],"  ORDER BY recommendflag DESC,clicktimes DESC,submit_date DESC", 0, 12,true,'',false);
}

// 输出到模板
$arrMOutput["smarty_assign"]['arrTopread_ad'] = $arrTopread_ad;
$arrMOutput["smarty_assign"]['arrMType'] = $arrMType;
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'index.html';
$objWebInit->output($arrMOutput);
?>