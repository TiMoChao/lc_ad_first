<?php /* Smarty version 2.6.20, created on 2015-06-04 15:05:27
         compiled from index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'index.html', 244, false),)), $this); ?>

<div class="hwv3_main">
	<div class="hwv3_rh_v4">
		<div id="banner"> 
			
		<div id="focuspic">
			<script type=text/javascript>
				var pic_width=700; //图片宽度
				var pic_height=310; //图片高度
				var button_pos=4; //按扭位置 1左 2右 3上 4下
				var stop_time=3000; //图片停留时间(1000为1秒钟)
				var show_text=0; //是否显示文字标签 1显示 0不显示
				var txtcolor="000000"; //文字色
				var bgcolor="DDDDDD"; //背景色

				//可编辑内容结束
				var swf_height=show_text==1?pic_height+20:pic_height;
				<?php if (empty ( $this->_tpl_vars['arrTopads']['4']['pics'] )): ?>
					var pics='<?php echo $this->_tpl_vars['arrGWeb']['templats_root']; ?>
/images/1.jpg|<?php echo $this->_tpl_vars['arrGWeb']['templats_root']; ?>
/images/2.jpg'
					var links='#|#'
					var texts='aa|bb'
				<?php else: ?>
					var pics='<?php echo $this->_tpl_vars['arrTopads']['4']['pics']; ?>
'
					var links='<?php echo $this->_tpl_vars['arrTopads']['4']['links']; ?>
'
					var texts='<?php echo $this->_tpl_vars['arrTopads']['4']['texts']; ?>
'
				<?php endif; ?>
				document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cabversion=6,0,0,0" width="'+ pic_width +'" height="'+ swf_height +'">');
				document.write('<param name="movie" value="<?php echo $this->_tpl_vars['arrGWeb']['templats_root']; ?>
/images/focus.swf">');
				document.write('<param name="quality" value="high"><param name="wmode" value="opaque">');
				document.write('<param name="FlashVars" value="pics='+pics+'&links='+links+'&texts='+texts+'&pic_width='+pic_width+'&pic_height='+pic_height+'&show_text='+show_text+'&txtcolor='+txtcolor+'&bgcolor='+bgcolor+'&button_pos='+button_pos+'&stop_time='+stop_time+'">');
				document.write('<embed src="<?php echo $this->_tpl_vars['arrGWeb']['templats_root']; ?>
/images/focus.swf" FlashVars="pics='+pics+'&links='+links+'&texts='+texts+'&pic_width='+pic_width+'&pic_height='+pic_height+'&show_text='+show_text+'&txtcolor='+txtcolor+'&bgcolor='+bgcolor+'&button_pos='+button_pos+'&stop_time='+stop_time+'" quality="high" width="'+ pic_width +'" height="'+ swf_height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');
				document.write('</object>');
			</script>
		</div><!--focuspic[焦点图片] end-->	
			
			
		<!--	<ul>
				<li>1</li>
                <li>2</li>
                <li>3</li>
                <li>4</li>
                <li>5</li>
                <li>6</li>
                <li>7</li>
                <li>8</li>
                <li>9</li>
                <li>10</li>
                <li>11</li>
                <li>12</li>
                <li>13</li>
			</ul> 			
<div id="banner_list">
				<a href="item.php-id=206.htm" tppabs="http://www.mmggxx.cn/item.php?id=206">
                 <img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/thumb.php-path=recommend-01_LED.jpg&width=700&height=257.jpg" width="700" height="310">
</a>
<a href="item.php-id=207.htm">
  <img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/thumb.php-path=recommend-02_baozhuangsheji.jpg&width=700&height=257.jpg"  width="700" height="310">
</a>
<a href="item.php-id=208.htm">
  <img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/thumb.php-path=recommend-03_huacesheji.jpg&width=700&height=257.jpg"  width="700" height="310">
</a>
<a href="item.php-id=209.htm">
  <img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/thumb.php-path=recommend-04dongdongdache.jpg&width=700&height=257.jpg"  width="700" height="310">
</a>
<a href="item.php-id=210.htm">
  <img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/thumb.php-path=recommend-05care.jpg&width=700&height=257.jpg"  width="700" height="310">
</a>
<a href="item.php-id=211.htm" tppabs="http://www.mmggxx.cn/item.php?id=211">
  <img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/thumb.php-path=recommend-06zhaopai.jpg&width=700&height=257.jpg"  width="700" height="310">
</a>
<a href="item.php-id=212.htm" tppabs="http://www.mmggxx.cn/item.php?id=212">
  <img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/thumb.php-path=recommend-09houdangfengboli.jpg&width=700&height=257.jpg"  width="700" height="310">
</a>
<a href="item.php-id=213.htm" tppabs="http://www.mmggxx.cn/item.php?id=213">
  <img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/thumb.php-path=recommend-07zhijinsheji.jpg&width=700&height=257.jpg"  width="700" height="310">
</a>
<a href="item.php-id=214.htm" tppabs="http://www.mmggxx.cn/item.php?id=214">
  <img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/thumb.php-path=recommend-08gouwudai.jpg&width=700&height=257.jpg"  width="700" height="310">
</a>
<a href="item.php-id=215.htm" tppabs="http://www.mmggxx.cn/item.php?id=215">
  <img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/thumb.php-path=recommend-10rencaiwang.jpg&width=700&height=257.jpg"   width="700" height="310">
</a>
<a href="item.php-id=216.htm" tppabs="http://www.mmggxx.cn/item.php?id=216">
  <img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/thumb.php-path=recommend-11canjuzhitaosheji.jpg&width=700&height=257.jpg"   width="700" height="310"> 
</a>
<a href="item.php-id=217.htm" tppabs="http://www.mmggxx.cn/item.php?id=217">
  <img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/thumb.php-path=recommend-12zhanpaiguanggao.jpg&width=700&height=257.jpg"   width="700" height="310">
</a>
<a href="item.php-id=218.htm" tppabs="http://www.mmggxx.cn/item.php?id=218">
  <img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/thumb.php-path=recommend-13weixintuiguang.jpg&width=700&height=257.jpg"  width="700" height="310">
</a>
			</div> 	-->
		</div> 	
		    	<div class="col3">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "user/block/login.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
	</div><!--area[1]>col3 end-->
	<div class="fjclear"></div>
	
	</div>
</div>

<div class="hwv3_main">
	<div class="hwv3_lf">
	    <script language="JavaScript" src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/uploadfile/ads/5.js"></script>
		<!--<div class="v4_ad">
<a href="javascript:if(confirm('http://www.mmzt.net/piclist/?66_1.html  \n\nكτݾϞרԃ Teleport Ultra Ђ՘, ӲΪ ̼ˇһٶԲܲ·޶΢ҿѻʨ׃Ϊ̼քǴʼַ֘քַ֘c  \n\nţЫ՚ؾϱǷʏղߪ̼?'))window.location='http://www.mmzt.net/piclist/?66_1.html'" tppabs="http://www.mmzt.net/piclist/?66_1.html" target="_blank"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/logo/02chuzucheguanggao.jpg" tppabs="http://www.mmggxx.cn/logo/02chuzucheguanggao.jpg" width="154" height="55" border="0" alt="创世纪广告公司"></a>
</div>
<div class="v4_ad">
<a href="javascript:if(confirm('http://www.mmggxx.cn/www.517dc.com  \n\nكτݾϞרԃ Teleport Ultra Ђ՘, ӲΪ ؾϱǷѨ٦كτݾδ֒սc  \n\nţЫ՚ؾϱǷʏղߪ̼?'))window.location='http://www.mmggxx.cn/www.517dc.com'" tppabs="http://www.mmggxx.cn/www.517dc.com" target="_blank"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/logo/03dingcanwang.gif" tppabs="http://www.mmggxx.cn/logo/03dingcanwang.gif" width="154" height="55" border="0" alt="信宜创丰广告"></a>
</div>
<div class="v4_ad">
<a href="javascript:if(confirm('http://www.mmggxx.cn/www.weiwola.cn  \n\nكτݾϞרԃ Teleport Ultra Ђ՘, ӲΪ ؾϱǷѨ٦كτݾδ֒սc  \n\nţЫ՚ؾϱǷʏղߪ̼?'))window.location='http://www.mmggxx.cn/www.weiwola.cn'" tppabs="http://www.mmggxx.cn/www.weiwola.cn" target="_blank"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/logo/04weixin.gif" tppabs="http://www.mmggxx.cn/logo/04weixin.gif" width="154" height="55" border="0" alt="精英人才网"></a>
</div>
<div class="v4_ad">
<a href="javascript:if(confirm('http://www.taxicomeon.com/index1.php  \n\nكτݾϞרԃ Teleport Ultra Ђ՘, ӲΪ ̼ˇһٶԲܲ·޶΢ҿѻʨ׃Ϊ̼քǴʼַ֘քַ֘c  \n\nţЫ՚ؾϱǷʏղߪ̼?'))window.location='http://www.taxicomeon.com/index1.php'" tppabs="http://www.taxicomeon.com/index1.php" target="_blank"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/logo/06dongdongdache.jpg" tppabs="http://www.mmggxx.cn/logo/06dongdongdache.jpg" width="154" height="55" border="0" alt="市博艺广告有限公司"></a>
</div>
<div class="v4_ad">
<a href="" target="_blank"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/logo/07jingweidu.jpg" tppabs="http://www.mmggxx.cn/logo/07jingweidu.jpg" width="154" height="55" border="0" alt="艺扬广告"></a>
</div>
<div class="v4_ad">
<a href="javascript:if(confirm('http://www.mmzt.net/  \n\nكτݾϞרԃ Teleport Ultra Ђ՘, ӲΪ ̼ˇһٶԲܲ·޶΢ҿѻʨ׃Ϊ̼քǴʼַ֘քַ֘c  \n\nţЫ՚ؾϱǷʏղߪ̼?'))window.location='http://www.mmzt.net/'" tppabs="http://www.mmzt.net/" target="_blank"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/logo/08zhongtaikeji.jpg" tppabs="http://www.mmggxx.cn/logo/08zhongtaikeji.jpg" width="154" height="55" border="0" alt="信宜在线"></a>
</div>
<div class="v4_ad">
<a href="javascript:if(confirm('http://www.966706.com/  \n\nكτݾϞרԃ Teleport Ultra Ђ՘, ӲΪ ̼ˇһٶԲܲ·޶΢ҿѻʨ׃Ϊ̼քǴʼַ֘քַ֘c  \n\nţЫ՚ؾϱǷʏղߪ̼?'))window.location='http://www.966706.com/'" tppabs="http://www.966706.com/" target="_blank"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/logo/09xuchewang.gif" tppabs="http://www.mmggxx.cn/logo/09xuchewang.gif" width="154" height="55" border="0" alt="LED"></a>
</div>
<div class="v4_ad">
<a href="javascript:if(confirm('http://www.mmwlpt.com/  \n\nكτݾϞרԃ Teleport Ultra Ђ՘, ӲΪ ̼ˇһٶԲܲ·޶΢ҿѻʨ׃Ϊ̼քǴʼַ֘քַ֘c  \n\nţЫ՚ؾϱǷʏղߪ̼?'))window.location='http://www.mmwlpt.com/'" tppabs="http://www.mmwlpt.com/" target="_blank"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/logo/10wuliuwang.gif" tppabs="http://www.mmggxx.cn/logo/10wuliuwang.gif" width="154" height="55" border="0" alt="市京盾文化传播有限公司"></a>
</div>
<div class="v4_ad">
<a href="javascript:if(confirm('http://www.chegle.com/  \n\nكτݾϞרԃ Teleport Ultra Ђ՘, ӲΪ ̼ˇһٶԲܲ·޶΢ҿѻʨ׃Ϊ̼քǴʼַ֘քַ֘c  \n\nţЫ՚ؾϱǷʏղߪ̼?'))window.location='http://www.chegle.com/'" tppabs="http://www.chegle.com/" target="_blank"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/logo/11jiapeiwang.gif" tppabs="http://www.mmggxx.cn/logo/11jiapeiwang.gif" width="154" height="55" border="0" alt="诺德广告"></a>
</div>
<div class="v4_ad">
<a href="" target="_blank"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/logo/12jiankong.jpg" tppabs="http://www.mmggxx.cn/logo/12jiankong.jpg" width="154" height="55" border="0" alt="恒基广告有限公司"></a>
</div>
<div class="v4_ad">
<a href="" target="_blank"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/logo/13huanlegu.gif" tppabs="http://www.mmggxx.cn/logo/13huanlegu.gif" width="154" height="55" border="0" alt="市大拇指科技"></a>
</div>
<div class="v4_ad">
<a href="javascript:if(confirm('http://www.ywgle.com/  \n\nكτݾϞרԃ Teleport Ultra Ђ՘, ӲΪ ̼ˇһٶԲܲ·޶΢ҿѻʨ׃Ϊ̼քǴʼַ֘քַ֘c  \n\nţЫ՚ؾϱǷʏղߪ̼?'))window.location='http://www.ywgle.com/'" tppabs="http://www.ywgle.com/" target="_blank"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/logo/14guanliyi.jpg" tppabs="http://www.mmggxx.cn/logo/14guanliyi.jpg" width="154" height="55" border="0" alt="市中科宇航科技开发有限公司"></a>
</div>
<div class="v4_ad">
<a href="javascript:if(confirm('http://www.gpsll.cn/  \n\nكτݾϞרԃ Teleport Ultra Ђ՘, ӲΪ ̼ˇһٶԲܲ·޶΢ҿѻʨ׃Ϊ̼քǴʼַ֘քַ֘c  \n\nţЫ՚ؾϱǷʏղߪ̼?'))window.location='http://www.gpsll.cn/'" tppabs="http://www.gpsll.cn/" target="_blank"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/logo/15jingweidu.jpg" tppabs="http://www.mmggxx.cn/logo/15jingweidu.jpg" width="154" height="55" border="0" alt="中泰科技"></a>
</div>
<div class="v4_ad">
<a href="javascript:if(confirm('http://localhost:8080/  \n\nكτݾϞרԃ Teleport Ultra Ђ՘, ӲΪ ̼ˇһٶԲܲ·޶΢ҿѻʨ׃Ϊ̼քǴʼַ֘քַ֘c  \n\nţЫ՚ؾϱǷʏղߪ̼?'))window.location='http://localhost:8080/'" tppabs="http://localhost:8080/" target="_blank"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/logo/default.gif" tppabs="http://www.mmggxx.cn/logo/default.gif" width="154" height="55" border="0" alt="广告资源网"></a>
</div>
<div class="v4_ad">
<a href="javascript:if(confirm('http://localhost:8080/  \n\nكτݾϞרԃ Teleport Ultra Ђ՘, ӲΪ ̼ˇһٶԲܲ·޶΢ҿѻʨ׃Ϊ̼քǴʼַ֘քַ֘c  \n\nţЫ՚ؾϱǷʏղߪ̼?'))window.location='http://localhost:8080/'" tppabs="http://localhost:8080/" target="_blank"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/logo/default.gif" tppabs="http://www.mmggxx.cn/logo/default.gif" width="154" height="55" border="0" alt="广告资源网"></a>
</div>-->
		<!--广告位招租栏目-->
		<div class="hwv3_mi">
		
			<div class="hwv3_mi_tjv4">
				<div class="lf_v4a"><h2><span class="style1">广告位招商</span></h2></div>
				<!--<div class="rh_v4a"><a href="buyers.php.htm" class="style2" >更多 >></a></div>-->
				<div class="rh_v4a"></div>
			</div>
			<div class="v4_zy2">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "car_ad/block/top_index.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Community_ad/block/top_index.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "multimedia_ad/block/top_index.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Newspapers_magazines/block/top_index.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "outdoor_ad/block/top_index.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Personality_customization/block/top_index.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "plane_ad/block/top_index.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Planning_production/block/top_index.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "read_ad/block/top_index.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<!--<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "shelter_ad/block/top_index.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>-->
			
			
<!--<div class="v4_zy2a">
	<div class="listText">
		<a href="item.php-id=221.htm" tppabs="http://www.mmggxx.cn/item.php?id=221"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/dian.gif" tppabs="http://www.mmggxx.cn/images/dian.gif" border="0">&nbsp;喷绘（喷画）写真 背胶...&nbsp;&nbsp;&nbsp;&nbsp;</a>
	</div>
	<div class="listDate">2014-07-02</div>
</div>

<div class="v4_zy2a">
	<div class="listText">
		<a href="item.php-id=220.htm" tppabs="http://www.mmggxx.cn/item.php?id=220"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/dian.gif" tppabs="http://www.mmggxx.cn/images/dian.gif" border="0">&nbsp;狂欢节&nbsp;&nbsp;&nbsp;&nbsp;</a>
	</div>
	<div class="listDate">2014-04-28</div>
</div>
<div class="v4_zy2a">
	<div class="listText">
		<a href="item.php-id=213.htm" tppabs="http://www.mmggxx.cn/item.php?id=213"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/dian.gif" tppabs="http://www.mmggxx.cn/images/dian.gif" border="0">&nbsp;餐巾纸定制&nbsp;&nbsp;&nbsp;&nbsp;</a>
	</div>
	<div class="listDate">2014-04-12</div>
</div>
<div class="v4_zy2a">
	<div class="listText">
		<a href="item.php-id=214.htm" tppabs="http://www.mmggxx.cn/item.php?id=214"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/dian.gif" tppabs="http://www.mmggxx.cn/images/dian.gif" border="0">&nbsp;购物袋设计定制&nbsp;&nbsp;&nbsp;&nbsp;</a>
	</div>
	<div class="listDate">2014-04-12</div>
</div>
<div class="v4_zy2a">
	<div class="listText">
		<a href="item.php-id=215.htm" tppabs="http://www.mmggxx.cn/item.php?id=215"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/dian.gif" tppabs="http://www.mmggxx.cn/images/dian.gif" border="0">&nbsp;精英人才网&nbsp;&nbsp;&nbsp;&nbsp;</a>
	</div>
	<div class="listDate">2014-04-12</div>
</div>
<div class="v4_zy2a">
	<div class="listText">
		<a href="item.php-id=216.htm" tppabs="http://www.mmggxx.cn/item.php?id=216"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/dian.gif" tppabs="http://www.mmggxx.cn/images/dian.gif" border="0">&nbsp;餐具纸套设计&nbsp;&nbsp;&nbsp;&nbsp;</a>
	</div>
	<div class="listDate">2014-04-12</div>
</div>
<div class="v4_zy2a">
	<div class="listText">
		<a href="item.php-id=217.htm" tppabs="http://www.mmggxx.cn/item.php?id=217"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/dian.gif" tppabs="http://www.mmggxx.cn/images/dian.gif" border="0">&nbsp;站牌广告&nbsp;&nbsp;&nbsp;&nbsp;</a>
	</div>
	<div class="listDate">2014-04-12</div>
</div>
<div class="v4_zy2a">
	<div class="listText">
		<a href="item.php-id=218.htm" tppabs="http://www.mmggxx.cn/item.php?id=218"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/dian.gif" tppabs="http://www.mmggxx.cn/images/dian.gif" border="0">&nbsp;微信互动营销平台&nbsp;&nbsp;&nbsp;&nbsp;</a>
	</div>
	<div class="listDate">2014-04-12</div>
</div>

-->

			</div>
		</div>
		<!--广告位招租栏目-->
		<!-- 长条LOGO -->
		<div class="longLogo1"> 
			<!--标题--> 
			<ul>
				<li>1</li>
                <li>2</li>
                <li>3</li>
			</ul> 
			<!--<div class="longLogo_list1">	-->	
			<script language="JavaScript" src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/uploadfile/ads/2.js"></script>			
			<!--</div> -->
		</div>	
		<!-- 长条LOGO -->
		<!--广告招标栏目-->
		<div class="hwv3_mi">
			<div class="hwv3_mi_tjv4">
				<div class="lf_v4a"><h2><span class="style1">广告招标</span></h2></div>
				<div class="rh_v4a"><a href="<?php echo smarty_function_url(array('url' => '/tender_ad/list.php?type_id=1'), $this);?>
" class="style2" >更多 >></a></div>
			</div>
			<div class="v4_zy2">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "tender_ad/block/top_index.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </div>

		</div>
		<!-- 广告招标栏目 -->
		<!-- 长条LOGO -->
		<div class="longLogo2"> 
			<!--标题--> 
			<ul>
				<li>1</li>
                <li>2</li>
                <li>3</li>
			</ul> 
			<!--<div class="longLogo_list2">	-->	
			<script language="JavaScript" src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/uploadfile/ads/3.js"></script>			
			<!--</div> -->
		</div>
		<!-- 长条LOGO -->
		<!--名录和推广栏目-->
	<!--	<div class="doubleList">
			<div class="adlist">
				<div class="adlist_title">
					<div class="lf_v4a"><h2><span class="style1">广告公司名录</span></h2></div>
					<div class="rh_v4a"><a href="adList.php.htm" tppabs="http://www.mmggxx.cn/adList.php" class="style2" >更多 >></a></div>
				</div>
				 <div class="adListItem">
<a href="listByCompany.php-companyid=442.htm" tppabs="http://www.mmggxx.cn/listByCompany.php?companyid=442">市一呼文化传播有限公司</a>
</div>
<div class="adListItem">
<a href="listByCompany.php-companyid=441.htm" tppabs="http://www.mmggxx.cn/listByCompany.php?companyid=441">linlinzbf</a>
</div>
<div class="adListItem">
<a href="listByCompany.php-companyid=440.htm" tppabs="http://www.mmggxx.cn/listByCompany.php?companyid=440">linlinhjk</a>
</div>
<div class="adListItem">
<a href="listByCompany.php-companyid=439.htm" tppabs="http://www.mmggxx.cn/listByCompany.php?companyid=439">linlinqaf</a>
</div>
<div class="adListItem">
<a href="listByCompany.php-companyid=438.htm" tppabs="http://www.mmggxx.cn/listByCompany.php?companyid=438">司瑞生科技有限公司</a>
</div>
<div class="adListItem">
<a href="listByCompany.php-companyid=437.htm" tppabs="http://www.mmggxx.cn/listByCompany.php?companyid=437">深圳市一道通科技有限公司</a>
</div>
<div class="adListItem">
<a href="listByCompany.php-companyid=436.htm" tppabs="http://www.mmggxx.cn/listByCompany.php?companyid=436">tptoeaznubp</a>
</div>
<div class="adListItem">
<a href="listByCompany.php-companyid=435.htm" tppabs="http://www.mmggxx.cn/listByCompany.php?companyid=435">Michael Kors outlet 20215</a>
</div>
<div class="adListItem">
<a href="listByCompany.php-companyid=434.htm" tppabs="http://www.mmggxx.cn/listByCompany.php?companyid=434">北京启盈嘉业投资顾问有限公司</a>
</div>
<div class="adListItem">
<a href="listByCompany.php-companyid=432.htm" tppabs="http://www.mmggxx.cn/listByCompany.php?companyid=432">曹操</a>
</div>
<div class="adListItem">
<a href="listByCompany.php-companyid=430.htm" tppabs="http://www.mmggxx.cn/listByCompany.php?companyid=430">omrpadton</a>
</div>
<div class="adListItem">
<a href="listByCompany.php-companyid=426.htm" tppabs="http://www.mmggxx.cn/listByCompany.php?companyid=426">88952634</a>
</div>
<div class="adListItem">
<a href="listByCompany.php-companyid=424.htm" tppabs="http://www.mmggxx.cn/listByCompany.php?companyid=424">88952634</a>
</div>
<div class="adListItem">
<a href="listByCompany.php-companyid=422.htm" tppabs="http://www.mmggxx.cn/listByCompany.php?companyid=422">88952634</a>
</div>
<div class="adListItem">
<a href="listByCompany.php-companyid=420.htm" tppabs="http://www.mmggxx.cn/listByCompany.php?companyid=420">88952634</a>
</div>
<div class="adListItem">
<a href="listByCompany.php-companyid=419.htm" tppabs="http://www.mmggxx.cn/listByCompany.php?companyid=419">88952634</a>
</div>
			</div>
		
		</div>
		<!--名录和推广栏目-->
		<!-- 长条LOGO -->
		<!--<div class="longLogo3"> 
			标题
			<ul>
				<li>1</li>
<li>2</li>
<li>3</li>
			</ul> 
			<div class="longLogo_list3">
				<a href="javascript:if(confirm('http://www.taxicomeon.com/index1.php  \n\nكτݾϞרԃ Teleport Ultra Ђ՘, ӲΪ ̼ˇһٶԲܲ·޶΢ҿѻʨ׃Ϊ̼քǴʼַ֘քַ֘c  \n\nţЫ՚ؾϱǷʏղߪ̼?'))window.location='http://www.taxicomeon.com/index1.php'" tppabs="http://www.taxicomeon.com/index1.php"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/logo/07dongdongdache.jpg" tppabs="http://www.mmggxx.cn/logo/07dongdongdache.jpg"/></a>
<a href="javascript:if(confirm('http://www.mmggxx.cn/www.517dc.com  \n\nكτݾϞרԃ Teleport Ultra Ђ՘, ӲΪ ؾϱǷѨ٦كτݾδ֒սc  \n\nţЫ՚ؾϱǷʏղߪ̼?'))window.location='http://www.mmggxx.cn/www.517dc.com'" tppabs="http://www.mmggxx.cn/www.517dc.com"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/logo/08dingcanwang.jpg" tppabs="http://www.mmggxx.cn/logo/08dingcanwang.jpg"/></a>
<a href="javascript:if(confirm('http://www.966706.com/  \n\nكτݾϞרԃ Teleport Ultra Ђ՘, ӲΪ ̼ˇһٶԲܲ·޶΢ҿѻʨ׃Ϊ̼քǴʼַ֘քַ֘c  \n\nţЫ՚ؾϱǷʏղߪ̼?'))window.location='http://www.966706.com/'" tppabs="http://www.966706.com/"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/logo/09zuchewang.jpg" tppabs="http://www.mmggxx.cn/logo/09zuchewang.jpg"/></a>
			</div>
		</div>-->
		<!-- 长条LOGO -->
		<!--新闻和法律资讯栏目-->
		<div class="doubleList">
			<div class="newslist">
				<div class="newslist_title">
					<div class="lf_v4a"><h2><span class="style1">新闻资讯</span></h2></div>
					<div class="rh_v4a"><a href="<?php echo smarty_function_url(array('url' => '/news_law/list.php?type_id=1'), $this);?>
" class="style2">更多 >></a></div>
				</div>
				<div id="newsBox" class="newsBox">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "news_law/block/top_index.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

				</div>
			</div>
			<div class="law">
				<div class="law_title">
					<div class="lf_v4a"><h2><span class="style1">法律法规</span></h2></div>
					<div class="rh_v4a"><a href="<?php echo smarty_function_url(array('url' => '/news_law/list.php?type_id=2'), $this);?>
" class="style2" >更多 >></a></div>
				</div>
				<div id="newsBox" class="newsBox">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "news_law/block/top_index1.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</div>
			</div>
		</div>
		<!--新闻和法律资讯栏目-->
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "links/block/top_index.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>

	
	



<style type="text/css">
*{margin:0;padding:0;list-style-type:none;}
.fixediv{position:fixed;top:140px;z-index:9999;width:140px;height:216px;background:#ddd;}
.fixediv img{float:left;}
.fixediv a.close{display:block;height:30px;line-height:30px;background:#fff;font-size:14px;padding:0 10px;color:#5e5e5e;text-decoration:none;text-align:center;}
.leftadv{left:0px;}
.rightadv{right:0px;}
</style>

<div class="fixediv leftadv">
	<script language="JavaScript" src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/uploadfile/ads/6.js"></script>			
	<a class="close" href="javascript:void(0);">关闭广告</a>
</div>

<div class="fixediv rightadv">
	<script language="JavaScript" src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/uploadfile/ads/7.js"></script>			
	<a class="close" href="javascript:void(0);">关闭广告</a>
</div>

<div style="height:1200px;"></div>


<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){

	$(".fixediv a").click(function(){
		
		$(".fixediv").fadeOut(400);
		
	});
	
	$(".fixediv").floatadv();
	
});

jQuery.fn.floatadv = function(loaded) {
	var obj = this;
	body_height = parseInt($(window).height());
	block_height = parseInt(obj.height());
	
	top_position = parseInt((body_height/2) - (block_height/2) + $(window).scrollTop());
	if (body_height<block_height) { top_position = 0 + $(window).scrollTop(); };
	
	if(!loaded) {
		obj.css({'position': 'absolute'});
		obj.css({ 'top': top_position });
		$(window).bind('resize', function() { 
			obj.floatadv(!loaded);
		});
		$(window).bind('scroll', function() { 
			obj.floatadv(!loaded);
		});
	} else {
		obj.stop();
		obj.css({'position': 'absolute'});
		obj.animate({ 'top': top_position }, 400, 'linear');
	}
}
</script>



	