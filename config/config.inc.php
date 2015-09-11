<?php
/**
 * 网站框架配置文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	frame
 */
define('__WEB_ROOT', dirname(__FILE__)."/..");
require_once(__WEB_ROOT.'/config/global.inc.php');
require_once('filtrate.inc.php');
header('Content-Type: text/html; charset=UTF-8');

//开启底层功能类
#



//smarty输出数组
$arrMOutput=array();
$arrMOutput['smarty_assign']['arrGWeb'] = $arrGWeb;
if($arrGMeta['index']['meta']['Title'] == '') $arrMOutput['smarty_assign']['Title'] = $arrGWeb['name'];
else $arrMOutput['smarty_assign']['Title'] = $arrGMeta['index']['meta']['Title'].' - '.$arrGWeb['name'];
@$arrMOutput['smarty_assign']['Description'] = $arrGMeta['index']['meta']['Description'];
@$arrMOutput['smarty_assign']['Keywords'] = $arrGMeta['index']['meta']['Keywords'];
$arrMOutput['template_file'] = "frame.html";
?>