function checkForm(frm)
{
	if(typeof(frm.user_id) != "undefined"){
		if(frm.user_id.value == "")
		{
			alert('会员ID不能为空！');
			frm.user_id.focus();
			return false;
		}
	}
	if(typeof(frm.nick_name) != "undefined"){
		if(frm.nick_name.value == "")
		{
			alert('昵称不能为空！');
			frm.nick_name.focus();
			return false;
		}
	}
	if(typeof(frm.real_name) != "undefined"){
		if(frm.real_name.value == "")
		{
			alert('真实姓名不能为空！');
			frm.real_name.focus();
			return false;
		}
	}
	
	if(typeof(frm.sex) != "undefined"){
		if(frm.sex.value == "0")
		{
			alert('性别必须选择！');
			frm.sex.focus();
			return false;
		}
	}
	if(typeof(frm.province) != "undefined"){
		if(frm.province.value == '省份')
		{
			alert('所在地必须选择！');
			frm.province.focus();
			return false;
		}
	}
	if(typeof(frm.birthday) != "undefined"){
		if(frm.birthday.value == "0")
		{
			alert('出生年必须选择！');
			frm.birthday.focus();
			return false;
		}
	}
	if(typeof(frm.type_id) != "undefined"){
		if(frm.type_id.value == 0)
		{
			alert('所属类型必须选择！如未建立，请先到分类栏目建立分类！');
			frm.type_id.focus();
			return false;
		}
	}
	if(typeof(frm.longtitle) != "undefined"){
		if(frm.longtitle.value == "")
		{
			alert('标题不能为空！');
			frm.longtitle.focus();
			return false;
		}
	}
	if(typeof(frm.title) != "undefined"){
		if(frm.title.value == "")
		{
			alert('标题不能为空！');
			frm.title.focus();
			return false;
		}
	}
    if(typeof(frm.uselink) != "undefined"){
		if(frm.uselink.checked == true && frm.linkurl.value == "" )
		{
			alert('转向地址不能为空！');
			frm.linkurl.focus();
			return false;
		}
	}
	if(typeof(frm.intro) != "undefined"){
		if(frm.intro.checked == false && eWebEditor1.getHTML() == "" )
		{
			alert('内容不能为空！');
			return false;
		}
	}
    return true
    
}

function checkRegForm(){
	var frm = document.reginform;
	if(frm.user_name.value == ""){
		alert('用户名不能为空！');
		frm.user_name.focus();
		return false;
	}
	if(frm.password.value == ""){
		alert('密码不能为空！');
		frm.password.focus();
		return false;
	}
	if(frm.password_c.value !=frm.password.value){
		alert('两次输入的密码不一样！');
		frm.password_c.focus();
		return false;
	}
	if(frm.real_name.value == ""){
		alert('用户姓名不能为空！');
		frm.real_name.focus();
		return false;
	}
	if(frm.user_phone.value == ""){
		alert('联系电话不能为空！');
		frm.user_phone.focus();
		return false;
	}
	
	frm.submit();
}
function checkPassForm(frm){
	if(frm.oldpassword.value == ""){
		alert('原密码不能为空！');
		frm.oldpassword.focus();
		return false;
	}
	if(frm.password.value == ""){
		alert('新密码不能为空！');
		frm.password.focus();
		return false;
	}
	if(frm.password.value != frm.password2.value){
		alert('两次输入的密码不一样！');
		frm.password.focus();
		return false;
	}
	frm.submit();
}

function checkCardsForm(frm){
	if(frm.Filedata.value == ""){
		alert('证件不能为空');
		frm.Filedata.focus();
		return false;
	}
	frm.submit();
}

function doCheckAll(obj){
	var form = obj.form;
	for (var i=0;i<form.elements.length;i++){
		var e = form.elements[i];
		e.checked = obj.checked;
	}
}
function doAction(obj){
	var form = obj.form;
	var objCheckID = eval("form.checkid");
	if (!objCheckID){
		return;
	}
	var objCheckAction = eval("form.checkaction");
	if (!isChecked(objCheckID)){
		alert("请至少选择一条要操作的记录！");
		return;
	}
	if (!confirm("确定要执行此操作吗？")){
		return;
	}
	form.action=form.action+objCheckAction.options[objCheckAction.selectedIndex].value;
	form.submit();
}

function checkAction(sAction)
{
	var frm = document.delform;
	var boolFind = false ;
	for(i=0;i< frm.length;i++)  
	{ 
		e = frm.elements[i]; 
		if ( e.type=='checkbox') 
		{
			if(e.checked)
			{
				boolFind = true;
				break;
			}
			else
			{
				boolFind = false ;
			}			
		}			
	} 
	if(boolFind)
	{
		boolFind = confirm('您确定要操作吗？');
	}
	else
	{
		alert('请选择至少一条记录再操作！');
		boolFind = false;
	}
	if (boolFind == true)
	{
		frm.action = frm.action + sAction
		frm.submit()
	}
}

