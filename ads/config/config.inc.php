<?php
/**
 * 图形广告功能配置文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	ads
 */
define('__WEB_ROOT', dirname(__FILE__)."/../..");
require_once(__WEB_ROOT."/config/global.inc.php");
require_once("var.inc.php");
require_once("private.inc.php");
require_once("type.inc.php");
header('Content-Type: text/html; charset=UTF-8');
//错误开关
error_reporting($arrGWeb['error_report']);
//smarty输出数组
$arrMOutput=array();
$arrMOutput["smarty_assign"]['arrGWeb'] = $arrGWeb;
$arrMOutput['template_file'] = "frame.html";
?>