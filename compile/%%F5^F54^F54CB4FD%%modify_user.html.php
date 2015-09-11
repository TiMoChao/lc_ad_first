<?php /* Smarty version 2.6.20, created on 2015-06-05 12:05:23
         compiled from C:%5CProgram+Files+%28x86%29%5CZend%5CApache2%5Chtdocs%5Clc_ad%5Cuser%5Cconfig/../../templates/1/user/adminu/modify_user.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\lc_ad\\user\\config/../../templates/1/user/adminu/modify_user.html', 38, false),array('modifier', 'htmlspecialchars', 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\lc_ad\\user\\config/../../templates/1/user/adminu/modify_user.html', 57, false),array('modifier', 'stripslashes', 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\lc_ad\\user\\config/../../templates/1/user/adminu/modify_user.html', 57, false),)), $this); ?>
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
			<script Language="JavaScript">dateformat='yyyy-mm-dd'</script>
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
					<td width="10%">用户名称：</td>	
					<td width="40%"><?php echo $this->_tpl_vars['arrData']['user_name']; ?>
</td>		
					<td class="gray">用户的注册名称，不可更改</td>
				</tr>
				<tr>
					<td width="10%">真实姓名：</td>	
					<td width="40%">
						<input type="text" name="real_name" size=30 value="<?php echo $this->_tpl_vars['arrData']['real_name']; ?>
" />
					</td>		
					<td class="gray">用户的真实姓名</td>
				</tr>
				<tr>
					<td width="10%">所在区域：</td>	
					<td width="40%"><script type="text/javascript">	
						var area = new AreaCtrl("省份:","城市:","地区:");
						area.value = <?php if ($this->_tpl_vars['arrData']['area'] != ""): ?><?php echo $this->_tpl_vars['arrData']['area']; ?>
<?php else: ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['arrData']['city'])) ? $this->_run_mod_handler('default', true, $_tmp, '310100') : smarty_modifier_default($_tmp, '310100')); ?>
<?php endif; ?>;
						area.name = ["province","city","area"];
						area.write();
					</script></td>	
					<td class="gray">用户注册公司所在区域</td>
				</tr>
				<tr>
					<td width="10%">公司中文</td>	
					<td width="40%"><input type="text" size=50 name="company_cn" value="<?php echo $this->_tpl_vars['arrData']['company_cn']; ?>
" /></td>
					<td class="gray">用户注册公司的中文名称</td>
				</tr>
				<tr>
					<td width="10%">公司英文</td>	
					<td width="40%"><input type="text" size=50 name="company_en" value="<?php echo $this->_tpl_vars['arrData']['company_en']; ?>
" /></td>
					<td class="gray">用户注册公司的英文名称</td>
				</tr>
				<tr id=ArticleContent>
					<td>公司简介：</td>
					<td>
						<textarea name=intro cols=45 rows=8><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrData']['intro'])) ? $this->_run_mod_handler('htmlspecialchars', true, $_tmp) : htmlspecialchars($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
					</td>
					<td class="gray">公司介绍</td>
				</tr>
				<tr>
				<tr>
					<td width="10%">联&nbsp;&nbsp;系&nbsp;&nbsp;人：</td>	
					<td width="40%">
						<input type="text" size=30 name="contactor" value="<?php echo $this->_tpl_vars['arrData']['contactor']; ?>
" />
					</td>
					<td class="gray">用户注册公司的联系人</td>
				</tr>
				<tr>
					<td width="10%">联系电话：</td>	
					<td width="40%"><input type="text" size=30 name="tel" value="<?php echo $this->_tpl_vars['arrData']['tel']; ?>
" /></td>
					<td class="gray">用户注册公司的联系电话</td>
				</tr>
				<tr>
					<td width="10%">电子邮件：</td>	
					<td width="40%"><input type="text" size=30 name="email" value="<?php echo $this->_tpl_vars['arrData']['email']; ?>
" /></td>		
					<td class="gray">用户注册公司的联系电子邮件</td>
				</tr>
				<tr>
					<td width="10%">邮政编码：</td>	
					<td width="40%"><input type="text" size=30 name="postcode" value="<?php echo $this->_tpl_vars['arrData']['postcode']; ?>
" /></td>		
					<td class="gray">用户注册公司的邮政编码</td>
				</tr>
				<tr>
					<td width="10%">公司传真：</td>	
					<td width="40%"><input type="text" size=30 name="fax" value="<?php echo $this->_tpl_vars['arrData']['fax']; ?>
" /></td>
					<td class="gray">用户注册公司的公司传真</td>
				</tr>
				<tr>
					<td width="10%">联系&nbsp;&nbsp;QQ：</td>	
					<td width="40%"><input type="text" size=30 name="QQ" value="<?php echo $this->_tpl_vars['arrData']['QQ']; ?>
" /></td>
					<td class="gray">公司联系人的QQ</td>
				</tr>
				<tr>
					<td width="10%">公司地址：</td>
					<td width="40%"><input type="text" size=30 name="address" value="<?php echo $this->_tpl_vars['arrData']['address']; ?>
" /></td>
					<td class="gray">用户注册公司的具体地址</td>
				</tr>
				<tr>
					<td width="10%">公司网址：</td>
					<td width="40%"><input type="text" size=30 name="homepage" value="<?php echo $this->_tpl_vars['arrData']['homepage']; ?>
" /></td>
					<td class="gray">用户注册公司的网址</td>
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