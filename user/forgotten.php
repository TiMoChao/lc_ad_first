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

if ($_SERVER["REQUEST_METHOD"] == "POST"){

	if(empty($_POST['user_name'])) check::AlertExit('对不起，用户名必须填写!',-1);
	if(empty($_POST['email'])) check::AlertExit('对不起，电子邮箱必须填写!',-1);
	if(!check::CheckEmailAddr($_POST['email'])) {
		check::AlertExit('电子邮件格式不合法!',-1);		
	}
}

if(!empty($_POST)){
	$arrPost = array($_POST['user_name']);
	if ($arrUserInfo = $objWebInit->getUserWhere("where user_name=? and structon_tb like '%$_POST[email]%'",$arrPost)) {
		$arrMOutput["smarty_assign"]['password'] = $arrUserInfo[0]['password'];
	}else check::AlertExit("错误：用户名或电子邮件不正确！",-1);
}

if(!empty($arrUserInfo[0]['password'])){
	$arrMOutput["smarty_assign"]['MAIN']=$arrGSmarty['main_dir'].'getpassword.html';
}else{
	$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'forgotten.html';
}

//全站公用block
@include '../_block.php';

$objWebInit->output($arrMOutput);
?>