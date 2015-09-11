<?php
/**
 * 会员发布信息修改文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	user
 */
require_once('../config/config.inc.php');
require_once("../class/user.class.php");
require_once ('../../useradmin/checklogin.php');

$objWebInit = new user();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$arrGSmarty['caching'] = false;
$objWebInit->arrGSmarty = $arrGSmarty;
$objWebInit->db();
$user_id = $_SESSION['user_id'];
$arrInfo=current($objWebInit->getUser($user_id));

if (!empty($_POST)) {
	
	if(!check::CheckPassword($_POST['password'])) {
		$error .= '输入的密码必须是4-20字符之间的数字、字母!\n';
	}
	if ($_POST['password'] != $_POST['confirm_password']){
		$error .= '两次输入密码不匹配\n';
	}
	if (!empty($error)) {
		check::AlertExit($error,-1);
	}
    if (count($objWebInit->getUserWhere("where user_name=? ",$arrPost)) != 0) {
				$error .= '原密码不正确 (' . $_POST['user_name'] . ')\n';
	}

	// 取会员信息
	foreach($arrInfo as $k => $v){
		if(array_key_exists($k,$_POST)) $arrInfo[$k] = $_POST[$k];
	}

	$intID = $objWebInit->saveInfo($arrInfo,1);
	if ($intID) {
		$_SESSION['user_id'] = $_SESSION['user_id'];
		$_SESSION['password'] = empty($_POST['password']) ? '' : $_POST['password'];	
	}
	check::WindowLocation($arrGWeb['WEB_ROOT_pre'].'/user/adminu/modify_userpwd.php');	
}


// 输出到模板
$arrMOutput["smarty_assign"]['arrData'] = $arrInfo;
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['adminu_main_dir'].'modify_userpwd.html';

//全站公用block
@include '../../_block.php';

$objWebInit->output($arrMOutput);
?>