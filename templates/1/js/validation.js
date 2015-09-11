/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){
	//================================公司用户注册=========================================//
    
    var userNameForAdFlag = false;
    
	var adComRegform = $("#adComRegForm");

	var userName_adCom = $("#userName_adCom");
	var userName_adCom_Info = $("#userName_adCom_Info");

	var password_adCom = $("#password_adCom");
	var password_adCom_Info = $("#password_adCom_Info");

	var confirmPassword_adCom = $("#confirmPassword_adCom");
	var confirmPassword_adCom_Info = $("#confirmPassword_adCom_Info");

	var companyName_adCom = $("#companyName_adCom");
	var companyName_adCom_Info = $("#companyName_adCom_Info");

	var addr_adCom = $("#addr_adCom");
	var addr_adCom_Info = $("#addr_adCom_Info");

	var contact_adCom = $("#contact_adCom");
	var contact_adCom_Info = $("#contact_adCom_Info");

	var position_adCom = $("#position_adCom");
	var position_adCom_Info = $("#position_adCom_Info");

	var mobilePhone_adCom = $("#mobilePhone_adCom");
	var mobilePhone_adCom_Info = $("#mobilePhone_adCom_Info");
    
    var email_adCom = $("#email_adCom");
    var email_adCom_Info = $("#email_adCom_Info");

	var des_adCom = $("#des_adCom");
	var des_adCom_Info = $("#des_adCom_Info");
    
    var lng = $("#lng");
    var lat = $("#lat");
    var map = $("#map");
    var adComMap_Info = $("#adComMap_Info");

	//On blur
	userName_adCom.blur(validateUserNameByAjax);
	password_adCom.blur(validatePasswordAd);
	confirmPassword_adCom.blur(validateConfirmPasswordAd);
	companyName_adCom.blur(validateCompanyNameAd);
	addr_adCom.blur(validateAddrAd);
	contact_adCom.blur(validateContactAd);
    position_adCom.blur(validatePositionAd);
	mobilePhone_adCom.blur(validateMobilePhoneAd);
	des_adCom.blur(validateDesAd);
    email_adCom.blur(validateEmailAd);

	//On key press
	userName_adCom.keyup(validateUserNameAd);
	password_adCom.keyup(validatePasswordAd);
	confirmPassword_adCom.keyup(validateConfirmPasswordAd);
	companyName_adCom.keyup(validateCompanyNameAd);
	addr_adCom.keyup(validateAddrAd);
	contact_adCom.keyup(validateContactAd);
	position_adCom.keyup(validatePositionAd);
	mobilePhone_adCom.keyup(validateMobilePhoneAd);
	des_adCom.keyup(validateDesAd);
    email_adCom.keyup(validateEmailAd);
    
    function validateAdComMap(){
        if(lng.val().length == 0 && lat.val().length == 0){
            map.addClass("error");
            adComMap_Info.text("请在地图中选择公司所在地");
            adComMap_Info.addClass("error");
            return false;
        }else{
            map.removeClass("error");
			adComMap_Info.text("*");
			adComMap_Info.removeClass("error");
			return true;
        }
     }
    
    //On Submitting
	adComRegform.submit(function(){
	    if(!userNameForAdFlag){
                return false;    
        }
        
		if(validateUserNameAd() & validatePasswordAd() & validateConfirmPasswordAd() & validateCompanyNameAd() & 
			validateAddrAd() & validateContactAd() & validatePositionAd() & validateMobilePhoneAd() & 
            validateDesAd() & validateEmailAd() & validateAdComMap())
			return true;
		else
			return false;
	});
    //================================公司用户注册=========================================//

	//================================普通用户注册=========================================//
    var userNameForCommFlag = false;
    
	var userRegForm = $("#userRegForm");
	
	var userName_comm = $("#userName_comm");
	var userName_comm_Info = $("#userName_comm_Info");

	var password_comm = $("#password_comm");
	var password_comm_Info = $("#password_comm_Info");

	var confirmPassword_comm = $("#confirmPassword_comm");
	var confirmPassword_comm_Info = $("#confirmPassword_comm_Info");

	var contact_comm = $("#contact_comm");
	var contact_comm_Info = $("#contact_comm_Info");

	var mobilePhone_comm = $("#mobilePhone_comm");
	var mobilePhone_comm_Info = $("#mobilePhone_comm_Info");
    
    var email_comm = $("#email_comm");
	var email_comm_Info = $("#email_comm_Info");

	//On blur
	userName_comm.blur(validateUserNameByAjax);
	password_comm.blur(validatePasswordComm);
	confirmPassword_comm.blur(validateConfirmPasswordComm);
	contact_comm.blur(validateContactComm);
	mobilePhone_comm.blur(validateMobilePhoneComm);
    email_comm.blur(validateEmailComm);

	//On key press
	userName_comm.keyup(validateUserNameComm);
	password_comm.keyup(validatePasswordComm);
	confirmPassword_comm.keyup(validateConfirmPasswordComm);
	contact_comm.keyup(validateContactComm);
	mobilePhone_comm.keyup(validateMobilePhoneComm);
    email_comm.keyup(validateEmailComm);
    
    userRegForm.submit(
		function(){
        if(!userNameForCommFlag){
                return false;    
        }
            
		if(validateUserNameComm() & validatePasswordComm() & validateConfirmPasswordComm() & 
            validateContactComm() & validateMobilePhoneComm() & validateEmailComm()){
			return true;
		} else {
			return false;
		}
	});
    //================================普通用户注册=========================================//
    
    //================================修改公司信息================================//
    var modifyAdComInfoForm = $("#modifyAdComInfoForm");
    
    modifyAdComInfoForm.submit(function(){
		if(validateCompanyNameAd() & validateAddrAd() & validateContactAd() & 
                    validatePositionAd() & validateMobilePhoneAd() & validateDesAd() & validateEmailAd())
			return true;
		else
			return false;
	});
    //================================修改公司信息================================//
    
    //================================修改普通用户信息================================//
    var modifyCommInfoForm = $("#modifyCommInfoForm");
    
    modifyCommInfoForm.submit(
		function(){
		if(validateContactComm() & validateMobilePhoneComm() & validateEmailComm()){
			return true;
		} else {
			return false;
		}
	});
    //================================修改普通用户信息================================//
    
    //================================密码修改=========================================//
    var modifyPasswordForm = $("#modifyPasswordForm");
    
    var oldPassword = $("#oldPassword");
	var oldPassword_Info = $("#oldPassword_Info");
    
    var newPassword = $("#newPassword");
	var newPassword_Info = $("#newPassword_Info");
    
    var confirmNewPassword = $("#confirmNewPassword");
	var confirmNewPassword_Info = $("#confirmNewPassword_Info");
    
    var flag = false;
    
    //On blur
	oldPassword.blur(validateOldPasswordByAjax);
	newPassword.blur(validateNewPassword);
	confirmNewPassword.blur(validateConfirmNewPassword);

	//On key press
	oldPassword.keyup(validateOldPassword);
	newPassword.keyup(validateNewPassword);
	confirmNewPassword.keyup(validateConfirmNewPassword);
    
    modifyPasswordForm.submit(
		function(){
            if(!flag){
                return false;    
            }
            
    		if(validateOldPassword() && validateNewPassword() && validateConfirmNewPassword()){
                return true;
    		} else {
    			return false;
    		}
	});
    //================================密码修改=========================================//
    
    //================================资源发布=========================================//
     var releaseForm = $("#releaseForm");
     
     var releaseForComForm = $("#releaseForComForm");
     
     var title = $("#title");
     var title_Info = $("#title_Info");
     
     var adTypeParent = $("#adTypeParent");
     var adType = $("#adType");
     var adType_Info = $("#adType_Info");
     
     var area = $("#area");
     var area_Info = $("#area_Info");
     
     var price = $("#price");
     var price_Info = $("#price_Info");
     
     var amount = $("#amount");
     var amount_Info = $("#amount_Info");
     
     var cycle = $("#cycle");
     var cycle_Info = $("#cycle_Info");
     
     var status = $("#status");
     var status_Info = $("#status_Info");
     
     var des = $("#des");
     var des_Info = $("#des_Info");
     
     var flow = $("#flow");
     var flow_Info = $("#flow_Info");
     
     title.blur(validateTitle);
     adTypeParent.blur(validateAdType);
     adType.blur(validateAdType);
     area.blur(validateArea);
     price.blur(validatePrice);
     status.blur(validateStatus);
     des.blur(validateDes);
     amount.blur(validateAmount);
     cycle.blur(validateCycle);
     flow.blur(validateFlow);

	 //On key press
     title.keyup(validateTitle);
     price.keyup(validatePrice);
     status.keyup(validateStatus);
     des.keyup(validateDes);
     amount.keyup(validateAmount);
     cycle.keyup(validateCycle);
     flow.keyup(validateFlow);
     
     function validateTitle(){
        if(title.val().replace(/\s+/g,'').length == 0){
            title.val("");
            title.addClass("error");
			title_Info.text("标题不能为空！");
			title_Info.addClass("error");
			return false;
        } else if(title.val().length > 20){
            title.addClass("error");
			title_Info.text("标题字数不能超过20个字！");
			title_Info.addClass("error");
			return false;
        } else {
            title.removeClass("error");
			title_Info.text("*");
			title_Info.removeClass("error");
			return true;
        }
     }
     
     function validateAdType(){
        if(adTypeParent.val() == 0){
            adTypeParent.addClass("error");
			adType_Info.text("请选择广告类型！");
			adType_Info.addClass("error");
			return false;
        } else if(adType.val() == 0){
            adType.addClass("error");
			adType_Info.text("请选择广告子类型！");
			adType_Info.addClass("error");
			return false;
        } else {
            adType.removeClass("error");
            adTypeParent.removeClass("error");
			adType_Info.text("*");
			adType_Info.removeClass("error");
			return true;
        }
     }
     
     function validateArea(){
        if(area.val() == 0){
            area.addClass("error");
			area_Info.text("请选择所在地区！");
			area_Info.addClass("error");
			return false;
        } else {
            area.removeClass("error");
			area_Info.text("*");
			area_Info.removeClass("error");
			return true;
        }
     }
     
     function validatePrice(){
        if(!isNaN(price.val())){
            price.addClass("error");
            price_Info.text("请输入价格单位");
            price_Info.addClass("error");
            return false;
        } else {
            price.removeClass("error");
			price_Info.text("*");
			price_Info.removeClass("error");
			return true;
        }
     }
     
     function validateAmount(){
        var f = parseFloat(amount.val());
        
        if(amount.val().length == 0) {
            amount.removeClass("error");
			amount_Info.text("");
			amount_Info.removeClass("error");
			return true;
        } else if(isNaN(f)){
            amount.addClass("error");
            amount_Info.text("请输入数字！");
            amount_Info.addClass("error");
            return false;
        } else {
            amount.removeClass("error");
			amount_Info.text("");
			amount_Info.removeClass("error");
			return true;
        }
     }
     
     function validateFlow(){
        var f = parseFloat(flow.val());
        
        if(flow.val().length == 0) {
            flow.removeClass("error");
			flow_Info.text("");
			flow_Info.removeClass("error");
			return true;
        } else if(isNaN(f)){
            flow.addClass("error");
            flow_Info.text("请输入数字！");
            flow_Info.addClass("error");
            return false;
        } else {
            flow.removeClass("error");
			flow_Info.text("");
			flow_Info.removeClass("error");
			return true;
        }
     }
        
     function validateCycle(){
        var f = parseFloat(cycle.val());
        
        if(cycle.val().length == 0) {
            cycle.removeClass("error");
			cycle_Info.text("");
			cycle_Info.removeClass("error");
			return true;
        } else if(isNaN(f)){
            cycle.addClass("error");
            cycle_Info.text("请输入数字！");
            cycle_Info.addClass("error");
            return false;
        } else {
            cycle.removeClass("error");
			cycle_Info.text("");
			cycle_Info.removeClass("error");
			return true;
        }
     }
     
     function validateStatus(){
        if(status.val() == 0){
            status.addClass("error");
			status_Info.text("请选择媒体状态！");
			status_Info.addClass("error");
			return false;
        } else {
            status.removeClass("error");
			status_Info.text("*");
			status_Info.removeClass("error");
			return true;
        }
     }
     
     function validateDes(){
        if(des.val().length == 0){
            des.addClass("error");
            des_Info.text("请输入内容简介");
            des_Info.addClass("error");
            return false;
        }else{
            des.removeClass("error");
			des_Info.text("*");
			des_Info.removeClass("error");
			return true;
        }
     }
     
     releaseForm.submit(
		function(){
    		if(validateTitle() & validateAdType() & validateArea() & validatePrice() &
                validateStatus() & validateDes() & validateFlow() & validateAmount() & validateCycle()){
                return true;
    		} else {
    			return false;
    		}
	});
    
    releaseForComForm.submit(
        function(){
            if(validateTitle() & validateDes()){
                return true;
            } else {
                return false;
            }
        }
    );
    //================================资源发布=========================================//
   	
	//validation functions
	function validateUserNameAd(){
		//if it's NOT valid
		if(userName_adCom.val().replace(/\s+/g,'').length == 0){
            userName_adCom.val("");
			userName_adCom.addClass("error");
			userName_adCom_Info.text("请输入用户名！");
			userName_adCom_Info.addClass("error");
			return false;
		} else if(userName_adCom.val().length > 20){
            userName_adCom.addClass("error");
            userName_adCom_Info.text("用户名长度不能超过20个字符！");
            userName_adCom_Info.addClass("error");
            userNameForAdFlag = false;
            return false;
        } else{
			userName_adCom.removeClass("error");
			userName_adCom_Info.text("*");
			userName_adCom_Info.removeClass("error");
			return true;
		}
	}

	function validatePasswordAd(){
		//it's NOT valid
		if(password_adCom.val().length < 6){
			password_adCom.addClass("error");
			password_adCom_Info.text("密码必需6位以上！");
			password_adCom_Info.addClass("error");
			return false;
		}
		//it's valid
		else{			
			password_adCom.removeClass("error");
			password_adCom_Info.text("*");
			password_adCom_Info.removeClass("error");
			validateConfirmPasswordAd();
			return true;
		}
	}
    
	function validateConfirmPasswordAd(){
		//are NOT valid
		if( password_adCom.val() != confirmPassword_adCom.val() ){
			confirmPassword_adCom.addClass("error");
			confirmPassword_adCom_Info.text("两次输入的密码不匹配！");
			confirmPassword_adCom_Info.addClass("error");
			return false;
		}
		//are valid
		else{
			confirmPassword_adCom.removeClass("error");
			confirmPassword_adCom_Info.text("*");
			confirmPassword_adCom_Info.removeClass("error");
			return true;
		}
	}

	function validateCompanyNameAd(){
		//if it's NOT valid
		if(companyName_adCom.val().replace(/\s+/g,'').length == 0){
            companyName_adCom.val("");
			companyName_adCom.addClass("error");
			companyName_adCom_Info.text("请输入公司名称！");
			companyName_adCom_Info.addClass("error");
			return false;
		} else{
			companyName_adCom.removeClass("error");
			companyName_adCom_Info.text("*");
			companyName_adCom_Info.removeClass("error");
			return true;
		}
	}

	function validateAddrAd(){
		//if it's NOT valid
		if(addr_adCom.val().replace(/\s+/g,'').length == 0){
		    addr_adCom.val("");
			addr_adCom.addClass("error");
			addr_adCom_Info.text("请输入公司地址！");
			addr_adCom_Info.addClass("error");
			return false;
		} else{
			addr_adCom.removeClass("error");
			addr_adCom_Info.text("*");
			addr_adCom_Info.removeClass("error");
			return true;
		}
	}

	function validateContactAd(){
		//if it's NOT valid
		if(contact_adCom.val().replace(/\s+/g,'').length == 0){
		    contact_adCom.val("");
			contact_adCom.addClass("error");
			contact_adCom_Info.text("请输入联系人姓名！");
			contact_adCom_Info.addClass("error");
			return false;
		} else{
			contact_adCom.removeClass("error");
			contact_adCom_Info.text("*");
			contact_adCom_Info.removeClass("error");
			return true;
		}
	}

	function validatePositionAd(){
		//if it's NOT valid
		if(position_adCom.val().replace(/\s+/g,'').length == 0){
		    position_adCom.val("");
			position_adCom.addClass("error");
			position_adCom_Info.text("请输入联系人职务！");
			position_adCom_Info.addClass("error");
			return false;
		} else{
			position_adCom.removeClass("error");
			position_adCom_Info.text("*");
			position_adCom_Info.removeClass("error");
			return true;
		}
	}

	function validateMobilePhoneAd(){
		var f = parseFloat(mobilePhone_adCom.val());
		//if it's NOT valid
		if(mobilePhone_adCom.val().length == 0){
			mobilePhone_adCom.addClass("error");
			mobilePhone_adCom_Info.text("请输入手机号码！");
			mobilePhone_adCom_Info.addClass("error");
			return false;
		} else if(mobilePhone_adCom.val().length != 11){
			mobilePhone_adCom.addClass("error");
			mobilePhone_adCom_Info.text("手机号码不合法！");
			mobilePhone_adCom_Info.addClass("error");
			return false;
		} else if(isNaN(f)){
			mobilePhone_adCom.addClass("error");
			mobilePhone_adCom_Info.text("手机号码不合法！");
			mobilePhone_adCom_Info.addClass("error");
			return false;
		} else{
			mobilePhone_adCom.removeClass("error");
			mobilePhone_adCom_Info.text("*");
			mobilePhone_adCom_Info.removeClass("error");
			return true;
		}
	}
    
    function validateEmailAd(){
        if(email_adCom.val().length == 0){
            email_adCom.addClass("error");
            email_adCom_Info.text("请输入电子邮箱，作为取回密码的方式！");
			email_adCom_Info.addClass("error");
			return false;
        } else if(!email_adCom.val().match(/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/)){
            email_adCom.addClass("error");
            email_adCom_Info.text("电子邮箱格式不正确！");
			email_adCom_Info.addClass("error");
			return false;
        } else{
			email_adCom.removeClass("error");
			email_adCom_Info.text("*");
			email_adCom_Info.removeClass("error");
			return true;
		}
    }

	function validateDesAd(){
		//if it's NOT valid
		if(des_adCom.val().length == 0){
			des_adCom.addClass("error");
			des_adCom_Info.text("请输入公司简介！");
			des_adCom_Info.addClass("error");
			return false;
		} else{
			des_adCom.removeClass("error");
			des_adCom_Info.text("*");
			des_adCom_Info.removeClass("error");
			return true;
		}
	}

	//=====================================普通用户==============================================//
	
	//validation functions
	function validateUserNameComm(){
		//if it's NOT valid
		if(userName_comm.val().replace(/\s+/g,'').length == 0){
		    userName_comm.val("");
			userName_comm.addClass("error");
			userName_comm_Info.text("请输入用户名！");
			userName_comm_Info.addClass("error");
			return false;
		} else if(userName_comm.val().length > 20){
		    userName_comm.addClass("error");
			userName_comm_Info.text("用户名长度不能超过20个字符！");
			userName_comm_Info.addClass("error");
			return false;
		} else{
			userName_comm.removeClass("error");
			userName_comm_Info.text("*");
			userName_comm_Info.removeClass("error");
			return true;
		}
	}

	function validatePasswordComm(){
		//it's NOT valid
		if(password_comm.val().length < 6){
			password_comm.addClass("error");
			password_comm_Info.text("密码必需6位以上！");
			password_comm_Info.addClass("error");
			return false;
		}
		//it's valid
		else{			
			password_comm.removeClass("error");
			password_comm_Info.text("*");
			password_comm_Info.removeClass("error");
			validateConfirmPasswordComm();
			return true;
		}
	}

	function validateConfirmPasswordComm(){

		//are NOT valid
		if( password_comm.val() != confirmPassword_comm.val() ){
			confirmPassword_comm.addClass("error");
			confirmPassword_comm_Info.text("两次输入的密码不匹配！");
			confirmPassword_comm_Info.addClass("error");
			return false;
		}
		//are valid
		else{
			confirmPassword_comm.removeClass("error");
			confirmPassword_comm_Info.text("*");
			confirmPassword_comm_Info.removeClass("error");
			return true;
		}
	}
    
    function validateEmailComm(){
        if(email_comm.val().length == 0){
            email_comm.addClass("error");
            email_comm_Info.text("请输入电子邮箱，作为取回密码的方式！");
			email_comm_Info.addClass("error");
			return false;
        } else if(!email_comm.val().match(/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/)){
            email_comm.addClass("error");
            email_comm_Info.text("电子邮箱格式不正确！");
			email_comm_Info.addClass("error");
			return false;
        } else{
			email_comm.removeClass("error");
			email_comm_Info.text("*");
			email_comm_Info.removeClass("error");
			return true;
		}
    }

	function validateContactComm(){
		//if it's NOT valid
		if(contact_comm.val().replace(/\s+/g,'').length == 0){
            contact_comm.val("");
			contact_comm.addClass("error");
			contact_comm_Info.text("请输入联系人姓名！");
			contact_comm_Info.addClass("error");
			return false;
		} else{
			contact_comm.removeClass("error");
			contact_comm_Info.text("*");
			contact_comm_Info.removeClass("error");
			return true;
		}
	}

	function validateMobilePhoneComm(){
		var f = parseFloat(mobilePhone_comm.val());
		//if it's NOT valid
		if(mobilePhone_comm.val().length == 0){
			mobilePhone_comm.addClass("error");
			mobilePhone_comm_Info.text("请输入手机号码！");
			mobilePhone_comm_Info.addClass("error");
			return false;
		} else if(mobilePhone_comm.val().length != 11){
			mobilePhone_comm.addClass("error");
			mobilePhone_comm_Info.text("手机号码不合法！");
			mobilePhone_comm_Info.addClass("error");
			return false;
		} else if(isNaN(f)){
			mobilePhone_comm.addClass("error");
			mobilePhone_comm_Info.text("手机号码不合法！");
			mobilePhone_comm_Info.addClass("error");
			return false;
		}

		//if it's valid
		else{
			mobilePhone_comm.removeClass("error");
			mobilePhone_comm_Info.text("*");
			mobilePhone_comm_Info.removeClass("error");
			return true;
		}
	}
    
    //修改密码页面验证
   	function validateOldPassword(){
		//it's NOT valid
		if(oldPassword.val().length < 6){
			oldPassword.addClass("error");
			oldPassword_Info.text("密码必需6位以上！");
			oldPassword_Info.addClass("error");
			return false;
		}
		//it's valid
		else{			
			oldPassword.removeClass("error");
			oldPassword_Info.text("*");
			oldPassword_Info.removeClass("error");
			//validateConfirmPasswordAd();
			return true;
		}
	}
    
    //检测密码的AJAX方法
    function validateOldPasswordByAjax(){      
        url = "checkPasswordAjax.php?id="+$("#userid").val()+"&password="+$("#oldPassword").val();
        
        $("#oldPassword_Info").load(url,
            function (responseText, textStatus, XMLHttpRequest){
                if(responseText == "true"){
                    oldPassword.removeClass("error");
        			oldPassword_Info.text("*");
        			oldPassword_Info.removeClass("error");
                    flag = true;
        			return true;
                } else {
                    oldPassword.addClass("error");
        			oldPassword_Info.text("旧密码不正确！");
        			oldPassword_Info.addClass("error");
                    flag = false;
        			return false;
                }
            });
    }
    
    //检测用户名的AJAX方法
    function validateUserNameByAjax(){
        
        if($("#usertype").val() == 0){
            if(userName_adCom.val().replace(/\s+/g,'').length == 0){
                userName_adCom.val("");
                userName_adCom.addClass("error");
     			userName_adCom_Info.text("请输入用户名！");
     			userName_adCom_Info.addClass("error");
                userNameForAdFlag = false;
     			return false;
            } else if(userName_adCom.val().length > 20){
                userName_adCom.addClass("error");
     			userName_adCom_Info.text("用户名长度不能超过20个字符！");
     			userName_adCom_Info.addClass("error");
                userNameForAdFlag = false;
     			return false;
            }
        } else {
            if(userName_comm.val().replace(/\s+/g,'').length == 0){
                userName_comm.val("");
                userName_comm.addClass("error");
    			userName_comm_Info.text("请输入用户名！");
    			userName_comm_Info.addClass("error");
    			return false;
            }else if(userName_comm.val().length > 20){
    		    userName_comm.addClass("error");
    			userName_comm_Info.text("用户名长度不能超过20个字符！");
    			userName_comm_Info.addClass("error");
    			return false;
            }
        }
        
        url = "";
        
        if($("#usertype").val() == 0){
            url = "getUserNameAjax.php?usertype="+$("#usertype").val()+"&username="+$("#userName_adCom").val();
            
            $("#userName_adCom_Info").load(url,
            function (responseText, textStatus, XMLHttpRequest){
                if(responseText == "true"){
                    userName_adCom.removeClass("error");
        			userName_adCom_Info.text("*");
        			userName_adCom_Info.removeClass("error");
                    userNameForAdFlag = true;
        			return true;
                } else {
                    userName_adCom.addClass("error");
        			userName_adCom_Info.text("该用户名已存在，请重新输入！");
        			userName_adCom_Info.addClass("error");
                    userNameForAdFlag = false;
        			return false;
                }
            });
        } else {
            url = "getUserNameAjax.php?usertype="+$("#usertype").val()+"&username="+$("#userName_comm").val();
            
            $("#userName_comm_Info").load(url,
            function (responseText, textStatus, XMLHttpRequest){
                if(responseText == "true"){
                    userName_comm.removeClass("error");
        			userName_comm_Info.text("*");
        			userName_comm_Info.removeClass("error");
                    userNameForCommFlag = true;
        			return true;
                } else {
                    userName_comm.addClass("error");
        			userName_comm_Info.text("该用户名已存在，请重新输入！");
        			userName_comm_Info.addClass("error");
                    userNameForCommFlag = false;
        			return false;
                }
            });
        }
    }
    
    function validateNewPassword(){
		//it's NOT valid
		if(newPassword.val().length < 6){
			newPassword.addClass("error");
			newPassword_Info.text("密码必需6位以上！");
			newPassword_Info.addClass("error");
			return false;
		}
		//it's valid
		else{			
			newPassword.removeClass("error");
			newPassword_Info.text("*");
			newPassword_Info.removeClass("error");
			validateConfirmNewPassword();
			return true;
		}
	}
    
	function validateConfirmNewPassword(){
		//are NOT valid
		if( newPassword.val() != confirmNewPassword.val() ){
			confirmNewPassword.addClass("error");
			confirmNewPassword_Info.text("两次输入的密码不匹配！");
			confirmNewPassword_Info.addClass("error");
			return false;
		}
		//are valid
		else{
			confirmNewPassword.removeClass("error");
			confirmNewPassword_Info.text("*");
			confirmNewPassword_Info.removeClass("error");
			return true;
		}
	}
    
    //====================================LOGO管理===============================//
    
    var logoForm = $("#logoForm");
    
    var company = $("#company");
    var company_Info = $("#company_Info");
    
    company.blur(validateCompany);
    
    company.keyup(validateCompany);
    
    logoForm.submit(function(){
		if(validateCompany())
			return true;
		else
			return false;
	});
    
    function validateCompany(){
		//it's NOT valid
		if(company.val().length == 0){
			company.addClass("error");
			company_Info.text("请输入LOGO的公司名称！");
			company_Info.addClass("error");
			return false;
		}
		//it's valid
		else{			
			company.removeClass("error");
			company_Info.text("*");
			company_Info.removeClass("error");
			return true;
		}
	}
    
  //================================新闻资讯=========================================//
    var newsForm = $("#newsForm");
    
    var title = $("#title");
	var title_Info = $("#title_Info");
    
    var type = $("#type");
	var type_Info = $("#type_Info");
    
    var source = $("#source");
	var source_Info = $("#source_Info");
	
	var editor = $("#editor");
	var editor_Info = $("#editor_Info");
    
    var flag = false;
    
    //On blur
    title.blur(validateTitle);
    type.blur(validateType);
    source.blur(validateSource);
    editor.blur(validateEditor);

	//On key press
    title.keyup(validateTitle);
	type.keyup(validateType);
	source.keyup(validateSource);
	editor.blur(validateEditor);
    
	//新闻资讯页面验证
   	function validateTitle(){
		//it's NOT valid
		if(title.val().length > 50){
			title.addClass("error");
			title_Info.text("标题长度不能超过50个字符！");
			title_Info.addClass("error");
			return false;
		} else if(title.val().length == 0){
			title.addClass("error");
			title_Info.text("请输入标题！");
			title_Info.addClass("error");
			return false;
		} else{			
			title.removeClass("error");
			title_Info.text("*");
			title_Info.removeClass("error");
			//validateConfirmPasswordAd();
			return true;
		}
	}
   	
   	function validateType(){
		//it's NOT valid
		if(type.val() == 0){
			type.addClass("error");
			type_Info.text("请选择资讯类型！");
			type_Info.addClass("error");
			return false;
		}
		//it's valid
		else{			
			type.removeClass("error");
			type_Info.text("*");
			type_Info.removeClass("error");
			//validateConfirmPasswordAd();
			return true;
		}
	}
   	
   	function validateEditor(){
		//it's NOT valid
		if(editor.val().length == 0){
			editor.addClass("error");
			editor_Info.text("请输入资讯来源！");
			editor_Info.addClass("error");
			return false;
		}
		//it's valid
		else{			
			editor.removeClass("error");
			editor_Info.text("*");
			editor_Info.removeClass("error");
			//validateConfirmPasswordAd();
			return true;
		}
	}
   	
   	function validateSource(){
		//it's NOT valid
		if(source.val().length == 0){
			source.addClass("error");
			source_Info.text("请输入资讯来源！");
			source_Info.addClass("error");
			return false;
		}
		//it's valid
		else{			
			source.removeClass("error");
			source_Info.text("*");
			source_Info.removeClass("error");
			//validateConfirmPasswordAd();
			return true;
		}
	}
   	
   	newsForm.submit(
		function(){
    		if(validateTitle() & validateType() & validateSource()){
                return true;
    		} else {
    			return false;
    		}
	});
    //================================新闻资讯=========================================//
   	var longLogoForm = $("#longLogoForm");
    
    var company = $("#company");
	var company_Info = $("#company_Info");
	
	var position = $("#position");
	var position_Info = $("#position_Info");
	
	var position1Count = $("#position1").val();
	var position2Count = $("#position2").val();
	var position3Count = $("#position3").val();
	
	//On blur
	company.blur(validateCompany);
	position.blur(validatePosition);

	//On key press
    company.keyup(validateCompany);
    position.keyup(validatePosition);
	
	function validateCompany(){
		//it's NOT valid
		if(company.val().length == 0){
			company.addClass("error");
			company_Info.text("请输入公司名称！");
			company_Info.addClass("error");
			return false;
		}
		//it's valid
		else{			
			company.removeClass("error");
			company_Info.text("*");
			company_Info.removeClass("error");
			//validateConfirmPasswordAd();
			return true;
		}
	}
	
	function validatePosition(){
		//it's NOT valid
		if(position.val() == 0){
			position.addClass("error");
			position_Info.text("请选择位置！");
			position_Info.addClass("error");
			return false;
		} else if(position.val() == 1){
			if(parseInt(position1Count, 10) >= 6){
				alert("位置1只能添加6条长幅LOGO");
				position.addClass("error");
				position_Info.text("位置1只能添加6条长幅LOGO！");
				position_Info.addClass("error");
				return false;
			} else {
				position.removeClass("error");
				position_Info.text("*");
				position_Info.removeClass("error");
				return true;
			}
		} else if(position.val() == 2){
			if(parseInt(position2Count, 10) >= 6){
				alert("位置2只能添加6条长幅LOGO");
				position.addClass("error");
				position_Info.text("位置2只能添加6条长幅LOGO！");
				position_Info.addClass("error");
				return false;
			} else {
				position.removeClass("error");
				position_Info.text("*");
				position_Info.removeClass("error");
				return true;
			}
		} else if(position.val() == 3){
			if(parseInt(position3Count, 10) >= 6){
				alert("位置3只能添加6条长幅LOGO");
				position.addClass("error");
				position_Info.text("位置3只能添加6条长幅LOGO！");
				position_Info.addClass("error");
				return false;
			} else {
				position.removeClass("error");
				position_Info.text("*");
				position_Info.removeClass("error");
				return true;
			}
		}else{			
			position.removeClass("error");
			position_Info.text("*");
			position_Info.removeClass("error");
			return true;
		}
	}
	
	longLogoForm.submit(
		function(){
	    	if(validateCompany() & validatePosition()){
	            return true;
	    	} else {
	    		return false;
	    	}
	});
});