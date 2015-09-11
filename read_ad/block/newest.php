<?php
/**
 * 最新新闻 列表文件
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

	$arrNewest = array();
	$arrNewest = $objread_ad->getInfoList("where pass=1"," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrNewest['COUNT_ROWS']);


	//print_r($arrNewest);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrNewest'] = $arrNewest;
}
?>