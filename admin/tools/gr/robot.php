<?php
defined('IN_SEO') or exit('Access Denied');
$ROBOT['google']['name'] = 'Google';
$ROBOT['google']['site_url'] = 'http://www.google.cn/search?hl=zh-CN&q=site%3A';
$ROBOT['google']['site_pattern'] = "/获得大约(.*)条查询结果/";
$ROBOT['google']['link_url'] = 'http://www.google.cn/search?hl=zh-CN&q=link%3A';
$ROBOT['google']['link_pattern'] = "/约有(.*)条链接/";

$ROBOT['baidu']['name'] = '百度';
$ROBOT['baidu']['site_url'] = 'http://www.baidu.com/s?wd=site%3A';
$ROBOT['baidu']['site_pattern'] = "/找到相关网页(.*)篇/";
$ROBOT['baidu']['link_url'] = 'http://www.baidu.com/s?wd=domain%3A';
$ROBOT['baidu']['link_pattern'] = "/找到相关网页(.*)篇/";

$ROBOT['yahoo']['name'] = 'Yahoo';
$ROBOT['yahoo']['site_url'] = 'http://search.cn.yahoo.com/s?p=site%3A';
$ROBOT['yahoo']['site_pattern'] = "/找到相关网页(.*)条/";
$ROBOT['yahoo']['link_url'] = 'http://search.cn.yahoo.com/s?p=links%3A';
$ROBOT['yahoo']['link_pattern'] = "/找到相关网页(.*)条/";

$ROBOT['sogou']['name'] = '搜狗';
$ROBOT['sogou']['site_url'] = 'http://www.sogou.com/web?query=site%3A';
$ROBOT['sogou']['site_pattern'] = "/找到(.*)个网页/";
$ROBOT['sogou']['link_url'] = 'http://www.sogou.com/web?query=link%3A';
$ROBOT['sogou']['link_pattern'] = "/找到(.*)个网页/";

$ROBOT['bing']['name'] = 'bing';
$ROBOT['bing']['site_url'] = 'http://cn.bing.com/search?q=site%3A';
$ROBOT['bing']['site_pattern'] = "/共 (.*) 条/";
$ROBOT['bing']['link_url'] = 'http://cn.bing.com/search?q=links%3A';
$ROBOT['bing']['link_pattern'] = "/共 (.*) 条/";

$ROBOT['youdao']['name'] = '有道';
$ROBOT['youdao']['site_url'] = 'http://www.youdao.com/search?q=site%3A';
$ROBOT['youdao']['site_pattern'] = "/RESULT_NO=(.*) D/";
$ROBOT['youdao']['link_url'] = 'http://www.youdao.com/search?q=link%3A';
$ROBOT['youdao']['link_pattern'] = "/RESULT_NO=(.*) D/";
?>