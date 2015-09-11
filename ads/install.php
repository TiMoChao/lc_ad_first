<?php
/*
 * 图形广告数据库安装文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * modified		2009-1-3
 */
include_once('config/config.inc.php');
include_once("class/ads.class.php");

$objWebInit = new ads();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
$objWebInit->db();

if(empty($charset)) $charset = str_replace('-', '', $arrGWeb['charset']);
if(empty($charset)) $extend = $objWebInit->db->getAttribute(PDO::ATTR_SERVER_VERSION) > '4.1' ? " DEFAULT CHARSET={$charset} " : "";

//写入频道数组
$strWEB_ROOT_pre = $arrGWeb['WEB_ROOT_pre'];
if(empty($strWEBADMIN_ROOT)) $strWEBADMIN_ROOT = $arrGWeb['WEBADMIN_ROOT'];
unset($arrGWeb);
$strFilename = __WEB_ROOT.'/data/webconfig.inc.php';
include($strFilename);
$arrGMeta['ads']['name'] = '图形广告';
$arrGMeta['ads']['admin'] = array(
									array(
										  'href'=>'../ads/admin/index.php',
										  'name'=>'图形广告管理',),
									);
$somecontent = '<?php' . "\n" . '$arrGWeb = ' . var_export( $arrGWeb, true ) . ';' . "\n" . '$arrGMeta = ' . var_export( $arrGMeta, true ) . ';' . "\n" . '?>';

// 首先我们要确定文件存在并且可写。
if (is_writable($strFilename)) {

	if (!$handle = fopen($strFilename, 'w')) {
		 check::AlertExit("错误：不能打开文件 $strFilename !",-1);
	}

	// 将$somecontent写入到我们打开的文件中。
	if (fwrite($handle, $somecontent) === FALSE) {
		check::AlertExit("错误：不能写入到文件 $strFilename !",-1);
	}
	fclose($handle);
} else {
	check::AlertExit("错误：文件 $strFilename 不可写!",-1);
}

//sql语句
$sql[] = "CREATE TABLE IF NOT EXISTS `".$arrGPdoDB['db_tablepre']."ads` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `position` tinyint(2) unsigned NOT NULL,
  `type_id` tinyint(1) NOT NULL default '0',
  `user_id` int(10) unsigned NOT NULL,
  `structon_tb` text,
  `submit_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `deadline_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `height` int(10) NOT NULL default '0',
  `width` int(10) NOT NULL default '0',
  `flag` tinyint(1) NOT NULL default '1' COMMENT '显示位置',
  `pass` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `submit_date` (`submit_date`)
) ENGINE=MyISAM {$extend} COMMENT='图形广告表' ;";


foreach($sql as $val){
	$objWebInit->db->query($val);
}
if(empty($arrModule)){
	check::AlertExit('配置文件分类的图形广告系统安装成功!',"$strWEB_ROOT_pre$strWEBADMIN_ROOT/");
}
?>