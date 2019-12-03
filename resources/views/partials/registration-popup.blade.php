<div class="registration-popup hidden">
    <div class="sub-box">
        <div class="registration-box">
            <div class="choose-registration child">
                <p class="title">{{ __('registration.choose_register_option') }}</p>
                <a href="" data-step="quick-registration" class="btn js-further-step">{{ __('registration.quick_registration') }}</a>
                <a href="" data-step="full-registration" class="btn js-further-step">{{ __('registration.full_registration') }}</a>
            </div>
            <div class="quick-registration hidden child">
                <p class="title">{{ __('registration.create_free_account') }}<br>{{ __('registration.quick_registration') }}</p>
                <form class="form" id="quick_registration" method="post" action="{{ URL::to('/player/register') }}">
                    <input type="hidden" name="merchant_id" id="merchant_id" value="{{ env('MERCHANT_ID') }}">
                    <div class="two-cols">
                        <div class="col">
                            <div class="field">
                                <input type="text" class="form-control" name="registration_login" id="registration_login" placeholder="{{ __('auth.your_login') }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="field">
                                <select name="registration_currency" id="registration_currency" class="select" data-placeholder="{{ __('registration.currency') }}">
                                    <option value=""></option>
                                    <?php $currencies = \App\Helpers\Functions::getCurrencies(); ?>
                                    @foreach($currencies as $currency)
                                        <option value="{{$currency->int_code}}">{{$currency->char_code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="two-cols">
                        <div class="col">
                            <div class="field">
                                <input type="password" name="registration_password" id="registration_password" class="form-control" placeholder="{{ __('registration.password') }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="field">
                                <input type="password" name="registration_confirm_password" id="registration_confirm_password" class="form-control" placeholder="{{ __('registration.repeat_password') }}">
                            </div>
                        </div>
                    </div>
                    <div class="two-cols">
                        <div class="col">
                            <div class="field">
                                <input type="text" name="registration_email" id="registration_email" class="form-control" placeholder="E-mail">
                            </div>
                        </div>
                        <div class="col">
                            <div class="field">
                                <select name="registration_country_id" id="registration_country_id" class="select" data-placeholder="{{ __('common.country') }}">
                                    <option value="">---</option>
                                    <?php $countries = \App\Helpers\Functions::getCountries(); ?>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="two-cols">
                        <div class="col">
                            <div class="field">
                                <input type="text" name="promocode" id="registration_promocode" class="form-control" placeholder="{{ __('registration.enter_promocode') }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="field">
                                <div id="calendar1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="checkbox-item">
                            <input id="rules-inp" name="rules-inp" id="registration_rules" type="checkbox" checked>
                            <label for="rules-inp">{{ __('registration.agreement') }} <a href="">{{ __('registration.terms_conditions_link') }}</a></label>
                        </div>
                    </div>
                    <div class="btns-box">
                        <a href="#" data-step="choose-registration" class="btn sub-color js-further-step">{{ __('common.back') }}</a>
                        <a href="#" data-step="quick-registration-complete" class="btn js-further-step">{{ __('common.check_in') }}</a>
                    </div>

                </form>
            </div>
            <div class="full-registration hidden child">
                <div class="step step1">
                    <p class="title">{{ __('registration.sign_up_2_steps') }}</p>
                    <form class="form" id="full-registration-step1">
                        <input type="hidden" name="merchant_id" value="{{ env('MERCHANT_ID') }}">
                        <div class="two-cols">
                            <div class="col">
                                <div class="field">
                                    <input type="text" name="login" id="full_registration_login" class="form-control" placeholder="{{ __('common.your_login') }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="field">
                                    <input type="text" name="player_firstname" id="full_registration_firstname" class="form-control" placeholder="{{ __('registration.first_name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="two-cols">
                            <div class="col">
                                <div class="field">
                                    <input type="text" name="player_lastname" id="full_registration_lastname" class="form-control" placeholder="{{ __('registration.last_name') }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="field">
                                    <select name="gender" id="full_registration_gender" class="select" data-placeholder="{{ __('registration.gender') }}">
                                        <option></option>
                                        <option value="m">{{ __('registration.gender_male') }}</option>
                                        <option value="f">{{ __('registration.gender_female') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="two-cols">
                            <div class="col">
                                <div class="field">
                                    <input type="text" class="form-control" name="email" id="full_registration_email" placeholder="E-mail">
                                </div>
                            </div>
                            <div class="col">
                                <div class="field">
                                    <select name="currency" id="full_registration_currency" class="select" data-placeholder="{{ __('registration.currency') }}">
                                        <option value=""></option>
                                        <?php $currencies = \App\Helpers\Functions::getCurrencies(); ?>
                                        @foreach($currencies as $currency)
                                            <option value="{{$currency->int_code}}">{{$currency->char_code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div id="calendar2"></div>
                        </div>
                        <div class="btns-box">
                            <a href="#" data-step="choose-registration" class="btn sub-color js-further-step">{{ __('common.back') }}</a>
                            <a href="#" data-step="step2" class="btn js-to-step fix-width">{{ __('common.further') }}</a>
                        </div>
                    </form>
                </div>
                <div class="step step2 hidden">
                    <p class="title">{{ __('registration.last_step') }}</p>
                    <form class="form" id="full-registration-step2">
                        <div class="two-cols">
                            <div class="col">
                                <div class="field">
                                    <select name="country" id="full_registration_country" class="select" data-placeholder="{{ __('registration.country') }}">
                                        <option></option>
                                        <?php $countries = \App\Helpers\Functions::getCountries(); ?>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="field">
                                    <input type="text" name="city" id="full_registration_city" class="form-control" placeholder="{{ __('registration.city') }}">
                                </div>
                            </div>
                        </div>
                        <div class="two-cols">
                            <div class="col">
                                <div class="field">
                                    <input type="text" name="address" id="full_registration_address" class="form-control" placeholder="{{ __('registration.address') }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="field">
                                    <input type="text" name="zip" id="full_registration_zip" class="form-control" placeholder="{{ __('registration.postcode') }}">
                                </div>
                            </div>
                        </div>
                        <div class="two-cols">
                            <div class="col">
                                <div class="field">
                                    <input type="text" name="phone" id="full_registration_phone" class="form-control" placeholder="{{ __('registration.phone') }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="field">
                                    <input type="text" name="promocode" id="full_registration_promocode" class="form-control" placeholder="{{ __('registration.promo_code') }}">
                                </div>
                            </div>
                        </div>
                        <div class="two-cols">
                            <div class="col">
                                <div class="field">
                                    <input type="password" name="password" id="full_registration_password" class="form-control" placeholder="{{ __('registration.password') }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="field">
                                    <input type="password" name="confirm_password" id="full_registration_confirm_password" class="form-control" placeholder="{{ __('registration.repeat_password') }}">
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="checkbox-item">
                                <input id="rules-inp2" name="rules-inp2" type="checkbox" checked="">
                                <label for="rules-inp2">{{ __('registration.agreement') }} <a href="#">{{ __('registration.terms_conditions_link') }}</a></label>
                            </div>
                        </div>
                        <div class="btns-box">
                            <a href="#" data-step="step1" class="btn sub-color js-to-step">{{ __('common.back') }}</a>
                            <a href="#" data-step="full-registration-complete" class="btn js-further-step">{{ __('common.check_in') }}</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="registration-complete hidden child">
                <p class="title">{{ __('registration.success_1') }}<br>{{ __('registration.success_2') }}</p>
                <p>{{ __('registration.success_3') }}</p>
            </div>
        </div>
        <div class="bg-box">
            <img src="{{ asset('img/registration-character.png') }}" alt="">
            <p class="are-you-ready">
                <span class="golden-text" data-text="{{ __('registration.ready_1') }}"> {{ __('registration.ready_1') }} </span>
                <span class="golden-text large" data-text="{{ __('registration.ready_2') }}"> {{ __('registration.ready_2') }} </span>
            </p>
        </div>
    </div>
    <span class="js-close-popup" title="Закрыть"></span>
</div>
<script>

</script>