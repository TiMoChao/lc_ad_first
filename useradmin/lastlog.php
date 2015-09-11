<?php
/**
 * 5117积分文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2008 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	user
 */
if (is_object($objWebInit)) {
	if(!isset($objuser)){
		include_once(__WEB_ROOT."/user/class/user.class.php");
		include_once(__WEB_ROOT."/user/config/var.inc.php");
		include_once("index.php");
		$objuser = new user();
		$objuser->setDBG($arrGPdoDB);
		$objuser->arrGPic=$arrGPic;
		$objuser->arrGSmarty = $arrGSmarty;
		if(is_object($objWebInit->db)) $objuser->db = $objWebInit->db;
		else $objuser->db();
	}

	$arrTopuser = array();
	$arrTopuser = $objuser->getUser($_SESSION['user_id']);
	//print_r($arrTopuser);
	foreach($arrTopuser as $k=>$v){
		$_SESSION['lastlog'] = $arrTopuser[$k]['lastlog'];
	}

	//全站公用block
	@include '../_block.php';

	$arrMOutput["smarty_assign"]['userImg'] = $objuser->arrGPic['FileCallPath'];
	$arrMOutput["smarty_assign"]['arrTopuser'] = $arrTopuser;
}
?>