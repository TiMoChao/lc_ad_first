<?php
/**
 * 最新已解决知识问答文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	ask
 */
if (is_object($objWebInit)) {
	if(!isset($objask)){
		include_once(dirname(__FILE__)."/../class/ask.class.php");
		include_once(dirname(__FILE__)."/../config/var.inc.php");
		$objask = new ask();
		$objask->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objask->db = $objWebInit->db;
		else $objask->db();
	}
	
	$arrTopask = array();
	$arrTopask['datas'] = $objask->getInfoList('where is_answer =1 and pass=1 ','  ORDER BY clicktimes asc', 0, 10);
	$arrTopask['COUNT_ROWS'] = $arrTopask['datas']['COUNT_ROWS'];	//用来判断是否有数据之用，无特别需要本行可删除
	unset($arrTopask['datas']['COUNT_ROWS']);
	$arrTopask['FileCallPath'] = $arrGPic['FileCallPath'];
	//print_r($arrTopask);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrTopaskOK'] = $arrTopask;
}
?>