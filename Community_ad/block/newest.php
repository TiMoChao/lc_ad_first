<?php
/**
 * 最新新闻 列表文件
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

	$arrNewest = array();
	$arrNewest = $objCommunity_ad->getInfoList("where pass=1"," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrNewest['COUNT_ROWS']);


	//print_r($arrNewest);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrNewest'] = $arrNewest;
}
?>