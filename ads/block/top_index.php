<?php
/**
 * 图形广告文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	ads
 */
if (is_object($objWebInit)) {
	if(!isset($objads)){
		include_once(__WEB_ROOT."/ads/class/ads.class.php");
		include_once(__WEB_ROOT."/ads/config/var.inc.php");
		$objads = new ads();
		$objads->setDBG($arrGPdoDB);
		$objads->arrGPic = $arrGPic;
		if(is_object($objWebInit->db)) $objads->db = $objWebInit->db;
		else $objads->db();
	}

	$arr = array();
	$arr[4]= $objads->getInfoList("  where pass=1 and deadline_date > now() and position=4  ORDER BY submit_date DESC");
	unset($arr[4]['COUNT_ROWS']);

	//针对幻灯片广告特别处理的，如果没有幻灯片广告可以删除
	$arrTemp = array('pics'=>array(),'links'=>array(),'texts'=>array());
	foreach($arr[4] as $k => $v){
		if(!empty($v['FileExt'])) {
			if($v['FileExt'] != '.swf'){
				$arrTemp['pics'][] = $arrGWeb['WEB_ROOT_pre'].$objads->arrGPic['FileCallPath'].'/'.$v['UploadFile'];
				if($v['webhost'] == '' || $v['webhost'] == 'http://') $v['webhost'] = '#';
				$arrTemp['links'][] = $v['webhost'];
				$arrTemp['texts'][] = $v['webname'];
			}
		}
	}
	$arr[4] = array();
	$arr[4]['pics'] = implode('|', $arrTemp['pics']);
	$arr[4]['links'] = implode('|', $arrTemp['links']);
	$arr[4]['texts'] = implode('|', $arrTemp['texts']);
	//print_r($arr);

	// 输出到模板
	$arrMOutput["smarty_assign"]['arrTopads'] = $arr;
	$arrMOutput["smarty_assign"]['adCallPath'] = $objads->arrGPic['FileCallPath'];
}
?>