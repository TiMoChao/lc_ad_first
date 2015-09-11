<?php
/**
 * 公司风采后台管理栏目修改文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	Planning_production
 */
require_once('../config/config.inc.php');
require_once("../class/Planning_production.class.php");
require_once('../..'.__WEBADMIN_ROOT.'/checklogin.php');

$objWebInit = new Planning_production();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
//图片上传参数
$objWebInit->arrGPic = $arrGPic;
$objWebInit->db();

//访问权限检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'])) {
	check::AlertExit('对不起，您没有权限访问此页',-1);
}

// 取得文章信息
$arrInfo = $objWebInit->getInfo($_REQUEST['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST['type_id'])||empty($_POST['title'])||empty($_POST['intro'])){
		check::AlertExit("错误：有必填选项没填!",-1);
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

	//替换旧软件包
	if ($_FILES['sFiledata1']['name'] != "") {
		$strOldFile = $arrGPic['FileSavePath'].$_POST['savefilename1'];
		if (is_file($strOldFile)) {	// 原文件删除
			unlink($strOldFile);
		}
		$_POST['software'] = $objWebInit->uploadInfoFile($_FILES['sFiledata1'],$_POST['id']);
	}else{
		$_POST['software'] = $_POST['savefilename1'];
	}

	//替换旧资料包
	if ($_FILES['sFiledata2']['name'] != "") {
		sleep(1);
		$strOldFile = $arrGPic['FileSavePath'].$_POST['savefilename2'];
		if (is_file($strOldFile)) {	// 原文件删除
			unlink($strOldFile);
		}
		$_POST['package'] = $objWebInit->uploadInfoFile($_FILES['sFiledata2'],$_POST['id']);
	}else{
		$_POST['package'] = $_POST['savefilename2'];
	}

	if(strpos($_POST['type_id'],'|')!==false){
		$arrTemp = explode('|',$_POST['type_id']);
		$_POST['type_id'] = $arrTemp[0];
		$_POST['type_roue_id'] = $arrTemp[1];
		if(empty($_POST['my_promotion'])) $_POST['my_promotion'] = ceil($_POST['my_promotion']*$arrTemp[2]);
		if(empty($_POST['qq'])) $_POST['qq'] = $arrTemp[3];
	}else{
		$_POST['type_roue_id'] = ':'.$_POST['type_id'].':';
	}
	if($_POST['summary'] == '') $_POST['summary'] = check::csubstr(trim(str_replace("&nbsp;"," ",str_replace("\r\n","",strip_tags($_POST['intro'])))),0,$arrGWeb['db_summary_len']);
	if($_POST['title'] != '') $_POST['title_md5'] = md5($_POST['title']);
	if(is_array($_POST['photo'])) $_POST['thumbnail'] = $_POST['photo'][0]['photo'];
	else $_POST['thumbnail'] = $_POST['photo'];

	$_POST['photo'] = array_values($_POST['photo']);
	$_POST['video'] = array_values($_POST['video']);

	#自动拆字生成tag
	if(empty($_POST['tag'])){
		$objSP = new SplitWord();
		$_POST['tag'] = $objSP->SplitRMM($_POST['title'],false);
	}

	
	$_POST = array_merge($arrInfo,$_POST);
	$objWebInit->saveInfo($_POST,1);
	
	$objWebInit->updateCache($_POST['id'],$_POST['type_id'],$arrMOutput);

	check::WindowLocation('index.php','page='.$_GET['page']);
}


if(!is_array($arrMType)||empty($arrMType)){
	$arrMType = $objWebInit->getTypeList();
	$arrMType = $objWebInit->formatTypeList(0,$arrMType);
}


// 输出到模板
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['FileCallPath'] = $objWebInit->arrGPic['FileCallPath'];
$arrMOutput["smarty_assign"]['FileListPicSize'] = $objWebInit->arrGPic['FileListPicSize'];
$arrMOutput["smarty_assign"]['arrData'] = $arrInfo;
$arrMOutput["smarty_assign"]['arrMType'] = $arrMType;
$arrMOutput["smarty_assign"]['action_type'] = "save";
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'submit.htm';
$objWebInit->output($arrMOutput);
?>