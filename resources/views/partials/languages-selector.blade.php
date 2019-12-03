<div id="langs-box">
    <span class="current-lang">
        <img src="{{ asset("\img\\" . \App::getLocale() . "-lang.png") }}" alt="">
    </span>
    <div class="dropdown">
        @foreach(Config::get('languages') as $lang => $language)
            @if($lang == \App::getLocale())
                @continue
            @endif
            <a href="{{ route('lang.switch', $lang) }}" title="{{ $language }}">
                <img src="{{ asset('/img/' . $lang . '-lang.png') }}" alt="">
                <span>{{ $language }}</span>
            </a>
        @endforeach
    </div>
</div>