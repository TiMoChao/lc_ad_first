<?php
defined('IN_SEO') or exit('Access Denied');
function get_seo_info($domain, $bot)
{
	global $ROBOT;
	if(!array_key_exists($bot, $ROBOT)) return 'Invalid Robot';
	$content = '';
	$site_info = '';
	$link_info = '';
	$content = get_content($ROBOT[$bot]['site_url'].$domain);
	if(empty($content)) return 'Unkown Error...';
	if(!in_array($bot,array('bing','yahoo','youdao'))) $content = iconv("gb2312","utf-8//IGNORE",$content);
	if(preg_match($ROBOT[$bot]['site_pattern'], $content, $matches)) $site_info = $matches[1];
	$content = get_content($ROBOT[$bot]['link_url'].$domain);
	if(!in_array($bot,array('bing','yahoo','youdao'))) $content = iconv("gb2312","utf-8//IGNORE",$content);
	if(preg_match($ROBOT[$bot]['link_pattern'], $content, $matches)) $link_info = $matches[1];
	if(empty($site_info)) $site_info = 0;
	if(empty($link_info)) $link_info = 0;
	return $ROBOT[$bot]['name'].' 收录: <a href="'.$ROBOT[$bot]['site_url'].$domain.'" target="_blank">'.$site_info.'</a>&nbsp;&nbsp;反向链接: <a href="'.$ROBOT[$bot]['link_url'].$domain.'" target="_blank">'.$link_info.'</a>';
}
function sogouRank($domain)
{
	$rank = '';
	$pr = 0;
	$content = get_content('http://www.sogou.com/web?query='.$domain);
	if(preg_match("/<\/span>([0-9]{1,})<\/dd>/", $content, $matches))
	{
		$pr = intval($matches[1]);
		$width = ceil(65*$pr/100);
		$rank = '<img src="./images/sg_left.gif" width="2" height="11" /><img src="./images/sg_left_img.gif" width="'.$width.'" height="11" /><img src="./images/sg_right_img.gif" width="'.(65-$width).'" height="11" /><img src="./images/sg_right.gif" width="2" height="11" />';
	}
	$rank = '<a href="http://www.sogou.com/web?query=link%3A'.$domain.'" target="_blank" title="搜狗Rank:'.$pr.'">'.$rank.'</a> '.$pr;
	return $rank;
}

function ChinaRank($domain)
{
	$rank = '';
	$content = get_content('http://www.chinarank.org.cn/detail/Info.do?url='.$domain);
	if(preg_match("/<strong>排名<\/strong>(.*)<\/tr>/", $content, $matches))
	{
		$p = trim(str_replace('</td>', '', $matches[1]));
		$p = explode("<td>", $p);
		if(isset($p[1])) $rank.= ' 今日:'.$p[1];
		if(isset($p[2])) $rank.= ' 本周:'.$p[2];
		if(isset($p[3])) $rank.= ' 三月:'.$p[3];
	}
	$rank = '<a href="http://www.chinarank.org.cn/detail/Info.do?url='.$domain.'" target="_blank">'.$rank.'</a>';
	return $rank;
}
function Alexa($domain)
{
	$alexa = '';
	$content = get_content('http://www.alexa.com/data/details/traffic_details?url='.$domain);
	if(preg_match("/3 mos. Change([\s\S]*?)<\/table>/", $content, $matches))
	{
		$change = strpos($matches[1], 'down_arrow.gif') ? '下降' : '上升';
		$p = strip_tags($matches[1], '<td>');
		$p = trim(str_replace(array("&nbsp;", "\n", "</td>"), array('', '', ''), $p));
		$p = explode("<td>", $p);
		if(isset($p[1])) $alexa.= ' 今日:'.$p[1];
		if(isset($p[2])) $alexa.= ' 本周:'.$p[2];
		if(isset($p[3])) $alexa.= ' 本月:'.$p[3];
		if(isset($p[4])) $alexa.= ' '.$change.':'.$p[4];
	}
	if(preg_match("/Review for $domain:<\/span> (.*)<br>/", $content, $matches))
	{
		$alexa = $alexa.' 等级:'.$matches[1];
	}
	$alexa = '<a href="http://www.alexa.com/data/details/traffic_details?url='.$domain.'" target="_blank">'.$alexa.'</a>';
	return $alexa;
}

