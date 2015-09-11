<?php
/**
 * 图形广告功能公有全局变量配置文件（可被block访问的网站配置全局变量）
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	ads
 */

//
//数据库参数
$arrGPdoDB['db_table'] = 'ads';
$arrGPdoDB['db_table1'] = 'ads_type';
$arrGPdoDB['db_table_field']=array('id'=>'','position'=>'','structon_tb'=> array('webname','webhost','weblogo','UploadFile','FileExt','summary','f_html','b_html'),'submit_date'=>date('Y-m-d H:i:s'),'deadline_date'=>date('Y-m-d H:i:s',strtotime('+1 year')),'height'=>'','width'=>'','pass'=>1);    //字段数组，将要显示的字段名称写入该数组
//网站公用参数（栏目数据）
$arrGWeb['module_name'] = '图形广告';
$arrGWeb['module_id'] = 'ads';
$arrGWeb['cache_ads_url'] = $arrGWeb['cache_url'].'/'.$arrGWeb['module_id'];

//上传图片参数
$arrGPic = array();
$arrGPic['FileMaxSize'] = 500 * 1024;
$arrGPic['FileCallPath'] = "/uploadfile/".$arrGWeb['module_id'];
$arrGPic['FileSavePath'] = __WEB_ROOT."/uploadfile/".$arrGWeb['module_id']."/";
$arrGPic['FileListPicSize'] = 0;
$arrGPic['FileSourPicSize'] = 0;

//广告JS参数
$arrGjs = array();
$arrGjs['JSCallPath'] = $arrGWeb['WEB_ROOT_pre']."/uploadfile/".$arrGWeb['module_id'];
$arrGjs['JSSavePath'] = __WEB_ROOT."/uploadfile/".$arrGWeb['module_id']."/";


//静态页面缓存参数
$arrGCache['cache_root'] = $arrGCache['cache_root'].'/'.$arrGWeb['module_id'];
?>