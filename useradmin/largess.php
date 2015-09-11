<?php
/**
 * 5117积分文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2008 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	largess
 */
if (is_object($objWebInit)) {
	if(!isset($objlargess)){
		include_once(__WEB_ROOT."/largess/class/largess.class.php");
		include_once(__WEB_ROOT."/largess/config/var.inc.php");
		$objlargess = new largess();
		$objlargess->setDBG($arrGPdoDB);
		$objlargess->arrGPic=$arrGPic;
		if(is_object($objWebInit->db)) $objlargess->db = $objWebInit->db;
		else $objlargess->db();
	}
	$arrToplargess = array();
	$arrToplargess = $objlargess->getInfoList("where pass=1","  ORDER BY recommendflag DESC,submit_date DESC", '', '',true,null,false);

	//全站公用block
	@include '../_block.php';

	$arrMOutput["smarty_assign"]['largessImg'] = $objlargess->arrGPic['FileCallPath'];
	$arrMOutput["smarty_assign"]['arrToplargess'] = $arrToplargess;
}
?>