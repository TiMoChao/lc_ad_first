<?php
/**
 * 多媒体 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	multimedia_ad
 */
require_once('config/config.inc.php');
require_once("class/multimedia_ad.class.php");


$objWebInit = new multimedia_ad();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
//翻页参数
$objWebInit->arrGPage = $arrGPage;
$objWebInit->db();


if(!is_array($arrMType)||empty($arrMType)){
	$arrMType = $objWebInit->getTypeList();
	$arrMType = $objWebInit->formatTypeList(0,$arrMType);
}

foreach($arrMType as $k=>$v){
	$arrTopmultimedia_ad[$k] = array();
	if(is_array($v)) {
		$arrTopmultimedia_ad[$k]['type_title'] = $v['type_title'];
		$arrTopmultimedia_ad[$k]['type_id'] = $v['type_id'];
	}else{
		$arrTopmultimedia_ad[$k]['type_title'] = $v;
		$arrTopmultimedia_ad[$k]['type_id'] = $k;
	}
	$arrTopmultimedia_ad[$k]['datas'] = $objWebInit->getInfoList("where pass=1 and type_id=".$arrTopmultimedia_ad[$k]['type_id'],"  ORDER BY recommendflag DESC,clicktimes DESC,submit_date DESC", 0, 12,true,'',false);
}

// 输出到模板
$arrMOutput["smarty_assign"]['arrTopmultimedia_ad'] = $arrTopmultimedia_ad;
$arrMOutput["smarty_assign"]['arrMType'] = $arrMType;
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'index.html';
$objWebInit->output($arrMOutput);
?>