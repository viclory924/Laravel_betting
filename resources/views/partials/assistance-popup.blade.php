<div class="assistance-popup hidden">
    <div class="header">
        <div class="col">
            <a href="" class="back-link">{{ __('common.back') }}</a>
        </div>
        <div class="col">
            <a href="" class="js-close-popup">{{ __('common.close_window') }}</a>
        </div>
    </div>
    <div class="main-box">
        <p class="h2">{{ __('common.how_can_we_help_you') }}?</p>
        <p>{{ __('common.assistance_popup_send_message_guide') }}</p>
        <p>{{ __('common.live_chat_open_time') }}</p>
        <div class="assistance-items">
            <div class="item" style="cursor:pointer"  onClick="chatButton.onClick();">
                <div class="icon">
                    <img src="{{ asset('img/chat-icon.png') }}" alt="">
                </div>
                <div class="text">
                    <p><a href="#!" id="invoke_chat">{{ __('common.online_chat') }}</a></p>
                    <p>{{ __('common.chat_with_support') }}</p>
                </div>
            </div>
            <div class="item">
                <div class="icon">
                    <img src="{{ asset('img/mail-icon.png') }}" alt="">
                </div>
                <div class="text">
                    <p><a href="" data-child="message-box">{{ __('common.message_to_support') }}</a></p>
                    <p>{{ __('common.answer_during', ['hours' => 12]) }}</p>
                </div>
            </div>
            <div class="item">
                <div class="icon">
                    <img src="{{ asset('img/interrogation-icon.png') }}" alt="">
                </div>
                <div class="text">
                    <p><a href="" data-child="faq-box">{{ __('common.faq') }}</a></p>
                    <p>{{ __('common.will_find_answer_here') }}</p>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="social-links">
                <a href="https://vk.com/" class="vkontakte" target="_blank" title="Vkontakte">vk</a>
                <a href="https://twitter.com/" class="twitter" target="_blank" title="Twitter"></a>
                <a href="https://facebook.com/" class="facebook" target="_blank" title="Facebook">f</a>
            </div>
            <p>{{ __('common.contact_us_by_email') }}:</p>
            <p><a href="mailto:{{ env('SUPPORT_EMAIL') }}">{{ env('SUPPORT_EMAIL') }}</a></p>
        </footer>
    </div>
    <div class="faq-box assistance-child">
        <p class="h2">{{ __('common.faq') }}</p>
        <p>{{ __('common.faq_sub') }}</p>
        <div class="accordion sub-appearance">
            <div class="item">
                <div class="title">
                    <p>1. {{ __('common.faq_1') }}</p>
                </div>


                @include('partials.assistance-text.' . \App::getLocale())

            </div>
            <div class="item">
                <div class="title">
                    <p>2. {{ __('common.faq_2') }}</p>
                </div>

                @include('partials.deposit-text.' . \App::getLocale())

            </div>
            <div class="item">
                <div class="title">
                    <p>3. {{ __('common.faq_3') }}</p>
                </div>

                @include('partials.withdraw-text.' . \App::getLocale())

            </div>

            @include('partials.docs-text.' . \App::getLocale())

        </div>
    </div>
    <div class="chat-box assistance-child">
        <form action="#" class="form">
            <div class="field required">
                <label class="field-name">Ваш адрес электронной почты</label>
                <div class="inp-box">
                    <input type="text" class="form-control" placeholder="Email">
                </div>
            </div>
            <p>Ваш запрос, связанный с: *</p>
            <div class="field">
                <div class="radio-item">
                    <input id="radio-inp" name="radio-inp" type="radio">
                    <label for="radio-inp">Бонусы и бесплатные спины</label>
                </div>
                <div class="radio-item">
                    <input id="radio-inp2" name="radio-inp" type="radio">
                    <label for="radio-inp2">Оплата</label>
                </div>
                <div class="radio-item">
                    <input id="radio-inp3" name="radio-inp" type="radio">
                    <label for="radio-inp3">Аккаунт</label>
                </div>
                <div class="radio-item">
                    <input id="radio-inp4" name="radio-inp" type="radio">
                    <label for="radio-inp4">Другое</label>
                </div>
            </div>
            <button type="button" class="btn full-width">начать чат</button>
        </form>
    </div>
    <div class="message-box assistance-child">
        <p class="h2">{{ __('common.message_support') }}</p>
        <p>{{ __('common.message_support_sub') }}</p>
        <form action="#" class="form">
            <div class="field required">
                <label class="field-name">{{ __('common.your_email_address') }}</label>
                <div class="inp-box">
                    <input type="text" id="supportEmail" name="supportEmail" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="field">
                <div class="inp-box">
                    <input type="text" id="supportSubject" name="supportSubject" class="form-control" placeholder="Message subject">
                </div>
            </div>
            <div class="field">
                <div class="inp-box">
                    <textarea class="form-control" id="supportMessage" name="supportMessage" rows="10" cols="10" placeholder="Message"></textarea>
                </div>
            </div>
            <button type="button" onclick="createTicket()" class="btn full-width">{{ __('common.send_message') }}</button>
        </form>
    </div>
</div>