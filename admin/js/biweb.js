//双击效果。<body  onDblClick="Submit_onDoubleclick()">
function Submit_onDoubleclick(){
	try{
		if(window.parent.document.getElementsByName("biweb")[0].cols=="165,*"){
			window.parent.document.getElementsByName("biweb")[0].cols="0,*";
		} else {
			window.parent.document.getElementsByName("biweb")[0].cols="165,*"
		}
	}catch (e){}
} 

function UseLinkUrl(){
    if (document.form1.uselink.checked == true){
    		document.form1.linkurl.disabled = false;
        ArticleContent.style.display = 'none';
    }
    else{
        document.form1.linkurl.disabled = true;
        ArticleContent.style.display = '';
    }
}
function showSkinImg(value){
	if(value!= '') {
		document.images.img.src = '../../templates/'+value+'/skin/skin.png';
	}
}
function checkForm(varForm)
{
    //var varForm = document.form1;

	if(typeof(varForm.real_name) != "undefined"){
		if(varForm.real_name.value == "")
		{
			alert('会员姓名不能为空！');
			varForm.real_name.focus();
			return false;
		}
	}
	
	if(typeof(varForm.sex) != "undefined"){
		if(varForm.sex.value === "")
		{
			alert('性别必须选择！');
			varForm.sex.focus();
			return false;
		}
	}
	if(typeof(varForm.province) != "undefined"){
		if(varForm.province.value == '省份')
		{
			alert('所在地必须选择！');
			varForm.province.focus();
			return false;
		}
	}
	if(typeof(varForm.birthday) != "undefined"){
		if(varForm.birthday.value == "0")
		{
			alert('出生年必须选择！');
			varForm.birthday.focus();
			return false;
		}
	}
	if(typeof(varForm.type_id) != "undefined"){
		if(varForm.type_id.value == 0)
		{
			alert('所属类型必须选择！如未建立，请先到分类栏目建立分类！');
			varForm.type_id.focus();
			return false;
		}
	}
	if(typeof(varForm.longtitle) != "undefined"){
		if(varForm.longtitle.value == "")
		{
			alert('标题不能为空！');
			varForm.longtitle.focus();
			return false;
		}
	}
	if(typeof(varForm.title) != "undefined"){
		if(varForm.title.value == "")
		{
			alert('标题不能为空！');
			varForm.title.focus();
			return false;
		}
	}
    if(typeof(varForm.uselink) != "undefined"){
		if(varForm.uselink.checked == true && (varForm.linkurl.value == "" || varForm.linkurl.value == "http://") )
		{
			alert('转向地址不能为空！');
			varForm.linkurl.focus();
			return false;
		}
	}
	if(typeof(varForm.intro) != "undefined"){
		if(varForm.uselink.checked == false)
		{

			if(typeof(eWebEditor1) != "undefined" && eWebEditor1.getHTML() == "" ){
				alert('内容不能为空！');
				return false;
			}else{
				if(typeof(FCKeditorAPI) != "undefined"){
					if(GetMessageLength('intro') == 0){
						alert('内容不能为空！');
						return false;
					}
				}else if(varForm.intro.value == ""){
					alert('内容不能为空！');
					return false;
				}
			}			
		}
	}

    return true
    
}

//fck内容的长度检查
function GetMessageLength(str)
{
    var oEditor = FCKeditorAPI.GetInstance(str) ;
    var oDOM = oEditor.EditorDocument ;
    var iLength ;

    if ( document.all )        // If Internet Explorer.
    {
        iLength = oDOM.body.innerText.length ;
    }
    else                    // If Gecko.
    {
        var r = oDOM.createRange() ;
        r.selectNodeContents( oDOM.body ) ;
        iLength = r.toString().length ;
    }
	//oEditor.InsertHtml('')
	return iLength;
}    

//显示指定的js对象的所有属性和值，obj是对象，objid是名称
function showprop(obj,objid){
	var str = '';
	if (typeof(obj) == "undefined"){
		obj = eval(objid);
	}
	for(x in obj){
		if (x==0){
			alert('null   object');
			break;
		}else{
			str += objid+"[\""+x+"\"]="+obj[x]+"<br />\n";
		} //</else>
	}//for结束
	return str;
} 

