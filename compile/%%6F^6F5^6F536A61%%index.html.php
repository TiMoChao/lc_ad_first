<?php /* Smarty version 2.6.20, created on 2015-06-05 01:06:04
         compiled from C:%5CProgram+Files+%28x86%29%5CZend%5CApache2%5Chtdocs%5Clc_ad%5Cuseradmin%5Cconfig/../../templates/1/useradmin/index.html */ ?>
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
			<div class="tit"><h2>我的状态</h2></div>
			<div class="help-text-box">
				<ul>
					<li>尊敬的<strong><?php echo $_SESSION['user_name']; ?>
</strong>您好:</li>
					<li>欢迎您光临会员中心！</li>
					<li>请在左侧导航栏里选择你要进行的操作！</li>
					<li><a class="font-red" href="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/user/logout.php">退出登陆</li></li>
				</ul>
				
 			</div>
		</div>
		</div>
	</div>
	<!-- 介绍 结束 -->
</div>