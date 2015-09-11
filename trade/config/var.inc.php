<?php
/**
 * 供求信息功能公有全局变量配置文件（可被block访问的网站配置全局变量）
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	trade
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
$arrGPdoDB['htmlspecialchars'] = array('intro','summary','tag');
*/
$arrGPdoDB['db_table'] = 'trade';
$arrGPdoDB['db_table1'] = 'trade_type';
$arrGPdoDB['db_table_field']=array('id'=>'','type_id'=>1,'type_roue_id'=>'','user_id'=>1,'tag'=>'','bedeck'=>0,'title'=>'','title_md5'=>'','linkurl'=>'','summary'=>'','country'=> '','province'=>'','city'=>'','area'=>'','structon_tb'=>array('meta_Title','meta_Description','meta_Keywords','author','intro','photo','video','photo_narrate'),'thumbnail'=>'','submit_date'=>date('Y-m-d H:i:s'),'topflag'=>0,'recommendflag'=>0,'stars'=>0,'clicktimes'=>0,'pass'=>1);   //字段数组，将要显示的字段名称写入该数组
$arrGPdoDB['htmlspecialchars'] = array('intro','summary','tag');

//网站公用参数（栏目数据）
$arrGWeb['module_name'] = '供求信息';
$arrGWeb['module_id'] = 'trade';
$arrGWeb['cache_trade_url'] = $arrGWeb['cache_url'].'/'.$arrGWeb['module_id'];
$arrGWeb['db_summary_len'] = 100;	//摘要生成长度设定,不能超过255,安装后修改，需要去手动调整表字段长度

//上传图片参数
$arrGPic = array();
$arrGPic['FileMaxSize'] = 150 * 1024;
$arrGPic['FileCallPath'] = $arrGWeb['WEB_ROOT_pre']."/uploadfile/".$arrGWeb['module_id']."/";
$arrGPic['FileSavePath'] = __WEB_ROOT."/uploadfile/".$arrGWeb['module_id']."/";
$arrGPic['FileListPicSize'] = 0;
$arrGPic['FileSourPicSize'] = 600;

//静态页面缓存参数
$arrGCache['cache_root'] = $arrGCache['cache_root'].'/'.$arrGWeb['module_id'];

?>