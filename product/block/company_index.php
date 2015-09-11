<?php
/**
 * 最新产品文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	product
 */
if (is_object($objWebInit)) {
	if(!isset($objproduct)){
		include_once(dirname(__FILE__)."/../class/product.class.php");
		include_once(dirname(__FILE__)."/../config/var.inc.php");
		$objproduct = new product();
		$objproduct->setDBG($arrGPdoDB);
		$objproduct->arrGPic = $arrGPic;		
		if(is_object($objWebInit->db)) $objproduct->db = $objWebInit->db;
		else $objproduct->db();
	}

	$arrTopproductcomp = array();
	$arrTopproductcomp = $objproduct->getInfoList("where pass=1 and company_md5 !=''"," group by company_md5  ORDER BY topflag DESC,submit_date DESC", 0, 13);
	unset($arrTopproductcomp['COUNT_ROWS']);

	//print_r($arrTopproductcomp);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrTopproductcomp'] = $arrTopproductcomp;
	$arrMOutput["smarty_assign"]['FileCallPathPC'] = $objproduct->arrGPic['FileCallPath'];
}
?>