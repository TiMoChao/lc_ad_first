<?php /* Smarty version 2.6.20, created on 2015-06-14 07:34:49
         compiled from C:%5CProgram+Files+%28x86%29%5CZend%5CApache2%5Chtdocs%5Clc_ad%5Cadmin%5Cconfig/../../admin/templats/siteset/siteset.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\lc_ad\\admin\\config/../../admin/templats/siteset/siteset.htm', 57, false),)), $this); ?>
<form name="form1" id="form1" onsubmit="return checkForm()" action="" method="post" enctype="multipart/form-data">
<div id="biweb">
<table border="0" cellspacing="0" cellpadding="0" class="biweb">
    <tr class="firstr">
    <td colspan="2">网站信息设置</td>
    </tr>
    <tr>
      <td width="15%">网站名称：</td>
      <td><input name="name" value="<?php echo $this->_tpl_vars['arrGWeb']['name']; ?>
" maxlength="100" size="55"> 名称最大50个中文</td>
    </tr>
    <tr>
      <td>网站域名：</td>
      <td><input name="host" value="<?php echo $this->_tpl_vars['arrGWeb']['host']; ?>
" maxlength="100" size="55"> 不用写http://</td>
    </tr>
		<tr>
      <td>公司名称：</td>
      <td><input name="company" value="<?php echo $this->_tpl_vars['arrGWeb']['company']; ?>
" maxlength="100" size="55"> 仅填名称</td>
    </tr>
		<tr>
      <td>公司电话：</td>
      <td><input name="tel" value="<?php echo $this->_tpl_vars['arrGWeb']['tel']; ?>
" maxlength="100" size="55"> 可填写多个</td>
    </tr>
		<tr>
      <td>公司传真：</td>
      <td><input name="fax" value="<?php echo $this->_tpl_vars['arrGWeb']['fax']; ?>
" maxlength="100" size="55"> 可填写多个</td>
    </tr>
		<tr>
      <td>QQ号码1：</td>
      <td><input name="QQ" value="<?php echo $this->_tpl_vars['arrGWeb']['QQ']; ?>
" maxlength="100" size="55"> 可填写多个</td>
    </tr>
		<tr>
      <td>公司邮箱：</td>
      <td><input name="MSN" value="<?php echo $this->_tpl_vars['arrGWeb']['MSN']; ?>
" maxlength="100" size="55"> 可填写多个</td>
    </tr>
		<tr>
      <td>淘宝旺旺：</td>
      <td><input name="wangwang" value="<?php echo $this->_tpl_vars['arrGWeb']['wangwang']; ?>
" maxlength="100" size="55"> 可填写多个</td>
    </tr>
	<tr>
      <td>版权所有：</td>
      <td><input name="worktime" value="<?php echo $this->_tpl_vars['arrGWeb']['worktime']; ?>
" maxlength="100" size="55"> 可填写多个</td>
    </tr>
		<tr>
      <td>公司地址：</td>
      <td><input name="address" value="<?php echo $this->_tpl_vars['arrGWeb']['address']; ?>
" maxlength="100" size="55"> 用于网页底部显示</td>
    </tr>
		<tr>
      <td>技术支持单位：</td>
      <td><input name="postcode" value="<?php echo $this->_tpl_vars['arrGWeb']['postcode']; ?>
" maxlength="100" size="55"> 用于网页底部显示</td>
    </tr>
		<tr>
      <td>ICP证书号：</td>
      <td><input name="cert" value="<?php echo $this->_tpl_vars['arrGWeb']['cert']; ?>
" maxlength="100" size="55"> ICP证书号或ICP备案证书号</td>
    </tr>
		<tr>
      <td>侧栏联系方式：</td>
      <td><textarea name="contact" rows="6" cols="50"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrGWeb']['contact'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea> 各栏目页面侧边调用</td>
    </tr>
		<tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="提 交" class="mini" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" onclick="history.back()" value="返 回" class="mini" /></td>
    </tr>
</table>
</div>
</form>