// JavaScript Document

// JavaScript Document
jQuery(function($)
{
	$('#login-form').validate(
		{
			rules:
			{
				username:{
					required:true, email:true
				},
				password:{
					required:true
				}
			},
			messages:
			{
				username:{required:"This field is required.", email:"Please enter a valid email."},
				password:{required:"This field is required."}
			},
			show_hide_validation_div:"forgot_password_form .error_validation_area",
			submitHandler: function (form) {
				//$(".error_validation_area").hide();
				
				verifyLogin( $("#login-form") );
			},
			invalidHandler: function(e, validator)
			{
				//$(".error_validation_area").show();
			},
			validHandler: function(e, validator) {
				
				//$(".error_validation_area").hide();
			}
		}
	);
	
});

function verifyLogin(element)
{
	$.ajax({
		type: "POST",
		url: BASE_URL+"login/verify",
		data: element.serialize(),
		async: true,
		beforeSend:function()
		{
			//set_loading_system(".center_container",1);
		},
		success: function(res)
		{ 
			
			var res = $.trim(res);
			
			if( res == "error" )
			{
				$("#remote-verify-error").html("Incorrect username or password.").show();
				$(".error_validation_area").show();
				
				return false;
			}
			if( res == "success") 
			{
				$(".error_validation_area").hide();
				
				window.location.href=BASE_URL+'home/';
			}
			
		}
	});
}