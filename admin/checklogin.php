<?php
/**
 * 会员登录检测文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	admin
 */

if(empty($_SESSION['user_id'])){
	echo '<script language="JavaScript">parent.location="'.$arrGWeb['WEB_ROOT_pre'].__WEBADMIN_ROOT.'/login.php";</script>';
	exit;
}else{
	if($_SESSION['user_group'] != 3 && $_SESSION['user_group'] != 2){
		echo '<script language="JavaScript">alert("无管理权限！");parent.location="'.$arrGWeb['WEB_ROOT_pre'].__WEBADMIN_ROOT.'/login.php";</script>';
		exit;
	}
	if($arrGPdoDB['PDO_CACHE']) $arrGPdoDB['PDO_CACHE'] = 2;
	if(!empty($arrGSmarty['admin_template_dir'])) $arrGSmarty['template_dir'] = $arrGSmarty['admin_template_dir'];
	$arrGSmarty['caching'] = false;
}
?>