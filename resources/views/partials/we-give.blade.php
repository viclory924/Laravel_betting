<div class="we-give">
    @if(!Auth::user())
    <p>{!! __('common.we_give_first_depo', ['depo_amount' => '<span class="'.\strtolower('money') . '">600$</span>']) !!}</p>
    <a href="" class="btn js-open-popup" data-popup="authorization">{{ __('auth.open_account') }}</a>
    @else
    <div class="bonus-rotator">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" data-ream-more="{{ URL::to('/') }}#bonus-anchor">
                    <p>
                        <span>Lorem Ipsum</span> is simply dummy text
                    </p>
                </div>
                <div class="swiper-slide" data-ream-more="{{ URL::to('/') }}#bonus-anchor">
                    <p>
                        <span>simply dummy</span> Lorem ipsum is simply dummy
                    </p>
                </div>
                <div class="swiper-slide" data-ream-more="{{ URL::to('/') }}#bonus-anchor">
                    <p>
                        <span>dummy</span> Lorem ipsum is simply dummy
                    </p>
                </div>
            </div>
        </div>
    </div>
    <a href="" class="btn" data-popup="authorization">{{ __('common.read_more') }}</a>
    @endif
</div>