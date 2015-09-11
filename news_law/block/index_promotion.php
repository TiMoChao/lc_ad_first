<?php
/**
 * 促销产品大block文件
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

	$arrCommendnews_law = array();
	$intMax = $objnews_law->getRecordsG($objnews_law->tablename2,'where pass=1 and recommendflag = 1');
	if($intMax < 1){
		$intMax = $objnews_law->getRecordsG($objnews_law->tablename2,'where pass=1 and recommendflag = 0');
		if($intMax > 10) $intMax -= 10;
		$arrCommendnews_law = $objnews_law->getInfoList('where pass=1 and recommendflag = 0',' order by submit_date desc',rand(0,$intMax),10);
	}else{
		if($intMax > 10) $intMax -= 10;
		$arrCommendnews_law = $objnews_law->getInfoList('where pass=1 and recommendflag = 1',' order by submit_date desc',rand(0,$intMax),10);
	}
	unset($intMax);
	unset($arrCommendnews_law['COUNT_ROWS']);

	// 输出到模板
	$arrMOutput["smarty_assign"]['arrCommendnews_law'] = $arrCommendnews_law;
}
?>