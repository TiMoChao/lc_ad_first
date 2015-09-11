<?php
/**
 * COOKIES最新浏览详细信息记录文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	scanPath
 */
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
define('__WEB_ROOT', dirname(__FILE__)."/../..");
define('__REC_NUMS', (empty($_GET['recordnums'])?10:$_GET['recordnums']));
$strRecordName = empty($_GET['recordname'])?'path':$_GET['recordname'];
//setcookie($strRecordName, '');
if(isset($_COOKIE[$strRecordName])) {
	if(empty($_GET['id'])) exit;
	$arrCOOKIE_record = array();
	$arrCOOKIE_record = explode('|',$_COOKIE[$strRecordName]);
	foreach($arrCOOKIE_record as $k => $v){
		$arrTemp = array();
		$arrTemp = explode('^',$v);
		$arrCOOKIE_record[$k] = $arrTemp;
	}
	foreach($arrCOOKIE_record as $k => $v){
		if($_GET['id'] == $v[0]) {
			unset($arrCOOKIE_record[$k]);
			$arrCOOKIE_record = array_values($arrCOOKIE_record);
		}
	}

	$arrTemp = array();
	foreach($_GET as $k =>$v){
		$arrTemp[$k] = $v;
	}
	array_unshift($arrCOOKIE_record,$arrTemp);
	unset($arrCOOKIE_record[__REC_NUMS]);
	$arrTemp = array();
	$arrTemp = $arrCOOKIE_record;
	foreach($arrTemp as $k => $v){
		$arrTemp[$k] = implode('^',$v);
	}
	$strTemp = implode('|',$arrTemp);

	setcookie($strRecordName,$strTemp,time()+24*3600*30,'/');
}else{
	$strTemp = implode('^',$_GET);
	setcookie($strRecordName,$strTemp,time()+24*3600*365,'/');
}
?>