<?php
/**
 * ȡ�õ�����ļ�
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
	//���ݿ����Ӳ���
	$objWebInit->setDBG($arrGPdoDB);
	$objWebInit->db();
	$intID = intval($_GET['id']);
	$arr = $objWebInit->getInfoWhere(' where id='.$intID,'submit_date');
	if(!empty($_GET['format'])) $arr['submit_date'] = date($_GET['format'],strtotime($arr['submit_date']));
	if(empty($_GET['noshow'])) echo "document.write('".$arr['submit_date']."')";
}