function   ContextMenu(){event.returnValue=false;}//屏蔽鼠标右键   
function   Help(){return   false}   //屏蔽F1帮助   
function   KeyDown(){   
  if((window.event.altKey)&&
	((window.event.keyCode==37)||       //屏蔽   Alt+   方向键   ←   
	(window.event.keyCode==39)))       //屏蔽   Alt+   方向键   →   
  {   
	alert("不准你使用ALT+方向键前进或后退网页！");   
	event.returnValue=false;   
  }   
	/*   注：这还不是真正地屏蔽   Alt+   方向键，   
	因为   Alt+   方向键弹出警告框时，按住   Alt   键不放，   
	用鼠标点掉警告框，这种屏蔽方法就失效了。以后若   
	有哪位高手有真正屏蔽   Alt   键的方法，请告知。*/   

  if   ((event.keyCode==8)     ||                                   //屏蔽退格删除键   
		  (event.keyCode==116)||                                   //屏蔽   F5   刷新键   
		  (event.ctrlKey   &&   event.keyCode==82)){   //Ctrl   +   R   
		event.keyCode=0;   
		event.returnValue=false;   
		}   
  if   (event.keyCode==122){event.keyCode=0;event.returnValue=false;}     //屏蔽F11   
  if   (event.ctrlKey   &&   event.keyCode==78)   event.returnValue=false;       //屏蔽   Ctrl+n   
  if   (event.shiftKey   &&   event.keyCode==121)event.returnValue=false;     //屏蔽   shift+F10   
  if   (window.event.srcElement.tagName   ==   "A"   &&   window.event.shiftKey)     
		  window.event.returnValue   =   false;                           //屏蔽   shift   加鼠标左键新开一网页   
  if   ((window.event.altKey)&&(window.event.keyCode==115))                           //屏蔽Alt+F4   
  {   
		  window.showModelessDialog("about:blank","","dialogWidth:1px;dialogheight:1px");   
		  return   false;   
  }   
}
//document.onkeydown = KeyDown;
//window.onhelp = Help;
//document.oncontextmenu = ContextMenu;


function openwin(page,size){
	window.open(page,"newuser","toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,"+ size);
} 

//无级缩放图片大小
function bbimg(o)
{
  var zoom=parseInt(o.style.zoom, 10)||100;
  zoom+=event.wheelDelta/12;
  if (zoom>0) o.style.zoom=zoom+'%';
  return false;
}
//双击鼠标滚动屏幕的代码
var currentpos,timer;
function initialize()
{
timer=setInterval ("scrollwindow ()",30);
}
function sc()
{
clearInterval(timer);
}
function scrollwindow()
{
currentpos=document.documentElement.scrollTop;
window.scroll(0,++currentpos);
if (currentpos !=document.documentElement.scrollTop)
sc();
}
document.onmousedown=sc
document.ondblclick=initialize

//更改字体大小
var status0='';
var curfontsize=12;
var curlineheight=18;
function fontZoomA(){
  if(curfontsize>8){
    document.getElementById('fontzoom').style.fontSize=(--curfontsize)+'px';
	document.getElementById('fontzoom').style.lineHeight=(--curlineheight)+'px';
  }
}
function fontZoomB(){
  if(curfontsize<64){
    document.getElementById('fontzoom').style.fontSize=(++curfontsize)+'px';
	document.getElementById('fontzoom').style.lineHeight=(++curlineheight)+'px';
  }
}


function find_pwd(){
	try{
	var aa=window.open('/user/find_pwd.php','findpwd','height=212, width=450, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=no, status=no');
	aa.focus();
	}catch(e){}
}

function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
// -->
<!--
function MM_findObj(n, d) { //v4.0
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && document.getElementById) x=document.getElementById(n); return x;
}

function MM_showHideLayers() { //v3.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v='hide')?'hidden':v; }
    obj.visibility=v; }
}

//document.documentElement.oncut=function(){return false;};
//document.documentElement.onselectstart=function(){return false;};
//var printBody=document.getElementById("printBody");
//if (printBody!=undefined){
  //printBody.oncopy=function(){return false;};
//}


//忽略所有错误，没有黄叹号...
function killErrors() { 
 return true; 
}
window.onerror = killErrors;
window.onerror=true;

function isEmail(strEmail) {
	if (strEmail.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1) return true;
	else alert("邮箱输入非法！请重新输入！");
}

