<?php
/**
 * GD图片处理类文件
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		GDImage
 */

class GDImage {
	public $fontName; //使用的TTF字体名称
	public $maxWidth = 500; //图片最大宽度
	public $maxHeight = 600; //图片最大高度

	/**
	 * 生成缩略图(输出到浏览器)
	 * @author		肖飞
	 * @param string	$sourFile	图片源文件
	 * @param float 	$pr			压缩比例
	 * @param int 		$width		生成缩略图的宽度
	 * @param int	 	$height		生成缩略图的高度
	 * @return 0 失败 成功时返回生成的图片路径
	 */
	function makeThumb($sourFile,$pr=0,$width=128,$height=128){
		$imageInfo = $this->getInfo($sourFile);
		$sourFile = $this->sourcePath . $sourFile;
		$newName = substr($imageInfo["name"], 0, strrpos($imageInfo["name"], ".")) . "_thumb.jpg";
		switch ($imageInfo["type"]){
			case 1: //gif
			$img = imagecreatefromgif($sourFile);
			break;
			case 2: //jpg
			$img = imagecreatefromjpeg($sourFile);
			break;
			case 3: //png
			$img = imagecreatefrompng($sourFile);
			break;
			default:
				return 0;
				break;
		}
		if (!$img)
		return 0;

		if($pr!=0){
			$width = $imageInfo["width"]*$pr;
			$height = $imageInfo["height"]*$pr;
		}
		$width = ($width > $imageInfo["width"]) ? $imageInfo["width"] : $width;
		$height = ($height > $imageInfo["height"]) ? $imageInfo["height"] : $height;
		$srcW = $imageInfo["width"];
		$srcH = $imageInfo["height"];
		if ($srcW * $width > $srcH * $height)
			$height = round($srcH * $width / $srcW);
		else
			$width = round($srcW * $height / $srcH);
		//*
		if (function_exists("imagecreatetruecolor")) {//GD2.0.1
			$new = imagecreatetruecolor($width, $height);
			ImageCopyResampled($new, $img, 0, 0, 0, 0, $width, $height, $imageInfo["width"], $imageInfo["height"]);
		}else{
			$new = imagecreate($width, $height);
			ImageCopyResized($new, $img, 0, 0, 0, 0, $width, $height, $imageInfo["width"], $imageInfo["height"]);
		}
		//*/
		if ($this->toFile){
			if (file_exists($this->galleryPath . $newName))	unlink($this->galleryPath . $newName);
			ImageJPEG($new, $this->galleryPath . $newName);
			return $this->galleryPath . $newName;
		}else{
			ImageJPEG($new);
		}
		ImageDestroy($new);
		ImageDestroy($img);

	}

	/**
	 * 给图片加水印
	 * @author		肖飞
	 * @param string $sourFile	图片文件名
	 * @param string $text		文本数组(包含二个字符串)
	 * @return 1 成功 成功时返回生成的图片路径
	 */
	function waterMark($sourFile, $text) {
		$imageInfo = $this->getInfo($sourFile);
		$sourFile = $this->sourcePath . $sourFile;
//		$newName = substr($imageInfo["name"], 0, strrpos($imageInfo["name"], ".")) . "_mark.jpg";
		switch ($imageInfo["type"])	{
			case 1: //gif
			$img = imagecreatefromgif($sourFile);
			break;
			case 2: //jpg
			$img = imagecreatefromjpeg($sourFile);
			break;
			case 3: //png
			$img = imagecreatefrompng($sourFile);
			break;
			default:
				return 0;
				break;
		}
		if (!$img)
		return 0;

		$width = ($this->maxWidth > $imageInfo["width"]) ? $imageInfo["width"] : $this->maxWidth;
		$height = ($this->maxHeight > $imageInfo["height"]) ? $imageInfo["height"] : $this->maxHeight;
		$srcW = $imageInfo["width"];
		$srcH = $imageInfo["height"];
		if ($srcW * $width > $srcH * $height)
			$height = round($srcH * $width / $srcW);
		else
			$width = round($srcW * $height / $srcH);
		//*
		if (function_exists("imagecreatetruecolor")) {//GD2.0.1
			$new = imagecreatetruecolor($width, $height);
			ImageCopyResampled($new, $img, 0, 0, 0, 0, $width, $height, $imageInfo["width"], $imageInfo["height"]);
		}else{
			$new = imagecreate($width, $height);
			ImageCopyResized($new, $img, 0, 0, 0, 0, $width, $height, $imageInfo["width"], $imageInfo["height"]);
		}
		$white = imageColorAllocate($new, 255, 255, 255);
		$black = imageColorAllocate($new, 0, 0, 0);
		$alpha = imageColorAllocateAlpha($new, 230, 230, 230, 40);
		//$rectW = max(strlen($text[0]),strlen($text[1]))*7;
		ImageFilledRectangle($new, 0, $height-26, $width, $height, $alpha);
		ImageFilledRectangle($new, 13, $height-20, 15, $height-7, $black);
		ImageTTFText($new, 4.9, 0, 20, $height-14, $black, $this->fontName, $text[0]);
		ImageTTFText($new, 4.9, 0, 20, $height-6, $black, $this->fontName, $text[1]);
		//*/
		if ($this->toFile){
			if (file_exists($this->galleryPath . $newName))
			unlink($this->galleryPath . $newName);
			ImageJPEG($new, $this->galleryPath . $newName);
			return $this->galleryPath . $newName;
		}else{
			ImageJPEG($new);
		}
		ImageDestroy($new);
		ImageDestroy($img);

	}

