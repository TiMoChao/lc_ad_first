<?php
/**
 * 车体广告 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	car_ad
 */
require_once('config/config.inc.php');
require_once("class/car_ad.class.php");


$objWebInit = new car_ad();
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
	$arrTopcar_ad[$k] = array();
	if(is_array($v)) {
		$arrTopcar_ad[$k]['type_title'] = $v['type_title'];
		$arrTopcar_ad[$k]['type_id'] = $v['type_id'];
	}else{
		$arrTopcar_ad[$k]['type_title'] = $v;
		$arrTopcar_ad[$k]['type_id'] = $k;
	}
	$arrTopcar_ad[$k]['datas'] = $objWebInit->getInfoList("where pass=1 and type_id=".$arrTopcar_ad[$k]['type_id'],"  ORDER BY recommendflag DESC,clicktimes DESC,submit_date DESC", 0, 12,true,'',false);
}

// 输出到模板
$arrMOutput["smarty_assign"]['arrTopcar_ad'] = $arrTopcar_ad;
$arrMOutput["smarty_assign"]['arrMType'] = $arrMType;
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'index.html';
$objWebInit->output($arrMOutput);
?>