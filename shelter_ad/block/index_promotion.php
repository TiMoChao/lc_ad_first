<?php
/**
 * 促销产品大block文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	shelter_ad
 */
if (is_object($objWebInit)) {
	if(!isset($objshelter_ad)){
		include_once(__WEB_ROOT."/shelter_ad/class/shelter_ad.class.php");
		include_once(__WEB_ROOT."/shelter_ad/config/var.inc.php");
		$objshelter_ad = new shelter_ad();
		$objshelter_ad->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objshelter_ad->db = $objWebInit->db;
		else $objshelter_ad->db();
	}

	$arrCommendshelter_ad = array();
	$intMax = $objshelter_ad->getRecordsG($objshelter_ad->tablename2,'where pass=1 and recommendflag = 1');
	if($intMax < 1){
		$intMax = $objshelter_ad->getRecordsG($objshelter_ad->tablename2,'where pass=1 and recommendflag = 0');
		if($intMax > 10) $intMax -= 10;
		$arrCommendshelter_ad = $objshelter_ad->getInfoList('where pass=1 and recommendflag = 0',' order by submit_date desc',rand(0,$intMax),10);
	}else{
		if($intMax > 10) $intMax -= 10;
		$arrCommendshelter_ad = $objshelter_ad->getInfoList('where pass=1 and recommendflag = 1',' order by submit_date desc',rand(0,$intMax),10);
	}
	unset($intMax);
	unset($arrCommendshelter_ad['COUNT_ROWS']);

	// 输出到模板
	$arrMOutput["smarty_assign"]['arrCommendshelter_ad'] = $arrCommendshelter_ad;
}
?>