<?php /* Smarty version 2.6.20, created on 2015-06-04 15:05:24
         compiled from admin.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'admin.html', 11, false),)), $this); ?>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<title>广告业务信息网系统管理首页  - powered by LUOCHAO</title>
<link href='<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
<?php echo @__WEBADMIN_ROOT; ?>
/css/biweb.css' rel='stylesheet' type='text/css'>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
<?php echo @__WEBADMIN_ROOT; ?>
/js/biweb.js'></script>
</head>
<body ondblclick="Submit_onDoubleclick()">
<div class='bodytitle' style="height:33px;">
    <div class='bodytitleleft'></div>
    <div class='bodytitletxt'><?php echo ((is_array($_tmp=@$this->_tpl_vars['strNav'])) ? $this->_run_mod_handler('default', true, $_tmp, ($this->_tpl_vars['arrGWeb']['module_name'])."管理") : smarty_modifier_default($_tmp, ($this->_tpl_vars['arrGWeb']['module_name'])."管理")); ?>
</div>
    <div class='bodytitleright'></div>
    <div class='iicon'>
        <a href='javascript:window.location.reload();' class='img1'>　　 刷新</a>
        <a href='javascript:history.back();' class='img2'>　　 后退</a>
        <a href='javascript:history.go(1);' class='img3'>　　 前进</a>
    </div>
	<div class="clr"></div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['MAIN'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="copyright">Copyright © 2015-2015 广告信息网, All Rights Reserved .</div>
</body>
</html>