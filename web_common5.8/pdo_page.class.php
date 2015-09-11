<?php
/**
 * 使用PDO的分页类文件
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		pdo_page
 */

class pdo_page{
	/*pdo数据源*/
	public $db_driver = '';			//db驱动
	public $db_host = '';				//dbms地址
	public $db_name='';				//db名称
	public $dsn = '';					//数据库源，"mysql:host=localhost;dbname=community"
	public $db_user = '';				//dbms帐户
	public $db_password='';			//dbms密码
	public $db_char='';				//db字符集
	public $db_table='';				//表名
	public $db_table_field='';			//字段数组，将要显示的字段名称写入该数组
	public $db='';   					//数据库连接句柄
	public $lang='zh';   					//数据库连接句柄
	/*分页显示参数设置*/
	public $page_size=0;  		//每页显示的记录数目
	public $link_num=5;   		//显示页码链接的数目
	public $page=1;  			//页码
	public $records=0; 		//表中记录总数
	public $page_count=0;  	//总页数
	public $pagestring='';    	//前后分页链接字符串
	public $page_link='';     	//页码链接字符串
	public $page_select='';   	//表单跳转页字符串
	public $page_jump='';    	 //text筐输入页码跳转
	public $file_suffix='.html';		//静态链接后缀名
	public $first='首页';		//翻页文字
	public $prev='上一页';		//翻页文字
	public $next='下一页';		//翻页文字
	public $last='尾页';			//翻页文字
	public $go='转';			//翻页文字

	/**
	 * 语言处理
	 * @author	肖飞
	 * @return	void
	 */
	function set_lang() {
		switch($this->lang){
			case 'en':
				$this->first = 'First';
				$this->prev = 'Previous';
				$this->next = 'Next';
				$this->last = 'Last';
				$this->go = 'Go';
			break;
		}
	}

	/**
	 * 数据库连接函数
	 * @author	肖飞
	 * @return	object
	 */
	function db_conn(){
		try{
			$this->db=new pdo(
			"$this->db_driver:dbname=$this->db_name;host=$this->db_host;charset=$this->db_char",
			"$this->db_user",
			"$this->db_password"
			);
			return $this->db;
		}
		catch(pdoexception $e)
		{
			die($e->getmessage());
		}
	}

	/**
	 * 页码处理
	 * @author		肖飞
	 * @return void
	 */
	function set_page(){
		if(isset($_REQUEST['page'])&&$_REQUEST['page']!=null){
			$this->page=intval($_REQUEST['page']);
		}
		else{
			$this->page=1;
		}
		$this->page_count= ceil($this->records/$this->page_size);
	}

	/**
	 * 获取db中记录的数目
	 * @author		肖飞
	 * @param string $where		数据库查询条件
	 * @return int
	 */
	function get_records($where){
		$sql="select count(1) as num from $this->db_table $where";
		//echo $sql;
		$stmt=$this->db->prepare($sql);
		$stmt->execute();

		if($arrDate = $stmt->fetch()){
			$this->records = $arrDate['num'];
		}

	}

	/**
	 * 翻页链接样式1（首页 上页 下页 尾页）
	 * @author		肖飞
	 * @param string $link	翻页链接参数
	 * @return int
	 */
	function page_link1($link=null){
		if($link!=null&&$link[0]!='&') $link='&'.$link;
		//前后页链接字符串
		if($this->page==1){
			$this->pagestring.="[$this->first] | [$this->prev]";         //如果是首页，无链接
		}else{
			$this->pagestring.="[<a href=?page=1$link>首页</a>] | [<a href=?page=".($this->page-1)."$link>$this->prev</a>]"; //不为首页，有链接
		}
		$this->pagestring.=" | ";
		if($this->page==$this->page_count||$this->page_count==0){
			$this->pagestring.="[$this->next] | [$this->last]";           //如果是最后一页，无链接
		}else{
			$this->pagestring.="[<a href=?page=".($this->page+1)."$link>$this->next</a>] | [<a href=?page=".$this->page_count."$link>$this->last</a>]"; //不是最后一页，有链接
		}
	}

