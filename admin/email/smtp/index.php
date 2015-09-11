<?php
/**
 * EMAIL营销后台管理栏目SMTP邮局列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	email
 */
require_once('../../config/config.inc.php');
require_once('../../checklogin.php');

$objWebInit = new ArthurXF();
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
$arrGPage['page_size'] = 20;
$objWebInit->arrGPage = $arrGPage;

//访问权限检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'],'email')) {
	check::AlertExit('对不起，您没有权限访问此页',-1);
}

$strFilename = '../../../data/smtp.inc.php';
@include($strFilename);

if(isset($_GET['action'])){
	if($_GET['action']=='del') {
		foreach ($_POST['select'] as $val){
			unset($arrMsmtp[$val]);
		}
		//$arrMsmtp = array_values($arrMsmtp);
	}
	if($_GET['action']=='check') {
		foreach ($_POST['select'] as $val){
			$arrMsmtp[$val]['pass'] = 1;
		}
	}
	if($_GET['action']=='uncheck') {
		foreach ($_POST['select'] as $val){
			$arrMsmtp[$val]['pass'] = 0;
		}
	}
	$somecontent = '<?php' . "\n" . '$arrMsmtp = ' . var_export( $arrMsmtp, true ) . ';' . "\n" . '?>';

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
		check::Alert("成功地写入到文件 $strFilename !");

	} else {
		check::AlertExit("错误：文件 $strFilename 不可写!",-1);
	}
}
//生成当前页显示数据
if(empty($_GET['page'])) $start = 0;
else $start = intval($_GET['page']);
if($start > 0 ) $start -= 1;
$start *= $arrGPage['page_size'];
$max = $start+$arrGPage['page_size'];

if(!empty($arrMsmtp)){
	$intTemp = 0;
	foreach($arrMsmtp as $k => $v){
		if($intTemp == $max) break;
		if($intTemp >= $start) $arrData[$k] = $v;
		$intTemp++;
	}
	$intRows = count($arrMsmtp);

	$arrMOutput["smarty_assign"]['arrData'] = $arrData;
	$arrMOutput["smarty_assign"]['start'] = $start;
	$arrMOutput["smarty_assign"]['max'] = $max;
}else $intRows = 0;
//静态url处理
$strLink = '';
if (!empty($arrLink)) $strLink = implode('&',$arrLink);
//翻页跳转link
$strPage= $objWebInit->makeInfoListPage($intRows,$strLink);

// 输出到模板
$arrMOutput["smarty_assign"]['strNav'] = 'SMTP邮局管理';
$arrMOutput["smarty_assign"]['strPage'] = $strPage;
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'email/smtp/index.htm';
$objWebInit->output($arrMOutput);
?>