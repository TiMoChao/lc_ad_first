<?php
/**
 * 404文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	404
 */
define('__WEB_ROOT', dirname(__FILE__)."/../..");
require_once(__WEB_ROOT."/config/global.inc.php");
if ( isset($_SERVER['REDIRECT_URL']) )    {
    $strMyUrl = $_SERVER['REDIRECT_URL'];
} else if ( isset($_SERVER['URL']) )    {
    $strMyUrl = $_SERVER['URL'];
} else if ( isset($_SERVER['REQUEST_URI']) )    {
    $strMyUrl = $_SERVER['REQUEST_URI'];
}
//是否有静态文件标记，false表示非静态文件
$boolCache = false;

//当是纯静态页时，判断是否能抓取，dns是否可用，allow_url_fopen 是否开始
if($arrGWeb['file_static']){
	$strContents = file_get_contents('http://'.$_SERVER['HTTP_HOST'].'/');
	if($strContents === FALSE){
		exit('BIWEB友情提示：服务器DNS解析，没有开启(Linux 在/etc/reslov.conf设置正确的DNS)，请联系管理员处理！');
	}
}

if(strpos($strMyUrl,$arrGWeb['file_suffix'])){
	//静态页面的处理
	$strTemp = substr($strMyUrl ,0, (strlen($strMyUrl)-strlen($arrGWeb['file_suffix'])));
	$arrTemp = explode('/', $strTemp);

	if(!empty($arrTemp[1]) && $arrTemp[1] == substr($arrGWeb['cache_url'],1)){
		if(!empty($arrTemp[2]) && $arrTemp[2] == 'archives'){
			if(!empty($arrTemp[3]) && is_string($arrTemp[3])){
				$intID = str_replace('tw','',$arrTemp[3]);
				$strDir = $arrGCache['cache_root'].'/'.$arrTemp[2].'/'.$arrTemp[3].$arrGWeb['file_suffix'];
				$boolCache = true;
			}
		}else{
			if($arrGWeb['URL_static']){
				$arrModule = explode('-', $arrTemp[2]);
				$arrTemp[2] = $arrModule[0];
				foreach($arrGMeta as $k => $v){
					if(!empty($v['cache']) && $v['cache'] == 1 && $arrTemp[2] == $k) {
						if(!empty($arrTemp[3])){
							$arrTemp[3] = str_replace('tw','',$arrTemp[3]);
							if(is_numeric($arrTemp[3])){
								$intID = $arrTemp[3];
								if($_SESSION['langset'] == 'zh_tw') $arrGWeb['file_suffix'] = 'tw'.$arrGWeb['file_suffix'];
								$strDir = $arrGCache['cache_root'].'/'.$arrTemp[2].'-'.$arrModule[1].'/'.$intID.$arrGWeb['file_suffix'];
								$boolCache = true;
							}
						}
						if(!empty($arrTemp[4])){
							$arrTemp[4] = str_replace('tw','',$arrTemp[4]);
							if(is_numeric($arrTemp[4])){
								$intID = $arrTemp[4];
								if($_SESSION['langset'] == 'zh_tw') $arrGWeb['file_suffix'] = 'tw'.$arrGWeb['file_suffix'];
								$strDir = $arrGCache['cache_root'].'/'.$arrTemp[2].'-'.$arrTemp[3].'/'.$intID.$arrGWeb['file_suffix'];
								$boolCache = true;
							}
						}
						break;
					}
				}
			}
		}
		header("HTTP/1.1 200 OK");
		$objCache = new cache($strDir);
		$objCache->cache_start(true);
		$strContents = file_get_contents('http://'.$_SERVER['HTTP_HOST'].'/'.$arrTemp[2].'/detail.php?id='.$intID);
		if($strContents){
			echo $strContents;
		}
		$objCache->cache_end();
		//header("location:../../".$arrTemp[2]."/detail.php?id=".$arrTemp[4]);
	}else{
		foreach($arrGMeta as $k => $v){
			if($k == $arrTemp[1]){
				$arrModule = explode('-', $arrTemp[2]);
				if(count($arrModule) <2 ) break;
				$strMyUrl = str_replace($arrModule[0].'-',$arrModule[0].'/',$strMyUrl);
				$strContents = file_get_contents('http://'.$_SERVER['HTTP_HOST'].$strMyUrl);
				header("HTTP/1.1 200 OK");
				echo $strContents;
				$boolCache = true;
				break;
			}
		}
	}
}elseif(strpos($strMyUrl,'.doc')){
	//静态doc文件处理
	$arrGWeb['file_suffix'] = '.doc';
	$strTemp = substr($strMyUrl ,0, (strlen($strMyUrl)-strlen($arrGWeb['file_suffix'])));
	$arrTemp = explode('/', $strTemp);

	if($arrTemp[1] == substr($arrGWeb['cache_url'],1)){
		if($arrTemp[2] == 'archives'){
			if(is_string($arrTemp[3])){
				$intID = $arrTemp[3];
				$strDir = $arrGCache['cache_root'].'/'.$arrTemp[2].'/'.$arrTemp[3].$arrGWeb['file_suffix'];
				$boolCache = true;
			}
		}else{
			if($arrGWeb['URL_static']){
				$arrModule = explode('-', $arrTemp[2]);
				$arrTemp[2] = $arrModule[0];
				foreach($arrGMeta as $k => $v){
					if(!empty($v['cache']) && $v['cache'] == 1 && $arrTemp[2] == $k) {
						if(!empty($arrTemp[3]) && is_numeric($arrTemp[3])){
							$intID = $arrTemp[3];
							$strDir = $arrGCache['cache_root'].'/'.$arrTemp[2].'-'.$arrModule[1].'/'.$intID.$arrGWeb['file_suffix'];
							$boolCache = true;
						}
						if(!empty($arrTemp[4]) && is_numeric($arrTemp[4])){
							$intID = $arrTemp[4];
							$strDir = $arrGCache['cache_root'].'/'.$arrTemp[2].'-'.$arrTemp[3].'/'.$intID.$arrGWeb['file_suffix'];
							$boolCache = true;
						}
					}
				}
			}
		}
		header("HTTP/1.1 200 OK");
		$objDoc= new HTML_TO_DOC();
		$strUrl = 'http://'.$_SERVER['HTTP_HOST'].'/'.$arrTemp[2].'/detail.php?type=doc&id='.$intID;
		$objDoc->createDocFromURL($strUrl,$strDir,true);
		//header("location:$strDir");

	}

}elseif(strpos($strMyUrl,'.pdf')){
	//静态PDF文件处理

}

//非静态文件直接跳转到网站首页
if(v === 'v') exit;
if(!$boolCache){
	if($strMyUrl != '/'){
		$arrUrl = parse_url($strMyUrl);
		header("HTTP/1.1 301 Moved Permanently"); // 面向搜索引擎的友好模式
		if(is_dir(__WEB_ROOT.$arrUrl['path'])){
			header('location:'.$arrUrl['path'].'/');
		}else header('location:/');
	}
}
?>