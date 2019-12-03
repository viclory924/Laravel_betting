var reg_username = $('#register-player-form input[name="username"]');
var reg_password = $('#register-player-form input[name="password"]');
var reg_confirm_password = $('#register-player-form input[name="confirm_password"]');

var login_username = $('#login-player-form input[name="username"]');
var login_password = $('#login-player-form input[name="password"]');

$('#register-player-form').on('submit', function(e){

    if (reg_confirm_password.val().length == 0 || reg_password.val().length == 0 || reg_password.val() != reg_confirm_password.val()) {
        reg_password.addClass('is-invalid');
        reg_password.parents('.form-group').addClass('has-danger');
        reg_confirm_password.addClass('is-invalid');
        reg_confirm_password.parents('.form-group').addClass('has-danger');
        alert('Passwords not match or empty');
        return false;
    } else {
        reg_confirm_password.removeClass('is-invalid');
        reg_confirm_password.parents('.form-group').removeClass('has-danger');
    }
    if (reg_confirm_password.val().length < 6 || reg_password.val().length < 6) {
        reg_password.addClass('is-invalid');
        reg_password.parents('.form-group').addClass('has-danger');
        reg_confirm_password.addClass('is-invalid');
        reg_confirm_password.parents('.form-group').addClass('has-danger');
        alert('Passwords should contain at least 6 symbols');
        return false;
    } else {
        reg_confirm_password.removeClass('is-invalid');
        reg_confirm_password.parents('.form-group').removeClass('has-danger');
    }

    var registerObj = {
        name: $('#register-player-form #name').val(),
        email: $('#register-player-form #email').val(),
        username: $('#register-player-form #username').val(),
        password: $('#register-player-form #password').val(),
        dob: $('#register-player-form #dob').val(),
        currency: $('#register-player-form #currency').val(),
        phone: $('#register-player-form #phone').val(),
        country_id: $('#register-player-form #country_id').val(),
        merchant_id: $('#register-player-form input[name="merchant_id"]').val(),
        city: $('#register-player-form input[name="city"]').val(),
        address: $('#register-player-form input[name="address"]').val(),
        zip: $('#register-player-form input[name="zip"]').val()
    };

    e.preventDefault();

    $.post(
        $('#register-player-form').attr('action'),
        registerObj,
        function(result){
            var res = $.parseJSON(result);
            if (res.status > 0) {
                $('.signup-popup').modal("hide");
                top.location.reload();
            } else {
                alert('something went wrong' + res.message);
            }
        }

    );

});

$('#login-player-submit').on('click', function(e){
    if (login_username.val().length == 0) {
        alert('Username is required');
        login_username.addClass('is-invalid');
        login_username.parents('.form-group').addClass('has-danger');
        login_username.focus();
        return false;
    } else {
        login_username.removeClass('is-invalid');
        login_username.parents('.form-group').removeClass('has-danger');
    }

    if (login_password.val().length == 0) {
        alert('Password is required');
        login_password.addClass('is-invalid');
        login_password.parents('.form-group').addClass('has-danger');
        login_password.focus();
        return false;
    } else {
        login_password.removeClass('is-invalid');
        login_password.parents('.form-group').removeClass('has-danger');
    }
    $.post(
        $('#login-player-form').attr('action'),
        {
            username: login_username.val(),
            password: login_password.val(),
        },
        function(result) {
            var res = $.parseJSON(result);

            if (res.status == 0) {
                alert(res.message);
                return false;
            } else {
                if (res.result.id > 0) {
                    top.location.reload();
                }
            }
        }
    );
    e.preventDefault();
});

$('.modal.deposit-popup button[type="submit"]').on('click', function(){
    if($('.modal.deposit-popup input[name="payment_method"]:checked').val() == undefined) {
        alert('Please select payment method first');
        return false;
    }
});

$('.modal.withdraw-popup button[type="submit"]').on('click', function(){

    var withdraw_amount = $('.modal.withdraw-popup input[name="amount"]');
    var balance = parseInt($('.navbar-collapse#navbarCollapse .player_balance').html());

    if(withdraw_amount.val() == '') {
        alert('Please enter amount to withdraw');
        withdraw_amount.addClass('is-invalid');
        withdraw_amount.parents('.form-group').addClass('has-danger');
        withdraw_amount.focus();
        return false;
    } else {
        withdraw_amount.removeClass('is-invalid');
        withdraw_amount.parents('.form-group').removeClass('has-danger');
    }

    if (balance == 0 || parseInt(withdraw_amount.val()) > balance) {
        alert('Not enough money, please check your balance');
        return false;
    }

    if($('.modal.withdraw-popup input[name="payment_method"]:checked').val() == undefined) {
        alert('Please select payment method first');
        return false;
    }
});

$('.deposit-form .psp-types input[type="radio"], .withdraw-form .psp-types input[type="radio"]').on('click', function(){
    $('.deposit-form .psp-types input[type="radio"]').removeAttr('checked');
    $('.deposit-form .psp-types input[type="radio"]').parent('label').removeClass('active');
    $(this).attr('checked','checked');
    $(this).parent('label').addClass('active');

    if ($(this).val() == 'CARD') {
        getPlayerCards($('.deposit-form #player_id').val());
    } else {
        $('#card_info').collapse('hide');

    }

    if ($(this).val() == 'IDEAL') {
        $('.bank-issuer').collapse('show');
    } else {
        $('.bank-issuer').collapse('hide');
    }
});

function getPlayerCards(pid,type = 'live'){
    var cards_dropdown = $('.deposit-form #player_card');
    var bo_url = $('.deposit-form .bo_url').val();
    $.ajax({
        type:'get',
        // url: 'https://yayaxl1.com/' + 'player-cards/'+pid+'/' + type,
        url: '/player-cards/' + pid + '/' + type,
        datatype:'json',
        data: {
            pid: pid,
            type: type
        },
        beforeSend: function(){},
        success:function(response){
            console.log('cards response');
            console.log(response);
            var response=$.parseJSON(response);
            if(response){
                var cardsOptions = '<option value="">Select</option>';
                $.each(response,function(index,value){
                    cardsOptions+='<option value="'+value.CrdStrg_Token+'">'+value.CardLast4+'</option>'
                });
                // console.log(cardsDropdown);
                // console.log($('#player_card').length);
                $(cards_dropdown).html(cardsOptions);
            }else{
                $('.deposit-form #depositNewCard').trigger('click');
                $('.new-card-fields').show();
            }

        },
        error: function(){
            $('.deposit-form #depositNewCard').trigger('click');
            $('.new-card-fields').show();
            $('.player-cards-dropdown').hide();
        }

    });
}