function is_domain($domain)
{
	if(preg_match("/^([0-9a-z\-]{1,}\.)?[0-9a-z\-]{2,}\.([0-9a-z\-]{2,}\.)?[a-z]{2,}$/i", $domain))
	{
		return true;
	}
	else
	{
		return false;
	}
}
function get_content($url)
{
	if(!strpos($url, '://')) return 'Invalid URI';
	$content = '';
	if(ini_get('allow_url_fopen'))
	{
		$content = file_get_contents($url);
	}
	elseif(function_exists('curl_init'))
	{
		$handle = curl_init();
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($handle, CURLOPT_FOLLOWLOCATION, 0);
		$content = curl_exec($handle);
		curl_close($handle);
	}
	elseif(function_exists('fsockopen'))
	{
		$urlinfo = parse_url($url);
		$host = $urlinfo['host'];
		$str = explode($host, $url);
		$uri = $str[1];
		unset($urlinfo, $str);
		$content = '';
		$fp = fsockopen($host, 80, $errno, $errstr, 30);
		if(!$fp)
		{
			$content = 'Can Not Open Socket...';
		}
		else
		{
			$out = "GET $uri   HTTP/1.1\r\n";
			$out.= "Host: $host \r\n";
			$out.= "Accept: */*\r\n";
			$out.= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";
			$out.= "Connection: Close\r\n\r\n";
			fputs($fp, $out);
			while (!feof($fp))
			{
				$content .= fgets($fp, 4069);
			}
			fclose($fp);
		}
	}
	if(empty($content)) $content = 'Can Not Open Url, Please Check You Server ... <br/>For More Information, Please Visit www.master8.net';
	return $content;
}


function PageRank($domain)
{
	$result = get_content('http://www.google.com/search?client=navclient-auto&ch=6'. GCH(strord('info:' . $domain)) . '&ie=UTF-8&oe=UTF-8&features=Rank&q=info:' . urlencode($domain));
	if (preg_match('/\d+:\d+:(\d+)/', $result, $matches))
	{
		return intval($matches[1]);
	}
	else
	{
		return 0;
	}
}

function strord($string)
{
	$strlen = strlen($string);
	for($i = 0; $i < $strlen; $i++)
	{
		$result[$i] = ord($string{$i});
	}
	return $result;
}

function GCH($url, $length=null)
{
	$length = sizeof($url);
	$a = $b = 0x9E3779B9;
	$c = 0xE6359A60;
	$k = 0;
	$len = $length;
	while($len >= 12)
	{
		$a += ($url[$k + 0] + ($url[$k + 1] << 8) + ($url[$k + 2] << 16) + ($url[$k + 3] << 24));
		$b += ($url[$k + 4] + ($url[$k + 5] << 8) + ($url[$k + 6] << 16) + ($url[$k + 7] << 24));
		$c += ($url[$k + 8] + ($url[$k + 9] << 8) + ($url[$k + 10] << 16) + ($url[$k + 11] << 24));
		$mix = mix($a, $b, $c);
		$a = $mix[0];
		$b = $mix[1];
		$c = $mix[2];
		$k += 12;
		$len -= 12;
	}
	$c += $length;
	switch($len) {
		case 11: $c += ($url[$k + 10] << 24);
		case 10: $c += ($url[$k + 9] << 16);
		case 9 : $c += ($url[$k + 8] << 8);
		case 8 : $b += ($url[$k + 7] << 24);
		case 7 : $b += ($url[$k + 6] << 16);
		case 6 : $b += ($url[$k + 5] << 8);
		case 5 : $b += ($url[$k + 4]);
		case 4 : $a += ($url[$k + 3] << 24);
		case 3 : $a += ($url[$k + 2] << 16);
		case 2 : $a += ($url[$k + 1] << 8);
		case 1 : $a += ($url[$k + 0]);
	}
	$mix = mix($a, $b, $c);
	return $mix[2];
}

function mix($a, $b, $c)
{
	$a -= $b;
	$a -= $c;
	$a ^= (zeroFill($c, 13));
	$b -= $c;
	$b -= $a;
	$b ^= ($a << 8);
	$c -= $a;
	$c -= $b;
	$c ^= (zeroFill($b, 13));
	$a -= $b;
	$a -= $c;
	$a ^= (zeroFill($c, 12));
	$b -= $c;
	$b -= $a;
	$b ^= ($a << 16);
	$c -= $a;
	$c -= $b;
	$c ^= (zeroFill($b, 5));
	$a -= $b;
	$a -= $c;
	$a ^= (zeroFill($c, 3));
	$b -= $c;
	$b -= $a;
	$b ^= ($a << 10);
	$c -= $a;
	$c -= $b;
	$c ^= (zeroFill($b, 15));
	return array($a, $b, $c);
}

function zeroFill($a, $b)
{
	$z = hexdec(80000000);
	if($z & $a)
	{
		$a = ($a >> 1);
		$a &= (~ $z);
		$a |= 0x40000000;
		$a = ($a >> ($b - 1));
	}
	else
	{
		$a = ($a>>$b);
	}
	return $a;
}
?>