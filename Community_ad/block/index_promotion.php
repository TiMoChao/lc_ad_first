<?php
/**
 * 促销产品大block文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	Community_ad
 */
if (is_object($objWebInit)) {
	if(!isset($objCommunity_ad)){
		include_once(__WEB_ROOT."/Community_ad/class/Community_ad.class.php");
		include_once(__WEB_ROOT."/Community_ad/config/var.inc.php");
		$objCommunity_ad = new Community_ad();
		$objCommunity_ad->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objCommunity_ad->db = $objWebInit->db;
		else $objCommunity_ad->db();
	}

	$arrCommendCommunity_ad = array();
	$intMax = $objCommunity_ad->getRecordsG($objCommunity_ad->tablename2,'where pass=1 and recommendflag = 1');
	if($intMax < 1){
		$intMax = $objCommunity_ad->getRecordsG($objCommunity_ad->tablename2,'where pass=1 and recommendflag = 0');
		if($intMax > 10) $intMax -= 10;
		$arrCommendCommunity_ad = $objCommunity_ad->getInfoList('where pass=1 and recommendflag = 0',' order by submit_date desc',rand(0,$intMax),10);
	}else{
		if($intMax > 10) $intMax -= 10;
		$arrCommendCommunity_ad = $objCommunity_ad->getInfoList('where pass=1 and recommendflag = 1',' order by submit_date desc',rand(0,$intMax),10);
	}
	unset($intMax);
	unset($arrCommendCommunity_ad['COUNT_ROWS']);

	// 输出到模板
	$arrMOutput["smarty_assign"]['arrCommendCommunity_ad'] = $arrCommendCommunity_ad;
}
?>