<?php
/**
 * 会员后台管理栏目首页文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	admin
 */
require_once('config/config.inc.php');
require_once('checklogin.php');

$objWebInit = new ArthurXF();
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;

$arrInfo = array();
$arrInfo['serverinfo'] = PHP_OS.' / PHP v'.PHP_VERSION;
$arrInfo['serverinfo'] .= @ini_get('safe_mode') ? ' / 安全模式' : NULL;
$arrDrivers = pdo_drivers();
$conn = new PDO($arrGPdoDB['dsn'], $arrGPdoDB['db_user'], $arrGPdoDB['db_password']);
foreach($arrDrivers as $k => $v){
	if($v == "mysql") $arrInfo['databaseinfo'] = strtoupper($arrDrivers[$k]).' '.$conn->getAttribute(PDO::ATTR_SERVER_VERSION);
}
if(@ini_get("file_uploads")) {
	$arrInfo['fileupload'] = "允许 - 文件 ".ini_get("upload_max_filesize")." - 表单：".ini_get("post_max_size");
} else {
	$arrInfo['fileupload'] = "<font color=\"red\">禁止</font>";
}
if (get_cfg_var('register_globals')){
	$arrInfo['onoff'] ="打开";
}else{
	$arrInfo['onoff'] = "关闭";
}

$arrMOutput["template_file"] = "main_frame.htm";
$arrMOutput["smarty_assign"]['arrInfo'] = $arrInfo;
$objWebInit->output($arrMOutput);
?>