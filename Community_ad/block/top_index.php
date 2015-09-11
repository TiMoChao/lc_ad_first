<?php
/**
 * 最新小区广告文件
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

	$arrTopCommunity_ad1 = array();
	$arrTopCommunity_ad1[0] = $objCommunity_ad->getInfoList("where type_id=1 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 1);
	unset($arrTopCommunity_ad1[0]['COUNT_ROWS']);
	$arrTopCommunity_ad1[1] = $objCommunity_ad->getInfoList("where type_id=2 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopCommunity_ad1[1]['COUNT_ROWS']);
	$arrTopCommunity_ad1[2] = $objCommunity_ad->getInfoList("where type_id=3 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopCommunity_ad1[2]['COUNT_ROWS']);
	$arrTopCommunity_ad1[3] = $objCommunity_ad->getInfoList("where type_id=4 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopCommunity_ad1[3]['COUNT_ROWS']);

	$arrTopCommunity_ad1['FileCallPath'] = $arrGPic['FileCallPath'];
	
	//print_r($arrTopCommunity_ad1);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrTopCommunity_ad1'] = $arrTopCommunity_ad1;
}
?>