function doChange(objText, objDrop)
{
    if (!objDrop) return;
    var str = objText.value;
    var arr = str.split("|");
    var nIndex = objDrop.selectedIndex;
    objDrop.length=1;
    for (var i=0; i<arr.length; i++){
        objDrop.options[objDrop.length] = new Option(arr[i], arr[i]);
    }
    objDrop.selectedIndex = nIndex;
}
function SelectPicChange()
{
    document.form1.d_picurl.value = document.form1.d_picture.options[document.form1.d_picture.selectedIndex].value;
}
function checkspace(checkstr) {
	var str = '';
	for(i = 0; i < checkstr.length; i++) {
		str = str + ' ';
	}
	return (str == checkstr);
}
function checks()
{
	if(checkspace(document.renpassword.password.value)) {
		document.renpassword.password.focus();
		alert("原密码不能为空！");
		return false;
	}
	if(checkspace(document.renpassword.password1.value)) {
		document.renpassword.password1.focus();
		alert("新密码不能为空！");
		return false;
	}
    if(checkspace(document.renpassword.password2.value)) {
		document.renpassword.password2.focus();
		alert("确认密码不能为空！");
		return false;
	}
    if(document.renpassword.password1.value != document.renpassword.password2.value) {
		document.renpassword.password1.focus();
		document.renpassword.password1.value = '';
		document.renpassword.password2.value = '';
		alert("新密码和确认密码不相同，请重新输入");
		return false;
	}
	document.renpassword.submit();
}
function checkRelative(str)
{
	if(str == "1")
	{
		//相关文章关联
		document.all("d_keyword").value = "";
		document.all("d_keyword").disabled = document.all("d_relativeflag").checked;
	}
	if(str == "2")
	{
		//相关文章关联
		document.all("d_metakeyword").value = "";
		document.all("d_metakeyword").disabled = document.all("d_metarelativeflag").checked;
	}
}
//登陆检测
function checkLoginForm()
{
	var frm = document.loginform
	if(frm.usercode.value == "")
	{
		alert('用户名不允许为空');
		frm.usercode.focus();
		return false;
	}
	if(frm.password.value == "")
	{
		alert('用户密码不允许为空');
		frm.password.focus();
		return false;
	}
	if(frm.authCode.value == "")
	{
		alert('验证码不允许为空');
		frm.authCode.focus();
		return false;
	}
	frm.submit()
	return true;
}
function BaseTrim(str){
	  lIdx=0;rIdx=str.length;
	  if (BaseTrim.arguments.length==2)
	    act=BaseTrim.arguments[1].toLowerCase()
	  else
	    act="all"
      for(var i=0;i<str.length;i++){
	  	thelStr=str.substring(lIdx,lIdx+1)
		therStr=str.substring(rIdx,rIdx-1)
        if ((act=="all" || act=="left") && thelStr==" "){
			lIdx++
        }
        if ((act=="all" || act=="right") && therStr==" "){
			rIdx--
        }
      }
	  str=str.slice(lIdx,rIdx)
      return str
}

function BaseAlert(theText,notice){
	alert(notice);
	theText.focus();
	theText.select();
	return false;
}

function ChkText(srcText,length,str,bNotNull){
	srcText.value = BaseTrim(srcText.value);
	if (bNotNull==true){
		if ((srcText.value=="") || (BASEreal_len(srcText)>length )){
			BaseAlert(srcText,str);
			return false;
		}
	}else{
		if (BASEreal_len(srcText)>length ){
			BaseAlert(srcText,str);
			return false;
		}
	}
	return true;
}

function BASEreal_len(theText){ 
	  var real_len=0;
	  text_val=theText.value;
	  text_len=theText.value.length;
	  for(i=0;i<text_len;i++){
	    if (text_val.charCodeAt(i)>127){
		  real_len=real_len+2;
		}
	    else{
		  real_len++;
		}
  	  }
	  return(real_len);
}

function BASEisNotInt(theInt){
	theInt=BaseTrim(theInt)
	if ((theInt.length>1 && theInt.substring(0,1)=="0") || BASEisNotNum(theInt)){
		return true
	}
	return false
}

