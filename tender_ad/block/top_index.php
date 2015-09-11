<?php
/**
 * 最新供求信息文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	tender_ad
 */
if (is_object($objWebInit)) {
	if(!isset($objtender_ad)){
		include_once(__WEB_ROOT."/tender_ad/class/tender_ad.class.php");
		include_once(__WEB_ROOT."/tender_ad/config/var.inc.php");
		$objtender_ad = new tender_ad();
		$objtender_ad->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objtender_ad->db = $objWebInit->db;
		else $objtender_ad->db();
	}

	$arrToptender_ad1 = array();
	$arrToptender_ad1[0] = $objtender_ad->getInfoList("where type_id=1 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 9);
	unset($arrToptender_ad1[0]['COUNT_ROWS']);
	$arrToptender_ad1[1] = $objtender_ad->getInfoList("where type_id=2 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrToptender_ad1[1]['COUNT_ROWS']);
	$arrToptender_ad1[2] = $objtender_ad->getInfoList("where type_id=3 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrToptender_ad1[2]['COUNT_ROWS']);
	$arrToptender_ad1[3] = $objtender_ad->getInfoList("where type_id=4 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrToptender_ad1[3]['COUNT_ROWS']);

	$arrToptender_ad1['FileCallPath'] = $arrGPic['FileCallPath'];
	
	//print_r($arrToptender_ad1);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrToptender_ad1'] = $arrToptender_ad1;
}
?>