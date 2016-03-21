<?php /* Smarty version 2.6.20, created on 2015-10-26 18:29:07
         compiled from /Volumes/data/chao_program/lc_ad_first/shelter_ad/config/../../templates/1/shelter_ad/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', '/Volumes/data/chao_program/lc_ad_first/shelter_ad/config/../../templates/1/shelter_ad/index.html', 10, false),array('modifier', 'csubstr', '/Volumes/data/chao_program/lc_ad_first/shelter_ad/config/../../templates/1/shelter_ad/index.html', 15, false),array('modifier', 'date_format', '/Volumes/data/chao_program/lc_ad_first/shelter_ad/config/../../templates/1/shelter_ad/index.html', 16, false),)), $this); ?>
<div class="block7"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['arrGWeb']['module_id'])."/block/search.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="block7"></div>
<div class="block7"></div>
		<div class="doubleList">
		<?php $_from = $this->_tpl_vars['arrTopshelter_ad']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arrMainType']):
?>
			<div class="newslist">
				<div class="newslist_title">
					<div class="lf_v4a"><h2><span class="style1"><?php echo $this->_tpl_vars['arrMainType']['type_title']; ?>
</span></h2></div>
					<div class="rh_v4a"><a target="_blank" href="<?php echo smarty_function_url(array('url' => "/".($this->_tpl_vars['arrGWeb']['module_id'])."/list.php?type_id=".($this->_tpl_vars['arrMainType']['type_id'])), $this);?>
">更多 >></a></div>
				</div>
				<div id="newsBox" class="newsBox">
					<?php $_from = $this->_tpl_vars['arrMainType']['datas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arrData']):
?>
				<div class="newsItem">
  <div class="newsTitle"><a href="<?php if ($this->_tpl_vars['arrData']['linkurl'] != ''): ?><?php echo $this->_tpl_vars['arrData']['linkurl']; ?>
<?php else: ?><?php echo smarty_function_url(array('url' => "/".($this->_tpl_vars['arrGWeb']['module_id'])."/detail.php?id=".($this->_tpl_vars['arrData']['id']),'cache' => ($this->_tpl_vars['arrGWeb']['file_static'])), $this);?>
<?php endif; ?>" title="<?php echo $this->_tpl_vars['arrData']['summary']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrData']['title'])) ? $this->_run_mod_handler('csubstr', true, $_tmp, 0, 20) : smarty_modifier_csubstr($_tmp, 0, 20)); ?>
</a></div>
<div class="newsDate"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrData']['submit_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</div>
</div>
<?php endforeach; endif; unset($_from); ?>
				</div>
			</div>		
			<?php endforeach; endif; unset($_from); ?>			
			</div>
			
			
			
			
			
			
		