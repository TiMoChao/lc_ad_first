<?php
/**
 * 最新新闻 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	job
 */
if (is_object($objWebInit)) {
	if(!isset($objjob)){
		include_once(__WEB_ROOT."/job/class/job.class.php");
		include_once(__WEB_ROOT."/job/config/var.inc.php");
		$objjob = new job();
		$objjob->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objjob->db = $objWebInit->db;
		else $objjob->db();
	}

	$arrNewest = array();
	$arrNewest = $objjob->getInfoList("where pass=1"," ORDER BY clicktimes DESC,submit_date DESC,recommendflag DESC,clicktimes DESC", 0, 5,true);
	unset($arrNewest['COUNT_ROWS']);


	//print_r($arrNewest);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrNewest'] = $arrNewest;
}
?>