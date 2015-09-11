<?php
define('IN_SEO', TRUE);
error_reporting(E_ERROR);
@set_time_limit(0);
isset($_SERVER['HTTP_REFERER']) or exit('Invalid Request');
preg_match("/".$_SERVER['HTTP_HOST']."/i", $_SERVER['HTTP_REFERER']) or exit('Access Denied');
header("Content-Type:text/html;charset=utf-8");
include './robot.php';
require './function.php';
@extract($_POST);
isset($job) && isset($domain) or exit('Invalid Request');
$domain = strtolower($domain);
is_domain($domain) or exit('Invalid Domain');
$jobs=array('google','baidu','yahoo','bing','sogou','youdao');
$result = '';
if(substr($domain, 0, 4) == 'www.') $domain = substr($domain, 4);
$result = get_seo_info($domain, $job);

!empty($result) or exit('Invalid Request');
echo '收录：<img src="tools/gr/images/yes.gif" align="absmiddle" /> '.$result;
?>