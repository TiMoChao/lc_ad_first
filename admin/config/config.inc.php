<?php
/**
 * 后台功能配置文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	admin
 */
define('__WEB_ROOT', dirname(__FILE__)."/../..");
require_once(__WEB_ROOT."/config/global.inc.php");
require_once("var.inc.php");
header('Content-Type: text/html; charset=UTF-8');

//smarty输出数组
$arrMOutput=array();
$arrMOutput["template_file"] = "index.htm";
$arrMOutput["smarty_assign"]['arrGWeb'] = $arrGWeb;
?>