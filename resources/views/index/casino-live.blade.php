@extends('layouts.casino-live')

@section('content')
    <div id="page-bg">

        <div id="top-character-bg">
            <div class="container">
                <img src="{{ asset('/img/top-character-casino-live.png') }}" class="character" alt="" />

                @include('partials.we-give')
            </div>
        </div>

        <main id="main">
            @include('partials.games-filter-box', ['active' => 'casino-live'])

            <div class="container">

                <!-- FAVORITE GAMES -->
                <div class="games-list favorite-games-items hidden">
                    <header class="header favorite-games-section">
                        <span class="type">{{ __('common.favorites') }}</span>
                        <span class="count-text">
                            <span class="text">{{ __('games.found_games') }} /</span>
                            <span class="count"></span>
                        </span>
                    </header>
                </div>

                <!-- POPULAR GAMES -->
                <div class="games-list popular-games-items">
                    <header class="header popular-games-section">
                        <span class="type">{{ __('games.popular_games') }}</span>
                        <span class="count-text">
                            <span class="text">{{ __('games.found_games') }} /</span>
                            <span class="count"></span>
                        </span>
                    </header>
                </div>

                <!-- NEW GAMES -->
                <div class="games-list new-games-items">
                    <header class="header new-games-section">
                        <span class="type">{{ __('games.new_games') }}</span>
                        <span class="count-text">
                            <span class="text">{{ __('games.found_games') }} /</span>
                            <span class="count"></span>
                        </span>
                    </header>
                </div>

                <!-- ALL GAMES -->
                <div class="games-list all-games-items">
                    <header class="header all-games-section">
                        <span class="type">{{ __('games.all_games') }}</span>
                        <span class="count-text">
                            <span class="text">{{ __('games.found_games') }} /</span>
                            <span class="count"></span>
                        </span>
                    </header>
                </div>

                <!-- SLOTS GAMES -->
                {{--<div class="games-list slots-games-items hidden">--}}
                    {{--<header class="header slots-games-section">--}}
                        {{--<span class="type">{{ __('games.slots') }}</span>--}}
                        {{--<span class="count-text">--}}
                            {{--<span class="text">{{ __('games.slots') }} /</span>--}}
                            {{--<span class="count"></span>--}}
                        {{--</span>--}}
                    {{--</header>--}}
                {{--</div>--}}

                <!-- JACKPOT GAMES -->
                {{--<div class="games-list jackpot-games-items hidden">--}}
                    {{--<header class="header jackbot-games-section">--}}
                        {{--<span class="type">{{ __('games.jackpot') }}</span>--}}
                        {{--<span class="count-text">--}}
                            {{--<span class="text">{{ __('games.jackpot') }} /</span>--}}
                            {{--<span class="count"></span>--}}
                        {{--</span>--}}
                    {{--</header>--}}
                {{--</div>--}}

                <!-- TABLE GAMES -->
                <div class="games-list jackpot-games-items hidden">
                    <header class="header table-games-section">
                        <span class="type">{{ __('games.table') }}</span>
                        <span class="count-text">
                            <span class="text">{{ __('games.table') }} /</span>
                            <span class="count"></span>
                        </span>
                    </header>
                </div>

                <!-- POKER GAMES -->
                <div class="games-list poker-games-items hidden">
                    <header class="header poker-games-section">
                        <span class="type">{{ __('games.poker') }}</span>
                        <span class="count-text">
                            <span class="text">{{ __('games.found_games') }} /</span>
                            <span class="count"></span>
                        </span>
                    </header>
                </div>

                <!-- SEARCH GAMES -->
                <div class="games-list search-games-items hidden">
                    <header class="header search-games-section">
                        <span class="type">{{ __('games.search_games_results') }}</span>
                        <span class="count-text">
                            <span class="text">{{ __('games.found_games') }} /</span>
                            <span class="count"></span>
                        </span>
                    </header>
                </div>
					
				<div class="self-container-casino-live">	
                <!-- VENDOR GAMES -->
                <div class="games-list vendor-games-items hidden">
                    <header class="header vendor-games-section">
                        <span class="type"></span>
                        <span class="count-text">
                            <span class="text">{{ __('games.found_games') }} /</span>
                            <span class="count"></span>
                        </span>
                    </header>
                </div>
				</div>
                @include('partials.ajax-upload-box')
            </div>
        </main>



        <div id="top-page-bg" class="responsimg" data-responsimg780="{{ asset('/img/top-page-casino-live-bg.png') }}" data-responsimg10="{{ asset('/img/top-page-casino-live-bg-mobile.png') }}"></div>
        <div id="bottom-page-bg" class="responsimg" data-responsimg780="{{ asset('/img/bottom-page-bg.png') }}" data-responsimg10="{{ asset('/img/bottom-page-bg-mobile.png') }}"></div>

        @include('partials.game-box')
    </div>
@endsection