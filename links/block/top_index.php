<?php
/**
 * 最新文字链接文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	links
 */
if (is_object($objWebInit)) {
	if(!isset($objlinks)){
		include_once(__WEB_ROOT.'/links/class/links.class.php');
		include_once(__WEB_ROOT.'/links/config/var.inc.php');
		$objlinks = new links();
		$objlinks->setDBG($arrGPdoDB);
		$objlinks->arrGPic = $arrGPic;
		if(is_object($objWebInit->db)) $objlinks->db = $objWebInit->db;
		else $objlinks->db();
	}
	$arrLinkList = array();
	$arrLinkList = $objlinks->getInfoList(" where pass=1 AND flag=1","  ORDER BY submit_date DESC");
	unset($arrLinkList['COUNT_ROWS']);
	foreach($arrLinkList as $k=>$v){
		if(!empty($v['UploadFile'])||!empty($v['weblogo']))
			$arrLinkPic[] = $v;
		else
			$arrLinkText[] = $v;
	}
	$showul['text']=(!empty($arrLinkText))?1:0;
    $showul['pic']=(!empty($arrLinkPic))?1:0;
	//print_r($arrLinkPic);
	
	// 输出到模板
	$arrMOutput["smarty_assign"]['FileCallPath'] = $arrGPic['FileCallPath'];
	$arrMOutput["smarty_assign"]['arrLinkPic'] = $arrLinkPic;
	$arrMOutput["smarty_assign"]['arrLinkText'] = $arrLinkText;
	$arrMOutput["smarty_assign"]['showul'] = $showul;
	$arrMOutput["smarty_assign"]['linkImg'] = $objlinks->arrGPic['FileCallPath'];
}
?>