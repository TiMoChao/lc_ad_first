<?php
/**
 * 会展信息 会展信息
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	news
 */
if (is_object($objWebInit)) {
	if(!isset($objexhibition)){
		include_once(__WEB_ROOT."/exhibition/class/exhibition.class.php");
		include_once(__WEB_ROOT."/exhibition/config/var.inc.php");
		$objexhibition = new exhibition();
		$objexhibition->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objexhibition->db = $objWebInit->db;
		else $objexhibition->db();
	}

	$arrNewest = array();
	$arrNewest = $objexhibition->getInfoList("where pass=1"," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrNewest['COUNT_ROWS']);


	//print_r($arrNewest);
	// 会展信息板
	$arrMOutput["smarty_assign"]['arrNewest'] = $arrNewest;
}
?>