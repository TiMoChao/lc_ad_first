<?php /* Smarty version 2.6.20, created on 2015-06-04 15:05:27
         compiled from theme/title.html */ ?>

<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />

<title><?php echo $this->_tpl_vars['Title']; ?>
</title>
   

<link href="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/css/bmap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/css/zhuce2011.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/css/validation.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/css/uploadify.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/css/pagination.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/css/huwaiv3.css" tppabs="http://www.mmggxx.cn/css/huwaiv3.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/css/NewHeadFoot.css" tppabs="http://www.mmggxx.cn/css/NewHeadFoot.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/css/v4top2010.css" tppabs="http://www.mmggxx.cn/css/v4top2010.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/css/NewLinkFoot.css" tppabs="http://www.mmggxx.cn/css/NewLinkFoot.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/css/superfish.css" tppabs="http://www.mmggxx.cn/css/superfish.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/css/jquery.marquee.min.css" tppabs="http://www.mmggxx.cn/css/jquery.marquee.min.css" />
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/css/slider.css" tppabs="http://www.mmggxx.cn/css/slider.css" />



<script src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/js/slides.min.jquery.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/js/jquery.marquee.min.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/js/jquery.scrollBox.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/js/validation.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/js/jquery.uploadify-3.1.min.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/js/jquery.pagination.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/js/jquery.min.js" type="text/javascript"></script>



