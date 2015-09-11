<?php
/**
 * 友情链接后台管理栏目首页文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	links
 */
require_once('../config/config.inc.php');
require_once("../class/links.class.php");
require_once ('../..'.__WEBADMIN_ROOT.'/checklogin.php');

$objWebInit = new links();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
//翻页参数
$objWebInit->arrGPage = $arrGPage;
//图片上传参数
$objWebInit->arrGPic = $arrGPic;
$objWebInit->db();
//访问权限检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'])) {
	check::AlertExit('对不起，您没有权限访问此页',-1);
}
$arrWhere = array();
$arrLink = array();
if(isset($_GET['action'])){
	if($_GET['action']=='search') {
		// 构造搜索条件和翻页参数
		$arrLink[] = 'action=search';
		if (!empty($_GET['title'])) {
			$strKeywords = strval(urldecode($_GET['title']));
			if($strKeywords[0] == '/'){
				//精确查询ID
				$_GET['pass'] = null;
				$strKeywords = substr($strKeywords,1);
				if(is_numeric($strKeywords)) $arrWhere[] = "id = '" . $strKeywords . "'";
			}else{
				$arrWhere[] = "structon_tb LIKE '%" . $_GET['title'] . "%'";
			}
			$arrLink[] = 'title=' . $_GET['title'];
		}
		if ($_GET['pass'] == '1' || $_GET['pass'] == '0') {
			$arrWhere[] = "pass='".$_GET['pass']."'";
			$arrLink[] = 'pass=' . $_GET['pass'];
		}
	} else {
		$objWebInit->doInfoAction($_GET['action'],$_POST['select']);
	}
}
$strWhere = implode(' AND ', $arrWhere);
if (!empty($strWhere))	$strWhere = ' WHERE '.$strWhere;
if(!isset($_GET['page'])||$_GET['page']=='') $_GET['page'] = $arrGPage['page'];
$arrData = $objWebInit->getInfoList($strWhere,' ORDER BY submit_date DESC',($_GET['page']-1)*$arrGPage['page_size'],$arrGPage['page_size']);
if($arrData == "") $arrData=null;
//翻页跳转link
$strLink = '';
if (!empty($arrLink))	$strLink = implode('&',$arrLink);
$strPage= $objWebInit->makeInfoListPage($arrData['COUNT_ROWS'],$strLink);
unset($arrData['COUNT_ROWS']);
// 输出到模板
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['get'] = $_GET;
$arrMOutput["smarty_assign"]['FileCallPath'] = $arrGPic['FileCallPath'];
$arrMOutput["smarty_assign"]['arrData'] = $arrData;
$arrMOutput["smarty_assign"]['strPage'] = $strPage;
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'index.htm';
$objWebInit->output($arrMOutput);
?>