<?php
/**
 * 后台管理栏目清空静态页面文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
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
if (! $objWebInit->checkPopedomG($_SESSION['user_id'],'seo')) {
	check::AlertExit('对不起，您没有权限访问此页',-1);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	@set_time_limit(0);
	check::delTreeDirs('../..'.$arrGWeb['cache_url'].'/',false);
	check::delTreeDirs($arrGSmarty['cache_dir'],false);
	check::delTreeDirs($arrGSmarty['compile_dir'],false);
	check::AlertExit("网站静态页面更新成功 !",-1);
}
// 输出到模板
$arrMOutput["smarty_assign"]['strNav'] = '静态页面更新';
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'seo/web_update.htm';
$objWebInit->output($arrMOutput);
?>