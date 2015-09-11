<!--定时切换 国内聚焦VS国际风云 -->
/*___BX GLOABLE___*/
var BX={
	version:'1.0.10.A',
	encoding:'utf-8',
	author:'bigtreexu'
};
BX.namespace=function(ns){
	if(!ns||!ns.length)
	{
		return null;
	}
	var _pr=ns.split('.');
	var _nx=BX;
	for(var i=0;i!=_pr.length;i++)
	{
		_nx[_pr[i]]=_nx[_pr[i]]||{};
		_nx=_nx[_pr[i]];
	}
}

/*___Predigest Application___*/
function $(el)
{
	if(!el)
	{
		return null;
	}
	else if(typeof el=='string')
	{
		return document.getElementById(el);
	}
	else if(typeof el=='object')
	{
		return el;
	}
}
/**
*将id，对象，id数组，对象数组加工成对应的对象数组
*@param 	{String||Object||Array} els id，对象，id数组，对象数组
*@return 	{Array} 对象数组
*/
function $A(els){
	var _els=[];
	if(els instanceof Array)
	{
		for(var i=0;i!=els.length;i++)
		{
			_els[_els.length]=$(els[i]);
		}
	}
	else if(typeof els=='object'&&els.length>0)
	{
		for(var i=0;i!=els.length;i++)
		{
			_els[_els.length]=$(els[i]);
		}
	}else
	{
		_els[0]=$(els);
	}
	return _els;
}

function StringBuilder(str)
{
	this._buffer=[];
	if(str){
		this.append(str);
	}
}

StringBuilder.prototype={	
	append:function(str){
		this._buffer.push(str);
	},
	appendFormat:function(format,parms){
		var count=arguments.length;
		if(count<2){
			return;
		}
		var _f=format;
		for(var i=1;i!=count;i++){
			_f=_f.replace('{'+(i-1)+'}',arguments[i]);
		}
		this.append(_f);
	},
	toString:function(){
		return this._buffer.join('')
	}
}


/*___Init___*/
BX.namespace('Dom');
BX.namespace('Event');
BX.namespace('Effect');
BX.namespace('Cookie');
BX.Dom={
	_batch:function(el,func)
	{
		var _el=$A(el);
		for(var i=0;i!=_el.length;i++)
		{
			if(_el[i])
			{
				func(_el[i]);
			}
		}
	},
	getMouseXY:function(e)
	{
		var _x=_y=0;
		_x=document.documentElement.scrollLeft;
		_y=document.documentElement.scrollTop;
		if(e.clientX||e.clientY)
		{
			_x+=e.clientX;
			_y+=e.clientY;
		}
		else if(e.pageX||e.pageY)
		{
			_x+=e.pageX;
			_y+=e.pageY;
		}
		return [_x,_y];
	},
	getXY:function(el)
	{
		var _x=_y=0;
		while(el)
		{
			_x+=el.offsetLeft;
			_y+=el.offsetTop;
			el=el.parentElement;
		}
		return [_x,_y];
	},
	getWH:function(el)
	{
		return [el.offsetWidth,el.offsetHeight];
	},
	setOpacity:function(els,val)
	{
		var _run=function(el)
		{
			el.style.MozOpacity=''+val/100;
			el.style.filter='Alpha(Opacity='+val+')';
		}
		this._batch(els,_run);
	},
	hide:function(els)
	{
		var _run=function(el)
		{
			el.style.display='none';
		}
		this._batch(els,_run);
	},
	show:function(els)
	{
		var _run=function(el)
		{
			el.style.display='block';
		}
		this._batch(els,_run);
	},
	getClass:function(el)
	{
		if($(el))
		{
			return $(el).className;
		}
		else
		{
			return;
		}
	},
	setClass:function(els,val)
	{
		var _run=function(el)
		{
			el.className=val;
		}
		this._batch(els,_run);
		
	},
	addClass:function(els,val)
	{
		if(!val)
		{
			return;
		}
		var _run=function(el)
		{
			var _cln=el.className.split(' ');
			for(var i=0;i!=_cln.length;i++)
			{
				if(_cln[i]==val)
				{
					return;
				}
			}
			if(el.className.length>0)
			{
				el.className=el.className+' '+val;
			}
			else
			{
				el.className=val;
			}
		}
		this._batch(els,_run);
	},
	hasClass:function(el,val)
	{
		var _bl=false;
		if($(el))
		{
			if(!el.className){return;}
			var _cln=el.className.split(' ');
			for(var i=0;i!=_cln.length;i++)
			{
				if(_cln[i]==val)
				{
					_bl=true;
					break;
				}
			}
		}
		return _bl;
	},
	removeClass:function(els,val)
	{
		if(!val)
		{
			return;
		}
		var _run=function(el)
		{
			var _cln=el.className.split(' ');
			var _s='';
			for(var i=0;i!=_cln.length;i++)
			{
				if(_cln[i]!=val)
				{
					_s+=_cln[i]+' ';
				}
			}
			if(_s==' ')
			{
				_s='';
			}
			if(_s.length!=0)
			{
				_s=_s.substr(0,_s.length-1);
			}
			el.className=_s;
		}
		this._batch(els,_run);
	},
	replaceClass:function(els,vala,valb)
	{
		if(!vala||!valb)
		{
			return;
		}
		var _run=function(el)
		{
			var _cln=el.className.split(' ');
			for(var i=0;i!=_cln.length;i++)
			{
				if(_cln[i]==vala)
				{
					_cln[i]=valb;
				}
			}
			el.className=_cln.join(' ');
		}
		this._batch(els,_run);
	},
	setStyle:function(els,styleName,styleValue)
	{
		var _run=function(el)
		{
			el.style[styleName]=styleValue;
		}
		this._batch(els,_run);
	},
	getStyle:function(el,styleName)
	{
		return el.style[styleName];
	},
	getElementsByClassName:function(parentEl,className,tagName){
		if(!parentEl||!className){
			return null;
		}
		var els=cds=[];
		cds=$(parentEl).childNodes;
		className=className.toUpperCase();
		for(var i=0;i<cds.length;i++){
			var _type=cds[i].nodeType;
			if(_type!=3&&_type!=8&&cds[i].className.toUpperCase()==className){
				if(!tagName||cds[i].nodeName.toUpperCase()==tagName.toUpperCase()){
					els[els.length]=cds[i];
				}
			}
		}
		return els;
	}
}

