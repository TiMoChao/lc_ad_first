<?php
/**
 * COOKIES最新浏览详细信息显示文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	scanPath
 */
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
$strRecordName = empty($strRecordName)?'path':$strRecordName;
if(isset($_COOKIE[$strRecordName])) {
	$arrCOOKIE_record = array();
	$arrCOOKIE_record = explode('|',$_COOKIE[$strRecordName]);
	foreach($arrCOOKIE_record as $k => $v){
		$arrTemp = array();
		$arrTemp = explode('^',$v);
		$arrCOOKIE_record[$k] = $arrTemp;
	}
	foreach($arrCOOKIE_record as $k => $v){
		if($_GET['id'] == $v['id']) {
			unset($arrCOOKIE_record[$k]);
			$arrCOOKIE_record = array_values($arrCOOKIE_record);
		}
	}
}

//print_r($arrCOOKIE_record);
// 输出到模板
$arrMOutput["smarty_assign"]['arrCOOKIE_record'] = $arrCOOKIE_record;
?>