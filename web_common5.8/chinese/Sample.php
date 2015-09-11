<?php
// 码表所在目录。当class.Chinese.php与引用者不在同一目录下时，就应该对这个参数进行设置。
$codeTablesDir = "./config/";

echo "GB->Big5<br>";
echo "原文为：我爱你<br>";
include("chinese.class.php");
$chs = new Chinese("GB2312","BIG5","我爱你",$codeTablesDir);
echo "转换后的结果：".$chs->ConvertIT();

echo "Big5->GB<br>";
echo "原文为：и稲<br>";
$chs = new Chinese("BIG5","GB2312","и稲",$codeTablesDir);
echo "转换后的结果：".$chs->ConvertIT();

echo "GB->PinYin<br>";
echo "原文为：我是百万富翁BillGates<br>";
$chs = new Chinese("GB2312","PinYin","我是百万富翁BillGates",$codeTablesDir);
$i = explode(" ", $chs->ConvertIT());
$a=1;
while(list($key,$value)=each($i)) {
	echo "第".$a."个中文的拼音是：".$value."<br>";
	$a++;
}

echo "Big5->PinYin<br>";
echo "原文为：wa锣传挡狦<br>";
$chs = new Chinese("BIG5","PinYin","wa锣传挡狦",$codeTablesDir);
$i = explode(" ", $chs->ConvertIT());
$a=1;
while(list($key,$value)=each($i)) {
	echo "第".$a."个中文的拼音是：".$value."<br>";
	$a++;
}

echo "GB->Big5 from file ./sample/simply_chinese.txt<br>";
$chs = new Chinese("GB2312","BIG5","",$codeTablesDir);
$chs->OpenFile("./sample/simply_chinese.txt");
echo $chs->ConvertIT();

echo "Big5->GB from file ./sample/tradition_chinese.txt<br>";
$chs = new Chinese("BIG5","GB2312","",$codeTablesDir);
$chs->OpenFile("./sample/tradition_chinese.txt");
echo $chs->ConvertIT();

echo "Big5->GB from url http://omega.idv.tw/kdb120/<br>";
$chs = new Chinese("BIG5","GB2312","",$codeTablesDir);
$chs->OpenFile("http://omega.idv.tw/kdb120/", true);
echo $chs->ConvertIT();

echo "GB->Big5 from url http://mail.21cn.com/jffs/help.html<br>";
$chs = new Chinese("GB2312","BIG5","",$codeTablesDir);
$chs->OpenFile("http://mail.21cn.com/jffs/help.html", true);
echo $chs->ConvertIT();

echo "GB->UTF8<br>";
$chs = new Chinese("GB2312","UTF8","我爱你",$codeTablesDir);

echo $chs->ConvertIT();
/*
Header("Content-type: image/png");
$im = imagecreate(300,150);
$bkg = ImageColorAllocate($im, 0,0,0);
$clr = ImageColorAllocate($im, 255,255,255);
$fnt = "simsun.ttc";
ImageTTFText($im, 30, 0, 50,50, $clr, $fnt, $chs->ConvertIT());
ImagePNG($im);
ImageDestroy($im);
*/

echo "Big5->UTF8<br>";
$chs = new Chinese("BIG5","UTF8","锣传挡狦",$codeTablesDir);

echo $chs->ConvertIT();
/*
Header("Content-type: image/png");
$im = imagecreate(300,150);
$bkg = ImageColorAllocate($im, 0,0,0);
$clr = ImageColorAllocate($im, 255,255,255);
$fnt = "simsun.ttc";
ImageTTFText($im, 30, 0, 50,50, $clr, $fnt, "");
ImagePNG($im);
ImageDestroy($im);
*/

echo "GB->Unicode<br>";
$chs = new Chinese("GB2312","UNICODE","我爱你一辈子",$codeTablesDir);

