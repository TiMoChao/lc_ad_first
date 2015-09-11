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
		//print_r($arrGPic);exit;
		if(is_object($objWebInit->db)) $objproduct->db = $objWebInit->db;
		else $objproduct->db();
	}

	$arrTopproduct = array();
	$arrTopproduct = $objproduct->getInfoList("where pass=1","  ORDER BY topflag DESC,submit_date DESC", 0, 7);
	unset($arrTopproduct['COUNT_ROWS']);
	

	// 输出到模板
	//print_r($arrTopproduct);
	$arrMOutput["smarty_assign"]['arrTopproduct'] = $arrTopproduct;
	$arrMOutput["smarty_assign"]['FileCallPathP'] = $objproduct->arrGPic['FileCallPath'];

}
?>