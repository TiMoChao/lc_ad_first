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

$objWebInit = new ask();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
$objWebInit->db();

if(empty($_SESSION['user_id'])){
	check::AlertExit("请先登陆",-1);
}

//删除回复帖子
if($_GET['ac']=='del'){
	$intID = intval($_GET['id']);
	$arrInfo = $objWebInit->getInfo($intID);

	if($_SESSION['user_group'] == '3' || $_SESSION['user_group'] == '2' || $_SESSION['user_id'] == $arrInfo['user_id']){
		unset($arrInfo['reply'][$_GET['rid']]);
		$arrInfo['replytimes'] = $arrInfo['replytimes']-1;
		$objWebInit->saveInfo($arrInfo,1);
	}
}

//设成最佳答案
if($_GET['ac']=='best'){
	$intID = intval($_GET['id']);
	$arrInfo = $objWebInit->getInfo($intID);

	if($_SESSION['user_group'] == '3' || $_SESSION['user_group'] == '2' || $_SESSION['user_id'] == $arrInfo['user_id']){
		if($_GET['rid'] != 0){
			if(array_key_exists('0',$arrInfo['reply'])){
				$temp = $arrInfo['reply'][0];
				$arrInfo['reply'][0] = $arrInfo['reply'][$_GET['rid']];
				$arrInfo['reply'][$_GET['rid']] = $temp;
			}else{
				$arrInfo['reply'][0] = $arrInfo['reply'][$_GET['rid']];
				unset($arrInfo['reply'][$_GET['rid']]);
			}
		}
		$arrInfo['is_answer'] = 1;
		$objWebInit->saveInfo($arrInfo,1);
	}
}

//提交新贴
if($_POST['ac'] == 'reply'){
	if(!empty($_POST['intro'])){
		$intID = intval($_POST['id']);
		$arrInfo = $objWebInit->getInfo($intID);
		if($arrInfo['is_answer']==1) check::AlertExit("错误：此问题已经解决，无法再回复新答案了!",-1);

		$strIP = check::getip();
		if(!session_is_registered('user_id')){
			$arrTemp['user_name'] = $strIP;
		}else{
			$arrTemp['user_name'] = $_SESSION['real_name'];
		}
		$objQQWry = new QQWry();
		$objQQWry->qqwry($strIP);
		$strZone = iconv('GB2312', 'UTF-8'.'//TRANSLIT', $objQQWry->Country);
		$arrTemp['zone'] = $strZone;
		$arrTemp['replydate'] = date('Y-m-d H:i:s');
		$arrTemp['intro'] = $_POST['intro'];
		if(array_key_exists('reply',$arrInfo)) array_push($arrInfo['reply'],$arrTemp);
		else $arrInfo['reply'][] = $arrTemp;
		$arrInfo['longtitle'] = $arrInfo['title'];
		$arrInfo['replytimes'] += 1;
		$arrInfo['replydate'] = $arrTemp['replydate'];
		$objWebInit->saveInfo($arrInfo,1);


	}else{
		check::AlertExit('对不起，回复的内容不能为空!',-1);
	}
}

//静态缓存文件处理及返回
if($arrGWeb['URL_static']){
	$strDir = '/'.ceil($intID/$arrGCache['cache_filenum']).'/'.$intID.$arrGWeb['file_suffix'];
	$strOldFile = $arrGCache['cache_root'].$strDir;
	if (is_file($strOldFile)) {	// 原文件删除
		unlink($strOldFile);
	}
	$strDir = $arrGWeb['cache_url'].'/'.$arrGWeb['module_id'].$strDir;
	echo '<script>window.location="'.$strDir.'"</script>';
}else{
	echo '<script>window.location="/ask/detail?id='.$intID.'"</script>';
}
?>