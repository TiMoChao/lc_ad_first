<?php /* Smarty version 2.6.20, created on 2015-06-05 00:32:52
         compiled from C:%5CProgram+Files+%28x86%29%5CZend%5CApache2%5Chtdocs%5Clc_ad%5Cshelter_ad%5Cconfig/../../templates/1/shelter_ad/detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\lc_ad\\shelter_ad\\config/../../templates/1/shelter_ad/detail.html', 6, false),)), $this); ?>
<div class="block7"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['arrGWeb']['module_id'])."/block/search.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="block7"></div>
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

<div class="table_background_top">

<div class="title_item title_font_item"><?php echo $this->_tpl_vars['arrData']['title']; ?>
</div>

<div class="introduction_item">
    <div class="intro_left">
    <div class="img_box">
	<div class="img_item">
    <div>
      <?php $_from = $this->_tpl_vars['arrData']['photo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['photo']):
?>
				<?php if ($this->_tpl_vars['photo']['photo'] != ""): ?><center><img src="<?php echo $this->_tpl_vars['FileCallPath']; ?>
b/<?php echo $this->_tpl_vars['photo']['photo']; ?>
" align="center" height="320" width="320" border="0" alt="<?php echo $this->_tpl_vars['photo']['photo_narrate']; ?>
"  onload='resizepic(this,600)' /><br><?php if ($this->_tpl_vars['photo']['photo_narrate']): ?><?php echo $this->_tpl_vars['photo']['photo_narrate']; ?>
<?php endif; ?></center><br><?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>		
    </div>
    </div>
    </div>
    </div>
	<div class="intro_text_item">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr> 
				<td width="30%"" height="30" valign="top">
					<strong class="intro_text_font">所在地区</strong>：
				</td>
				<td valign="top"><?php echo $this->_tpl_vars['arrData']['city_area']; ?>
</td>
			</tr>
			<tr>
				<td>
					<strong class="intro_text_font">媒体类型</strong>：
				</td>
				<td><?php echo $this->_tpl_vars['arrData']['meitileixing']; ?>
</td>
			</tr>
			<tr>
				<td>
					<strong class="intro_text_font">执行价格</strong>：
				</td>
				<td><?php echo $this->_tpl_vars['arrData']['zhixingjiage']; ?>
元起</td>
			</tr>
			<tr>
				<td>
					<strong class="intro_text_font">媒体状态</strong>：
				</td>
				<td><?php echo $this->_tpl_vars['arrData']['toufangzhuangtai']; ?>
</td>
			</tr>
			<tr>
				<td>
					<strong class="intro_text_font">最少投放量</strong>：
				</td>
				<td>
                    <?php echo $this->_tpl_vars['arrData']['zuishaotoufangliang']; ?>
                </td>
			</tr>
			<tr>
				<td>
					<strong class="intro_text_font">最短投放周期</strong>：
				</td>
				<td>
                    <?php echo $this->_tpl_vars['arrData']['zuiduantoufangzhouqi']; ?>
                </td>
			</tr>
			<tr>
				<td>
					<strong class="intro_text_font">联系方式</strong>：
				</td>
				<td>
                    <?php echo $this->_tpl_vars['arrData']['lianxifangshi']; ?>

                </td>
			</tr>
		</table>
	</div>
</div>
</div>

<div>
	<div class="detail_title_item">
		<div id="detailTabText" class="tab_on_item" id=vva1 style="cursor:pointer" onClick="showTab(1)">户外资源详情</div>
        	</div>
	<div id="detailTab" class="detail_item" style="display:block;">
		<table class="detail_table_item">
            <tr>
				<td align="right" width="20%" height="40"><strong class="intro_text_font">估计人（车）日流量</strong>：</td>
				<td>
                  <?php echo $this->_tpl_vars['arrData']['gujiren_cheliuliang']; ?>
万人次/天                </td>
			</tr>
			<tr>
				<td align="right" width="12%" height="40"><strong class="intro_text_font">媒体规格</strong>：</td>
				<td>
                   <?php echo $this->_tpl_vars['arrData']['meitiguige']; ?>
               </td>
			</tr>
			<tr>
				<td align="right" width="12%" height="40"><strong class="intro_text_font">照明方式</strong>：</td>
				<td>
                   <?php echo $this->_tpl_vars['arrData']['zhaomingfangshi']; ?>
               </td>
			</tr>
			<tr>
				<td align="right" width="12%" height="40"><strong class="intro_text_font">地理位置描述</strong>：</td>
				<td>
                    <?php echo $this->_tpl_vars['arrData']['diliweizhimiaoshu']; ?>
                </td>
			</tr>
		</table>
	</div>
	<div id="mapTab" class="map_item" style="display:none;">
	</div>
</div>

<div class="detail_title2_item"><?php echo $this->_tpl_vars['arrData']['title']; ?>
信息详情</div>
<div class="detail_content_item">
	<?php echo $this->_tpl_vars['arrData']['intro']; ?>


<div class="table_background_bottom">
	<div class="detail_img_item">
		<?php $_from = $this->_tpl_vars['arrData']['photo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['photo']):
?>
				<?php if ($this->_tpl_vars['photo']['photo'] != ""): ?><center><img src="<?php echo $this->_tpl_vars['FileCallPath']; ?>
b/<?php echo $this->_tpl_vars['photo']['photo']; ?>
" height="750" width="750"  alt="<?php echo $this->_tpl_vars['photo']['photo_narrate']; ?>
"  /><?php if ($this->_tpl_vars['photo']['photo_narrate']): ?><?php echo $this->_tpl_vars['photo']['photo_narrate']; ?>
<?php endif; ?><?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>			</div>
</div>
</div>
<div class="hwv3_mi">

<div class="hwv3_mi_tjv4">

<div class="lf_v4a"><h2><span class="style1">公司简介</span></h2></div>

</div>

<div class="companyDesc">
<div class="companyName">
    <?php echo $this->_tpl_vars['arrData']['gongsimingceng']; ?>
</div>
<div class="companyDetail">
   
    <div class="companyContent">
       <?php echo $this->_tpl_vars['arrData']['gongsijianjie']; ?>
</div>
</div>
</div>
</div>


