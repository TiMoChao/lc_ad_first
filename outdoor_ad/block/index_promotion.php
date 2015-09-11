<?php
/**
 * 促销产品大block文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	outdoor_ad
 */
if (is_object($objWebInit)) {
	if(!isset($objoutdoor_ad)){
		include_once(__WEB_ROOT."/outdoor_ad/class/outdoor_ad.class.php");
		include_once(__WEB_ROOT."/outdoor_ad/config/var.inc.php");
		$objoutdoor_ad = new outdoor_ad();
		$objoutdoor_ad->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objoutdoor_ad->db = $objWebInit->db;
		else $objoutdoor_ad->db();
	}

	$arrCommendoutdoor_ad = array();
	$intMax = $objoutdoor_ad->getRecordsG($objoutdoor_ad->tablename2,'where pass=1 and recommendflag = 1');
	if($intMax < 1){
		$intMax = $objoutdoor_ad->getRecordsG($objoutdoor_ad->tablename2,'where pass=1 and recommendflag = 0');
		if($intMax > 10) $intMax -= 10;
		$arrCommendoutdoor_ad = $objoutdoor_ad->getInfoList('where pass=1 and recommendflag = 0',' order by submit_date desc',rand(0,$intMax),10);
	}else{
		if($intMax > 10) $intMax -= 10;
		$arrCommendoutdoor_ad = $objoutdoor_ad->getInfoList('where pass=1 and recommendflag = 1',' order by submit_date desc',rand(0,$intMax),10);
	}
	unset($intMax);
	unset($arrCommendoutdoor_ad['COUNT_ROWS']);

	// 输出到模板
	$arrMOutput["smarty_assign"]['arrCommendoutdoor_ad'] = $arrCommendoutdoor_ad;
}
?>