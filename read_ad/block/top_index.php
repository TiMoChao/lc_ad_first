<?php
/**
 * 最新阅报亭广告文件
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

	$arrTopread_ad1 = array();
	$arrTopread_ad1[0] = $objread_ad->getInfoList("where type_id=1 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 1);
	unset($arrTopread_ad1[0]['COUNT_ROWS']);
	$arrTopread_ad1[1] = $objread_ad->getInfoList("where type_id=2 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopread_ad1[1]['COUNT_ROWS']);
	$arrTopread_ad1[2] = $objread_ad->getInfoList("where type_id=3 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopread_ad1[2]['COUNT_ROWS']);
	$arrTopread_ad1[3] = $objread_ad->getInfoList("where type_id=4 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopread_ad1[3]['COUNT_ROWS']);

	$arrTopread_ad1['FileCallPath'] = $arrGPic['FileCallPath'];
	
	//print_r($arrTopread_ad1);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrTopread_ad1'] = $arrTopread_ad1;
}
?>