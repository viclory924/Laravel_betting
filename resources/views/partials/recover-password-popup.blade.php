<div class="simple-popup center recover-password hidden">
    <p class="h2" data-text="Запросить пароль">Запросить пароль</p>

    <div class="max-w">
        <p>Пожалуйста, введите свой адрес электронной почты, зарегистрированный у нас, и мы отправим вам информацию о
            том, как сменить пароль.</p>

        <form action="{{ URL::to('/recover-password') }}" class="form" id="recover_password">
            {{ csrf_field() }}
            <div class="field error-field">
                <input type="text" class="form-control icon-mail" name="email" id="email" placeholder="Ваша почта">

                {{--<div class="field-error">--}}
                    {{--<div class="align-m">--}}
                        {{--<p>Такой почты нет</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
            <button type="submit" class="btn full-width">приступить</button>
        </form>
    </div>
    <div class="submit-ok-box">
        <p>Спасибо, мы попытались отправить вам электронное письмо с инструкциями. Если вы не получили электронное
            письмо в течение нескольких минут, возможно, вы указали неправильное имя пользователя или адрес электронной
            почты. Рекомендуем повторить попытку.</p>

        <p>Если вы все еще не получите его, свяжитесь с нашей <a href="">службой&nbsp;поддержки</a>.</p>
    </div>
    <footer class="footer">
        <div class="max-w">
            <p>Вы еще не зарегистрированы? <a href="" data-popup="registration-popup" class="js-open-popup">Создать&nbsp;аккаунт</a>
            </p>
        </div>
    </footer>
    <span class="js-close-popup" title="Закрыть"></span>
</div>