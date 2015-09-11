<?php
/**
 * 相关新闻 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	Newspapers_magazines
 */
if (is_object($objWebInit)) {
	if(!isset($objNewspapers_magazines)){
		include_once(__WEB_ROOT."/Newspapers_magazines/class/Newspapers_magazines.class.php");
		include_once(__WEB_ROOT."/Newspapers_magazines/config/var.inc.php");
		$objNewspapers_magazines = new Newspapers_magazines();
		$objNewspapers_magazines->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objNewspapers_magazines->db = $objWebInit->db;
		else $objNewspapers_magazines->db();
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
	$arrRelative = $objNewspapers_magazines->getInfoList($strWhere." and pass=1 and id!=".$arrInfo['id']," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrRelative['COUNT_ROWS']);

	

	//print_r($arrRelative);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrRelative'] = $arrRelative;
}
?>