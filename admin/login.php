<?php
/**
 * 会员后台管理栏目登录文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	user
 */
require_once('../user/config/config.inc.php');
require_once(__WEB_ROOT."/user/class/user.class.php");

$objWebInit = new user();

if(!empty($_GET['action']) && $_GET['action'] == 'check') {
	//数据库连接参数
	$objWebInit->setDBG($arrGPdoDB);
	$objWebInit->db();

	if ($_POST['authCode']!=$_SESSION['authCode']){
		check::AlertExit("错误：验证码不匹配!",-1);
	}
	if($objWebInit->userLogin($_POST,$arrGWeb['user_pass_type'],$arrGWeb['jamstr'])){
		header('location:index.php');
	}
}
$arrGSmarty['template_dir'] = __WEB_ROOT.'/templats/';
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
$objWebInit->arrGSmarty['template_dir'] = __WEB_ROOT.__WEBADMIN_ROOT.'/templats/';
$arrMOutput['template_file'] = "login.htm";
$arrMOutput['smarty_assign']['strAuthImgDir'] = $arrGWeb['WEB_ROOT_pre'].'/plug-in/verifyCode/authimg.php';
$objWebInit->output($arrMOutput);
?>