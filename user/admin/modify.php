<?php
/**
 * 会员栏目编辑删除管理文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id $
 * @package		ArthurXF
 * @subpackage	user
 */
require_once('../config/config.inc.php');
require_once("../class/user.class.php");
require_once('../..'.__WEBADMIN_ROOT.'/checklogin.php');

$objWebInit = new user();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
$objWebInit->db();
//图片上传参数
$objWebInit->arrGPic = $arrGPic;
$objWebInit->db();

//访问权限检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'])) {
	check::AlertExit('对不起，您没有权限访问此页',-1);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	//print_r($_POST);
	$strUser_name = trim($_POST['user_name']) ;
	$intUser_id = intval($_POST['user_id']) ;
	$strPassword = trim($_POST['password']) ;
	$strOldPassword= trim($_POST['oldpassword']) ;
	if(!empty($_POST['user_popedom']))
	$_POST['user_popedom'] = implode(',',$_POST['user_popedom']);

	$_POST['user_ip'] = check::getIP();
	if (empty($strPassword)) {
		check::AlertExit("密码不能为空!", -1);
	}
	if (empty($intUser_id)||empty($strUser_name)) {
		check::AlertExit("用户名不能为空!",-1);
	}
	$arrPost = array($strUser_name,$intUser_id);
	if (count($objWebInit->getUserWhere("where user_name=? and user_id<>?",$arrPost))) {
		check::AlertExit($strUser_name . ", 该用户名已被占用",-1);
	}

	//图片上传
	for($i=0;$i<count($_FILES);$i++){
		$num = $i;
		if($_FILES['Filedata'.$num]['name'] != ""){
			$strOldFile = $arrGPic['FileSavePath'].'s/'.$_POST['savefilename'.$i];
			if (is_file($strOldFile)) {	// 缩略图删除
				unlink($strOldFile);
			}
			$strOldFile = $arrGPic['FileSavePath'].'b/'.$_POST['savefilename'.$i];
			if (is_file($strOldFile)) {	// 原图片删除
				unlink($strOldFile);
			}
			if(empty($_POST['FileListPicSize'])) $_POST['FileListPicSize'] = 0;
			$_POST['photo'.$i] = $objWebInit->uploadInfoImage($_FILES['Filedata' . $num],$num,$_POST['FileListPicSize'],$objWebInit->arrGPic['FileSourPicSize'],$_POST['id']);
		}else{
			$_POST['photo'.$i] = $_POST['savefilename'.$i];

		}
		unset($_POST['savefilename'.$i]);
	}
	
	$arrInfo=current($objWebInit->getUser($intUser_id));

	foreach($arrInfo as $k => $v){
		if(array_key_exists($k,$_POST)) $arrInfo[$k] = $_POST[$k];
	}
	//如果两次密码不一致，说明，需要更新密码
	if($_POST['password'] != $_POST['oldpassword']){
		$_POST['password']=check::strEncryption($_POST['password'],$arrGWeb['jamstr']);
	}

	$objWebInit->saveInfo($_POST,1);
	check::WindowLocation('index.php','page='.$_GET['page']);
}
if ($_GET['action'] == 'del') {
	$userid		= intval($_GET['id']) ;
	if (empty($userid))	check::AlertExit("Submit Error!(userid empty)",1);

	$objWebInit->deleteUser($userid);

	check::AlertExit('删除完成！ ', -1);
}
if ($_GET['action'] == 'edit') {

	$userid = intval($_GET['id']) ;

	if (empty($userid))	check::AlertExit("Submit Error!(userid empty)",1);

	$arrUserinfo = $objWebInit->getUser($userid);
	$arrUserinfo = array_pop($arrUserinfo);

	$arrTemp = array();
	foreach($arrGMeta as $k => $v){
		if($k != 'index') $arrTemp[$k] = $v['name'];
	}

	$arrUserinfo['user_popedom'] = explode(',',$arrUserinfo['user_popedom']);

	// 输出到模板
	$arrMOutput["smarty_assign"]['get'] = $_GET;
	$arrMOutput["smarty_assign"]['arrData'] = $arrUserinfo;
	$arrMOutput["smarty_assign"]['arrGMeta'] = $arrTemp;
	$arrMOutput["smarty_assign"]['FileCallPath'] = $arrGPic['FileCallPath'];
	$arrMOutput["template_file"] = "admin.html";
	$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'user_edit.htm';
	$objWebInit->output($arrMOutput);
}
?>