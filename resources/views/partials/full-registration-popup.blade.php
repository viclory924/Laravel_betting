<div class="boxes-holder full-register-block">
    
        <form id="full-registration-step1" action="{{ URL::to('/player/register') }}" method="post">	
		<input type="hidden" name="merchant_id" id="merchant_id" value="{{ env('MERCHANT_ID') }}">
		
		<div class="box box-1 full-register-block-1">
            <h1>Создайте бесплатный аккаунт<br>В два простых шага</h1>
            <fieldset>
                <div class="form-row">
                    <label>E-mail</label>
                    <input name="email" id="input-email" class="tippeable" original-title="" autofocus="true" type="email">
                    
                </div>
                <div class="form-row info">
                    <label>Логин</label>
                    <input autocomplete="off" name="username" id="input-username" class="tippeable" original-title="" type="text">
                    </div>
            </fieldset>
            <fieldset>
                <div class="form-row">
                    <label>Ваше имя</label>
                    <input name="firstname" id="name" class="tippeable" original-title="" type="text">
                    
                </div>
                <div class="form-row">
                    <label>Ваша фамилия</label>
                    <input name="lastname" id="input-lastname" class="tippeable" original-title="" type="text">
                    </div>
            </fieldset>
            <fieldset>
                <div class="form-row">
                    <label>Пароль</label>
                    <input autocomplete="off" name="password" id="input-password" class="tippeable" original-title="" type="password">
                  </div>
                <div class="form-row">
                    <label>Повторите пароль</label>
                    <input id="input-retype-password" class="tippeable" original-title="" name="confirm_password" type="password">
                 </div>

            </fieldset>
            <div class="form-fields-tip">
                <ul>
                    <li>Не менее 8 символов</li>
                    <li>Не хватает цифры или прописной буквы</li>
                </ul>
            </div>
            <a class="button-modal full-register-next-step-reg">
                Далее
            </a>
        </div>
		</form>
		<form id="full-registration-step2" action="{{ URL::to('/player/register') }}" method="post">	
		
        <div class="box box-2 full-register-block-2">
            <h2>Регистрация почти завершена - последний шаг</h2>
            <fieldset>
                <div class="form-row">
                    <label>Страна</label>
                    <div class="col-right-func-select col-right-func-number-select w100_992">
                        <span class="col-right-func-select-header input_country">Россия</span><div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                        <div class="col-right-func-select-options-wrapper">
                            <ul class="col-right-func-select-options">
                                <li>Россия</li>
                                <li>Украина</li>
                                <li>Белоруссия</li>
                                <li>Казахстан</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="form-row info">
                    <label>Адрес</label>
                    <input autocomplete="off" name="address" id="address" class="tippeable" original-title="" type="text">
                  </div>
            </fieldset>
            <fieldset>
                <div class="form-row">
                    <label>Город</label>
                    <input name="city" id="city" class="tippeable" original-title="" type="text">
                 </div>
                <div class="form-row">
                    <label>Почтовый индекс</label>
                    <input name="zip" id="zip" class="tippeable" original-title="" type="text">
                </div>
            </fieldset>
            <!--<fieldset>
                <div class="form-row">
                    <label>Секретный вопрос</label>
                    <div class="col-right-func-select col-right-func-number-select w100_992">
                        <span class="col-right-func-select-header">Мой любимый цвет?</span><div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                        <div class="col-right-func-select-options-wrapper">
                            <ul class="col-right-func-select-options">
                                <li>Мой любимый цвет?</li>
                                <li>Мой любимый цвет?</li>
                                <li>Мой любимый цвет?</li>
                                <li>Мой любимый цвет?</li>
                            </ul>
                        </div>
                    </div>
                    <div class="error">
                        Введите правильный пароль
                    </div>
                </div>
                <div class="form-row">
                    <label>Ответ на секретный вопрос</label>
                    <input id="input-retype-password" class="tippeable" original-title="" name="secret-answer" type="text">
                    <div class="error">
                        Введите правильный пароль
                    </div>
                </div>
            </fieldset>-->
            <fieldset>
                <div class=" form-row date-birthday">
                    <label>Дата рождения</label>
                    <div class="col-right-func-select col-right-func-number-select birthday-day">
                        <span class="col-right-func-select-header input_bdate_day">01</span><div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                        <div class="col-right-func-select-options-wrapper">
                            <ul class="col-right-func-select-options">
                                <li>02</li>
                                <li>03</li>
                                <li>04</li>
                                <li>05</li>
                                <li>06</li>
                                <li>07</li>
                                <li>08</li>
                                <li>09</li>
                                <li>10</li>
                                <li>11</li>
                                <li>12</li>
                                <li>13</li>
                                <li>14</li>
                                <li>15</li>
                                <li>16</li>
                                <li>17</li>
                                <li>18</li>
                                <li>19</li>
                                <li>20</li>
                                <li>21</li>
                                <li>22</li>
                                <li>23</li>
                                <li>24</li>
                                <li>25</li>
                                <li>26</li>
                                <li>27</li>
                                <li>28</li>
                                <li>29</li>
                                <li>30</li>
                                <li>31</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-right-func-select col-right-func-number-select birthday-month">
                        <span class="col-right-func-select-header input_bdate_month">Январь</span><div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                        <div class="col-right-func-select-options-wrapper">
                            <ul class="col-right-func-select-options">
                                <li>Январь</li>
                                <li>Февраль</li>
                                <li>Март</li>
                                <li>Апрель</li>
                                <li>Май</li>
                                <li>Июнь</li>
                                <li>Июль</li>
                                <li>Август</li>
                                <li>Сентябрь</li>
                                <li>Октябрь</li>
                                <li>Ноябрь</li>
                                <li>Декабрь</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-right-func-select col-right-func-number-select birthday-year">
                        <span class="col-right-func-select-header input_bdate_year">2017</span><div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                        <div class="col-right-func-select-options-wrapper">
                            <ul class="col-right-func-select-options">
                                <li>2017</li>
                                <li>2016</li>
                                <li>2015</li>
                                <li>2014</li>
                                <li>2013</li>
                                <li>2012</li>
                                <li>2011</li>
                                <li>2010</li>
                                <li>2009</li>
                                <li>2008</li>
                                <li>2007</li>
                                <li>2006</li>
                                <li>2005</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="form-row gender">
                    <label>Gender</label>
                    <div class="col-right-func-select col-right-func-number-select gender-select">
                        <span class="col-right-func-select-header input_gender">Male</span><div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                        <div class="col-right-func-select-options-wrapper">
                            <ul class="col-right-func-select-options">
                                <li>Male</li>
                                <li>Female</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </fieldset>
            <button class="button-modal next-step-reg">
                Регистрация
            </button>
        </div>
		</form>
    
</div>