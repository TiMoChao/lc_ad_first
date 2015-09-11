<?php
/**
 * 会展信息文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	exhibition
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

	$arrTopexhibition = array();
	$arrTopexhibition = $objexhibition->getInfoList("where pass=1","  ORDER BY recommendflag DESC,clicktimes DESC,submit_date DESC", 0, 15,true);
	unset($arrTopexhibition['COUNT_ROWS']);

	// print_r($arrTopexhibition);
	// 会展信息板
	$arrMOutput["smarty_assign"]['arrTopexhibition'] = $arrTopexhibition;
}
?>