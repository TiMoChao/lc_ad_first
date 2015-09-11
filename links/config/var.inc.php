<?php
/**
 * 友情链接功能公有全局变量配置文件（可被block访问的网站配置全局变量）
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	links
 */

//
//数据库参数
$arrGPdoDB['db_table'] = 'links';
$arrGPdoDB['db_table_field']=array('id'=>'','type_id'=>1,'structon_tb'=> array('webname','webhost','weblogo','UploadFile','FileExt','summary','width','height'),'submit_date'=>date('Y-m-d H:i:s'),'flag'=>0,'pass'=>1);    //字段数组，将要显示的字段名称写入该数组

//网站公用参数（栏目数据）
$arrGWeb['module_name'] = '友情链接';
$arrGWeb['module_id'] = 'links';
$arrGWeb['cache_links_url'] = $arrGWeb['cache_url'].'/'.$arrGWeb['module_id'];

//上传图片参数
$arrGPic = array();
$arrGPic['FileMaxSize'] = 80 * 1024;
$arrGPic['FileCallPath'] = $arrGWeb['WEB_ROOT_pre']."/uploadfile/".$arrGWeb['module_id']."/";
$arrGPic['FileSavePath'] = __WEB_ROOT."/uploadfile/".$arrGWeb['module_id']."/";
$arrGPic['FileListPicSize'] = 0;
$arrGPic['FileSourPicSize'] = 0;

//静态页面缓存参数
$arrGCache['cache_root'] = $arrGCache['cache_root'].'/'.$arrGWeb['module_id'];
?>