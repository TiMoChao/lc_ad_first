<?php
/**
 * 动态新闻功能配置文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	install
 */
define('__WEB_ROOT', dirname(__FILE__)."/../..");
require_once(__WEB_ROOT."/config/global.inc.php");
require_once(__WEB_ROOT."/config/filtrate.inc.php");
header('Content-Type: text/html; charset=UTF-8');

$arrGWeb['Copyright'] = 'Copyright &copy; 2005-'.date('Y').' <b><a href="http://www.bizeway.com" title="上海网务网络信息有限公司" target="_blank">上海网务网络信息有限公司</a></b>, All Rights Reserved .';		//版权信息
$arrGWeb['templats_root'] = $arrGWeb['WEB_ROOT_pre'].'/install/templates/';
$arrGSmarty['template_dir'] = __WEB_ROOT.'/install/templates/';
$arrGSmarty['compile_dir'] = __WEB_ROOT.'/compile/';
$arrGSmarty['main_dir'] = $arrGSmarty['template_dir'].'/';

//smarty输出数组
$arrMOutput=array();
$arrMOutput["smarty_assign"]['arrGWeb'] = $arrGWeb;
$arrMOutput['template_file'] = "install.html";
?>