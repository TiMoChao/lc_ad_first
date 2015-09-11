<?php
/**
 * 促销产品大block文件
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

	$arrCommendNewspapers_magazines = array();
	$intMax = $objNewspapers_magazines->getRecordsG($objNewspapers_magazines->tablename2,'where pass=1 and recommendflag = 1');
	if($intMax < 1){
		$intMax = $objNewspapers_magazines->getRecordsG($objNewspapers_magazines->tablename2,'where pass=1 and recommendflag = 0');
		if($intMax > 10) $intMax -= 10;
		$arrCommendNewspapers_magazines = $objNewspapers_magazines->getInfoList('where pass=1 and recommendflag = 0',' order by submit_date desc',rand(0,$intMax),10);
	}else{
		if($intMax > 10) $intMax -= 10;
		$arrCommendNewspapers_magazines = $objNewspapers_magazines->getInfoList('where pass=1 and recommendflag = 1',' order by submit_date desc',rand(0,$intMax),10);
	}
	unset($intMax);
	unset($arrCommendNewspapers_magazines['COUNT_ROWS']);

	// 输出到模板
	$arrMOutput["smarty_assign"]['arrCommendNewspapers_magazines'] = $arrCommendNewspapers_magazines;
}
?>