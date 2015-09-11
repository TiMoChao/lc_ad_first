<?php
/**
 * 会展信息会展信息全局会展信息会展信息被block会展信息会展信息局变量）
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	exhibition
 */

//会展信息
$arrGPage = array();
$arrGPage['page_size'] = 20;		//会展信息会展信息目
$arrGPage['link_num'] = 3;		//会展信息会展信息目
$arrGPage['page'] = 1;			//页码
$arrGPage['records'] = 0;		//会展信息总数
$arrGPage['page_count'] = 0;		//总页数
$arrGPage['pagestring'] = '';	//会展信息会展信息串
$arrGPage['page_link'] = '';		//会展信息字符串
$arrGPage['page_select'] = '';	//会展信息会展信息
$arrGPage['page_jump'] = '';		//text会展信息跳转
$arrGPage['lang'] = 'zh';		//语言设定,'zh'=中文，'en'=英文

//smarty参数
/*
//会展信息会展信息smarty会展信息会展信息释
$arrGSmarty = array();
$arrGSmarty['left_delimiter']  =  '<?{';
$arrGSmarty['right_delimiter'] =  '}?>';
$arrGSmarty['template_dir'] = __WEB_ROOT.'/templats/'.$arrWeb['templats_id'];
$arrGSmarty['cache_dir'] = __WEB_ROOT.'/cache/';
$arrGSmarty['compile_dir'] = __WEB_ROOT.'/compile/';
$arrGSmarty['plugins_dir'] = array('plugins');
$arrGSmarty['caching'] = true;
$arrGSmarty['cache_lifetime'] = 3600;
*/
$arrGSmarty['main_dir'] = $arrGSmarty['template_dir'].'/'.$arrGWeb['module_id'].'/';
$arrGSmarty['admin_main_dir'] = __WEB_ROOT.'/'.$arrGWeb['module_id'].'/admin/templats/';
$arrGSmarty['adminu_main_dir'] = $arrGSmarty['template_dir'].'/'.$arrGWeb['module_id'].'/adminu/';


?>