<?php
/**
 * 热门招聘文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	product
 */
if (is_object($objWebInit)) {
	if(!isset($objproduct)){
		include_once(__WEB_ROOT."/product/class/product.class.php");
		include_once(__WEB_ROOT."/product/config/var.inc.php");
		$objproduct = new product();
		$objproduct->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objproduct->db = $objWebInit->db;
		else $objproduct->db();
	}

	$arrTopproduct = array();
	$arrTopproduct = $objproduct->getInfoList("where pass=1","  ORDER BY recommendflag DESC,clicktimes DESC,submit_date DESC", 0, 15,true);
	unset($arrTopproduct['COUNT_ROWS']);

	// print_r($arrTopproduct);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrTopproduct'] = $arrTopproduct;
}
?>