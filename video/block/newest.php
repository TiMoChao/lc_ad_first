<?php
/**
 * 最新 列表文件
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

	$arrNewest = array();
	$arrNewest = $objvideo->getInfoList("where pass=1"," ORDER BY clicktimes DESC,submit_date DESC", 0, 5,true);
	unset($arrNewest['COUNT_ROWS']);


	//print_r($arrNewest);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrNewest'] = $arrNewest;
}
?>