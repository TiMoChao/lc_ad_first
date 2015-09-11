<?php
/**
 * 最新策划制作文件
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

	$arrTopPlanning_production1 = array();
	$arrTopPlanning_production1[0] = $objPlanning_production->getInfoList("where type_id=1 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 1);
	unset($arrTopPlanning_production1[0]['COUNT_ROWS']);
	$arrTopPlanning_production1[1] = $objPlanning_production->getInfoList("where type_id=2 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopPlanning_production1[1]['COUNT_ROWS']);
	$arrTopPlanning_production1[2] = $objPlanning_production->getInfoList("where type_id=3 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopPlanning_production1[2]['COUNT_ROWS']);
	$arrTopPlanning_production1[3] = $objPlanning_production->getInfoList("where type_id=4 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopPlanning_production1[3]['COUNT_ROWS']);

	$arrTopPlanning_production1['FileCallPath'] = $arrGPic['FileCallPath'];
	
	//print_r($arrTopPlanning_production1);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrTopPlanning_production1'] = $arrTopPlanning_production1;
}
?>