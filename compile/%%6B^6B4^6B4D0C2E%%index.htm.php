<?php /* Smarty version 2.6.20, created on 2015-06-04 15:32:15
         compiled from C:%5CProgram+Files+%28x86%29%5CZend%5CApache2%5Chtdocs%5Clc_ad%5CPersonality_customization%5Cconfig/../../Personality_customization/admin/templats/index.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'bedeck', 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\lc_ad\\Personality_customization\\config/../../Personality_customization/admin/templats/index.htm', 48, false),)), $this); ?>
<div class="ccc2">
	<ul>
		<li>
		<form action="?" method="get">
			<span class="right"><input type="button" onClick="location.href='addinfo.php?page=<?php echo $_GET['page']; ?>
'" value="新增<?php echo $this->_tpl_vars['arrGWeb']['module_name']; ?>
" class="gray mini"></span>
			<input type=hidden name="action" value='search'>
			标题：<input type=text size=15 name='title' value='<?php echo $_GET['title']; ?>
'> 
		<?php echo $this->_tpl_vars['arrGWeb']['module_name']; ?>
类别：
		<select size=1 name='type_id'>
		<option value="0">所有类别</option>
		<?php $_from = $this->_tpl_vars['arrType']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['type']):
?>
		<?php if (is_array ( $this->_tpl_vars['type'] ) && array_key_exists ( 'type_title' , $this->_tpl_vars['type'] )): ?>
		<option value="<?php echo $this->_tpl_vars['type']['type_id']; ?>
" <?php if (! empty ( $this->_tpl_vars['type']['type_link'] )): ?>disabled='disabled'<?php endif; ?> <?php if ($this->_tpl_vars['type']['type_id'] == $_GET['type_id']): ?>selected=selected<?php endif; ?>><?php echo $this->_tpl_vars['type']['type_title']; ?>
</option>
		<?php else: ?>
		<option value="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['key'] == $this->_tpl_vars['arrData']['type_id']): ?>selected=selected<?php endif; ?>><?php echo $this->_tpl_vars['type']; ?>
</option>    	
		<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
    	</select>
		是否审核：<select name='pass' size=1>
		<option value=''>全部</option>
		<option value="1" <?php if ($_GET['pass'] == '1'): ?>selected=selected<?php endif; ?>>已审核</option>
		<option value="0" <?php if ($_GET['pass'] == '0'): ?>selected=selected<?php endif; ?>>未审核</option>
		</select> 
		<input type=submit value='查 询' class='gray mini'>
		 /id号可精确查询
	 </form>
	 </li>
	</ul>
</div>
<div id="biweb">
<table border="0" cellspacing="0" align="center" class="biweb">
<form action='?type_id=<?php echo $this->_tpl_vars['arrData']['type_id']; ?>
&page=<?php echo $_GET['page']; ?>
&title=<?php echo $_GET['title']; ?>
&action=' method="post" name="delform">
	<tr class="firstr">
		<th width='6%'>ID</th>
		<th><?php echo $this->_tpl_vars['arrGWeb']['module_name']; ?>
名称</th>
		<th width='20%'>类别</th>
		<th width='8%'>图片</th>
		<th width='6%'>点击</th>
		<th width='8%'>属性</th>
		<th width='6%'>审核</th>
		<th width='16%'>发布时间</th>
		<th width='4%' align=center><input type='checkbox' name='chkselectAll' onclick="doCheckAll(this)"></th>
	</tr>
	<?php $_from = $this->_tpl_vars['arrData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['arrData']):
?>
	<tr align=center>
		<td>&nbsp;<a href='modifyinfo.php?type_id=<?php echo $this->_tpl_vars['arrData']['type_id']; ?>
&id=<?php echo $this->_tpl_vars['arrData']['id']; ?>
&page=<?php echo $_GET['page']; ?>
'><?php echo $this->_tpl_vars['arrData']['id']; ?>
</a></td>
		<td align="left">&nbsp;
		<a href='modifyinfo.php?type_id=<?php echo $this->_tpl_vars['arrData']['type_id']; ?>
&id=<?php echo $this->_tpl_vars['arrData']['id']; ?>
&page=<?php echo $_GET['page']; ?>
'><?php echo ((is_array($_tmp=$this->_tpl_vars['arrData']['title'])) ? $this->_run_mod_handler('bedeck', true, $_tmp, $this->_tpl_vars['arrData']['bedeck']) : smarty_modifier_bedeck($_tmp, $this->_tpl_vars['arrData']['bedeck'])); ?>
</a>
		</td>
		<td>&nbsp;
		<?php echo $this->_tpl_vars['arrData']['type_title']; ?>

		</td>
		<td>&nbsp;
			<?php if ($this->_tpl_vars['arrData']['thumbnail'] != ''): ?><a href="<?php echo $this->_tpl_vars['FileCallPath']; ?>
b/<?php echo $this->_tpl_vars['arrData']['thumbnail']; ?>
" target="_blank"><font color=red>有图</font></a><?php endif; ?>
			<?php if ($this->_tpl_vars['arrData']['thumbnail'] == ''): ?>无图<?php endif; ?>
		</td>
		<td>&nbsp;<?php echo $this->_tpl_vars['arrData']['clicktimes']; ?>
</td>
		<td>&nbsp;
			<?php if ($this->_tpl_vars['arrData']['topflag'] == 1): ?><font color=red>&nbsp;固&nbsp;</font><?php endif; ?>
			<?php if ($this->_tpl_vars['arrData']['recommendflag'] == 1): ?><font color=red>&nbsp;荐&nbsp;</font><?php endif; ?>
		</td>
		<td>&nbsp;
			<?php if ($this->_tpl_vars['arrData']['pass'] == 1): ?>√<?php endif; ?>
			<?php if ($this->_tpl_vars['arrData']['pass'] != 1): ?><font color=red>&nbsp;×&nbsp;</font><?php endif; ?>
			</td>
		<td align=center>&nbsp;<?php echo $this->_tpl_vars['arrData']['submit_date']; ?>
</td>
		<td align=center>&nbsp;<input type=checkbox name=select[] value="<?php echo $this->_tpl_vars['arrData']['id']; ?>
"></td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	</tr>
	<tr>
		<td colspan='9'>
		<span  class="actionform">
		<form name='actionform' method="post">
		操作：<select name="selection">
		<option value='moveup'>提前</option>
		<option value='del'>删除</option>
		<option value='delpic'>删除图片</option>
		<option value='check'>通过审核</option>
		<option value='uncheck'>取消通过</option>
		<option value='settop'>固顶</option>
		<option value='unsettop'>解固</option>
		<option value='setrecommend'>设为推荐</option>
		<option value='unsetrecommend'>解除推荐</option>
		</select> 
		<input type="button" class="gray mini" value='执行' onclick=javascript:index=document.getElementsByName('selection')[0].selectedIndex;checkAction(document.getElementsByName('selection')[0].options[index].value);>
		</form>
		</span>
		<?php echo $this->_tpl_vars['strPage']; ?>

		</td>
	</tr>
</form>
</table>
</div>