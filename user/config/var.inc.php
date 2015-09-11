<?php
/**
 * 用户功能全局变量配置文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	user
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
$arrGPdoDB['db_table'] = 'user';
$arrGPdoDB['type_tablepre'] = 'user_';
$arrGPdoDB['db_table_field']=array('user_id'=>'','user_name'=>'','real_name'=>'','password'=>'','user_type'=>'','contactor'=>'','user_group'=>'','user_grade'=>'','user_popedom'=>'','user_bonus'=>0,'country'=> '','province'=>'','city'=>'','area'=>'','structon_tb'=> array('email','company_cn','company_en','address','postcode','tel','mobile','fax','QQ','homepage','intro','buyhelp','delivery','payhelp','photo0','photo1','FileExt','FileExt1'),'lastlog'=>date('Y-m-d H:i:s'),'submit_date'=>date('Y-m-d H:i:s'),'pay'=>'','paydate'=>date('Y-m-d'),'overdate'=>'','clicktimes'=>'','pass'=>'1','user_ip'=>'');//字段数组，将要显示的字段名称写入该数组

//网站公用参数（栏目数据）
$arrGWeb['module_name'] = '会员系统';
$arrGWeb['module_id'] = 'user';

//上传图片参数
$arrGPic = array();
$arrGPic['FileMaxSize'] = 120 * 1024;
$arrGPic['FileCallPath'] = "/uploadfile/".$arrGWeb['module_id']."/";
$arrGPic['FileSavePath'] = __WEB_ROOT."/uploadfile/".$arrGWeb['module_id']."/";
$arrGPic['FileListPicSize'] = 0;
$arrGPic['FileSourPicSize'] = 600;
?>