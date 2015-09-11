<?php
/**
 * 相关新闻 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	Community_ad
 */
if (is_object($objWebInit)) {
	if(!isset($objCommunity_ad)){
		include_once(__WEB_ROOT."/Community_ad/class/Community_ad.class.php");
		include_once(__WEB_ROOT."/Community_ad/config/var.inc.php");
		$objCommunity_ad = new Community_ad();
		$objCommunity_ad->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objCommunity_ad->db = $objWebInit->db;
		else $objCommunity_ad->db();
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
	$arrRelative = $objCommunity_ad->getInfoList($strWhere." and pass=1 and id!=".$arrInfo['id']," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrRelative['COUNT_ROWS']);

	

	//print_r($arrRelative);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrRelative'] = $arrRelative;
}
?>