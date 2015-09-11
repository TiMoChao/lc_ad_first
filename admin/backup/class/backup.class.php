<?php
/**
 * Mysql备份栏目基本设置文件
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	backup
 */
class backup extends ArthurXF{
	public $db = null;
	public $thisModel = 'backup';
	public $cache = '../../cache/backup_cache.php';

	function creat_cache($sql) {
		if(check::write_file($this->cache,$sql)) return true;
		else return false;
   }

	function db(){
		$this->db = $this->connectG();
	}

	/**
	 * 取得所有 TABLE 语句
	 *
	 * @access  public
	 * @param
	 *
	 * @return void
	 */
	function get_ver($strSQL=null){
		try {
			if($strSQL == null ) $strSQL = 'SELECT VERSION()';
			$rs = $this->db->prepare($strSQL);
			$rs->execute();
			$arrData = $rs->fetchAll(PDO::FETCH_COLUMN);
			return ($arrData[0]);
		}catch (Exception $e) {
			die("Failed: " . $e->__toString());
		}
		return ($arrData[0]['VERSION()']);
	}

	/**
	 * 取得所有 TABLE 语句
	 *
	 * @access  public
	 * @param
	 *
	 * @return void
	 */
	function get_table($strSQL=null){
		try {
			if($strSQL == null ) $strSQL = 'SHOW TABLES';
			$rs = $this->db->query($strSQL);
			//$rs->execute();
			$arrData = $rs->fetchAll(PDO::FETCH_COLUMN);
		}catch (Exception $e) {
			die("Failed: " . $e->__toString());
		}
		return ($arrData);
	}

	/**
	 * 检查 TABLE 语句 （MYSQL5.0.22才支持此命令）
	 *
	 * @access  public
	 * @param
	 *
	 * @return void
	 */
	function check_table($table){
		try {
			//$this->db = null;
			//$this->db();
			$strSQL = 'CHECK TABLE '.$table;
			$rs = $this->db->query($strSQL);
			$arrData = $rs->fetchAll();
		}catch (Exception $e) {
			die("Failed: " . $e->__toString());
		}
		return ($arrData);
	}

	/**
	 * 取得所有 TABLE STATUS 语句
	 *
	 * @access  public
	 * @param
	 *
	 * @return void
	 */
	function get_table_status($strSQL=null){
		try {
			if($strSQL == null ) $strSQL = 'SHOW TABLE STATUS';
			$rs = $this->db->prepare($strSQL);
			$rs->execute();
			$arrData = $rs->fetchAll();
		}catch (Exception $e) {
			die("Failed: " . $e->__toString());
		}
		return ($arrData);
	}

	/**
	 * 生成CREATE TABLE 语句
	 *
	 * @access  public
	 * @param
	 *
	 * @return void
	 */
	function get_table_df($table, $sql,$drop=true){
		$sql_create = "\n-- \n-- Table structure for table `$table` \n-- \n\n";
		$field_query = "SHOW FIELDS FROM $table";
		$key_query = "SHOW KEYS FROM $table";

		if($drop) $sql_create .= "DROP TABLE IF EXISTS $table;\n";

		$sql_create .= "CREATE TABLE `$table` (";

		try {
			$rs = $this->db->prepare($field_query);
			$rs->execute();
			$arrData = $rs->fetchAll();
		}catch (PDOException $e){
			die("Failed: " . $e->__toString());
		}

		foreach($arrData as $k=>$v){
			$sql_create .= ' `' . $v['Field'] . '` ' . $v['Type'];

			if(!empty($v['Default'])){
				$sql_create .= ' DEFAULT \'' . $v['Default'] . '\'';
			}

			if($v['Null'] != "YES"){
				$sql_create .= ' NOT NULL';
			}

			if($v['Extra'] != ""){
				$sql_create .= ' ' . $v['Extra'];
			}

			$sql_create .= " ,";
		}

		//清除最后一个$crlf
		$sql_create = preg_replace('/,$/', "", $sql_create);

		//设置索引
		try {
			$rs = $this->db->prepare($key_query);
			$rs->execute();
			$arrData = $rs->fetchAll();
		}catch (PDOException $e){
			die("Failed: " . $e->__toString());
		}

		$arrIndex = array();
		foreach($arrData as $k=>$v){
			$kname = $v['Key_name'];

			if(($kname != 'PRIMARY') && ($v['Non_unique'] == 0)){
				$kname = "UNIQUE|$kname";
			}

			if(array_key_exists($kname,$arrIndex)&&!is_array($arrIndex[$kname])){
				$arrIndex[$kname] = array();
			}

			$arrIndex[$kname][] = $v['Column_name'];
		}

		while(list($x, $columns) = @each($arrIndex)){
			$sql_create .= ",";

			if($x == 'PRIMARY'){
				$sql_create .= ' PRIMARY KEY (' . implode($columns, ', ') . ')';
			}elseif (substr($x,0,6) == 'UNIQUE'){
				$sql_create .= ' UNIQUE ' . substr($x,7) . ' (' . implode($columns, ', ') . ')';
			}else{
				$sql_create .= " KEY $x (" . implode($columns, ', ') . ')';
			}
		}

		if($this->get_ver() > '4.1') $sql_create .= ") ENGINE=MyISAM DEFAULT CHARSET=utf8;\n";
		else $sql_create .= ") TYPE=MyISAM ;\n";

		if(get_magic_quotes_runtime()){
			$sql = stripslashes($sql_create);
		}else{
			$sql = $sql_create;
		}
		if(check::write_file($this->cache,$sql,'a')) return true;
		else return false;
	}

