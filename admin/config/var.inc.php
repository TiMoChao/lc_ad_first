<?php
/**
 * 后台功能全局变量配置文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	admin
 */

//smarty参数
$arrGSmarty = array();
$arrGSmarty['left_delimiter']  =  '<?{';
$arrGSmarty['right_delimiter'] =  '}?>';
$arrGSmarty['template_dir'] = __WEB_ROOT.__WEBADMIN_ROOT.'/templats/';
$arrGSmarty['cache_dir'] = __WEB_ROOT.'/cache/';
$arrGSmarty['compile_dir'] = __WEB_ROOT.'/compile/';
$arrGSmarty['plugins_dir'] = array('plugins');
$arrGSmarty['admin_main_dir'] = $arrGSmarty['template_dir'];
$arrGSmarty['caching'] = false;
?>