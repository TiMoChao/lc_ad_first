<?php /* Smarty version 2.6.20, created on 2015-10-26 18:28:51
         compiled from /Volumes/data/chao_program/lc_ad_first/tender_ad/config/../../templates/1/tender_ad/list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', '/Volumes/data/chao_program/lc_ad_first/tender_ad/config/../../templates/1/tender_ad/list.html', 18, false),array('modifier', 'csubstr', '/Volumes/data/chao_program/lc_ad_first/tender_ad/config/../../templates/1/tender_ad/list.html', 18, false),array('modifier', 'date_format', '/Volumes/data/chao_program/lc_ad_first/tender_ad/config/../../templates/1/tender_ad/list.html', 20, false),)), $this); ?>
	
<div class="hwv3_lf">
<div class="hwv3_mi">
<div class="hwv3_mi_tjv4">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['arrGWeb']['module_id'])."/block/search.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>




<div class="v4_zy2" id="pageContent">
 <div class="tit"><h2><?php if (! empty ( $this->_tpl_vars['strKeywords'] )): ?><?php echo $this->_tpl_vars['strKeywords']; ?>
搜索结果<?php else: ?><?php endif; ?></h2></div>
<div id="content">

<?php $_from = $this->_tpl_vars['arrInfoList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arrData']):
?>
<div class="listContentDiv">
	<div class="listTextContent">
		  <a target="_blank" href="<?php if ($this->_tpl_vars['arrData']['linkurl'] != ''): ?><?php echo $this->_tpl_vars['arrData']['linkurl']; ?>
<?php else: ?><?php echo smarty_function_url(array('url' => "/".($this->_tpl_vars['arrGWeb']['module_id'])."/detail.php?id=".($this->_tpl_vars['arrData']['id']),'cache' => ($this->_tpl_vars['arrGWeb']['file_static'])), $this);?>
<?php endif; ?>" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrData']['summary'])) ? $this->_run_mod_handler('csubstr', true, $_tmp, 0, 100) : smarty_modifier_csubstr($_tmp, 0, 100)); ?>
"><img border="0" src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/dian.gif"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrData']['title'])) ? $this->_run_mod_handler('csubstr', true, $_tmp, 0, 25) : smarty_modifier_csubstr($_tmp, 0, 25)); ?>
</a>
	</div>
	<div class="listDateContent"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrData']['submit_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</div>
</div>
<?php endforeach; endif; unset($_from); ?>
</div>
</div>
</div>
</div>
		<div class="clearboth">
				<ul class="sea-page">
					<li class="right"><?php echo $this->_tpl_vars['strPage']; ?>
</li>
				</ul>
	</div>	
		