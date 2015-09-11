<?php
/**
 * 最新供求信息文件
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

	$arrTopnews_law1 = array();
	$arrTopnews_law1[0] = $objnews_law->getInfoList("where type_id=1 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 8);
	unset($arrTopnews_law1[0]['COUNT_ROWS']);
	$arrTopnews_law1[1] = $objnews_law->getInfoList("where type_id=2 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 8);
	unset($arrTopnews_law1[1]['COUNT_ROWS']);
	$arrTopnews_law1[2] = $objnews_law->getInfoList("where type_id=3 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopnews_law1[2]['COUNT_ROWS']);
	$arrTopnews_law1[3] = $objnews_law->getInfoList("where type_id=4 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopnews_law1[3]['COUNT_ROWS']);

	$arrTopnews_law1['FileCallPath'] = $arrGPic['FileCallPath'];
	
	//print_r($arrTopnews_law1);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrTopnews_law1'] = $arrTopnews_law1;
}
?>