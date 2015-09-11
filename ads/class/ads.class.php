<?php
/**
 * 图形广告功能类文件
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	ads
 */

class ads extends ArthurXF{
	public $tablename1 = 'ads_type';
	public $tablename2 = 'ads';
	public $thisModel = 'ads';

	/**
	 * 上传文件
	 * @author	肖飞
	 * @param array	 	$arrFile			图片文件信息数组$_FILES
	 * @param int 		$PR					自动压缩的比例
	 * @param int		$intID				内容ID，标示新增还是修改
	 * @return unknown
	 */
	function uploadInfoImage($arrFile,$PR=0,$intID=0){
		if ($arrFile['name']) {
			if (!in_array( strtolower($arrFile['type']) , array( 'image/jpg','image/jpeg', 'image/gif' , 'image/pjpeg','image/png','image/x-png','application/x-shockwave-flash'))) {
				check::AlertExit('文件类型不符合要求('.$arrFile['type'].')',-1);
			}
		}

		if($intID == 0)	$intID = $this->getMaxID();
		$strDir = ceil($intID/1000);
		$strMakeDir = $this->arrGPic['FileSavePath'].$strDir;
		if(!is_dir($this->arrGPic['FileSavePath'])){
			@mkdir($this->arrGPic['FileSavePath']);
			@chmod($this->arrGPic['FileSavePath'],0777);
		}
		if( !is_dir($strMakeDir) ){
			@mkdir ($strMakeDir);
			@chmod ($strMakeDir, 0777);
		}

		$FileExt=strrchr($arrFile['name'],".");  //取得上传文件扩展名
		$strPhoto = $strDir."/".$intID."_".time().$FileExt;  //存入数据库的图片访问路径
		$strPicName = $strMakeDir."/".$intID."_".time().$FileExt;  //新图片路径及名称

		if($arrFile['type']!='application/x-shockwave-flash' && $arrFile['size']>$this->arrGPic['FileMaxSize']){
			if($PR != 0){
				move_uploaded_file($arrFile['tmp_name'], $strPicName);
				$objGDImage = new GDImage();
				if($objGDImage->makePRThumb($strPicName,$PR)){
					return $strPhoto;
				}else{
					check::AlertExit($strPicName."文件上传错误！",-1);
				}
			}else{
				check::AlertExit("文件大小不符合要求！",-1);
			}
		}else{
			if(move_uploaded_file($arrFile['tmp_name'], $strPicName)){
				return $strPhoto;
			}else{
				check::AlertExit($strPicName."文件上传错误！",-1);
			}
		}
	}

	/**
	 * 建立广告JS文件
	 * @author	肖飞
	 * @param array	 	$arrFile			图片文件信息数组$_FILES
	 * @param int 		$PR					自动压缩的比例
	 * @param int		$intID				内容ID，标示新增还是修改
	 * @return unknown
	 */
	function creatJS($arrData,$position=0){
		if ($arrData['COUNT_ROWS']==0) {
			is_file($this->arrGjs['JSSavePath'].$position.'.js') && unlink($this->arrGjs['JSSavePath'].$position.'.js');
			return;
		}

		$strMakeDir = $this->arrGjs['JSSavePath'].$position.'.js';
		if(!is_dir($this->arrGjs['JSSavePath'])){
			@mkdir($this->arrGjs['JSSavePath']);
			@chmod($this->arrGjs['JSSavePath'],0777);
		}
		if (is_file($strMakeDir)) {	// 源文件删除
			unlink($strMakeDir);
		}



		$handle = fopen($strMakeDir, 'w');
		unset($arrData['COUNT_ROWS']);
		foreach($arrData as $k => $v){
			if($v['webhost'] == '' || $v['webhost'] == 'http://') $v['webhost'] = '#';
			if(strpos($v['webhost'],'http://') === false) $v['webhost'] = 'http://'.$v['webhost'];
			if($v['FileExt']=='.swf') {
				fwrite($handle,'document.writeln("'.$v['f_html'].'<embed src=\"'.$this->arrGjs['JSCallPath'].'/'.$v['UploadFile'].'\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"'.$v['width'].'\" height=\"'.$v['height'].'\"></embed>'.$v['b_html'].'");'."\r\n");
			}else{
				fwrite($handle,'document.writeln("'.$v['f_html'].'<a target=\"_blank\" href=\"'.$v['webhost'].'\" title =\"'.$v['summary'].'\"><img src=\"'.$this->arrGjs['JSCallPath'].'/'.$v['UploadFile'].'\" border=\"0\" width=\"'.$v['width'].'\" height=\"'.$v['height'].'\"></a>'.$v['b_html'].'");'."\r\n");
			}
		}
		fclose($handle);
		@chmod($strMakeDir,0777);
	}
}
?>