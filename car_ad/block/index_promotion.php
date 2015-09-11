<?php
/**
 * 促销产品大block文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	car_ad
 */
if (is_object($objWebInit)) {
	if(!isset($objcar_ad)){
		include_once(__WEB_ROOT."/car_ad/class/car_ad.class.php");
		include_once(__WEB_ROOT."/car_ad/config/var.inc.php");
		$objcar_ad = new car_ad();
		$objcar_ad->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objcar_ad->db = $objWebInit->db;
		else $objcar_ad->db();
	}

	$arrCommendcar_ad = array();
	$intMax = $objcar_ad->getRecordsG($objcar_ad->tablename2,'where pass=1 and recommendflag = 1');
	if($intMax < 1){
		$intMax = $objcar_ad->getRecordsG($objcar_ad->tablename2,'where pass=1 and recommendflag = 0');
		if($intMax > 10) $intMax -= 10;
		$arrCommendcar_ad = $objcar_ad->getInfoList('where pass=1 and recommendflag = 0',' order by submit_date desc',rand(0,$intMax),10);
	}else{
		if($intMax > 10) $intMax -= 10;
		$arrCommendcar_ad = $objcar_ad->getInfoList('where pass=1 and recommendflag = 1',' order by submit_date desc',rand(0,$intMax),10);
	}
	unset($intMax);
	unset($arrCommendcar_ad['COUNT_ROWS']);

	// 输出到模板
	$arrMOutput["smarty_assign"]['arrCommendcar_ad'] = $arrCommendcar_ad;
}
?>