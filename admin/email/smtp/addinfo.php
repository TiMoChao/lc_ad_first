<?php
/**
 * EMAIL营销后台管理栏目新增SMTP邮局文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	illegal
 */
require_once('../../config/config.inc.php');
require_once('../../checklogin.php');

$objWebInit = new ArthurXF();
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;

//访问权限检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'],'email')) {
	check::AlertExit('对不起，您没有权限访问此页',-1);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	unset($_POST['okgo']);
	$strFilename = '../../../data/smtp.inc.php';
	@include($strFilename);
	if(empty($_POST['ssl'])) $_POST['ssl']=0;
	if(empty($_POST['auth'])) $_POST['auth']=0;
	$arrMsmtp[] = array(
		'host'=>$_POST['host'],
		'port'=>$_POST['port'],
		'username'=>$_POST['username'],
		'password'=>$_POST['password'],
		'ssl'=>$_POST['ssl'],
		'auth'=>(bool)$_POST['auth'],
		'replyuname'=>$_POST['replyuname'],
		'replymail'=>$_POST['replymail'],
		'pass'=>1,
		);
	krsort($arrMsmtp);
	$somecontent = '<?php' . "\n" . '$arrMsmtp = ' . var_export( $arrMsmtp, true ) . ';' . "\n" . '?>';

	// 首先我们要确定文件存在并且可写。
	if (!$handle = fopen($strFilename, 'w')) {
		  check::AlertExit("错误：不能以'写'模式打开文件 $strFilename !",-1);
	}

	// 将$somecontent写入到我们打开的文件中。
	if (fwrite($handle, $somecontent) === FALSE) {
		check::AlertExit("错误：不能写入到文件 $strFilename !",-1);
	}
	fclose($handle);

	if(empty($_GET['page']))
		$page = '';
	else
		$page = 'page=' . $_GET['page'];

	check::WindowLocation('index.php',$page);
}


// 输出到模板
$arrMOutput["smarty_assign"]['strNav'] = '新增SMTP邮局';
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'email/smtp/submit.htm';
$objWebInit->output($arrMOutput);
?>