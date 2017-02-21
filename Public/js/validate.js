/**
 * @author Administrator
 */
function initValidator(base){
	$("#thisForm").validate({
		onkeyup:false,
		//设置验证规则
		rules: {
			"userName": {
				required: true,
				userNameCheck: true
			},
			"passWord": {
				required: true,
				rangelength: [6, 12]
			},
			"passWordAgain": {
				required: true,
				rangelength: [6, 12],
				equalTo: "#passWord"
			},
			"corpName": {
				required: true
			},
			"realname": {
				required: true
			},
			"sms": {
				required: true,
				isMobile: true
			},
			"email": {
				required: true,
				isEmail: true
			}
		},
		//设置错误信息
		messages: {
			"userName": {
				required: "请输入用户名",
				userNameCheck: "请输入5-20位用户名，必须以字母开头"
			},
			"passWord": {
				required: "请输入密码",
				rangelength: "密码长度为6-12位"
			},
			"passWordAgain": {
				required: "请再次输入密码",
				rangelength: "密码长度为6-12位",
				equalTo: "两次输入密码不相同"
			},
			"corpName": {
				required: "请输入单位名称"
			},
			"realname": {
				required: "请填写您的真实姓名，否则将不能通过审核。"
			},
			"sms": {
				required: "请填写您的真实手机号码",
				isMobile: "请输入有效的手机号码"
			},
			"email": {
				required: "请输入邮箱",
				isEmail: "请正确填写邮箱格式"
			}
		},
		errorElement:"font",
		errorPlacement: function(error, element){
			error.appendTo(element.parent().find(".tipinfo"));
		},success:"valid",
		submitHandler:function() {
				//alert("Submitted!");
				var func = $("#thisForm").serializeArray();
				$.post("/login/register", { "func": func },
				   function(data){
			   		alert(data.info);
				   	if(data.status==1){
				   		location.href=data.url;
				   	}else{
				   		return false;
				   	}
				   }, "json");
			}
		} );


}

