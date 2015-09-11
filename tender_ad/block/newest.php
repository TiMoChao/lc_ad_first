<?php
/**
 * 最新新闻 列表文件
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

	$arrNewest = array();
	$arrNewest = $objtender_ad->getInfoList("where pass=1"," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrNewest['COUNT_ROWS']);


	//print_r($arrNewest);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrNewest'] = $arrNewest;
}
?>