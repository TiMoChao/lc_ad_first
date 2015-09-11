<?php
/**
 * 促销产品大block文件
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

	$arrCommendPersonality_customization = array();
	$intMax = $objPersonality_customization->getRecordsG($objPersonality_customization->tablename2,'where pass=1 and recommendflag = 1');
	if($intMax < 1){
		$intMax = $objPersonality_customization->getRecordsG($objPersonality_customization->tablename2,'where pass=1 and recommendflag = 0');
		if($intMax > 10) $intMax -= 10;
		$arrCommendPersonality_customization = $objPersonality_customization->getInfoList('where pass=1 and recommendflag = 0',' order by submit_date desc',rand(0,$intMax),10);
	}else{
		if($intMax > 10) $intMax -= 10;
		$arrCommendPersonality_customization = $objPersonality_customization->getInfoList('where pass=1 and recommendflag = 1',' order by submit_date desc',rand(0,$intMax),10);
	}
	unset($intMax);
	unset($arrCommendPersonality_customization['COUNT_ROWS']);

	// 输出到模板
	$arrMOutput["smarty_assign"]['arrCommendPersonality_customization'] = $arrCommendPersonality_customization;
}
?>