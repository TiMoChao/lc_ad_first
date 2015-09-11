<?php
/**
 * 档案列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	archives
 */
require_once('config/config.inc.php');
require_once("class/archives.class.php");

$objWebInit = new archives();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$arrGSmarty['caching'] = false;
$objWebInit->arrGSmarty = $arrGSmarty;
$objWebInit->db();

$arrInfo = $objWebInit->getInfo($_GET['id']);
$arrInfo['id'] = $arrMArchivesType[$_GET['id']];
if(empty($arrInfo['summary'])) $arrInfo['summary'] = @check::csubstr(trim(str_replace("&nbsp;"," ",str_replace("\r\n","",strip_tags($arrInfo['intro'])))),0,$arrGWeb['db_summary_len']);


if(!empty($arrInfo['meta_Title'])) $strTitle = $arrInfo['meta_Title'];
else  $strTitle = $arrInfo['id'];
if(!empty($arrInfo['meta_Description'])) $strDescription = $arrInfo['meta_Description'];
else  $strDescription = $strTitle.','.$arrInfo['summary'];
if(!empty($arrInfo['meta_Keywords'])) $strKeywords = $arrInfo['meta_Keywords'];
else  $strKeywords = $arrInfo['id'];

// 输出到模板
@$arrMOutput["smarty_assign"]['arrInfo'] = $arrInfo;
$arrMOutput["smarty_assign"]['arrMArchivesType'] = $arrMArchivesType;
$arrMOutput['smarty_assign']['Title'] = $strTitle.' - '.$arrGWeb['name'];
$arrMOutput['smarty_assign']['Description'] = $strDescription.' - '.$arrGWeb['name'];
$arrMOutput['smarty_assign']['Keywords'] = $strKeywords.' - '.$arrGWeb['name'];
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'detail.html';
$objWebInit->output($arrMOutput);
?>
