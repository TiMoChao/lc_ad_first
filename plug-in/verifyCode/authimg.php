<?PHP
/**
 * ������֤��ͼƬ�ļ�
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		plug-in
 */
if(empty($_SERVER["HTTP_REFERER"])) exit;
@session_start();

$img_width=50;  //�ȶ���ͼƬ�ĳ�����
$img_height=20;

srand(microtime() * 100000);
$nmsg = '';
for($Tmpa=0;$Tmpa<4;$Tmpa++){
	$nmsg.=dechex(rand(0,15));
	//$nmsg.= rand(0,9);
}


$_SESSION['authCode'] = $nmsg;

$aimg = imageCreate($img_width,$img_height);    //����ͼƬ
ImageColorAllocate($aimg,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));      //ͼƬ��ɫ��ImageColorAllocate��1�ζ�����ɫPHP����Ϊ�ǵ�ɫ��

//���������ѩ�������ˣ���ʵ������ͼƬ������һЩ����
$arrLabel = array('!','@','#','$','%','^','&','*','a','b','c','d','e','f','g','h','i','k','1','2','3','4','5','6','7','8','9','0');
for ($i=1; $i<=250; $i++){
	shuffle($arrLabel);
	imageString($aimg,1,mt_rand(1,$img_width),mt_rand(1,$img_height),"*",imageColorAllocate($aimg,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255)));
//��ʵҲ����ѩ�����������ɣ��Ŷ��ѡ�Ϊ��ʹ���ǿ�����"�������¡�5��6ɫ"���͵���1��1���������ǵ�ʱ�������ǵ�λ�á���ɫ��������С�����������rand()��mt_rand��������ɡ�
}

//���������˱��������ھ͸ð��Ѿ����ɵ�������������ˡ�����������࣬�����1��1���طţ�ͬʱ�����ǵ�λ�á���С����ɫ���ó������~~
//Ϊ�������ڱ������������ɫ������200������Ĳ�С��200
for ($i=0;$i<strlen($_SESSION['authCode']);$i++){
	imageString($aimg, mt_rand(3,5),$i*$img_width/4+mt_rand(1,4),mt_rand(1,$img_height/4), $_SESSION['authCode'][$i],imageColorAllocate($aimg,mt_rand(0,200),mt_rand(0,200),mt_rand(0,200)));
}
Header("Content-type: image/png");  //����������������������ͼƬ
ImagePng($aimg);           //����png��ʽ
ImageDestroy($aimg);
?>

