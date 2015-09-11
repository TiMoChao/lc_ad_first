<?php
function insert_getSession(){
	global $arrGWeb;
	if(!empty($_SESSION['user_name'])){	
		$strHtml = '<div class="islogin">亲爱的会员<font color="red">' . $_SESSION['user_name'] . '</font> 您好!&nbsp;&nbsp;&nbsp;&nbsp;<br/><br/><br/><a href="' . $arrGWeb['WEB_ROOT_pre'] .'/useradmin" target="_self"><font color=#FF6600>[&nbsp;会员中心&nbsp;]</font></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="' . $arrGWeb['WEB_ROOT_pre'] . '/user/logout.php" target="_self"><font color=#FF6600>[&nbsp;安全退出&nbsp;]</font></a></div>';
	}else{
		$strHtml = '<span id="_loginform">		
		<form method="post" name="form1" action="'.$arrGWeb['WEB_ROOT_pre'].'/user/login.php">			
		<table align="center">
		<tr>
			<td>用户名</td><td><input type="text" value="请输入用户名" class="input3" name="User" onfocus="if(this.value==this.defaultValue){this.value=\'\';}" /></td>
			<td><a target="_blank" href="'.$arrGWeb['WEB_ROOT_pre'].'/user/regin.php">免费注册</a></td>			
		</tr>
		<tr>
			<td>密  码</td><td><input type="password" name="Pass" class="input3"/></td>
			<td><a target="_blank" href="'.$arrGWeb['WEB_ROOT_pre'].'/user/forgotten.php">&nbsp;忘记密码?</a></td>
		</tr>
		<!--tr>
			<td>验证码</td><td><input type="text" size="5" name="authCode" class="input3"  value="请输入验证码" onfocus="if(this.value==this.defaultValue){this.value=\'\';}" /></td>
			<td><img src="'.$arrGWeb['WEB_ROOT_pre'].'/plug-in/verifyCode/authimg.php" align=\'top\' alt="看不清？点击更换" name="imgVerify" id="imgVerify" onClick="this.src=this.src+\'?\'"></td>			
		</tr>
		<tr>
			<td>验证码</td>
			<td><input type="text" size="5" name="authCode" class="input3"  value="请点击输入验证码" onfocus="if(this.value==this.defaultValue){this.value=\'\';}var validate_obj = document.getElementById(\'divcode1\');validate_obj.innerHTML =\'<img src='.$arrGWeb['WEB_ROOT_pre'].'/plug-in/verifyCode/authimg.php  name=imgVerify id=imgVerify  />\';" />
			</td>
			<td><span id="divcode1"><font style=\'font-size:12px\'>验证码</font></span></td>
		</tr-->
		<tr>
			<td>验证码</td>
			<td><input type="text" size="5" name="authCode" class="input3"  value="请点击输入验证码" onfocus="if(this.value==this.defaultValue){this.value=\'\';}var validate_obj = document.getElementById(\'divcode1\');validate_obj.innerHTML =\'<img src='.$arrGWeb['WEB_ROOT_pre'].'/plug-in/verifyCode/authimg.php  name=imgVerify id=imgVerify  />\';" />
			</td>
			<td><span id="divcode1"><font style=\'font-size:12px\'>验证码</font></span></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;<input name="button"  type="submit" class="input4" value="登 录" /></td>			
		</tr>
	</table>	
		</form>
		<div class="clearboth"></div>
		</span>';
		
	}
	return $strHtml;
}
function insert_getSession_top(){
	global $arrGWeb; 
	if(!empty($_SESSION['user_name'])){
		$strHtml ='<a href="' . $arrGWeb['WEB_ROOT_pre'] .'/useradmin" target="_self"><font color=#FF6600><font color="red">' . $_SESSION['user_name'] . '</font> 您好!</font></a><img src="'.$arrGWeb['WEB_ROOT_pre'].'/templates/1/ad_lc/images/hot.gif"/>|<a href="' . $arrGWeb['WEB_ROOT_pre'] . '/user/logout.php" target="_self">退出</a>|';		
	}
	else{
		$strHtml ='<a href="' . $arrGWeb['WEB_ROOT_pre'] .'/useradmin" target="_self"><font color=#FF6600><font color="red">会员后台</font></a><img src="'.$arrGWeb['WEB_ROOT_pre'].'/templates/1/ad_lc/images/hot.gif"/>|<a href="' . $arrGWeb['WEB_ROOT_pre'] . '/user/logout.php" target="_self">退出登录</a>|';		
	}
	return $strHtml;
}
?>