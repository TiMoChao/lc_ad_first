<?php
/**
 * rss列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	rss
 */
require_once('config/config.inc.php');
require_once("class/rss.class.php");

$objWebInit = new rss();
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
$objWebInit->db();

foreach($arrGMeta as $k => $v){
	if(!empty($v['cache'])&&$v['cache'] == 1){
		$arrInfoList[$k] = array('name'=>$v['name']);
		if(is_file('../'.$k.'/config/type.inc.php')){
			@include('../'.$k.'/config/type.inc.php');
		}
		if(!empty($arrMType)){
			foreach($arrMType as $key => $val){
				$arrInfoList[$k]['type'][] = array('type_id'=>$key,'name'=>$val);
			}
		}else{
			$objWebInit->tablename1 = $arrGPdoDB['db_tablepre'].$k.'_type';
			$arrType = $objWebInit->getTypeList(' where type_pass = 1 ');
			$arrMType = $objWebInit->formatTypeList(0,$arrType,false);
			if(!empty($arrMType)){
				foreach($arrMType as $key => $val){
					if(empty($val['type_link'])) $arrInfoList[$k]['type'][] = array('type_id'=>$val['type_id'],'name'=>$val['type_title']);
				}
			}
		}
	}
}

include '../product/block/_menu.php';

// 输出到模板
$arrMOutput["smarty_assign"]['arrData'] = $arrInfoList;
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'index.html';
$objWebInit->output($arrMOutput);

?>