<?php
/**
 * 最新新闻 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	Planning_production
 */
if (is_object($objWebInit)) {
	if(!isset($objPlanning_production)){
		include_once(__WEB_ROOT."/Planning_production/class/Planning_production.class.php");
		include_once(__WEB_ROOT."/Planning_production/config/var.inc.php");
		$objPlanning_production = new Planning_production();
		$objPlanning_production->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objPlanning_production->db = $objWebInit->db;
		else $objPlanning_production->db();
	}

	$arrNewest = array();
	$arrNewest = $objPlanning_production->getInfoList("where pass=1"," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrNewest['COUNT_ROWS']);


	//print_r($arrNewest);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrNewest'] = $arrNewest;
}
?>