<style type="text/css">
.float_mx{width:130px; display:none; margin-right: 10px; background-color: #ffffff;}
</style>

<script type="text/javascript">
var t = n = 0, count;
var longLogo_t_1 = longLogo_n_1 = 0,longLogo_count1;
var longLogo_t_2 = longLogo_n_2 = 0,longLogo_count2;
var longLogo_t_3 = longLogo_n_3 = 0,longLogo_count3;
$(document).ready(function() {
	count=$("#banner_list a").length; 
	$("#banner_list a:not(:first-child)").hide(); 
	$("#banner_info").html($("#banner_list a:first-child").find("img").attr('alt')); 
	$("#banner_info").click(function(){window.open($("#banner_list a:first-child").attr('href'), "_blank")}); 
	$("#banner li").click(function() { 
		var i = $(this).text() - 1;//获取Li元素内的值，即1，2，3，4 
		n = i; 
		if (i >= count) return; 
		$("#banner_list a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000); 
		$(this).css({"background":"#be2424",'color':'#000'}).siblings().css({"background":"#6f4f67",'color':'#fff'}); 
	}); 
	t = setInterval("showAuto()", 4000); 
	$("#banner").hover(function(){clearInterval(t)}, function(){t = setInterval("showAuto()", 4000);}); 

	//第一条长幅广告
	longLogo_count1=$(".longLogo_list1 a").length;
	$(".longLogo_list1 a:not(:first-child)").hide(); 
	$(".longLogo1 li").click(function() { 
		var i = $(this).text() - 1;//获取Li元素内的值，即1，2，3，4 
		longLogo_n_1 = i; 
		if (i >= longLogo_count1) return; 
		$(".longLogo_list1 a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000); 
		$(this).css({"background":"#be2424",'color':'#000'}).siblings().css({"background":"#6f4f67",'color':'#fff'}); 
	}); 
	$(".longLogo1 li").css({"display":"none"});
	longLogo_t_1 = setInterval("longLogo1ShowAuto()", 4000); 
	$(".longLogo1").hover(function(){clearInterval(longLogo_t_1)}, function(){longLogo_t_1 = setInterval("longLogo1ShowAuto()", 4000);});

	//第二条长幅广告
	longLogo_count2=$(".longLogo_list2 a").length;
	$(".longLogo_list2 a:not(:first-child)").hide(); 
	$(".longLogo2 li").click(function() { 
		var i = $(this).text() - 1;//获取Li元素内的值，即1，2，3，4 
		longLogo_n_2 = i; 
		if (i >= longLogo_count2) return; 
		$(".longLogo_list2 a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000); 
		$(this).css({"background":"#be2424",'color':'#000'}).siblings().css({"background":"#6f4f67",'color':'#fff'}); 
	}); 
	$(".longLogo2 li").css({"display":"none"});
	longLogo_t_2 = setInterval("longLogo2ShowAuto()", 4000); 
	$(".longLogo2").hover(function(){clearInterval(longLogo_t_2)}, function(){longLogo_t_2 = setInterval("longLogo2ShowAuto()", 4000);}); 

	//第三条长幅广告
	longLogo_count3=$(".longLogo_list3 a").length;
	$(".longLogo_list3 a:not(:first-child)").hide(); 
	$(".longLogo3 li").click(function() { 
		var i = $(this).text() - 1;//获取Li元素内的值，即1，2，3，4 
		longLogo_n_3 = i; 
		if (i >= longLogo_count3) return; 
		$(".longLogo_list3 a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000); 
		$(this).css({"background":"#be2424",'color':'#000'}).siblings().css({"background":"#6f4f67",'color':'#fff'}); 
	}); 
	$(".longLogo3 li").css({"display":"none"});
	longLogo_t_3 = setInterval("longLogo3ShowAuto()", 4000); 
	$(".longLogo3").hover(function(){clearInterval(longLogo_t_3)}, function(){longLogo_t_3 = setInterval("longLogo3ShowAuto()", 4000);}); 

    $('.float_mx').scrollBox({
        speed: 0.1, //加速
        time: 16,   //移动速度
        top: 350,   //默认顶部
        align: 'right', //浮动位置，可选左、右
        mix: 0          //边距
    });

    $("#ranklist").myScroll({
		speed:40,
		rowHeight:20
	});
    
    $('#slides').slides({
		preload: true,
		preloadImage: '<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/loading.gif'/*tpa=http://www.mmggxx.cn/images/loading.gif*/,
		play: 3000,
		pause: 2500,
		pagination: true,
		generatePagination: true,
		hoverPause: true
    });
    
    $("#register").hover(
        function(){$("#regBtn").attr("src","<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/register_hover.png"/*tpa=http://www.mmggxx.cn/images/register_hover.png*/)},
        function(){$("#regBtn").attr("src","<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/register.png"/*tpa=http://www.mmggxx.cn/images/register.png*/)}
    );
    
    $("#login").hover(
        function(){$("#loginBtn").attr("src","<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/login_hover.png"/*tpa=http://www.mmggxx.cn/images/login_hover.png*/)},
        function(){$("#loginBtn").attr("src","<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/templates/1/ad_lc/images/login.png"/*tpa=http://www.mmggxx.cn/images/login.png*/)}
    );   
});

function showAuto(){ 
	n = n >=(count - 1) ? 0 : ++n; 
	$("#banner li").eq(n).trigger('click'); 
} 

function longLogo1ShowAuto(){ 
	longLogo_n_1 = longLogo_n_1 >=(longLogo_count1 - 1) ? 0 : ++longLogo_n_1; 
	$(".longLogo1 li").eq(longLogo_n_1).trigger('click'); 
} 

function longLogo2ShowAuto(){ 
	longLogo_n_2 = longLogo_n_2 >=(longLogo_count2 - 1) ? 0 : ++longLogo_n_2; 
	$(".longLogo2 li").eq(longLogo_n_2).trigger('click'); 
} 

function longLogo3ShowAuto(){ 
	longLogo_n_3 = longLogo_n_3 >=(longLogo_count3 - 1) ? 0 : ++longLogo_n_3; 
	$(".longLogo3 li").eq(longLogo_n_3).trigger('click'); 
} 

function goToReleasePageForAd(){
    if($("#userid").val() == ""){
        window.location.href='login.php.htm'/*tpa=http://www.mmggxx.cn/login.php*/;
    } else {
        if($("#usertype").val() != "0"){
            alert("您所在的用户组不能发布户外广告资源！");
        } else {
        	window.location.href='login.php.htm'/*tpa=http://www.mmggxx.cn/releaseForAd.php*/;
        }
    }
}

function goToReleasePageForComm(){
    if($("#userid").val() == ""){
        window.location.href='login.php.htm'/*tpa=http://www.mmggxx.cn/login.php*/;
    } else {
        if($("#usertype").val() != "1"){
            alert("您所在的用户组不能发布广告招标信息！");
        } else {
        	window.location.href='login.php.htm'/*tpa=http://www.mmggxx.cn/releaseForCom.php*/;
        }
    }
}
function closeFlow(){
    $(".float_mx").css("display","none");
}

</script>

<script src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/plug-in/commonJS/index.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['arrGWeb']['WEB_ROOT_pre']; ?>
/plug-in/commonJS/common.js" type="text/javascript"></script>
<link href="<?php echo $this->_tpl_vars['arrGWeb']['templats_root']; ?>
/css/style.css" rel="stylesheet" type="text/css" />

