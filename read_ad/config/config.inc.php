<?php
/**
 * 阅报亭广告功能配置文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	read_ad
 */
define('__WEB_ROOT', dirname(__FILE__)."/../..");
require_once(__WEB_ROOT."/config/global.inc.php");
require_once("var.inc.php");
require_once("private.inc.php");
@include_once("type.inc.php");
require_once(__WEB_ROOT."/config/filtrate.inc.php");
header('Content-Type: text/html; charset=UTF-8');

//smarty输出数组
$arrMOutput=array();
$arrMOutput["smarty_assign"]['arrGWeb'] = $arrGWeb;
@$arrMOutput['smarty_assign']['Title'] = $arrGMeta[$arrGWeb['module_id']]['meta']['Title'].' - '.$arrGWeb['name'];
@$arrMOutput['smarty_assign']['Description'] = $arrGMeta[$arrGWeb['module_id']]['meta']['Description'].' - '.$arrGWeb['name'];
@$arrMOutput['smarty_assign']['Keywords'] = $arrGMeta[$arrGWeb['module_id']]['meta']['Keywords'].' - '.$arrGWeb['name'];
$arrMOutput['template_file'] = "frame.html";
?>