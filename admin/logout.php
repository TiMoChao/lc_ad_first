<?php
/**
 * 后台会员退出登录文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	user
 */
@session_start();
echo "<script>top.location='".$_SESSION['prefix']."/'</script>";
session_destroy();
//echo "<script>alert($arrGWeb['WEB_ROOT_pre'])</script>";
?>