var selecttimes;
var pid1;
var pid2;
function compare(cbox){
	if(cbox.checked==false){
		if(selecttimes!=0) selecttimes=selecttimes-1;
        if(pid2!=0) pid2=0;
        else pid1=0;
	}else{
		if(typeof(selecttimes) == "undefined") selecttimes=1;
		else selecttimes=selecttimes+1;
		if(typeof(pid1) == "undefined") pid1=cbox.value;
		else{
			if(pid1==0) pid1=cbox.value;
			else pid2=cbox.value;
		}
    }
	if(selecttimes==2){
		window.open('../../product/compare.php?pid1='+pid1+'&pid2='+pid2);
		selecttimes=selecttimes-1;
		cbox.checked=false;
		pid2=0;
	}
	if(selecttimes==3){
		alert("只能选择两种产品进行比较！");
		selecttimes=selecttimes-1;
		return (cbox.checked=false);
	}
}

//option项添加disabled的ie6禁用
function optionDisabled(){
    if (document.getElementsByTagName){
        var s = document.getElementsByTagName("select");
        if (s.length > 0){
            window.select_current = new Array();
            for (var i=0, select; select = s[i]; i++){
				if(select.onfocus == null){
					select.onfocus = function(){
						window.select_current[this.id] = this.selectedIndex;
					}
				}
				if(select.onchange == null){
					select.onchange = function(){
						restore(this);
					}
				}
                emulate(select);
            }
        }
    }
}

function AddFavorite(sURL, sTitle){
    try{
        window.external.addFavorite(sURL, sTitle);
    }catch (e){
        try{
            window.sidebar.addPanel(sTitle, sURL, "");
        }catch (e){
            alert("加入收藏失败，请使用Ctrl+D进行添加");
        }
    }
}

function SetHome(obj,vrl){
	try{
		obj.style.behavior='url(#default#homepage)';obj.setHomePage(vrl);
	}catch(e){
		if(window.netscape) {
			try{
				netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
			}catch(e){
				alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。");
			}
			var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
			prefs.setCharPref('browser.startup.homepage',vrl);
		 }
	}
}

//单个图片最大缩略限制
function resizepic(thispic,width,height,scale){
	if(typeof(scale) != "undefined" && scale){
		//固定比例scale=true
		if(typeof(width) != "undefined" && width>0){
			if(thispic.width>width) thispic.width=width;
		}
		if(typeof(height) != "undefined" && height>0){
			if(thispic.height>height) thispic.height=height;
		}
	}else{
		//等比缩放scale为空
		if(thispic.width>thispic.height){
			if(typeof(width) != "undefined" && width>0){
				if(thispic.width>width) thispic.width=width;
			}
		}else{
			if(typeof(height) != "undefined" && height>0){
				if(thispic.height>height) thispic.height=height;
			}else{
				if(typeof(width) != "undefined" && width>0){
					if(thispic.width>width) thispic.width=width;
				}
			}
		}
	}
}

//批量图片最大缩略限制
function resizepics(thispic,width,height,scale){
	if(typeof(rpicn) != "undefined") thispic = rpicn;
	if(typeof(rpicw) != "undefined") width = rpicw;
	if(typeof(rpich) != "undefined") height = rpich;
	if(typeof(rpics) != "undefined") scale = rpics;

	for(i=0;i<thispic.length;i++){
		resizepic(thispic[i],width,height,scale);
	}
}

function restore(e){
    if (e.options[e.selectedIndex].disabled){
        e.selectedIndex = window.select_current[e.id];
    }
}

function emulate(e){
    for (var i=0, option; option = e.options[i]; i++){
        if (option.disabled){
            option.style.color = "graytext";
        }else{
            option.style.color = "menutext";
        }
    }
}

function AttachEvent(element, event, func) {
	if (element.addEventListener) {
		element.addEventListener(event.toLowerCase(), func, false);
	}else {
		element.attachEvent('on' + event.toLowerCase(), func);
	}
}

function DetachEvent(element, event, func) {
	if (element.removeEventListener) {
		element.removeEventListener(event.toLowerCase(), func, false);
	}else {
		element.detachEvent('on' + event.toLowerCase(), func);
	}
}
//等比缩放图片
function resizeImage(ImgObj,max_width,max_height){if(!max_width)max_width=100;if(!max_height)max_height=max_width;size_scale=max_width/max_height;if(!ImgObj)return setTimeout(function(){resizeImage(ImgObj)},200);var buffer_image=new Image();buffer_image.src=ImgObj.src;if(buffer_image.width<1||buffer_image.height<1)return;if(buffer_image.width/buffer_image.height>size_scale){if(buffer_image.width>max_width){ImgObj.width=max_width;ImgObj.height=(buffer_image.height*max_width)/buffer_image.width;}}else{if(buffer_image.height>max_height){ImgObj.height=max_height;ImgObj.width=(buffer_image.width*max_height)/buffer_image.height;}}}
function test(){
	alert();
}
//AttachEvent(window, 'load', KeyDown);
AttachEvent(window, 'load', optionDisabled);