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
	if($_POST['file_suffix'][0] != '.') {
		check::AlertExit("错误：后缀名的.不能少!",-1);
	}
	if($_POST['file_static']) {
		if(ini_get('allow_url_fopen')){	
			if(file_get_contents('http://www.baidu.com')){
			}else{
				check::AlertExit("服务器DNS解析，没有开启(Linux 在/etc/reslov.conf设置正确的DNS)!",-1);
			}		
		}else{
			check::AlertExit("allow_url_fopen未开启，请到php.ini设置allow_url_fopen = On!",-1);
		}		
	}	

	unset($_POST['okgo']);
	unset($arrGWeb);
	

	$strFilename = '../../data/webconfig.inc.php';
	include($strFilename);

	foreach($_POST as $k=>$v){
		$arrGWeb[$k] = $_POST[$k];
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
		check::Alert("成功地写入到文件 $strFilename !",-1);

	} else {
		check::AlertExit("错误：文件 $strFilename 不可写!",-1);
	}

}

// 输出到模板
$arrMOutput["smarty_assign"]['strNav'] = '链接优化';
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'seo/link_set.htm';
$objWebInit->output($arrMOutput);
?>