<?php
/**
 * 会员栏目二星会员mail验证文件文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	user
 */
require_once('config/config.inc.php');
require_once("class/user.class.php");
$objWebInit = new user();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
$objWebInit->db();
$strWhere = " and nike_name = '$_GET[b]'";
if($objWebInit->updateUserGrade(2,$_GET['a'],$strWhere)){
	check::Alert("邮件验证成功!");
}

// 输出到模板
//$arrMOutput["smarty_debug"] = false;
//print_r($_REQUEST);
//$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'templats/index1.html';
//$objWebInit->output($arrMOutput);
?>