function BASEisNotNum(theNum){
	if (BaseTrim(theNum)=="")
		return true
	for(var i=0;i<theNum.length;i++){
	    oneNum=theNum.substring(i,i+1)
        if (oneNum<"0" || oneNum>"9")
          return true
    }
	return false
}

function BASEisNotFloat(theFloat){
	len=theFloat.length
	dotNum=0
	if (len==0)
		return true
	for(var i=0;i<len;i++){
	    oneNum=theFloat.substring(i,i+1)
		if (oneNum==".")
			dotNum++
        if ( ((oneNum<"0" || oneNum>"9") && oneNum!=".") || dotNum>1)
          return true
    }
	if (len>1 && theFloat.substring(0,1)=="0"){
		if (theFloat.substring(1,2)!=".")
			return true
	}
	return false
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

function checkAction(sAction){
	var frm = document.delform;
	var boolFind = false ;
	for(i=0;i< frm.length;i++)  
	{ 
		e = frm.elements[i]; 
		if ( e.type=='checkbox'){
			if(e.checked){
				boolFind = true;
				break;
			}else{
				boolFind = false ;
			}			
		}		
	} 	
	
	if(boolFind){
		boolFind = confirm('您确定要操作吗？');
	}else{
		alert('请选择至少一条记录再操作！');
		boolFind = false;
	}
	if (boolFind == true){
		frm.action = frm.action + sAction
		frm.submit()
	}
}

function productManageFormSubmit(){
	var frm = document.myform;
	if (frm.d_classid.options[frm.d_classid.selectedIndex].value == "")
	{
		alert("请选择分类！");
		return false;
	}
	if (frm.d_name.value == "")
	{
		alert("请填写商品名称！");
		frm.d_name.focus();
		return false;
	}

	if (frm.d_webprice.value == "")
	{
		alert("请填写市场价格！");
		frm.d_webprice.focus();
		return false;
	}
	if (BASEisNotFloat(frm.d_webprice.value) == true)
	{
		alert("市场价格使用数字！");
		frm.d_webprice.focus();
		return false;
	}
	
	changeleveltype("2");
	return true;
}


function isChecked(obj){
	var i;
	if (obj.length==null){
		if(obj.checked){
			return true;
		}
	} else {
		for(var i=0; i<obj.length; i++){
			if(obj[i].checked){
				return true;
			}
		}
	}	
	return false;
}

// 以下为双击滚动
var currentpos,timer; 
function initialize() { 
	timer=setInterval("scrollwindow()",10);
} 
function sc(){
	clearInterval(timer);
}
function scrollwindow() {
	currentpos=document.body.scrollTop;
	window.scroll(0,++currentpos);
	if (currentpos != document.body.scrollTop) sc();
} 
//document.onmousedown=sc
//document.ondblclick=initialize

//弹窗
function g_OpenWindow(pageURL, innerWidth, innerHeight)
{	
	var ScreenWidth = screen.availWidth
	var ScreenHeight = screen.availHeight
	var StartX = (ScreenWidth - innerWidth) / 2
	var StartY = (ScreenHeight - innerHeight) / 2
	var wins = window.open(pageURL, 'OpenWin', 'left='+ StartX + ', top='+ StartY + ', Width=' + innerWidth +', height=' + innerHeight + ', resizable=yes, scrollbars=yes, status=no, toolbar=no, menubar=no, location=no')
	wins.focus();
}

//图片最大限制
function resizepic(thispic,width,height,scale){
	if(typeof(scale) != "undefined"){
		if(typeof(width) != "undefined"){
			if(thispic.width>width) thispic.width=width;
		}
		if(typeof(height) != "undefined"){
			if(thispic.height>height) thispic.height=height;
		}
	}else{
		if(thispic.width>thispic.height){
			if(typeof(width) != "undefined"){
				if(thispic.width>width) thispic.width=width;
			}
		}else{
			if(typeof(height) != "undefined"){
				if(thispic.height>height) thispic.height=height;
			}else{
				if(typeof(width) != "undefined"){
					if(thispic.width>width) thispic.width=width;
				}
			}
		}
	}
}

// 高亮显示当前行
function HighLightList(color,e){
	// 找对象
	var el = e;

	//var el = window.event.srcElement ? window.event.srcElement : window.event.target;
	var b=false;
	var tabElement=null;
	while (!b){
		el=GetParentElement(el, "TR")
		if (el){
			tabElement=GetParentElement(el, "TABLE");
			if (tabElement!=null && tabElement.className.toUpperCase()=="BIWEB"){
				break;
			}
			el=tabElement;
		}else{
			return;
		}
	}
	
	// 行下的单元格对象进行高亮处理
	for (var i=0;i<el.childNodes.length;i++){
		if (el.childNodes[i].tagName=="TD"){
			el.childNodes[i].style.backgroundColor=color;
		}
	}
}

// 取标签名相同的父对象
function GetParentElement(obj, tag){
	while(obj!=null && obj.tagName!=tag)
		obj=obj.parentNode;
	return obj;
}


//列表页鼠标高亮
document.onmouseover=function(e){
	if(!e)e = window.event; 
	var Event = e.target?e.target:e.srcElement;
	HighLightList("#dff6ff",Event);
}
document.onmouseout=function(e){
	if(!e)e = window.event; 
	var Event = e.target?e.target:e.srcElement;
	HighLightList("",Event);
}

//html源代码输出替换函数
function toTXT(str){ 
     var RexStr = /\<|\>|\"|\'|\&/g 
     str = str.replace(RexStr, 
         function(MatchStr){ 
             switch(MatchStr){ 
                 case "<": 
                     return "& lt;"; 
                     break; 
                 case ">": 
                     return "& gt;"; 
                     break; 
                 case "\"": 
                     return "& quot;"; 
                     break; 
                 case "'": 
                     return "& #39;"; 
                     break; 
                 case "&": 
                     return "& amp;"; 
                     break; 
                 default : 
                     break; 
             } 
         } 
     ) 
     return str; 
} 


//复制粘贴板
function copyEmailCode(id){
	var testCode=document.getElementById(id).value;
	var spacemark=document.getElementById('spacemark').value;
	testCode=testCode.replace(/\r\n/gim,spacemark);
	if(copy2Clipboard(testCode)!=false){
		alert("内容复制到粘贴板，你可以使用Ctrl+V 粘贴到需要去的地方！");
	}
}

copy2Clipboard=function(txt){
	if(window.clipboardData){
		window.clipboardData.clearData();
		window.clipboardData.setData("Text",txt);
	}
	else if(navigator.userAgent.indexOf("Opera")!=-1){
		window.location=txt;
	}
	else if(window.netscape){
		try{
			netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
		}
		catch(e){
			alert("您的firefox安全限制限制您进行剪贴板操作，请在地址栏输入’about:config’将signed.applets.codebase_principal_support’设置为true’之后重试，相对路径为firefox根目录/greprefs/all.js");
			return false;
		}
		var clip=Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);
		if(!clip)return;
		var trans=Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);
		if(!trans)return;
		trans.addDataFlavor('text/unicode');
		var str=new Object();
		var len=new Object();
		var str=Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);
		var copytext=txt;str.data=copytext;
		trans.setTransferData("text/unicode",str,copytext.length*2);
		var clipid=Components.interfaces.nsIClipboard;
		if(!clip)return false;
		clip.setData(trans,null,clipid.kGlobalClipboard);
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

