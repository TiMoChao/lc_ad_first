<?php
/**
 * 多媒体后台管理栏目修改文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	multimedia_ad
 */
require_once('../config/config.inc.php');
require_once("../class/multimedia_ad.class.php");
require_once ('../../useradmin/checklogin.php');

$objWebInit = new multimedia_ad();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
//图片上传参数
$objWebInit->arrGPic = $arrGPic;
$objWebInit->db();

// 取得文章信息
$arrInfo = $objWebInit->getInfo($_GET['id']);
if($arrInfo['user_id']!=$_SESSION['user_id']) check::AlertExit("错误：此信息不是您发布的，您无权修改!",-1);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST['type_id'])||empty($_POST['title'])||empty($_POST['intro'])){
		check::AlertExit("错误：有必填选项没填!",-1);
	}
	
	$arrTemp = explode('|',$_POST['type_id']);
	$_POST['type_id'] = $arrTemp[0];
	$_POST['type_roue_id'] = $arrTemp[1];
	if($_POST['title'] != '') $_POST['title_md5'] = md5($_POST['title']);
	//判断文章信息
	if($_POST['title_md5'] != $arrInfo['title_md5']){
		$arrTemp = $objWebInit->getInfoList("where title_md5='$_POST[title_md5]' and user_id = '$_SESSION[user_id]' and type_id='$_POST[type_id]'","", 0, 1);
		if($arrTemp['COUNT_ROWS']!=0) check::AlertExit("错误：相同的信息请不要重复发布！需要刷新排列的话，请使用列表下方“提前”选项！",-1);
	}

