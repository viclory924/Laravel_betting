<header class="header">
    <div class="header__nav">
        <a href="/" class="header__logo">
            <img src="{{ URL::asset('img/staybet-logo.png') }}" alt="logotype">
        </a>
        <ul class="header__nav-item">
            <li>
                <a href="#">Slots</a>
            </li>
            <li>
                <a href="{{ URL::to('/sports') }}">Sport</a>
            </li>
            <li>
                <a href="#">Live casino</a>
            </li>
        </ul>
    </div>
    <div class="header__login text-right">
        @if(Auth::user())
            <?php $balanceObj = App\StaygamingBO::getBalanceByPlayerId(Auth::user()->player_id); ?>
            <div class="user-name">{{Auth::user()->name}}</div>
            <div class="user-balance">{{ $balanceObj->result->balance + $balanceObj->result->bonus }} {{ $balanceObj->result->currency }}</div>
            <a class="user-account" href="{{ URL::to('/my-account') }}">My account</a>
            <div class="">
                <a class="user-name user-logout" href="{{ URL::to('logout') }}">Logout</a>
            </div>
        @else
        <form action="{{ URL::to('/player/login') }}" method="post">
            {{ csrf_field() }}
            <label class="pull-right">
                <input type="text" class="" name="username" placeholder="USERNAME">
            </label>
            <label class="">
                <input type="password" name="password" placeholder="PASSWORD">
            </label>
            <div class="text-right">
                <button name="loginsubmit">
                    Login
                </button>
            </div>
        </form>
        @endif
    </div>
    <div class="header__wrapper">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <img class="header__banner" src="{{ URL::asset('img/top-banner.png') }}" alt="">
                </div>
                <div class="item">
                    <img class="header__banner" src="{{ URL::asset('img/top-banner.png') }}" alt="">
                </div>
                <div class="item">
                    <img class="header__banner" src="{{ URL::asset('img/top-banner.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="header__inner">
            <div class="container-fluid">
                <div class="header__links">

                </div>
            </div>
        </div>
    </div>
</header>