//window.onload调用多个函数
function addLoadEvent(func){ 
    var oldonload=window.onload; 
    if(typeof window.onload!='function'){ 
        window.onload=func; 
    }else{ 
        window.onload=function(){ 
            oldonload(); 
            func(); 
        } 
    } 
}

addLoadEvent(optionDisabled);

var collapsed = getcookie('TvE_collapse');
function collapse_change(menucount) {
	if($('menu_' + menucount).style.display == 'none') {
		$('menu_' + menucount).style.display = '';collapsed = collapsed.replace('[' + menucount + ']' , '');
		$('menuimg_' + menucount).src = 'images/menu_reduce.gif';
	} else {
		$('menu_' + menucount).style.display = 'none';collapsed += '[' + menucount + ']';
		$('menuimg_' + menucount).src = 'images/menu_add.gif';
	}
	setcookie('TvE_collapse', collapsed, 2592000);
}
var lang = new Array();
var userAgent = navigator.userAgent.toLowerCase();
var is_opera = userAgent.indexOf('opera') != -1 && opera.version();
var is_moz = (navigator.product == 'Gecko') && userAgent.substr(userAgent.indexOf('firefox') + 8, 3);
var is_ie = (userAgent.indexOf('msie') != -1 && !is_opera) && userAgent.substr(userAgent.indexOf('msie') + 5, 3);

