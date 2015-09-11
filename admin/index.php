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
$objWebInit->output($arrMOutput);
?>