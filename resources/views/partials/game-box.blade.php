{{--<div id="game-all">--}}
    {{--<div id="game-box">--}}
        {{--<div class="align-m">--}}
            {{--<div class="container">--}}
                {{--<div id="game-iframe-box">--}}
                    {{--<div class="sub-box">--}}
                        {{--<img src="{{ asset('/img/game-iframe-proportion.png') }}" alt="">--}}
                        {{--<iframe id="game-frame" src="#" data-ratio="16/9"></iframe>--}}
                    {{--</div>--}}
                    {{--<div class="controls">--}}
                        {{--<div class="control-btn js-full-screen">--}}
                            {{--<div class="pretty-hint">--}}
                                {{--<div class="align-m">--}}
                                    {{--<p>{{ __('common.fullscreen_mode') }}</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<span class="control-btn js-game-nav"></span>--}}
                        {{--<span class="control-btn js-game-like"></span>--}}
                    {{--</div>--}}
                    {{--<svg class="loader" width="70px" height="70px" viewbox="0 0 128 128"><g><circle cx="16" cy="64" r="16" fill="#f3d862" fill-opacity="1"></circle><circle cx="16" cy="64" r="14.344" fill="#f3d862" fill-opacity="1" transform="rotate(45 64 64)"></circle><circle cx="16" cy="64" r="12.531" fill="#f3d862" fill-opacity="1" transform="rotate(90 64 64)"></circle><circle cx="16" cy="64" r="10.75" fill="#f3d862" fill-opacity="1" transform="rotate(135 64 64)"></circle><circle cx="16" cy="64" r="10.063" fill="#f3d862" fill-opacity="1" transform="rotate(180 64 64)"></circle><circle cx="16" cy="64" r="8.063" fill="#f3d862" fill-opacity="1" transform="rotate(225 64 64)"></circle><circle cx="16" cy="64" r="6.438" fill="#f3d862" fill-opacity="1" transform="rotate(270 64 64)"></circle><circle cx="16" cy="64" r="5.375" fill="#f3d862" fill-opacity="1" transform="rotate(315 64 64)"></circle><animatetransform attributename="transform" type="rotate" values="45 64 64;90 64 64;135 64 64;180 64 64;225 64 64;270 64 64;315 64 64;0 64 64" calcmode="discrete" dur="720ms" repeatcount="indefinite"></animatetransform></g></svg>--}}
                    {{--<div class="game-bg2-left game-bg"></div>--}}
                    {{--<div class="game-bg2-right game-bg"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="message-box">--}}
                {{--<div class="game-message">--}}
                    {{--<p>Вы находитесь в режиме игры. Используйте навигацию вверху, чтобы переключаться между параметрами: <img src="{{ asset("/img/message-icon1.png") }}" alt=""><img src="{{ asset("/img/message-icon2.png") }}" alt=""></p>--}}
                    {{--<span class="js-close-message" title="Закрыть"></span>--}}
                {{--</div>--}}
                {{--<div class="game-message">--}}
                    {{--<p> Вы находитесь в гостевом режиме. <a href="" data-popup="authorization" class="js-open-popup">Войдите</a> или <a href="" data-popup="registration-popup" class="js-open-popup">зарегистрируйтесь</a>, чтобы играть по-настоящему.</p>--}}
                    {{--<span class="js-close-message" title="Закрыть"></span>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="close-box">--}}
                {{--<span class="js-close-game" title="Закрыть"></span>--}}
            {{--</div>--}}
            {{--<div class="game-bg3-left game-bg"></div>--}}
            {{--<div class="game-bg3-right game-bg"></div>--}}
            {{--<div class="game-bg4-left game-bg"></div>--}}
            {{--<div class="game-bg4-right game-bg"></div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}






<div id="game-all">
    <div id="game-box">
        <div class="align-m">
            <div class="container">
                <div id="game-iframe-box">
                    <div class="sub-box" style="overflow: hidden;">
                        <!--<img src="{{ asset('img\game-iframe-proportion.png') }}" alt="">-->
                        <!-- data-launch-width="320" data-launch-height="240" -->
						<section id="game-box-holder">
						<iframe id="game-frame" src="" data-ratio="16/9"  ></iframe>
						</section>
					</div>
                    <div class="controls">
                        <div class="control-btn js-full-screen">
                            <div class="pretty-hint">
                                <div class="align-m">
                                    <p>Полноэкранный режим</p>
                                </div>
                            </div>
                        </div>
                        <span class="control-btn js-game-nav"></span>
                        <span class="control-btn js-game-like"></span>
                    </div>
                    <svg class="loader" width="70px" height="70px" viewbox="0 0 128 128">
                        <g>
                            <circle cx="16" cy="64" r="16" fill="#f3d862" fill-opacity="1"></circle>
                            <circle cx="16" cy="64" r="14.344" fill="#f3d862" fill-opacity="1" transform="rotate(45 64 64)"></circle>
                            <circle cx="16" cy="64" r="12.531" fill="#f3d862" fill-opacity="1" transform="rotate(90 64 64)"></circle>
                            <circle cx="16" cy="64" r="10.75" fill="#f3d862" fill-opacity="1" transform="rotate(135 64 64)"></circle>
                            <circle cx="16" cy="64" r="10.063" fill="#f3d862" fill-opacity="1" transform="rotate(180 64 64)"></circle>
                            <circle cx="16" cy="64" r="8.063" fill="#f3d862" fill-opacity="1" transform="rotate(225 64 64)"></circle>
                            <circle cx="16" cy="64" r="6.438" fill="#f3d862" fill-opacity="1" transform="rotate(270 64 64)"></circle>
                            <circle cx="16" cy="64" r="5.375" fill="#f3d862" fill-opacity="1" transform="rotate(315 64 64)"></circle>
                            <animatetransform attributename="transform" type="rotate" values="45 64 64;90 64 64;135 64 64;180 64 64;225 64 64;270 64 64;315 64 64;0 64 64" calcmode="discrete" dur="720ms" repeatcount="indefinite"></animatetransform>
                        </g>
                    </svg>
                    <div class="game-bg2-left game-bg"></div>
                    <div class="game-bg2-right game-bg"></div>
                </div>
            </div>
            <div class="message-box">
                <div class="game-message">
                    <p>Вы находитесь в режиме игры. Используйте навигацию вверху, чтобы переключаться между параметрами:
                        <img src="{{ asset('/img/message-icon1.png') }}" alt=""><img src="{{ asset('/img/message-icon2.png') }}" alt=""></p>
                    <span class="js-close-message" title="Закрыть"></span>
                </div>
                @if(!\Auth::user())
                    <div class="game-message">
                        <p> Вы находитесь в гостевом режиме. <a href="" data-popup="authorization" class="js-open-popup">Войдите</a>
                            или <a href="" data-popup="registration-popup" class="js-open-popup">зарегистрируйтесь</a>,
                            чтобы играть по-настоящему.</p>
                        <span class="js-close-message" title="Закрыть"></span>
                    </div>
                @endif
            </div>
            <div class="close-box">
                <span class="js-close-game" title="Закрыть"></span>
            </div>
            <div class="game-bg3-left game-bg"></div>
            <div class="game-bg3-right game-bg"></div>
            <div class="game-bg4-left game-bg"></div>
            <div class="game-bg4-right game-bg"></div>
        </div>
    </div>
</div>