<?php /* Smarty version 2.6.20, created on 2015-10-26 18:27:37
         compiled from news_law/block/top_index1.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'news_law/block/top_index1.html', 6, false),array('modifier', 'csubstr', 'news_law/block/top_index1.html', 6, false),array('modifier', 'date_format', 'news_law/block/top_index1.html', 8, false),)), $this); ?>

				<?php $_from = $this->_tpl_vars['arrTopnews_law1']['1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arrData']):
?>
<div class="newsItem">
	<div class="newsTitle">
		
	<a target="_blank" href="<?php if ($this->_tpl_vars['arrData']['linkurl'] != ''): ?><?php echo $this->_tpl_vars['arrData']['linkurl']; ?>
<?php else: ?><?php echo smarty_function_url(array('url' => "/news_law/detail.php?id=".($this->_tpl_vars['arrData']['id']),'cache' => ($this->_tpl_vars['arrGWeb']['file_static'])), $this);?>
<?php endif; ?>" title="<?php echo $this->_tpl_vars['arrData']['summary']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrData']['title'])) ? $this->_run_mod_handler('csubstr', true, $_tmp, 0, 20) : smarty_modifier_csubstr($_tmp, 0, 20)); ?>
&nbsp;&nbsp;</a>
	</div>
	<div class="newsDate"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrData']['submit_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</div>
</div>
<?php endforeach; endif; unset($_from); ?>
						
						
						