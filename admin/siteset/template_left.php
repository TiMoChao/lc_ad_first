<?php
/**
 * 后台管理栏目模板在线编辑文件
 *
 * @author		whoneed(whoneed@126.com)
 * @copyright	whoneed.cn
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	admin
 */
require_once('../config/config.inc.php');
require_once('../checklogin.php');

$objWebInit = new ArthurXF();
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;

//访问权限检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'],'siteset')) {
	check::AlertExit('对不起，您没有权限访问此页',-1);
}

define('__WEB_ROOT', dirname(__FILE__)."/../..");
$templateDir = __WEB_ROOT.'/templates/'.$arrGWeb['templates_id'];

$arrTreeFiles = array();
check::mapTreeFiles($templateDir,true);
$arrTreeFiles = str_replace($templateDir.'/','',$arrTreeFiles);

//过滤类型
$arrFile	  = array('.html','.htm','.js','.css');
$arrFilesDirs = array();

foreach($arrTreeFiles as $v){
	$isContinue = false;
	foreach($arrFile as $v1){
		if(strpos($v,$v1)) $isContinue = true;
	}
	if(!$isContinue) continue;

	$arrTemp = array();
	$arrTemp = explode('/',$v);

	$arrFilesDirs[] = $arrTemp;
}

//转换数组结构
$arrTemp = array();
$n = 0;
foreach($arrFilesDirs as $k=>$v){
	$len = count($v);
	if($len == 1){
		$arrTemp[$n] = $v;
	}else{
		$strTemp = '';
		for($i=0;$i<$len-1;$i++){
			if(empty($strTemp)) $strTemp=$v[$i];
			else $strTemp.='-'.$v[$i];
		}
		$arrTemp[$n][] = $strTemp;
		$arrTemp[$n][] = $v[$i];
	}
	$n++;
}

$arrFilesDirs = $arrTemp;

$arrTemp = array();
$arrData = array();
$arrHave = array();
$n = 1;
foreach($arrFilesDirs as $k=>$v){
	$len = count($v);
	$fId = $n;

	if($len == 1){
		$arrTemp['key']	 = $n;
		$arrTemp['fId']  = 0;
		$arrTemp['file'] = $v[0];
		$arrTemp['link'] = $v[0]; 

		$arrData[] = $arrTemp;
		$n++;
	}else{
		$arrT = array();
		$arrT = explode('-',$v['0']);
		$intLen = count($arrT);
		for($i=0;$i<$intLen;$i++){
			$arrTemp['key']	= $n;
			$strTemp = check::dirsString($arrT,$i);
			if(!isset($arrHave[$strTemp]) || empty($arrHave[$strTemp])){ //暂时没有这个变量存在
				$arrHave[$strTemp] = $n;

				if($i == 0) $arrTemp['fId'] = 0;
				else $arrTemp['fId']  = $arrHave[check::dirsString($arrT,$i-1)];
				$arrTemp['file'] = $arrT[$i];
				$arrTemp['link'] = '';
				$arrData[] = $arrTemp;
				$n++;
			}
		}
		
		$strT = implode('/',explode('-',$v['0']));
		$arrTemp['key']	 = $n;
		$arrTemp['fId']  = $arrHave[$v[0]];
		$arrTemp['file'] = $v[1];
		$arrTemp['link'] = $strT.'/'.$v[1];
		$n++;

		$arrData[] = $arrTemp;

	}
}

// 输出到模板
$arrMOutput["template_file"] = 'siteset/template_left.htm';
$arrMOutput["smarty_assign"]['arrData'] = $arrData;
$objWebInit->output($arrMOutput);
?>