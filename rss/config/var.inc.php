<?php
/**
 * rss功能公有全局变量配置文件（可被block访问的网站配置全局变量）
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	rss
 */

//
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
$arrGPdoDB['db_tablepre'] = '';
*/

//网站公用参数（栏目数据）
$arrGWeb['module_name'] = '聚合内容';
$arrGWeb['module_id'] = 'rss';

//上传图片参数
$arrGPic = array();
$arrGPic['FileMaxSize'] = 150 * 1024;
$arrGPic['FileCallPath'] = $arrGWeb['WEB_ROOT_pre']."/uploadfile/";
$arrGPic['FileSavePath'] = __WEB_ROOT."/uploadfile/";
$arrGPic['FileListPicSize'] = 0;

//静态页面缓存参数
$arrGCache['cache_root'] = $arrGCache['cache_root'].'/'.$arrGWeb['module_id'];

?>