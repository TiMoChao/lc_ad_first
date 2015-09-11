<?php
/**
 * 最新新闻 列表文件
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

	$arrNewest = array();
	$arrNewest = $objplane_ad->getInfoList("where pass=1"," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrNewest['COUNT_ROWS']);


	//print_r($arrNewest);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrNewest'] = $arrNewest;
}
?>