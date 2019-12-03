<div class="simple-popup authorization hidden">
    <p class="h2" data-text="{{ __('auth.signin') }}">{{ __('auth.signin') }}</p>
    <div class="max-w">
        <form class="form login-form" id="login_form" action="{{ Url::to('/player/login') }}" method="post">
            <div class="field">
                <input type="text" name="login_username" id="login_username" class="form-control icon-login" placeholder="{{ __('auth.your_login') }}">
            </div>
            <div class="field error-field">
                <input type="password" class="form-control icon-password" name="login_password" id="login_password" placeholder="{{ __('auth.your_password') }}">
                <p><a href="" data-popup="recover-password" class="js-open-popup">{{ __('auth.forgot_your_password') }}?</a></p>
            </div>
            <button type="button" class="btn full-width">{{ __('auth.login') }}</button>
        </form>
    </div>
    <footer class="footer">
        <div class="max-w">
            <p>{{ __('auth.not_registered') }}? <a href="#" data-popup="registration-popup" class="js-open-popup">{{ __('auth.create_account') }}</a></p>
        </div>
    </footer>
    <span class="js-close-popup" title="{{ __('auth.close') }}"></span>
</div>

<div class="simple-popup notification-popup hidden">
    <p class="h2" data-text="Депозит с neteller">Credit Card</p>
        <div class="max-w">
            <p class="large" style="font-size:14px;text-align:center;letter-spacing:0.8px">dsadsadasdasd</p>
		</div>
 <span class="js-close-popup" title=""></span>
</div> 