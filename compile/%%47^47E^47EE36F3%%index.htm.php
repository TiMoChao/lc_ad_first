<?php /* Smarty version 2.6.20, created on 2015-06-05 01:07:21
         compiled from C:%5CProgram+Files+%28x86%29%5CZend%5CApache2%5Chtdocs%5Clc_ad%5Ctender_ad%5Cconfig/../../templates/1/tender_ad/adminu/index.htm */ ?>
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
			<table class="showes-list">
			<form name='delform' action="?action=" method="post">
				<tr class="showes-listes">
					<th width="10%">ID</th>
					<th><?php echo $this->_tpl_vars['arrGWeb']['module_name']; ?>
名称</th>
					<th width="10%">点击数</th>
					<th width="5%">审核</th>
					<th width="18%">发布时间</th>
					<th width="5%"><input type='checkbox' name='chkSelectAll' onclick="doCheckAll(this)" /></th>
				</tr>
				<?php $_from = $this->_tpl_vars['arrData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['arrData']):
?>
				<tr align="center">
					<td><a href='modifyinfo.php?type_id=<?php echo $this->_tpl_vars['arrData']['type_id']; ?>
&id=<?php echo $this->_tpl_vars['arrData']['id']; ?>
&page=<?php echo $this->_tpl_vars['get']['page']; ?>
'><?php echo $this->_tpl_vars['arrData']['id']; ?>
</a></td>
					<td align="left"><b>[<?php echo $this->_tpl_vars['arrData']['type_title']; ?>
]</b><a href='modifyinfo.php?type_id=<?php echo $this->_tpl_vars['arrData']['type_id']; ?>
&id=<?php echo $this->_tpl_vars['arrData']['id']; ?>
&page=<?php echo $this->_tpl_vars['get']['page']; ?>
'><?php echo $this->_tpl_vars['arrData']['title']; ?>
</a></td>
					<td><?php echo $this->_tpl_vars['arrData']['clicktimes']; ?>
</td>
					<td><?php if ($this->_tpl_vars['arrData']['pass'] == 1): ?>√<?php endif; ?>
					<?php if ($this->_tpl_vars['arrData']['pass'] != 1): ?><font color=red>&nbsp;×&nbsp;</font><?php endif; ?></td>
					<td><?php echo $this->_tpl_vars['arrData']['submit_date']; ?>
</td>
					<td><input type=checkbox name=select[] value="<?php echo $this->_tpl_vars['arrData']['id']; ?>
"></td>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
			</form>
			</table>
		</div>
		</div>
		<div class="clearboth">
			<ul class="sea-pageses">
			<div class="sea-pager"><form name='actionform' method=post>
			操作：<select size=1 name=selection>
			<option value='moveup'>提前</option>
			<option value='del'>删除</option>
			</select> 
			<input type='button' class='btn' value='执行' onclick="checkAction(document.actionform.selection.options[document.actionform.selection.selectedIndex].value)">
			</form></div>
			<?php echo $this->_tpl_vars['strPage']; ?>

			<div class="clr"></div>
			</ul>
		</div>	
	</div>
	<!-- 介绍 结束 -->
</div>
<div class="block10"></div>