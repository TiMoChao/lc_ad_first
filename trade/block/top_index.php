<?php
/**
 * 最新供求信息文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	trade
 */
if (is_object($objWebInit)) {
	if(!isset($objtrade)){
		include_once(__WEB_ROOT."/trade/class/trade.class.php");
		include_once(__WEB_ROOT."/trade/config/var.inc.php");
		$objtrade = new trade();
		$objtrade->setDBG($arrGPdoDB);
		if(is_object($objWebInit->db)) $objtrade->db = $objWebInit->db;
		else $objtrade->db();
	}

	$arrToptrade1 = array();
	$arrToptrade1[0] = $objtrade->getInfoList("where type_id=1 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 1);
	unset($arrToptrade1[0]['COUNT_ROWS']);
	$arrToptrade1[1] = $objtrade->getInfoList("where type_id=2 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrToptrade1[1]['COUNT_ROWS']);
	$arrToptrade1[2] = $objtrade->getInfoList("where type_id=3 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrToptrade1[2]['COUNT_ROWS']);
	$arrToptrade1[3] = $objtrade->getInfoList("where type_id=4 and pass=1","  ORDER BY recommendflag DESC,submit_date DESC", 0, 10);
	unset($arrToptrade1[3]['COUNT_ROWS']);

	$arrToptrade1['FileCallPath'] = $arrGPic['FileCallPath'];
	
	//print_r($arrToptrade1);
	// 输出到模板
	$arrMOutput["smarty_assign"]['arrToptrade1'] = $arrToptrade1;
}
?>