//还原图片数组
	$_POST['photo'] = array();
	if(!empty($_POST['savephoto'])){
		foreach($_POST['savephoto'] as $key => $val){
			$arrTemp = array();
			$arrTemp['photo'] = $val;
			if(!empty($_POST['photo_narrate'.$key])) $arrTemp['photo_narrate'] = $_POST['photo_narrate'.$key];
			$_POST['photo'][$key] = $arrTemp;
		}
	}

	//删除旧图
	if(!empty($_POST['delphoto'])){
		foreach($_POST['delphoto'] as $val){
			$strOldFile = $arrGPic['FileSavePath'].'s/'.$_POST['savephoto'][$val];
			if (is_file($strOldFile)) {	// 缩略图删除
				unlink($strOldFile);
			}
			$strOldFile = $arrGPic['FileSavePath'].'b/'.$_POST['savephoto'][$val];
			if (is_file($strOldFile)) {	// 原文件删除
				unlink($strOldFile);
			}
			unset($_POST['photo'][$val]);
		}
	}

	//替换旧图和新图上传
	set_time_limit(0);
	foreach($_FILES as $key => $val){
		if(strrpos($key,'Filedata') === false) continue;
		$num = substr($key,strlen('Filedata'));
		if(!empty($_FILES['Filedata'.$num]['name'])){
			if(!empty($_POST['savephoto'][$num])) $strOldFile = $arrGPic['FileSavePath'].'s/'.$_POST['savephoto'][$num];
			else $strOldFile = '';
			if (is_file($strOldFile)) {	// 缩略图删除
				unlink($strOldFile);
			}
			if(!empty($_POST['savephoto'][$num])) $strOldFile = $arrGPic['FileSavePath'].'b/'.$_POST['savephoto'][$num];
			else $strOldFile = '';
			if (is_file($strOldFile)) {	// 原文件删除
				unlink($strOldFile);
			}
			$arrTemp = array();
			$arrTemp['photo'] = $objWebInit->uploadInfoImage($_FILES['Filedata'.$num],$num,$objWebInit->arrGPic['FileListPicSize'],$objWebInit->arrGPic['FileSourPicSize'],$_POST['id']);
			if(!empty($_POST['photo_narrate'.$num])) $arrTemp['photo_narrate'] = $_POST['photo_narrate'.$num];
			$_POST['photo'][$num] = $arrTemp;

		}

	}

	//还原视频数组
	$_POST['video'] = array();
	if(!empty($_POST['savevideo'])){
		foreach($_POST['savevideo'] as $key => $val){
			$_POST['video'][$key] = array('video'=>$val,'videopic'=>$_POST['savevideopic'][$key],'video_narrate'=>$_POST['video_narrate'.$key],'video_title'=>$_POST['video_title'.$key],'video_time'=>$_POST['video_time'.$key]);
		}
	}

	//删除旧视频
	if(!empty($_POST['delvideo'])){
		foreach($_POST['delvideo'] as $val){
			$strOldFile = $arrGPic['FileSavePath'].'f/'.$_POST['savevideo'][$val];
			if (is_file($strOldFile)) {	// 视频文件删除
				unlink($strOldFile);
			}
			$strOldFile = $arrGPic['FileSavePath'].'b/'.$_POST['savevideopic'][$val];
			if (is_file($strOldFile)) {	// 视频文件删除
				unlink($strOldFile);
			}
			unset($_POST['video'][$val]);
		}
	}

	//替换旧视频和新视频上传
	foreach($_FILES as $key => $val){
		if(strrpos($key,'vFiledata') === false) continue;
		$num = substr($key,strlen('vFiledata'));
		if(!empty($_FILES['vFiledata'.$num]['name'])){
			if(!empty($_POST['savevideo'][$num])) $strOldFile = $arrGPic['FileSavePath'].'f/'.$_POST['savevideo'][$num];
			else $strOldFile = '';
			if (is_file($strOldFile)) {	// 视频文件删除
				unlink($strOldFile);
			}

			$arrTemp = array();
			$arrTemp['video'] = $objWebInit->uploadInfoFile($_FILES['vFiledata'.$num],$num,$_POST['id'],array('.flv'));
			if(!empty($_POST['video_narrate'.$num])) $arrTemp['video_narrate'] = $_POST['video_narrate'.$num];
			if(!empty($_POST['video_title'.$num])) $arrTemp['video_title'] = $_POST['video_title'.$num];
			if(!empty($_POST['video_time'.$num])) $arrTemp['video_time'] = $_POST['video_time'.$num];
			$_POST['video'][$num] = $arrTemp;
		}

	}

	//替换旧视频图片和新视频图片上传
	sleep(1);
	foreach($_FILES as $key => $val){
		if(strrpos($key,'pFiledata') === false) continue;
		$num = substr($key,strlen('pFiledata'));
		if(!empty($_FILES['pFiledata'.$num]['name'])){
			if(!empty($_POST['savevideopic'][$num])) $strOldFile = $arrGPic['FileSavePath'].'b/'.$_POST['savevideopic'][$num];
			else $strOldFile = '';
			if (is_file($strOldFile)) {	// 视频图片文件删除
				unlink($strOldFile);
			}
			$_POST['video'][$num]['videopic'] = $objWebInit->uploadInfoImage($_FILES['pFiledata'.$num],$num,0,$objWebInit->arrGPic['FileSourPicSize'],$_POST['id']);
		}

	}

	if($_POST['summary'] == '') $_POST['summary'] = check::csubstr(trim(str_replace("&nbsp;"," ",str_replace("\r\n","",strip_tags($_POST['intro'])))),0,$arrGWeb['db_summary_len']);
	if(is_array($_POST['photo'])) $_POST['thumbnail'] = $_POST['photo'][0]['photo'];
	else $_POST['thumbnail'] = $_POST['photo'];
	$_POST = array_merge($arrInfo,$_POST);
	//print_r($_POST);exit;
	$objWebInit->saveInfo($_POST,1);

	if($arrGWeb['file_static']){
		//生成静态页面
		$intID = $_POST['id'];
		$strDir = ceil($intID/$arrGCache['cache_filenum']);
		$objCache = new cache($arrGCache['cache_root'].'-'.$strDir.'/'.$intID.$arrGWeb['file_suffix'],$arrGCache['cache_time']);
		$objCache->cache_start();
		$strContents = @file_get_contents('http://'.$_SERVER["HTTP_HOST"].'/'.$arrGWeb['module_id'].'/detail.php?id='.$intID);
		if($strContents){
			echo $strContents;
		}
		$objCache->cache_end(false);
		@unlink($arrGCache['cache_root'].'-'.$strDir.'/'.$intID.'tw'.$arrGWeb['file_suffix']);
	}



	check::WindowLocation('index.php','page='.$_GET['page']);
}

if(!is_array($arrMType)||empty($arrMType)){
	$arrMType = $objWebInit->getTypeList();
	$arrMType = $objWebInit->formatTypeList(0,$arrMType);
}

// 输出到模板
$arrMOutput["smarty_assign"]['get'] = $_GET;
$arrMOutput["smarty_assign"]['FileCallPath'] = $arrGPic['FileCallPath'];
$arrMOutput["smarty_assign"]['FileListPicSize'] = $arrGPic['FileListPicSize'];
$arrMOutput["smarty_assign"]['arrData'] = $arrInfo;
$arrMOutput["smarty_assign"]['arrType'] = $arrMType;
$arrMOutput["smarty_assign"]['action_type'] = "save";
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['adminu_main_dir'].'submit.htm';
$objWebInit->output($arrMOutput);
?>