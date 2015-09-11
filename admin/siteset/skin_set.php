<?php
/**
 * 后台管理栏目模板设置文件
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
if (! $objWebInit->checkPopedomG($_SESSION['user_id'],'siteset')) {
	check::AlertExit('对不起，您没有权限访问此页',-1);
}

$arrTreeDirs= array();
check::mapTreeDirs('../../templates',false,false);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$arrTemp = array();
	$arrTemp['cache_url'] = $arrGWeb['cache_url'];
	$arrTemp['cache_dir'] = $arrGSmarty['cache_dir'];
	$arrTemp['compile_dir'] = $arrGSmarty['compile_dir'];
	unset($_POST['okgo']);
	unset($arrGWeb);
	$strFilename = '../../data/webconfig.inc.php';
	include($strFilename);
	foreach($arrGWeb as $k=>$v){
		foreach($_POST as $k1=>$v1){
			if($k == $k1) $arrGWeb[$k] = $_POST[$k1];
		}
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
		check::delTreeDirs('../..'.$arrTemp['cache_url'].'/',false);
		check::delTreeDirs($arrTemp['cache_dir'],false);
		check::delTreeDirs($arrTemp['compile_dir'],false);
		check::AlertExit("模板成功地设置为 $arrGWeb[templates_id] !",-1);
	} else {
		check::AlertExit("错误：文件 $strFilename 不可写!",-1);
	}

}
// 输出到模板
$arrMOutput["smarty_assign"]['strNav'] = '模板设定管理';
$arrMOutput["smarty_assign"]['arrSkin'] = $arrTreeDirs;
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'siteset/skin_set.htm';
$objWebInit->output($arrMOutput);
?>