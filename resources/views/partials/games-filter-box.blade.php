<div id="games-filter-box">
    @if($active == 'casino')
    <header class="header">
        <div class="container">
            <div class="sub-box">
                <div class="games-filter">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">


                            <a href="" class="swiper-slide js-filter-games" data-game-type="favorites">
                                <div class="icon popular-icon"></div>
                                <span>{{ __('common.favorites') }}</span>
                            </a>
                            @if($active == 'casino')
                            <a href="" class="swiper-slide js-filter-games @if($active == 'casino') active @endif" data-game-type="slot">
                                <div class="icon slots-icon"></div>
                                <span>{{ __('common.slots') }}</span>
                            </a>
                            @elseif($active == 'casino-live')
                            <a href="" class="swiper-slide js-filter-games active" data-game-type="all-tables">
                                <div class="icon all-tables-icon"></div>
                                <span>{{ __('common.all_tables') }}</span>
                            </a>
                            @endif

                            @if($active == 'casino')
                            <a href="" class="swiper-slide js-filter-games" data-game-type="jackpot">
                                <div class="icon jackpot-icon"></div>
                                <span>{{ __('common.jackpot') }}</span>
                            </a>
                            @elseif($active == 'casino-live')
                            <a href="" class="swiper-slide js-filter-games" data-game-type="blackjack">
                                <div class="icon blackjack-icon"></div>
                                <span>{{ __('common.blackjack') }}</span>
                            </a>
                            @endif

                            @if($active == 'casino')
                            <a href="" class="swiper-slide js-filter-games" data-game-type="table">
                                <div class="icon on-tables-icon"></div>
                                <span>{{ __('common.table_games') }}</span>
                            </a>
                            @elseif($active == 'casino-live')
                            <a href="" class="swiper-slide js-filter-games" data-game-type="roulette">
                                <div class="icon roulette-icon"></div>
                                <span>{{ __('common.roulette') }}</span>
                            </a>
                            @endif

                            @if($active == 'casino')
                            <a href="" class="swiper-slide js-filter-games" data-game-type="video-poker">
                                <div class="icon poker-icon"></div>
                                <span>{{ __('common.video_poker') }}</span>
                            </a>
                            @elseif($active == 'casino-live')
                            <a href="" class="swiper-slide js-filter-games" data-game-type="baccarat">
                                <div class="icon baccara-icon"></div>
                                <span>{{ __('common.baccarat') }}</span>
                            </a>
                            @endif

                            @if($active == 'casino')
                            <a href="" class="swiper-slide js-filter-games" data-game-type="last">
                                <div class="icon last-games-icon"></div>
                                <span>{{ __('common.last_games') }}</span>
                            </a>
                            @elseif($active == 'casino-live')
                            <a href="" class="swiper-slide js-filter-games" data-game-type="poker">
                                <div class="icon poker-icon"></div>
                                <span>{{ __('common.poker') }}</span>
                            </a>
                            @endif
                        </div>
                    </div>
                    <button class="slider-btn swiper-button-next"></button>
                    <button class="slider-btn swiper-button-prev"></button>
                </div>
                <div class="games-search-box">
                    <span class="js-open-search" title="{{ __('common.open_search') }}">
                        <span class="icon"></span>
                        {{ __('common.search') }}
                    </span>

                    <form action="#" class="games-search-form">
                        <input type="text" class="form-control" name="games-search-box" placeholder="{{ __('games.search_games') }}" value="">
                        <button type="button" class="search-btn" title="{{ __('common.search') }}"></button>
                    </form>
                </div>
            </div>
        </div>
    </header>
    @else
    <header class="header" style="height:100%;">
        <div class="container">
            <div class="sub-box" style="justify-content: center;line-height: 100%;">
                <h1 style="display: flex;margin:0;" class="text-center">Casino-Live</h1>
            </div>
        </div>
    </header>
    @endif
    <span class="js-open-popup btn half-btn" data-popup="provider-popup">{{ __('common.provider_filter') }}</span>
</div>