	/**
	 * 静态优化翻页链接样式11（首页 上页 下页 尾页）
	 * @author		肖飞
	 * @param string $link	翻页链接参数
	 * @return int
	 */
	function page_link11($link=null){
		if($link!=null&&$link[0]!='-') $link='-'.$link;
		//前后页链接字符串
		if($this->page==1){
			$this->pagestring.="[$this->first] | [$this->prev]";         //如果是首页，无链接
		}else{
			$this->pagestring.="[<a href=$_SERVER[SCRIPT_NAME]/page-1$link$this->file_suffix>$this->first</a>] | [<a href=$_SERVER[SCRIPT_NAME]/page-".($this->page-1)."$link$this->file_suffix>$this->prev</a>]"; //不为首页，有链接
		}
		$this->pagestring.=" | ";
		if($this->page==$this->page_count||$this->page_count==0){
			$this->pagestring.="[$this->next] | [$this->last]";           //如果是最后一页，无链接
		}else{
			$this->pagestring.="[<a href=$_SERVER[SCRIPT_NAME]/page-".($this->page+1)."$link$this->file_suffix>$this->next</a>] | [<a href=$_SERVER[SCRIPT_NAME]/page-".$this->page_count."$link$this->file_suffix>$this->last</a>]"; //不是最后一页，有链接
		}
	}

	/**
	 * 翻页链接样式2（1 2 3 4 5）
	 * @author		肖飞
	 * @param string $link	翻页链接参数
	 * @param string $ldelim	翻页链接左修饰符
	 * @param string $rdelim	翻页链接右修饰符
	 * @return int
	 */
	function page_link2($link=null,$ldelim='',$rdelim=''){
		if($link!=null&&$link[0]!='&') $link="&".$link;

		//页码链接字符串
		if($this->page > $this->link_num) $start = $this->page-$this->link_num;
		else $start = 1;

		for($i=$start;$i<=$this->page+$this->link_num-1;$i++){
			if($i<=$this->page_count){
				if($i == $this->page) $this->page_link.='<span class="current">'.$ldelim.$i.$rdelim.'</span> ';
				else $this->page_link.='<a href=?page='.$i.$link.'>'.$ldelim.$i.$rdelim.'</a> ';
				$last_page=$i;
			}
		}
		if($i-$this->link_num-1<1){
			$front_page=1;
		}else{
			$front_page=$this->page-1;
		}
		if(!empty($last_page) && $this->page==$this->page_count){
			$back_page=$last_page;
		}else{
			$back_page=$this->page+1;
		}
		if($this->page != 1) $this->page_link='<a href=?page=1'.$link.'>&lt;&lt;</a>'.' '.'<a href=?page='.$front_page.$link.'>&lt;</a>'.' '.$this->page_link;
		if($this->page!=$this->page_count && $this->page_count!=0) $this->page_link=$this->page_link.' '.'<a href=?page='.$back_page.$link.'>&gt;</a>'.' '.'<a href=?page='.$this->page_count.$link.'>&gt;&gt;</a>';

	}

	/**
	 * 翻页链接样式2（1 2 3 4 5）
	 * @author		肖飞
	 * @param string $link		翻页链接参数
	 * @param string $ldelim	翻页链接左修饰符
	 * @param string $rdelim	翻页链接右修饰符
	 * @return int
	 */
	function page_link22($link=null,$ldelim='',$rdelim=''){
		if($link!=null&&$link[0]!='-') $link="-".$link;

		//页码链接字符串
		if($this->page > $this->link_num) $start = $this->page-$this->link_num;
		else $start = 1;

		for($i=$start;$i<=$this->page+$this->link_num-1;$i++){
			if($i<=$this->page_count){
				if($i == $this->page) $this->page_link.='<span class="current">'.$ldelim.$i.$rdelim.'</span> ';
				else $this->page_link.="<a href=$_SERVER[SCRIPT_NAME]/page-".$i.$link.$this->file_suffix.'>'.$ldelim.$i.$rdelim.'</a> ';
				$last_page=$i;
			}
		}
		if($i-$this->link_num-1<1){
			$front_page=1;
		}else{
			$front_page=$this->page-1;
		}
		if(!empty($last_page) && $this->page==$this->page_count){
			$back_page=$last_page;
		}else{
			$back_page=$this->page+1;
		}
		if($this->page != 1) $this->page_link="<a href=$_SERVER[SCRIPT_NAME]/page-1".$link.$this->file_suffix.'>&lt;&lt;</a>'.' '."<a href=$_SERVER[SCRIPT_NAME]/page-".$front_page.$link.$this->file_suffix.'>&lt;</a>'.' '.$this->page_link.' ';
		if($this->page!=$this->page_count && $this->page_count!=0) $this->page_link=$this->page_link.' '."<a href=$_SERVER[SCRIPT_NAME]/page-".$back_page.$link.$this->file_suffix.'>&gt;</a>'.' '."<a href=$_SERVER[SCRIPT_NAME]/page-".$this->page_count.$link.$this->file_suffix.'>&gt;&gt;</a>';

	}

	/**
	 * 翻页链接样式3（select选择提交跳转）
	 * @author		肖飞
	 * @param string $link	翻页链接参数
	 * @return int
	 */
	function page_link3($link=null){
		//select页码
		$this->page_select="<form action='' method=post><select name=page>";
		for($i=1;$i<=$this->page_count;$i++){
			if($i==$this->page){
				$this->page_select.="<option selected>$i</option>";
			}
			else{
				$this->page_select.="<option>$i</option>";
			}
		}
		$this->page_select.="</select><input type=submit value=$this->go></form>";
	}

