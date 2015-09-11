<?php
/**
 * 最新新闻 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	company
 */
if (is_object($objWebInit)) {
	if(!isset($objcompany)){
		include_once(__WEB_ROOT."/company/class/company.class.php");
		include_once(__WEB_ROOT."/company/config/var.inc.php");
		$objcompany = new company();
		$objcompany->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objcompany->db = $objWebInit->db;
		else $objcompany->db();
	}

	$arrNewest = array();
	$arrNewest = $objcompany->getInfoList("where pass=1"," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrNewest['COUNT_ROWS']);


	//print_r($arrNewest);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrNewest'] = $arrNewest;
}
?>