BX.Event={
	_cache:[],
	_batch:function(els,func)
	{
		try{
			els=$A(els);
			for(var i=0;i<els.length;i++){
				func(els[i]);
			}
		}
		catch(e)
		{
			//alert(e.description)
		}
	},
	/**
	*给指定元素增加监听，触发时执行一定的操作
	*示例：
	*var callBack=function(e,obj){alert(obj.id);};
	*BX.Event.addListener('sample','click',callBack);
	*这么在sample元素点击的时候将弹出它的id也就是sample
	*
	*@param  {String||Array||Object} el 代操作对象的id，对象本身，id数组，对象数组；
	*@param  {String} eventName 事件名称，比如click,load,mouseover,mouseout等
	*@param  {Function} func(_ev,_scope) 事件触发的方法,其中e为出发的事件对象，_scope为响应该对象的元素对象如div,window等
	*/
	addListener:function(els,eventName,func,range){
		var _run=function(el){
			var _scope=el;
			var _fn=function(e){
				var _ev=e||window.event;
				//传递相应事件的元素对象
				if(range){
					func.apply(range,[_ev,_scope])
				}
				else
				{
					func(_ev,_scope);
				}
			};
			if (!BX.Event._cache[el])
			{
				BX.Event._cache[el]=[];
			}
			/*防止重复绑定同样的事件*/
			if (BX.Event._cache[el][func]) 
			{
				//return false;
			}
			BX.Event._cache[el][func]=_fn;
			if(el.attachEvent){
				el.attachEvent('on'+eventName,_fn);
			}else if(el.addEventListener){
				el.addEventListener(eventName,_fn,false);
			}
			else
			{
				el['on'+eventName] = _fn;
			}
		};
		this._batch(els,_run);
	},
	removeListener:function(els,eventName,func)
	{
		var _run=function(el)
		{
			if(el.detachEvent)
			{
				el.detachEvent('on'+eventName,BX.Event._cache[el][func]);
			}
			else if(el.removeEventListener)
			{
				el.removeEventListener(eventName,BX.Event._cache[el][func],false);
			}
			else
			{
				el['on'+eventName] = null;
			}
			BX.Event._cache[el][func]=null;
		}
		this._batch(els,_run);
	}
}

/*
 * @classDescription 用来操作客户端cookie的类
 */
