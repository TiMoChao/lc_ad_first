<?php
/**
 * 最新新闻 列表文件
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

	$arrNewest = array();
	$arrNewest = $objproduct->getInfoList("where pass=1"," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrNewest['COUNT_ROWS']);


	//print_r($arrNewest);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrNewest'] = $arrNewest;
}
?>