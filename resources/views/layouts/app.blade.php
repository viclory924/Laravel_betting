<!DOCTYPE html>
<html lang="{{ \App::getLocale() }}" class="index-page">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title>Leprecon Casino</title>
    @include('partials.favicon')
    <link rel="stylesheet" href="{{ asset('css/style.css?v=2.1') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css?v=5.6') }}">
</head>
<body>


<div id="all">

    @include('partials.header', ['active' => ''])

    <div id="main-screen">
        <div class="sub-box">
            <div class="container">
                <div class="character-box">
                    <div class="character"></div>
                    <img src="{{ asset('img/character-proportion.gif') }}" class="proportion" alt="">
                </div>
                <div id="main-nav">
                    <a href="{{ URL::to('/casino-live') }}" class="casino-live-link" title="Casino live">
                        <span class="chest" data-text="Casino live">Casino live</span>
                    </a>
                    <a href="{{ URL::to('/casino') }}" class="casino-link" title="Casino">
                        <span class="chest" data-text="Casino">Casino</span>
                    </a>
                    <a href="{{ URL::to('/sport') }}" class="sport-link" title="Sport">
                        <span class="chest" data-text="Sport">Sport</span>
                    </a>
                    <a href="{{ URL::to('/bingo') }}" class="bingo-link" title="Bingo">
                        <span class="chest" data-text="Bingo">Bingo</span>
                    </a>
                    <a href="{{ URL::to('/') }}#bonus-anchor" class="bonus-link" title="Bonus">
                        <span class="chest" data-text="Bonus">Bonus</span>
                    </a>
                    <img src="{{ asset('img/main-nav-proportion.gif') }}" class="proportion" alt="">
                </div>
            </div>
        </div>
        <span class="js-anchor" title="{{ __('common.down') }}"></span>
    </div>

    @yield('content')

    @include('partials.footer')

</div>

<div id="page-overlay"></div>




<div id="popup">
    <div class="container">
        @if(\Auth::user())
            @include('partials.profile-popup')
        @else
            @include('partials.recover-password-popup')
        @endif

        @include('partials.login-popup')

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
