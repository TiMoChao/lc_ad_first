<?php
/**
 * 首页简介文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	archives
 */
if (is_object($objWebInit)) {
	if(!isset($objarchives)){
		include_once(__WEB_ROOT."/archives/class/archives.class.php");
		include_once(__WEB_ROOT."/archives/config/var.inc.php");
		$objarchives = new archives();
		$objarchives->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objarchives->db = $objWebInit->db;
		else $objarchives->db();
	}

	$arrAbout = $objarchives->getInfo('about');
	$arrAbout['intro'] = check::csubstr(trim(str_replace("&nbsp;"," ",str_replace("\r\n","",strip_tags($arrAbout['intro'])))),0,500);

	// 输出到模板
	$arrMOutput["smarty_assign"]['arrAbout'] = $arrAbout;
}
?>