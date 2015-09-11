<?php
/**
 * 用户后台首页文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 */
require_once('config/config.inc.php');
require_once("checklogin.php");

require_once("../user/class/user.class.php");
$objWebInit = new ArthurXF();
//smarty参数
$arrGSmarty['caching'] = false;
$objWebInit->arrGSmarty = $arrGSmarty;

//include 'largess.php';
//include 'lastlog.php';

//全站公用block
//@include '../_block.php';

//print_r($_SESSION);
//输出到模板
$arrMOutput["smarty_assign"]["info"] = $_SESSION;
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'index.html';
$objWebInit->output($arrMOutput);
?>