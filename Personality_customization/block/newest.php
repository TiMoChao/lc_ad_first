<?php
/**
 * 最新新闻 列表文件
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

	$arrNewest = array();
	$arrNewest = $objPersonality_customization->getInfoList("where pass=1"," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrNewest['COUNT_ROWS']);


	//print_r($arrNewest);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrNewest'] = $arrNewest;
}
?>