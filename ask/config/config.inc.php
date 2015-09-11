<?php
/**
 * 行业资讯功能配置文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	news
 */
define('__WEB_ROOT', dirname(__FILE__)."/../..");
require_once(__WEB_ROOT."/config/global.inc.php");
require_once("var.inc.php");
require_once("private.inc.php");
@include_once("type.inc.php");
require_once(__WEB_ROOT."/config/filtrate.inc.php");
header('Content-Type: text/html; charset=UTF-8');
//选定底层功能模块数组
$arrMModule = array('Snoopy','qqwry');

//调用选定的底层功能模块
//GModuleLoad($arrMModule,$arrGModule);

if($_SESSION['user_group'] == '3' || $_SESSION['user_group'] == '2'){
	$arrGWeb['file_static'] = 0;
	$arrGWeb['admin'] = 1;
}

//smarty输出数组
$arrMOutput=array();
$arrMOutput["smarty_assign"]['arrGWeb'] = $arrGWeb;
@$arrMOutput['smarty_assign']['Title'] = $arrGMeta[$arrGWeb['module_id']]['meta']['Title'].' - '.$arrGWeb['name'];
@$arrMOutput['smarty_assign']['Description'] = $arrGMeta[$arrGWeb['module_id']]['meta']['Description'].' - '.$arrGWeb['name'];
@$arrMOutput['smarty_assign']['Keywords'] = $arrGMeta[$arrGWeb['module_id']]['meta']['Keywords'].' - '.$arrGWeb['name'];
$arrMOutput['template_file'] = "frame.html";
?>