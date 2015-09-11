<?php
/**
 * 共享内存日志显示文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	user
 */
include_once(__WEBCOMMON_ROOT . '/SharedMemory/SharedMemory.php');

$objShared = System_SharedMemory::factory();

$arrCache_log = $objShared->get($arrGPdoDB['db_name'].'log');
//print_r($arrCache_log);

// 输出到模板
$arrMOutput["smarty_assign"]['arrCache_log'] = $arrCache_log;
?>