<?php
/*
 * 会展信息会展信息装文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * modified		2009-1-3
 */

include_once(dirname(__FILE__).'/config/config.inc.php');
include_once(dirname(__FILE__).'/class/exhibition.class.php');

$objWebInit = new exhibition();
//会展信息接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
$objWebInit->db();

if(empty($charset)) $charset = str_replace('-', '', $arrGWeb['charset']);
if(empty($extend)) $extend = $objWebInit->db->getAttribute(PDO::ATTR_SERVER_VERSION) > '4.1' ? " DEFAULT CHARSET={$charset} " : "";

$intDbSummaryLen = $arrGWeb['db_summary_len'];
//会展信息数组
if(empty($strWEB_ROOT_pre)) $strWEB_ROOT_pre = $arrGWeb['WEB_ROOT_pre'];
if(empty($strWEBADMIN_ROOT)) $strWEBADMIN_ROOT = $arrGWeb['WEBADMIN_ROOT'];
unset($arrGWeb);
$strFilename = __WEB_ROOT.'/data/webconfig.inc.php';
include($strFilename);
$arrGMeta['exhibition']['name'] = '会展信息';
$arrGMeta['exhibition']['cache'] = 1;
if(!is_array($arrMType)||empty($arrMType)){
	$arrGMeta['exhibition']['admin'] = array(
									array(
										  'href'=>'../exhibition/admin/category.php',
										  'name'=>'会展信息分类',),
									array(
										  'href'=>'../exhibition/admin/index.php',
										  'name'=>'会展信息管理',),
									);
}else{
	$arrGMeta['exhibition']['admin'] = array(
									array(
										  'href'=>'../exhibition/admin/index.php',
										  'name'=>'会展信息管理',),
									);
}
$arrGMeta['exhibition']['meta'] = array(
									  'Title' => $arrGMeta['exhibition']['name'],
									  'Description' => $arrGMeta['exhibition']['name'],
									  'Keywords' => $arrGMeta['exhibition']['name'],
									);
$somecontent = '<?php' . "\n" . '$arrGWeb = ' . var_export( $arrGWeb, true ) . ';' . "\n" . '$arrGMeta = ' . var_export( $arrGMeta, true ) . ';' . "\n" . '?>';

// 会展信息会展信息会展信息且可写。
if (is_writable($strFilename)) {

	if (!$handle = fopen($strFilename, 'w')) {
		 check::AlertExit("错误，不能打开文件 $strFilename !",-1);
	}

	// 将$somecontent会展信息们打开会展信息。
	if (fwrite($handle, $somecontent) === FALSE) {
		check::AlertExit("错误，不能写入到文件 $strFilename !",-1);
	}
	fclose($handle);
} else {
	check::AlertExit("错误，文件的$strFilename 不可写!",-1);
}

//sql语句
$sql[] = "CREATE TABLE IF NOT EXISTS `".$arrGPdoDB['db_tablepre']."exhibition` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `type_id` tinyint(3) unsigned default '0',
  `type_roue_id` varchar(80) default NULL,
  `user_id` int(10) unsigned default '0',
  `tag` varchar(30) default NULL,
  `bedeck` tinyint(3) unsigned default '0',
  `title` varchar(100) default NULL,
  `title_md5` char(32) default NULL,
  `linkurl` varchar(100) default NULL,
  `summary` varchar(".$intDbSummaryLen.") default NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) default NULL,
  `submit_date` datetime default '0000-00-00 00:00:00',
  `topflag` tinyint(1) default '0',
  `recommendflag` tinyint(1) default '0',
  `stars` tinyint(1) default '0',
  `clicktimes` mediumint(10) unsigned default '0',
  `pass` tinyint(1) default '1',
  `province` varchar(10) default NULL,
  `city` varchar(10) default NULL,
  `area` varchar(10) default NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`),
  KEY `type_id` (`type_id`),
  KEY `title_md5` (`title_md5`),
  KEY `submit_date` (`submit_date`)
) ENGINE=MyISAM {$extend} COMMENT='会展信息表' ;";

if(!is_array($arrMType)||empty($arrMType)){
	$sql[] = "CREATE TABLE IF NOT EXISTS `".$arrGPdoDB['db_tablepre']."exhibition_type` (
	  `type_id` int(10) unsigned NOT NULL auto_increment,
	  `type_parentid` int(10) unsigned NOT NULL default '0',
	  `type_roue_id` varchar(80) default NULL,
	  `type_title` varchar(80) default NULL,
	  `type_link` varchar(150) default NULL COMMENT '会展信息',
	  `type_sort` int(10) unsigned default NULL,
	  `type_pass` tinyint(1) NOT NULL default '1',
	  `type_read_grade` tinyint(1) NOT NULL default '0',
	  `type_write_grade` tinyint(1) NOT NULL default '0',
	  PRIMARY KEY  (`type_id`),
	  KEY `type_parentid` (`type_parentid`),
	  KEY `type_sort` (`type_sort`)
	) ENGINE=MyISAM  {$extend} COMMENT='会展信息分类表' ;";
}

foreach($sql as $val){
	$objWebInit->db->query($val);
}
if(empty($arrModule)){
	if(!is_array($arrMType)||empty($arrMType)){
		check::AlertExit('数据库分类会展信息安装成功',"$strWEB_ROOT_pre$strWEBADMIN_ROOT/");
	}else check::AlertExit('配置文件分类会展信息安装成功',"$strWEB_ROOT_pre$strWEBADMIN_ROOT/");
}
?>