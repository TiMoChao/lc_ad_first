<?php
/**
 * 行业资讯 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	ask
 */
 //配置文件调用
require_once('config/config.inc.php');
require_once("class/ask.class.php");

$objWebInit = new ask();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
//翻页参数
$objWebInit->arrGPage = $arrGPage;
$objWebInit->db();

//获取分类信息
if(!is_array($arrMType)||empty($arrMType)){
	$arrMType = $objWebInit->getTypeList();
	$arrMType = $objWebInit->formatTypeList(0,$arrMType);
}

//有问必答特有栏目：未解答问题输出
$strWhere = " where pass=1 and is_answer=0";
$strOrder = " ORDER BY topflag DESC,recommendflag DESC,submit_date DESC";
$intStartID = 0;
$intListNum = 5;
$strField = "id,type_id,title,submit_date";
$arrData = "";
$blCount = true;
$blComplex = false;
$arrNoAnswer['datas'] = $objWebInit->getInfoList($strWhere,$strOrder,$intStartID,$intListNum,$strField,$arrData,$blcount,$blComplex);
//print_r($arrNoAnswer);

//有问必答特有栏目：已解答问题输出
$strWhere = " where pass=1 and is_answer=1";
$strOrder = " ORDER BY topflag DESC,recommendflag DESC,submit_date DESC";
$intStartID = 0;
$intListNum = 5;
$strField = "id,type_id,title,submit_date";
$arrData = "";
$blCount = true;
$blComplex = false;
$arrHaveAnswer['datas'] = $objWebInit->getInfoList($strWhere,$strOrder,$intStartID,$intListNum,$strField,$arrData,$blcount,$blComplex);
//print_r($arrHaveAnswer);

// 输出到模板
$arrMOutput["smarty_assign"]['arrNoAnswer'] = $arrNoAnswer;
$arrMOutput["smarty_assign"]['arrHaveAnswer'] = $arrHaveAnswer;
$arrMOutput["smarty_assign"]['arrMType'] = $arrMType;
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'index.html';
$objWebInit->output($arrMOutput);
?>