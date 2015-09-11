<?php
/**
 * 最会展信息讯文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	exhibition
 */

if (is_object($objWebInit)) {
	if(!isset($objexhibition)){
		include_once(__WEB_ROOT."/exhibition/class/exhibition.class.php");
		include_once(__WEB_ROOT."/exhibition/config/var.inc.php");
		$objexhibition = new exhibition();
		$objexhibition->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objexhibition->db = $objWebInit->db;
		else $objexhibition->db();
	}

	$arrexhibitionList = array();
	$arrexhibitionList = $objexhibition->getInfoList("where pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 5,true,null,false);

	//print_r($arrexhibitionList);
	//print_r($arrMArea);
	// 会展信息板
	$arrMOutput['smarty_assign']['arrMArea'] = $arrMArea;
	$arrMOutput["smarty_assign"]['arrexhibitionList'] = $arrexhibitionList;
}
?>