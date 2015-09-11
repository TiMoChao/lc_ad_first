<?php
/**
 * 最新未解决知识问答文件
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
	$arrTopask['datas'] = $objask->getInfoList('where is_answer =0 and pass=1 ','  ORDER BY  submit_date DESC', 0, 10);
	$arrTopask['COUNT_ROWS'] = $arrTopask['datas']['COUNT_ROWS'];	//用来判断是否有数据之用，无特别需要本行可删除
	unset($arrTopask['datas']['COUNT_ROWS']);
	$arrTopask['FileCallPath'] = $arrGPic['FileCallPath'];
	foreach ($arrTopask['datas'] as $k => $v) {
		switch($v['type_id']){
			case 1:
				$arrTopask['datas'][$k]['type_title_color'] = 'red';
			break;
			case 2:
				$arrTopask['datas'][$k]['type_title_color'] = 'blue';
			break;
			case 3:
				$arrTopask['datas'][$k]['type_title_color'] = 'yellow';
			break;
			case 4:
				$arrTopask['datas'][$k]['type_title_color'] = 'green';
			break;
			default:
				$arrTopask['datas'][$k]['type_title_color'] = 'black';
			break;
				
		}
		foreach ($arrMType as $k1 => $v1){
			if($v1 == $v['type_id']){
				$arrTopask['datas'][$k]['type_title'] = $v1;
				break;
			}
		}
	}
	//print_r($arrTopask);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrNewaskUN'] = $arrTopask;
}
?>