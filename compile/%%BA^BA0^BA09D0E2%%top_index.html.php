<?php /* Smarty version 2.6.20, created on 2015-10-26 18:27:37
         compiled from links/block/top_index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'links/block/top_index.html', 2, false),)), $this); ?>
<!--<div id="link">
	<div class="tit"><span><a href="<?php echo smarty_function_url(array('url' => '/links/'), $this);?>
">友情链接</a></span></div>
	<div class="piclink">
		<ul>
			<?php $_from = $this->_tpl_vars['arrLinkText']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arrTxt']):
?>
				 <li>
					<a href="<?php echo $this->_tpl_vars['arrTxt']['webhost']; ?>
" title="<?php echo $this->_tpl_vars['arrTxt']['summary']; ?>
" target="_blank"><?php echo $this->_tpl_vars['arrTxt']['webname']; ?>
</a>&nbsp;&nbsp;
				</li>
			 <?php endforeach; endif; unset($_from); ?>
			<div class="piclinkclr2"></div>
		 </ul>
	</div>
</div>-->


<div class="v3_lj">
		<div class="v3_lj01"><h2>&nbsp;&nbsp;友情链接</h2></div>
		<div class="v3_lj02">
		<?php $_from = $this->_tpl_vars['arrLinkText']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arrTxt']):
?>			
					<a href="<?php echo $this->_tpl_vars['arrTxt']['webhost']; ?>
" title="<?php echo $this->_tpl_vars['arrTxt']['summary']; ?>
" target="_blank"><?php echo $this->_tpl_vars['arrTxt']['webname']; ?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;				
			 <?php endforeach; endif; unset($_from); ?>
		</div>
	</div>