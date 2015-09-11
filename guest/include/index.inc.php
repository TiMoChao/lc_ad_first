<?php
/**
 * guest列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	guest
 */
require_once('config/config.inc.php');
require_once("class/guest.class.php");

$objWebInit = new guest();
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;

include('../plug-in/logshare/log.php');

//全站公用block
@include '../_block.php';


// 输出到模板
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'index.html';
$objWebInit->output($arrMOutput);

?>