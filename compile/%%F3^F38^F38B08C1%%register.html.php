<?php /* Smarty version 2.6.20, created on 2015-06-05 01:02:08
         compiled from C:%5CProgram+Files+%28x86%29%5CZend%5CApache2%5Chtdocs%5Clc_ad%5Cuser%5Cconfig/../../templates/1/user/register.html */ ?>
<script Language="JavaScript">dateformat='yyyy-mm-dd'</script>
<script language="javascript" src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/plug-in/area/myjsframe.js"></script>
<script language="javascript" src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/plug-in/area/area.js"></script>

<!-- 高级注册信息javascript 开始  -->
<script type="text/javascript">
	function showadv() {
		if(document.register.advshow.checked == true) {
			$("registeradv").style.display = "block";
		} else {
			$("registeradv").style.display = "none";
		}
	}
</script>
<!-- 高级注册信息javascript 结束  -->
<div class="area">
<!-- 注册 开始 -->
	<div class="column">
		<div class="tit"><h2>注册</h2></div>
		<div class="register-box">
			<form method="post" name="register" action="#">
			<div class="column-title">基本信息（*号是必填项）</div>
			<ul class="register-list">
				<li><span>用户名：</span><INPUT type="text" size="20" value="" name="user_name"><font color="red">*&nbsp;</font> 4-20位，请使用英文、数字，注意不要使用符号</li>
				<li><span>密码：</span><INPUT type="password" size="20" value="" name="password"><font color="red">*&nbsp;</font> 4-20位，请使用英文、数字，注意不要使用符号</li>
				<li><span>确认密码：</span><INPUT type="password" size="20" value="" name="password_c"><font color="red">*&nbsp;</font>请输入和上次一样的密码</li>
				<li><span>邮箱：</span><INPUT type="text" size="20" value="" name="email"> 取回遗忘密码的重要渠道</li>
				<li><span>提示问题：</span><INPUT type="text" size="20" value="" name="question"> 请填写问题及答案，在您丢失密码时可凭此取回密码。可选填</li>
				<li><span>问题答案：</span><INPUT type="text" size="20" value="" name="answer"></li>
				<li><span>验证码：</span>
					<input name="authCode" type="text" id="vdcode2" size="10">
					<img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/plug-in/verifyCode/authimg.php" align='top' alt="看不清？点击更换" name="imgVerify" id="imgVerify" onClick="this.src=this.src+'?'">
				<font color="red">*&nbsp;</font></li>
				<li><span>高级选项：</span>
					<input id="advshow" name="advshow" type="checkbox"  value="1" onclick="showadv()" tabindex="12" /><label for="advshow">显示高级用户设置选项</label>
				</li>
			</ul>
			<div id="registeradv" style="display: none;">
				<div class="column-title">扩展信息（选填）</div>
				<ul class="register-list">
					<li><span>企业名称：</span><INPUT type="text" size="30" value="" name="company"></li>
					<li><span>联系人姓名：</span><INPUT type="text" size="30" value="" name="real_name"></li>
					<li><span>电话：</span><INPUT type="text" size="30" value="" name="tel"></li>
					<li><span>手机：</span><INPUT type="text" size="30" value="" name="mobile"></li>
					<li><span>邮编：</span><INPUT type="text" size="30" value="" name="postcode"></li>
					<li><span>地址：</span><INPUT type="text" size="50" value="" name="address"></li>
					<li><span>企业网站：</span><INPUT type="text" size="50" value="" name="homepage"></li>
					<li><span>企业简介：</span><textarea name="intro" cols="50" rows="4"></textarea></li>
				</ul>
			</div>
			<div class="register-button"><input type="image" name="..." src="<?php echo $this->_tpl_vars['arrGWeb']['templats_root']; ?>
/images/register-button.gif" width="100" height="24" value="提交" /></div>
			</form>
		</div>
	</div>
<!-- 注册 结束 -->
</div>
<div class="block10"></div>