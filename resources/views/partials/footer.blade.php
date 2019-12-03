<div id="temp-container"></div>
<footer id="footer">
    <div class="container">
        <div class="top-box">
            <div class="sub-nav">
                <div class="col">
                    <ul>
                        <li>
                            <a href="{{ URL::to('/about#about-us') }}" class="js-anchor">{{ __('common.about') }}</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/about#contacts') }}" class="js-anchor">{{ __('common.contacts') }}</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/about#terms-and-conditions') }}" class="js-anchor">{{ __('common.terms_and_rules') }}</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/about#responsible-gambling') }}" class="js-anchor">{{ __('common.responsible_gambling') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="col">
                    <ul>
                        <li>
                            <a href="{{ URL::to('/about#betting-rules') }}" class="js-anchor">{{ __('common.betting_rules') }}</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/about#privacy-policy') }}" class="js-anchor">{{ __('common.privacy_policy') }}</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/about#partners') }}" class="js-anchor">{{ __('common.for_partners') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="social-links">
                <a href="https://vk.com/" class="vkontakte" target="_blank" title="Vkontakte">vk</a>
                <a href="https://twitter.com/" class="twitter" target="_blank" title="Twitter"></a>
                <a href="https://facebook.com/" class="facebook" target="_blank" title="Facebook">f</a>
            </div>
            <img src="{{ asset('img/footer-logo.png') }}" id="footer-logo" alt="">
        </div>
        <div id="logos-box">
            <img src="{{ asset('img/uploads/footer-logo1.jpg') }}" alt="">
            <img src="{{ asset('img/uploads/footer-logo2.jpg') }}" alt="">
            <img src="{{ asset('img/uploads/footer-logo3.jpg') }}" alt="">
            <img src="{{ asset('img/uploads/footer-logo4.jpg') }}" alt="">
            <img src="{{ asset('img/uploads/footer-logo5.jpg') }}" alt="">
            <img src="{{ asset('img/uploads/footer-logo6.jpg') }}" alt="">
        </div>
        <div class="middle-box">
            <div class="text">
                <p>Lepreconcasino is part of the DragonGame KFT. This website is operated by DragonGame, a company registered under the laws of Hungry with registration number: 01-09-335891, registered address: 1113 Budapest, Kenese utca 3. The Lepreconcasino website is operating under license of DragonGame N.V. part of the DragonGame KFT, a company licensed and regulated by the laws of Curacao and has its sublicense issued by Gaming Services Provider N.V. #365/JAZ</p>
            </div>
            <div class="img">
                <img src="{{ asset('img/uploads/footer-img1.jpg') }}" alt="">
                <img src="{{ asset('img/uploads/footer-img2.jpg') }}" alt="">
            </div>
        </div>
        <div id="copy">
            <div id="copy-logo">
                <img src="{{ asset('img/copy-logo.jpg') }}" alt="">
            </div>
            <p>{{ __('common.all_rights_reserved') }} 2018</p>
        </div>
    </div>
</footer>