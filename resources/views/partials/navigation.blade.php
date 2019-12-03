<a href="{{ URL::to('/') }}" id="logo" title="{{ __('common.go_to_main') }}"></a>
<nav id="nav">
    <ul>
        <li @if($active == 'casino') class="active"@endif>
            <a href="{{ URL::to('/casino') }}">Casino</a>
        </li>
        <li @if($active == 'casino-live') class="active"@endif>
            <a href="{{ URL::to('/casino-live') }}">Casino live</a>
        </li>
        <li @if($active == 'sport') class="active"@endif>
            <a href="{{ URL::to('/sport') }}">Sport</a>
        </li>
        <li @if($active == 'live-sport') class="active"@endif>
            @if ($active == 'sport')
                <a href="{{ URL::to('/live-sport') }}">Live Sport</a>
            @elseif($active == 'live-sport')
                <a href="{{ URL::to('/live-sport') }}">Live Sport</a>
            @else
                <!--<a href="{{ URL::to('/bingo') }}">Bingo</a>-->
            @endif
        </li>
        <li>
            <a href="{{ URL::to('/') }}#bonus-anchor">Bonus</a>
        </li>
    </ul>
    <span id="js-close-nav" title="Закрыть меню"></span>
</nav>