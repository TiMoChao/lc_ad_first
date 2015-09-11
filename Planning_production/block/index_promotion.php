<?php
/**
 * 促销产品大block文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	Planning_production
 */
if (is_object($objWebInit)) {
	if(!isset($objPlanning_production)){
		include_once(__WEB_ROOT."/Planning_production/class/Planning_production.class.php");
		include_once(__WEB_ROOT."/Planning_production/config/var.inc.php");
		$objPlanning_production = new Planning_production();
		$objPlanning_production->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objPlanning_production->db = $objWebInit->db;
		else $objPlanning_production->db();
	}

	$arrCommendPlanning_production = array();
	$intMax = $objPlanning_production->getRecordsG($objPlanning_production->tablename2,'where pass=1 and recommendflag = 1');
	if($intMax < 1){
		$intMax = $objPlanning_production->getRecordsG($objPlanning_production->tablename2,'where pass=1 and recommendflag = 0');
		if($intMax > 10) $intMax -= 10;
		$arrCommendPlanning_production = $objPlanning_production->getInfoList('where pass=1 and recommendflag = 0',' order by submit_date desc',rand(0,$intMax),10);
	}else{
		if($intMax > 10) $intMax -= 10;
		$arrCommendPlanning_production = $objPlanning_production->getInfoList('where pass=1 and recommendflag = 1',' order by submit_date desc',rand(0,$intMax),10);
	}
	unset($intMax);
	unset($arrCommendPlanning_production['COUNT_ROWS']);

	// 输出到模板
	$arrMOutput["smarty_assign"]['arrCommendPlanning_production'] = $arrCommendPlanning_production;
}
?>