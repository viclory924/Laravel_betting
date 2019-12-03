<div class="boxes-holder quick-register-block">
    <form action="{{ URL::to('/player/register') }}" method="post">
        <input type="hidden" name="quick-merchant-id" id="quick-merchant-id" value="{{ env('MERCHANT_ID') }}">
        <div class="box box-1 quick-register-block-1">
            <h1>Создайте бесплатный аккаунт <br> Быстрая регистрация</h1>
            <fieldset>
                <div class="form-row info">
                    <label>Логин</label>
                    <input autocomplete="off" name="quick-username" id="quick-username" class="tippeable" original-title="" type="text">
                 </div>
            </fieldset>
            <fieldset>
                <div class="form-row">
                    <label>Пароль</label>
                    <input autocomplete="off" name="quick-password" id="quick-password" class="tippeable" original-title="" type="password">
                </div>
            </fieldset>
            <fieldset>
                <div class="form-row">
                    <label>Повторите пароль</label>
                    <input id="quick-retype-password" name="quick-retype-password" class="tippeable" original-title="" type="password">
                </div>
            </fieldset>
            <div class="form-fields-tip">
                <ul>
                    <li>Не менее 8 символов</li>
                    <li>Не хватает цифры или прописной буквы</li>
                </ul>
            </div>
            <button class="button-modal quick-reg">
                Регистрация
            </button>
        </div>
    </form>
</div>