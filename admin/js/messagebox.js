var reflash = false;
function GetCookies(name){var arr = document.cookie.match(new RegExp(name+"=([^&;]+)"));if(arr != null){return decodeURI(arr[1]);}return "";}
function hideSelect(){	var sel = document.getElementsByTagName("select");	for(var i=0;i<sel.length;i++){	sel[i].style.display="none";}}
function showSelect(){	var sel = document.getElementsByTagName("select");	for(var i=0;i<sel.length;i++){	sel[i].style.display="";}}

document.writeln('<style type="text/css">body{  font-family:Arial;}#blackbg{position:fixed;_position:absolute;}');
document.writeln('#blackcontentOuter{zoom:1; position:fixed!important;position:absolute;left:50%;top:50%;_top:expression((document.documentElement.scrollTop || document.body.scrollTop) + Math.round(50 * (document.documentElement.offsetHeight || document.body.clientHeight) / 100));}</style>');

function getDivHeight(){var a = document.body.scrollHeight;var b = window.screen.height;return a>b?a:b;}var newdiv = document.createElement("div");var sdiv = document.createElement("div");var contentdiv = document.createElement("div");var Globle_width=0,Globle_height=0,Globle_src='',Globle_title='',Globle_Str='';
function setbg(boxtitle,pwidth,pheight,psrc){hideSelect();if(GetCookies("UserID")=="") reflash =true;InitDivData();Globle_title = boxtitle;Globle_width = pwidth;Globle_height= pheight;Globle_src = psrc;Globle_Str = '<div style="position:relative;top:-27px;height:26px; line-height:26px; color:#000;background:url(images/msgboxbar.gif) repeat-x 0 0;padding-left:12px;"><a style="float:right;color:#000;padding-right:8px;" href="javascript:closeopendiv()">[关闭窗口]</a><strong>'+Globle_title+'</strong></div><iframe scrolling="no"  src="'+Globle_src+'" frameborder="0" height="'+Globle_height+'" width="'+Globle_width+'"></iframe><div></div>';scrooleffect();}

function ShowMsg(Msg){InitDivData();Globle_title = "BIWEB消息提示";Globle_width = 400;Globle_height= 200;Globle_Str = '<div style="position:relative;top:-24px;border-bottom:1px solid #666; height:24px; line-height:24px; color:#fff;"><a style="float:right;color:#ccc;" href="javascript:closeopendiv()">关闭</a>'+Globle_title+'</div><div style="text-align:center;line-height:300%; color:#03FA13;">'+Msg+'</div>';scrooleffect();}var sctimer;var tempwidth =0,tempheight =0,temppate=1,speedrate=24;

function InitDivData(){newdiv.id="blackbg";newdiv.style.display = "none";newdiv.style.zIndex='99990';newdiv.style.backgroundColor="#000000";newdiv.style.filter="alpha(opacity=80)"; newdiv.style.opacity=0.8; newdiv.style.display = "block";newdiv.style.top = "0px";newdiv.style.left = "0px";newdiv.style.width="100%";newdiv.style.height= getDivHeight() +"px";contentdiv.id="blackcontentOuter";contentdiv.style.display = "none";contentdiv.style.zIndex='99991';contentdiv.style.width='10px';contentdiv.style.height='10px';contentdiv.style.margin='-5px 0px 0px -5px';contentdiv.style.backgroundColor="#fff";document.body.appendChild(newdiv);document.body.appendChild(contentdiv);}

function scrooldiv()
{
	 tempwidth = Globle_width; tempheight = Globle_height; 
	 contentdiv.innerHTML = '<div style="position:relative;top:-24px;border-bottom:1px solid #666; height:24px; line-height:24px; color:#fff;"><a style="float:right;color:#ccc;" href="javascript:closeopendiv()">关闭</a>'+Globle_title+'</div><iframe scrolling="no"  src="'+Globle_src+'" frameborder="0" height="'+Globle_height+'" width="'+Globle_width+'"></iframe><div></div>';contentdiv.innerHTML = Globle_Str;
	contentdiv.style.width= tempwidth + "px";
	contentdiv.style.height= tempheight + "px";
	contentdiv.style.margin = "-"+tempheight/2+"px 0px 0px -"+tempwidth/2+"px";
}

function scrooleffect(){contentdiv.style.display = "block";scrooldiv();}

function closeopendiv(){showSelect();if(reflash==true && GetCookies("UserID")!=""){   window.location.reload();}else{contentdiv.style.width='10px';contentdiv.style.height='10px';contentdiv.innerHTML ="";Globle_width=0,Globle_height=0,Globle_src='',Globle_title='',Globle_Str='';tempwidth =0,tempheight =0,temppate=1,contentdiv.style.display = "none";newdiv.style.display = "none";}}

function closeopendiv2(){showSelect();reflash==true ;contentdiv.style.width='10px';contentdiv.style.height='10px';contentdiv.innerHTML ="";Globle_width=0,Globle_height=0,Globle_src='',Globle_title='',Globle_Str='';tempwidth =0,tempheight =0,temppate=1,contentdiv.style.display = "none";newdiv.style.display = "none";}


function setbg2(boxtitle,pwidth,pheight,psrc){ reflash == true; InitDivData();Globle_title = boxtitle;Globle_width = pwidth;Globle_height= pheight;Globle_src = psrc;Globle_Str = '<div style="position:relative;top:-27px;height:26px; line-height:26px; color:#000;background:url(../mypub/box/images/msgboxbar.gif) repeat-x 0 0;padding-left:12px;"><a style="float:right;color:#000;padding-right:8px;" href="javascript:closeopendiv2()">[关闭窗口]</a><strong>'+Globle_title+'</strong></div><iframe scrolling="no"  src="'+Globle_src+'" frameborder="0" height="'+Globle_height+'" width="'+Globle_width+'"></iframe><div></div>';scrooleffect();}