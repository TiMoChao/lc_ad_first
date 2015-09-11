<?php
/**
 * 会展信息 会展信息
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
	$arrRelative = $objexhibition->getInfoList($strWhere." and pass=1 and id!=".$arrInfo['id']," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrRelative['COUNT_ROWS']);

	

	//print_r($arrRelative);
	// 会展信息板
	$arrMOutput["smarty_assign"]['arrRelative'] = $arrRelative;
}
?>