<?php /* Smarty version 2.6.20, created on 2015-06-04 15:07:15
         compiled from left_frame.htm */ ?>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<script type="text/javascript" src="js/ShowLeft.js"></script>
</head>
<body>
<div id="my_menu" class="biweb">
<span class="top">
<a href="../" target="_blank">网站首页</a> <a href="main_frame.php" target="main">后台首页</a>
</span>
<dl id="webmanage">
<?php if ($this->_tpl_vars['arrPop']['webmanage'] == 1): ?>
<?php $_from = $this->_tpl_vars['arrLeft']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
	<?php if ($this->_tpl_vars['arrPop'][$this->_tpl_vars['key']] == 1): ?>
	<div>
	<span><?php echo $this->_tpl_vars['key']; ?>
</span>
	<?php $_from = $this->_tpl_vars['arrLeft'][$this->_tpl_vars['key']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arrData']):
?>
	<a href="<?php echo $this->_tpl_vars['arrData']['href']; ?>
" target="main"><?php echo $this->_tpl_vars['arrData']['name']; ?>
</a>
	<?php endforeach; endif; unset($_from); ?>	
	</div>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
</dl>
<dl id="siteset" style="display:none" >
<?php if ($this->_tpl_vars['arrPop']['siteset'] == 1): ?>
	<div>
	<span>系统设置</span>
	<a href="siteset/siteset.php" target="main" >信息设置</a>
	<a href="siteset/phpinfo.php" target="main" >系统环境</a>
	<a href="siteset/skin_set.php" target="main" >模板设定</a>
	<a href="siteset/template_index.php" target="main" >模板编辑</a>
	<a href="siteset/module_set.php" target="main" >栏目装卸</a>
	<a href="siteset/cache_set.php" target="main" >缓存设置</a>
  </div>
<?php endif; ?>
</dl>
<dl id="fetch" style="display:none" >
<?php if ($this->_tpl_vars['arrPop']['fetch'] == 1): ?>
	<div>
	<span>数据采集</span>
	<?php $_from = $this->_tpl_vars['arrFetch']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
		<?php $_from = $this->_tpl_vars['arrFetch'][$this->_tpl_vars['key']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arrData']):
?>
	<a href="<?php echo $this->_tpl_vars['arrData']['href']; ?>
" target="main" ><?php echo $this->_tpl_vars['arrData']['name']; ?>
</a>
		<?php endforeach; endif; unset($_from); ?>
	<?php endforeach; endif; unset($_from); ?>
  </div>
<?php endif; ?>
</dl>
<dl id="archives" style="display:none" >
<?php if ($this->_tpl_vars['arrPop']['archives'] == 1): ?>
	<div>
	<span>介绍单页</span>
	<?php $_from = $this->_tpl_vars['arrMArchivesType']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
	<a href="../archives/admin/index.php?id=<?php echo $this->_tpl_vars['key']; ?>
" target="main" ><?php echo $this->_tpl_vars['item']; ?>
</a>
	<?php endforeach; endif; unset($_from); ?>
  </div>
<?php endif; ?>
</dl>
<dl id="seo" style="display:none" >
<?php if ($this->_tpl_vars['arrPop']['seo'] == 1): ?>
	<div>
	<span>网站优化</span>
	<a href="seo/meta_set.php" target="main" >网页SEO优化</a>
	<a href="seo/link_set.php" target="main" >链接优化</a>
	<a href="seo/web_update.php" target="main" >更新静态页面</a>
	<a href="seo/google_sitemap.php" target="main" >Google Sitemaps</a>
  </div>
<?php endif; ?>
</dl>
<dl id="backup" style="display:none" >
<?php if ($this->_tpl_vars['arrPop']['backup'] == 1): ?>
	<div>
	<span>数据管理</span>
	<a href="backup/sql_backup.php" target="main" >数据备份</a>
	<a href="backup/sql_restore.php" target="main" >数据还原</a>
	<a href="backup/sql_optimize.php" target="main" >数据优化</a>
  </div>
<?php endif; ?>
</dl>
<dl id="tools" style="display:none" >
<?php if ($this->_tpl_vars['arrPop']['tools'] == 1): ?>
	<div>
	<span>网站工具</span>
	<a href="tools/keywordsad/" target="main" >关键字广告</a>
	<a href="tools/illegal/" target="main" >非法信息过滤</a>
  </div>
<?php endif; ?>
</dl>
<dl id="email" style="display:none" >
<?php if ($this->_tpl_vars['arrPop']['email'] == 1): ?>
	<div>
	<span>营销宣传</span>
	<a href="http://www.socorp.cn" target="main" >搜索邮件提取</a>
	<a href="email/email_user.php" target="main" >会员邮件提取</a>
	<a href="email/smtp/index.php" target="main" >SMTP邮局管理</a>
	<a href="email/email_sender.php" target="main" >邮件设定发送</a>
  </div>
<?php endif; ?>
</dl>
</div>
</body>
</html>