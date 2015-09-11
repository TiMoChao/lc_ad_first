<?php /* Smarty version 2.6.20, created on 2015-06-14 07:37:37
         compiled from C:%5CProgram+Files+%28x86%29%5CZend%5CApache2%5Chtdocs%5Clc_ad%5Cadmin%5Cconfig/../../admin/templats/siteset/skin_set.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\lc_ad\\admin\\config/../../admin/templats/siteset/skin_set.htm', 11, false),)), $this); ?>
<div class="ccc2">
	<ul>
		<li><img src="../images/warn.gif" align="absmiddle"> 模板更新后，静态页面及缓存均已自动更新，客户端缓存过了缓存时间也会自动更新！无需手动更新！
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
      <td width="15%">模板名称：</td>
      <td>
			<select name="templates_id" onchange="showSkinImg(this.options[this.selectedIndex].value)">
				<?php $_from = $this->_tpl_vars['arrSkin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['arrData']):
?>
				<option value='<?php echo $this->_tpl_vars['arrData']; ?>
' <?php if ($this->_tpl_vars['arrData'] == $this->_tpl_vars['arrGWeb']['templates_id']): ?>selected=selected<?php endif; ?>><?php echo $this->_tpl_vars['arrData']; ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
			</select>
			</td>
    </tr>
    <tr>
      <td>模板预览：</td>
      <td><img src="<?php echo $this->_tpl_vars['arrGWeb']['templats_root']; ?>
/skin/skin.png" name="img" alt="模板<?php echo $this->_tpl_vars['arrGWeb']['templates_id']; ?>
" onload="resizepic(this,600)" /></td>
    </tr>
		<tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="提 交" class="mini" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" onclick="history.back()" value="返 回" class="mini" /></td>
    </tr>
</table>
</div>
</form>
