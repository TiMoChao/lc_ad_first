<?php /* Smarty version 2.6.20, created on 2015-06-14 07:37:49
         compiled from C:%5CProgram+Files+%28x86%29%5CZend%5CApache2%5Chtdocs%5Clc_ad%5Cadmin%5Cconfig/../../admin/templats/seo/meta_set.htm */ ?>
<form name="form1" id="form1" onsubmit="return checkForm()" action="" method="post" enctype="multipart/form-data">
<div class="ccc2">
	<ul>
		<li>网页标题：有效长度在20个字符内，可以将要优化的关键字放在这里，一定要和网页内容相关；<br>
	网页关键字：关键字不要过多，避免形成关键字堆砌，被搜索引擎惩罚，关键字对于搜索引擎索引网站有帮助，多个关键词可以用逗号、空格进行分隔，请务必录入与您网站相关的关键词；<br>
	网页描述：用短语描述网页的内容，有助于提高网站的排名，字数不要超过200个字符，一定要和网页内容相关。<br>
	<font color="#ff6600">此栏目内容修改之后，所有静态页面均已自动更新，无需手动更新了，敬请注意！</font>
		</li>
	</ul>
</div>
<div id="biweb">
<table border="0" cellspacing="0" cellpadding="0" class="biweb">
    <tr class="firstr">
    <td colspan="3">网页SEO优化</td>
    </tr>
<?php $_from = $this->_tpl_vars['arrGMeta']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['channel'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['channel']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['arrData']):
        $this->_foreach['channel']['iteration']++;
?>
    <tr>
      <td colspan="2"><?php echo $this->_tpl_vars['arrData']['name']; ?>
：</td>
      <td><input name="<?php echo $this->_tpl_vars['key']; ?>
_Title" type="text" value="<?php echo $this->_tpl_vars['arrData']['meta']['Title']; ?>
" size="55" /> </td>
    </tr>
	<tr>
		<td colspan="2">网页描述</td>
      <td><textarea name="<?php echo $this->_tpl_vars['key']; ?>
_Description" cols="55" rows="3"><?php echo $this->_tpl_vars['arrData']['meta']['Description']; ?>
</textarea></td>
    </tr>
	<tr>
	<td colspan="2">网页关键字</td>
      <td><textarea name="<?php echo $this->_tpl_vars['key']; ?>
_Keywords" cols="55" rows="3"><?php echo $this->_tpl_vars['arrData']['meta']['Keywords']; ?>
</textarea></td>
    </tr>
	<tr>
	<td colspan="3"><br/></td>
	</tr>
<?php endforeach; endif; unset($_from); ?>
	<tr>
		<td align="middle" colSpan="3"><input type="submit" id="okgo" name="okgo" value="确　定"> <input type="reset" value="重 置"></td>
	</tr>
</table>
</div>
</form>