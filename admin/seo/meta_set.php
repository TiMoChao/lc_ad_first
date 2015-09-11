<?php
/**
 * 后台管理栏目META设置文件
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
	unset($_POST['okgo']);
	$strContentPath = $arrGWeb['cache_url'];
	unset($arrGWeb);
	$strFilename = '../../data/webconfig.inc.php';
	include($strFilename);
	foreach($arrGMeta as $k => $v){
		$arrGMeta[$k]['meta']['Title'] = $_POST[$k.'_Title'];
		$arrGMeta[$k]['meta']['Description'] = $_POST[$k.'_Description'];
		$arrGMeta[$k]['meta']['Keywords'] = $_POST[$k.'_Keywords'];
	}

	$somecontent = '<?php' . "\n" . '$arrGWeb = ' . var_export( $arrGWeb, true ) . ';' . "\n" . '$arrGMeta = ' . var_export( $arrGMeta, true ) . ';' . "\n" . '?>';

	// 首先我们要确定文件存在并且可写。
	if (is_writable($strFilename)) {

		if (!$handle = fopen($strFilename, 'w')) {
			 check::AlertExit("错误：不能打开文件 $strFilename !",-1);
		}

		// 将$somecontent写入到我们打开的文件中。
		if (fwrite($handle, $somecontent) === FALSE) {
			check::AlertExit("错误：不能写入到文件 $strFilename !",-1);
		}
		fclose($handle);
		@set_time_limit(0);
		check::delTreeDirs('../..'.$strContentPath.'/',false);
		check::delTreeDirs($arrGSmarty['cache_dir'],false);
		check::delTreeDirs($arrGSmarty['compile_dir'],false);
		check::AlertExit("成功地写入到文件 $strFilename !",-1);

	} else {
		check::AlertExit("错误：文件 $strFilename 不可写!",-1);
	}

}
//print_r($arrGMeta);

// 输出到模板
$arrMOutput["smarty_assign"]['strNav'] = '网页优化';
$arrMOutput["smarty_assign"]['arrGMeta'] = $arrGMeta;
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'seo/meta_set.htm';
$objWebInit->output($arrMOutput);
?>