<?php
/**
 * 会员栏目注册文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	user
 */
require_once('config/config.inc.php');
require_once("class/user.class.php");

$objWebInit = new user();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
$objWebInit->db();

//if($_SESSION['user_id'] != '') check::AlertExit("您已经登陆了，无须再进行注册！",-1);

if (!empty($_POST)) {
	//print_r($_POST);exit;
	unset($_POST['submit']);
	if (empty($_POST['authCode']) && $_POST['authCode']!=$_SESSION['authCode']){
		check::AlertExit("错误：验证码不匹配!",-1);
	}
	$error = '';
	if(!empty($_POST['user_name'])){
		$u_name = $_POST['user_name'];
		if(!check::CheckUser($_POST['user_name'])) {
			$error .= '输入的用户名必须是4-20字符之间的数字、字母!\n';
		}else{
			$arrPost = array($_POST['user_name']);
			if (count($objWebInit->getUserWhere("where user_name=? ",$arrPost)) != 0) {
				$error .= '用户名已被注册 (' . $_POST['user_name'] . ')\n';
			}
		}
	}else $error .= '用户名必须输入!\n';
	if(!empty($_POST['email'])){
		$u_email = $_POST['email'];
		if(!check::CheckEmailAddr($_POST['email'])) {
			$error .= '电子邮件格式不合法!\n';
		}
	}else $error .= '电子邮件必须输入!\n';

	if(!empty($_POST['real_name'])){
		$real_name = $_POST['real_name'];		
	}else $error .= '真实姓名必须输入!\n';

	if(!empty($_POST['mobile'])){
		$mobile = $_POST['mobile'];
		if(!is_numeric($_POST['mobile'])){
		check::AlertExit('对不起，手机号码格式不正确!!',-1);
		}	
		if(strlen($_POST['mobile'])<>11){
			check::AlertExit('对不起，手机号码必须为11位数字!!',-1);
		}
	}else $error .= '个人手机必须输入!\n';	

	if(!empty($_POST['password'])){
		$u_pass = $_POST['password'];
		if(!check::CheckPassword($_POST['password'])) {
			$error .= '输入的密码必须是4-20字符之间的数字、字母!\n';
		}
	}else $error .= '密码必须输入!\n';

	if ($_POST['password'] != $_POST['password_c']){
		$error .= '两次输入密码不匹配\n';
	}	

	if(!empty($_POST['postcode'])){
		if(!check::CheckPost($_POST['postcode'])) {
		check::AlertExit('邮编不合法!',-1);		
		}
	}	

	if(!empty($_POST['tel'])){
		if(!check::CheckTelephone($_POST['tel'])) {
		check::AlertExit('联系电话格式不对!',-1);		
		}
	}

	if(!empty($_POST['fax'])){
		if(!check::CheckTelephone($_POST['fax'])) {
		check::AlertExit('传真号码格式不对!',-1);		
		}
	}		

	if (!empty($error)) {
		check::AlertExit($error,-1);
	}
	$_POST['user_ip'] = check::getIP();
	$_POST['submit_date'] = date('Y-m-d H:i:s');
	$intID = $objWebInit->saveInfo($_POST,0);
	if ($intID) {
		$_SESSION['user_id'] = $intID;
		$_SESSION['password'] = $_POST['password'];
		$_SESSION['user_name'] = $_POST['user_name'];
		$_SESSION['real_name'] = $_POST['real_name'];
		$_SESSION['user_group'] = 0;
		$_SESSION['user_popedom'] = '';
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['pass'] = 0;
		$_SESSION['tel'] = $_POST['tel'];
		$_SESSION['mobile'] = $_POST['mobile'];
		$_SESSION['company_cn'] = $_POST['company_cn'];
		$_SESSION['province'] = $_POST['province'];
		$_SESSION['city'] = $_POST['city'];
		$_SESSION['country'] = $_POST['country'];
		$_SESSION['user_type'] = $_POST['user_type'];
		$_SESSION['user_bonus'] = 0;
		
		echo "<script>alert('注册完成');window.location='{$arrGWeb['WEB_ROOT_pre']}/useradmin/index.php';</script>";
		exit ();
	} else {
		check::AlertExit('注册失败',-1);
	}
}

$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'register.html';
$objWebInit->output($arrMOutput);
?>