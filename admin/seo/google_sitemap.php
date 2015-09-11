<?php
/**
 * 后台管理栏目Google Sitemaps文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	admin
 */
require_once('../config/config.inc.php');
require_once('../checklogin.php');
require_once('class/google_sitemap.class.php');

$objWebInit = new google_sitemap();
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
$objWebInit->db();

//访问权限检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'],'seo')) {
	check::AlertExit('对不起，您没有权限访问此页',-1);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$sm_file = '../../sitemap.xml';
	if (is_writable($sm_file)) {
		@set_time_limit(0);
		//$domain = $arrGWeb['host'];
		$domain = $_SERVER['HTTP_HOST'];
		if($_POST['today']){
			$today  = date('c');
		}else $today = '';

		$sm     = new google_sitemap();
		$smi    = new google_sitemap_item($domain, $today, $_POST['homepage_changefreq'], $_POST['homepage_priority']);
		$sm->add_item($smi);

		foreach($arrGMeta as $k => $v){
			if(!empty($v['cache']) && $v['cache'] == 1){
				switch($k){
					case 'suppliers':
						//厂商报价
						//栏目首页
						$smi = new google_sitemap_item($domain.'/'.$k.'/', $today, $_POST['category_changefreq'], $_POST['category_priority']);
						$sm->add_item($smi);

						//栏目列表
						$strSQL = "SELECT user_id FROM ".$arrGPdoDB['db_tablepre']."suppliers where pass=1  GROUP BY user_id ORDER BY submit_date desc";
						$rs = $objWebInit->db->prepare($strSQL);
						$rs->execute();
						$arrData = $rs->fetchAll(PDO::FETCH_COLUMN);

						foreach ($arrData AS $key=>$val){
							if($arrGWeb['URL_static']){
								$strUrl = $domain.'/'.$k.'/list/id-'.$val.$arrGWeb['file_suffix'];
							}else $strUrl = $domain.'/'.$k.'/list?id='.$val;
							$smi = new google_sitemap_item($strUrl, $today, $_POST['category_changefreq'], $_POST['category_priority']);
							$sm->add_item($smi);
						}

					break;
					case 'product':
						//产品栏目
						//栏目首页
						$smi = new google_sitemap_item($domain.'/'.$k.'/', $today, $_POST['category_changefreq'], $_POST['category_priority']);
						$sm->add_item($smi);

						//产品分类
						$strSQL = "SELECT type_id FROM ".$arrGPdoDB['db_tablepre']."product_type where type_parentid=0 and type_pass=1 ORDER BY type_id desc";
						$rs = $objWebInit->db->prepare($strSQL);
						$rs->execute();
						$arrData = $rs->fetchAll(PDO::FETCH_COLUMN);

						foreach ($arrData AS $key=>$val){
							if($arrGWeb['URL_static']){
								$strUrl = $domain.'/'.$k.'/sort/type_id-'.$val.$arrGWeb['file_suffix'];
							}else $strUrl = $domain.'/'.$k.'/sort?type_id='.$val;
							$smi = new google_sitemap_item($strUrl, $today, $_POST['category_changefreq'], $_POST['category_priority']);
							$sm->add_item($smi);
						}

						//产品列表
						$strSQL = "SELECT type_id FROM ".$arrGPdoDB['db_tablepre']."product_type where type_parentid!=0 and type_pass=1 ORDER BY type_id desc";
						$rs = $objWebInit->db->prepare($strSQL);
						$rs->execute();
						$arrData = $rs->fetchAll(PDO::FETCH_COLUMN);

						foreach ($arrData AS $key=>$val){
							if($arrGWeb['URL_static']){
								$strUrl = $domain.'/'.$k.'/list/type_id-'.$val.$arrGWeb['file_suffix'];
							}else $strUrl = $domain.'/'.$k.'/list?type_id='.$val;
							$smi = new google_sitemap_item($strUrl, $today, $_POST['category_changefreq'], $_POST['category_priority']);
							$sm->add_item($smi);
						}

						//产品内容
						$strSQL = "SELECT id FROM ".$arrGPdoDB['db_tablepre']."product where pass=1 ORDER BY id desc";
						$rs = $objWebInit->db->prepare($strSQL);
						$rs->execute();
						$arrData = $rs->fetchAll(PDO::FETCH_COLUMN);

						foreach ($arrData AS $key=>$val){
							$strDir = ceil($val/$arrGCache['cache_filenum']);
							if($arrGWeb['URL_static']){
								if($arrGWeb['file_static']){
									$strUrl = $domain.'/'.$arrGWeb['cache_url'].'/'.$k.'-'.$strDir.'/'.$val.$arrGWeb['file_suffix'];
								}else $strUrl = $domain.'/'.$k.'/detail/id-'.$val.$arrGWeb['file_suffix'];
							}else $strUrl = $domain.'/'.$k.'/detail.php?id='.$val;

							$smi = new google_sitemap_item($strUrl, $today, $_POST['content_changefreq'], $_POST['content_priority']);
							$sm->add_item($smi);
						}
					break;
					case 'brand':
						//品牌栏目
						//栏目首页
						$smi = new google_sitemap_item($domain.'/'.$k.'/', $today, $_POST['category_changefreq'], $_POST['category_priority']);
						$sm->add_item($smi);

						//品牌列表
						$strSQL = "SELECT id FROM ".$arrGPdoDB['db_tablepre']."brand WHERE pass=1 ORDER BY id desc";
						$rs = $objWebInit->db->prepare($strSQL);
						$rs->execute();
						$arrData = $rs->fetchAll(PDO::FETCH_COLUMN);

						foreach ($arrData AS $key=>$val){
							if($arrGWeb['URL_static']){
								$strUrl = $domain.'/'.$k.'/list/brand_id-'.$val.$arrGWeb['file_suffix'];
							}else $strUrl = $domain.'/'.$k.'/list?brand_id='.$val;
							$smi = new google_sitemap_item($strUrl, $today, $_POST['category_changefreq'], $_POST['category_priority']);
							$sm->add_item($smi);
							$strSQL = "SELECT type_id FROM product WHERE brand_id=$val and pass=1 GROUP BY type_id";
							$rs = $objWebInit->db->prepare($strSQL);
							$rs->execute();
							$arrType = $rs->fetchAll(PDO::FETCH_COLUMN);
							foreach($arrType AS $k1=>$v1){
								if($arrGWeb['URL_static']){
									$strUrl = $domain.'/'.$k.'/list/type_id-'.$v1.'-brand_id-'.$val.$arrGWeb['file_suffix'];
								}else $strUrl = $domain.'/'.$k.'/list?type_id='.$v1.'&brand_id='.$val;
								$smi = new google_sitemap_item($strUrl, $today, $_POST['category_changefreq'], $_POST['category_priority']);
								$sm->add_item($smi);
							}
						}
					break;
					default:
						//其他新闻系统栏目
						//栏目首页
						$smi = new google_sitemap_item($domain.'/'.$k.'/', $today, $_POST['category_changefreq'], $_POST['category_priority']);
						$sm->add_item($smi);

						//栏目内容
						$strSQL = "SELECT id FROM ".$arrGPdoDB['db_tablepre']."$k where pass=1 ORDER BY id desc";
						$rs = $objWebInit->db->prepare($strSQL);
						$rs->execute();
						$arrData = $rs->fetchAll(PDO::FETCH_COLUMN);

						foreach ($arrData AS $key=>$val){
							$strDir = ceil($val/$arrGCache['cache_filenum']);
							if($arrGWeb['URL_static']){
								if($arrGWeb['file_static']){
									$strUrl = $domain.'/'.$arrGWeb['cache_url'].'/'.$k.'-'.$strDir.'/'.$val.$arrGWeb['file_suffix'];
								}else $strUrl = $domain.'/'.$k.'/detail/id-'.$val.$arrGWeb['file_suffix'];
							}else $strUrl = $domain.'/'.$k.'/detail.php?id='.$val;
							$smi = new google_sitemap_item($strUrl, $today, $_POST['content_changefreq'], $_POST['content_priority']);
							$sm->add_item($smi);
						}
					break;
				}
			}
		}

		$sm->build($sm_file);
		check::Alert('Google Sitemaps 生成成功，http://'.$arrGWeb['host'].'/sitemap.xml');
	}else{
		check::AlertExit("错误：文件 http://".$arrGWeb['host']."/sitemap.xml 不可写!",-1);
	}

}
// 输出到模板
$arrMOutput["smarty_assign"]['strNav'] = 'Google Sitemaps';
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'seo/google_sitemap.htm';
$objWebInit->output($arrMOutput);
?>