require('popper.js');
require('bootstrap/dist/js/bootstrap');
require('isotope-layout/js/isotope');

window.$ = window.jQuery = require('jquery');

window.load = function(){
    document.getElementById('embedgameIframe').focus();
    window.addEventListener('resize', resizeIFrame);
    window.addEventListener('orientationchange', resizeIFrame);

    resizeIFrame();
    document.documentElement.style.width = "100%";
    document.documentElement.style.height = "100%";
    //document.documentElement.style.overflow = 'hidden';
    document.body.style.width = "100%";
    document.body.style.height = "100%";
    var viewport = document.querySelector('meta[name=viewport]');
    if (!viewport) {
        var metaTag = document.createElement('meta');
        metaTag.name = 'viewport';
        metaTag.content = 'width=device-width, height=device-height, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no';
        document.getElementsByTagName('head')[0].appendChild(metaTag);
    }
    else {
        viewport.setAttribute('content', 'width=device-width, height=device-height, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no');
    }
}

var games_count = getGamesCountDependsOnResolution();

$(function() {
    iframeloaded();

    // support chat
    (function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
            'https://playspin.ladesk.com/scripts/track.js',
            function(e){ LiveAgent.createButton('b951f98f', e); });
    // getPopularGames();

    // getTableGames();

    $('.search-block-wrapper .search-field').keyup(function() {
        var elm = $(this);
        clearTimeout($.data(this, 'timer'));
        var wait = setTimeout(function(){
            search(elm);
        }, 500);
        $(this).data('timer', wait);
    });

    $('.main-menu nav a.game-type').on('click', function(e) {

    });

    $('.filters-wrapper .vendors input[type="checkbox"]').on('change', function(){

        clearGames();
        var type = 'all';
        var vendors = [];
        $('.games-section').each(function() {
            if ($(this).hasClass(type+'-games') == false) {
                $(this).addClass('d-none');
            } else {
                $(this).removeClass('d-none');
            }
        });

        var exclude = [];
        $('.games-section').not('.d-none, .popular-games').find('.game-item').each(function(){
            exclude.push($(this).attr('data-game-id'));
        });
        games = applyFilters({limit: games_count,vendors: getCheckedVendors()});
        placeGames(games, 'all');
    });
});

if ($('.games-section.all-games').is(':visible')) {
    getAllGames();
}

if ($('.games-section.live-casino-games').is(':visible')) {
    getLiveCasinoGames();
}

if ($('.games-section.popular-games').is(':visible')) {
    getPopularGames({limit: games_count});
}

if ($('.games-section.casino-games').is(':visible')) {
    getCasinoGames();
}

if ($('.games-section.table-games').is(':visible')) {
    if($('.games-section.table-games').attr('data-param')) {
        getTableGames({limit: getGamesCountDependsOnResolution('table')});
    } else {
        getTableGames();
    }
}

$('.languages a.dropdown-item').on('click', function(e){
    e.preventDefault();
});

$('#banners-carousel').carousel({
    interval: 4000,
    ride: true
});

$('.responsive-button').on('click', function(){
    $('.main-menu').toggleClass('active');
});

$('.show-more').on('click', function(e) {

    var type = $(this).parents('.games-section').attr('data-games-type');
    var exclude = [];

    $(this).parents('.games-section').find('.game-item').each(function(){
        exclude.push($(this).attr('data-game-id'));
    });

    var params = {
        exclude: exclude,
        limit: (games_count * 2)
    };

    if (type == 'popular') {
        $.extend(params, {type: 'popular'});
    }

    if (type == 'all') {
        $.extend(params, {vendors:getCheckedVendors()});
    }

    if (type == 'table') {
        $.extend(params, {type: 'table'});
    }

    var games = applyFilters(params);

    if (games.result.length == 0 || games.show_more == false) {
        $(this).addClass('d-none');
    }

    placeGames(games, type, true);
    e.preventDefault();
});

$('#filters-block .clear-filters').on('click', function(){

    clearFilters();

    $('.games-section').each(function(){
        $(this).find('.row.games').html('');
        $(this).addClass('d-none');
    });

    $('.games-section.popular-games, .games-section.table-games').removeClass('d-none');
    getPopularGames({limit:games_count});
    getTableGames({limit:games_count});
});

$('.logout').on('click', function(e){
    top.location.href = '/logout';
    e.preventDefault();
});

$('.search-form #categories').on('change', function(){
    top.location.href=BASEURL+'/?type=' + $(this).val();
});

