	<!DOCTYPE html>
<html lang="{{ \App::getLocale() }}" class="has-top-character casino-page">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title>Casino | Казино</title>
    @include('partials.favicon')
    <link rel="stylesheet" href="{{ asset('css/style.css?v=2.1') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css?v=5.6') }}">
    <script>
        var casino_type = "{{ $casino_type }}";
        var merchant_id = "{{ env('MERCHANT_ID') }}";
        var overlay_text = "{{ __('games.play_for_free') }}";
        var logged = {{ \Auth::user() ? "true" : "false" }};
    </script>
</head>
<body>
<div id="all">


    @include('partials.header', ['active' => 'casino'])


    @yield('content')

    <div id="top-page-bg" class="responsimg" data-responsimg780="{{ asset('img/top-page-bg.png') }}" data-responsimg10="{{ asset('img/top-page-bg-mobile.png') }}"></div>
    <div id="bottom-page-bg" class="responsimg" data-responsimg780="{{ asset('img/bottom-page-bg.png') }}" data-responsimg10="{{ asset('img/bottom-page-bg-mobile.png') }}"></div>

    @include('partials.game-box')
</div>

@include('partials.footer')

</div>
<div id="page-overlay"></div>

<div id="popup">
    <div class="container">

        @include('partials.notification')

        @include('partials.provider-popup')

        @if(\Auth::user())
            @include('partials.profile-popup')
        @else
            @include('partials.recover-password-popup')
            @include('partials.login-popup')
        @endif

        @include('partials.deposit-popup')

        <div class="simple-popup top-up-balance hidden">
            <p class="h2" data-text="Пополнить баланс">Пополнить баланс</p>

            <div class="max-w">
                <form action="#" class="form">
                    <div class="field">
                        <select name="sel1" id="sel1" class="img-select">
                            <option value="NETELLER" data-img="{{ asset('img/uploads/select-img1.png') }}">NETELLER</option>
                            <option value="NETELLER 2" data-img="{{ asset('img/uploads/select-img2.png') }}">NETELLER 2</option>
                            <option value="NETELLER 3" data-img="{{ asset('img/uploads/select-img3.png') }}">NETELLER 3</option>
                            <option value="NETELLER 4" data-img="{{ asset('img/uploads/select-img4.png') }}">NETELLER 4</option>
                        </select>
                    </div>
                    <div class="field">
                        <input type="text" class="form-control" placeholder="Введите промокод">
                        <p><a href="">Условия и правила</a></p>
                    </div>
                    <button type="button" class="btn full-width">выбрать</button>
                </form>
            </div>
            <span class="js-close-popup" title="Закрыть"></span>
        </div>

        @include('partials.choose-game-popup')

        @if(!Auth::user())
            @include('partials.registration-popup')
        @endif

        @include('partials.assistance-popup')
    </div>
</div>

@include('partials.included_scripts')

</body>
</html>