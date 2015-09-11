<?php
/**
 * 共享内存日志生成文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	logshare
 */
define('__WEB_ROOT', dirname(__FILE__)."/../..");
define('__LOG_NUMS', 30);
require_once(__WEB_ROOT."/config/global.inc.php");

//日志操作内存存储块
include_once(__WEBCOMMON_ROOT . '/SharedMemory/SharedMemory.php');
$objShared = System_SharedMemory::factory();
//$objShared->rm('log');
$arrCache_log = $objShared->get($arrGPdoDB['db_name'].'log');
$strIP = check::getIP();
if(!empty($strIP)){
	$objQQWry = new QQWry();
	$objQQWry->qqwry($strIP);
	$strZone = check::gb2utf8($objQQWry->Country).check::gb2utf8($objQQWry->Local);
}
if(empty($strZone)) $strZone = $strIP;
$strMyUrl = $_SERVER["HTTP_REFERER"];
$strTitle = $_GET['title'];

if(empty($arrCache_log)){
	if(empty($_SESSION['user_id'])){
		$arrCache_log['user_log'][] = array('action'=>"来自 ".$strZone." 的访客正在浏览 <a href='".$strMyUrl."'>《".$strTitle."》</a> ",'time'=>time());
	}else{
		$arrCache_log['user_log'][] = array('action'=>"<a href='/user/index/id-".$_SESSION['user_id'].".html'>$_SESSION[nick_name]</a> 正在浏览 <a href='".$strMyUrl."'>《".$strTitle."》</a>",'time'=>time());
	}
	$objShared->set($arrGPdoDB['db_name'].'log', $arrCache_log);
}else{
	if(empty($_SESSION['user_id'])){
		array_unshift($arrCache_log['user_log'],array('action'=>"来自 ".$strZone." 的访客正在浏览 <a href='".$strMyUrl."'>《".$strTitle."》</a> ",'time'=>time()));
	}else{
		array_unshift($arrCache_log['user_log'],array('action'=>"<a href='/user/index/id-".$_SESSION['user_id'].".html'>$_SESSION[nick_name]</a> 正在浏览 <a href='".$strMyUrl."'>《".$strTitle."》</a>",'time'=>time()));

	}
	//只保留最新的__LOG_NUMS个数据
	unset($arrCache_log['user_log'][__LOG_NUMS]);
	$objShared->set($arrGPdoDB['db_name'].'log', $arrCache_log);
}
?>