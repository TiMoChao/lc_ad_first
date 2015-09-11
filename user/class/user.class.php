<?php
/**
 * 会员功能类文件
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	user
 */
class user extends ArthurXF{
	public $tablename2 = 'user';
	public $thisModel = 'user';

	/**
	 * 取得会员列表
	 * @author	肖飞
	 * @param	string $strNewsTypeTitle    新闻类型标题
	 * @return  void
	 */
	public function getUserList($offset = 0, $limit = 0,$strWhere=''){
		$arrData = $this->getInfoList($strWhere,' ORDER by pass,user_id desc',$offset,$limit);
		return $arrData;
	}

	/**
	 * 取得会员详细信息
	 * @author	肖飞
	 * @param	int $intUserID    会员id
	 * @return  array
	 */
	public function getUser($intUserID){
		$strSQL = "SELECT * FROM $this->tablename2 WHERE user_id =".$intUserID;
		//$rs = $this->db->prepare($strSQL);
		//$rs->execute(array($intUserID));
		$rs = $this->db->query($strSQL);
		$arrData = $rs->fetchall();
		$arrData = $this->loadTableFieldG($arrData);

		return $arrData;
	}

	/**
	 * 取得会员详细信息(用where条件)
	 * @author	肖飞
	 * @param	string $strWhere    where条件
	 * @return  array
	 */
	public function getUserWhere($strWhere=null,$arrData){
		$strSQL = "SELECT * FROM $this->tablename2 $strWhere";
		$rs = $this->db->prepare($strSQL);
		$rs->execute($arrData);
		return $rs->fetchAll();
	}

	/**
	 * 检查会员详细资料列表是否有数据
	 * @author	liida
	 * @param	string		$where				会员信息类型id
	 * @param	int			$intStartID			会员信息数据起始ID
	 * @param	int			$intListNum			列表行数
	 * @param	string		$order				排序条件
	 * @return  array
	 */
	function checkUserinfo($where){
		$strSQL = "Select * from $this->tablename2 ".$where;
		$rs = $this->db->prepare($strSQL);
		$rs->execute();
		$arrData = $rs->fetchAll();
		return $arrData;
	}

	/**
	 * 插入会员详细信息
	 * @author	肖飞
	 * @param	array $arrUser    会员信息数组
	 * @return  void
	 */
	public function insertUser($arrUser){
		$strSQL = "INSERT INTO $this->tablename2 (";
		$strSQL .= '`';
		$strSQL .= implode('`,`', array_keys($arrUser));
		$strSQL .= '`)';
		$strSQL .= " VALUES ('";
		$strSQL .= implode("','",$arrUser);
		$strSQL .= "')";
		if ($this->db->exec($strSQL)) {
			return $this->db->lastInsertId();
		} else {
			return false ;
		}
	}

	/**
	 * 修改会员详细信息
	 * @author	肖飞
	 * @param	array $arrUser    会员信息数组
	 * @return  void
	 */
	public function updateUser($arrUser){
		$strSQL = "UPDATE $this->tablename2 SET ";
		foreach ($arrUser as $k => $v) {
			if ($k == '`user_id`') continue ;
			$strSQL .= $k."='" . $v . "',";
		}
		$strSQL = substr($strSQL, 0, -1);
		$strSQL .= " WHERE `user_id` = '$arrUser[user_id]'";
		//echo $strSQL;exit;
		return $this->db->exec($strSQL);
	}

	/**
	 * 删除会员详细信息
	 * @author	肖飞
	 * @param	int $intUserID    会员id
	 * @return  void
	 */
	public function deleteUser($intUserID){
		$strSQL = "DELETE FROM $this->tablename2 WHERE `user_id` = $intUserID";
		return $this->db->exec($strSQL);
	}

	/**
	 * 会员登陆
	 * @author	肖飞
	 * @param	array $arrUser    会员信息数组
	 * @return  void
	 */
	public function userLogin($arrData,$isEncryption=0,$jamStr){
		if(!check::CheckUser($arrData['User'])) {
			check::AlertExit("输入的用户名必须是4-20字符之间的数字、字母或中文!",-1);
			return false;
		}
		if(!check::CheckPassword($arrData['Pass'])) {
			check::AlertExit("输入的密码必须是4-20字符之间的数字、字母!",-1);
			return false;
		}
		$strPassTemp = $arrData['Pass'];
		if($isEncryption){
			$strPassTemp=check::strEncryption($strPassTemp,$jamStr);
		}
		$strSQL = "SELECT * FROM $this->tablename2 WHERE user_name = ? and password = ?";
		$rs = $this->db->prepare($strSQL);
		$rs->execute(array($arrData['User'],$strPassTemp));
		if($arr = $rs->fetchAll()){
			$arr = current($this->loadTableFieldG($arr));
			$user_id = '';
			$user_name = '';
			$password='';
			$real_name='';
			$user_group = '';
			$user_popedom = '';
			$submit_date='';
			$pass='';
			$email='';
			$tel='';
			$company_cn='';
			$user_type='';
			$user_bonus='';
			$_SESSION['user_id'] = $arr['user_id'];
			$_SESSION['user_name'] = $arr['user_name'];
			$_SESSION['password'] = $arr['password'];
			$_SESSION['user_group'] = $arr['user_group'];
			$_SESSION['user_grade'] = $arr['user_grade'];
			$_SESSION['user_popedom'] = $arr['user_popedom'];
			$_SESSION['real_name'] = $arr['real_name'];
			$_SESSION['email'] = $arr['email'];
			$_SESSION['tel'] = $arr['tel'];
			$_SESSION['company_cn'] = $arr['company_cn'];
			$_SESSION['user_type'] = $arr['user_type'];
			$_SESSION['user_bonus'] = $arr['user_bonus'];
			$_SESSION['pass'] = $arr['pass'];
			$_SESSION['province'] = $arr['province'];
			$_SESSION['city'] = $arr['city'];
			$_SESSION['type_id'] = $arr['type_id'];

			$arrUpdate['user_ip'] = check::getIP();
			$arrUpdate['lastlog '] = date('Y-m-d H:i:s');
			$arrUpdate['user_id'] = $arr['user_id'];
			$this->updateUser($arrUpdate);
			return true;
		}else{
			return false;
		}
	}

	/**
	 * 记录会员上次登陆时间
	 * @author	肖飞 ,肖飞
	 * @param	array $arrData    会员信息数组
	 * @return  void
	 */
	function saveTime($intInfoID){
		$time = date("Y-m-d   H:i:s");
		$strSQL = "	UPDATE userinfo SET last_time = '$time' where user_id = '$intInfoID'";
		return $this->db->exec($strSQL);
	}

	/**
	 * 保存会员信息
	 * @author	肖飞
	 * @param	int $arrData    新闻信息数组
	 * @return  void
	 */
	function saveInfo($arrData,$intModify=0){
		$arr = array();
		unset($arrData['password_c']);
		unset($arrData['Submit']);
		unset($arrData['agree']);
		$arr = check::SqlInjection($this->saveTableFieldG($arrData));
		if($intModify == 0){
			return $this->insertUser($arr);
		}else{
			if($this->updateUser($arr)){
				check::Alert("修改成功！");
			}else{
				check::Alert("修改失败");
			}
		}

	}


}
?>