<?php
/**
 * 网站架构公用全局变量配置文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	frame
 */
@session_start();
error_reporting(E_ALL ^ E_NOTICE);
//网站底层功能类
define('__WEBCOMMON_ROOT', __WEB_ROOT .'/web_common5.8');	//web_common在网站目录内
//define('__WEBCOMMON_ROOT', __WEB_ROOT .'/../web_common5.8');	//web_common在网站目录外
define('__WEBADMIN_ROOT', '/admin');	//网站后台管理目录，修改此处需对应修改目录
require_once(__WEBCOMMON_ROOT . '/php_common.php');


//smarty不缓存执行函数集
require_once('smarty.fun.php');

//底层可选功能模块配置文件
require_once('module.inc.php');

//取得网站目录前缀
if(!array_key_exists('prefix',$_SESSION)){
	$arrTemp = explode('/',substr(strrchr(check::toUNIXpath(__WEB_ROOT),$_SERVER["DOCUMENT_ROOT"]),strlen($_SERVER["DOCUMENT_ROOT"])));
	$arrPop = array();
	foreach($arrTemp as $k =>$v){
		if($v == '') continue;
		if($v == '..') {
			array_pop($arrPop);
			continue;
		}
		array_push($arrPop,$v);
	}
	if(empty($arrPop)) $_SESSION['prefix'] = '';
	else{
		$strPrefix = '';
		foreach($arrPop as $k =>$v){
			$strPrefix .= '/'.$v;
		}
		$_SESSION['prefix'] = $strPrefix;
	}
	unset($arrTemp);
	unset($arrPop);
}

//网站公用参数变量 版权信息请不要擅自删除，如需删除请访问biweb.cn购买授权
define('v','BIWEB V5.8.2');		//版本号
@include_once(__WEB_ROOT .'/data/webconfig.inc.php');
$arrGWeb['Powered'] = 'Powered by <b><a href="http://www.biweb.cn" title="网务通商务智能网站系统" target="_blank"><span style="color: #FF9900">'.v.'</span></a></b>';
$arrGWeb['Copyright'] = 'Copyright &copy; 2005-'.date('Y').' <b><a href="http://'.$arrGWeb['host'].'" title="'.$arrGWeb['company'].'" >'.$arrGWeb['name'].'</a></b>, All Rights Reserved .';		//版权信息
$arrGWeb['module_name'] = '设置';	//设置模块名称
$arrGWeb['module_id'] = 'index';	//设置模块id
$arrGWeb['WEB_ROOT_pre'] = $_SESSION['prefix'];
$arrGWeb['WEBADMIN_ROOT'] = __WEBADMIN_ROOT;
$arrGWeb['templats_root'] = $arrGWeb['WEB_ROOT_pre'].'/templates/'.$arrGWeb['templates_id'];	//模版的目录
$arrGWeb['cache_url'] = '/html';
$arrGWeb['charset'] = 'utf-8';
$arrGWeb['db_summary_len'] = 100;	//摘要生成长度设定

//页面数据提交之后回调
header('Cache-control: private');

//客户端缓存
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Expires: ' .gmdate ('D, d M Y H:i:s', time() + $arrGWeb['SquidTime']). " GMT");

//静态优化URL处理文件
require_once('static.fun.php');

//繁体转换
if(strpos($_SERVER['HTTP_HOST'],'big5') === false){
	$_SESSION['langset'] = 'zh_cn';
}else{
	$_SESSION['langset'] = 'zh_tw';
}

//取得浏览器版本
if(empty($_SESSION['browser'])){
	$_SESSION['browser'] = check::BrowserVer();
}

//数据库参数
$arrGPdoDB = array();
$arrGPdoDB['db_driver'] = 'mysql';
if(empty($arrGWeb['db_host'])) $arrGPdoDB['db_host'] = 'localhost';
else $arrGPdoDB['db_host'] = $arrGWeb['db_host'];
if(empty($arrGWeb['db_port'])) $arrGPdoDB['db_port'] = '3306';
else $arrGPdoDB['db_port'] = $arrGWeb['db_port'];
if(empty($arrGWeb['db_name'])) $arrGPdoDB['db_name'] = '';
else $arrGPdoDB['db_name'] = $arrGWeb['db_name'];
$arrGPdoDB['db_char'] = "utf8";
$arrGPdoDB['dsn'] = $arrGPdoDB['db_driver'].':host='.$arrGPdoDB['db_host'].';port='.$arrGPdoDB['db_port'].';dbname='.$arrGPdoDB['db_name'].';charset='.$arrGPdoDB['db_char'];
if(empty($arrGWeb['db_user'])) $arrGPdoDB['db_user'] = '';
else $arrGPdoDB['db_user'] = $arrGWeb['db_user'];
if(empty($arrGWeb['db_password'])) $arrGPdoDB['db_password'] = '';
else $arrGPdoDB['db_password'] = $arrGWeb['db_password'];
if(empty($arrGWeb['db_tablepre'])) $arrGPdoDB['db_tablepre'] = 'biweb_';
else $arrGPdoDB['db_tablepre'] = $arrGWeb['db_tablepre'];
$arrGPdoDB['PDO_ATTR_PERSISTENT'] = true;
if(isset($_SESSION['user_group']) && $_SESSION['user_group'] == 3){
	if(isset($_GET['debug'])) $arrGPdoDB['PDO_DEBUG'] = $_GET['debug'];
	else $arrGPdoDB['PDO_DEBUG'] = false;
}else $arrGPdoDB['PDO_DEBUG'] = false;
$arrGPdoDB['PDO_CACHE'] = $arrGWeb['PDO_CACHE'];
$arrGPdoDB['PDO_CACHE_ROOT'] = __WEB_ROOT .'/cache/PDO_CACHE';
$arrGPdoDB['PDO_CACHE_LIFETIME'] = $arrGWeb['PDO_CACHE_LIFETIME'];
$arrGPdoDB['htmlspecialchars'] = array('intro','summary','tag'); //不需要htmlspecialchars过滤的数据字段

//静态页面缓存参数
$arrGCache = array();
$arrGCache['cache_root'] = __WEB_ROOT .$arrGWeb['cache_url'];
$arrGCache['cache_filenum'] = 2500;	//同一目录存放多少个文件，建议不超过3000

//smarty参数
$arrGSmarty = array();
$arrGSmarty['left_delimiter']  =  '<?{';
$arrGSmarty['right_delimiter'] =  '}?>';
$arrGSmarty['template_dir'] = __WEB_ROOT.'/templates/'.$arrGWeb['templates_id'];
$arrGSmarty['admin_template_dir'] = __WEB_ROOT.__WEBADMIN_ROOT.'/templats/';
$arrGSmarty['cache_dir'] = __WEB_ROOT.'/cache/';
$arrGSmarty['compile_dir'] = __WEB_ROOT.'/compile/';
$arrGSmarty['plugins_dir'] = array('plugins');
$arrGSmarty['caching'] = $arrGWeb['smarty_caching'];
$arrGSmarty['cache_lifetime'] = $arrGWeb['smarty_cache_lifetime'];
$arrGSmarty['cache_modified_check'] = false;
$arrGSmarty['compile_check'] = true;
?>