<?php
/**
 * 用户登录信息文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	user
 */
if (is_object($objWebInit) && !empty($_SESSION['user_id'])) {
	include_once(__WEB_ROOT."/user/class/user.class.php");
	$objuser = new user();
	$objuser->arrGPdoDB = $objWebInit->arrGPdoDB;
	$objuser->db();
	$arrUserInfo= $objuser->getUser("user_id='".$_SESSION['user_id']."'");
	$arrUserInfo = array_pop($arrUserInfo);

	//全站公用block
	@include '../_block.php';

	// 输出到模板
	$arrMOutput["smarty_assign"]['modifyTrade'] = $_SESSION['user_grade']<ADVANCE_USER?0:1;
	$arrMOutput["smarty_assign"]['arrUserInfo'] = $arrUserInfo;
}
?>