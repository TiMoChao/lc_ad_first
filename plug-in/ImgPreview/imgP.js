// JavaScript Document
var sflag=true;
var maxsize=80;

function CheckBrowser(){
	var browserName = navigator.appName;
	var verStr =  ( navigator.appVersion );   
	var name = "0";
	if ( browserName == "Microsoft Internet Explorer" && (verStr.indexOf("MSIE 7.0")!=-1 || verStr.indexOf("MSIE 8.0")!=-1 )) name="1";
	if ( browserName == "Microsoft Internet Explorer" && (verStr.indexOf("MSIE 3.0")!=-1 || verStr.indexOf("MSIE 4.0") != -1 || verStr.indexOf("MSIE 5.0") != -1 || verStr.indexOf("MSIE 5.1") != -1 || verStr.indexOf("MSIE 6.0") != -1) ) name="2";
	if (browserName.indexOf('Netscape') != -1) name = '3';
	if (browserName.search(/Opera/i) == 0) name = '4';
	return(name);
}

function previewpic(theFile,theNum,theZip){
	sflag=true;
	document.form1.okgo.disabled=false;
	
	if(theFile.value!=""){
		var pu = theFile.value;
		pu = pu.replace(/\\/g,"/");
		pu=pu.toLowerCase();
		//alert(pu);
		var pus=pu.substr((pu.length-4),4);
		if(pus.indexOf("swf")==1){
			showtip("您选择的Flash动画文件",theNum);
			document.getElementById("preview"+theNum).innerHTML="";
		}else{
			if(theZip){
				document.getElementById("preview"+theNum).innerHTML= "<img src='"+pu+"' onerror='errorop("+theNum+")' onload='checkpic("+theNum+")' id='thispic"+theNum+"'>";
			}else{
				document.getElementById("preview"+theNum).innerHTML= "<img src='"+pu+"' onerror='errorop("+theNum+")' id='thispic"+theNum+"' width='510'>";
			}
		}
		//alert(document.getElementById("preview"+theNum).innerHTML);
	}else{
		document.getElementById("preview"+theNum).innerHTML="";
		document.getElementById("tip"+theNum).innerHTML="";
	}
}
function errorop(theNum){
	var browser = CheckBrowser();
	if(browser == 1){
		showtip("IE7,IE8默认限制了本地图片预览功能",theNum);
	}else{
		showtip("您选择的不是图片文件或者当前图片不能够正常显示",theNum);
		document.form1.okgo.disabled=true;
	}
	document.getElementById("preview"+theNum).innerHTML="";
}

function checkpic(theNum){
	var thissize=Math.floor(document.getElementById("thispic"+theNum).fileSize/1000);
	if(thissize==0){
		thissize=1;
	}
	var picw=document.getElementById("thispic"+theNum).offsetWidth;
	var pich=document.getElementById("thispic"+theNum).offsetHeight;
	if(picw>600){
		document.getElementById("thispic"+theNum).style.width=600;
	}
	if(thissize && sflag==true){		
		if(thissize>maxsize){
			var pu = document.getElementById("thispic"+theNum).src;
			pu=pu.toLowerCase();
			var pus=pu.substr((pu.length-4),4);
			if((pus.indexOf("jpg")==1 || pus.indexOf("jpeg")==1 || pus.indexOf("gif")==1 || pus.indexOf("png")==1) && thissize<1024){
				var pq=Math.sqrt(maxsize/thissize);
				var bestw=Math.floor(picw*pq);
				var besth=Math.floor(pich*pq);
				var cstr=" 现在我们为您提供了压缩方案，上传的同时可以对图片进行压缩<br>请选择图片压缩尺寸\n<input name=csize"+theNum+" type=radio value="+pq+" checked> 大("+bestw+"*"+besth+") <input name=csize"+theNum+" type=radio value="+pq/1.5+"> 较大("+Math.floor(bestw/1.5)+"*"+Math.floor(besth/1.5)+")";
				showtip("您的图片过大("+thissize+"K) 允许最大文件"+maxsize+"K"+cstr,theNum);		
				document.getElementById("tipn").style.width=600;
			}else{
				showtip("您的图片过大("+thissize+"K) 允许最大文件"+maxsize+"K",theNum);
				document.form1.okgo.disabled=true;
			}
		}else{
			showtip("您的图片大小为"+thissize+"K 可正常上传",theNum);
		}
		sflag=false;
	}	
}

function showtip(s,theNum){
	document.getElementById("tip"+theNum).innerHTML="<div id=tipn>"+s+"</div>";
}
