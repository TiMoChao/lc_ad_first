<?php
/**
 * 后台管理栏目基本设置文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	admin
 */
require_once('../config/config.inc.php');
require_once('../checklogin.php');
require_once('class/backup.class.php');

$objWebInit = new backup();
//smarty参数
$objWebInit->arrGSmarty = $arrGSmarty;
//数据库连接参数
$objWebInit->setDBG($arrGPdoDB);
$objWebInit->db();

//访问权限检查
if (! $objWebInit->checkPopedomG($_SESSION['user_id'])) {
	check::AlertExit('对不起，您没有权限访问此页',-1);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	@set_time_limit(0);
	/* 系统信息 */
    $sys_info['os']         = PHP_OS;
    $sys_info['web_server'] = $_SERVER['SERVER_SOFTWARE'];
    $sys_info['php_ver']    = PHP_VERSION;
	$sys_info['mysql_ver'] = $objWebInit->get_ver();
	$sys_info['date']       = date("Y-m-d H:i:s");
	$date = date("Y-m-d");

	$head = "-- BIWEB SQL Dump \n".
			 "-- http://www.biweb.cn \n".
			 "-- \n".
			 "-- DATE : ".$sys_info["date"]."\n".
             "-- MYSQL SERVER VERSION : ".$sys_info['mysql_ver']."\n".
             "-- PHP VERSION : ".$sys_info['php_ver']."\n".
             "-- Vol : ";

    $sql = $head." 1 \n-- \n-- DATABASE : ".$arrGPdoDB['db_name']."\n-- \n\n-- ---------------------------------\n";
    $zip = new phpzip;
    $vol_size = $_POST['vol_size'];
    $sql_name = $_POST['sql_name'];
    $i= 1;
    $error = 0;
	if(!$objWebInit->creat_cache($sql)) die("不能建立缓存文件！");
	$arrTables = $objWebInit->get_table();

    foreach ( $arrTables as $k=>$table){
        if (!$objWebInit->get_table_df($table, $sql,$_POST['drop_tab'])){
            $error = 1;
            break;
        }

        if (!$objWebInit->get_table_content($table,$sql,$_POST['ext_insert'])){
            $error = 1;
            break;
        }
    }
	if (filesize($objWebInit->cache) >$vol_size ){
		if (!$fp = @fopen($objWebInit->cache,'r')) {
            die ($objWebInit->cache." 缓存文件不存在.");
        }else{
			$intBlock = $_POST['vol_size']*1024;
			while (!feof($fp)) {
				$buffer = fread($fp, $intBlock);
				$buffer .= fgets($fp);
				$zip->add_file($buffer,$arrGPdoDB['db_name'].'_'.$date.'_'.$i.'.sql');
				$i++;
				$sql = $head.$i."\n-- \n-- DATABASE : ".$arrGPdoDB['db_name']."\n-- \n\n-- ---------------------------------\n";
			}
			@fclose($fp);
		}
    }
    if ($i == 1){
        $zip->add_file(file_get_contents($objWebInit->cache),$arrGPdoDB['db_name'].'_'.$date.'.sql');
    }
    if ($error){
        check::AlertExit("备份错误 !",-1);
    }

    header("Content-disposition: filename=$sql_name");
    header("Content-type: unknown/unknown");
	echo($zip->file());
	unlink($objWebInit->cache);
    exit;

}
// 输出到模板
$arrMOutput["smarty_assign"]['strNav'] = '数据备份';
$arrMOutput["smarty_assign"]['db_name'] = $arrGPdoDB['db_name'];
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'backup/sql_backup.htm';
$objWebInit->output($arrMOutput);
?>