$('form.deposit-form button').on('click', function(e) {

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
                success: function (response) {
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
                complete: function () {
                    $('#loader').hide();
                    $('#player-deposit-modal .modal-content').css('opacity', 1);
                    setTimeout(function () {
                        $('#player-deposit-modal').modal('hide');
                    }, 500);

                }
            });

        } else if($(payment_method).val() == 'TRUSTLY') {

            $('#player-deposit-modal').modal('hide');
            $('#trustly-deposit-modal').modal('show');

            $.ajax($('#trustly-deposit-modal form').attr('action'), {
                method: 'post',
                data: {
                    '_token': $('input[name="_token"]').val(),
                    'amount': $('input[name="amount"]').val()
                },
                dataType: "json",
                beforeSend: function(xhr, settings){
                    console.log(settings);
                },
                success: function(data){
                    $('.trustly-deposit-popup .modal-content iframe').attr('src', data.result.url);
                }
            });
        } else {
            var url = $(form).find('input[name="depo_url"]').val()
                + $(form).find('input[name="amount"]').val()
                + '/';

            if ($(form).find('select[name="bonus_id"]').length > 0) {
                url += $(form).find('select[name="bonus_id"]').val();
            } else {
                url += $(form).find('input[name="bonus_id"]').val();
            }

            url += '/' + '1/'
                + $(form).find('input[name="payment_method"]:checked').val();

            if ($(form).find('input[name="payment_method"]:checked').val() == 'IDEAL') {
                url += '/' + $(form).find('select[name="bank"]').val();
            }
            top.location.href = url;
        }
    }

    e.preventDefault();
});

$('.deposit-form #depositNewCard').on('click', function(){
    $(this).parents('.deposit-form').find('#player_card').parents('.form-group').hide();
});

function clearFilters() {
    // empty all games sections
    $('.games-section').each(function() {
        $(this).find('.row.games').html('');
    });

    // uncheck all vendors
    $('.filters-wrapper .vendors input[type="checkbox"]').each(function(){
        if ($(this).is(':checked')) {
            $(this).prop('checked', false);
        }
    });

    // empty search field
    $('.search-block-wrapper .search-field').val('');
}

function resizeIFrame() {
    var iframe = document.getElementById('embedgameIframe');
    var parent = iframe.parentNode;
    if (parent) {
        var rect = parent.getBoundingClientRect();
        iframe.style.width = rect.width + 'px';
        iframe.style.height = rect.height + 'px';
        iframe.style.left = '0px';
        iframe.style.top = '0px';
        iframe.style.position = 'absolute';
    }
}

function orientationChangeGameIframe() {
    var eyeconGameFrame = document.getElementById('embedgameIframe').contentWindow;
    eyeconGameFrame.postMessage({ "name": "changeOrientation" }, "*");
}

function iframeloaded() {
	var embedgameIframe = document.getElementById('embedgameIframe');
	if (!embedgameIframe) {
		console.log('I returned early, no iframe here!');
		return;
	}
    var eyecon_url = embedgameIframe.src;
    var eyecon_vendor = 'eyecon';
    if (eyecon_url.indexOf(eyecon_vendor) !== -1) {
        console.log("I am an eyecon game !");
        var eyeconGameFrame = document.getElementById('embedgameIframe').contentWindow;
		window.addEventListener('orientationchange', orientationChangeGameIframe);
        window.addEventListener("message", function (event) {
            console.log("Loaded event name : ");console.log(event.data.name);
            if (event.data.name == "gameClose") {
                console.log("game close");
                window.location.href = window.location.protocol + "//" + window.location.hostname;
            }
        });
    }
}

function search(elm) {
    var type= 'all';
    var config = {
        limit: (games_count * 2),
    }

    if (elm.val().length > 0) {
        config.search = elm.val();
    }

    // clear found items
    $('.games-section.'+type+'-games .row.games').html('');

    $('.games-section').each(function() {
        if ($(this).hasClass(type+'-games') == false) {
            $(this).addClass('d-none');
        } else {
            $(this).removeClass('d-none');
        }
    });

    games = applyFilters(config);
    placeGames(games, 'all');
}

function getPopularGames(additional_params) {
    var params = {
        type: 'popular'
    }

    $.extend(params, additional_params);
    $.extend(params, collectParams());

    console.log(params);

    return false;

    var games = applyFilters(params);
    placeGames(games, 'popular');

    if (games.show_more == true) {
        $('.games-section.popular-games .row .view-more').removeClass('d-none');
    } else {
        $('.games-section.popular-games .row .view-more').addClass('d-none');
    }
}

function getTableGames(additional_params) {
    var params = {type: 'table'};
    $.extend(params, additional_params);
    $.extend(params, collectParams());
    var games = applyFilters(params);
    placeGames(games, 'table');
}

function getCasinoGames(params) {
    var params = {type: 'casino'};
    $.extend(params, collectParams());
    var games = applyFilters(params);
    placeGames(games, 'casino');
}

function applyFilters(params) {

    var api_res;

    var isMobile = false; //initiate as false
    // device detection
    if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
        || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
        isMobile = true;
    }
    if (isMobile == true) {
        $.extend(params, {is_mobile: true});
    }

    var checked_types = [];
    $('input[name="type"]:checked').each(function(){
        checked_types.push($(this).val());
    });
    $.extend(params, {types: checked_types});

    $.ajax({
        url: '/games',
        method: 'post',
        dataType: 'json',
        data: params,
        async: false,
        success: function(data) {
            api_res = data;
        }
    });

    return api_res;
}

