<?php
// �������Ŀ¼����class.Chinese.php�������߲���ͬһĿ¼��ʱ����Ӧ�ö���������������á�
$codeTablesDir = "./config/";
include("chinese.class.php");
/*
echo "UTF8->Big5 base64<br>";
$r = base64_decode("6L+U5Zue6L2J5o+b5b6M55qE57WQ5p6c");
//echo $r;
$chs = new Chinese("UTF8","BIG5",$r);
$string = $chs->ConvertIT();
echo $string;

echo "UTF8->GB base64<br>";
$r = base64_decode("5oiR5ZKM5L2g5LiA6LW355qELDEyMw==");
$chs = new Chinese("UTF8","GB2312", trim($r) );
echo $chs->ConvertIT();
*/
$cnvert = new Chinese("GB2312","UTF8","WEB2.0");
echo $cnvert->ConvertIT()."<br />";
?>