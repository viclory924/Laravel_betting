$('form.deposit-form button').on('click', function (e) {
	//console.log('in deposite');
    var form = $(this).parents('form');
    var amount = $(form).find('input[name="amount"]');
    var payment_method = $(form).find('input[name="payment_method"]:checked');

    if ($(amount).val().length == 0 || $(amount).val() == '') {
        $(amount).addClass('is-invalid');
        alert('Please enter amount');
        $(amount).focus();
        return false;
    } else {
        $(amount).removeClass('is-invalid');
    }

    if (payment_method.length == 0) {
        $(payment_method).addClass('is-invalid');
        alert('Please select payment method');
        return false;
    } else {
        if ($(payment_method).val() == 'CARD') {
            $.ajax({
                type: 'post',
                // url:$('.bo_url').val() + 'lpspayment',
                url: '/lpspayment',
                data: getDepoFormFields(),
                datatype: 'json',
                // beforeSend: function(){
                // $('#loader').show();
                // $('#player-deposit-modal .modal-content').css('opacity',0.6);
                // },
                success: function success(response) {
                    console.log(response);
                    // $('#loader').show();
                    var json = $.parseJSON(response);
                    if (json.Bank_status == '00') {
                        alert("\"Payment successfully done!\"");
                        // $.ambiance({message: "Payment successfully done!",
                        //     title: "Success!",type: "success"});
                    } else {
                        alert("There is some error!");
                        // $.ambiance({message: "There is some error!",
                        //     title: "Error!",
                        //     type: "error"});
                    }
                },
                complete: function complete() {
                    $('#loader').hide();
                    $('#player-deposit-modal .modal-content').css('opacity', 1);
                    setTimeout(function () {
                        $('#player-deposit-modal').modal('hide');
                    }, 500);
                }
            });
        } else if ($(payment_method).val() == 'TRUSTLY') {

            $('#player-deposit-modal').modal('hide');
            $('#trustly-deposit-modal').modal('show');

            $.ajax($('#trustly-deposit-modal form').attr('action'), {
                method: 'post',
                data: {
                    '_token': $('input[name="_token"]').val(),
                    'amount': $('input[name="amount"]').val()
                },
                dataType: "json",
                beforeSend: function beforeSend(xhr, settings) {
                    console.log(settings);
                },
                success: function success(data) {
                    $('.trustly-deposit-popup .modal-content iframe').attr('src', data.result.url);
                }
            });
        } else {
            var url = $(form).find('input[name="depo_url"]').val() + $(form).find('input[name="amount"]').val() + '/';

            if ($(form).find('select[name="bonus_id"]').length > 0) {
                url += $(form).find('select[name="bonus_id"]').val();
            } else {
                url += $(form).find('input[name="bonus_id"]').val();
            }

            url += '/' + '1/' + $(form).find('input[name="payment_method"]:checked').val();

            if ($(form).find('input[name="payment_method"]:checked').val() == 'IDEAL') {
                url += '/' + $(form).find('select[name="bank"]').val();
            }
            console.log(url);
		    $('#invoke-payment').attr('src',url);
		    $('.simple-popup').removeClass('visible').addClass('hidden');
			$('.invoke-gateway').removeClass('hidden').addClass('visible');
		   //window.open(url, '_blank');
            // top.location.href = url;
			
		}
    }

    e.preventDefault();
});