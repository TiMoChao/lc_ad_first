<?php
/**
 * 会员栏目新增管理文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id $
 * @package		ArthurXF
 * @subpackage	user
 */
require_once('../config/config.inc.php');
require_once("../class/user.class.php");
require_once ('../..'.__WEBADMIN_ROOT.'/checklogin.php');

$objWebInit = new user();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
$objWebInit->db();

//访问权限检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'],$arrGWeb['module_id'])) {
	check::AlertExit('对不起，您没有权限访问此页',-1);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	//print_r($_POST);
	$strPassword	= trim($_POST['password']) ;
	$strOldPassword= trim($_POST['oldpassword']) ;
	$strUser_name	= trim($_POST['user_name']);
	if(!empty($_POST['user_popedom']))
	$_POST['user_popedom'] = implode(',',$_POST['user_popedom']);
	$_POST['user_ip'] = check::getIP();

	if (empty($strPassword)) {
		check::AlertExit("密码不能为空!", -1);
	}
	if (empty($strUser_name)) {
		check::AlertExit("用户名不能为空!",-1);
	}
	$arrPost = array($strUser_name);
	if (count($objWebInit->getUserWhere("where user_name=? ",$arrPost))) {
		check::AlertExit($strUser_name . ", 该用户名已被占用",-1);
	}
	//图片上传
	for($i=0;$i<count($_FILES);$i++){
		$num = $i;
		if($_FILES['Filedata'.$num]['name'] != ""){
			$_POST['photo'.$i] = $objWebInit->uploadInfoImage($_FILES['Filedata'.$num],$num,$_POST['csize'.$i]);
			unset($_POST['csize'.$i]);
		}
		unset($_POST['savefilename'.$i]);
	}

	$objWebInit->saveInfo($_POST,0);
	check::WindowLocation('./index.php', '1');
}

$arrTemp = array();
foreach($arrGMeta as $k => $v){
	if($k != 'index') $arrTemp[$k] = $v['name'];
}

// 输出到模板
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['arrGMeta'] = $arrTemp;
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'user_edit.htm';
$objWebInit->output($arrMOutput);
?>