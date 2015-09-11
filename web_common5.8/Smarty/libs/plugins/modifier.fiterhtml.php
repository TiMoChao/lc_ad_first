<?php
function smarty_modifier_fiterhtml($str)
{
//	$str = str_replace(">"		,		"&gt;"		,		$str);
//	$str = str_replace("<"		,		"&lt;"		,		$str);
	$str = str_replace('\"'		,		'&quot;'	,		$str);
	$str = str_replace("\'"		,		"'"			,		$str);
	$str = str_replace('"'		,		'&quot;'	,		$str);
	$str = str_replace("&nbsp;"	,		" "			,		$str);
	$str = str_replace("&amp;"	,		"&"			,		$str);
    $str = nl2br($str);
	return $str;
}
?>