<?php /* Smarty version 2.6.20, created on 2015-06-05 00:22:29
         compiled from C:%5CProgram+Files+%28x86%29%5CZend%5CApache2%5Chtdocs%5Clc_ad%5Ctrade%5Cconfig/../../trade/admin/templats/category.htm */ ?>
<script type="text/javascript" language="javascript">
function menuClick(menuid)
{
	var tr = document.getElementsByTagName("tr");
	for (var i = 0; i < tr.length; i++){
		var rmenu = document.getElementsByTagName("tr")[i];
		if(tr[i].id == menuid) rmenu.style.display = (rmenu.style.display == 'block') ? 'none' : 'block';
		
	}
	return false;
}
</script>
<div class="ccc2">
	<ul>
		<li>
			<span class="right"><input type="button" onClick="location.href='category.php?action=add'" value="新增<?php echo $this->_tpl_vars['arrGWeb']['module_name']; ?>
分类" class="gray mini"></span>
	 </li>
	</ul>
</div>
<div id="biweb">
<table border="0" cellspacing="0" align="center" class="biweb">
<form action='?id=<?php echo $this->_tpl_vars['id']; ?>
&action=' method="post" name="delform">
	<tr class="firstr">
		<th width='6%'>ID</th>
		<th><?php echo $this->_tpl_vars['arrGWeb']['module_name']; ?>
分类名称</th>
		<th width='12%'>用户阅读星级</th>
		<th width='12%'>用户发布星级</th>
		<th width='12%'>分类排序</th>
		<th width='6%'>状态</th>
		<th width='10%'>操作</th>
	</tr>
	<?php $_from = $this->_tpl_vars['arrData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['arrData']):
?>
	<tr align=center <?php if ($this->_tpl_vars['arrData']['type_parentid'] == 0): ?><?php $this->assign('menu', ($this->_tpl_vars['key'])); ?>
onClick="menuClick('<?php echo $this->_tpl_vars['key']; ?>
');" style="font-weight: bold ;background:#dff6ff"<?php else: ?> style="display: block;" id="<?php echo $this->_tpl_vars['menu']; ?>
"<?php endif; ?>>
		<td><?php echo $this->_tpl_vars['arrData']['type_id']; ?>
</td>
		<td align='left'><?php echo $this->_tpl_vars['arrData']['type_title']; ?>
</td>
		<td><?php if ($this->_tpl_vars['arrData']['type_read_grade'] == 0): ?><i>无</i><?php endif; ?><?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['arrData']['type_read_grade']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>★<?php endfor; endif; ?></td>
		<td><?php if ($this->_tpl_vars['arrData']['type_write_grade'] == 0): ?><i>无</i><?php endif; ?><?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['arrData']['type_write_grade']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>★<?php endfor; endif; ?></td>
		<td><?php echo $this->_tpl_vars['arrData']['type_sort']; ?>
</td>
		<td><?php if ($this->_tpl_vars['arrData']['type_pass'] == 1): ?>公布<?php else: ?>隐藏<?php endif; ?></td>
		<td><a href='category.php?action=edit&id=<?php echo $this->_tpl_vars['arrData']['type_id']; ?>
'>编辑</a> | <a href='category.php?action=del&id=<?php echo $this->_tpl_vars['arrData']['type_id']; ?>
' onclick="return confirm('确认删除');">删除</a></td> 		
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	<tr>
		<td colspan='7'>
		<?php echo $this->_tpl_vars['strPage']; ?>

		</td>
	</tr>
</form>
</table>
</div>