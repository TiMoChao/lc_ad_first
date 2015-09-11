<?php /* Smarty version 2.6.20, created on 2015-06-05 12:05:39
         compiled from C:%5CProgram+Files+%28x86%29%5CZend%5CApache2%5Chtdocs%5Clc_ad%5Cuser%5Cconfig/../../templates/1/user/adminu/modify_userpwd.html */ ?>
<div class="area">
	<!-- 块 开始 -->
	<div class="mainright">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "useradmin/_cloumnright.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
	<!-- 介绍 开始 -->
	<div class="mainleft">
		<div class="help-right">
		<div id="companies-list-box">
			<div class="tit"><h2><?php echo $this->_tpl_vars['arrGWeb']['module_name']; ?>
</h2></div>
			<script language="javascript" src="../../plug-in/area/myjsframe.js"></script>
			<script language="javascript" src="../../plug-in/area/area.js"></script>
			<script language="javascript" src="../../plug-in/ImgPreview/imgP.js"></script>			
			<form name="form1" id="form1" onsubmit="return checkForm()" action="" method="post" enctype="multipart/form-data">
			<table class="showes-list">
				<tr class="showes-listes">
					<th width="15%">设置名称</th>
					<th width="55%">基本参数设置</th>
					<th width="30%">设置说明</th>
				</tr>
				<tr>
					<td width="10%">原密码：</td>	
					<td width="40%"><input type="password" name="old_password" size=30 /></td>		
					<td class="gray">请填写你原来的密码</td>
				</tr>
				<tr>
					<td width="10%">新密码：</td>	
					<td width="40%">
					<input type="password" name="password"  size=30 />				
						</td>
					<td class="gray">请填写你的新密码</td>
				</tr>	
				<tr>
					<td width="10%">确认密码：</td>	
					<td width="40%">
						<input type="password" name="confirm_password" size=30 />
					</td>		
					<td class="gray">确保两次密码保持一致</td>
				</tr>				
				<tr>
					<td colspan="3" align="center"><input type="submit" id="okgo" name="okgo" value="确　定"> <input type=reset value="重 置"></td>
				</tr>
				<input type="hidden" name="user_id" value="<?php echo $this->_tpl_vars['arrData']['user_id']; ?>
" />
    			<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['arrData']['id']; ?>
">				
				</table>
			</form>
		</div>
	</div>
	</div>
	<!-- 介绍 结束 -->
</div>
<div class="block10"></div>