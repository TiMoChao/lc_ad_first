<?php
/**
 * 用户系统功能配置文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	user
 */
define('__WEB_ROOT', dirname(__FILE__)."/../..");
require_once(__WEB_ROOT."/config/global.inc.php");
require_once("var.inc.php");
require_once("private.inc.php");
header('Content-Type: text/html; charset=UTF-8');

//smarty输出数组
$arrMOutput=array();
$arrMOutput["smarty_assign"]['arrGWeb'] = $arrGWeb;
$arrMOutput['smarty_assign']['Title'] = '会员中心 - '.$arrGWeb['name'];
$arrMOutput['smarty_assign']['Description'] = '会员中心 - '.$arrGWeb['name'];
$arrMOutput['smarty_assign']['Keywords'] = '会员中心 - '.$arrGWeb['name'];
$arrMOutput['template_file'] = "frame.html";
?>