	/**
	 * 翻页链接样式4（input输入from提交跳转）
	 * @author		肖飞
	 * @param string $link	翻页链接参数
	 * @return int
	 */
	function page_link4($link=null){
		//input跳转表单
		$this->page_jump="<form action='' method=post><input type=text size=1 name=page value=$this->page><input type=submit value=$this->go>";
	}

	/**
	 * 翻页链接样式5（input输入javascript提交跳转）
	 * @author		肖飞
	 * @param string $link	翻页链接参数
	 * @return int
	 */
	function page_link5($link=null){
		if($link!=null&&$link[0]!='&') $link="&".$link;
		$this->page_jump="<input type='text' name='page' id='biwebpage' size=3 value='$this->page'> <input type='button' class='btn' name='b' value='$this->go'onclick=\"location.href='?page='+document.getElementById('biwebpage').value+'$link'\">";
	}

	/**
	 * 静态优化翻页链接样式55（input输入javascript提交跳转）
	 * @author		肖飞
	 * @param string $link	翻页链接参数
	 * @return int
	 */
	function page_link55($link=null){
		if($link!=null&&$link[0]!='-') $link="-".$link;
		$this->page_jump="<input type='text' name='page' id='biwebpage' size=3 value='$this->page'> <input type='button' class='btn' name='b' value='$this->go'onclick=\" location.href='$_SERVER[SCRIPT_NAME]/page-'+document.getElementById('biwebpage').value+'$link.html'\">";
	}

	/**
	 * 获取数据 begin,输出数据列表
	 * @author		肖飞
	 * @return void
	 */
	function fetch_data(){
		if($this->records){
			$sql="select * from $this->db_table limit ".($this->page-1)*$this->page_size.",$this->page_size";
			$stmt=$this->db->prepare($sql);
			$stmt->execute();
			echo "<center><table border=1 width=60%><tr>";
			/*取字段名称 begin*/
			$field_count=count($this->db_table_field);
			for($i=0;$i<$field_count;$i++){
				$field_name=$this->db_table_field[$i];
				echo "<td><center><b>$field_name</b></center></td>";
			}
			echo "</tr>";
			/*取字段名称 end*/
			/*获取数据begin*/
			while($f=$stmt->fetch()){
				echo "<tr>";
				for($i=0;$i<$field_count;$i++){
					$field_name=$this->db_table_field[$i];
					$field_value=$f["$field_name"];
					echo "<td><center>$field_value</center></td>";
				}
				echo "</tr>";
			}
			/*获取数据end*/
			echo "</table></center>";
		}
	}

	/**
	 * 建立分页
	 * @author		肖飞
	 * @return void
	 */
	function create_page(){
		$this->set_lang();
		$this->set_page();

	}

	/**
	 * 建立独立执行分页
	 * @author		肖飞
	 * @param string $where	数据库查询条件
	 * @return void
	 */
	function create_page1($where){
		$this->db_conn();
		$this->db->exec("set names utf8");
		$this->set_lang();
		$this->set_page();
		$this->get_records($where);
		$this->page_count= ceil($this->records/$this->page_size);
//		$this->page_link1();
//		$this->page_link2();
//		$this->page_link3();
//		$this->page_link5();
//		$this->fetch_data();
	}
}
/*
$page=new pdo_page;
//db参数设置begin
$page->db_driver='mysql';                          //db驱动
$page->db_host='localhost';                        //dbms地址
$page->db_user='root';                             //dbms帐户
$page->db_password='goldfish';                     //dbms密码
$page->db_name='goldfish';                         //db名称
$page->db_table='goldfish';                        //表名
$page->db_table_field=array('id','name','age');    //字段数组，将要显示的字段名称写入该数组
//分页参数设置
$page->page_size=5;                                //每页显示记录的数目
$page->link_num=6;                                 //显示翻页链接的数目
$page->create_page();                              //生成分页
//翻页链接显示输出
echo '<center>共有'.$page->records.'条记录';       //表中记录的总数
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '第'.$page->page.'页/';
echo '共'.$page->page_count.'页</center>';         //总页数
echo '<center>'.$page->pagestring.'</center>';     //'首页'、'上一页'、'下一页'、'尾页'－－链接样式
echo '<center>'.$page->page_link.'</center>';      //[1]、[2]、[3]－－链接样式
echo '<center>'.$page->page_select.'</center>';    //表单翻页样式
echo '<center>'.$page->page_jump.'</center>';
*/
?>