<?php
/**
 * 策划制作 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	Planning_production
 */
require_once('config/config.inc.php');
require_once("class/Planning_production.class.php");


$objWebInit = new Planning_production();
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
	$arrTopPlanning_production[$k] = array();
	if(is_array($v)) {
		$arrTopPlanning_production[$k]['type_title'] = $v['type_title'];
		$arrTopPlanning_production[$k]['type_id'] = $v['type_id'];
	}else{
		$arrTopPlanning_production[$k]['type_title'] = $v;
		$arrTopPlanning_production[$k]['type_id'] = $k;
	}
	$arrTopPlanning_production[$k]['datas'] = $objWebInit->getInfoList("where pass=1 and type_id=".$arrTopPlanning_production[$k]['type_id'],"  ORDER BY recommendflag DESC,clicktimes DESC,submit_date DESC", 0, 12,true,'',false);
}

// 输出到模板
$arrMOutput["smarty_assign"]['arrTopPlanning_production'] = $arrTopPlanning_production;
$arrMOutput["smarty_assign"]['arrMType'] = $arrMType;
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'index.html';
$objWebInit->output($arrMOutput);
?>