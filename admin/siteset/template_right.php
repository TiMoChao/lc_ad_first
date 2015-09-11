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

if(empty($_GET['path'])){
	$arrMOutput["template_file"] = 'siteset/template_right_index.htm';
}else{
	$path = $_GET['path'];

	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$strFileName = $_SESSION['fileName'];
		$content = str_replace('\\','',$_POST['content']);

		if(is_writable($strFileName)) {
			$fp = fopen($strFileName,'w');
			fputs($fp,$content);
			fclose($fp);
			check::AlertExit('修改成功',-1);
		}else{
			check::AlertExit('很遗憾，template/ 下文件没有写权限！',-1);
		}
	}


	$strFileName = __WEB_ROOT.'/templates/'.$arrGWeb['templates_id'].'/'.$path;
	$_SESSION['fileName'] = $strFileName;

	$fp = fopen($strFileName,'r');
	$contents = fread($fp, filesize($strFileName));
	fclose($fp);

	//文件类型
	$opeType = substr(strrchr($path,'.'),1);

	$arrMOutput["smarty_assign"]['contents'] = $contents;
	$arrMOutput["smarty_assign"]['strType'] = $opeType;
	$arrMOutput["template_file"] = 'siteset/template_right.htm';
}

// 输出到模板
$objWebInit->output($arrMOutput);
?>