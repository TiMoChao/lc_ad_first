<?php
/**
 * 行业资讯 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	video
 */
 //读取配置文件
require_once('config/config.inc.php');
require_once("class/video.class.php");

$objWebInit = new video();
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

//行业视频特有栏目：推荐视频
$arrInfoListRecommend= $objWebInit->getInfoList(' Where pass=1',' ORDER BY recommendflag DESC,submit_date DESC',0,1);
$arrRecommend=$arrInfoListRecommend[0];

//推荐视频
//print_r($arrRecommend);
if(is_array($arrRecommend['video'])){
	$arrRecommend['video_link']=$arrRecommend['video'][0]['video'];
}


//print_r($arrRecommend);

//行业视频特有栏目：热点视频
$arrInfoListHot= $objWebInit->getInfoList(' Where pass=1',' ORDER BY clicktimes DESC,recommendflag DESC,submit_date DESC',0,5,true,'',false);
unset($arrInfoListHot['COUNT']);
//print_r($arrInfoListHot);

// 输出到模板
$arrMOutput["smarty_assign"]['FileCallPath'] = $arrGPic['FileCallPath'];
$arrMOutput["smarty_assign"]['arrMType'] = $arrMType;
$arrMOutput["smarty_assign"]['arrInfoListHot'] = $arrInfoListHot;
$arrMOutput["smarty_assign"]['arrRecommend'] = $arrRecommend;
$arrMOutput["smarty_assign"]['arrTopvideo'] = $arrTopvideo;
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['main_dir'].'index.html';
$objWebInit->output($arrMOutput);
?>