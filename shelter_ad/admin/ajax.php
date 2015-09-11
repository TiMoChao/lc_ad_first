<?php
/**
 * 公司风采录入验证文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	shelter_ad
 */
require_once('../config/config.inc.php');
require_once("../class/shelter_ad.class.php");
require_once ('../../admin/checklogin.php');

$objWebInit =& new shelter_ad();
//数据库连接参数
$objWebInit->arrGPdoDB = $arrGPdoDB;
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
$objWebInit->db();

//访问权限检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'])) {
	AlertExit('对不起，您没有权限访问此页',-1);
}

//用于ajax验证是否存在
if (!empty($_POST['title'])){
	$arrTemp = array();
	$arrTemp = explode('|',$_POST['brand_id']);
	$_POST['brand_id'] = $arrTemp[0];
	$_POST['brand'] = $arrTemp[1];

	$arrTemp = array();
	if($_POST['title'] != '') $_POST['title_md5'] = md5($_POST['brand'].$_POST['model'].$_POST['title']);
	$arrTemp = $objWebInit->getInfoList("where title_md5='$_POST[title_md5]'","", 0, 1);
	if($arrTemp['COUNT_ROWS']!=0) echo '1';
	else echo '0';

}