BX.Cookie={

	/**
	 * 获取对应name的cookie值
	 * @param {String} name 要获取cookie的名称
	 * @return {string} 返回name要获取cookie的值
	 */
	getCookie:function(name) {
	    var arg = name + "=";
	    var alen = arg.length;
	    var clen = document.cookie.length;
	    var i = 0;
	    while (i < clen) {
	        var j = i + alen;
	        if (document.cookie.substring(i, j) == arg) {
	            return this.getCookieVal(j);
	        }
	        i = document.cookie.indexOf(" ", i) + 1;
	        if (i == 0) break; 
	    }
	    return "";
	},


	/**
	 * 获取客户端cookies字符串
	 * @return {String}
	 */
	getCookieString:function(){
		return document.cookie;	
	}
}
	
var O=BX.Dom;
var V=BX.Event;
var F=BX.Effect;
var C=BX.Cookie;

	/*设定默认焦点栏目*/
	var focus_index = 1;
	var focus_fav=C.getCookie('focus_index');
	var focus_swap_interval=4000;
	var focus_ev0=null;
	if(focus_fav)
	{
		focus_index=parseInt(focus_fav);
	}
	var focus_array=['hot_tt1','hot_tt2','hot_tt3'];
	function switch_focus(index)
	{
		O.hide(['ea'+focus_index,'eb'+focus_index]);
		O.removeClass(focus_array[focus_index-1],'tag_current');
		focus_index=index;
		O.show(['ea'+focus_index,'eb'+focus_index]);
		O.addClass(focus_array[focus_index-1],'tag_current');
	}

	function focus_auto_swap()
	{
		if(focus_index){
			var index=focus_index;
			var _auto=function()
			{
				switch_focus(index);
				index>=3?(index=1):index++;				
				clearTimeout(focus_ev0);
				if(index==3){					
					focus_ev0=setTimeout(_auto,6000);
				}else
				{
					focus_ev0=setTimeout(_auto,focus_swap_interval);
				}
			}
			_auto();
		}
	}
var focus_link_array=['http://www.shmyp.com','www.shmyp.com'];
	function init_focus()
	{
		switch_focus(focus_index);
		V.addListener(
			focus_array,
			'mouseover',
			function(e,obj){
				var j=1;
				for(var i=0;i!=focus_array.length;i++)
				{
					if(obj.id==focus_array[i])
					{
						j=i+1;break;
					}
				}
				clearInterval(focus_ev0);
				switch_focus(j);
			}
		);
		V.addListener(
		);
		//V.addListener('makeDefault','click',set_focus);
		V.addListener('focus_left','mouseover',function(e){clearInterval(focus_ev0);});
		focus_auto_swap();
	}


<!--普通选项卡 本站搜索-->
function  secBoard(obj,listname,n)
{
	var lia = document.getElementById(obj).getElementsByTagName("li");
	var lialen=lia.length
	for(i=0; i<lialen; i++){
		lia[i].className = "ocurMenu";
	}
	lia[n-1].className = "curMenu";
		
	for (var i =1,j; j=document.getElementById(listname+"_"+i); i++){
			j.style.display="none";
	}
	document.getElementById(listname+"_"+n).style.display="block";
}

<!--圆角选项卡 供求信息-->
 function  secBoard_tt1(obj,listname,n)
{
	var lia = document.getElementById(obj).getElementsByTagName("li");
	var lialen=lia.length
	for(i=0; i<lialen; i++){	   	
			lia[i].className = "ocurMenu_tt1";			
	}	
	if (n==1){
		lia[0].className="clickfirst_tt1";
		lia[lia.length-1].className="last_tt1";
	}else if (n==lia.length){
		lia[lia.length-1].className="clicklast_tt1";
		lia[0].className="first_tt1";
	}else{
		lia[0].className="first_tt1";
		lia[lia.length-1].className="last_tt1";
		lia[n-1].className = "curMenu_tt1";
	}
	for (var i =1,j; j=document.getElementById(listname+"_"+i); i++){
			j.style.display="none";
	}
	document.getElementById(listname+"_"+n).style.display="block";
}

<!--圆角选项卡 二手供求-->
 function  secBoard_tt2(obj,listname,n)
{
	var lia = document.getElementById(obj).getElementsByTagName("li");
	var lialen=lia.length
	for(i=0; i<lialen; i++){	   	
			lia[i].className = "ocurMenu_tt2";		
	}	
	if (n==1){
		lia[0].className="clickfirst_tt2";
		lia[lia.length-1].className="last_tt2";
	}else if (n==lia.length){
		lia[lia.length-1].className="clicklast_tt2";
		lia[0].className="first_tt2";
	}else{
		lia[0].className="first_tt2";
		lia[lia.length-1].className="last_tt2";
		lia[n-1].className = "curMenu_tt2";
	}
	for (var i =1,j; j=document.getElementById(listname+"_"+i); i++){
			j.style.display="none";
	}
	document.getElementById(listname+"_"+n).style.display="block";
}

