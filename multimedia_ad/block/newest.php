<?php
/**
 * 最新新闻 列表文件
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

	$arrNewest = array();
	$arrNewest = $objmultimedia_ad->getInfoList("where pass=1"," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrNewest['COUNT_ROWS']);


	//print_r($arrNewest);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrNewest'] = $arrNewest;
}
?>