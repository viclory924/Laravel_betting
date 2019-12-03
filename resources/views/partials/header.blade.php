<header id="header">
    <div class="container">
        @include('partials.navigation', ['active' => $active])
        <div class="js-clock"></div>
        <div class="controls">

            @if (Auth::user())
                <?php $balanceObj = App\StaygamingBO::getBalanceByPlayerId(Auth::user()->player_id); ?>
                <a href="" data-popup="payment-order" class="icon-btn deposit js-open-popup">
                    <span class="icon"></span>
                    {!! \App\Helpers\Functions::displayBalance($balanceObj) !!}
                </a>
                <a href="" data-popup="private-office-popup" class="icon-btn account js-open-popup">
                    <span class="icon"></span>
                </a>
            @else
                <a href="#" data-popup="registration-popup" class="btn sub-color small-btn js-open-popup">{{ __('auth.registration') }}</a>
                <a href="" data-popup="authorization" class="icon-btn login js-open-popup">
                    <span class="icon"></span>
                </a>
            @endif

            <a href="" data-popup="assistance-popup" class="icon-btn assistance js-open-popup">
                <span class="icon"></span>
            </a>

            @include('partials.languages-selector')

        </div>
        <span id="js-open-nav" title="{{ __('common.open_menu') }}">
                <span></span>
                <span></span>
                <span></span>
            </span>
    </div>
</header>