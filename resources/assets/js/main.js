$(document).ready(function(){
	
			$('.ajaxLoader').fadeOut('slow');
			
});



(function ($) {
    var waitForFinalEvent = (function () {
        var timer = 0;
        return function (callback, ms) {
            clearTimeout(timer);
            timer = setTimeout(callback, ms);
        };
    })();

	var intervalBalance;
    var $html = $('html'); //, isTouch = $html.hasClass('touchevents');
    var $body = $('body');
    var windowWidth = Math.max($(window).width(), window.innerWidth);

    var selected_games_type = 'slot';
    var selected_vendor = null;
    var popular_games_limit = 20;
    var new_games_limit = 10;
    var all_games_limit = 30;
    var load_more_limit = 60;
    var last_games_quantity = 10;
    var remove_empty_sections = false;
    var mobile = $('html').hasClass('touchevents');
    if (typeof casino_type == "undefined") {
        casino_type = 'casino';
    }
    if (!$.cookie('last_games')) {
        var last_games = new Array();
        $.cookie('last_games', last_games);
    } else {
        var last_games = $.cookie('last_games').split(',');
    }

    var filter_params = {
        game_type: (casino_type == 'casino') ? 'slot' : 'all-tables',
        casino_type: casino_type,
        request_total_count: true,
        locale: $.cookie('locale'),
        append: false,
        type: 'popular',
		sub_container : false
    };

    if (typeof casino_type != undefined) {
        $.extend(filter_params, {casino_type: casino_type});
    }

    /*Detect IE*/
    function detectIE() {
        var ua = window.navigator.userAgent;
        var msie = ua.indexOf('MSIE');
        var trident = ua.indexOf('Trident/');
        var edge = ua.indexOf('Edge/');
        if(msie > 0){
            $html.addClass('ie');
        }
        else if(trident > 0){
            $html.addClass('ie');
        }
        else if(edge > 0){
            $html.addClass('edge');
        }
        else{
            $html.addClass('not-ie');
        }
        return false;
    }

    detectIE();

    /*Detect ios*/
    var mac = !!navigator.platform.match(/(Mac|iPhone|iPod|iPad)/i);

    if(mac){
        $html.addClass('ios');
    }

    /*Ios fix zoom on form elems focus*/
    function cancelZoom() {
        var d = document,
            viewport,
            content,
            maxScale = ',maximum-scale=',
            maxScaleRegex = /,*maximum-scale=\d*\.*\d*/;

        // this should be a focusable DOM Element
        if (!this.addEventListener || !d.querySelector) {
            return;
        }

        viewport = d.querySelector('meta[name="viewport"]');
        content = viewport.content;

        function changeViewport(event) {
            viewport.content = content + (event.type === 'blur' ? (content.match(maxScaleRegex, '') ? '' : maxScale + 10) : maxScale + 1);
        }

        // We could use DOMFocusIn here, but it's deprecated.
        this.addEventListener('focus', changeViewport, true);
        this.addEventListener('blur', changeViewport, false);
    }

    $.fn.cancelZoom = function () {
        return this.each(cancelZoom);
    };

    if($html.hasClass('ios')) {
        $('input:text,select,textarea').cancelZoom();
    }

    /*Detect Android*/
    var ua = navigator.userAgent.toLowerCase();
    var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
    if (isAndroid) {
        $html.addClass('android');
    }
    else {
        $html.addClass('not-android');
    }


    /*RequestAnimationFrame Animate*/

   /* var runningAnimationFrame = true;
    var scrolledY;
    window.requestAnimationFrame = (function () {
        return window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.oRequestAnimationFrame ||
        window.msRequestAnimationFrame ||
        function (callback, element) {
            return window.setTimeout(callback, 1000 / 60);
        };
    })();

    function loop(){
        if(runningAnimationFrame){
            scrolledY = $(window).scrollTop();

            requestAnimationFrame(loop);
        }
    }
    requestAnimationFrame(loop);*/


    /*Responsive img*/
    if($('.responsimg').length){
        $('.responsimg').responsImg();
    }

    /*Select*/
    if($(".select").length){
        $(".select").select2({
            minimumResultsForSearch: Infinity
        });
    }

    if($(".img-select").length){
        $(".img-select").select2({
            minimumResultsForSearch: Infinity,
            templateResult: selectFormat,
            templateSelection: selectFormat
        });
    }
    function selectFormat(item){
        return $('<div class="sub-box">' + '<div class="value">' + item.text + '</div>' + '<div class="img"><img src='+$(item.element).data('img')+' /></div>' + '</div>');
    }


    if($('.form .field').length){
        var zIndex = 10;
        $('.form .field').each(function(){
            $(this).css('zIndex', zIndex);
            zIndex++;
        });
    }

    /*Header*/
    $('.touchevents #langs-box .current-lang').on('click', function(e){
        e.stopPropagation();
        if(!$(this).parents('#langs-box').hasClass('opened')){
            $(this).parents('#langs-box').addClass('opened');
        }
        else{
            $(this).parents('#langs-box').removeClass('opened');
        }
    });
    $('.touchevents #langs-box .dropdown').on('click', function(e){
        e.stopPropagation();
    });

    $('.touchevents #all').on('click', function(){
        if($('#langs-box').hasClass('opened')){
            $('#langs-box').removeClass('opened');
        }
    });


    var scrollDefaultPosition = 0;
    var wST = $(window).scrollTop();

    function stickyHeader(){
        wST = $(window).scrollTop();

        if(wST > scrollDefaultPosition){
            if($html.hasClass('scroll-top')){
                $html.removeClass('scroll-top');
                $('#header').removeClass('sticky');
            }
        }
        else if(scrollDefaultPosition > wST && !$html.hasClass('opened-game')){
            if(!$html.hasClass('scroll-top')) {
                $html.addClass('scroll-top');
                $('#header').addClass('sticky');
            }
        }
        if(wST <= 1){
            $('#header').removeClass('sticky');
        }
        scrollDefaultPosition = wST;
    }
    if($('#header').length){
        stickyHeader();
    }

    /*Clock*/
    function jsClock(){
        if($('.js-clock').length){
            $('.js-clock').each(function () {
                var $el = $(this);
                if (!$el.hasClass('clock-started')) {
                    $el.addClass('clock-started');
                    setInterval(function() {
                        var date = new Date();
                        var hours = date.getHours();
                        var minutes = date.getMinutes();
                        if (minutes < 10){
                            minutes = '0' + minutes;
                        }
                        $el.html(hours + ":" + minutes);
                    }, 1000);
                }
            });
        }
    }
    jsClock();

    function getPopularGames() {
        // console.log('getPopularGames');

        setFilterParam({type: 'popular', limit: 20,sub_container:false});
        applyFilters(true,'popular');

        return true;
    }

    function getNewGames() {
        // console.log('getNewGames');
        setFilterParam({type: 'new', limit: 10,sub_container:false});

        applyFilters(true,'new');
        return true;
    }

    function getAllGames() {
        // console.log('getAllGames');
        setFilterParam({type: 'all', limit: 30,sub_container:false});
        applyFilters(true,'all');
        return true;
    }
	
	 

    function getLastGames() {
        // console.log('getLastGames');
        $('.games-list').addClass('hidden');
        $('.ajax-upload-box').hide();
        $('.games-list.last-games-items').removeClass('hidden');

        setFilterParam({type: 'last',sub_container:false,games: $.cookie('last_games').split(',')});
        applyFilters();

        delete filter_params.games;

        return true;
    }
	
	function getFavGames() {
        // console.log('getLastGames');
        
        setFilterParam({game_type: 'favorite',sub_container:false,type: 'favorite',limit : 30, casino_type : casino_type, append : false});
		$.post('/games/get-fav',filter_params,function(games){
			//console.log(games);
			var games = JSON.parse(games);
			//console.log(games.result);
			
			placeGames(games);
			
		});
		

        return true;
    }

    function getVendorGames() {
        // console.log('getVendorGames');
        setFilterParam({vendor: selected_vendor, type: 'vendor',sub_container:false});
        $('.games-list .game-item').remove();
        $('.games-list').addClass('hidden');
        // $('.ajax-upload-box').hide();
        $('.games-list.vendor-games-items').removeClass('hidden');
        $('.games-list.vendor-games-items header .type').html($('.provider-popup').find('ul.choose-list li.active a').html());

        applyFilters();

        return true;
    }

    function emptySearch() {



        $('input[name="games-search-box"]').val('');

        $('.games-list .game-item').remove();
        $('.games-list').addClass('hidden');
        clearFilterObj();


        $('.games-list.search-games-items').addClass('hidden');
        $('.games-list.popular-games-items').removeClass('hidden');
        $('.games-list.new-games-items').removeClass('hidden');
        $('.games-list.all-games-items').removeClass('hidden');

        return true;
    }

    function search(elm) {
        // var config = {
        //     type: 'search',
        //     limit: (games_count * 2),
        //     game_type: selected_games_type,
        //     casino_type: casino_type,
        //     merchant_id: merchant_id
        // }

        if (elm.val().length > 0) {
            setFilterParam({type: 'search',sub_container:false, search: elm.val()});
        } else {
            emptySearch();

            getPopularGames();
            getNewGames();
            getAllGames();
            return false;
        }

        // Hide other games sections
        $('.games-list').each(function(){
            if (!$(this).hasClass('hidden')) {
                $(this).addClass('hidden');
            }
        });

        // show search section
        if ($('.games-list.search-games-items').hasClass('hidden')) {
            $('.games-list.search-games-items').removeClass('hidden');
        }

        // Clear search results
        $('.games-list.search-games-items .game-item').remove();

        applyFilters();
    }

    function applyFilters(changeParam=false,paramType=null,vendor_id=null) {
        var api_res;
		var isMobile = false; //initiate as false
        // device detection
        if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
            || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
            isMobile = true;
        }
        if (isMobile == true) {
            $.extend(filter_params, {is_mobile: true});
        }

        var checked_types = [];
        $('input[name="type"]:checked').each(function(){
            checked_types.push($(this).val());
        });
        $.extend(filter_params, {types: checked_types});

		//console.log(requestPath);
		$.ajax({
            url: '/games',
            method: 'post',
            dataType: 'json',
            data: filter_params,
            async: true,
            success: function(data) {
				api_res = data;
				
				if( changeParam == true )
				{
						setFilterParam({type: paramType, limit: 30,sub_container:false});
				}	

				if( vendor_id != null )
				{
					setFilterParam({type: 'vendor',vendor:vendor_id,append:false,sub_container:true});
				}
				
				placeGames(api_res);
                
				// $('.games-list.' + filter_params.type + '-games-items header .count-text .count').html($('.games-list.' + filter_params.type + '-games-items .game-item').length);
            }
        });

        return false;
    }

    function getIframeUrl(game_id, logged_in) {
		//console.log(game_id);
        var url = '';
        var request_data = {
            game_id: game_id,
            locale: $.cookie('locale'),
            merchant_id: merchant_id
        };
	var request_result = {};

        if (logged_in == true) {
            $.extend(request_data, {logged: logged_in});
        }
	if (mobile) {
		$.extend(request_data, {is_mobile: true});
	}
        $.ajax(
            '/games/get-iframe-url',
            {
                data: request_data,
                dataType: 'json',
                method: 'post',
                async: false,
                success: function(data, status, xhr) {
					//console.log(data);
                    if (data.status > 0) {
                        // console.log('> 0');
                        // console.log(data.result);
                        request_result = data;
						//console.log(request_result);
                    } else {
                         alert('something went wrong');
                        return false;
                    }
                }
            }
        );

         //console.log(url);

        return request_result.status > 0 ? request_result : null;
    }

    /*Nav*/
    $('#js-open-nav').on('click', function(e){
        e.stopPropagation();
        if(!$html.hasClass('opened-nav')){
            $html.addClass('opened-nav');
        }
    });

    $('#js-close-nav').on('click', function(e){
        e.stopPropagation();
        if($html.hasClass('opened-nav')){
            $html.removeClass('opened-nav');
        }
    });

    function navPosition(){
        if(windowWidth <= 1000 && $('#header #nav').length){
            $('#nav').insertAfter('#all');
        }
        else if(windowWidth > 1000 && !$('#header #nav').length){
            $('#nav').insertAfter('#logo');
        }
    }
    if($('#nav').length){
        navPosition();
    }


    $body.on('click', "#main-nav a[href*='#'], #nav a[href*='#']", function(e){


        var href = $(this).attr('href');

        var count = 40;
        if(windowWidth <= 780){
            count = 22
        }

        if($(href).length){
            e.preventDefault();
            var scrollToPosition = $(href).offset().top;
        }

        if($html.hasClass('opened-nav')){
            $html.removeClass('opened-nav');
        }

        $('html, body').animate({
            scrollTop: scrollToPosition - count
        }, 300);
    });

    $body.on('click', "a.js-anchor[href*='#']", function (e) {
        var href = $(this).attr('href');

        var count = 40;
        if (windowWidth <= 780) {
            count = 22
        }

        var id = '#' + href.split('#')[1];

        if ($(id).length) {
            e.preventDefault();

            if ($(id).closest('.accordion').length) {
                if ($(id).hasClass('item') && !$(id).hasClass('active')) {
                    $(id).closest('.accordion').find('.item').removeClass('active').find('.text').hide();
                    $(id).addClass('active').find('.text').show();
                } else if (!$(id).closest('.item').hasClass('active')) {
                    $(id).closest('.accordion').find('.item').removeClass('active').find('.text').hide();
                    $(id).closest('.item').addClass('active').find('.text').show();
                }
            }

            var scrollToPosition = $(id).offset().top;

            $('html, body').animate({
                scrollTop: scrollToPosition - count
            }, 300);
        }
    });

    /*Main screen*/
    $('#main-screen .js-anchor').on('click', function(){
        var scrollCount = $(this).parents('#main-screen').height();

        $('html, body').animate({
            scrollTop: scrollCount + 36
        }, 250);
    });

    function mainScreenPosition(){
        if(windowWidth <= 780 && !$('#page-bg #main-screen').length){
            var mainScreen = $('#main-screen').detach();
            $('#page-bg').prepend(mainScreen);
        }
        else if(windowWidth > 780 && $('#page-bg #main-screen').length){
            $('#main-screen').insertBefore('#page-bg');
        }
    }
    if($('#main-screen').length){
        mainScreenPosition();
    }

    /*Accordion*/
    if($('.accordion .active').length){
        $('.accordion .active .text').show();
    }
    $('.accordion .title').on('click', function(){
        var scrollCount = 16;

        var el = $(this).parents('.item');
        if(el.hasClass('active')) {
            el.removeClass('active').find('.text').slideUp(250);
        }
        else {
            $('.accordion .item').removeClass('active');
            $('.accordion .item').find('.text').hide();
            el.addClass('active').find('.text').slideDown(250);
        }

        if(!$(this).parents('.accordion').hasClass('sub-appearance')){
            $('html, body').animate({
                scrollTop: $(this).offset().top - scrollCount
            }, 300);
        }
    });

    $('.accordion.sub-appearance .item .text a').on('click', function(e){
        if($(this).next('.dropdown').length){
            e.preventDefault();
            if(!$(this).hasClass('active')){
                $(this).addClass('active').next('.dropdown').slideDown(150);
            }
            else{
                $(this).removeClass('active').next('.dropdown').slideUp(150);
            }
        }
    });

    /*Bonus list*/
    if($('.bonus-list').length){
        $('.bonus-list .item').each(function(){
            if($(this).find('.sub-link').length){
                $(this).addClass('has-sub-link');
            }
        });
    }

    /*We give*/
    $('.no-touchevents .we-give .btn').on('mouseenter', function(){
        $(this).parents('.we-give').removeClass('on-hover');
        $(this).parents('.we-give').addClass('on-hover');
        setTimeout(function(){
            $('.we-give').removeClass('on-hover');
        }, 1200);
    });

    if($('.games-filter').length){
        var gamesFilterSlider = new Swiper('.games-filter .swiper-container', {
            slidesPerView: 'auto',
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            }
        });

        $("#games-filter-box .header").stick_in_parent({
            parent: '#all',
            sticky_class: 'sticky',
            offset_top: -140
        });

        $("#games-filter-box .header").stick_in_parent().on("sticky_kit:stick", function(){
            setTimeout(function(){
                gamesFilterSlider.update();
            }, 200);
        }).on("sticky_kit:unstick", function(){
            setTimeout(function(){
                gamesFilterSlider.update();
            }, 200);
        });
    }

    /*Games filter*/
    $('.js-open-search').on('click', function(){
        if(!$html.hasClass('opened-games-search')){
            $html.addClass('opened-games-search');
            $('.jq_search_input').focus();
        }
        else{
            $html.removeClass('opened-games-search');
        }
        setTimeout(function(){
            gamesFilterSlider.update();
        }, 200);
    });

    $('.games-search-box').on('click', function(e){
        if (!$(e.target).hasClass('jq_search_btn')) {
            e.stopPropagation();
        }
    });

    $('.games-search-box input[name="games-search-box"]').on('keyup', function() {
        var elm = $(this);
        clearTimeout($.data(this, 'timer'));
        var wait = setTimeout(function(){
            search(elm);
        }, 500);
        $(this).data('timer', wait);
    });

    $('#all').on('click', function(e){
        if ($(e.target).hasClass('jq_search_btn') || $(e.target).hasClass('jq_search_input') || $(e.target).hasClass('js-open-search') || $(e.target).closest('.js-open-search').length) {
            return;
        }
        if($html.hasClass('opened-games-search')){
            $html.removeClass('opened-games-search');
            setTimeout(function(){
                gamesFilterSlider.update();
            }, 200);
        }
    });

    $(document).on('click', '.games-filter .js-filter-games', function (e) {
        e.preventDefault();

        clearFilterObj();

        // loader(true);
        if ($(this).hasClass('active')) {
            // loader(false);
            return;
        }

        if ($html.hasClass('opened-games-search')) {
            $html.removeClass('opened-games-search');
        }
        setTimeout(function () {
            gamesFilterSlider.update();
        }, 200);

        //if (!$(this).hasClass('active')) {
        $('.games-filter .js-filter-games').removeClass('active');
        $(this).addClass('active');
        //} else {
        //    $(this).removeClass('active');
        //}

        // var route_new_url = $('#sort_url').val();

        $('.jq_search_input').val('');

        var tag = $(this).data('game-type');

        setFilterParam({game_type: tag,sub_container:false});

        $('.provider_list li').removeClass('active');


        if (tag == 'last') {
            getLastGames();
        } else if(tag == 'favorites'){
			if( !logged )
			{

				$('.js-filter-games').removeClass('active');
				$(this).addClass('active');
			
			$('#popup').find('.visible').removeClass('visible').addClass('hidden');
        var dataPopup = 'authorization';
        $html.addClass('opened-popup');
        $("." + dataPopup).removeClass('hidden').addClass('visible');

        var resizeEvent = new Event('resize');
        window.dispatchEvent(resizeEvent);

        setTimeout(function(){
            var resizeEvent = new Event('resize');
            window.dispatchEvent(resizeEvent);
        }, 250);
			
			
			
			}
			else{
					getFavGames();
			}
			
		} else {
            //clearGames();
            $('.games-list .game-item').remove();
            $('.games-list').addClass('hidden');
            $('.games-list.popular-games-items').removeClass('hidden');
            $('.games-list.new-games-items').removeClass('hidden');
            $('.games-list.all-games-items').removeClass('hidden');



            getPopularGames();
            getNewGames();
            getAllGames();
        }
        
    });

    var delay = (function () {
        var timer = 0;
        return function (callback, ms) {
            clearTimeout(timer);
            timer = setTimeout(callback, ms);
        };
    })();

    $(document).on('input', '.jq_search_input', function (e) {
        var route_new_url = $('#sort_url').val();

        var text = $(this).val();

        delay(function () {
            $('.jq_search_input').addClass('bg-waiting');
            $('.jq_search_input').prop('readonly', true);
            $('.jq_search_btn').prop('disabled', true);

            var tag = $('#games-filter-box').find('.js-filter-games.active:first').data('tag') || '';
            var provider = $('.provider_list li.active:first').data('provider') || '';

            $.get(route_new_url, {tag: tag, provider: provider, s: text}, function (data) {
                $('.jq_casino_content').html(data);
                setTimeout(function () {
                    $('.jq_search_input').removeClass('bg-waiting');
                }, 400);
                $('.jq_search_input').prop('readonly', false);
                $('.jq_search_btn').prop('disabled', false);
            }, 'html').fail(function () {
                setTimeout(function () {
                    $('.jq_search_input').removeClass('bg-waiting');
                }, 400);
                $('.jq_search_input').prop('readonly', false);
                $('.jq_search_btn').prop('disabled', false);
            });
        }, 1000);

        return false;
    });

    $(document).on('click', '.jq_search_btn', function (e) {
        e.preventDefault();

        var route_new_url = $('#sort_url').val();

        var text = $('.jq_search_input').val();

        delay(function () {
            $('.jq_search_input').addClass('bg-waiting');
            $('.jq_search_input').prop('readonly', true);
            $('.jq_search_btn').prop('disabled', true);

            var tag = $('#games-filter-box').find('.js-filter-games.active:first').data('tag') || '';
            var provider = $('.provider_list li.active:first').data('provider') || '';

            $.get(route_new_url, {tag: tag, provider: provider, s: text}, function (data) {
                $('.jq_casino_content').html(data);
                setTimeout(function () {
                    $('.jq_search_input').removeClass('bg-waiting');
                }, 400);
                $('.jq_search_input').prop('readonly', false);
                $('.jq_search_btn').prop('disabled', false);
            }, 'html').fail(function () {
                setTimeout(function () {
                    $('.jq_search_input').removeClass('bg-waiting');
                }, 400);
                $('.jq_search_input').prop('readonly', false);
                $('.jq_search_btn').prop('disabled', false);
            });
        }, 50);

        return false;
    });

    //*******************************************************************************************//

    var scrollFilterDefaultPosition = 0;
    var wFilterST = $(window).scrollTop();

    function stickyFilterHeader(){
        wFilterST = $(window).scrollTop();
        if(wFilterST > scrollFilterDefaultPosition){
            if($('#games-filter-box .header').hasClass('sticky')){
                $('#games-filter-box .header').removeClass('top-indent');
            }
        }
        if(scrollFilterDefaultPosition > wFilterST){
            if($('#games-filter-box .header').hasClass('sticky')){
                $('#games-filter-box .header').addClass('top-indent');
            }
        }
        scrollFilterDefaultPosition = wFilterST;
    }

    if($('.games-filter').length){
        stickyFilterHeader();
    }


    if($('.bonus-rotator').length){
        var bonusRotator = new Swiper('.bonus-rotator .swiper-container', {
            slidesPerView: '1',
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false
            }
        });

        function readMoreUrl(){
            var readMoreUrl =  $('.bonus-rotator').find('.swiper-slide-active').attr('data-ream-more');
            $('.bonus-rotator').parents('.we-give').find('.btn').attr('href', readMoreUrl);
        }
        readMoreUrl();

        bonusRotator.on('slideChangeTransitionEnd ', function(){
            readMoreUrl();
        });

        $(".swiper-container").hover(function() {
            bonusRotator.autoplay.stop();
        }, function() {
            bonusRotator.autoplay.start();
        });
    }

    var scrollTopTouch;

    /*Game box*/
    var gameLaunchWidth, gameLaunchHeight, gameProportion, windowGameHeight;
    $(document).on('click', '.js-open-game', function(e){
        e.stopPropagation();
        e.preventDefault();
		if( !logged )
		{
			$('.js-game-like').removeClass('active');
		}
		
		//console.log('This is my fav in game'+$(this).attr('data-is-fav'));
		
		if( !logged )
		{
			$('.js-game-like').removeClass('active');
		}
		else
		{
			
		if( $(this).attr('data-is-fav') == 0 || $(this).attr('data-is-fav') == "0" )
		{	
				
			$('.js-game-like').removeClass('active');
			$('.js-game-like').attr('take-action','add');
		}
		else{
				//alert("yes");	
				$('.js-game-like').addClass('active');
				$('.js-game-like').attr('take-action','remove');
		}
        }
		
		var $link = $(this).parents('.game-item').first().find('a');

        var game_id = $link.data('game-id');
		$('.js-game-like').attr('data-game-id',game_id);
        
		if( $(this).attr('data-text') == 'Play for free' )
		{
			var playMode = false;
		}
		else
		{
			var playMode = logged;
		}
		//alert(playMode);
		if (e.target.nodeName == 'DIV') {
            var iframe_url = getIframeUrl(game_id, playMode);
			//console.log("this is in div");
        } else if (e.target.nodeName == 'SPAN') {
			//console.log("this is in span -- "+game_id);
			//var iframe_url = $(this).data('src');

            var iframe_url = getIframeUrl(game_id, playMode);
        } else if (e.target.nodeName == 'A') {
			//console.log("this is in anchor");
            
            if(logged)
			{
				game_id = $(this).data('game-id');
				var iframe_url = getIframeUrl(game_id, playMode);
			}
			else
			{
				game_id = $(this).data('src');
				var iframe_url = game_id;
			}
	}
	   // console.log(iframe_url);
	    if (typeof(iframe_url.inject_code) == "undefined") {
			$('.ajaxLoader').show();
        	$link.attr('data-src', iframe_url.result);
		var gameIframeSrc = $link.attr('data-src');
		$('#game-box-holder').html('<iframe id="game-frame" src="" data-ratio="16/9" data-launch-width="320" data-launch-height="240"></iframe>');
		 
		 $('#game-frame').attr('src', gameIframeSrc);
		 $('.ajaxLoader').fadeOut('slow');
	    
		gameLaunchWidth = $('html').find('#game-frame').attr('data-launch-width');
        gameLaunchHeight = $('html').find('#game-frame').attr('data-launch-height');
        gameProportion = gameLaunchWidth / gameLaunchHeight;
        windowGameHeight = $(window).height() - 160;
		$('#game-iframe-box .sub-box').css({width:windowGameHeight * gameProportion, height: windowGameHeight});
		$('.ajaxLoader').fadeOut('slow');
		
		} else {
		
		if( logged && mobile )
		{
			$(this).attr('data-is-inject','true');
			$(this).attr('data-src',iframe_url.result);
			//console.log(iframe_url.result);
		}			
		$('#game-frame').removeAttr('src');
		//console.log(iframe_url.result);
		var tempIframe = iframe_url.result+'<script>$(document).ready(function(){ egamingsStartNetEnt(); })</script>';
		//$('#temp-container').html(tempIframe);
		
		$('.ajaxLoader').show();
		$('#game-box-holder').html('<div data-ratio="16/9" id="game-frame"></div>');
		
		$('#game-frame').html(tempIframe);
		
		gameLaunchWidth = $('html').find('#game-frame').attr('data-launch-width');
        gameLaunchHeight = $('html').find('#game-frame').attr('data-launch-height');
        gameProportion = gameLaunchWidth / gameLaunchHeight;
        windowGameHeight = ($(window).height() - 160) + 20;
		
		
		//
		setTimeout(function(){
			
			if( $('object#egamings_container').attr('width') == undefined || $('object#egamings_container').attr('width') == 'undefined'  )
			{
				$('#game-iframe-box .sub-box').css('width',windowGameHeight * gameProportion);
		        $('#game-iframe-box .sub-box').css('height',windowGameHeight);
				$('#egamings_container').removeAttr('style');
				//alert('iframe');
			}
			else
			{
				$('#game-iframe-box .sub-box').css('width','auto');
				$('#game-iframe-box .sub-box').css('height','auto');
				//alert('object');
			}
			
			$('.ajaxLoader').fadeOut('slow');
			
		},3000);
		
		//console.log(iframe_url.result);
		}

        if (!last_games.includes($link.attr('data-game-id'))) {
            if (last_games.length >= last_games_quantity) {
                last_games.pop();
            }
            last_games.unshift($link.attr('data-game-id'));
            $.cookie('last_games', last_games);
        }

        if (mobile) {
            var mobile_launch_url = $(this).attr('data-src');
			var is_mobile_self = $(this).attr('data-is-inject');
			if( is_mobile_self == 'true' )
			{
							
						//console.log(JSON.parse(mobile_launch_url));	
						//var x = window.open();
						//x.document.open();
						if( mobile && logged )
						{
								
								$('body').append(mobile_launch_url);
							$('body').append('<script>egamingsStartNetEnt(function(){ alert("done"); });</script>');
							$('.ajaxLoader').show();
							setTimeout(function(){ window.location.href=$('iframe#egamings_container').attr('src'); }, 3000);
							//$('#egamings_container').css('display','none');
								/*var mobile_launch_url = mobile_launch_url + 
								"<script>"+
								//"document.getElementsByTagName('iframe')[0].onload = function() {"+
								"window.location.href = document.getElementsByTagName('iframe')[0].src;"+
								//"}"+
								"</script>";
								*/
							//	x.document.write(mobile_launch_url);
						}
						else{
							
							var mobile_launch_url = JSON.parse(mobile_launch_url);
								
							$('body').append(mobile_launch_url);
							$('body').append('<script>egamingsStartNetEnt(function(){ alert("done"); });</script>');
							$('.ajaxLoader').show();
							setTimeout(function(){ window.location.href=$('iframe#egamings_container').attr('src'); }, 3000);
							//$('#egamings_container').css('display','none');
						}							
						//x.document.close();
						
			}	
			else
			{
					window.open(mobile_launch_url, '_blank');
			}
			
            return false;
        }

        // $('#game-all').html(data);

        if($html.hasClass('touchevents')){
            scrollTopTouch = $(window).scrollTop();
        }

        $html.addClass('opened-game game-page');
        $('#header').removeClass('sticky');

        var gameBoxBg = $link.attr('data-img-src');
        //var gameIframeSrc = $link.attr('data-src');

        $('#game-box').addClass(gameBoxBg);
        //$('#game-frame').attr('src', gameIframeSrc);
	//console.log($('#game-frame').first().contents().find('body').html('test-test'));

        
        /*Init*/
        jsClock();

        $('.js-close-popup').trigger('click');

        var msg_key = 'msg-' + (new Date().getTime());

        $('.game-message.msg1').addClass(msg_key);
        setTimeout(function () {
            $('.game-message.msg1.' + msg_key).fadeIn(200);
        }, 5000);

        $('.game-message.msg2').addClass(msg_key);
        setTimeout(function () {
            $('.game-message.msg2.' + msg_key).fadeIn(200);
        }, 40000);
		
			
		intervalBalance = setInterval(getBalance, 2000);
		
        return false;
    });

    var msg_key = 'msg-' + (new Date().getTime());
    if ($('.game-message.msg1').length) {
        $('.game-message.msg1').addClass(msg_key);
        setTimeout(function () {
            $('.game-message.msg1.' + msg_key).fadeIn(200);
        }, 5000);
    }

    if ($('.game-message.msg2').length) {
        $('.game-message.msg2').addClass(msg_key);
        setTimeout(function () {
            $('.game-message.msg2.' + msg_key).fadeIn(200);
        }, 40000);
    }

    $(document).on('click', '.js-close-game', function(){
        if ($('html').hasClass('game-single-page')) {
            return;
        }

        if($('#header').hasClass('hidden')){
            $('#header').removeClass('hidden');
        }

        $('html').removeClass('opened-game game-page scroll-top');
        setTimeout(function () {
            // $('#game-all').html('');
        }, 200);
        $('#game-box').attr('class', '');
        $('#game-frame').attr('src', '');
        var scrollTop = $(window).scrollTop();
        if($html.hasClass('no-touchevents')){
            $('html, body').scrollTop(scrollTop - 1);
        } else{
            $('html, body').scrollTop(scrollTopTouch - 1);
        }

        if($('#game-iframe-box .js-full-screen').hasClass('active')){
            toggleFullScreen(document.body);
        }
		$('#game-box-holder').html('');
		clearInterval(intervalBalance);
		getBalance();
		
    });

    function toggleFullScreen(elem) {
        if((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
            if (elem.requestFullScreen) {
                elem.requestFullScreen();
            } else if (elem.mozRequestFullScreen) {
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullScreen) {
                elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            } else if (elem.msRequestFullscreen) {
                elem.msRequestFullscreen();
            }
        } else {
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        }
    }


    $(document).on('click', '#game-iframe-box .js-full-screen', function(){
        toggleFullScreen(document.body);
    });

    /* Standard syntax */
    document.addEventListener("fullscreenchange", function () {
        setTimeout(function () {
            windowGameHeight = $(window).height() - 160;
            $('#game-iframe-box .sub-box').css({width: windowGameHeight * gameProportion, height: windowGameHeight});
        }, 600);
    });

    /* Firefox */
    document.addEventListener("mozfullscreenchange", function () {
        setTimeout(function () {
            windowGameHeight = $(window).height() - 160;
            $('#game-iframe-box .sub-box').css({width: windowGameHeight * gameProportion, height: windowGameHeight});
        }, 600);
    });

    /* Chrome, Safari and Opera */
    document.addEventListener("webkitfullscreenchange", function () {
        setTimeout(function () {
            windowGameHeight = $(window).height() - 160;
            $('#game-iframe-box .sub-box').css({width: windowGameHeight * gameProportion, height: windowGameHeight});
        }, 600);
    });

    /* IE / Edge */
    document.addEventListener("msfullscreenchange", function () {
        setTimeout(function () {
            windowGameHeight = $(window).height() - 160;
            $('#game-iframe-box .sub-box').css({width: windowGameHeight * gameProportion, height: windowGameHeight});
        }, 1600);
    });


    if (document.addEventListener) {
        document.addEventListener('webkitfullscreenchange', exitHandler, false);
        document.addEventListener('mozfullscreenchange', exitHandler, false);
        document.addEventListener('fullscreenchange', exitHandler, false);
        document.addEventListener('MSFullscreenChange', exitHandler, false);
    }

    function exitHandler(){
        if(document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement !== null){
            if(!$('#game-iframe-box .js-full-screen').hasClass('active')){
                $('#game-iframe-box .js-full-screen').addClass('active').find('p').text('Обычный режим');
            }
            else{
                $('#game-iframe-box .js-full-screen').removeClass('active').find('p').text('Полноэкранный режим');
            }
        }
    }

    
	
	$(document).on('click','.js-game-like',function(){
			
		var gameId = $(this).attr('data-game-id');
		//alert(gameId);
		//alert(logged);
		
		if( !logged )
		{
		
        $('#popup').find('.visible').removeClass('visible').addClass('hidden');
        var dataPopup = 'authorization';
        $html.addClass('opened-popup');
        $("." + dataPopup).removeClass('hidden').addClass('visible');

        var resizeEvent = new Event('resize');
        window.dispatchEvent(resizeEvent);

        setTimeout(function(){
            var resizeEvent = new Event('resize');
            window.dispatchEvent(resizeEvent);
        }, 250);
			
		}
		else{
			
		if( $(this).attr('take-action') == 'add' )
		{
				//console.log('add-to-fev');
				$.post('/games/add-to-fav',{ game_id : gameId, casino_type : casino_type },function(res){
				var res = JSON.parse(res);
				if( res["status"] == 1 )
				{	
					$('.js-game-like').addClass('active');	
					var aId = 'a[data-game-id='+gameId+']';
					var spanId = 'span[data-game-id='+gameId+']';	
					$(aId).attr('data-is-fav','1');
					$(spanId).attr('data-is-fav','1');
					$('.js-game-like').attr('take-action','remove');
				}
				else
				{	//console.log(res.result);
				}
			});
		}
		else if( $(this).attr('take-action') == 'remove' )
		{
			//console.log('del-from-fev');
			$.post('/games/del-from-fav',{ game_id : gameId, casino_type : casino_type },function(res){
				//console.log(res);
				var res = JSON.parse(res);
				if( res["status"] == 1 )
				{	
					$('.js-game-like').removeClass('active');	
					var aId = 'a[data-game-id='+gameId+']';
					var spanId = 'span[data-game-id='+gameId+']';	
					$(aId).attr('data-is-fav','0');
					$(spanId).attr('data-is-fav','0');
					$('.js-game-like').attr('take-action','add');
				}
				else
				{	//console.log(res.result);
				}	
			});				
		}
		
		}
		
	});

    $(document).on('click', '.message-box .js-close-message', function(){
        $(this).parents('.game-message').fadeOut(200);
    });

    $(document).on('click', '.js-game-nav', function(){
        if(!$('#header').hasClass('hidden')){
            $('#header').addClass('hidden');
        }
        else{
            $('#header').removeClass('hidden');
        }
    });

    /*Ajax more games*/
    /*infinite loading*/
    var current_url;
    var loading = false;
    var ajaxUploadBox;

    $body.on('click', ".js-load-more", function(e){
        // console.log('load-more-more');
        e.preventDefault();


        var exclude = [];
        var games_category = '';

        $('.games-list:visible').each(function(){
            if ($(this).hasClass('popular-games-items')) {
                games_category = 'popular';
            } else if($(this).hasClass('new-games-items')) {
                games_category = 'new';
            } else if($(this).hasClass('all-games-items')) {
                games_category = 'all';
            } else if($(this).hasClass('vendor-games-items')) {
                games_category = 'vendor';
            }
            exclude[games_category] = [];

            $(this).find('.game-item').each(function(){
                exclude[games_category].push($(this).find('a').attr('data-game-id'));
            });

        });

        for (var i in exclude) {
            var tmp = exclude[i];
            exclude[i] = tmp.join(',');
        }

        setFilterParam({
            exclude_popular: exclude["popular"],
            exclude_new: exclude["new"],
            exclude_all: exclude["all"],
            exclude_vendor: exclude["vendor"],
            limit: load_more_limit,
            request_total_count: true,
            game_type: $('.games-filter a.active').attr('data-game-type'),
            append: true,
			sub_container:false
        });

        if (selected_vendor != null) {
            setFilterParam({type: 'vendor', vendor: selected_vendor});
            // $.extend(params, {vendor: selected_vendor});
        } else {
            setFilterParam({type: games_category, append: true});
        }

        applyFilters();

        return false;

    });

    function moreGames(url, url_data) {
        current_url = url;
        $.ajax({
            url: url,
            data: url_data,
            dataType: 'html',
            beforeSend: function () {
                loading = true;
            },
            success: function(data) {
                var content, newHref, $data = $('<div/>');
                $data.html(data);

                content =  $data.find('.games-list').html();

                $('.games-list').append(content);

                setTimeout(function(){
                    $('.games-list .game-item').removeClass('hidden');
                }, 250);

                if($data.find('.js-load-more').length){
                    newHref = $data.find('.js-load-more').data('tape_offset');
                    ajaxUploadBox.find('.js-load-more').data('tape_offset', newHref);
                }
                else{
                    ajaxUploadBox.addClass('finished').find('.js-load-more').hide();
                }

                /*Reinit*/
                //gameActions();

                loading = false;
            },
            error: function () {
                loading = false;
                alert('Page not found!');
            }
        });
    }

    /*Popup*/
    $(document).on('click', '.js-open-popup:not(.game-link)', function(e){
        e.preventDefault();
        $('#popup').find('.visible').removeClass('visible').addClass('hidden');
        var dataPopup = $(this).attr('data-popup');
        $html.addClass('opened-popup');
        $("." + dataPopup).removeClass('hidden').addClass('visible');


        /*Tain iframe resize recalc hack*/
        var resizeEvent = new Event('resize');
        window.dispatchEvent(resizeEvent);

        setTimeout(function(){
            var resizeEvent = new Event('resize');
            window.dispatchEvent(resizeEvent);
        }, 250);
    });

    $(document).on('click', '.js-open-popup.game-link', function(e){
		
		//console.log('This is my fav..!'+$(this).attr('data-is-fav'));
		
		if( $(this).attr('data-has-demo') == 0 || $(this).attr('data-has-demo') == "0"  )
		{
			$('a.sub-color.js-open-game').hide();
		}
		else
		{
			$('a.sub-color.js-open-game').show();
		}
		
		
		
        e.preventDefault();
        if ($(e.target).hasClass('js-open-game')) {
            return;
        }
        $('#popup').find('.visible').removeClass('visible').addClass('hidden');
        var dataPopup;
        if($html.hasClass('no-touchevents')){
            dataPopup = $(this).attr('data-popup');
        } else{
            dataPopup = $(this).attr('data-touch-popup');
            var btnGameSrc = getIframeUrl($(this).attr('data-game-id'), false);
            // var btnGameSrc = $(this).attr('data-game-id');
            // console.log($(this).attr('data-game-id'));
			if( typeof(btnGameSrc.inject_code) != "undefined" )
			{
					$('.choose-game-popup .js-open-game').attr('data-src', JSON.stringify(btnGameSrc.result));
					$('.choose-game-popup .js-open-game').attr('data-is-inject', true);
			}
			else{
					$('.choose-game-popup .js-open-game').attr('data-src', btnGameSrc.result);
			}			
			
        }

        var $popup = $('.' + dataPopup);

        if (dataPopup == 'choose-game-popup') {

            var image = $(this).closest('.game-item a').attr('data-img-src');
            var game_id = $(this).data('game-id');
            var game_provider = $(this).data('game_provider');

            if (image) {
                $popup.find('.choose-game-popup-image').attr('style', 'background-image:url("' + image + '")');
            } else {
                $popup.find('.choose-game-popup-image').attr('style', '');
            }

            $popup.find('.jq_real').data('id', game_id);
            $popup.find('.jq_real').data('mode', 'real');
            // $popup.find('.jq_real').data('provider', game_provider);

            $popup.find('.jq_fun').data('id', game_id);
            $popup.find('.jq_fun').data('mode', 'fun');
            // $popup.find('.jq_fun').data('provider', game_provider);

            // $popup.find('.jq_real').attr('href', '/game/' + game_provider + '/' + game_id + '/real');
            $popup.find('.jq_fun').attr('href', '/game/' + game_provider + '/' + game_id + '/fun');
        }

        $html.addClass('opened-popup');
        $popup.removeClass('hidden').addClass('visible');
    });

    $(document).on('click', '.js-close-popup', function(e){
        e.preventDefault();
        $html.removeClass('opened-popup');
        $('#popup').find('.visible').removeClass('visible').addClass('hidden');

        if($(this).parents('.assistance-popup')){
            setTimeout(function() {
                $('.assistance-popup .assistance-child, .assistance-popup .back-link').hide();
                $('.assistance-popup .main-box').show();
            }, 200);
        }
    });

    /*BINGO*/
    if ($html.hasClass('bingo-page')) {
        setTimeout(function get_bingo() {
            update_bingo_list();
            setTimeout(get_bingo, 1000);
        }, 1000);
    }

    function update_bingo_list() {

        var bingo_time_to_ajax = $('#ajax_time').val();

        $('#ajax_time').val(parseInt(bingo_time_to_ajax) + 1);

        if (bingo_time_to_ajax == 15) {

            $('#ajax_time').val(1);

            $.ajax({
                success: function (data) {
                    if (data.length != 0) {
                        for (var k = 0; k < data.length; k++) {
                            var bId = data[k].bingo.source.id,
                                gameinfo = data[k].bingo.gameinfo,
                                $game = $('#game-' + bId);

                            var $numpl = $game.find('.b_numsessionplayers');
                            $numpl.html(num_case(gameinfo.numsessionplayers, $numpl.data('one'), $numpl.data('few'), $numpl.data('many')));
                            $game.find('.time').data('bingo_time', gameinfo.timeleft);
                            $game.find('.b_pot').text(parseFloat(data[k].pots.jackpot).toFixed(2));
                            $game.find('.b_cardprice').text(gameinfo.cardprice);
                            $game.find('.b_jackpots').text(gameinfo.jackpots);
                        }
                    }
                },
                type: 'POST',
                url: '/bingo-list',
                dataType: 'json'
            });
        }

        $('.jq_countdown').each(function () {
            var count = $(this).data('bingo_time');
            var new_count = count - 1;
            if (new_count > 0) {
                $(this).data('bingo_time', new_count);

                var minutes = Math.floor(new_count % 3600 / 60);
                if (minutes <= 9) {
                    minutes = '0' + minutes;
                }
                var seconds = Math.floor(new_count % 3600 % 60);
                if (seconds <= 9) {
                    seconds = '0' + seconds;
                }

                $(this).text(minutes + ":" + seconds);
            } else {
                $(this).data('bingo_time', 0);
                $(this).text('00:00');
            }
        });
    }

    function num_case(num, one, few, many, tpl) {
        tpl = tpl || '<strong>{num}</strong> {text}';
        var num2 = num;
        var text = '';
        if (num2 > 100) {
            num2 = num2 % 100;
        }
        if (num2 >= 5 && num2 <= 20) {
            text = many;
        } else if (num2 > 20 || num2 < 5) {
            var ost = num2 % 10;
            if (ost == 1) {
                text = one;
            } else if (ost > 1 && ost < 5) {
                text = few;
            } else {
                text = many;
            }
        }
        return tpl.replace('{num}', num).replace('{text}', text);
    }
    /*End BINGO*/


    function validUrl(str) {
        var pattern = new RegExp('^(https?:\/\/)?'+ // protocol
            '((([a-z\d]([a-z\d-]*[a-z\d])*)\.)+[a-z]{2,}|'+ // domain name
            '((\d{1,3}\.){3}\d{1,3}))'+ // OR ip (v4) address
            '(\:\d+)?(\/[-a-z\d%_.~+]*)*'+ // port and path
            '(\?[;&a-z\d%_.~+=-]*)?'+ // query string
            '(\#[-a-z\d_]*)?$','i'); // fragment locater
        if(!pattern.test(str)) {
            return false;
        } else {
            return true;
        }
    }


    function setFilterParam(obj) {
        $.extend(filter_params, obj);
    }

    function clearFilterObj() {
        delete filter_params.vendor;
        delete filter_params.search;
        delete filter_params.exclude_popular;
        delete filter_params.exclude_new;
        delete filter_params.exclude_all;
        delete filter_params.exclude_vendor;
        delete filter_params.type;
        if (filter_params.casino_type == 'casino') {
            setFilterParam({game_type: 'slot'});
        } else {
            setFilterParam({game_type: 'all-tables'});
        }

        setFilterParam({append: false});

        return true;
    }

    function loader(enable) {
         //console.log('loader started');
        if (enable) {
            $('.ajaxLoader').show();
        } else {
            setTimeout(function(){
                $('.ajaxLoader').hide();
            }, 1000);
        }
        return true;
    }

    function placeGames(games) {
		//console.log(filter_params);
	   //var gameStorage = { game_id : new Array(), game_type : new Array() };
        var gamesHtml = '';

        $('.not-found-text').remove();

		//$('.ajaxLoader').show();

        // $('.games-list.' + filter_params.type + '-games-items').removeClass('hidden');

        if (filter_params.type == 'vendor') {
			if( filter_params.sub_container == false )
			{		
				$('.' + filter_params.type + '-games-section .type').html($('.provider-popup .choose-list li.active a').text());
			}
		   
        }
		
        if (games.result.length > 0) {
				
			
		
            $.each(games.result,function(index,value){
					
				
			    var game_item = '<div class="game-item">';
				
				if(filter_params.type == "favorite")
				{
						game_item += '<a href="'+(mobile ? value.iframe_logged : '#')+'" data-type="'+filter_params.type+'"  data-is-fav="1" data-has-demo="'+value.has_demo+'" class="game-link js-open-game" data-game-id="' + value.id + '" data-src="' + value.iframe_logged + '" style="background-image: url(' + value.game_img + ');">';
				}
				else
				{
					if (!logged) {
						game_item += '<a href="'+(mobile ? value.iframe_not_logged : '#')+'" data-type="'+filter_params.type+'" data-has-demo="'+value.has_demo+'" class="game-link js-open-popup" data-game-id="' + value.id + '" data-src="' + value.iframe_not_logged + '" data-touch-popup="choose-game-popup" data-popup="authorization" data-img-src="'+value.game_img+'" style="background-image: url(' + value.game_img + ');">';
					} else {
						game_item += '<a href="'+(mobile ? value.iframe_logged : '#')+'" data-type="'+filter_params.type+'"  data-is-fav="'+value.is_fav+'" data-has-demo="'+value.has_demo+'" class="game-link js-open-game" data-game-id="' + value.id + '" data-src="' + value.iframe_logged + '" style="background-image: url(' + value.game_img + ');">';
					}
				}	
                game_item += '<div class="overlay">';
				//console.log(value);
				
                if (value.has_demo == null || value.has_demo == 1) {
                    
					if(!logged)
					{
							game_item += '<span  data-text="' + overlay_text + '" data-src="' + value.iframe_logged + '" class="js-open-game" data-game-bg="static-bg">' + overlay_text + '</span>';
					}
					else
					{
						game_item += '<span data-src="' + value.iframe_logged + '" data-is-fav="'+value.is_fav+'" data-game-id="'+ value.id +'" data-text="' + overlay_text + '" class="js-open-game" data-game-bg="static-bg">' + overlay_text + '</span>';
					}
					
                }

                // if (value.has_demo == 1 || value.has_demo == null || value.iframe_not_logged.indexOf('Demo not supported') == 0) {
                //     game_item += '<span data-text="' + overlay_text + '" class="js-open-game" data-src="' + value.iframe_not_logged + '" data-game-bg="static-bg">' + overlay_text + '</span>';
                // }
                game_item += '</div>';

                if (filter_params.type == 'new' || value.is_new > 0) {
                    game_item += '<span class="novelty-label">New</span>';
                }

                game_item += '</a>' +
                    '</div>';
					
					//console.log(game_item);	
					
                // $(game_item).appendTo($('.popular-games-section-items'));

						//console.log(filter_params.append);
                if (filter_params.append) {
                    if (filter_params.type == 'vendor') {
						
						$(game_item).appendTo($('.games-list.'+filter_params.type+'-games-items'));
						
						
                    }
                    if (value.is_popular > 0) {
                        $(game_item).appendTo($('.games-list.popular-games-items'));
                    } else if(value.is_new > 0) {
                        $(game_item).appendTo($('.games-list.new-games-items'));
                    } else {
                        $(game_item).appendTo($('.games-list.all-games-items'));
                    }
                    // } else {
                    // $('.games-list header.' + type + '-games-section').find('.count-text .count').html(games.result.total_count);

                    $('.games-list').not('.hidden').each(function(){
                        $(this).find('header .count-text .count').html($(this).find('.game-item').length);
                    });

                    $('.games-list.' + filter_params.type + '-games-items header.' + filter_params.type + '-games-section .count-text .count').html($('.games-list.' + filter_params.type + '-games-items .game-item').length);
                } else {
					
					if( filter_params.sub_container == true )
						{	var tempid = 'sub-vendor-'+filter_params.vendor;
							//console.log(tempid);
							$(game_item).insertAfter($('.'+tempid+' header.' + filter_params.type + '-games-section'));
							//setFilterParam({sub_container:false});
						}
						else
						{
								$(game_item).insertAfter($('.games-list header.' + filter_params.type + '-games-section'));
						}
                    
				}
            });
				
				
				if(filter_params.type == 'favorite')
				{
					$('.games-list').addClass('hidden');
					$('.favorite-games-items').removeClass('hidden');
				}					
				//console.log(value);

            // gameActions();
        } else if (filter_params.type != 'vendor' && filter_params.type != 'favorite') {
		   $('.games-list.' + filter_params.type + '-games-items').addClass('hidden');
			//alert('else if');
			//console.log("not vendor");
            // gamesHtml = '<div>No Results</div>';
        } else {
			//alert('else');
			if( filter_params.type == 'favorite' )
			{
				$('.games-list').addClass('hidden');
				$('.favorite-games-items').removeClass('hidden');
			}
		 $('<p class="not-found-text">NO GAMES FOUND</p>').insertAfter($('.games-list.' + filter_params.type + '-games-items header'));
        }
		
		if( filter_params.sub_container == true )
		{
			   $('.games-list.sub-vendor-'+filter_params.vendor+' header.' + filter_params.type + '-games-section .count-text .count').html($('.games-list.sub-vendor-'+filter_params.vendor+' .game-item').length);
		}
		else{
				   $('.games-list.' + filter_params.type + '-games-items header.' + filter_params.type + '-games-section .count-text .count').html($('.games-list.' + filter_params.type + '-games-items .game-item').length);
		}
		
     

        // attachClickEvents(filter_params.type);



        // $('.games-list.'+type+'-games-items header .count-text .count').html(games.total_count);
        // if (type == 'all') {
        //     $('.games-list.'+type+'-games-items header .count-text .count').html(games.total_count);
        // } else {
        //     $('.games-list.' + type + '-games-items').show();
        // }
        // $('.games-list.'+type+'-games-items header .count-text .count').html($('.games-list.'+type+'-games-items .game-item').length);
        // $('.games-list.popular-games-items header .count-text .count').html($('.games-list.popular-games-items .game-item').length);
        // $('.games-list.new-games-items header .count-text .count').html($('.games-list.new-games-items .game-item').length);
        // $('.games-list.all-games-items header .count-text .count').html($('.games-list.all-games-items .game-item').length);

        // if (type == 'vendor') {
        //     $('.games-list.search-games-items').show();
        // }

		
        if (games.show_more == true) {
            $('.ajax-upload-box').show();
            $('.ajax-upload-box .js-load-more').show();
            $('.ajax-upload-box p.message').hide();
        } else {
            $('.ajax-upload-box .js-load-more').hide();
            $('.ajax-upload-box p.message').show();

        }
		
        // if (append) {
        // $('.games-list:visible').each(function(){
        //     console.log($(this));
        //
        //     total_games_in_section = $(this).find('.game-item').length;
        //     if (remove_empty_sections) {
        //         if (total_games_in_section == 0) {
        //             $(this).hide();
        //         } else {
        //             $(this).show();
        //         }
        //     }
        //     $(this).find('header .count-text .count').html(total_games_in_section);
        // });
        // } else {
        //     $('.games-list:visible').each(function(){
        //         $('.games-list.' + type + '-games-items header .count-text .count').html(games.total_count);
        //     });
        // }

        // countVisibleGames(append);


        // $('.games-list.popular-games-items, .games-list.new-games-items, .games-list.all-games-items').each(function(){
        //     count_games_in_section =
        // });

		//$('.ajaxLoader').fadeOut('slow');	
        return false;
    }

    function attachClickEvents(type) {
        var elements = [];
        $('.games-list').not('.hidden').each(function(){
            $(this).find('.game-item').each(function(){
                elements.push($(this));
            });
        });


        $('.js-close-game').on('click', function(e){

            e.preventDefault();

            if($('#header').hasClass('hidden')){
                $('#header').removeClass('hidden');
            }

            $html.removeClass('opened-game game-page scroll-top');
            $('#game-box').attr('class', '');
            $('#game-frame').attr('src', '');
            var scrollTop = $(window).scrollTop();
            if($html.hasClass('no-touchevents')){
                $('html, body').scrollTop(scrollTop - 1);
            }
            else{
                $('html, body').scrollTop(scrollTopTouch - 1);
            }


            if($('#game-iframe-box .js-full-screen').hasClass('active')) {
                toggleFullScreen(document.body);
            }
			
			clearInterval(intervalBalance);
			getBalance();
            return false;

        });

        // loader(false);
    }


    /*Private office popup*/
    if($('.private-office-tabs').length){
        $('.private-office-tabs').easyResponsiveTabs({
            type: 'default',
            width: 'auto',
            fit: true,
            tabidentify: 'tabs',
            activate: function() {
                //console.log('tab activated');
               
            }
        });

        var dataBox = $('.office-nav .nav-item.active').attr('data-box');
        $(".office-items ." + dataBox).show();
    }

    if ($('.deposit-tabs').length) {
        $('.deposit-tabs').easyResponsiveTabs({
            type: 'default',
            width: 'auto',
            fit: true,
            tabidentify: 'tabs2'
        });
    }

    $('.office-nav .nav-item').on('click', function(e){
        e.preventDefault();

        if(!$(this).hasClass('active')){
            $('.office-nav .nav-item').removeClass('active');
            $(this).addClass('active');
            var dataBox = $(this).attr('data-box');
            $('.office-items .office-item').hide();
            $(".office-items ." + dataBox).fadeIn(150);
        }
    });

    $('.js-leave-popup:not(.js-not-leave-popup)').on('click', function(e){
        e.preventDefault();
        $('.js-close-popup').trigger('click');
    });


    $('.private-office-popup .nav-item, .private-office-popup .tab-btn, .private-office-popup .resp-accordion').on('click', function(){
        var resizeEvent = new Event('resize');
        window.dispatchEvent(resizeEvent);
    });

    /*Simple popup*/

    /*Fake submit*/
    // $('.recover-password .form button').on('click', function(){
    //     $(this).parents('.recover-password').children('.max-w').hide();
    //     $(this).parents('.recover-password').find('.submit-ok-box').show();
    // });

    /*Assistance popup*/
    $('.assistance-items a[data-child]').on('click', function(e){
        e.preventDefault();

        $('#popup > .container').scrollTop(0);

        var dataChild = $(this).attr('data-child');
        $('.assistance-popup .main-box').hide();
        $("." + dataChild).show();
        $('.assistance-popup .back-link').show();
    });

    $('.assistance-popup .back-link').on('click', function(e){
        e.preventDefault();
        $('.assistance-popup .assistance-child').hide();
        $('.assistance-popup .main-box').show();
        $(this).hide();
    });

    /*Registration popup*/
    $('.js-further-step').on('click', function(e){
        e.preventDefault();

        var dataStep = $(this).attr('data-step');
        if (dataStep == 'quick-registration-complete') {

            var reg_form = $(this).parents('form');
            clearErrors($(reg_form));
            // initFormValidation('registration', reg_form);

            if ($(reg_form).validate().form()) {
                $(reg_form).submit();
            }
            // console.log();
            // validateForm('registration', reg_form);

            // $(reg_form).validate();
            //$(reg_form).find('button[type="submit"]').trigger('click');
            //console.log($(reg_form));
            //$(reg_form).validate();

            // if (!validateForm('registration', reg_form)) {
            //     console.log('reg form is not valid');
            //     return false;
            // }
            //alert('validation');

            return false;

        } else if(dataStep == 'full-registration-complete') {

            if ($('form#full-registration-step1').validate().form() && $('form#full-registration-step2').validate().form()) {

                var form_step1 = $('form#full-registration-step1');
                var form_step2 = $('form#full-registration-step2');
                var registerObj = {
                    username: $(form_step1).find('input[name="login"]').val(),
                    name: $(form_step1).find('input[name="player_firstname"]').val() + ' ' + $(form_step1).find('input[name="player_lastname"]').val(),
                    gender: $(form_step1).find('[name="gender"]').val(),
                    email: $(form_step1).find('input[name="email"]').val(),
                    currency: $(form_step1).find('[name="currency"]').val(),
                    dob: $(form_step1).find('[name="calendar2_[year]"]').val() + '-' + $(form_step1).find('[name="calendar2_[month]"]').val() + '-' + $(form_step1).find('[name="calendar2_[day]"]').val(),

                    country_id: $(form_step2).find('[name="country"]').val(),
                    city: $(form_step2).find('[name="city"]').val(),
                    address: $(form_step2).find('[name="address"]').val(),
                    zip: $(form_step2).find('[name="zip"]').val(),
                    phone: $(form_step2).find('[name="phone"]').val(),
                    promocode: $(form_step2).find('[name="promocode"]').val(),
                    password: $(form_step2).find('[name="password"]').val(),
                    merchant_id: $(form_step1).find('input[name="merchant_id"]').val(),
                };

                $.post(
                    $('form#quick_registration').attr('action'),
                    registerObj,
                    function(result){
                        var res = $.parseJSON(result);
                        if (res.status > 0) {
                            top.location.href='/player/just-registered';
                        } else {
                            alert(res.message);
                        }
                    }
                );
            }
            return false;
        }

        $(this).parents('.child').addClass('hidden');

        $("." + dataStep).removeClass('hidden');

        $('#popup > .container').scrollTop(0);
    });

    $('.js-to-step').on('click', function(e){
        e.preventDefault();

        if (!$('#full-registration-step1').validate().form()) {
            return false;
        }

        $(this).parents('.step').addClass('hidden');

        var dataStep = $(this).attr('data-step');
        $("." + dataStep).removeClass('hidden');

        $('#popup > .container').scrollTop(0);
    });

    $("#quick-input-birthDate").dateDropdowns({
        wrapperClass: 'calendar-box',
        submitFieldName: 'birthDate',
        dayLabel: 'День',
        monthLabel: 'Месяц',
        yearLabel: 'Год',
        monthLongValues: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
        daySuffixes: false,
        monthSuffixes: false
    });

    $("#input-birthDate").dateDropdowns({
        wrapperClass: 'calendar-box',
        submitFieldName: 'birthDate',
        dayLabel: 'День',
        monthLabel: 'Месяц',
        yearLabel: 'Год',
        monthLongValues: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
        daySuffixes: false,
        monthSuffixes: false
    });

    $("#calendar3").dateDropdowns({
        wrapperClass: 'calendar-box',
        submitFieldName: 'birthDate',
        dayLabel: 'День',
        monthLabel: 'Месяц',
        yearLabel: 'Год',
        monthLongValues: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
        daySuffixes: false,
        monthSuffixes: false
    });

    $('.calendar-select').select2({
        minimumResultsForSearch: Infinity
    });


    /*Control box*/
    $('.choose-list a').on('click', function (e) {
        e.preventDefault();
        if ($(this).parents('li').hasClass('inactive') || $(this).parents('li').hasClass('disabled')) {
            return;
        }
        if (!$(this).parents('li').hasClass('active')) {
            $('.choose-list li').removeClass('active');
            $(this).parents('li').addClass('active');
            $(this).parents('.control-box').find('.btn').removeClass('disabled');
        }
        else {
            $(this).parents('li').removeClass('active');
            //$(this).parents('.control-box').find('.btn:not(.sel-provider)').addClass('disabled');
			//alert('remove');
		}
        if ($(this).closest('.provider_list').length) {
            // var route_new_url = $('#sort_url').val();
			//alert("list");
            $('.jq_search_input').val('');

            var tag = $('#games-filter-box').find('.js-filter-games.active:first').data('tag') || '';
            var provider = $(this).closest('.provider_list').find('li.active:first').data('provider') || '';
			
        }
    });

    $('.js-confirm:not(.sel-lang):not(.sel-provider)').on('click', function (e) {
        if (!$('.choose-list').find('.active').length) {
            e.preventDefault();
        }
    });

    // Select language
    // $('.js-confirm.sel-lang').on('click', function (e) {
    //     e.preventDefault();
    //     alert('qwewqewqeqewq');
    //     if ($('.choose-list').find('.active').length) {

            // $.ajax({
            //     data: {
            //         set_lang: $('.choose-list').find('.active').data('code')
            //     },
            //     success: function () {
            //         window.location.reload(true);
            //         //$(this).closest(".col-right-func-select-options-wrapper").slideToggle(400);
            //     },
            //     type: 'POST',
            //     async: false,
            //     url: '/set-language',
            //     dataType: 'json'
            // });
        // }
    // });

    $('footer.footer a.select-lang').on('click', function(e){
        e.preventDefault();
        if (!$(this).hasClass('disabled')) {
            var selected_lang = $(this).parents('.select-language-popup').find('ul.choose-list li.active a').attr('data-text');
            $.cookie('locale', selected_lang);
            top.location.href = '/lang/' + selected_lang;
        }
    });

    $('.provider-popup .js-confirm').on('click', function(e){
        e.preventDefault();
        if(!$(this).hasClass('disabled')){
            $('.js-close-popup').trigger('click');
        }

        selected_vendor = $(this).parents('.provider-popup').find('ul.choose-list li.active a').attr('data-vendor-id');
		if( selected_vendor == undefined || selected_vendor == 'undefined' )
		{
			
			/* getPopularGames();
			  getNewGames();
			  getAllGames();
				
				$('.games-list').addClass('hidden');
				$('.popular-games-items').removeClass('hidden');
				$('.new-games-items').removeClass('hidden');
				$('.all-games-items').removeClass('hidden');
			*/
			location.reload();

		}
		else
		{
		//console.log(selected_vendor);
        // remove probably selected game_type
        if (filter_params.casino_type == 'casino') {
            setFilterParam({game_type: 'slot'});
			//alert("casino");
        } else {
            setFilterParam({game_type: 'all-tables'});
			//alert('al');
		}

		
			getVendorGames();
		}
			
        
    });


    $('#popup .container').on('click', function(e){
        if($(e.target).is("#popup .container")){
            $('.js-close-popup').trigger('click');
        }
    });


    /*Page overlay*/
    $('#page-overlay').on('click', function(){
        if($html.hasClass('opened-nav') && !$html.hasClass('game-single-page')){
            $html.removeClass('opened-nav');
        }
    });


    /*Add to device screen*/
    $('#js-add-to-device-screen').on('click', function(){
        $('#to-device-screen-popup').addClass('visible');
    });
    $('#to-device-screen-popup .js-close').on('click', function(){
        $('#to-device-screen-popup, #js-add-to-device-screen').fadeOut(150);
    });


    /*Keyboard controls*/
    $(document).on('keyup', function(e){
        if(e.keyCode === 27 && $html.hasClass('opened-popup')){
            $('#page-overlay, .js-close-popup').trigger('click');
        }
        if(e.keyCode === 27 && !$html.hasClass('game-single-page') && !$html.hasClass('opened-popup')){
            $('.js-close-game').trigger('click');
            if($html.hasClass('opened-games-search')){
                $html.removeClass('opened-games-search');
            }
        }
    });





    $('#login_form button').on('click', function(){
        if ($(login_form).validate().form()) {
            $(login_form).submit();
        }
    });

    $('.js-to-step').click(function(e){
        e.preventDefault();

        if (!$('#full-registration-step1').validate().form()) {
            return false;
        }

        $(this).parents('.step').addClass('hidden');

        var dataStep = $(this).attr('data-step');
        $("." + dataStep).removeClass('hidden');

        $('#popup > .container').scrollTop(0);
    });

    /*Document ready*/
    $(function(){



        if ($('#quick_registration').length > 0) {
            initFormValidation('registration', $('#quick_registration'));
        }
        if ($('#login_form').length > 0) {
            initFormValidation('login_form', $('#login_form'));
        }
        if ($('#recover_password').length > 0) {
            initFormValidation('recover_password', $('#recover_password'));
        }
        if ($('#full-registration-step1').length > 0) {
            initFormValidation('full-registration-step1', $('#full-registration-step1'));
        }
        if ($('#full-registration-step2').length > 0) {
            initFormValidation('full-registration-step2', $('#full-registration-step2'));
        }
        if ($('#change_password').length > 0) {
            initFormValidation('change_password', $('#change_password'));
        }
        if ($('#personal_data').length > 0) {
            initFormValidation('personal_data', $('#personal_data'));
        }

        if (typeof merchant_id != 'undefined') {
            setFilterParam({merchant_id: merchant_id});
        }


        // console.log($('.games-list.popular-games-items').length);

        if ($('.games-list.popular-games-items').length > 0 && $('.games-list.popular-games-items').not('.hidden')) {
            // loader(true);
            // setFilterParam({limit: 20, type: 'popular'});
            // $.extend(filter_params, {limit: 20});
            // console.log(JSON.stringify(filter_params));
			
			
			if( window.location.href == 'https://www.lepreconcasino.com/casino-live' )
			{
				 $('.games-list').addClass('hidden');
				$('.choose-list li a').each(function(){
				$('.self-container-casino-live').append('<div class="games-list sub-vendor-list sub-vendor-'+$(this).attr("data-vendor-id")+'">'+
                '<header class="header vendor-games-section">'+
                '<span class="type">'+$(this).text()+'</span>'+
                '<span class="count-text">'+
                '<span class="text">Found /</span>'+
                '<span class="count"></span>'+
                '</span>'+
                '</header>'+
               '</div>'
				
				);
				
				});				
				
				setFilterParam({type: 'vendor',vendor:28,append:false,sub_container:true});
				applyFilters(false,null,28);
				
				setFilterParam({type: 'vendor',vendor:29,append:false,sub_container:true});
				applyFilters(false,null,29);
				
				setFilterParam({type: 'vendor',vendor:30,append:false,sub_container:true});
				applyFilters(false,null,30);
				
				setFilterParam({type: 'vendor',vendor:32,append:false,sub_container:true});
				applyFilters(false,null,32);
				
				
				$('.sub-vendor-list').removeClass('hidden');
			}
			else
			{
				
			
			
			if( window.sessionStorage.after_login && ( window.sessionStorage.after_login == "1" || window.sessionStorage.after_login == 1  ))
			{	
				if( window.sessionStorage.keyword && window.sessionStorage.keyword != '' )
				{
					$('input[name="games-search-box"]').val(window.sessionStorage.keyword);
					search($('input[name="games-search-box"]'));
					//console.log('search--->'+window.sessionStorage.keyword);
				}
				else
				{
					//console.log(window.sessionStorage.game_type);	
					if( window.sessionStorage.game_type == 'favorites' )
					{		
							getFavGames();
					}
					else
					{
							setUserState();
					}
					
				}
				$('.js-filter-games').removeClass('active');
				$('.js-filter-games[data-game-type="'+window.sessionStorage.game_type+'"]').addClass('active');
				//console.log(window.sessionStorage.game_type);
				window.sessionStorage.setItem("after_login",0);
				
				if( window.sessionStorage.clicked != null )
				{
					$('.game-item a[data-game-id="'+window.sessionStorage.clicked+'"]').click();
					window.sessionStorage.clicked = null;
				}
			}
			else
			{
			 getPopularGames();
			  getNewGames();
			  getAllGames();
			

			}

			}
			}

        // console.log(filter_params);

    });

    /*Window load*/
    $(window).on('load', function(){
        $.ready.then(function(){
            $html.addClass('page-load');

            if(window.location.hash){

                var id = '#' + window.location.hash.split('#')[1];
                var count = 40;
                if(windowWidth <= 780){
                    count = 22
                }

                if ($(id).length) {

                    if ($(id).closest('.accordion').length) {
                        if ($(id).hasClass('item') && !$(id).hasClass('active')) {
                            $(id).closest('.accordion').find('.item').removeClass('active').find('.text').hide();
                            $(id).addClass('active').find('.text').show();
                        } else if (!$(id).closest('.item').hasClass('active')) {
                            $(id).closest('.accordion').find('.item').removeClass('active').find('.text').hide();
                            $(id).closest('.item').addClass('active').find('.text').show();
                        }
                    }

                    var scrollToPosition = $(id).offset().top;

                    $('html, body').animate({
                        scrollTop: scrollToPosition - count
                    }, 300);
                }
            }

            if($('.games-filter').length) {
                gamesFilterSlider.update();
            }
        });
    });

    /*Tain iframe*/
    if($('.js-iframe').length){
        $('.js-iframe').each(function(){
            $(this).iFrameResize([{
                enablePublicMethods     : true,
                heightCalculationMethod : 'lowestElement'
            }] );
        });
    }

    var resizeEnd;
    $(window).on('resize', function(){
        windowWidth = Math.max($(window).width(), window.innerWidth);


        waitForFinalEvent(function(){
            if($('#nav').length){
                navPosition();
            }
            if($('#main-screen').length){
                mainScreenPosition();
            }
        }, 100);

        clearTimeout(resizeEnd);
        resizeEnd = setTimeout(function(){
            if($('.games-filter').length) {
                gamesFilterSlider.update();
            }
        }, 500);
    });

    $(window).on('orientationchange', function(){
        windowWidth = Math.max($(window).width(), window.innerWidth);


        waitForFinalEvent(function(){
            if($('#nav').length){
                navPosition();
            }
            if($('#main-screen').length){
                mainScreenPosition();
            }
            if($('.games-filter').length) {
                gamesFilterSlider.update();
            }
        }, 450);
    });

    $(window).on('scroll', function(){

        if($('#header').length){
            stickyHeader();
        }

        if($('.games-filter').length){
            stickyFilterHeader();
        }

        clearTimeout(resizeEnd);
        resizeEnd = setTimeout(function(){

        }, 150);
    }); 

	var getBalance = function(){
		
		
		$.post('/player/get-balance',function(result){
			
			var result = JSON.parse(result);
			//console.log(result);
			if( result["status"] == 1 )
			{	
				
				
				
				$('a.deposit .sum').html(result["result"]["balance"]+' <span class="currency">'+result["result"]["currency"]+'</span>');	
				$('.sum.balance-display').html(result["result"]["balance"]+' <span class="currency">'+result["result"]["currency"]+'</span>');
				$('.sum.bonus-display').html(result["result"]["bonus"]+' <span class="currency">'+result["result"]["currency"]+'</span>');
				$('.sum.withdraw-display').html('0 <span class="currency">'+result["result"]["currency"]+'</span>');				
				//console.log(result["result"]);
			}
			else{
					//console.log("cant update");
			}
			
			
		});
	
	}
	
	
	$(document).on('click','.game-item a',function(){
		
			//alert("yes");
			
			if( window.sessionStorage.clicked )
			{
				if( logged )
				{
					window.sessionStorage.clicked = null;
				}
				else
				{
						window.sessionStorage.clicked = $(this).data('game-id');
				}
			
			}
			else
			{
				if( logged )
				{
					window.sessionStorage.setItem('clicked',null);	
				}
				else
				{
					window.sessionStorage.setItem('clicked',$(this).data('game-id'));
				}
				
			}
			
			//console.log(window.sessionStorage.clicked);
		
	});
	
	
	var setUserState = function()
	{
	 if( window.sessionStorage.games )
	 {
		 var games = JSON.parse(window.sessionStorage.games);
		 //console.log(games);
		 if( games.length > 0 )
		 {
			$('.ajaxLoader').show(); 
			for( i=0; i<games.length;i++ )
			{
				//setFilterParam({type: 'popular', limit: 20,sub_container:false});
				if( games[i].game_id.length > 0 )
				{
					var tempType = games[i].set_type;
						
						$.ajax({
							url : '/games/get-by-ids',
							data : { game_id : JSON.stringify(games[i].game_id) },
							type : 'POST',
							async : false,
							success : function(result){
								
							//console.log(result);
							if(window.sessionStorage.vendor == 'undefined' || window.sessionStorage.vendor == undefined)
							{
								setFilterParam({type: tempType, limit: 20,sub_container:false});
								placeGames(JSON.parse(result));
							}
							else
							{
								setFilterParam({type: tempType, limit: 20,vendor:window.sessionStorage.vendor,sub_container:false});
								$('.choose-list li a[data-vendor-id='+window.sessionStorage.vendor+']').parent().addClass('active');
								placeGames(JSON.parse(result));
								$('.games-list').addClass('hidden');
								$('.vendor-games-items').removeClass('hidden');	
							}	
							
							}
						});
						
					
				}
			}
			$('.ajaxLoader').fadeOut('slow');
		 }
	}
	
	}
	
	var invokeNotification = function(message,flag){
			
		var dataPopup = 'notification-popup';
        $('.notification-popup .h2').html(flag);
		$('.notification-popup .large').html(message);
		$html.addClass('opened-popup');
        $("." + dataPopup).removeClass('hidden').addClass('visible');

        var resizeEvent = new Event('resize');
        window.dispatchEvent(resizeEvent);

        setTimeout(function(){
            var resizeEvent = new Event('resize');
            window.dispatchEvent(resizeEvent);
        }, 250);
	}
	
	$(document).ready(function(){
			
			//invokeNotification('We recvied your message, We will get back to you shortly.','success');
		
			
			$('.sum').hide();
			getBalance();
			$('.sum').show();
			
			$('#supportEmail').val($('#personal_data input[placeholder="Email"]').val());
			
	});
		
	
})(jQuery);
