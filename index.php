<?php
/*
 *
 * 网站框架首页文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 */
require_once('config/config.inc.php');
$objWebInit = new ArthurXF();

if(empty($arrGPdoDB['db_name']) || empty($arrGPdoDB['db_user'])){
	header("Location: $arrGWeb[WEB_ROOT_pre]/install/");
	exit;
}

//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
$objWebInit->db();
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;

// 新闻
include 'news/block/top_index.php';
// 供求
include 'car_ad/block/top_index.php';
include 'Community_ad/block/top_index.php';
include 'multimedia_ad/block/top_index.php';
include 'Newspapers_magazines/block/top_index.php';
include 'outdoor_ad/block/top_index.php';
include 'Personality_customization/block/top_index.php';
include 'plane_ad/block/top_index.php';
include 'Planning_production/block/top_index.php';
include 'read_ad/block/top_index.php';
include 'shelter_ad/block/top_index.php';
include 'news_law/block/top_index.php';
include 'news_law/block/top_index1.php';
include 'tender_ad/block/top_index.php';
// 行业新闻
include 'video/block/top_index.php';
// 产品
include 'product/block/company_index.php';
// 产品
include 'product/block/top_index.php';
// 会展
include 'exhibition/block/top_index.php';
// 企业黄页
include 'company/block/top_index.php';
// 招聘
include 'job/block/top_index.php';
// 有问必答
include 'ask/block/top_index.php';
// 友情链接
include 'links/block/top_index.php';
// 广告
include 'ads/block/top_index.php';
//供求推荐
include 'trade/block/index_promotion.php';

//输出到模板
$arrMOutput["smarty_assign"]['MAIN'] = 'index.html';
$objWebInit->output($arrMOutput);
?>