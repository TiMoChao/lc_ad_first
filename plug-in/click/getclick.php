<?php
/**
 * 取得点击率文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	clicks
 */
if(isset($_GET['module_id'])&&isset($_GET['id'])){
	require_once('../../'.$_GET['module_id'].'/config/config.inc.php');
	require_once('../../'.$_GET['module_id'].'/class/'.$_GET['module_id'].'.class.php');

	$objWebInit = new $_GET['module_id']();
	//数据库连接参数
	$objWebInit->setDBG($arrGPdoDB);
	$objWebInit->db();
	$intID = intval($_GET['id']);
	$click = $objWebInit->getClicktimes($intID);
	if(empty($_GET['noshow'])) echo "document.write('".$click['clicktimes']."')";
}