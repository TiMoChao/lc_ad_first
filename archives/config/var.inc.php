<?php
/**
 * 档案功能全局变量配置文件（可被block访问的网站配置全局变量）
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	archives
 */


//数据库参数
/*
//本栏目使用其他的数据库就取消此段注释
$arrGPdoDB = array();
$arrGPdoDB['db_driver'] = "mysql";
$arrGPdoDB['db_host'] = 'localhost';
$arrGPdoDB['db_name'] = '';
$arrGPdoDB['db_char'] = "utf8";
$arrGPdoDB['dsn'] = $arrGPdoDB['db_driver'].":host=".$arrGPdoDB['db_host'].";dbname=".$arrGPdoDB['db_name'].";charset=".$arrGPdoDB['db_char'];
$arrGPdoDB['db_user'] = '';
$arrGPdoDB['db_password'] = '';
*/
$arrGPdoDB['db_table'] = 'archives';
$arrGPdoDB['db_table1'] = 'archives_type';
$arrGPdoDB['db_table_field']=array('id'=>'','structon_tb'=> array('meta_Title','meta_Description','meta_Keywords','intro',));   //字段数组，将要显示的字段名称写入该数组

//网站公用参数（栏目数据）
$arrGWeb['module_name'] = '单页栏目';
$arrGWeb['module_id'] = 'archives';
$arrGWeb['cache_archives_url'] = $arrGWeb['cache_url'].'/'.$arrGWeb['module_id'];

//静态页面缓存参数
$arrGCache['cache_root'] = $arrGCache['cache_root'].'/'.$arrGWeb['module_id'];
//$arrGCache['cache_filenum'] = 1000;
//$arrGCache['cache_time'] = 30*1;
?>