<?php
/**
 * 最新多媒体文件
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

	$arrTopmultimedia_ad1 = array();
	$arrTopmultimedia_ad1[0] = $objmultimedia_ad->getInfoList("where type_id=1 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 1);
	unset($arrTopmultimedia_ad1[0]['COUNT_ROWS']);
	$arrTopmultimedia_ad1[1] = $objmultimedia_ad->getInfoList("where type_id=2 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopmultimedia_ad1[1]['COUNT_ROWS']);
	$arrTopmultimedia_ad1[2] = $objmultimedia_ad->getInfoList("where type_id=3 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopmultimedia_ad1[2]['COUNT_ROWS']);
	$arrTopmultimedia_ad1[3] = $objmultimedia_ad->getInfoList("where type_id=4 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopmultimedia_ad1[3]['COUNT_ROWS']);

	$arrTopmultimedia_ad1['FileCallPath'] = $arrGPic['FileCallPath'];
	
	//print_r($arrTopmultimedia_ad1);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrTopmultimedia_ad1'] = $arrTopmultimedia_ad1;
}
?>