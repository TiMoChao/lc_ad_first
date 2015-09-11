<?php
/**
 * 最新户外广告文件
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

	$arrTopoutdoor_ad1 = array();
	$arrTopoutdoor_ad1[0] = $objoutdoor_ad->getInfoList("where type_id=1 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 1);
	unset($arrTopoutdoor_ad1[0]['COUNT_ROWS']);
	$arrTopoutdoor_ad1[1] = $objoutdoor_ad->getInfoList("where type_id=2 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopoutdoor_ad1[1]['COUNT_ROWS']);
	$arrTopoutdoor_ad1[2] = $objoutdoor_ad->getInfoList("where type_id=3 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopoutdoor_ad1[2]['COUNT_ROWS']);
	$arrTopoutdoor_ad1[3] = $objoutdoor_ad->getInfoList("where type_id=4 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopoutdoor_ad1[3]['COUNT_ROWS']);

	$arrTopoutdoor_ad1['FileCallPath'] = $arrGPic['FileCallPath'];
	
	//print_r($arrTopoutdoor_ad1);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrTopoutdoor_ad1'] = $arrTopoutdoor_ad1;
}
?>