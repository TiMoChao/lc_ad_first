<?php
/**
 * 最新招聘信息文件
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

	$arrTopjob1 = array();
	$arrTopjob1['datas'] = $objjob->getInfoList("where type_id=1 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 1);
	unset($arrTopjob1['datas']['COUNT_ROWS']);
	foreach ($arrTopjob1['datas'] as $k => $v) {
		$arrTopjob1['datas'][$k]['city'] = $arrMArea[$v['city']];
	}
	$arrTopjob1['strTypeTitle'] = $arrMType[1];
	$arrTopjob1['FileCallPath'] = $arrGPic['FileCallPath'];
	//print_r($arrTopjob1);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrTopjob1'] = $arrTopjob1;

	$arrTopjob2 = array();
	$arrTopjob2['datas'] = $objjob->getInfoList("where type_id=2 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrTopjob2['datas']['COUNT_ROWS']);
	foreach ($arrTopjob2['datas'] as $k => $v) {
		$arrTopjob2['datas'][$k]['city'] = $arrMArea[$v['city']];
	}
	$arrTopjob2['strTypeTitle'] = $arrMType[2];
	$arrTopjob2['FileCallPath'] = $arrGPic['FileCallPath'];
	//print_r($arrTopjob2);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrTopjob2'] = $arrTopjob2;
}
?>