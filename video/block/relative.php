<?php
/**
 * 相关新闻 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	video
 */
if (is_object($objWebInit)) {
	if(!isset($objvideo)){
		include_once(__WEB_ROOT."/video/class/video.class.php");
		include_once(__WEB_ROOT."/video/config/var.inc.php");
		$objvideo = new video();
		$objvideo->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objvideo->db = $objWebInit->db;
		else $objvideo->db();
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
	$arrRelative = $objvideo->getInfoList($strWhere." and pass=1 and id!=".$arrInfo['id']," ORDER BY clicktimes DESC,submit_date DESC", 0, 5,true);
	unset($arrRelative['COUNT_ROWS']);

	

	//print_r($arrRelative);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrRelative'] = $arrRelative;
}
?>