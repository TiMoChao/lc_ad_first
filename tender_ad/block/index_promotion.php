<?php
/**
 * 促销产品大block文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	tender_ad
 */
if (is_object($objWebInit)) {
	if(!isset($objtender_ad)){
		include_once(__WEB_ROOT."/tender_ad/class/tender_ad.class.php");
		include_once(__WEB_ROOT."/tender_ad/config/var.inc.php");
		$objtender_ad = new tender_ad();
		$objtender_ad->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objtender_ad->db = $objWebInit->db;
		else $objtender_ad->db();
	}

	$arrCommendtender_ad = array();
	$intMax = $objtender_ad->getRecordsG($objtender_ad->tablename2,'where pass=1 and recommendflag = 1');
	if($intMax < 1){
		$intMax = $objtender_ad->getRecordsG($objtender_ad->tablename2,'where pass=1 and recommendflag = 0');
		if($intMax > 10) $intMax -= 10;
		$arrCommendtender_ad = $objtender_ad->getInfoList('where pass=1 and recommendflag = 0',' order by submit_date desc',rand(0,$intMax),10);
	}else{
		if($intMax > 10) $intMax -= 10;
		$arrCommendtender_ad = $objtender_ad->getInfoList('where pass=1 and recommendflag = 1',' order by submit_date desc',rand(0,$intMax),10);
	}
	unset($intMax);
	unset($arrCommendtender_ad['COUNT_ROWS']);

	// 输出到模板
	$arrMOutput["smarty_assign"]['arrCommendtender_ad'] = $arrCommendtender_ad;
}
?>