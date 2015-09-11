<?php /* Smarty version 2.6.20, created on 2015-06-14 07:36:21
         compiled from C:%5CProgram+Files+%28x86%29%5CZend%5CApache2%5Chtdocs%5Clc_ad%5Cadmin%5Cconfig/../../admin/templats/siteset/cache_set.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\lc_ad\\admin\\config/../../admin/templats/siteset/cache_set.htm', 11, false),)), $this); ?>
<div class="ccc2">
	<ul>
		<li><img src="../images/warn.gif" align="absmiddle"> 缓存的使用将大大提高用户访问速度,降低服务器压力，BIWEB的缓存系统已经做到了全面自动更新，建议缓存时间可以设定较长时间！<br />静态页面不受缓存时间控制，如需更新，请使用“更新静态页面”功能!
		</li>
	</ul>
</div>
<form name="form1" id="form1" onsubmit="return checkForm()" action="" method="post" enctype="multipart/form-data">
<div id="biweb">
<table border="0" cellspacing="0" cellpadding="0" class="biweb">
    <tr class="firstr">
    <td colspan="2"><?php echo ((is_array($_tmp=@$this->_tpl_vars['strNav'])) ? $this->_run_mod_handler('default', true, $_tmp, ($this->_tpl_vars['arrGWeb']['module_name'])."管理") : smarty_modifier_default($_tmp, ($this->_tpl_vars['arrGWeb']['module_name'])."管理")); ?>
</td>
    </tr>
    <tr>
      <td width="15%">Smarty缓存：</td>
      <td>
			<select name="smarty_caching">	
				<option value="1" <?php if ($this->_tpl_vars['arrGWeb']['smarty_caching'] == 1): ?>selected=selected class="selected"<?php endif; ?>>开启</option>
				<option value="0" <?php if ($this->_tpl_vars['arrGWeb']['smarty_caching'] == 0): ?>selected=selected class="selected"<?php endif; ?>>关闭</option>
			</select>
			</td>
    </tr>
    <tr>
      <td>Smarty缓存时间：</td>
      <td><input value="<?php echo $this->_tpl_vars['arrGWeb']['smarty_cache_lifetime']; ?>
" name="smarty_cache_lifetime"> 秒 （设定时间内将缓存页面直接返回给访客）</td>
    </tr>
		<tr>
      <td>客户端缓存时间：</td>
      <td><input value="<?php echo $this->_tpl_vars['arrGWeb']['SquidTime']; ?>
" name="SquidTime"> 秒 （设定时间内将缓存页面直接返回给访客）</td>
    </tr>
		<tr>
      <td>数据库缓存：</td>
      <td>
			<select name="PDO_CACHE">
				<option value="2" <?php if ($this->_tpl_vars['arrGWeb']['PDO_CACHE'] == 2): ?>selected=selected class="selected"<?php endif; ?>>更新</option>
				<option value="1" <?php if ($this->_tpl_vars['arrGWeb']['PDO_CACHE'] == 1): ?>selected=selected class="selected"<?php endif; ?>>开启</option>
				<option value="0" <?php if ($this->_tpl_vars['arrGWeb']['PDO_CACHE'] == 0): ?>selected=selected class="selected"<?php endif; ?>>关闭</option>
			</select>
			</td>
    </tr>
		<tr>
      <td>数据库缓存时间：</td>
      <td><input value="<?php echo $this->_tpl_vars['arrGWeb']['PDO_CACHE_LIFETIME']; ?>
" name="PDO_CACHE_LIFETIME"> 秒 （设定时间内将缓存数据直接返回给访客）</td>
    </tr>
		<tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="提 交" class="mini" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" onclick="history.back()" value="返 回" class="mini" /></td>
    </tr>
</table>
</div>
</form>