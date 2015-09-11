<?php
/**
 * 最新报纸杂志文件
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

	$arrTopNewspapers_magazines1 = array();
	$arrTopNewspapers_magazines1[0] = $objNewspapers_magazines->getInfoList("where type_id=1 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 1);
	unset($arrTopNewspapers_magazines1[0]['COUNT_ROWS']);
	$arrTopNewspapers_magazines1[1] = $objNewspapers_magazines->getInfoList("where type_id=2 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopNewspapers_magazines1[1]['COUNT_ROWS']);
	$arrTopNewspapers_magazines1[2] = $objNewspapers_magazines->getInfoList("where type_id=3 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopNewspapers_magazines1[2]['COUNT_ROWS']);
	$arrTopNewspapers_magazines1[3] = $objNewspapers_magazines->getInfoList("where type_id=4 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopNewspapers_magazines1[3]['COUNT_ROWS']);

	$arrTopNewspapers_magazines1['FileCallPath'] = $arrGPic['FileCallPath'];
	
	//print_r($arrTopNewspapers_magazines1);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrTopNewspapers_magazines1'] = $arrTopNewspapers_magazines1;
}
?>