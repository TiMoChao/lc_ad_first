<?php
/**
 * 档案后台管理栏目修改文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	archives
 */
require_once('../config/config.inc.php');
require_once("../class/archives.class.php");
require_once ('../../user/class/user.class.php');
require_once ('../..'.__WEBADMIN_ROOT.'/checklogin.php');

$objWebInit = new archives();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
$objWebInit->db();

//访问权限检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'])) {
	check::AlertExit('对不起，您没有权限访问此页',-1);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST['id'])){
		check::AlertExit("错误：所属栏目错误!",-1);
	}
	$_POST['intro'] = check::SqlFilter($_POST['intro'],'STRING');
	$objWebInit->saveInfo($_POST,2);

	//生成静态页面
	$objWebInit->updateCache($_POST['id'],'',$arrMOutput);

	check::WindowLocation('index.php','id='.$_POST['id']);
}

// 取得文章信息
$arrInfo = $objWebInit->getInfo($_GET['id']);

// 输出到模板
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['get'] = $_GET;
$arrMOutput["smarty_assign"]['archives_title'] = $arrMArchivesType[$_GET['id']];
$arrMOutput["smarty_assign"]['arrData'] = $arrInfo;
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'submit.htm';
$objWebInit->output($arrMOutput);
?>