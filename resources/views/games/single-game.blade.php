@extends('layouts.2.app')


@section('content')
    <section class="content" style="">
        <div class="container-fluid">

            @if(Auth::user() == null)
            <h1 class="text-center">Please sign in to play the game</h1>
            @else
            
            @if(isset($game))
                <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui" />
                <meta name="apple-mobile-web-app-capable" content="yes" />
                <meta name="mobile-web-app-capable" content="yes" />
                <meta name="apple-mobile-web-app-status-bar-style" content="black" />
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

                <script type="text/javascript" src="https://flashslots.s3.amazonaws.com/prod_flash_data.js"></script>
                <script src="https://flashslots.s3.amazonaws.com/loader/build/app.js"></script>
                <script type="text/javascript">
                    window.init_loader({
                        path: "https://flashslots.s3.amazonaws.com/",
                        game: "{{$game->result->key_name}}",
                        billing: "{{$game->result->vendor_configuration->customer_id}}",
                        token: "{{$game->result->session}}",
                        kf: "10",
                        kf_list: [1,10,100,500],
                        currency: "{{$game->result->player->currency_obj->char_code}}",
                        language: "en_US",
                        home_page: "{{env('APP_URL')}}"
                    });
                </script>
                <div id="game-content"></div>
            @else
                <div class="row" style="">
                    <div class="game-iframe-wrapper" style="position:relative;">
                        @if(strpos($game_iframe_url,'iframe') !== false)
                            {!! $game_iframe_url !!}
                        @elseif(filter_var($game_iframe_url, FILTER_VALIDATE_URL))
                            <iframe id="embedgameIframe" src="{{ $game_iframe_url }}" allowfullscreen scrolling="no" frameBorder="0"  style="width:100%; height: 100%;margin: 0; padding: 0; white-space: nowrap; border: 0;"></iframe>
                        @else
                            {!! $game_iframe_url !!}
                        @endif
                    </div>
                </div>
            @endif
            @endif
        </div>
    </section>
@endsection
<script>

</script>

    <!--
    <script>
        window.onload = function () {
            document.getElementById('embedgameIframe').focus();
            window.addEventListener('resize', resizeIFrame);
            window.addEventListener('orientationchange', resizeIFrame);
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
            resizeIFrame();
            document.documentElement.style.width = "100%";
            document.documentElement.style.height = "100%";
            document.documentElement.style.overflow = 'hidden';
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
        };
    </script>
-->





