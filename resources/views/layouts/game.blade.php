<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env('APP_NAME')}}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/game.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">

    @if (!Auth::user())
        @include('layouts.partial.register-popup')
    @endif

    @include('layouts.partial.deposit-popup')

    @include('layouts.partial.header')

        <section class="top-content">
            <div class="top-content__inner">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <ul>
                                <li>
                                    <input type="text" name="search" id="search">
                                    <a href="#">
                                        <<
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Popular Games</a>
                                </li>
                                <li>
                                    <a href="#">Video Slots</a>
                                </li>
                                <li>
                                    <a href="#">Table Games</a>
                                </li>
                                <li>
                                    <a href="#">Scratch Cards</a>
                                </li>
                                <li>
                                    <a href="#">Video Poker</a>
                                </li>
                                <li>
                                    <a href="#">Virtual Games</a>
                                </li>
                                <li>
                                    <a href="#">Other Games</a>
                                </li>
                                <li>
                                    <a href="#">All Games</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div style="position:relative; width:100%; height:100%;">
                                <iframe id="embedgameIframe" src="{{ $game_iframe_url }}" allowfullscreen scrolling="no" frameBorder="0"  style="width:100%; height: 100%;margin: 0; padding: 0; white-space: nowrap; border: 0;"></iframe>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
</div>


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>