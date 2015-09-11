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

//
//会展信息数
/*
//会展信息会展信息会展信息会展信息注释
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
$arrGPdoDB['db_table'] = 'exhibition';
$arrGPdoDB['db_table1'] = 'exhibition_type';
$arrGPdoDB['db_table_field']=array('id'=>'','type_id'=>1,'type_roue_id'=>'','user_id'=>1,'tag'=>'','bedeck'=>0,'title'=>'','title_md5'=>'','linkurl'=>'','summary'=>'','structon_tb'=>array('meta_Title','meta_Description','meta_Keywords','author','intro','author','photo','photo_narrate'),'thumbnail'=>'','submit_date'=>date('Y-m-d H:i:s'),'topflag'=>0,'recommendflag'=>0,'stars'=>0,'clicktimes'=>0,'pass'=>1,'province'=>'','city'=>'','area'=>'');   //会展信息会展信息会展信息会展信息该数组
$arrGPdoDB['htmlspecialchars'] = array('intro','summary','tag');

//会展信息会展信息会展信息
$arrGWeb['module_name'] = '会展信息';
$arrGWeb['module_id'] = 'exhibition';
$arrGWeb['cache_exhibition_url'] = $arrGWeb['cache_url'].'/'.$arrGWeb['module_id'];
$arrGWeb['db_summary_len'] = 100;	//会展信息会展信息,会展信息255,会展信息改，需会展信息会展信息段长度

//会展信息参数
$arrGPic = array();
$arrGPic['FileMaxSize'] = 150 * 1024;
$arrGPic['FileCallPath'] = $arrGWeb['WEB_ROOT_pre']."/uploadfile/".$arrGWeb['module_id']."/";
$arrGPic['FileSavePath'] = __WEB_ROOT."/uploadfile/".$arrGWeb['module_id']."/";
$arrGPic['FileListPicSize'] = 0;
$arrGPic['FileSourPicSize'] = 600;

//静态会展信息参数
$arrGCache['cache_root'] = $arrGCache['cache_root'].'/'.$arrGWeb['module_id'];

?>