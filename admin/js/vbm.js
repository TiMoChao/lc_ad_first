// JavaScript Document
//�������ʾһ���㣬�ò���ڿ�Ϊdiv2������ 
function showdiv(divname){ 
var div3 = document.getElementById(divname); //��Ҫ�����Ĳ� 
div3.style.display="block"; //div3��ʼ״̬�ǲ��ɼ��ģ����ÿ�Ϊ�ɼ� 
//window.event�����¼�״̬�����¼�������Ԫ�أ�����״̬�����λ�ú���갴ť״. 
//clientX�����ָ��λ������ڴ��ڿͻ������ x ���꣬���пͻ����򲻰�����������Ŀؼ��͹������� 
div3.style.left=event.clientX+10; //���Ŀǰ��X���ϵ�λ�ã���10��Ϊ�����ұ��ƶ�10��px���㿴������ 
div3.style.top=event.clientY+5; 
div3.style.position="absolute"; //����ָ��������ԣ�����div3���޷�������궯 
//var div2 =document.getElementById('div2'); 
//div3.innerText=div2.innerHTML; 
} 
//�رղ�div3����ʾ 
function closediv(divname){ 
var div3 = document.getElementById(divname); 
div3.style.display="none"; 
}

function winshow(pagename,w,h){
  window.open(pagename,null,"width="+w+",height="+h);
}
function checkbox(obj,num){
  var id;
  for (i=1;i<=num;i++){
	id=obj+i;
	if(document.getElementById(id).checked==""){
	  document.getElementById(id).checked="checked";
	}
	else{
	  document.getElementById(id).checked="";
	}
  }
}
function win(){

   window.opener.document.all.imgs.innerText=document.getElementById("imgs").value;
   //window.opener.document.all.bb.innerText=document.getElementById("sex").value;

   window.close();
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
//��ʾ���ز�
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
-->