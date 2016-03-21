<?php /* Smarty version 2.6.20, created on 2015-10-26 18:27:36
         compiled from theme/head.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'theme/head.html', 68, false),)), $this); ?>
<script src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
//var timeout         = 5000000000;
//var closetimer		= 0;
var ddmenuitem;

function jsddm_open(){
	ddmenuitem = $(this).find('ul').eq(0).css('visibility', 'visible');
}

function jsddm_close(){	
	if(ddmenuitem){
		ddmenuitem.css('visibility', 'hidden');
	}
}
//window.setTimeout(jsddm_close, timeout);
//function jsddm_timer()
//{	closetimer = window.setTimeout(jsddm_close, timeout);}

//function jsddm_canceltimer()
//{	if(closetimer)
//	{	window.clearTimeout(closetimer);
//		closetimer = null;}}

$(document).ready(function(){	
	$('#jsddm > li').bind('mouseover', jsddm_open);
	$('#jsddm > li').bind('mouseout',  jsddm_close);
});

document.onclick = jsddm_close;

</script>
<div class="vv2010_dh01a">
<div class="vv2010_lg"><a href="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
"  id="headv42_LogLink"><img src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/logo2.jpg" id="headv42_imgLogo" width="280" height="120"/></a></div>


<div class="vv2010_banner">

	<script language="JavaScript" src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/uploadfile/ads/1.js"></script>

</div>



<div class="vv2010_contact">
     <div class="navigation2">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "user/block/login_top.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div> 
    <div class="qq">
        <a target="_blank" href="javascript:if(confirm('http://wpa.qq.com/msgrd?v=1&uin='+<?php echo $this->_tpl_vars['arrGWeb']['QQ']; ?>
+'&site=qq&menu=yes'))window.location='http://wpa.qq.com/msgrd?v=1&uin='+<?php echo $this->_tpl_vars['arrGWeb']['QQ']; ?>
+'&site=qq&menu=yes'">
            <img border="0" src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/button_11.gif" alt="点击这里给我发消息" title="点击这里给我发消息" />
        </a>
        <a target="_blank" href="javascript:if(confirm('http://wpa.qq.com/msgrd?v=1&uin='+<?php echo $this->_tpl_vars['arrGWeb']['QQ']; ?>
+'&site=qq&menu=yes'))window.location='http://wpa.qq.com/msgrd?v=1&uin'+<?php echo $this->_tpl_vars['arrGWeb']['QQ']; ?>
+'&site=qq&menu=yes'">
      		<img border="0" src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/button_11.gif" alt="点击这里给我发消息" title="点击这里给我发消息" />
        </a>
    </div>
    <div class="contack_info">
        咨询电话：<?php echo $this->_tpl_vars['arrGWeb']['tel']; ?>
 <br />
        电子邮箱：<?php echo $this->_tpl_vars['arrGWeb']['MSN']; ?>
<br />
    </div>
</div>
</div>

<div class="menubar">
<div class="vv2010_dh02">
<ul id="jsddm">
<li><a href="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
" tppabs="http://www.mmggxx.cn/index.php" >首页</a></li>
<li><a href="<?php echo smarty_function_url(array('url' => '/tender_ad/list.php?type_id=1'), $this);?>
"" >广告招标</a></li>
<li><a href="<?php echo smarty_function_url(array('url' => '/car_ad/'), $this);?>
">车体广告</a>
	<ul>
		<li><a href="<?php echo smarty_function_url(array('url' => '/car_ad/list.php?type_id=1'), $this);?>
" >出租车广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/car_ad/list.php?type_id=2'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=1&adTypeId=3&areaId=">客运车广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/car_ad/list.php?type_id=3'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=1&adTypeId=4&areaId=">公交车广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/car_ad/list.php?type_id=4'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=1&adTypeId=5&areaId=">包车广告</a></li>
		
	</ul>
</li>
<li><a href="<?php echo smarty_function_url(array('url' => '/read_ad/'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=7" >阅报亭广告</a>
	<ul>
		<li><a href="<?php echo smarty_function_url(array('url' => '/read_ad/list.php?type_id=1'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=7&adTypeId=8&areaId=">浦东新区阅读报亭</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/read_ad/list.php?type_id=2'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=7&adTypeId=9&areaId=">长宁区阅读报亭</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/read_ad/list.php?type_id=3'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=7&adTypeId=10&areaId=">徐汇区阅读报亭</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/read_ad/list.php?type_id=4'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=7&adTypeId=11&areaId=">黄浦区阅读报亭</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/read_ad/list.php?type_id=5'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=7&adTypeId=12&areaId=">宝山区阅读报亭</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/read_ad/list.php?type_id=6'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=7&adTypeId=12&areaId=">静安区阅读报亭</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/read_ad/list.php?type_id=7'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=7&adTypeId=12&areaId=">杨浦区阅读报亭</a></li>
	</ul>
</li>
<li><a href="<?php echo smarty_function_url(array('url' => '/shelter_ad/'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=7" >候车亭广告</a>
	<ul>
		<li><a href="<?php echo smarty_function_url(array('url' => '/shelter_ad/list.php?type_id=1'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=7&adTypeId=8&areaId=">浦东新区候车亭</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/shelter_ad/list.php?type_id=2'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=7&adTypeId=9&areaId=">长宁区候车亭</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/shelter_ad/list.php?type_id=3'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=7&adTypeId=10&areaId=">徐汇区候车亭</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/shelter_ad/list.php?type_id=4'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=7&adTypeId=11&areaId=">黄浦区候车亭</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/shelter_ad/list.php?type_id=5'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=7&adTypeId=12&areaId=">宝山区候车亭</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/shelter_ad/list.php?type_id=6'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=7&adTypeId=12&areaId=">静安区候车亭</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/shelter_ad/list.php?type_id=7'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=7&adTypeId=12&areaId=">杨浦区候车亭</a></li>
	</ul>
</li>
<li><a href="<?php echo smarty_function_url(array('url' => '/outdoor_ad/'), $this);?>
" >户外广告</a>
	<ul>
		<li><a href="<?php echo smarty_function_url(array('url' => '/outdoor_ad/list.php?type_id=1'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=19&adTypeId=20&areaId=">街灯广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/outdoor_ad/list.php?type_id=2'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=19&adTypeId=21&areaId=">墙体广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/outdoor_ad/list.php?type_id=3'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=19&adTypeId=22&areaId=">路牌广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/outdoor_ad/list.php?type_id=4'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=19&adTypeId=23&areaId=">高速广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/outdoor_ad/list.php?type_id=5'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=19&adTypeId=24&areaId=">立柱广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/outdoor_ad/list.php?type_id=6'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=19&adTypeId=25&areaId=">马路护栏广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/outdoor_ad/list.php?type_id=7'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=19&adTypeId=26&areaId=">绿化带广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/outdoor_ad/list.php?type_id=8'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=19&adTypeId=27&areaId=">人行天桥广告</a></li>
	</ul>
</li>
<li><a href="<?php echo smarty_function_url(array('url' => '/Community_ad/'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=28" >小区广告</a>
	<ul>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Community_ad/list.php?type_id=1'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=28&adTypeId=29&areaId=">电梯广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Community_ad/list.php?type_id=2'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=28&adTypeId=30&areaId=">大堂广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Community_ad/list.php?type_id=3'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=28&adTypeId=32&areaId=">小区灭蚊灯广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Community_ad/list.php?type_id=4'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=28&adTypeId=33&areaId=">小区温馨提示广告</a></li>
	</ul>
</li>
<li><a href="<?php echo smarty_function_url(array('url' => '/plane_ad/'), $this);?>
">平面广告</a>
	<ul>
		<li><a href="<?php echo smarty_function_url(array('url' => '/plane_ad/list.php?type_id=1'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=34&adTypeId=35&areaId=">广告单张印刷</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/plane_ad/list.php?type_id=2'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=34&adTypeId=36&areaId=">名片印刷</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/plane_ad/list.php?type_id=3'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=34&adTypeId=37&areaId=">彩册印刷</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/plane_ad/list.php?type_id=4'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=34&adTypeId=38&areaId=">包装制作</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/plane_ad/list.php?type_id=5'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=34&adTypeId=39&areaId=">折页制作</a></li>
	</ul>
</li>
<li><a href="<?php echo smarty_function_url(array('url' => '/Personality_customization/'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=40" >个性定制</a>
	<ul>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Personality_customization/list.php?type_id=1'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=40&adTypeId=70&areaId=">印刷包装</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Personality_customization/list.php?type_id=2'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=40&adTypeId=71&areaId=">礼品定制</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Personality_customization/list.php?type_id=3'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=40&adTypeId=72&areaId=">车标车贴</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Personality_customization/list.php?type_id=4'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=40&adTypeId=73&areaId=">宣传袋</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Personality_customization/list.php?type_id=5'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=40&adTypeId=74&areaId=">卡片</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Personality_customization/list.php?type_id=6'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=40&adTypeId=75&areaId=">标识制作</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Personality_customization/list.php?type_id=7'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=40&adTypeId=76&areaId=">广告物料</a></li>
	</ul>
</li>
<li><a href="<?php echo smarty_function_url(array('url' => '/multimedia_ad/'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=44" >多媒体</a>
	<ul>
		<li><a href="<?php echo smarty_function_url(array('url' => '/multimedia_ad/list.php?type_id=1'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=44&adTypeId=45&areaId=">户外短片广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/multimedia_ad/list.php?type_id=2'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=44&adTypeId=46&areaId=">有线电视插播广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/multimedia_ad/list.php?type_id=3'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=44&adTypeId=47&areaId=">短信群发广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/multimedia_ad/list.php?type_id=4'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=44&adTypeId=48&areaId=">彩信群发广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/multimedia_ad/list.php?type_id=5'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=44&adTypeId=49&areaId=">楼宇短片广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/multimedia_ad/list.php?type_id=6'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=44&adTypeId=50&areaId=">网站页面广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/multimedia_ad/list.php?type_id=7'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=44&adTypeId=51&areaId=">电视广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/multimedia_ad/list.php?type_id=8'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=44&adTypeId=52&areaId=">广播广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/multimedia_ad/list.php?type_id=9'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=44&adTypeId=53&areaId=">光盘广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/multimedia_ad/list.php?type_id=10'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=44&adTypeId=69&areaId=">数字电视广告</a></li>
	</ul>
</li>
<li><a href="<?php echo smarty_function_url(array('url' => '/Newspapers_magazines/'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=54" >报纸杂志</a>
	<ul>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Newspapers_magazines/list.php?type_id=1'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=54&adTypeId=41&areaId=">信函广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Newspapers_magazines/list.php?type_id=2'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=54&adTypeId=42&areaId=">夹报广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Newspapers_magazines/list.php?type_id=3'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=54&adTypeId=43&areaId=">明信片广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Newspapers_magazines/list.php?type_id=4'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=54&adTypeId=55&areaId=">报刊广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Newspapers_magazines/list.php?type_id=5'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=54&adTypeId=56&areaId=">DM报纸广告</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Newspapers_magazines/list.php?type_id=6'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=54&adTypeId=57&areaId=">杂志广告</a></li>
	</ul>
</li>
<li><a href="<?php echo smarty_function_url(array('url' => '/Planning_production/'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=58" >策划制作</a>
	<ul>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Planning_production/list.php?type_id=1'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=58&adTypeId=59&areaId=">展会策划承办</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Planning_production/list.php?type_id=2'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=58&adTypeId=60&areaId=">会议承办</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Planning_production/list.php?type_id=3'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=58&adTypeId=61&areaId=">产品发布</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Planning_production/list.php?type_id=4'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=58&adTypeId=62&areaId=">活动策划</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Planning_production/list.php?type_id=5'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=58&adTypeId=63&areaId=">招牌制作</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Planning_production/list.php?type_id=6'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=58&adTypeId=64&areaId=">霓虹灯制作</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Planning_production/list.php?type_id=7'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=58&adTypeId=65&areaId=">喷画制作</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Planning_production/list.php?type_id=8'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=58&adTypeId=66&areaId=">背胶制作</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Planning_production/list.php?type_id=9'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=58&adTypeId=67&areaId=">礼品、纪念品制作</a></li>
		<li><a href="<?php echo smarty_function_url(array('url' => '/Planning_production/list.php?type_id=10'), $this);?>
" tppabs="http://www.mmggxx.cn/list.php?id=58&adTypeId=68&areaId=">装饰设计</a></li>
	</ul>
</li>
</ul>
</div></div>