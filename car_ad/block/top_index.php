<?php
/**
 * 最新供求信息文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	car_ad
 */
if (is_object($objWebInit)) {
	if(!isset($objcar_ad)){
		include_once(__WEB_ROOT."/car_ad/class/car_ad.class.php");
		include_once(__WEB_ROOT."/car_ad/config/var.inc.php");
		$objcar_ad = new car_ad();
		$objcar_ad->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objcar_ad->db = $objWebInit->db;
		else $objcar_ad->db();
	}

	$arrTopcar_ad1 = array();
	$arrTopcar_ad1[0] = $objcar_ad->getInfoList("where type_id=1 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 1);
	unset($arrTopcar_ad1[0]['COUNT_ROWS']);
	$arrTopcar_ad1[1] = $objcar_ad->getInfoList("where type_id=2 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopcar_ad1[1]['COUNT_ROWS']);
	$arrTopcar_ad1[2] = $objcar_ad->getInfoList("where type_id=3 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopcar_ad1[2]['COUNT_ROWS']);
	$arrTopcar_ad1[3] = $objcar_ad->getInfoList("where type_id=4 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopcar_ad1[3]['COUNT_ROWS']);

	$arrTopcar_ad1['FileCallPath'] = $arrGPic['FileCallPath'];
	
	//print_r($arrTopcar_ad1);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrTopcar_ad1'] = $arrTopcar_ad1;
}
?>