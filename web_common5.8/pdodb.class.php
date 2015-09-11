<?php
/**
 * 网站数据库类文件
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		PdoDB
 */
class PdoDB extends PDO {

	/**
	 * PdoDB构造函数
	 * @author	肖飞 <ArthurXF@gmail.com>
	 * @param	string $dsn    数据源
	 * @param	string $usr    用户名
	 * @param	string $pwd    密码
	 * @param	array $array   参数数组
	 * @return  object
	 */
	function PdoDB($dsn,$usr=null,$pwd=null,$array=null){
		parent::__construct($dsn,$usr,$pwd,$array);
		$this->setAttribute(PDO::ATTR_STATEMENT_CLASS, array('PdoDBStatement'));
		$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

}

/**
 * PdoDBStatement类文件
 * @author		肖飞
 * @copyright	(c) 2006 by Arthur
 * @version		$Id$
 * @package		PdoDB
 */
class PdoDBStatement extends PDOStatement{

	/**
	 * PdoDBStatement构造函数
	 * @author	肖飞 <ArthurXF@gmail.com>
	 * @return  object
	 */
	private function __construct(){
		$this->setFetchMode(PDO::FETCH_ASSOC);
	}

}
?>