<?php
/**
 * 知识问答 列表文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	ask
 */
require_once('config/config.inc.php');
require_once("class/ask.class.php");

$objWebInit =& new ask();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
$objWebInit->db();

if(empty($_SESSION['user_id'])){
	check::AlertExit("请先登陆",-1);
}

if(empty($_POST['title'])||$_POST['title']=='文章标题'){
	check::AlertExit('对不起，新问题的标题不能为空!',-1);
}
//提交新贴
if(!empty($_POST['intro'])){
	$strIP = check::getip();
	if(!session_is_registered('user_id')){
		$_POST['user_name'] = $strIP;
	}else{
		$_POST['user_name'] = $_SESSION['real_name'];
	}
	$objQQWry =& new QQWry();
	$objQQWry->qqwry($strIP);
	$strZone = iconv('GB2312', 'UTF-8'.'//TRANSLIT', $objQQWry->Country);
	$_POST['zone'] = $strZone;
	$_POST['reply'] = array();
	if($_POST['summary'] == '') $_POST['summary'] = check::csubstr(trim(str_replace("&nbsp;"," ",str_replace("\r\n","",strip_tags($_POST['intro'])))),0,100);
	if(!array_key_exists('title',$_POST)) $_POST['title'] = $_POST['titleprefix'].$_POST['longtitle'];
	unset($_POST['titleprefix']);
	unset($_POST['longtitle']);
	if($_POST['title'] != '') $_POST['title_md5'] = md5($_POST['title']);
	//判断文章信息
	$arrTemp = $objWebInit->getInfoList("where title_md5='$_POST[title_md5]' and user_id = '$_SESSION[user_id]' and type_id='$_POST[type_id]'","", 0, 1);
	if($arrTemp['COUNT_ROWS']!=0) check::AlertExit("错误：相同的信息请不要重复发布！需要刷新排列的话，请登录会员中心使用列表下方“提前”选项！",-1);
	$objWebInit->saveInfo($_POST,0);

	if($arrGWeb['URL_static']){
		check::Alert("",$arrGWeb['WEB_ROOT_pre']."/ask/index.php");
	}else{
		check::AlertExit("请先完善提问信息",$arrGWeb['WEB_ROOT_pre']."/ask/index.php");
	}
}else{
	check::AlertExit('对不起，新问题的内容不能为空!',-1);
}
?>