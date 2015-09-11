<?php

header("Content-Type:text/html;charset=utf-8");

require_once 'alexa.class.php';

echo '域名：' . $_POST['domain'] . '<br />';

$arrKey = array(
	'top' => '世界排名：',
	'delta' => '排名浮动：',
	'linksin' => '外部链接：',
	'date' => '收录时间：',
	'dir' => '<a href="http://www.dmoz.org">DMOZ收录目录</a>：'
);

if($info = Alexa::info($_POST['domain'])) {
	foreach($info as $k => $v) {
		if(empty($v)) continue;
		if($k == 'date') $v = "$v[year]年$v[month]月$v[day]日";
		if($k == 'dir') $arrKey[$k] = '<br />' . $arrKey[$k];
		printf('%s%s&nbsp;&nbsp;&nbsp;&nbsp;',$arrKey[$k],$v);
	}
}

echo '<br /><span style="display: block; text-align: left;">本月浏览量走势图：</span><img style="margin: 5px;" align="center" src="' . Alexa::imgPath($_POST['domain'],1,'p',400) . '" />';

// PR值
define('IN_SEO', TRUE);
error_reporting(E_ERROR);
@set_time_limit(0);
isset($_SERVER['HTTP_REFERER']) or exit('Invalid Request');
preg_match("/".$_SERVER['HTTP_HOST']."/i", $_SERVER['HTTP_REFERER']) or exit('Access Denied');
include '../gr/robot.php';
require '../gr/function.php';
@extract($_POST);
isset($domain) or exit('Invalid Request');
$domain = strtolower($domain);
is_domain($domain) or exit('Invalid Domain');
$result = '<img src="tools/gr/images/pagerank'.PageRank($domain).'.gif" align="absmiddle" /> '.$domain.'<br />';
if(substr($domain, 0, 4) == 'www.')
{
	$domain = substr($domain, 4);
	$result.= '<img src="tools/gr/images/pagerank'.PageRank($domain).'.gif" align="absmiddle" />  '.$domain;
}
$result = '<br />Google PR值：<br />' . $result . ' ';

echo $result;

?>