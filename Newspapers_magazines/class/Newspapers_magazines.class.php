<?php
/**
 * 报纸杂志功能类文件
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	Newspapers_magazines
 */

class Newspapers_magazines extends ArthurXF{
	public $thisModel = 'Newspapers_magazines';



	//xml方法
	/**
	 * 生成XML信息类型列表
	 * @author	肖飞
	 * @param	string $strXML    请求xml字符串
	 * @return  void
	 */
	function makeInfoTypeListXML($strXML){
		$objXML = new xml();
		$objXML->loadXML( $strXML );
		$string = "//Values/*";
		$objXML->objXpath = new DOMXPath($objXML->objXML);
		$arrData = $objXML->gNodeName($string);
		$objXML = new xml();
		if($arr = $this->getTypeList($arrData['Newspapers_magazines_type_parentid'])){
			$root = $objXML->cElement("PHPToFlash");
			$arrReturn = array(array("Result"=>"1"));
			$objXML->cElementChild("Return",$root,$arrReturn);
			foreach ($arr as $key=>$val){
				$arrReturn = array($val);
				$objXML->cElementChild("TypeList",$root,$arrReturn);
			}
			echo $objXML->saveXML();
		}else{
			$root = $objXML->cElement("ExceptionDataSet");
			$arrReturn = array(array("PKID"=>"20","Info"=>"系统无法找到信息列表","Remark"=>"在请求信息列表时找不到列表"));
			$objXML->cElementChild("Exception",$root,$arrReturn);
			echo $objXML->saveXML();
		}
	}
}
?>