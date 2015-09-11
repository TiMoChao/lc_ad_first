<?php
/**
 * 用户系统私有全局变量配置文件（不被block访问的网站配置全局变量）
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	news
 */

//smarty参数
/*
//本栏目使用其他的smarty参数就取消此段注释
$arrGSmarty = array();
$arrGSmarty['left_delimiter']  =  '<?{';
$arrGSmarty['right_delimiter'] =  '}?>';
$arrGSmarty['template_dir'] = __WEB_ROOT.'/templats/'.$arrGWeb['templats_id'];
$arrGSmarty['cache_dir'] = __WEB_ROOT.'/cache/';
$arrGSmarty['compile_dir'] = __WEB_ROOT.'/compile/';
$arrGSmarty['plugins_dir'] = array('plugins');
$arrGSmarty['caching'] = true;
$arrGSmarty['cache_lifetime'] = 3600;
*/
$arrGSmarty['main_dir'] = $arrGSmarty['template_dir'].'/'.$arrGWeb['module_id'].'/';
$arrGSmarty['admin_main_dir'] = __WEB_ROOT.'/'.$arrGWeb['module_id'].'/admin/templats/';

?>