echo urlencode($chs->ConvertIT());
/*
Header("Content-type: image/png");
$im = imagecreate(300,150);
$bkg = ImageColorAllocate($im, 0,0,0);
$clr = ImageColorAllocate($im, 255,255,255);
$fnt = "simsun.ttc";
ImageTTFText($im, 30, 0, 50,50, $clr, $fnt, $chs->ConvertIT());
ImagePNG($im);
ImageDestroy($im);
*/

echo "Big5->Unicode<br>";
$chs = new Chinese("BIG5","UNICODE","锣传挡狦",$codeTablesDir);

echo $chs->ConvertIT();
/*
Header("Content-type: image/png");
$im = imagecreate(300,150);
$bkg = ImageColorAllocate($im, 0,0,0);
$clr = ImageColorAllocate($im, 255,255,255);
$fnt = "simsun.ttc";
ImageTTFText($im, 30, 0, 50,50, $clr, $fnt, $chs->ConvertIT());
ImagePNG($im);
ImageDestroy($im);
*/

echo "Big5->GB from url html<br>";
if (!$tl) {
    $tl = "http://omega.idv.tw/kdb120/";
}
$chs = new Chinese("BIG5","GB2312","",$codeTablesDir);
$chs->OpenFile($tl, true);
$string = $chs->ConvertIT();
	$string = eregi_replace("\"", "", $string);

	$string = eregi_replace("href=http", "链接f3b20195d6c7dde8b88119ab9e70934e", $string);
	$string = eregi_replace("href=/", "链接0ea6a45b84d94ff027c9a26ab3ea895a", $string);
	$string = eregi_replace("src=http", "图片f3b20195d6c7dde8b88119ab9e70934e", $string);
	$string = eregi_replace("src=/", "图片0ea6a45b84d94ff027c9a26ab3ea895a", $string);

	$string = eregi_replace("href=", "href=?tl=http://omega.idv.tw/kdb120/", $string);
	$string = eregi_replace("src=", "src=http://omega.idv.tw/kdb120/", $string);

	$string = eregi_replace("链接f3b20195d6c7dde8b88119ab9e70934e", "href=http", $string);
	$string = eregi_replace("链接0ea6a45b84d94ff027c9a26ab3ea895a", "href=".substr($tl, 0, -1)."/", $string);
	$string = eregi_replace("图片f3b20195d6c7dde8b88119ab9e70934e", "src=http", $string);
	$string = eregi_replace("图片0ea6a45b84d94ff027c9a26ab3ea895a", "src=".substr($tl, 0, -1)."/", $string);

echo $string;

echo "GB->Big5 from URL html<br>";
$chs = new Chinese("GB2312","BIG5","",$codeTablesDir);
$chs->OpenFile("http://mail.21cn.com/jffs/help.html", true);
$string = $chs->ConvertIT();
//eregi("href[[:space:]]*=[[:space:]]*(.*)[[:space:]]", $ret, $ctemp);
//echo $ctemp;
//$string = "<a href=www.testing.com>testing</a>";
//echo $string;

	$string = eregi_replace("href=\"", "href=\"http://mail.21cn.com/jffs/", $string);
//	$string = eregi_replace("member.php?action=reg", "http://omega.idv.tw/kdb120/member.php?action=reg", $string);
//echo eregi_replace("href[[:space:]]*=[[:space:]]*(^[^http]+)([^>]+)>", "\\2", $string);

//echo eregi("<a[[:space:]]+href[[:space:]]*=[[:space:]]*([^>]+)>([[:alnum:]]+)<[[:space:]]*/a[[:space:]]*>", $string, eregi_replace("\\1", "", "\\1"));
//if (substr($regexp[1], 0, 4) != "http") {
//	$string = eregi_replace($regexp[1], "http://omega.idv.tw/kdb120/".$regexp[1], $string);
//}
//print_r ($regexp);
//$string = "<a href=\"www.testing.com\">testing</a>";
//$string = eregi_replace("member.php", "http://omega.idv.tw/kdb120/member.php", $string);
echo $string;

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

?>