<!--圆角选项卡 招聘求职-->
 function  secBoard_tt3(obj,listname,n)
{
	var lia = document.getElementById(obj).getElementsByTagName("li");
	var lialen=lia.length
	for(i=0; i<lialen; i++){	   	
			lia[i].className = "ocurMenu_tt3";	
	}	
	if (n==1){
		lia[0].className="clickfirst_tt3";
		lia[lia.length-1].className="last_tt3";
	}else if (n==lia.length){
		lia[lia.length-1].className="clicklast_tt3";
		lia[0].className="first_tt3";
	}else{
		lia[0].className="first_tt3";
		lia[lia.length-1].className="last_tt3";
		lia[n-1].className = "curMenu_tt3";
	}
	for (var i =1,j; j=document.getElementById(listname+"_"+i); i++){
			j.style.display="none";
	}
	document.getElementById(listname+"_"+n).style.display="block";
}

<!--圆角选项卡 合作代理-->
 function  secBoard_tt4(obj,listname,n)
{
	var lia = document.getElementById(obj).getElementsByTagName("li");
	var lialen=lia.length
	for(i=0; i<lialen; i++){	   	
			lia[i].className = "ocurMenu_tt4";	
	}	
	if (n==1){
		lia[0].className="clickfirst_tt4";
		lia[lia.length-1].className="last_tt4";
	}else if (n==lia.length){
		lia[lia.length-1].className="clicklast_tt4";
		lia[0].className="first_tt4";
	}else{
		lia[0].className="first_tt4";
		lia[lia.length-1].className="last_tt4";
		lia[n-1].className ="curMenu_tt4";
	}
	for (var i =1,j; j=document.getElementById(listname+"_"+i); i++){
			j.style.display="none";
	}
	document.getElementById(listname+"_"+n).style.display="block";
}
//----------ask search start modified by Tom 07/10/29  ASK搜索须调用的函数
function search_submit()
{
	if(document.wordform.word.value=="" || document.wordform.word.value.length<2){
		document.wordform.word.focus();
		alert("请正确写下您的问题！");
		return false;
	}
	var word=document.wordform.word.value;
	window.open("http://ask.mz16.cn/search.php?word="+word);
}
function asksubmit()
{
	if(document.wordform.word.value=="" || document.wordform.word.value.length<2){
		document.wordform.word.focus();
		alert("请正确写下您的问题！");
		return false;
	}
	var word=document.wordform.word.value;
	window.open("http://ask.mz16.cn/ask.php?word="+word);
}
//--------ask search end modified by Tom 07/10/29  ASK搜索须调用的函数
//--------------dedecms search start		modified by Tom 07/10/29
/**
  * 判断输入是否为空
  */
    function isNull(str){
 	if (str==null||trim(str)=='')
 		return true;
 	else
 		return false;
    }
 /**
  *将输入数据左右两边的空格截取掉
  */
 function trim(arg)
 {
    if(arg.length==0)return ''
    for(var i=0;i<arg.length;i++)
    {
        var onechar=arg.charAt(i);
        if(onechar!=' ') break;
    }
    arg=arg.substring(i,arg.length);
    if(arg.length==0)return '';
    for(var i=arg.length;i>0;i--)
    {
        var onechar=arg.charAt(i-1);
        if(onechar!=' ') break;
    }
    arg=arg.substring(0,i);
    return arg;
 }
function formsubmit1(oneword){ 
 	if(!isNull(oneword)){ 
 		FormSearch1.keyword.value =oneword;
 	}
   	FormSearch1.submit();
}
//--------dedecms search end
function formsubmit(){
  formsearch.action="http://www.mz16.cn/cms/plus/search.php";
  formsearch.submit();
}
   
//----		登陆验证函数		modified by Tom 07/10/30
function CheckLogin(){
var taget_obj = document.getElementById('_loginform');
myajax = new DedeAjax(taget_obj,false,false,"","","");
myajax.SendGet("http://www.mz16.cn/cms/member/loginsta_peo1.php?selet=ddd");
}