<?php
/**
 * 促销产品大block文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	read_ad
 */
if (is_object($objWebInit)) {
	if(!isset($objread_ad)){
		include_once(__WEB_ROOT."/read_ad/class/read_ad.class.php");
		include_once(__WEB_ROOT."/read_ad/config/var.inc.php");
		$objread_ad = new read_ad();
		$objread_ad->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objread_ad->db = $objWebInit->db;
		else $objread_ad->db();
	}

	$arrCommendread_ad = array();
	$intMax = $objread_ad->getRecordsG($objread_ad->tablename2,'where pass=1 and recommendflag = 1');
	if($intMax < 1){
		$intMax = $objread_ad->getRecordsG($objread_ad->tablename2,'where pass=1 and recommendflag = 0');
		if($intMax > 10) $intMax -= 10;
		$arrCommendread_ad = $objread_ad->getInfoList('where pass=1 and recommendflag = 0',' order by submit_date desc',rand(0,$intMax),10);
	}else{
		if($intMax > 10) $intMax -= 10;
		$arrCommendread_ad = $objread_ad->getInfoList('where pass=1 and recommendflag = 1',' order by submit_date desc',rand(0,$intMax),10);
	}
	unset($intMax);
	unset($arrCommendread_ad['COUNT_ROWS']);

	// 输出到模板
	$arrMOutput["smarty_assign"]['arrCommendread_ad'] = $arrCommendread_ad;
}
?>