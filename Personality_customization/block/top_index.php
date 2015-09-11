<?php
/**
 * 最新个性定制文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	Personality_customization
 */
if (is_object($objWebInit)) {
	if(!isset($objPersonality_customization)){
		include_once(__WEB_ROOT."/Personality_customization/class/Personality_customization.class.php");
		include_once(__WEB_ROOT."/Personality_customization/config/var.inc.php");
		$objPersonality_customization = new Personality_customization();
		$objPersonality_customization->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objPersonality_customization->db = $objWebInit->db;
		else $objPersonality_customization->db();
	}

	$arrTopPersonality_customization1 = array();
	$arrTopPersonality_customization1[0] = $objPersonality_customization->getInfoList("where type_id=1 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 1);
	unset($arrTopPersonality_customization1[0]['COUNT_ROWS']);
	$arrTopPersonality_customization1[1] = $objPersonality_customization->getInfoList("where type_id=2 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopPersonality_customization1[1]['COUNT_ROWS']);
	$arrTopPersonality_customization1[2] = $objPersonality_customization->getInfoList("where type_id=3 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopPersonality_customization1[2]['COUNT_ROWS']);
	$arrTopPersonality_customization1[3] = $objPersonality_customization->getInfoList("where type_id=4 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopPersonality_customization1[3]['COUNT_ROWS']);

	$arrTopPersonality_customization1['FileCallPath'] = $arrGPic['FileCallPath'];
	
	//print_r($arrTopPersonality_customization1);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrTopPersonality_customization1'] = $arrTopPersonality_customization1;
}
?>