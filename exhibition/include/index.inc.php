<?php
/**
 * 会展信息 会展信息
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	exhibition
 */
require_once('config/config.inc.php');
require_once("class/exhibition.class.php");

$objWebInit = new exhibition();
//会展信息接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
//会展信息
$objWebInit->arrGPage = $arrGPage;
$objWebInit->db();

if(!is_array($arrMType)||empty($arrMType)){
	$arrMType = $objWebInit->getTypeList();
	$arrMType = $objWebInit->formatTypeList(0,$arrMType);
}

foreach($arrMType as $k=>$v){
	$arrTopexhibition[$k] = array();
	if(is_array($v)) {
		$arrTopexhibition[$k]['type_title'] = $v['type_title'];
		$arrTopexhibition[$k]['type_id'] = $v['type_id'];
	}else{
		$arrTopexhibition[$k]['type_title'] = $v;
		$arrTopexhibition[$k]['type_id'] = $k;
	}
	$arrTopexhibition[$k]['datas'] = $objWebInit->getInfoList("where pass=1 and type_id=".$arrTopexhibition[$k]['type_id'],"  ORDER BY recommendflag DESC,clicktimes DESC,submit_date DESC", 0, 12,true,'',false);
}

//print_r($arrTopexhibition);
// 会展信息板
$arrMOutput["smarty_assign"]['arrMArea'] = $arrMArea;
$arrMOutput["smarty_assign"]['arrTopexhibition'] = $arrTopexhibition;
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'index.html';
$objWebInit->output($arrMOutput);
?>