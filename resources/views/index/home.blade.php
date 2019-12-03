@extends('layouts.home')

@section('content')
    <!--modal-->
    <!--modal-window-->
    <div class="modal-window">
        <div class="modal-bg"></div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="deposit-active-wrapper">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('img/main-logo.svg') }}" alt=""></a>
                    </div>
                    <div class="deposit-active">
                        <div class="deposit-title">Выбрать метод пополнения:</div>
                        <div class="col-right-func-selects deposit-active-dropdown">
                            <div class="col-right-func-select col-right-func-number-select">
                                <span class="col-right-func-select-header">MasterCard</span><div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                                <div class="col-right-func-select-options-wrapper">
                                    <ul class="col-right-func-select-options">
                                        <li img="{{ asset('img/payment-systems/mastercard-color.png') }}">MasterCard</li>
                                        <li img="{{ asset('img/payment-systems/PayPal.jpg') }}">PayPal</li>
                                        <li img="{{ asset('img/payment-systems/visa-color.png') }}">Visa</li>
                                    </ul>
                                </div>
                                <div class="img-deposit">
                                    <img src="{{ asset('img/payment-systems/mastercard-color.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="deposit-title">Сумма пополнения:</div>
                        <div class="deposit-price-wrapper">
                            <div class="input-wrapper">
								<span class="inp-desc">
									EUR
								</span>
                                <input type="text" placeholder="25">
                            </div>
                            <div class="price-wrapper">
                                <div class="price-row">Плата: <span>2.5%</span></div>
                                <div class="price-row">Лимит: <span>20 - 5000 €</span></div>
                            </div>
                        </div>
                        <div class="deposit-bonus">
                            <input type="checkbox" id="bonus-deposit">
                            <label for="bonus-deposit">Добавьте 100% бонус.</label>
                            <a href="bonus.html">Правила и Условия</a>
                        </div>
                        <button class="button-modal">ввести депозит</button>
                    </div>
                </div>

                <div class="password-recovery-wrapper">
                    <div class="input-password-recovery">
                        <span><i class="icon-messages" aria-hidden="true"></i></span>
                        <input class="modal-input" type="text" placeholder="Введите ваш E-mail">
                    </div>
                    <button class="button-modal">отправить</button>
                    <h5>Вы еще не зарегестрированны? <a class="register-modal">Создать аккаунт</a></h5>
                </div>

                <div class="modal-login-wrapper">
                    <div class="login-input-wrapper">
                        <div class="form-row left-icons">
                            <span><i class="icon-account-fgcasino" aria-hidden="true"></i></span>
                            <input class="modal-input" type="text" placeholder="Ваш логин">
                        </div>
                        <div class="form-row left-icons">
                            <span><i class="icon-zamok" aria-hidden="true"></i></span>
                            <input class="modal-input acc-pass" type="password" placeholder="Ваш пароль">
                            <div class="error">Введенный пароль неправильный</div>
                        </div>
                    </div>
                    <button class="button-modal">войти</button>
                    <div class="loggin-h5-wrapper">
                        <h5>Забыли данные? <a class="pass-recov-trigger">Восстановите их</a></h5>
                        <h5>Вы еще не зарегестрированны? <a class="register-modal">Создать аккаунт</a></h5>
                    </div>
                </div>

                <div id="createaccount-form-modal" class="createaccount createaccount-form">
                    <div class="boxes-holder choise-register">
                        <h1>Выберите вариант регистрации</h1>
                        <a class="button-modal quick-register-start">Быстрая регистрация</a>
                        <a class="button-modal full-register-start">Полная регистрация</a>
                    </div>

                    @include('partials.full-registration-popup')

                    @include('partials.quick-registration-popup')

                    <div class="bonus-holder">
                        <div class="logo-wrapper">
                            <img class="logo" src="{{ asset('img/main-logo.svg') }}">
                        </div>
                        <div class="bonus-wrapper">
                            <img class="bonus" src="{{ asset('img/modal-bg.jpg') }}">
                            <div class="bonus-wrapper-text">
                                we <strong>triple <br></strong> your first deposit <br>and give you <br> <strong>150 free spins</strong>
                            </div>
                        </div>
                        <div class="logo-wrapper">
                        </div>
                    </div>
                </div>
                <span class="close-modal">
					<i class="icon-cancel-music" aria-hidden="true"></i>
				</span>
            </div>
        </div>
        <div class="modal-account account">

            <div class="row">
                <label class="account-category-select-label">Выберите категорию</label>
                <div class="col-right-func-selects account-category-select">
                    <div class="col-right-func-select col-right-func-number-select">
                        <span class="col-right-func-select-header">Профиль: Персональные данные</span><div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                        <div class="col-right-func-select-options-wrapper">
                            <ul class="col-right-func-select-options">
                                <li category="profile" inner="profile">Профиль: Персональные данные</li>
                                <li category="profile" inner="verification">Профиль: Проверка</li>
                                <li category="profile" inner="change-password">Профиль: Изменить пароль</li>
                                <li category="balance" inner="balance">Депозит: Баланс</li>
                                <li category="balance" inner="game-history">Депозит: История</li>
                                <li category="balance" inner="dep-history">Депозит: История оплаты</li>
                                <li category="withdraw" inner="withdraw">Вывод: Новый</li>
                                <li category="withdraw" inner="pending">Вывод: Ожидает</li>
                                <li category="withdraw" inner="processed">Вывод: Выполнен</li>
                                <li category="bonus" inner="bonus">Бонусы: Обзор бонусов</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 menu-mobile" style="display:none;margin:0 auto;z-index:100">
                    <i class="fa icon-logo5"></i>
                    <div style="margin-top:-20px">
                        <div class="inner-addon right-addon mm-menu">
                            <div class="field-label">Jump to account section:</div>
                            <div style="position:relative">
                                <select id="mobile-menu" style="width:100%;border:0;border-radius:7px;background-color:#04404b;color:#fff;padding:8px;font-size:18px" class="choose_state">
                                    <option value="profile">Profile: Overview</option>
                                    <option value="verification">Profile: Verification</option>
                                    <option value="change-password">Profile: Change password</option>
                                    <option value="balance">Balance: Overview</option>
                                    <option value="game-history">Balance: Game history</option><option value="dep-history">Balance: Transactions</option>                            <option value="withdraw">Withdrawals: New</option>
                                    <option value="pending">Withdrawals: Pending</option>
                                    <option value="processed">Withdrawals: Processed</option>
                                    <option value="bonus">Bonus: Overview</option>
                                </select>
                                <select id="self-menu" style="display:none;width:100%;border:0;border-radius:7px;background-color:#04404b;color:#fff;padding:8px;font-size:18px" class="choose_state">
                                    <option value="limits">Safety: Limits</option>
                                </select>
                                <div class="dblarrow" style="z-index:9999;position:absolute;top:14px;right:10px;pointer-events:none"><b></b><i></i></div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div><i class="mobile-current">Profile: Overview</i></div>
                        <div class="divider"></div>
                    </div>
                </div>
                <div class="col-sm-2 menu-pc">
                    <div class="menu-item current" data-id="profile"><i class="icon-account-fgcasino"></i>Профиль</div>
                    <div class="menu-item" data-id="balance"><i class="icon-deposit-fgcasino"></i>Депозит</div>
                    <div class="menu-item" data-id="withdraw"><i class="icon-vyvod-panel"></i>Вывод</div>
                    <div class="menu-item" data-id="bonus"><i class="icon-bonusy-panel"></i>Бонусы</div>
                    <div><a href="#" class="btn btn-block logoff">Выход</a></div>
                </div>
                <div class="col-xs-12 col-sm-10 mobile-no-padding menu-main" style="text-align: center; padding: 30px; min-height: 0px;">
                    <div style="margin:0 auto;">
                        <div class="row sub-items profile" parent-id="profile" style="display: block;">
                            <div data-id="profile" class="col-xs-4 padding-none sub-item current">Персональные данные</div>
                            <div data-id="verification" class="col-xs-4 padding-none sub-item">Проверка</div>
                            <div data-id="change-password" class="col-xs-4 padding-none sub-item">Изменить пароль</div>
                        </div>
                        <div class="row sub-items balance" parent-id="balance" style="display: none;">
                            <div data-id="balance" class="col-xs-4 padding-none sub-item current">Баланс</div>
                            <div data-id="game-history" class="col-xs-4 padding-none sub-item">История</div>
                            <div data-id="dep-history" class="col-xs-4 padding-none sub-item">История оплаты</div>
                        </div>
                        <div class="row sub-items withdraw" parent-id="withdraw" style="display: none;">
                            <div data-id="withdraw" class="col-xs-4 padding-none sub-item current">Новый</div>
                            <div data-id="pending" class="col-xs-4 padding-none sub-item">Ожидает</div>
                            <div data-id="processed" class="col-xs-4 padding-none sub-item">Выполнен</div>
                        </div>
                        <div class="row sub-items bonus" parent-id="bonus" style="display: none;">
                            <div data-id="bonus" class="col-xs-12 padding-none sub-item current">Обзор бонусов</div>
                        </div>
                        <div class="mobile-no-padding account-content-tab profile-content-wrapper" style="padding-top:9px; display: block;">
                            <div class="profile-tab-content" style="display: block;">
                                <form name="account">
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-left">
                                            <div class="inner-addon right-addon mobile-no-margin">
                                                <label>Ваш никнейм</label>
                                                <input name="Username" autocomplete="off" class=" readonly" tabindex="1" value="Sarvas" type="text" readonly="">
                                            </div>
                                        </div>
                                        <div class="form-row col-xs-12 col-sm-6 field-right">
                                            <div class="inner-addon right-addon">
                                                <label>Адрес</label>
                                                <input name="Address1" autocomplete="off" class=" readonly" tabindex="2" value="Lenina 6" type="text" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-left">
                                            <div class="inner-addon right-addon">
                                                <label>Имя</label>
                                                <input name="Name" autocomplete="off" class=" readonly" tabindex="3" value="Denis Sarvas" type="text" readonly=""></div>
                                        </div>
                                        <div class="form-row col-xs-12 col-sm-6 field-right">
                                            <div class="inner-addon right-addon">
                                                <label>Индекс</label>
                                                <input name="PostalCode" autocomplete="off" class=" readonly" tabindex="4" value="230000" type="text" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-left">
                                            <div class="inner-addon right-addon">
                                                <label>Страна</label>
                                                <input name="Country" autocomplete="off" class=" readonly" tabindex="5" value="BY" type="text" readonly="">
                                            </div>
                                        </div>
                                        <div class="form-row col-xs-12 col-sm-6 field-right">
                                            <div class="inner-addon right-addon">
                                                <label>Город</label>
                                                <input name="City" autocomplete="off" class="readonly" value="Hrodno" type="text" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-left">
                                            <div class="inner-addon right-addon">
                                                <label>Дата рождения</label>
                                                <input name="BirthDate" autocomplete="off" class=" readonly" tabindex="7" value="January 1st, 1982" type="text" readonly="">
                                            </div>
                                        </div>
                                        <div class="form-row col-xs-12 col-sm-6 field-right">
                                            <div class="inner-addon right-addon">
                                                <label>Телефон</label>
                                                <div>
                                                    <div>
                                                        <input autocomplete="off" class="readonly" name="Mobile" value="+ (375) 336828756" tabindex="9" type="text" readonly="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="subscribe-wrapper checkboxes-wrapper">
                                        <div class="subscribe-title">
                                            Получать уведомления
                                        </div>
                                        <div class="subscribe-content">
                                            <div class="subscribe-option checkboxes-option">
                                                <input type="checkbox" name="subscribe" value="email" id="subscribe-email"><label for="subscribe-email">По электронной почте</label>
                                            </div>
                                            <div class="subscribe-option checkboxes-option">
                                                <input type="checkbox" name="subscribe" value="email" id="subscribe-sms"><label for="subscribe-sms">По SMS</label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="verification-tab-content" style="display: none;">
                                <div class="row mobile-no-margin" style="margin-top:16px">
                                    <div class="field-left text-left">
                                        <div id="kyc-div" style="">
                                            At the moment, we do not require any additional verification from you.
                                        </div>
                                        <div id="loading-kyc-pc" style="display: none;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="change-password-tab-content" style="display: none;">
                                <form name="change-password" autocomplete="off">
                                    <input type="text" style="display:none">
                                    <input type="password" style="display:none">
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-left">
                                            <div class="inner-addon right-addon mobile-no-margin">
                                                <label>Новый пароль</label>
                                                <input name="NewPassword" autocomplete="off" class="" style="display:inline-block" tabindex="1" value="" type="password" maxlength="25">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-left">
                                            <div class="inner-addon right-addon">
                                                <label>Текущий пароль</label>
                                                <input name="OldPassword" autocomplete="off" class="" style="display:inline-block" tabindex="2" value="" type="password" maxlength="25">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="passord-accept field-left">
                                            <div class="divider"></div>
                                            <div class="inner-addon right-addon">
                                                <button name="submit" role="submit" tabindex="3" class="btn btn-change-password btn-block" style="padding:5px" href="#">Change password</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mobile-no-padding account-content-tab balance-content-wrapper" style="padding-top:9px; display: none;">
                            <div class="balance-tab-content" style="display: block;">
                                <div class="row">
                                    <div class="col-xs-12 field-left">
                                        <div class="inner-addon right-addon mobile-no-margin">
                                            <div class="title">Вы сняли денег:</div>
                                            <div class="money">0.00 рублей</div>
                                            <div class="divider"></div>
                                            <div class="title">Ваши бонусы:</div>
                                            <div class="money">20.00 рублей</div>
                                            <div class="divider"></div>
                                            <div class="title">Ваш баланс:</div>
                                            <div class="money">10 000.00 рублей</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="game-history-tab-content" style="display: none;">
                                <div class="row played">
                                    <div class="col-xs-12 field-left padding-none">
                                        <div class="inner-addon right-addon mobile-no-margin">
                                            <div style="text-align:left">
                                                Сыгранные игры <i>10 июля, 2017</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="row mobile-no-margin">
                                    <div class="col-xs-11 col-sm-12 text-left padding-none">
                                        <div id="data-div">
                                            <table>
                                                <thead>
                                                <tr>
                                                    <th>Дата</th>
                                                    <th>Игра</th>
                                                    <th>Ставка</th>
                                                    <th>Выигрыш</th>
                                                    <th>Бонус</th>
                                                </tr>
                                                </thead>
                                                <tbody id="data-table">

                                                </tbody>
                                            </table>
                                            <div class="divider" style="margin:9px 0px 16px 0px"></div>
                                            <div style="margin-top:2px">
                                                <div id="data-showing" style="float:left">Показано 0 из 0 ставок</div>
                                                <button href="#" class="btn next" style="float:right;padding:5px;margin-left:2px" disabled="disabled">След</button>
                                                <button href="#" class="btn previous" style="float:right;padding:5px" disabled="disabled">Пред</button>
                                            </div>
                                        </div>
                                        <div id="loading-data-pc" style="display: none;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="dep-history-tab-content" style="display: none;">
                                <div class="row played">
                                    <div class="col-xs-12 field-left padding-none">
                                        <div class="inner-addon right-addon mobile-no-margin">
                                            <div style="text-align:left">
                                                Денежные операции <i>10 июля, 2017</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="row mobile-no-margin">
                                    <div class="col-xs-11 col-sm-12 text-left padding-none">
                                        <div id="data-div">
                                            <table>
                                                <thead>
                                                <tr>
                                                    <th>Дата</th>
                                                    <th>Тип</th>
                                                    <th>Кол-во</th>
                                                    <th>Описание</th>
                                                </tr>
                                                </thead>
                                                <tbody id="data-table">

                                                </tbody>
                                            </table>
                                            <div class="divider" style="margin:9px 0px 16px 0px"></div>
                                            <div style="margin-top:2px">
                                                <div id="data-showing" style="float:left">Показано 0 из 0 операций</div>
                                                <button href="#" class="btn next" style="float:right;padding:5px;margin-left:2px" disabled="disabled">След</button>
                                                <button href="#" class="btn previous" style="float:right;padding:5px" disabled="disabled">Пред</button>
                                            </div>
                                        </div>
                                        <div id="loading-data-pc" style="display: none;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-no-padding account-content-tab withdraw-content-wrapper" style="padding-top:9px; display: none;">
                            <div class="withdraw-tab-content" style="display: block;">
                                <div class="row">
                                    <div class="field-left">
                                        <div class="inner-addon right-addon mobile-no-margin" style="z-index:9999;text-align:left">
                                            Ваш баланс: <span class="wdbalance" style="color:#35a876;font-weight:400">€0.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="field-left deposite-choise form-row">
                                        <div class="inner-addon right-addon" style="z-index:9999">
                                            <label>Выберите способ вывода средств</label>
                                            <div class="col-right-func-selects deposit-active-dropdown">
                                                <div class="col-right-func-select col-right-func-number-select">
                                                    <span class="col-right-func-select-header">MasterCard</span><div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                                                    <div class="col-right-func-select-options-wrapper">
                                                        <ul class="col-right-func-select-options">
                                                            <li img="img/payment-systems/mastercard-color.png">MasterCard</li>
                                                            <li img="img/payment-systems/PayPal.jpg">PayPal</li>
                                                            <li img="img/payment-systems/visa-color.png">Visa</li>
                                                        </ul>
                                                    </div>
                                                    <div class="img-deposit">
                                                        <img src="{{ asset('img/payment-systems/mastercard-color.png') }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="deposit-frame">
                                    <div class="row">
                                        <div class="col-xs-12 field-left text-left">
                                            <div class="divider"></div>
                                            <div id="loading-withdraw-pc" style="display: none;"></div>
                                            <div id="dep_div">To withdraw via Skrill you need to make a deposit with it first.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pending-tab-content" style="display: none;">
                                <div class="row mobile-no-margin">
                                    <div class="col-xs-11 col-sm-12 text-left padding-none">
                                        <div id="data-div">
                                            <table>
                                                <thead>
                                                <tr>
                                                    <th>Дата</th>
                                                    <th>Кол-во</th>
                                                    <th>Описание</th>
                                                </tr>
                                                </thead>
                                                <tbody id="data-table">

                                                </tbody>
                                            </table>
                                            <div class="divider" style="margin:9px 0px 16px 0px"></div>
                                            <div style="margin-top:2px">
                                                <div id="data-showing" style="float:left">Показано 0 из 0 операций</div>
                                                <button href="#" class="btn next" style="float:right;padding:5px;margin-left:2px" disabled="disabled">След</button>
                                                <button href="#" class="btn previous" style="float:right;padding:5px" disabled="disabled">Пред</button>
                                            </div>
                                        </div>
                                        <div id="loading-data-pc" style="display: none;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="processed-tab-content" style="display: none;">
                                <div class="row mobile-no-margin">
                                    <div class="col-xs-11 col-sm-12 text-left padding-none">
                                        <div id="data-div">
                                            <table>
                                                <thead>
                                                <tr>
                                                    <th>Дата</th>
                                                    <th>Кол-во</th>
                                                    <th>Описание</th>
                                                    <th>Статус</th>
                                                </tr>
                                                </thead>
                                                <tbody id="data-table">

                                                </tbody>
                                            </table>
                                            <div class="divider" style="margin:9px 0px 16px 0px"></div>
                                            <div style="margin-top:2px">
                                                <div id="data-showing" style="float:left">Показано 0 из 0 операций</div>
                                                <button href="#" class="btn next" style="float:right;padding:5px;margin-left:2px" disabled="disabled">След</button>
                                                <button href="#" class="btn previous" style="float:right;padding:5px" disabled="disabled">Пред</button>
                                            </div>
                                        </div>
                                        <div id="loading-data-pc" style="display: none;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-no-padding account-content-tab bonus-content-wrapper" style="padding-top:9px; display: none;">
                            <div class="bonus-tab-content" style="display: block;">
                                <div class="row">
                                    <div class="col-xs-12 field-left text-left">
                                        <div class="inner-addon right-addon mobile-no-margin">
                                            <div id="loading-bonus-pc" style="display: none;"></div>
                                            <div id="bonus-div" style="">На данный момент у вас нет действующих бонусов</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="exit-profile-mobile">Выход</div>
            <span class="close-modal">
					<i class="icon-cancel-music" aria-hidden="true"></i>
				</span>
        </div>
    </div>
    <!--END-modal-window-->
    <!--help-block-->
    <div class="help-block">
        <div class="help-nav">
            <span class="help-back"><i class="fa fa-chevron-left" aria-hidden="true"></i> Назад</span><span class="help-close">Закрыть окно <i class="fa fa-chevron-right" aria-hidden="true"></i></span>
        </div>
        <div class="help-content">
            <div class="first-screen">
                <div class="how-help">
                    <h2>Как мы можем<br> вам помочь?</h2>
                    <p>Отправьте нам электронное сообщение или пообщатесь с нами в чате, просмотрите FAQ или свяжитесь с нами в социальных сетях</p>
                    <p>Онлайн чат открыт с 08:00 до 00:00</p>
                </div>
                <ul class="help-menu">
                    <li class="func-help">
                        <div class="option live-chat">
                            <div class="help-menu-icon">
                                <i class="icon-chat-help" aria-hidden="true"></i>
                            </div>
                            <div class="description">
                                <h4>Онлайн чат</h4>
                                <p>Чат с нашей командой поддержки</p>
                            </div>
                        </div>
                    </li>
                    <li class="func-help support-message">
                        <div class="option">
                            <div class="help-menu-icon">
                                <i class="icon-messages-help" aria-hidden="true"></i>
                            </div>
                            <div class="description">
                                <h4>Отправить сообщение для поддержки</h4>
                                <p>Ответ получите в течении 12 часов</p>
                            </div>
                        </div>
                    </li>
                    <li class="func-help find-answers">
                        <div class="option">
                            <div class="help-menu-icon">
                                <i class="icon-vopros2" aria-hidden="true"></i>
                            </div>
                            <div class="description">
                                <h4>Часто задаваемые вопросы</h4>
                                <p>Тут вы найдете ответ на ваш вопрос</p>
                            </div>
                        </div>
                    </li>
                    <div class="social-button-help">
                        <ul class="">
                            <li><a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </ul>
                <div class="contacts">
                    <h3>Свяжитесь с нами по email:</h3>
                    <a href="#">info024@yandex.ru</a>
                </div>
            </div>
            <div class="chat-screen other-screen">
                <form action="">
                    <h5>Ваш адрес электронной почты: *</h5>
                    <input type="text" id="chat-email" name="email" placeholder="Email">
                    <h5>Ваш вопрос, связанный с: *</h5>
                    <input type="radio" name="chat-radio" value="bonuses" id="bonuses"><label for="bonuses">Бонусы и бесплатные спины</label><br>
                    <input type="radio" name="chat-radio" value="bonus-codes" id="bonus-codes"><label for="bonus-codes">Оплата</label><br>
                    <input type="radio" name="chat-radio" value="payments" id="payments"><label for="payments">Аккаунт</label><br>
                    <input type="radio" name="chat-radio" value="account" id="account"><label for="account">Другое</label><br>

                    <input type="submit" value="начать чат">
                </form>
            </div>
            <div class="message-to-support other-screen">
                <h2>Отправить сообщение для поддержки</h2>
                <p>Ответ будет в течении 12 часов</p>
                <h5>Ваш адрес электронной почты: *</h5>
                <form action="" method="post">
                    <input type="text" name="email" placeholder="Email">
                    <input type="text" name="theme" placeholder="Тема сообщения">
                    <textarea name="message" cols="30" rows="10" placeholder="Сообщение"></textarea>
                    <input type="submit" value="отправить сообщение">
                </form>
            </div>
            <div class="faq other-screen">
                <div class="header-faq">
                    <h2>Часто задаваемые вопросы</h2>
                    <p>Что обсуждалось в последнее время?</p>
                    <div class="faq-search-wrapper">
                        <input type="text" class="faq-search" placeholder="Поиск по категориям">
                    </div>
                </div>
                <div class="question-wrapper">
                    <ul class="questions">
                        <li class="category-question">
                            <a class="trigger-category">Account</a>
                            <ul>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                            </ul>
                        </li>
                        <li class="category-question">
                            <a class="trigger-category">Account</a>
                            <ul>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                            </ul>
                        </li>
                        <li class="category-question">
                            <a class="trigger-category">Account</a>
                            <ul>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                            </ul>
                        </li>
                        <li class="category-question">
                            <a class="trigger-category">Account</a>
                            <ul>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                            </ul>
                        </li>
                        <li class="category-question">
                            <a class="trigger-category">Account</a>
                            <ul>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                            </ul>
                        </li>
                        <li class="category-question">
                            <a class="trigger-category">Account</a>
                            <ul>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                                <li class="question">
                                    How can I open an account at Bettend?
                                    <p class="answer">
                                        Opening an account at Bettend is easy and only takes a few minutes. Simply fill in the required fields on our Registration page. Immediately after you’ll receive a confirmation email with an activation link. Activate your account by clicking on the link and you’ll be ready to play. Please check your spam folder if you haven’t received the email within a couple of minutes after completing your registration.
                                    </p>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--END-help-block-->
    <!--END-modal-->

    <div class="main-wrapper home-page-wrapper">

        <div class="deposit-button-wrapper deposit-button-wrapper-home signin-wrapper account-trigger">
            <div class="depos-btn-down">
                <div class="depos-wrap">
                    <i class="icon-vxod" aria-hidden="true"></i><br>
                    <span>{{ __('common.enter') }}</span>
                </div>
            </div>
        </div>

        <header>
            <div>
                <div class="sport-table-main-wrapper">
                    <div class="sport-table-header-top-line">

                        <div class="main-table-header-logo">
                            <a href="#">
                                <a href="{{route('home')}}"><img src="{{ asset('img/main-logo.svg') }}" alt=""></a>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </header>

        <div class="home-page-scroll-wrapper">
            <div class="home-page-menu-wrapper">
                <div class="home-page-menu">
                    <div class="left-side-menu">
                        <nav>
                            <ul>
                                <li><a href="{{route('casino')}}">{{ __('common.casino') }}</a></li>
                                <li><a href="{{route('casino-live')}}">{{ __('common.casino_live') }}</a></li>
                                <li><a href="#">{{ __('common.bonus') }}</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="right-side-menu">
                        <nav>
                            <ul>
                                <li><a href="{{route('sport')}}">{{ __('common.sport') }}</a></li>
                                <li><a href="#">{{ __('common.poker') }}</a></li>
                                <li><a href="{{route('bingo')}}">{{ __('common.bingo') }}</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection