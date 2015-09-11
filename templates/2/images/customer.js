$('document').ready(function(){
	var jq=jQuery.noConflict();
	jq('#corptitle').bind('blur',function(){
		jq.ajax({
			type:"GET",
			url:"/company/adminu/ajax.php",
			success:function(msg){
				if(msg != 0) alert('对不起，公司名已经存在');
			}
		})
	
	})
})