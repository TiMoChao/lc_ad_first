<?php /* Smarty version 2.6.20, created on 2015-06-04 15:05:27
         compiled from Personality_customization/block/top_index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'Personality_customization/block/top_index.html', 7, false),array('modifier', 'csubstr', 'Personality_customization/block/top_index.html', 7, false),array('modifier', 'date_format', 'Personality_customization/block/top_index.html', 9, false),)), $this); ?>

	
					<?php $_from = $this->_tpl_vars['arrTopPersonality_customization1']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arrData']):
?>
					<div class="v4_zy2a">
	<div class="listText">
		
	<a target="_blank" href="<?php if ($this->_tpl_vars['arrData']['linkurl'] != ''): ?><?php echo $this->_tpl_vars['arrData']['linkurl']; ?>
<?php else: ?><?php echo smarty_function_url(array('url' => "/Personality_customization/detail.php?id=".($this->_tpl_vars['arrData']['id']),'cache' => ($this->_tpl_vars['arrGWeb']['file_static'])), $this);?>
<?php endif; ?>" title="<?php echo $this->_tpl_vars['arrData']['summary']; ?>
"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/dian.gif" tppabs="http://www.mmggxx.cn/images/dian.gif" border="0">&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['arrData']['title'])) ? $this->_run_mod_handler('csubstr', true, $_tmp, 0, 20) : smarty_modifier_csubstr($_tmp, 0, 20)); ?>
...&nbsp;&nbsp;</a>
	</div>
	<div class="listDate"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrData']['submit_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</div>
</div>
<?php endforeach; endif; unset($_from); ?>