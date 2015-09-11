<?php
/*
 * 招聘信息数据库安装文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * modified		2009-1-3
 */

include_once(dirname(__FILE__).'/config/config.inc.php');
include_once(dirname(__FILE__).'/class/job.class.php');

$objWebInit = new job();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
$objWebInit->db();

if(empty($charset)) $charset = str_replace('-', '', $arrGWeb['charset']);
if(empty($charset)) $extend = $objWebInit->db->getAttribute(PDO::ATTR_SERVER_VERSION) > '4.1' ? " DEFAULT CHARSET={$charset} " : "";

$intDbSummaryLen = $arrGWeb['db_summary_len'];
//写入频道数组
if(empty($strWEB_ROOT_pre)) $strWEB_ROOT_pre = $arrGWeb['WEB_ROOT_pre'];
if(empty($strWEBADMIN_ROOT)) $strWEBADMIN_ROOT = $arrGWeb['WEBADMIN_ROOT'];
unset($arrGWeb);
$strFilename = __WEB_ROOT.'/data/webconfig.inc.php';
include($strFilename);
$arrGMeta['job']['name'] = '招聘信息';
$arrGMeta['job']['cache'] = 1;
if(!is_array($arrMType)||empty($arrMType)){
	$arrGMeta['job']['admin'] = array(
									array(
										  'href'=>'../job/admin/category.php',
										  'name'=>'招聘信息分类',),
									array(
										  'href'=>'../job/admin/index.php',
										  'name'=>'招聘信息管理',),
									);
}else{
	$arrGMeta['job']['admin'] = array(
									array(
										  'href'=>'../job/admin/index.php',
										  'name'=>'招聘信息管理',),
									);
}
$arrGMeta['job']['meta'] = array(
									  'Title' => $arrGMeta['job']['name'],
									  'Description' => $arrGMeta['job']['name'],
									  'Keywords' => $arrGMeta['job']['name'],
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
$sql[] = "CREATE TABLE IF NOT EXISTS `".$arrGPdoDB['db_tablepre']."job` (
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
  `province` varchar(20) default NULL,
  `city` varchar(20) default NULL,
  `area` varchar(20) default NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`),
  KEY `type_id` (`type_id`),
  KEY `title_md5` (`title_md5`),
  KEY `submit_date` (`submit_date`)
) ENGINE=MyISAM {$extend} COMMENT='招聘信息表' ;";

if(!is_array($arrMType)||empty($arrMType)){
	$sql[] = "CREATE TABLE IF NOT EXISTS `".$arrGPdoDB['db_tablepre']."job_type` (
	  `type_id` int(10) unsigned NOT NULL auto_increment,
	  `type_parentid` int(10) unsigned NOT NULL default '0',
	  `type_roue_id` varchar(80) default NULL,
	  `type_title` varchar(80) default NULL,
	  `type_link` varchar(150) default NULL COMMENT '跳转链接',
	  `type_sort` int(10) unsigned default NULL,
	  `type_pass` tinyint(1) NOT NULL default '1',
	  `type_read_grade` tinyint(1) NOT NULL default '0',
	  `type_write_grade` tinyint(1) NOT NULL default '0',
	  PRIMARY KEY  (`type_id`),
	  KEY `type_parentid` (`type_parentid`),
	  KEY `type_sort` (`type_sort`)
	) ENGINE=MyISAM  {$extend} COMMENT='招聘信息分类表' ;";
}

foreach($sql as $val){
	$objWebInit->db->query($val);
}
if(empty($arrModule)){
	if(!is_array($arrMType)||empty($arrMType)){
		check::AlertExit('数据库分类招聘信息系统安装成功',"$strWEB_ROOT_pre$strWEBADMIN_ROOT/");
	}else check::AlertExit('配置文件分类招聘信息系统安装成功',"$strWEB_ROOT_pre$strWEBADMIN_ROOT/");
}
?>