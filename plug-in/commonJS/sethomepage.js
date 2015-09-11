function addCookie(){ 
if(document.all){
       window.external.addFavorite('http://www.huoshandao.com', '.漳州火山公园 - 中国唯一滨海火山公园');
}
else if(window.sidebar){
      window.sidebar.addPanel('.漳州火山公园 - 中国唯一滨海火山公园','http://www.huoshandao.com',"");
}
}

function setHomepage(){
   if(document.all){
      document.body.style.behavior='url(#default#homepage)';
      document.body.setHomePage('http://www.huoshandao.com');
   }
   else if(window.sidebar){
        if(window.netscape){
             try{
                 netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
             }
             catch(e){
                 alert("您的浏览器未启用[设为首页]功能，开启方法：先在地址栏内输入about:config,然后将项 signed.applets.codebase_principal_support 值该为true即可");
             }
        }
        var prefs=Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
        prefs.setCharPref('browser.startup.homepage','http://www.huoshandao.com');
   }
}
