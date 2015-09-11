<?php
/**
 * 最新企业黄页文件
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

	$arrTopcompany = array();
	$arrTemp = $objcompany->getInfoList("where pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTemp['COUNT_ROWS']);
	$arrTopcompany['datas'] = $arrTemp;

	//print_r($arrTopcompany);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrTopcompany'] = $arrTopcompany;
}
?>