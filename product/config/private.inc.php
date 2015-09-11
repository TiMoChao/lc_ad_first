<?php
/**
 * 商展信息功能私有全局变量配置文件（不被block访问的网站配置全局变量）
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	product
 */

//翻页参数
$arrGPage = array();
$arrGPage['page_size'] = 20;		//每页显示的记录数目
$arrGPage['link_num'] = 3;		//显示页码链接的数目
$arrGPage['page'] = 1;			//页码
$arrGPage['records'] = 0;		//表中记录总数
$arrGPage['page_count'] = 0;		//总页数
$arrGPage['pagestring'] = '';	//前后分页链接字符串
$arrGPage['page_link'] = '';		//页码链接字符串
$arrGPage['page_select'] = '';	//表单跳转页字符串
$arrGPage['page_jump'] = '';		//text输入页码跳转
$arrGPage['lang'] = 'zh';		//语言设定,'zh'=中文，'en'=英文

//smarty参数
/*
//本栏目使用其他的smarty参数就取消此段注释
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