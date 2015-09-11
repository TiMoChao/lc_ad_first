<?php
/**
 * 防盗链下载文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	layout
 */
@session_start();
header('Content-Type: text/html; charset=UTF-8');
if(empty($_SESSION['confusion'])){
	echo "<script>alert('请不要盗链!');</script>";
	exit;
}
define('__WEB_ROOT', dirname(__FILE__)."/../..");
require_once(__WEB_ROOT."/data/webconfig.inc.php");
//放置下载软件的根目录相对于当前脚本目录的相对目录
$fileRelPath = "../../uploadfile/".$_SESSION['module_id'];
//例外允许连接的网址，注意:自身域名不需要填入,设定为肯定可以下载,
//空字符串("")表示直接输入网址下载的情况
$excludeReferArr = array("$arrWeb[host]");

chdir($fileRelPath);
$fileRootPath = getcwd() ."/";

$filePath=$_SESSION['file'];

$url=parse_url($_SERVER["HTTP_REFERER"]);

if($url['host']!=$_SERVER["HTTP_HOST"] && !in_array($referHost, $excludeReferArr)){
	if($excludeReferArr[0] != '') header('location:http://'.$excludeReferArr[0]);
	else header('location:http://'.$arrWeb['host']);
    exit;
}

$fileName = basename($filePath);
$fileAbsPath = $fileRootPath.$filePath;

if(empty($filePath)){
	echo "<script>alert('未指定要下载的文件!');</script>";
	exit;
}

//echo $fileAbsPath;
if(!file_exists($fileAbsPath)){
	$fileAbsPath1 = __WEB_ROOT.'/'.$filePath;
	if(!file_exists($fileAbsPath1)){
		echo "<script>alert('对不起,此链接已经失效,请提交失效我们报告,谢谢!<!--".$fileAbsPath."-->');</script>";
		exit;
	}
	$fileAbsPath = $fileAbsPath1;
}

header("Cache-control: private"); // fix for IE
header("Content-Type: application/octet-stream");
header("Content-Length: ".filesize($fileAbsPath));
header("Content-Disposition: attachment; filename=".$fileName);
$fp = fopen($fileAbsPath, 'r');
fpassthru($fp);
fclose($fp);
?>