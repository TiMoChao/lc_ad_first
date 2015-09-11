<?php
/**
 * 最新行业视频文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	video
 */
if (is_object($objWebInit)) {
	if(!isset($objvideo)){
		include_once(dirname(__FILE__)."/../class/video.class.php");
		include_once(dirname(__FILE__)."/../config/var.inc.php");
		$objvideo = new video();
		$objvideo->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objvideo->db = $objWebInit->db;
		else $objvideo->db();
	}

	$arrTopvideo = array();
	$arrTopvideo['datas'] = $objvideo->getInfoList("where pass=1","  ORDER BY topflag DESC,recommendflag DESC,clicktimes DESC", 0, 10);
	unset($arrTopvideo['datas']['COUNT_ROWS']);

	// 输出到模板
	$arrTopvideo['FileCallPath'] = $arrGPic['FileCallPath'];
	$arrMOutput["smarty_assign"]['arrTopvideo'] = $arrTopvideo;
	
}
?>