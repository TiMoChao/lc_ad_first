<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty url function plugin
 *
 * Type:     function<br>
 * Name:     url<br>
 * Purpose:  静态url处理
 *           with a single space or supplied replacement string.<br>
 * Example:  {$var|url} {$var|url:"&nbsp;"}
 * Date:     September 25th, 2002
 * @link http://smarty.php.net/manual/en/language.function.url.php
 *          strip (Smarty online manual)
 * @author   ArthurXF <ArthurXF at gmail dot com>
 * @version  1.0
 * @param string
 * @param string
 * @return string
 */
function smarty_function_url($params, &$smarty){
	global $arrGWeb;
	global $arrGCache;
	extract($params);
	if($arrGWeb['URL_static']){
		if($cache == 1 && $arrGWeb['file_static'] == 0) $cache = 0;
		switch($cache){
			case 0:
				//伪静态文件
				if($arrGWeb['FileExt_state']) {
					$url = str_replace('.php','',$url);
				}
				$url = str_replace('=','-',$url);
				$url = str_replace('&','-',$url);
				if (strpos($url,'?')) $url .= $arrGWeb['file_suffix'];
				$url = str_replace('?','/',$url);
				break;
			case 1:
				//纯静态文件
				$arrUrl = parse_url($url);
				$strModule_id = str_replace('/detail.php','',$arrUrl['path']);
				$intID =  str_replace('id=','',$arrUrl['query']);
				$url = 'http://'.$_SERVER['HTTP_HOST'].$arrGWeb['cache_url'].$strModule_id;
				if(intval($intID) == '') $url .= '/'.$intID;
				else $url .= '-'.ceil($intID/$arrGCache['cache_filenum']).'/'.$intID;
				if($_SESSION['langset'] == 'zh_tw'){
					$url .= 'tw'.$arrGWeb['file_suffix'];
				}else $url .= $arrGWeb['file_suffix'];
			break;
			case 2:
				//生成DOC文件
				$arrUrl = parse_url($url);
				$strModule_id = str_replace('/detail.php','',$arrUrl['path']);
				$intID =  str_replace('id=','',$arrUrl['query']);
				$url = $arrGWeb['cache_url'].$strModule_id.'-';
				$url .= ceil($intID/$arrGCache['cache_filenum']).'/'.$intID;
				if($_SESSION['langset'] == 'zh_tw'){
					$url .= 'tw.doc';
				}else $url .= '.doc';
				break;
			case 3:
				//生成PDF文件
				$arrUrl = parse_url($url);
				$strModule_id = str_replace('/detail.php','',$arrUrl['path']);
				$intID =  str_replace('id=','',$arrUrl['query']);
				$url = $arrGWeb['cache_url'].$strModule_id.'-';
				$url .= ceil($intID/$arrGCache['cache_filenum']).'/'.$intID;
				$url .= '.pdf';
				break;
		}
	}
    return $arrGWeb['WEB_ROOT_pre'].$url;
}

/* vim: set expandtab: */

?>
