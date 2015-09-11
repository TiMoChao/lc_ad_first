<?php
/**
 * 数据表优化文件
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

	$arrTables = $objWebInit->get_table();

	foreach ( $arrTables as $k=>$table){
		if($objWebInit->db->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql'){
			$strSQL = "OPTIMIZE TABLE `".$table."`";
			$link = mysql_connect($arrGPdoDB['db_host'], $arrGPdoDB['db_user'],$arrGPdoDB['db_password']) or die('Could not connect: ' . mysql_error());
			mysql_select_db($arrGPdoDB['db_name']) or die('Could not select database');
			$result = mysql_query($strSQL) or die('Query failed: ' . mysql_error());
		}
		//$rs = $objWebInit->db->query($strSQL,array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));
		//$rs->execute();
		//$arrData = $rs->fetchAll();
		//$objWebInit->db->exec($strSQL,array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));
	}
}

/* 初始化数据 */
$db_ver = $objWebInit->get_ver();
$ret = $objWebInit->get_table_status();

$list= array();
$num = 0;
for ($i=0;$i<count($ret) ;$i++ ){
	//$res = $objWebInit->check_table($ret[$i]['Name']);
	$type = $db_ver>'4.1'?$ret[$i]['Engine']:$ret[$i]['Type'];
	$chartset = $db_ver>'4.1'?$ret[$i]['Collation']:'N/A';
	$list[] = array('table'=>$ret[$i]['Name'],'type'=>$type, 'rec_num'=>$ret[$i]['Rows'], 'rec_size' =>sprintf(" %.2f KB",$ret[$i]['Data_length']/1024) , 'rec_index' => $ret[$i]['Index_length'] , 'rec_chip'=>$ret[$i]['Data_free'] ,
		//'status'=>$res['Msg_text'],
	'chartset'=>$chartset);
	$num += $ret[$i]['Data_free'];
}
unset($ret);

// 输出到模板
$arrMOutput["smarty_assign"]['strNav'] = '数据优化';
$arrMOutput["smarty_assign"]['list'] = $list;
$arrMOutput["smarty_assign"]['num'] = $objWebInit->num_bitunit($num);
$arrMOutput["smarty_assign"]['db_name'] = $arrGPdoDB['db_name'];
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'backup/sql_optimize.htm';
$objWebInit->output($arrMOutput);
?>