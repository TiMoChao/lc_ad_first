<?php
/**
 * 相关新闻 列表文件
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

	if(isset($arrInfo['tag'])&&!empty($arrInfo['tag'])){
		
		$arrTag=explode(',',$arrInfo['tag']);
		
		$where=array();
		foreach($arrTag as $strTag){
			$where[]="'%".$strTag."%'";

		}
		//echo $arrInfo['id'];
		//print_r($where);
		$strWhere=implode(" || ",$where);
		$strWhere='where (tag like '.$strWhere.')';
	}
	//echo $strWhere;
	$arrRelative = array();
	$arrRelative = $objPersonality_customization->getInfoList($strWhere." and pass=1 and id!=".$arrInfo['id']," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrRelative['COUNT_ROWS']);

	

	//print_r($arrRelative);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrRelative'] = $arrRelative;
}
?>