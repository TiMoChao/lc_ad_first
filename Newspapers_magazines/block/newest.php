<?php
/**
 * 最新新闻 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	Newspapers_magazines
 */
if (is_object($objWebInit)) {
	if(!isset($objNewspapers_magazines)){
		include_once(__WEB_ROOT."/Newspapers_magazines/class/Newspapers_magazines.class.php");
		include_once(__WEB_ROOT."/Newspapers_magazines/config/var.inc.php");
		$objNewspapers_magazines = new Newspapers_magazines();
		$objNewspapers_magazines->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objNewspapers_magazines->db = $objWebInit->db;
		else $objNewspapers_magazines->db();
	}

	$arrNewest = array();
	$arrNewest = $objNewspapers_magazines->getInfoList("where pass=1"," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrNewest['COUNT_ROWS']);


	//print_r($arrNewest);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrNewest'] = $arrNewest;
}
?>