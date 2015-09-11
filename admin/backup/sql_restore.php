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
	if(empty($_FILES['Filedata']['name'])) check::AlertExit("必须上传.sql文件 !",-1);
	$strFileExt = strtolower(strrchr($_FILES['Filedata']['name'],'.'));
	if ($strFileExt!='.sql'){
        check::AlertExit("仅支持SQL文件 !",-1);
    }
    @set_time_limit(0);
    $sql_file = $_FILES['Filedata']['tmp_name'];
    if ($objWebInit->import($sql_file)){
        check::Alert('数据库导入成功！');
    }else{
        check::AlertExit('数据库导入失败！',-1);
    }

}
// 输出到模板
$arrMOutput["smarty_assign"]['strNav'] = '数据还原';
$arrMOutput["template_file"] = "admin.html";
$arrMOutput["smarty_assign"]['MAIN'] = $arrGSmarty['admin_main_dir'].'backup/sql_restore.htm';
$objWebInit->output($arrMOutput);
?>