	/**
	 * 显示指定图片的缩略图
	 * @author		肖飞
	 * @param string $file
	 * @return 0 图片不存在
	 */
	function displayThumb($file){
		$thumbName = substr($file, 0, strrpos($file, ".")) . "_thumb.jpg";
		$file = $this->galleryPath . $thumbName;
		if (!file_exists($file)) return 0;
		$html = "<img src='$file' style='border:1px solid #000'/>";
		echo $html;
	}

	/**
	 * 显示指定图片的水印图
	 * @author		肖飞
	 * @param string $file
	 * @return 0 图片不存在
	 */
	function displayMark($file){
		$markName = substr($file, 0, strrpos($file, ".")) . "_mark.jpg";
		$file = $this->galleryPath . $markName;
		if (!file_exists($file)) return 0;
		$html = "<img src='$file' style='border:1px solid #000'/>";
		echo $html;
	}

	/**
	 * 返回图像信息
	 * @author		肖飞
	 * @param string $file	文件路径
	 * @return 图片信息数组
	 */
	function getInfo($file){
		$data = getimagesize($file);
		$imageInfo["width"] = $data[0];
		$imageInfo["height"]= $data[1];
		$imageInfo["type"] = $data[2];
		$imageInfo["name"] = basename($file);
		return $imageInfo;
	}

	/**
	 * 按照比例生成缩略图(输出到文件)
	 * @author		肖飞
	 * @param string $sourFile	图片源文件
	 * @param int	 $pr		压缩图片比例
	 * @param int	 $width		生成缩略图的宽度
	 * @param int	 $height	生成缩略图的高度
	 * @param int	 $toFile	压缩图是否生成文件
	 * @return 0 失败 成功时返回生成的图片路径
	 */
	function makePRThumb($sourFile,$pr=0,$width=0,$height=0,$toFile=1){
		$imageInfo = $this->getInfo($sourFile);
		//$newName = substr($imageInfo["name"], 0, strrpos($imageInfo["name"], ".")) . "_thumb.jpg";
		switch ($imageInfo["type"]){
			case 1: //gif
			$img = imagecreatefromgif($sourFile);
			break;
			case 2: //jpg
			$img = imagecreatefromjpeg($sourFile);
			break;
			case 3: //png
			$img = imagecreatefrompng($sourFile);
			break;
			default:
				return 0;
				break;
		}
		if (!$img)
		return 0;
		if($width == 0){
			$width = $this->maxWidth;
			$height = $this->maxHeight;
		}
		if($imageInfo["width"] == 0){
			$imageInfo["width"] = imagesx($img);
			$imageInfo["height"] = imagesy($img);
		}
		if($pr!=0){
			$width = $imageInfo["width"]*$pr;
			$height = $imageInfo["height"]*$pr;
		}
		$width = ($width > $imageInfo["width"]) ? $imageInfo["width"] : $width;
		$height = ($height > $imageInfo["height"]) ? $imageInfo["height"] : $height;
		//echo "$width , $height <br>";
		$srcW = $imageInfo["width"];
		$srcH = $imageInfo["height"];
		//echo "$srcW , $srcH <br>";
		if($width != 0 and $height == 0) $height=ceil($width/$srcW*$srcH);
		if($width == 0 and $height != 0) $width=ceil($height/$srcH*$srcW);
		if($width != 0 and $height != 0){
			if($srcW>$srcH) {
				$height=ceil($width/$srcW*$srcH);
			}else{
				$width=ceil($height/$srcH*$srcW);
			}
		}
		//echo "$width , $height <br>";
		if (function_exists("imagecreatetruecolor")) {//GD2.0.1
			$new = imagecreatetruecolor($width, $height);
			ImageCopyResampled($new, $img, 0, 0, 0, 0, $width, $height, $imageInfo["width"], $imageInfo["height"]);
		}else{
			$new = imagecreate($width, $height);
			ImageCopyResized($new, $img, 0, 0, 0, 0, $width, $height, $imageInfo["width"], $imageInfo["height"]);
		}
		if ($toFile){
			if (file_exists($sourFile))	unlink($sourFile);
			ImageJPEG($new, $sourFile);
			return $sourFile;
		}else{
			ImageJPEG($new);
		}
		ImageDestroy($new);
		ImageDestroy($img);
	}
}
/*
----------------------------------
下面是使用方法
这个类生成水印的时候需要使用04B_08__.TTF字体
使用类的时候指定该字体路径即可
-----------------------------------
require_once("GDImage.class.php");

//header("Content-type: image/jpeg");//输出到浏览器的话别忘了打开这个
$img = new GDImage();
$text = array("bizeway.com","all rights reserved");
$img->maxWidth = $img->maxHeight = 300;
$img->toFile = true;
$img->waterMark("mm.jpg", $text);
$img->makeThumb("mm.jpg");
$img->displayThumb("mm.jpg");
$img->displayMark("mm.jpg");
*/
?>