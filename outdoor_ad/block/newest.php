<?php
/**
 * 最新新闻 列表文件
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

	$arrNewest = array();
	$arrNewest = $objoutdoor_ad->getInfoList("where pass=1"," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrNewest['COUNT_ROWS']);


	//print_r($arrNewest);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrNewest'] = $arrNewest;
}
?>