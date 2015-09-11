<?php
/**
 * 促销产品大block文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	multimedia_ad
 */
if (is_object($objWebInit)) {
	if(!isset($objmultimedia_ad)){
		include_once(__WEB_ROOT."/multimedia_ad/class/multimedia_ad.class.php");
		include_once(__WEB_ROOT."/multimedia_ad/config/var.inc.php");
		$objmultimedia_ad = new multimedia_ad();
		$objmultimedia_ad->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objmultimedia_ad->db = $objWebInit->db;
		else $objmultimedia_ad->db();
	}

	$arrCommendmultimedia_ad = array();
	$intMax = $objmultimedia_ad->getRecordsG($objmultimedia_ad->tablename2,'where pass=1 and recommendflag = 1');
	if($intMax < 1){
		$intMax = $objmultimedia_ad->getRecordsG($objmultimedia_ad->tablename2,'where pass=1 and recommendflag = 0');
		if($intMax > 10) $intMax -= 10;
		$arrCommendmultimedia_ad = $objmultimedia_ad->getInfoList('where pass=1 and recommendflag = 0',' order by submit_date desc',rand(0,$intMax),10);
	}else{
		if($intMax > 10) $intMax -= 10;
		$arrCommendmultimedia_ad = $objmultimedia_ad->getInfoList('where pass=1 and recommendflag = 1',' order by submit_date desc',rand(0,$intMax),10);
	}
	unset($intMax);
	unset($arrCommendmultimedia_ad['COUNT_ROWS']);

	// 输出到模板
	$arrMOutput["smarty_assign"]['arrCommendmultimedia_ad'] = $arrCommendmultimedia_ad;
}
?>