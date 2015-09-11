<?php
/**
 * 最新新闻 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	news_law
 */
if (is_object($objWebInit)) {
	if(!isset($objnews_law)){
		include_once(__WEB_ROOT."/news_law/class/news_law.class.php");
		include_once(__WEB_ROOT."/news_law/config/var.inc.php");
		$objnews_law = new news_law();
		$objnews_law->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objnews_law->db = $objWebInit->db;
		else $objnews_law->db();
	}

	$arrNewest = array();
	$arrNewest = $objnews_law->getInfoList("where pass=1"," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrNewest['COUNT_ROWS']);


	//print_r($arrNewest);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrNewest'] = $arrNewest;
}
?>