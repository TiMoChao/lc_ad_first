<?php
/**
 * 友情链接列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	links
 */
require_once('config/config.inc.php');
require_once("class/links.class.php");

$objWebInit = new links();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
$objWebInit->arrGPic = $arrGPic;
$objWebInit->db();

$arrWhere = array();
$arrLink = array();
$arrWhere[] = "pass='1'";

$strWhere = implode(' AND ',$arrWhere);
$strWhere = 'where '.$strWhere;

$arrInfoList = $objWebInit->getInfoList(" where pass=1 AND flag=1","  ORDER BY submit_date DESC");
unset($arrInfoList['COUNT_ROWS']);
$arrLinkPic = array();
$arrLinkText = array();

// 若取出数据
if(!empty($arrInfoList)) {
	// 分出图片与文字链接
	foreach($arrInfoList as $k => $v) {
		if(empty($v['UploadFile']) && empty($v['weblogo']))
			$arrLinkText[] = $v;
		else
			$arrLinkPic[] = $v;
	}

}

// 输出到模板
$arrMOutput["smarty_assign"]['arrLinkText'] = $arrLinkText;
$arrMOutput["smarty_assign"]['arrLinkPic'] = $arrLinkPic;
$arrMOutput["smarty_assign"]['FileCallPath'] = $objWebInit->arrGPic['FileCallPath'];
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'index.html';
$objWebInit->output($arrMOutput);
?>