function $(id) {
	return document.getElementById(id);
}

Array.prototype.push = function(value) {
	this[this.length] = value;
	return this.length;
}

function checkall(form, prefix, checkall) {
	var checkall = checkall ? checkall : 'chkall';
	for(var i = 0; i < form.elements.length; i++) {
		var e = form.elements[i];
		if(e.name && e.name != checkall && (!prefix || (prefix && e.name.match(prefix)))) {
			e.checked = form.elements[checkall].checked;
		}
	}
}

function doane(event) {
	e = event ? event : window.event;
	if(is_ie) {
		e.returnValue = false;
		e.cancelBubble = true;
	} else if(e) {
		e.stopPropagation();
		e.preventDefault();
	}
}

function fetchCheckbox(cbn) {
	return $(cbn) && $(cbn).checked == true ? 1 : 0;
}

function getcookie(name) {
	var cookie_start = document.cookie.indexOf(name);
	var cookie_end = document.cookie.indexOf(";", cookie_start);
	return cookie_start == -1 ? '' : unescape(document.cookie.substring(cookie_start + name.length + 1, (cookie_end > cookie_start ? cookie_end : document.cookie.length)));
}

function thumbImg(obj) {
	var zw = obj.width;
	var zh = obj.height;
	if(is_ie && zw == 0 && zh == 0) {
		var matches
		re = /width=(["']?)(\d+)(\1)/i
		matches = re.exec(obj.outerHTML);
		zw = matches[2];
		re = /height=(["']?)(\d+)(\1)/i
		matches = re.exec(obj.outerHTML);
		zh = matches[2];
	}
	obj.resized = true;
	obj.style.width = zw + 'px';
	obj.style.height = 'auto';
	if(obj.offsetHeight > zh) {
		obj.style.height = zh + 'px';
		obj.style.width = 'auto';
	}
	if(is_ie) {
		var imgid = 'img_' + Math.random();
		obj.id = imgid;
		setTimeout('try {if ($(\''+imgid+'\').offsetHeight > '+zh+') {$(\''+imgid+'\').style.height = \''+zh+'px\';$(\''+imgid+'\').style.width = \'auto\';}} catch(e){}', 1000);
	}
	obj.onload = null;
}

function imgzoom(obj) {}

function in_array(needle, haystack) {
	if(typeof needle == 'string' || typeof needle == 'number') {
		for(var i in haystack) {
			if(haystack[i] == needle) {
					return true;
			}
		}
	}
	return false;
}

function setcopy(text, alertmsg){
	if(is_ie) {
		clipboardData.setData('Text', text);
		alert(alertmsg);
	} else if(prompt('Press Ctrl+C Copy to Clipboard', text)) {
		alert(alertmsg);
	}
}

function isUndefined(variable) {
	return typeof variable == 'undefined' ? true : false;
}

function mb_strlen(str) {
	var len = 0;
	for(var i = 0; i < str.length; i++) {
		len += str.charCodeAt(i) < 0 || str.charCodeAt(i) > 255 ? (charset == 'utf-8' ? 3 : 2) : 1;
	}
	return len;
}

function setcookie(cookieName, cookieValue, seconds, path, domain, secure) {
	var expires = new Date();
	expires.setTime(expires.getTime() + seconds);
	document.cookie = escape(cookieName) + '=' + escape(cookieValue)
		+ (expires ? '; expires=' + expires.toGMTString() : '')
		+ (path ? '; path=' + path : '/')
		+ (domain ? '; domain=' + domain : '')
		+ (secure ? '; secure' : '');
}

function strlen(str) {
	return (is_ie && str.indexOf('\n') != -1) ? str.replace(/\r?\n/g, '_').length : str.length;
}

function updatestring(str1, str2, clear) {
	str2 = '_' + str2 + '_';
	return clear ? str1.replace(str2, '') : (str1.indexOf(str2) == -1 ? str1 + str2 : str1);
}

function toggle_collapse(objname, noimg) {
	var obj = $(objname);
	obj.style.display = obj.style.display == '' ? 'none' : '';
	if(!noimg) {
		var img = $(objname + '_img');
		img.src = img.src.indexOf('_yes.gif') == -1 ? img.src.replace(/_no\.gif/, '_yes\.gif') : img.src.replace(/_yes\.gif/, '_no\.gif')
	}
	var collapsed = getcookie('mymps_collapse');
	collapsed =  updatestring(collapsed, objname, !obj.style.display);
	setcookie('mymps_collapse', collapsed, (collapsed ? 86400 * 30 : -(86400 * 30 * 1000)));
}

function trim(str) {
	return (str + '').replace(/(\s+)$/g, '').replace(/^\s+/g, '');
}

function updateseccode() {
	type = seccodedata[2];
	var rand = Math.random();
	if(type == 2) {
		$('seccodeimage').innerHTML = '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="' + seccodedata[0] + '" height="' + seccodedata[1] + '" align="middle">'
			+ '<param name="allowScriptAccess" value="sameDomain" /><param name="movie" value="seccode.php?update=' + rand + '" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><param name="bgcolor" value="#ffffff" />'
			+ '<embed src="seccode.php?update=' + rand + '" quality="high" wmode="transparent" bgcolor="#ffffff" width="' + seccodedata[0] + '" height="' + seccodedata[1] + '" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>';
	} else {
		$('seccodeimage').innerHTML = '<img id="seccode" onclick="updateseccode()" width="' + seccodedata[0] + '" height="' + seccodedata[1] + '" src="seccode.php?update=' + rand + '" class="absmiddle" alt="" />';
	}
}

function updatesecqaa() {
	var x = new Ajax();
	x.get('ajax.php?action=updatesecqaa&inajax=1', function(s) {
		$('secquestion').innerHTML = s;
	});
}

function _attachEvent(obj, evt, func) {
	if(obj.addEventListener) {
		obj.addEventListener(evt, func, false);
	} else if(obj.attachEvent) {
		obj.attachEvent("on" + evt, func);
	}
}
function $(id)
{
    return document.getElementById(id);
}
ifcheck = true;
function CheckAll(form)
{
	for (var i=0;i<form.elements.length-1;i++)
	{
		var e = form.elements[i];
		e.checked = ifcheck;
	}
	ifcheck = ifcheck == true ? false : true;
}
// JavaScript Document
//在鼠标显示一个层，该层的内空为div2的内容 
function showdiv(divname){ 
var div3 = document.getElementById(divname); //将要弹出的层 
div3.style.display="block"; //div3初始状态是不可见的，设置可为可见 
//window.event代表事件状态，如事件发生的元素，键盘状态，鼠标位置和鼠标按钮状. 
//clientX是鼠标指针位置相对于窗口客户区域的 x 坐标，其中客户区域不包括窗口自身的控件和滚动条。 
div3.style.left=event.clientX+10; //鼠标目前在X轴上的位置，加10是为了向右边移动10个px方便看到内容 
div3.style.top=event.clientY+5; 
div3.style.position="absolute"; //必须指定这个属性，否则div3层无法跟着鼠标动 
//var div2 =document.getElementById('div2'); 
//div3.innerText=div2.innerHTML; 
} 
//关闭层div3的显示 
function closediv(divname){ 
var div3 = document.getElementById(divname); 
div3.style.display="none"; 
}

function winshow(pagename,w,h){
  window.open(pagename,null,"width="+w+",height="+h);
}
//显示隐藏层
<!--
function mymps(targetid,objN){
   
      var target=document.getElementById(targetid);
   var aa=document.getElementById(objN)

            if (target.style.display=="none"){
                target.style.display="block";
		
            } else {
                target.style.display="none";
		
            }
	
   
}

var track_errors=1;
function noError()
{
if (track_errors==1)
     {
        return true;
     }
}
window.onerror = noError;