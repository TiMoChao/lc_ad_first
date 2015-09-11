<?php
/**
 * EMAIL营销后台管理栏目搜索抓取文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	email
 */
require_once('../config/config.inc.php');
require_once('../checklogin.php');
require_once('../../user/class/user.class.php');

$objWebInit = new user();
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;

//访问权限检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'],'email')) {
	check::AlertExit('对不起，您没有权限访问此页',-1);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	unset($_POST['okgo']);
	//print_r($_POST);

	//数据库连接参数
	require_once('../../user/config/var.inc.php');
	$objWebInit->setDBG($arrGPdoDB);
	$objWebInit->db();

	$arrWhere = array();
	// 构造搜索条件和翻页参数
	if (!empty($_POST['title'])) {
		$arrWhere[] = "user_name LIKE '%" . $_POST['title'] . "%' or real_name LIKE '%" . $_POST['title']."' ";
	}
	if (!empty($_POST['pass']) && ($_POST['pass'] == '1' || $_POST['pass'] == '0')) {
		$arrWhere[] = "pass='".$_POST['pass']."'";
	}

	$strWhere = implode(' AND ', $arrWhere);
	if (!empty($strWhere))	$strWhere = ' WHERE '.$strWhere;

	if(!isset($_POST['page'])||$_POST['page']=='') $_POST['page'] = 1;
	$arrInfoList = $objWebInit->getUserList(($_POST['page']-1)*$_POST['type_id'],$_POST['type_id'],$strWhere);
	unset($arrInfoList['COUNT_ROWS']);

	$arrEmail = array();
	if($arrInfoList) {
		foreach($arrInfoList as $v){
			$arrEmail[] = $v['email'];
		}
		$arrEmail = array_unique($arrEmail);
		$strEmail = implode("\r\n",$arrEmail);
	}
	$arrMOutput["smarty_assign"]['strEmailCount'] = count($arrEmail);
	$arrMOutput["smarty_assign"]['strEmail'] = $strEmail;
	//print_r($arrEmail);
	//exit;
}

// 输出到模板
$arrMOutput["smarty_assign"]['strNav'] = '本站会员Email提取';
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'email/email_user.htm';
$objWebInit->output($arrMOutput);
?>