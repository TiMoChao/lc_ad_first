<?php
/**
 * 产品大类别block文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	product
 */
if (is_object($objWebInit)) {
	require_once(dirname(__FILE__)."/../class/product.class.php");
	require_once(dirname(__FILE__)."/../config/var.inc.php");
	$objProduct = new product();

	$intTyepId = $_GET['type_id'];

	$arrTopInfo = array();
	$arrTopInfo = $objWebInit->getTypeList("where type_roue_id like '%{$intTyepId}%'");
	
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrProductType'] = $arrTopInfo;
}
?>