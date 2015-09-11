<?php
/**
 * 会员栏目退出登录文件
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

//header("Location: /");
?>