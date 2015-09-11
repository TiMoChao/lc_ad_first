<?php
/**
 * 使用DOM的xml功能类文件
 * @author		肖飞
 * @copyright	(c) 2006 by 上海网务网络信息有限公司
 * @version		$Id$
 * @package		xml
 */
class xml {
	var $objXML = null;
	var $objXpath = null;

	/**
	 * xml构造函数，初始化DOM实例
	 * @author	肖飞 <ArthurXF@gmail.com>
	 * @return  void
	 */
	function xml(){
		$this->objXML = new DOMDocument('1.0', 'UTF-8');
		$this->objXML->formatOutput = true;
		$this->objXML->preserveWhiteSpace = false;
	}

	/**
	 * 建立元素
	 * @author	肖飞 <ArthurXF@gmail.com>
	 * @param	string	$string			标签名称
	 * @param	string	$parent    		父元素
	 * @return  string
	 */
	function cElement($string,$parent=null){
		$node = $this->objXML->createElement( $string );
		if($parent!=null) $parent->appendChild( $node );
		else $this->objXML->appendChild( $node );
		return $node;
	}

	/**
	 * 建立子节点元素
	 * @author	肖飞 <ArthurXF@gmail.com>
	 * @param	string	$string			标签名称
	 * @param	string	$parent    		父元素
	 * @param	array	$arrData   		子元素数组
	 * @return  string
	 */
	function cElementChild($string=null,$parent,$arrData){
		foreach($arrData as $key=>$val){
			if($string!=null) $pnode = $this->cElement($string);
			foreach ($arrData[$key] as $key1=>$val1){
				$node = $this->objXML->createElement( $key1 );
				$node->appendChild($this->objXML->createTextNode($val1));
				if($string!=null) $pnode->appendChild( $node );
				else $parent->appendChild( $node );
			}
			if($string!=null) $parent->appendChild( $pnode );
		}
	}

	/**
	 * 获取节点名称
	 * @author	肖飞 <ArthurXF@gmail.com>
	 * @param	string	$string			XML
	 * @return  array
	 */
	function gNodeName($string){
		$ns = $this->objXpath->query($string);
		for($i=0;$i<$ns->length;$i++){
		   $arrData[$ns->item($i)->nodeName] =  $ns->item($i)->nodeValue;
		}
		return $arrData;
	}

	/**
	 * 获取元素内容
	 * @author	肖飞 <ArthurXF@gmail.com>
	 * @param	string	$string			XML
	 * @return  array
	 */
	function gElement($string){
		$node = $this->objXML->getElementsByTagName( $string );
		$arrData = $node->item(0)->nodeValue;
		return $arrData;
	}

	/**
	 * 获取子元素内容
	 * @author	肖飞 <ArthurXF@gmail.com>
	 * @param	string	$string			XML
	 * @return  array
	 */
	function gElementChild($string,$arrData=array()){
		$arrNode = array();
		$nodes = $this->objXML->getElementsByTagName( $string );
		foreach($nodes as $key=>$val){
			foreach ($arrData as $node){
				$r = $val->getElementsByTagName( $node );
				$arrNode[$key][$r->item(0)->nodeName] = $r->item(0)->nodeValue;
			}
		}
		return $arrNode;
	}

	/**
	 * XML直接输出
	 * @author	肖飞 <ArthurXF@gmail.com>
	 * @return  string
	 */
	function saveXML(){
		if(session_is_registered('Lang')&&$_SESSION['Lang']=='zh-tw'){
			$objLang = new Chinese();
			return $objLang->GBtoBIG5onUTF8($this->objXML->saveXML());
		}else{
			return $this->objXML->saveXML();
		}
	}

	/**
	 * XML输出到文件
	 * @author	肖飞 <ArthurXF@gmail.com>
	 * @param	string	$string			XML
	 * @return  string
	 */
	function save($string){
		return $this->objXML->save($string);
	}

	/**
	 * 从文件获取XML
	 * @author	肖飞 <ArthurXF@gmail.com>
	 * @param	string	$string			文件地址
	 * @return  string
	 */
	function load($string){
		return $this->objXML->load($string);
	}

	/**
	 * 获取XML
	 * @author	肖飞 <ArthurXF@gmail.com>
	 * @param	string	$string			XML
	 * @return  string
	 */
	function loadXML($string){
		return $this->objXML->loadXML($string);
	}
}
?>