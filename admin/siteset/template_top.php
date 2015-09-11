<?php
/**
 * 后台管理栏目模板在线编辑文件
 *
 * @author		whoneed(whoneed@126.com)
 * @copyright	whoneed.cn
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	admin
 */
require_once('../config/config.inc.php');
require_once('../checklogin.php');

$objWebInit = new ArthurXF();
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;

//访问权限检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'],'siteset')) {
	check::AlertExit('对不起，您没有权限访问此页',-1);
}

//$arrMOutput["template_file"] = "siteset/template_top.htm";
$arrMOutput["smarty_assign"]['strNav'] = '网站模板在线编辑';
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'siteset/template_top.htm';
$objWebInit->output($arrMOutput);
?>