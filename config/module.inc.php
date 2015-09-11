<?php
/**
 * 网站框架底层可选功能模块配置文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	frame
 */

function __autoload($class_name) {
	//底层可选功能模块数组
	$arrGModule = array();
	$arrGModule['phpzip'] = 'phpzip.class.php';						//phpzip压缩功能类
	$arrGModule['PHPMailer'] = 'PHPMailer/class.phpmailer.php';		//邮件功能类
	$arrGModule['emailverify'] = 'emailverify.class.php';			//邮件验证功能类
	$arrGModule['ubbcode'] = 'ubbcode.class.php';					//ubb功能类
	$arrGModule['domxml'] = 'domxml.class.php';						//domxml功能类
	$arrGModule['lastRSS'] = 'lastRSS.class.php';					//抓取RSS功能类
	$arrGModule['Snoopy'] = 'Snoopy.class.php';						//网络客户端
	$arrGModule['hawhaw'] = 'hawhaw/hawhaw.class.php';				//HTML和WML双格式手机浏览类
	$arrGModule['Chinese'] = 'chinese/chinese.class.php';			//中文编码转换类（繁简转换，utf8-big5等)
	$arrGModule['parsecsv'] = 'parsecsv/parsecsv.lib.php';			//操作csv功能类
	$arrGModule['QQWry'] = 'qqwry/qqwry.class.php';					//ip查地域功能类
	$arrGModule['nusoap'] = 'nusoap/lib/nusoap.php';				//Web Services 工具
	$arrGModule['HTML_TO_DOC'] = 'html2doc.class.php';					//html转换doc类
	$arrGModule['System_SharedMemory'] = 'SharedMemory/SharedMemory.php';	//共享内存类
	$arrGModule['UniversalFeedCreator'] = 'feedcreator.class.php';	//RSS feed生成类
	$arrGModule['SplitWord'] = 'splitword/splitword.class.php';		//中文分词类
	$arrGModule['ExcelReader'] = 'Excel/ExcelReader.class.php';		//Excel读入类
	$arrGModule['ExcelWriter'] = 'Excel/ExcelWriter.class.php';		//Excel写入类
	if(strpos($class_name,'HAW_') !== false) $class_name = 'hawhaw';

    if(!empty($arrGModule[$class_name])) include_once(__WEBCOMMON_ROOT . '/'.$arrGModule[$class_name]);
}
?>