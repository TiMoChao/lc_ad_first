<?php
/**
 * 公司风采后台管理栏目新增文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	Community_ad
 */
require_once('../config/config.inc.php');
require_once("../class/Community_ad.class.php");
require_once('../..'.__WEBADMIN_ROOT.'/checklogin.php');

$objWebInit = new Community_ad();
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

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST['type_id'])||empty($_POST['title'])||empty($_POST['intro'])){
		check::AlertExit("错误：有必填选项没填!",-1);
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

	//新软件包上传
	if ($_FILES['software']['name'] != "") {
		$_POST['software'] = $objWebInit->uploadInfoFile($_FILES['sFiledata1'],NULL);
	}

	//新资料包上传
	if ($_FILES['package']['name'] != "") {
		sleep(1);
		$_POST['package'] = $objWebInit->uploadInfoFile($_FILES['sFiledata2'],NULL);
	}

	if(strpos($_POST['type_id'],'|')!==false){
		$arrTemp = explode('|',$_POST['type_id']);
		$_POST['type_id'] = $arrTemp[0];
		$_POST['type_roue_id'] = $arrTemp[1];
	}else{
		$_POST['type_roue_id'] = ':'.$_POST['type_id'].':';
	}
	if($_POST['summary'] == '') $_POST['summary'] = check::csubstr(trim(str_replace("&nbsp;"," ",str_replace("\r\n","",strip_tags($_POST['intro'])))),0,$arrGWeb['db_summary_len']);
	if($_POST['title'] != '') $_POST['title_md5'] = md5($_POST['title']);
	if(is_array($_POST['photo'])) $_POST['thumbnail'] = $_POST['photo'][0]['photo'];
	else $_POST['thumbnail'] = $_POST['photo'];

	//自动拆字生成tag
	if(empty($_POST['tag'])){
		$objSP = new SplitWord();
		$_POST['tag'] = $objSP->SplitRMM($_POST['title'],false);
	}

	
	$objWebInit->saveInfo($_POST,0);
	$objWebInit->updateCache($objWebInit->lastInsertIdG(),$_POST['type_id'],$arrMOutput);

	check::WindowLocation('index.php','page='.$_GET['page']);
}


if(!is_array($arrMType)||empty($arrMType)){
	$arrMType = $objWebInit->getTypeList();
	$arrMType = $objWebInit->formatTypeList(0,$arrMType);
}

// 输出到模板
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['arrMType'] = $arrMType;
$arrMOutput["smarty_assign"]['FileListPicSize'] = $objWebInit->arrGPic['FileListPicSize'];
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'submit.htm';
$objWebInit->output($arrMOutput);
?>