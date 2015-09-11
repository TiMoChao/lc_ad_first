<?php
/**
 * 最新新闻 列表文件
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

	$arrNewest = array();
	$arrNewest = $objtrade->getInfoList("where pass=1"," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrNewest['COUNT_ROWS']);


	//print_r($arrNewest);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrNewest'] = $arrNewest;
}
?>