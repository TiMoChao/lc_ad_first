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

// 取会员信息
$arrInfo=current($objWebInit->getUser($user_id));

if (!empty($_POST)) {
	//unset($_POST['submit']);
	if (!empty($_POST['mobile'])) {
		$mobile = $_POST['mobile'];
		if(!is_numeric($_POST['mobile'])){
		check::AlertExit('对不起，手机号码格式不正确!!',-1);
		}	
		if(strlen($_POST['mobile'])<>11){
			check::AlertExit('对不起，手机号码必须为11位数字!!',-1);
		}
	}
	
	
	foreach($arrInfo as $k => $v){
		if(array_key_exists($k,$_POST)) $arrInfo[$k] = $_POST[$k];		
	}

	$intID = $objWebInit->saveInfo($arrInfo,1);
	if ($intID) {
		$_SESSION['user_id'] = $_SESSION['user_id'];
		$_SESSION['tel'] = empty($_POST['tel']) ? '' : $_POST['tel'];
		$_SESSION['mobile'] = empty($_POST['mobile']) ? '' : $_POST['mobile'];
		$_SESSION['company_cn'] = empty($_POST['company_cn']) ? '' : $_POST['company_cn'];
		$_SESSION['real_name'] = empty($_POST['real_name']) ? '' : $_POST['real_name'];
		$_SESSION['email'] = empty($_POST['email']) ? '' : $_POST['email'];
		$_SESSION['tel'] = empty($_POST['tel']) ? '' : $_POST['tel'];
		$_SESSION['province'] = empty($_POST['province']) ? '' : $_POST['province'];
		$_SESSION['city'] = empty($_POST['city']) ? '' : $_POST['city'];
		$_SESSION['area'] = empty($_POST['area']) ? '' : $_POST['area'];
		$_SESSION['county'] = empty($_POST['county']) ? '' : $_POST['county'];	
		$_SESSION['address'] = empty($_POST['address']) ? '' : $_POST['address'];
		$_SESSION['postcode'] = empty($_POST['postcode']) ? '' : $_POST['postcode'];
	}
	check::WindowLocation($arrGWeb['WEB_ROOT_pre'].'/user/adminu/modify_user.php');
}


// 输出到模板
$arrMOutput["smarty_assign"]['arrData'] = $arrInfo;
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['adminu_main_dir'].'modify_user.html';

//全站公用block
@include '../../_block.php';

$objWebInit->output($arrMOutput);
?>