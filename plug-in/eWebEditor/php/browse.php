<?php header("content-Type: text/html; charset=gb2312");
/*
*######################################
* eWebEditor v5.5 - Advanced online web based WYSIWYG HTML editor.
* Copyright (c) 2003-2008 eWebSoft.com
*
* For further information go to http://www.ewebsoft.com/
* This copyright notice MUST stay intact for use.
*######################################
*/
?>
<?php
require("config.php");
InitParam();
$GLOBALS["sAction"] = strtoupper(toTrim("action"));
if ($GLOBALS["sAction"]=="FILE"){
OutScript(GetFileList());}else{
$GLOBALS["sAction"] = "FOLDER";
OutScript(GetFolderList());}
function GetFileList(){
$s_ReturnFlag = toTrim("returnflag");
$s_FolderType = toTrim("foldertype");
$s_Dir = toTrim("dir");
$s_CurrDir = "";
switch ($s_FolderType){
case "upload":
$s_CurrDir = $GLOBALS["sUploadDir"];
break;
case "shareimage":
$GLOBALS["sAllowExt"] = "";
$s_CurrDir = $GLOBALS["sPathShareImage"];
break;
case "shareflash":
$GLOBALS["sAllowExt"] = "";
$s_CurrDir = $GLOBALS["sPathShareFlash"];
break;
case "sharemedia":
$GLOBALS["sAllowExt"] = "";
$s_CurrDir = $GLOBALS["sPathShareMedia"];
break;
default:
$s_FolderType = "shareother";
$GLOBALS["sAllowExt"] = "";
$s_CurrDir = $GLOBALS["sPathShareOther"];
break;}
$s_Dir = str_replace("\\", "/", $s_Dir);
$s_Dir = str_replace("../", "", $s_Dir);
$s_Dir = str_replace("./", "", $s_Dir);
if (substr($s_Dir,0,1)=="/"){
$s_Dir = "";}
if ($s_Dir != "") {
if (is_dir($s_CurrDir.$s_Dir)) {
$s_CurrDir = $s_CurrDir.$s_Dir;}else{
$s_Dir = "";}}
$s_List = "";
if (is_dir($s_CurrDir)){
if ($handle = opendir($s_CurrDir)) {
while (false !== ($file = readdir($handle))) {
$sFileType = filetype($s_CurrDir.$file);
if ($sFileType=="file"){
$oFiles[] = $file;}}}
$i = -1;
if (isset($oFiles)){
foreach( $oFiles as $oFile){
if (CheckValidExt($oFile)) {
$i = $i + 1;
$sFileName = $s_CurrDir.$oFile;
$s_List = $s_List."arr[".$i."]=new Array(\"".$oFile."\", \"".GetSizeUnit(filesize($sFileName))."\",\"".date("Y-m-d H:i:s", filemtime($sFileName))."\");\n";}}}}
$s_List = "var arr = new Array();\n".$s_List."parent.setFileList('".$s_ReturnFlag."', '".$s_FolderType."', '".$s_Dir."', arr);";
return $s_List;}
function GetFolderList(){
$s_List = "var arrUpload = new Array();\n";
$s_List = $s_List."var arrShareImage = new Array();\n";
$s_List = $s_List."var arrShareFlash = new Array();\n";
$s_List = $s_List."var arrShareMedia = new Array();\n";
$s_List = $s_List."var arrShareOther = new Array();\n";
$GLOBALS["nTreeIndex"] = 0;
$s_List = $s_List.GetFolderTree($GLOBALS["sUploadDir"], "Upload", 1);
$GLOBALS["sAllowExt"] = "";
switch($GLOBALS["sType"]){
case "FILE":
$GLOBALS["nTreeIndex"] = 0;
$s_List = $s_List.GetFolderTree($GLOBALS["sPathShareImage"], "ShareImage", 1);
$GLOBALS["nTreeIndex"] = 0;
$s_List = $s_List.GetFolderTree($GLOBALS["sPathShareFlash"], "ShareFlash", 1);
$GLOBALS["nTreeIndex"] = 0;
$s_List = $s_List.GetFolderTree($GLOBALS["sPathShareMedia"], "ShareMedia", 1);
$GLOBALS["nTreeIndex"] = 0;
$s_List = $s_List.GetFolderTree($GLOBALS["sPathShareOther"], "ShareOther", 1);
break;
case "MEDIA":
$GLOBALS["nTreeIndex"] = 0;
$s_List = $s_List.GetFolderTree($GLOBALS["sPathShareMedia"], "ShareMedia", 1);
break;
case "FLASH":
$GLOBALS["nTreeIndex"] = 0;
$s_List = $s_List.GetFolderTree($GLOBALS["sPathShareFlash"], "ShareFlash", 1);
break;
default:
$GLOBALS["nTreeIndex"] = 0;
$s_List = $s_List.GetFolderTree($GLOBALS["sPathShareImage"], "ShareImage", 1);
break;}
$s_List = $s_List."parent.setFolderList(arrUpload, arrShareImage, arrShareFlash, arrShareMedia, arrShareOther);";
return $s_List;}
function GetFolderTree($s_Dir, $s_Flag, $n_Indent){
if ($handle = opendir($s_Dir)) {
while (false !== ($file = readdir($handle))) {
$sFileType = filetype($s_Dir.$file);
if ($sFileType=="dir"){
if (($file!=".")&&($file!="..")){
$oDirs[] = $file;}}}}
$s_List = "";
if (isset($oDirs)){
$i = 0;
$n_Count = count($oDirs);
foreach( $oDirs as $oDir){
$i = $i + 1;
if ($i < $n_Count) {
$s_LastFlag = "0";}else{
$s_LastFlag = "1";}
$s_List = $s_List."arr".$s_Flag."[".$GLOBALS["nTreeIndex"]."]=new Array(\"".$oDir."\",".$n_Indent.", ".$s_LastFlag.");\n";
$GLOBALS["nTreeIndex"] = $GLOBALS["nTreeIndex"] + 1;
$s_List = $s_List.GetFolderTree($s_Dir.$oDir."/", $s_Flag, $n_Indent+1);}}
return $s_List;}
function OutScript($str){
echo "<HTML><HEAD><meta http-equiv='Content-Type' content='text/html; charset=gb2312'><TITLE>eWebEditor</TITLE></head><body>";
echo "<script language=javascript>".$str."</script>";
echo "</body></html>";
exit;}
function CheckValidExt($s_FileName){
if($GLOBALS["sAllowExt"] == ""){
return true;}
preg_match("/\.([a-zA-Z0-9]{2,4})$/",$s_FileName,$exts);
$sExt = $exts[1];
$aExt = explode('|',$GLOBALS["sAllowExt"]);
if(!in_array(strtoupper($sExt),$aExt)){
return false;}
return true;}
function  InitParam(){
global $sType, $sStyleName, $sCusDir, $sAction;
global $nTreeIndex;
global $sAllowExt, $sUploadDir, $sBaseUrl, $sContentPath, $nAllowBrowse, $nCusDirFlag;
global $sPathShareImage, $sPathShareFlash, $sPathShareMedia, $sPathShareOther;
$sType = strtoupper(toTrim("type"));
$sStyleName = toTrim("style");
$sCusDir = toTrim("cusdir");
$bValidStyle = false;
$numElements = count($GLOBALS["aStyle"]);
for($i=1; $i<=$numElements; $i++){
$aStyleConfig = explode("|||", $GLOBALS["aStyle"][$i]);
if (strtolower($sStyleName)==strtolower($aStyleConfig[0])){
$bValidStyle = true;
break;}}
if ($bValidStyle == false) {
OutScript("alert('Invalid Style!')");}
$sBaseUrl = $aStyleConfig[19];
$nAllowBrowse = (int)$aStyleConfig[43];
$nCusDirFlag = (int)$aStyleConfig[61];
if($nAllowBrowse!=1){
OutScript("alert('Do not allow browse!')");}
if ($nCusDirFlag!=1){
$sCusDir = "";}else{
$sCusDir = str_replace("\\", "/", $sCusDir);
if ((substr($sCusDir,0,1)=="/") || (substr($sCusDir,0,1)==".") || (substr($sCusDir, -1)==".") || (strstr($sCusDir, "./")) || (strstr($sCusDir, "/.")) || (strstr($sCusDir, "//"))){
$sCusDir = "";}else{
if (substr($sCusDir, -1) != "/"){
$sCusDir = $sCusDir."/";}}}
$sUploadDir = $aStyleConfig[3];
if ($sBaseUrl!="3"){
if (substr($sUploadDir, 0, 1) != "/"){
$sUploadDir = "../".$sUploadDir;}
$sUploadDir = realpath($sUploadDir);}
$sUploadDir = GetSlashPath($sUploadDir);
$sUploadDir = $sUploadDir.$sCusDir;
switch ($sType){
case "FILE":
$sAllowExt = "";
break;
case "MEDIA":
$sAllowExt = "rm|mp3|wav|mid|midi|ra|avi|mpg|mpeg|asf|asx|wma|mov";
break;
case "FLASH":
$sAllowExt = "swf";
break;
default:
$sAllowExt = "bmp|jpg|jpeg|png|gif";
break;}
$sAllowExt = strtoupper($sAllowExt);
$sPathShareImage = GetSlashPath(realpath("../sharefile/image/"));
$sPathShareFlash = GetSlashPath(realpath("../sharefile/flash/"));
$sPathShareMedia = GetSlashPath(realpath("../sharefile/media/"));
$sPathShareOther = GetSlashPath(realpath("../sharefile/other/"));}
function GetSlashPath($p){
if ((substr($p,-1)!="\\") && (substr($p,-1)!="/")){
return $p."/";}
return $p;}
function toTrim($p){
if (isset($_GET[$p])){
return trim($_GET[$p]);}else{
return "";}}
function GetSizeUnit($n_Size){
return number_format(($n_Size / 1024), 2, ".", "") . "K";}
?>