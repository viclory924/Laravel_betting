$('#full-registration-step1').validate({
			
            focusCleanup: true,
			onfocusout:false,
			onfocusin:false,
			onkeyup:false,
			debug: true,
			rules: {
                username: {
                    required: true,
                    minlength: 4,
                },
                firstname: {
                    required: true,
                    minlength: 2
                },
                lastname: {
                    required: true,
                    minlength: 2
                },
                email: {
                    required: true,
                    email: true,
                },
				password: {
					required: true,
					minlength: 8,
				},
				confirm_password: {
					
					equalTo: "#input-password"
				
				}

            },
            success: function (label, element) {
                $(element).parents('.field').find('.field-error').remove();
				//alert("yes");
            },
             
            errorPlacement: function(error, element){
				$(element).parents('.field').find('.field-error').remove();
			    var field_error = '<div class="field-error"><div class="align-m">' +
                    '<p>' + error.text() + '</p>' + '</div>' + '</div>';

                if ($(element).hasClass('select')) {
                    $(field_error).insertAfter($(element).next('span.select2'));
                } else {
                    $(field_error).insertAfter($(element));
                }


            },
		
            
 });
 
 $('#full-registration-step2').validate({
			
            focusCleanup: true,
			onfocusout:false,
			onfocusin:false,
			onkeyup:false,
			debug: true,
			
			debug: true,
			rules: {
                address: {
                    required: true,
                },
                city: {
                    required: true,
                },
                zip: {
                    required: true,
                    
                }

            },
            success: function (label, element) {
                $(element).parents('.field').find('.field-error').remove();
				//alert("yes");
            },
             
            errorPlacement: function(error, element){
			    var field_error = '<div class="field-error"><div class="align-m">' +
                    '<p>' + error.text() + '</p>' + '</div>' + '</div>';

                if ($(element).hasClass('select')) {
                    $(field_error).insertAfter($(element).next('span.select2'));
                } else {
                    $(field_error).insertAfter($(element));
                }


            },
		
            
 });
 
 
 //Submit Full registartion Forms
 
 var submitFullRegistartion = () =>{

	var registerObj = {
		username : $('input[name="username"]').val(),
		name : $('input[name="firstname"]').val()+ ' '+ $('input[name="lastname"]').val(),
		email : $('input[name="email"]').val(),
		password : $('input[name="password"]').val(),
		address : $('input[name="address"]').val(),
		city : $('input[name="city"]').val(),
		zip : $('input[name="zip"]').val(),
		country_id : $('.input_country font font').html(),
		dob : $('.input_dob_year font font').html()+'-'+$('.input_dob_month font font').html()+'-'+$('.input_dob_day font font').html(),
		merchant_id : $('input[name="merchant_id"]').val()
	}
	
	console.log(registerObj);
	
	$.post($('#full-registration-step1').attr('action'),registerObj,function(result){
		console.log(result);
	});
	
 }
 

// Start Condition
$('.full-register-next-step-reg').click(function(e){
e.preventDefault();
if (!$('#full-registration-step1').validate().form()) {
    return false;
}
$(".full-register-block-1").css("display", "none");
$(".full-register-block-2").css("display", "block");

});

//Submit Form
$('.next-step-reg').click(function(e){
	
	e.preventDefault();
	if (!$('#full-registration-step2').validate().form()) {
		return false;
	}
	submitFullRegistartion();
});
    
