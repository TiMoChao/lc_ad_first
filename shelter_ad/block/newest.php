<?php
/**
 * 最新新闻 列表文件
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

	$arrNewest = array();
	$arrNewest = $objshelter_ad->getInfoList("where pass=1"," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrNewest['COUNT_ROWS']);


	//print_r($arrNewest);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrNewest'] = $arrNewest;
}
?>