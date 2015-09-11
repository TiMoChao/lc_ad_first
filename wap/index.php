<?php
/**
 * wap搜索列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	wap
 */
require_once('config/config.inc.php');
require_once("class/wap.class.php");

$objWebInit = new wap();

include_once('include/title.php');
include_once('include/head.php');

$myText = new HAW_text($arrGWeb['name'].'欢迎您!');
$objHaw->add_text($myText);

foreach($arrGMeta as $k => $v){
	if(!empty($v['cache'])&&$v['cache'] == 1){
		$myLink = new HAW_link($v['name'], "list.php?mod=".$k);
		$objHaw->add_link($myLink);
	}
}


include_once('include/foot.php');
?>