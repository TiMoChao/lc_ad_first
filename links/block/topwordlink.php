<?php
/**
 * 最新文字链接文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	links
 */
if (is_object($objWebInit)) {
	if(!isset($objlinks)){
		include_once(__WEB_ROOT.'/links/class/links.class.php');
		include_once(__WEB_ROOT.'/links/config/var.inc.php');
		$objlinks = new links();
		$objlinks->setDBG($arrGPdoDB);
		$objlinks->arrGPic = $arrGPic;
		if(is_object($objWebInit->db)) $objlinks->db = $objWebInit->db;
		else $objlinks->db();
	}
	$arrLinkList = array();
	$arrLinkList = $objlinks->getInfoList(" where pass=1 AND flag=1","  ORDER BY submit_date DESC",0,12,'*','',false);
print_r($arrLinkList);
exit;
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrLinkList'] = $arrLinkList;
	$arrMOutput["smarty_assign"]['linkImg'] = $objlinks->arrGPic['FileCallPath'];
}
?>