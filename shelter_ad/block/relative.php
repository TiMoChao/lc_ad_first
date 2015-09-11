<?php
/**
 * 相关新闻 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	shelter_ad
 */
if (is_object($objWebInit)) {
	if(!isset($objshelter_ad)){
		include_once(__WEB_ROOT."/shelter_ad/class/shelter_ad.class.php");
		include_once(__WEB_ROOT."/shelter_ad/config/var.inc.php");
		$objshelter_ad = new shelter_ad();
		$objshelter_ad->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objshelter_ad->db = $objWebInit->db;
		else $objshelter_ad->db();
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
	$arrRelative = $objshelter_ad->getInfoList($strWhere." and pass=1 and id!=".$arrInfo['id']," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrRelative['COUNT_ROWS']);

	

	//print_r($arrRelative);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrRelative'] = $arrRelative;
}
?>