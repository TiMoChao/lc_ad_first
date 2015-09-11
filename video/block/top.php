<?php
/**
 * 热门招聘文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	news
 */
if (is_object($objWebInit)) {
	if(!isset($objnews)){
		include_once(__WEB_ROOT."/news/class/news.class.php");
		include_once(__WEB_ROOT."/news/config/var.inc.php");
		$objnews = new news();
		$objnews->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objnews->db = $objWebInit->db;
		else $objnews->db();
	}

	$arrTopnews = array();
	$arrTopnews = $objnews->getInfoList("where pass=1","  ORDER BY recommendflag DESC,clicktimes DESC,submit_date DESC", 0, 15,true);
	unset($arrTopnews['COUNT_ROWS']);

	// print_r($arrTopnews);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrTopnews'] = $arrTopnews;
}
?>