<?php
/**
 * 最新平面广告文件
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

	$arrTopplane_ad1 = array();
	$arrTopplane_ad1[0] = $objplane_ad->getInfoList("where type_id=1 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 1);
	unset($arrTopplane_ad1[0]['COUNT_ROWS']);
	$arrTopplane_ad1[1] = $objplane_ad->getInfoList("where type_id=2 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopplane_ad1[1]['COUNT_ROWS']);
	$arrTopplane_ad1[2] = $objplane_ad->getInfoList("where type_id=3 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopplane_ad1[2]['COUNT_ROWS']);
	$arrTopplane_ad1[3] = $objplane_ad->getInfoList("where type_id=4 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopplane_ad1[3]['COUNT_ROWS']);

	$arrTopplane_ad1['FileCallPath'] = $arrGPic['FileCallPath'];
	
	//print_r($arrTopplane_ad1);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrTopplane_ad1'] = $arrTopplane_ad1;
}
?>