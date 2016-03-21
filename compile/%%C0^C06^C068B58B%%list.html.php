<?php /* Smarty version 2.6.20, created on 2015-10-27 14:42:28
         compiled from /Volumes/data/chao_program/lc_ad_first/outdoor_ad/config/../../templates/1/outdoor_ad/list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', '/Volumes/data/chao_program/lc_ad_first/outdoor_ad/config/../../templates/1/outdoor_ad/list.html', 15, false),array('modifier', 'csubstr', '/Volumes/data/chao_program/lc_ad_first/outdoor_ad/config/../../templates/1/outdoor_ad/list.html', 15, false),)), $this); ?>

<div class="block7"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['arrGWeb']['module_id'])."/block/search.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="block7"></div>

<div class="mapPlane" id="mapPlane">
   <div class="tit"><h2><?php if (! empty ( $this->_tpl_vars['strKeywords'] )): ?><?php echo $this->_tpl_vars['strKeywords']; ?>
搜索结果<?php else: ?><?php endif; ?></h2></div>
 	<div class="fjclear"></div>
    <div class="advertising_list" id="advertising_list">
	<?php $_from = $this->_tpl_vars['arrInfoList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arrData']):
?>
        <div id="content"><div class="ad_item">
   <div class="item_left">
       <div class="item_image_box">
           <div class="itemImage">
                  <a href="<?php if ($this->_tpl_vars['arrData']['linkurl'] != ''): ?><?php echo $this->_tpl_vars['arrData']['linkurl']; ?>
<?php else: ?><?php echo smarty_function_url(array('url' => "/".($this->_tpl_vars['arrGWeb']['module_id'])."/detail.php?id=".($this->_tpl_vars['arrData']['id']),'cache' => ($this->_tpl_vars['arrGWeb']['file_static'])), $this);?>
<?php endif; ?>" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrData']['summary'])) ? $this->_run_mod_handler('csubstr', true, $_tmp, 0, 100) : smarty_modifier_csubstr($_tmp, 0, 100)); ?>
" target="_blank">
				
				  <img src="<?php if ($this->_tpl_vars['arrData']['thumbnail'] != ''): ?>
				  <?php echo $this->_tpl_vars['FileCallPath']; ?>
b/<?php echo $this->_tpl_vars['arrData']['thumbnail']; ?>

				  <?php else: ?><?php echo $this->_tpl_vars['arrGWeb']['templats_root']; ?>
/images/nopic.gif<?php endif; ?>" 
				  onload='resizepic(this,100)' height="90" width="120"/>
				 </a>
           </div>
       </div>
   </div>
   <div class="itemDesc">
   <div class="itemTitle" id="itemTitle">
     <a target="_blank" href="<?php if ($this->_tpl_vars['arrData']['linkurl'] != ''): ?><?php echo $this->_tpl_vars['arrData']['linkurl']; ?>
<?php else: ?><?php echo smarty_function_url(array('url' => "/".($this->_tpl_vars['arrGWeb']['module_id'])."/detail.php?id=".($this->_tpl_vars['arrData']['id']),'cache' => ($this->_tpl_vars['arrGWeb']['file_static'])), $this);?>
<?php endif; ?>" title="<?php echo $this->_tpl_vars['arrData']['summary']; ?>
"><?php echo $this->_tpl_vars['arrData']['title']; ?>
</a></li>
   </div>
   <div class="itemIntroduction">
      <?php echo $this->_tpl_vars['arrData']['summary']; ?>
...<a target="_blank" href="<?php if ($this->_tpl_vars['arrData']['linkurl'] != ''): ?><?php echo $this->_tpl_vars['arrData']['linkurl']; ?>
<?php else: ?><?php echo smarty_function_url(array('url' => "/".($this->_tpl_vars['arrGWeb']['module_id'])."/detail.php?id=".($this->_tpl_vars['arrData']['id']),'cache' => ($this->_tpl_vars['arrGWeb']['file_static'])), $this);?>
<?php endif; ?>" title="<?php echo $this->_tpl_vars['arrData']['summary']; ?>
">[详细]</a>
   </div>
   </div>
</div>
</div>
<?php endforeach; endif; unset($_from); ?>
</div>
    </div>
	<div class="clearboth">
				<ul class="sea-page">
					<li class="right"><?php echo $this->_tpl_vars['strPage']; ?>
</li>
				</ul>
	</div>
	
			
		