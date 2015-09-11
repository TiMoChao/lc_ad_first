<?php
/**
 * 最新候车亭广告文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	shelter_ad
 */
if (is_object($objWebInit)) {
	if(!isset($objshelter_ad)){
		include_once(__WEB_ROOT."/shelter_ad/class/shelter_ad.class.php");
		include_once(__WEB_ROOT."/shelter_ad/config/var.inc.php");
		$objshelter_ad = new shelter_ad();
		$objshelter_ad->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objshelter_ad->db = $objWebInit->db;
		else $objshelter_ad->db();
	}

	$arrTopshelter_ad1 = array();
	$arrTopshelter_ad1[0] = $objshelter_ad->getInfoList("where type_id=1 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 1);
	unset($arrTopshelter_ad1[0]['COUNT_ROWS']);
	$arrTopshelter_ad1[1] = $objshelter_ad->getInfoList("where type_id=2 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopshelter_ad1[1]['COUNT_ROWS']);
	$arrTopshelter_ad1[2] = $objshelter_ad->getInfoList("where type_id=3 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopshelter_ad1[2]['COUNT_ROWS']);
	$arrTopshelter_ad1[3] = $objshelter_ad->getInfoList("where type_id=4 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopshelter_ad1[3]['COUNT_ROWS']);

	$arrTopshelter_ad1['FileCallPath'] = $arrGPic['FileCallPath'];
	
	//print_r($arrTopshelter_ad1);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrTopshelter_ad1'] = $arrTopshelter_ad1;
}
?>