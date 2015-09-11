<?php /* Smarty version 2.6.20, created on 2015-06-04 15:52:30
         compiled from C:%5CProgram+Files+%28x86%29%5CZend%5CApache2%5Chtdocs%5Clc_ad%5Ctender_ad%5Cconfig/../../templates/1/tender_ad/detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\lc_ad\\tender_ad\\config/../../templates/1/tender_ad/detail.html', 11, false),)), $this); ?>
<div class="block7"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['arrGWeb']['module_id'])."/block/search.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="block7"></div>
	
<div class="hwv3_lf">

<div class="title">
			<?php echo $this->_tpl_vars['arrData']['title']; ?>
</div>
		<div class="news-detail-info">
				<UL>
					<li>发布时间：<?php echo $this->_tpl_vars['arrData']['submit_date']; ?>
 浏览率：<script language='javascript' src='../../plug-in/click/getclick.php?module_id=<?php echo $this->_tpl_vars['arrGWeb']['module_id']; ?>
&id=<?php echo $this->_tpl_vars['arrData']['id']; ?>
'></script><?php if ($this->_tpl_vars['arrData']['author'] != ''): ?> 作者：<?php echo $this->_tpl_vars['arrData']['author']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['arrData']['source'] != ''): ?> 来源：<?php echo $this->_tpl_vars['arrData']['source']; ?>
<?php endif; ?>【字体：<a href="javascript:fontZoomA();">小</a> <a href="javascript:fontZoomB();">大</a> <a href="javascript:window.print();">打印</a> <a href="<?php echo smarty_function_url(array('url' => "/".($this->_tpl_vars['arrGWeb']['module_id'])."/detail.php?id=".($this->_tpl_vars['arrData']['id']),'cache' => '2'), $this);?>
">DOC</a>】<br />收藏到：<script src="../../plug-in/favorite/sc.js"></script></li>
				</UL>
			</div>

<div class="hwv3_mi">

<div>
	<div class="small_title"><img border="0" src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/dian.gif">广告详细说明</div>
	<div class="detailDes">
	<div class="table_background_bottom">
	<div class="detail_img_item">
		<?php $_from = $this->_tpl_vars['arrData']['photo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['photo']):
?>
				<?php if ($this->_tpl_vars['photo']['photo'] != ""): ?><center><img src="<?php echo $this->_tpl_vars['FileCallPath']; ?>
b/<?php echo $this->_tpl_vars['photo']['photo']; ?>
" height="300" width="300"  alt="<?php echo $this->_tpl_vars['photo']['photo_narrate']; ?>
"  /><?php if ($this->_tpl_vars['photo']['photo_narrate']): ?><?php echo $this->_tpl_vars['photo']['photo_narrate']; ?>
<?php endif; ?><?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>			</div>
</div>
	<?php echo $this->_tpl_vars['arrData']['intro']; ?>

	</div>

	<div class="small_title"><img border="0" src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/dian.gif">联系方式</div>
    <div class="contactInfo">
联系人：<?php echo $this->_tpl_vars['arrData']['meitileixing']; ?>
<br>
联系电话：<?php echo $this->_tpl_vars['arrData']['city_area']; ?>
<br>
手机：<?php echo $this->_tpl_vars['arrData']['diliweizhimiaoshu']; ?>
<br>
单位名称：<?php echo $this->_tpl_vars['arrData']['zhixingjiage']; ?>
<br>
单位地址：<?php echo $this->_tpl_vars['arrData']['toufangzhuangtai']; ?>
<br>
传真：<?php echo $this->_tpl_vars['arrData']['zuishaotoufangliang']; ?>
<br>
网址：<?php echo $this->_tpl_vars['arrData']['zuiduantoufangzhouqi']; ?>
<br>
</div>

</div>

</div>

</div>