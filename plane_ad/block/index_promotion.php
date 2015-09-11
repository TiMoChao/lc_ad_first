<?php
/**
 * 促销产品大block文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	plane_ad
 */
if (is_object($objWebInit)) {
	if(!isset($objplane_ad)){
		include_once(__WEB_ROOT."/plane_ad/class/plane_ad.class.php");
		include_once(__WEB_ROOT."/plane_ad/config/var.inc.php");
		$objplane_ad = new plane_ad();
		$objplane_ad->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objplane_ad->db = $objWebInit->db;
		else $objplane_ad->db();
	}

	$arrCommendplane_ad = array();
	$intMax = $objplane_ad->getRecordsG($objplane_ad->tablename2,'where pass=1 and recommendflag = 1');
	if($intMax < 1){
		$intMax = $objplane_ad->getRecordsG($objplane_ad->tablename2,'where pass=1 and recommendflag = 0');
		if($intMax > 10) $intMax -= 10;
		$arrCommendplane_ad = $objplane_ad->getInfoList('where pass=1 and recommendflag = 0',' order by submit_date desc',rand(0,$intMax),10);
	}else{
		if($intMax > 10) $intMax -= 10;
		$arrCommendplane_ad = $objplane_ad->getInfoList('where pass=1 and recommendflag = 1',' order by submit_date desc',rand(0,$intMax),10);
	}
	unset($intMax);
	unset($arrCommendplane_ad['COUNT_ROWS']);

	// 输出到模板
	$arrMOutput["smarty_assign"]['arrCommendplane_ad'] = $arrCommendplane_ad;
}
?>