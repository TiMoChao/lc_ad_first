<?php
/**
 * 促销产品大block文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	trade
 */
if (is_object($objWebInit)) {
	if(!isset($objtrade)){
		include_once(__WEB_ROOT."/trade/class/trade.class.php");
		include_once(__WEB_ROOT."/trade/config/var.inc.php");
		$objtrade = new trade();
		$objtrade->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objtrade->db = $objWebInit->db;
		else $objtrade->db();
	}

	$arrCommendtrade = array();
	$intMax = $objtrade->getRecordsG($objtrade->tablename2,'where pass=1 and recommendflag = 1');
	if($intMax < 1){
		$intMax = $objtrade->getRecordsG($objtrade->tablename2,'where pass=1 and recommendflag = 0');
		if($intMax > 10) $intMax -= 10;
		$arrCommendtrade = $objtrade->getInfoList('where pass=1 and recommendflag = 0',' order by submit_date desc',rand(0,$intMax),10);
	}else{
		if($intMax > 10) $intMax -= 10;
		$arrCommendtrade = $objtrade->getInfoList('where pass=1 and recommendflag = 1',' order by submit_date desc',rand(0,$intMax),10);
	}
	unset($intMax);
	unset($arrCommendtrade['COUNT_ROWS']);

	// 输出到模板
	$arrMOutput["smarty_assign"]['arrCommendtrade'] = $arrCommendtrade;
}
?>