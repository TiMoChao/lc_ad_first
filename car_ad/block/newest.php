<?php
/**
 * �������� �б��ļ�
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

	$arrNewest = array();
	$arrNewest = $objcar_ad->getInfoList("where pass=1"," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrNewest['COUNT_ROWS']);


	//print_r($arrNewest);
	// �����ģ��
	$arrMOutput["smarty_assign"]['arrNewest'] = $arrNewest;
}
?>