function placeGames(games, type, append = false) {
    var gamesHtml = '';

    if (games.result.length > 0) {
        $.each(games.result,function(index,value){
            gamesHtml+='<div class="grid-item">' +
                '<div class="game-item align-items-baseline" data-game-id="'+value.id+'" style="background-image:url('+value.game_img+');">' +
                '<a href="/game/' + value.vendor_game_id + '"><div class="overlay"></div><div class="game-title">'+value.name+'</div></a>' +
                '</div>' +
                '</div>';
        });
    } else {
        gamesHtml = '<div class="col d-block text-center">No Results</div>';
    }
    $('.games-section.'+type+'-games .row.games img.loader').remove();
    $('.games-section.'+type+'-games .row.games').append(gamesHtml);

    if (games.show_more == true) {
        $('.games-section.'+type+'-games .view-more').removeClass('d-none');
    } else {
        $('.games-section.'+type+'-games .view-more').addClass('d-none');
    }
}

function getCheckedVendors() {
    var vendors = [];
    $('.vendors input[name="vendor"]').each(function(){
        if ($(this).is(':checked')) {
            vendors.push($(this).val());
        }
    });

    return vendors;
}

function collectParams(default_params) {
    var params = {};

    if (default_params != null) {
        $.extend(params, default_params);
    }

    // here we will get all games which we need to exclude from select
    // var exclude = [];
    // $('.games-section').not('.d-none').find('.game-item').each(function(){
    //     exclude.push($(this).attr('data-game-id'));
    // });
    // $.extend(params, {exclude: exclude});


    // VENDORS - get all checked vendors
    var vendors = getCheckedVendors();
    $.extend(params, {vendors: vendors});

    // main menu selected item (choosen game type)

    return params;
}

function clearGames() {
    $('.games-section.all-games .row.games').html('');
}

function getAllGames() {
    var params = {type: 'all'};
    $.extend(params, collectParams());
    var games = applyFilters(params);
    placeGames(games, 'all');
}

function getLiveCasinoGames() {
    var params = {type: 'live-casino'};
    $.extend(params, collectParams());
    var games = applyFilters(params);
    placeGames(games, 'live-casino');
}

function getDepoFormFields() {
    var data = {
        _token: $('input[name="_token"]').val(),
        account_type: $('input[name="account_type"]').val(),
        first_name: $('input[name="first_name"]').val(),
        last_name: $('input[name="last_name"]').val(),
        email: $('input[name="email"]').val(),
        phone: $('input[name="phone"]').val(),
        address: $('input[name="address"]').val(),
        city: $('input[name="city"]').val(),
        state: $('input[name="state"]').val(),
        country: $('input[name="country"]').val(),
        country_three: $('input[name="country_three"]').val(),
        zip: $('input[name="zip"]').val(),
        player_card: $('input[name="player_card"]').val(),
        new_card: $('input[name="new_card"]').val(),
        cardtype: $('input[name="cardtype"]').val(),
        card_no: $('input[name="card_no"]').val(),
        exp_month: $('input[name="exp_month"]').val(),
        exp_year: $('input[name="exp_year"]').val(),
        cvv: $('input[name="cvv"]').val(),
        amount: $('input[name="amount"]').val(),
        currency: $('input[name="currency"]').val(),
        player_id: $('input[name="player_id"]').val(),
        bank: $('select[name="bank"]').val()
    };

    if ($('.deposit-form').find('select[name="bonus_id"]').length > 0) {
        $.extend(data, {bonus_id: $('.deposit-form').find('select[name="bonus_id"]').val()});
    } else {
        $.extend(data, {bonus_id: $('.deposit-form').find('input[name="bonus_id"]').val()});
    }

    return data;
}

function getGamesCountDependsOnResolution(type = null) {
    var resolution_width = window.screen.availWidth;
    var limit = 84;
    var rows = 12;
    var col_count = 1;

    if (type == 'table') {
        limit = 20;
    }

    if (resolution_width < 320) {
        col_count = 1;
    }

    if (resolution_width >= 320 && resolution_width <= 575) {
        col_count = 2;
    }
    if (resolution_width > 575 && resolution_width <= 640) {
        col_count = 3;
    }

    if (resolution_width > 640 && resolution_width <= 667) {
        col_count = 4;
    }

    if (resolution_width > 667 && resolution_width <= 768) {
        col_count = 4;
    }

    if (resolution_width > 768 && resolution_width <= 1024) {
        col_count = 5;
    }

    if (resolution_width > 1024 && resolution_width <= 1440) {
        col_count = 6;
    }

    if (resolution_width > 1024 && resolution_width <= 1920) {
        col_count = 7;
    }
    if (resolution_width > 1920 && resolution_width <= 2132) {
        col_count = 8;
    }

    if (resolution_width > 2132 && resolution_width <= 2560) {
        col_count = 9;
    }

    if (resolution_width > 2561 ) {
        col_count = 10;
    }

    rows = Math.floor(limit / col_count);

    return col_count * rows;
}