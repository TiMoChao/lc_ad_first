<?php
//两个文件格式必须是utf-8的
function mergeFile($strFile1,$strFile2,$strSaveFile=null,$isfilter=true) {
	$arrFile1 = file($strFile1);
	echo count($arrFile1).'<br>';
	foreach($arrFile1 as &$v){
		$v = str_replace("\n","",str_replace("\r","",$v));
	}
	if($isfilter){
		$arrFile1 = array_unique($arrFile1);
	}
	echo count($arrFile1).'<br>';
	$arrFile2 = file($strFile2);
	echo count($arrFile2).'<br>';
	foreach($arrFile2 as &$v){
		$v = str_replace("\n","",str_replace("\r","",$v));
	}
	if($isfilter){
		$arrFile2 = array_unique($arrFile2);
	}
	echo count($arrFile2).'<br>';
	$arrNewFile = array_merge($arrFile1,$arrFile2);
	echo count($arrNewFile).'<br>';
	if($isfilter){
		$arrNewFile = array_unique($arrNewFile);
	}
	natsort($arrNewFile);
	echo count($arrNewFile).'<br>';
	if($strSaveFile){
		$str = implode("\r\n",$arrNewFile);
		if(file_put_contents($strSaveFile,$str)) echo 'Save Ok!';
		else  echo 'Save False!';
	}

}
mergeFile('dict.biweb','1.txt','dict.biweb');
?>