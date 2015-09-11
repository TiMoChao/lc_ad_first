<?php
/**
 * 会员栏目登陆文件
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
$objWebInit->db();

//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;

if(!empty($_POST)){
	if (isset($_POST['authCode'])&&$_POST['authCode']!=$_SESSION['authCode']){
		check::AlertExit("错误：验证码不匹配!",-1);
	}

	if ($objWebInit->userLogin($_POST,$arrGWeb['user_pass_type'],$arrGWeb['jamstr'])){
		check::AlertExit("恭喜您，登陆成功!",$_SERVER['HTTP_REFERER']);
	}else{	
		check::AlertExit("用户名，或者密码错误!",$_SERVER['HTTP_REFERER']);
	}
}

//全站公用block
@include '../_block.php';

if(empty($_SESSION['user_id'])){
	$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'login.html';
	$objWebInit->output($arrMOutput);
}
?>