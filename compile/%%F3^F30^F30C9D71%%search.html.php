<?php /* Smarty version 2.6.20, created on 2015-10-26 18:29:07
         compiled from shelter_ad/block/search.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'shelter_ad/block/search.html', 3, false),)), $this); ?>
<DIV id="menu">
	<DIV class="menu_l">
		您的位置：<A href="<?php echo smarty_function_url(array('url' => "/"), $this);?>
">首页</A> &gt; <A href="<?php echo smarty_function_url(array('url' => "/".($this->_tpl_vars['arrGWeb']['module_id'])."/"), $this);?>
"><?php echo $this->_tpl_vars['arrGWeb']['module_name']; ?>
</A><?php if ($this->_tpl_vars['strTypeTitle'] != ''): ?> &gt; <?php echo $this->_tpl_vars['strTypeTitle']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['arrData']['title'] != ''): ?> &gt; <?php echo $this->_tpl_vars['arrData']['title']; ?>
<?php endif; ?>
	</DIV>
	<DIV class="menu_r">
		<FORM id="FormSearch" name="FormSearch" action="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/shelter_ad/search.php" method="get"><INPUT class="butt_a" id="keywords" name="keywords" value="<?php echo $_GET['keywords']; ?>
"> <INPUT class="butt_b" type="submit" value="搜索" name="Submit"> 
	</FORM></DIV>
	<DIV class="fjclear"></DIV>
</DIV><!--box1 end-->