<?php
/*
 * 网站用户数据库安装文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * modified		2009-1-3
 */

include_once(dirname(__FILE__).'/config/config.inc.php');
include_once(dirname(__FILE__).'/class/user.class.php');

$objWebInit = new user();
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

try{
	//sql语句
	$sql[] = "CREATE TABLE IF NOT EXISTS `".$arrGPdoDB['db_tablepre']."user` (
		  `user_id` int(10) unsigned NOT NULL auto_increment,
		  `type_code` varchar(10) default NULL,
		  `user_name` varchar(30) default NULL,
		  `nick_name` varchar(30) default NULL,
		  `real_name` varchar(30) default NULL,
		  `user_type` tinyint(1) NOT NULL default '0',
		  `password` varchar(32) default NULL,
		  `question` varchar(40) default NULL,
		  `answer` varchar(40) default NULL,
		  `contactor` varchar(30) default NULL,
		  `user_group` smallint(1) NOT NULL default '0',
		  `user_popedom` varchar(200) NOT NULL,
		  `user_grade` tinyint(1) NOT NULL default '0',
		  `user_bonus` int(8) NOT NULL,
		  `country` varchar(3) NOT NULL default 'CHN',
		  `province` varchar(10) default NULL,
		  `city` varchar(10) default NULL,
		  `area` varchar(10) default NULL,
		  `structon_tb` text NOT NULL,
		  `lastlog` datetime NOT NULL default '0000-00-00 00:00:00',
		  `submit_date` datetime default '0000-00-00 00:00:00',
		  `pay` tinyint(1) NOT NULL default '0',
		  `paydate` date NOT NULL default '0000-00-00',
		  `overdate` mediumint(3) unsigned NOT NULL default '0',
		  `clicktimes` int(10) unsigned NOT NULL default '0',
		  `pass` tinyint(4) default '1',
		  `user_ip` varchar(23) default NULL,
		  PRIMARY KEY  (`user_id`),
		  KEY `pass` (`pass`),
		  KEY `user_name` (`user_name`)
		) ENGINE=MyISAM {$extend} COMMENT='网站用户表' ;";

	$arrTemp = array();
	if(!empty($_SESSION['user_name'])) $arrTemp['user_name'] = $_SESSION['user_name'];
	else $arrTemp['user_name'] = 'admin';
	if(!empty($_SESSION['real_name'])) $arrTemp['real_name'] = $_SESSION['real_name'];
	else $arrTemp['real_name'] = '肖先生';
	if(!empty($_SESSION['email'])) $arrTemp['email'] = $_SESSION['email'];
	else $arrTemp['email'] = 'arthurxf@gmail.com';
	if(!empty($_SESSION['password'])) $arrTemp['password'] = $_SESSION['password'];
	else $arrTemp['password'] = 'admin';

	$sql[] = "INSERT INTO `".$objWebInit->tablename2."` VALUES ('','','$arrTemp[user_name]', '','$arrTemp[real_name]', 0, '$arrTemp[password]', '', '', '', 3, 'root', 0, 600, '', '310000', '310100', '', 'array (\n  ''company_cn'' => ''上海网务网络信息有限公司'',\n  ''company_en'' => '''',\n  ''intro'' => '''',\n  ''tel'' => ''021-54011321'',\n  ''email'' => ''$arrTemp[email]'',\n  ''postcode'' => '''',\n  ''fax'' => '''',\n  ''QQ'' => '''',\n  ''address'' => '''',\n  ''homepage'' => ''http://www.biweb.cn'',\n)', '0000-00-00 00:00:00', date('Y-m-d H:i:s'), 0, '0000-00-00','0000-00-00', 0, 0, '127.0.0.1')";
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}

foreach($sql as $val){
	$objWebInit->db->query($val);
}
if(empty($arrModule)){
	check::AlertExit('网站用户系统安装成功',"$strWEB_ROOT_pre$strWEBADMIN_ROOT/");
}
?>