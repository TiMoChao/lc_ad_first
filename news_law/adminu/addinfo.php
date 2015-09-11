<?php
/**
 * 资讯后台管理栏目新增文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	news_law
 */
require_once('../config/config.inc.php');
require_once("../class/news_law.class.php");
require_once ('../../useradmin/checklogin.php');

$objWebInit = new news_law();
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
//图片上传参数
$objWebInit->arrGPic = $arrGPic;
$objWebInit->db();
//print_r($_POST);exit;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
		
	if (empty($_POST['submitpass']) || $_POST['submitpass'] != $_SESSION['submitpasskey']){
		exit;
	}
	
	if (empty($_POST['type_id'])||empty($_POST['title'])||empty($_POST['intro'])){
		check::AlertExit("错误：有必填选项没填!",-1);
	}

	$arrTemp = explode('|',$_POST['type_id']);
	$_POST['type_id'] = $arrTemp[0];
	$_POST['type_roue_id'] = $arrTemp[1];
	if($_POST['title'] != '') $_POST['title_md5'] = md5($_POST['title']);
	//判断文章信息
	$arrTemp = $objWebInit->getInfoList("where title_md5='$_POST[title_md5]' and user_id = '$_SESSION[user_id]' and type_id='$_POST[type_id]'","", 0, 1);
	if($arrTemp['COUNT_ROWS']!=0) check::AlertExit("错误：相同的信息请不要重复发布！需要刷新排列的话，请使用列表下方“提前”选项！",-1);

	if ($_FILES['Filedata']['name'] != "") {
		$_POST['photo'] = $objWebInit->uploadInfoImage($_FILES['Filedata'],'',$_POST['FileListPicSize'],$_POST['csize0']);
	}

	//新图上传
	set_time_limit(0);
	foreach($_FILES as $key => $val){
		if(strrpos($key,'Filedata') === false) continue;
		$num = substr($key,strlen('Filedata'));
		if(!empty($_FILES['Filedata'.$num]['name'])){
			$arrTemp = array();
			$arrTemp['photo'] = $objWebInit->uploadInfoImage($_FILES['Filedata'.$num],$num,$objWebInit->arrGPic['FileListPicSize'],$objWebInit->arrGPic['FileSourPicSize']);
			$arrTemp['photo_narrate'] = $_POST['photo_narrate'.$num];
			$_POST['photo'][$num] = $arrTemp;
		}
	}

	//新视频上传
	foreach($_FILES as $key => $val){
		if(strrpos($key,'vFiledata') === false) continue;
		$num = substr($key,strlen('vFiledata'));
		if(!empty($_FILES['vFiledata'.$num]['name'])){
			$arrTemp = array();
			$arrTemp['video'] = $objWebInit->uploadInfoFile($_FILES['vFiledata'.$num],$num,0,array('.flv'));
			$arrTemp['video_narrate'] = $_POST['video_narrate'.$num];
			$arrTemp['video_title'] = $_POST['video_title'.$num];
			$arrTemp['video_time'] = $_POST['video_time'.$num];
			$_POST['video'][$num] = $arrTemp;
		}

	}

	//新视频图片上传
	sleep(1);
	foreach($_FILES as $key => $val){
		if(strrpos($key,'pFiledata') === false) continue;
		$num = substr($key,strlen('pFiledata'));
		if(!empty($_FILES['pFiledata'.$num]['name'])){
			$_POST['video'][$num]['videopic'] = $objWebInit->uploadInfoImage($_FILES['pFiledata'.$num],$num,0,$objWebInit->arrGPic['FileSourPicSize']);
		}

	}

	if($_POST['summary'] == '') $_POST['summary'] = check::csubstr(trim(str_replace("&nbsp;"," ",str_replace("\r\n","",strip_tags($_POST['intro'])))),0,$arrGWeb['db_summary_len']);
	if(is_array($_POST['photo'])) $_POST['thumbnail'] = $_POST['photo'][0]['photo'];
	else $_POST['thumbnail'] = $_POST['photo'];
	$objWebInit->saveInfo($_POST,0);

	if($arrGWeb['file_static']){
		//生成静态页面
		$intID = $objWebInit->getMaxID()-1;
		$strDir = ceil($intID/$arrGCache['cache_filenum']);
		$objCache = new cache($arrGCache['cache_root'].'-'.$strDir.'/'.$intID.$arrGWeb['file_suffix'],$arrGCache['cache_time']);
		$objCache->cache_start();
		$strContents = @file_get_contents('http://'.$_SERVER["HTTP_HOST"].'/'.$arrGWeb['module_id'].'/detail.php?id='.$intID);
		if($strContents){
			echo $strContents;
		}
		$objCache->cache_end(false);
	}


	check::WindowLocation('index.php','page='.$_GET['page']);
}

if(!is_array($arrMType)||empty($arrMType)){
	$arrMType = $objWebInit->getTypeList();
	$arrMType = $objWebInit->formatTypeList(0,$arrMType);
}

$_SESSION['submitpasskey'] = md5(md5(time()));

//print_r($arrMType);
// 输出到模板
$arrMOutput["smarty_assign"]['arrType'] = $arrMType;
$arrMOutput["smarty_assign"]['FileCallPath'] = $arrGPic['FileCallPath'];
$arrMOutput["smarty_assign"]['FileListPicSize'] = $arrGPic['FileListPicSize'];
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['adminu_main_dir'].'submit.htm';
$objWebInit->output($arrMOutput);
?>