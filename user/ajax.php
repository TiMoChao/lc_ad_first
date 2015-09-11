<?php
/**
 * 会员栏目验证用户名文件
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

//用于ajax验证是否存在
if (!empty($_POST['user_name'])){
	$arrPost = array($_POST['user_name']);
	if (count($objWebInit->getUserWhere("where user_name=? ",$arrPost)) != 0) {
		echo '1';
	}
	else echo '0';
}