	/**
	 * 生成INSERT 语句
	 *
	 * @access  public
	 * @param
	 *
	 * @return void
	 */
	function get_table_content($table, $sql,$mark=false){
		$trans = array("'"=>"\'","\n"=>'\n',"\r"=>'\r');

		/* 获取数据表数据 */
		$strContentTotal = "SELECT count(*) as num FROM $table";
		try {
			$rs = $this->db->prepare($strContentTotal);
			$rs->execute();
			$intTotal = current($rs->fetch());
		}catch (PDOException $e){
			die("Failed: " . $e->__toString());
		}
		$sql = "\n-- \n-- Dumping data for table `$table` \n-- \n\n";
		for($a=0;$a<=$intTotal;$a+=100){

			$content_query = "SELECT * FROM $table limit $a,100";
			try {
				$rs = $this->db->prepare($content_query);
				$rs->execute();
				$arrData = $rs->fetchAll();
			}catch (PDOException $e){
				die("Failed: " . $e->__toString());
			}

			/* 创建数据插入语句 */
			$tag = true;
			$is_first = 1;
			foreach($arrData as $k => $v){
				$sql_insert = '';
				if ($tag){
					$keys = array();
					$keys = array_keys($v);
					$field_names = array();
					for($i=0 ; $i<count($keys); $i++){
						$field_names[] = $keys[$i];
					}
					$table_list = array();
					$table_list = implode('`,`',$field_names);
					$table_list = '( `'.$table_list . '`)';

					$tag = false;
				}
				reset($keys);
				$values = array();
				for($i=0 ; $i<count($v); $i++){
					$values[] = str_replace("\\\\'","\\\\''",strtr($v[$keys[$i]],$trans));
					//$values[] = $v[$keys[$i]];
				}


				$field_values = implode('\', \'', $values);
				$field_values = '( \''.$field_values.'\' )';
				$field_values = str_replace("\'","''",$field_values);

				if ($mark){
					if ($is_first == 1){
						$sql_insert = "INSERT INTO `$table` VALUES $field_values ,\n";
						$is_first ++;
					}else{
						$sql_insert = $field_values.",\n";
					}
				}else{
					$sql_insert = "INSERT INTO `$table` $table_list VALUES $field_values ;\n";
				}

				$sql .= $sql_insert ;
				//echo $sql;exit;

			}
			if ($mark){
				$sql[strlen($sql)-2] = ';';
			}
			if(check::write_file($this->cache,$sql,'a')) $sql = '';
		}
		return  true;
	}

	/**
	 * 导入SQL文件
	 *
	 * @access  public
	 * @param
	 *
	 * @return void
	 */
	function import($sql_file){
		$db_ver = $this->get_ver();

		$sql_str	= array_filter(file($sql_file), "remove_comment");
		$sql_str    = str_replace("\r", '', implode('', $sql_str));

		if($db_ver > '4.1'){
			$sql_str = str_replace("TYPE=MyISAM","ENGINE=MyISAM DEFAULT CHARSET=utf8",$sql_str);
		}
		$ret        = explode(";\n", $sql_str);

		/* 执行sql语句 */
		for ($i=0; $i<count($ret); $i++){
			$ret[$i] = str_replace('\n',"\n",trim($ret[$i]));
			if(!empty($ret[$i])){
				$this->db->exec($ret[$i]);
			}
		}

		return true;
	}


	/**
	 * 将字节转成可阅读格式
	 *
	 * @access  public
	 * @param
	 *
	 * @return void
	 */
	function num_bitunit($num){
	  $bitunit=array(' B',' KB',' MB',' GB');
	  for($key=0;$key<count($bitunit);$key++){
		if($num>=pow(2,10*$key)-1){ //1023B 会显示为 1KB
		  $num_bitunit_str=(ceil($num/pow(2,10*$key)*100)/100)." $bitunit[$key]";
		}
	  }
	  return $num_bitunit_str;
	}
}

/**
 * 移除注释(回调函数)
 *
 * @access  public
 * @param
 * @return  void
 */
function remove_comment($var){
	return (substr($var, 0, 2) != '--');
}
?>