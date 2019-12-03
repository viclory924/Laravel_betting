<div class="control-box provider-popup hidden">
    <header class="header">
        <img src="{{ asset('img/footer-logo.png') }}" alt="">
    </header>
    <div class="content-box">
        <div class="sub-box">
            <ul class="choose-list">
                <?php $vendors = \App\Helpers\Functions::getGameVendors($casino_type); ?>
                @foreach ($vendors as $vendor)
                    <li><a href="" data-vendor-id="{{ $vendor->id }}">@if($vendor->display_name != null) {{ $vendor->display_name}} @else {{$vendor->name}}@endif</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <footer class="footer">
        <a href="#" class="btn js-confirm disabled">{{ __('common.confirm') }}</a>
    </footer>
    <span class="js-close-popup" title="{{ __('common.close') }}"></span>
</div>