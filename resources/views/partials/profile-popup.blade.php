<?php $player_info = \App\Helpers\Functions::getPlayerInfo(); ?>
<div class="private-office-popup hidden">
    <div class="sub-box">
        <div class="office-nav">
            <a href="{{ URL::to('/logout') }}" class="js-leave-popup js-not-leave-popup">{{ __('auth.logout') }}</a>
            <a href="" class="nav-item active" data-box="profile-box">
                <span class="icon">
                    <img src="{{ asset('img/profile-icon.png') }}" alt="">
                </span>
                {{ __('common.profile') }}
            </a>
            <a href="" class="nav-item" data-box="deposit-box">
                <span class="icon">
                    <img src="{{ asset('img/deposit-icon.png') }}" alt="">
                </span>
                {{ __('common.deposit') }}
            </a>
            <a href="" class="nav-item" data-box="withdrawal-box">
                <span class="icon">
                    <img src="{{ asset('img/withdrawal-icon.png') }}" alt="">
                </span>
                {{ __('common.withdraw') }}
            </a>
            <a href="" class="nav-item" data-box="bonus-box">
                <span class="icon">
                    <img src="{{ asset('img/bonus-icon.png') }}" alt="">
                </span>
                {{ __('common.bonuses') }}
            </a>
        </div>

        <div class="office-items">
            <div class="profile-box office-item">
                <div class="private-office-tabs">
                    <ul class="tabs-list tabs">
                        <li>
                            <span class="tab-btn">
                                <span class="desktop-text">{{ __('common.personal_data') }}</span>
                                <span class="mobile-text">Данные</span>
                            </span>
                        </li>
                        <li>
                            <span class="tab-btn">{{ __('common.checking_tab') }}</span>
                        </li>
                        <li>
                            <span class="tab-btn">{{ __('common.change_password') }}</span>
                        </li>
                    </ul>
                    <div class="tabs-content tabs">
                        <div class="tab">
                            <form action="{{ URL::to('/profile/update') }}" method="post" id="personal_data" class="form">
                                {{ csrf_field() }}
                                <div class="two-cols">
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" class="form-control" name="username" disabled value="{{ $player_info->username }}" placeholder="{{ __('common.your_login') }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" class="form-control" name="name" value="{{ $player_info->name }}" placeholder="{{ __('common.your_name') }} {{ __('common.your_surname') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="two-cols">
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" name="dob" class="form-control" value="{{ \Carbon\Carbon::parse($player_info->dob)->format('Y-m-d') }}" placeholder="1989-08-11">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" name="phone" value="{{ $player_info->phone }}" class="form-control" placeholder="{{ __('registration.phone') }}">
                                        </div>
                                    </div>
                                    {{--<div class="col">--}}
                                        {{--<div class="field">--}}
                                            {{--<select name="sel-gender2" id="sel-gender2" class="select">--}}
                                                {{--<option value="male">{{ __('common.male') }}</option>--}}
                                                {{--<option value="female">{{ __('common.female') }}</option>--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                                <div class="two-cols">
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" value="{{ $player_info->country->name }}" disabled class="form-control" placeholder="{{ __('registration.country') }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" name="city" value="{{ $player_info->city }}" class="form-control" placeholder="{{ __('common.city') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="two-cols">
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" name="address" value="{{ $player_info->address }}" class="form-control" placeholder="{{ __('common.address') }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" name="zip" value="{{ $player_info->zip }}" class="form-control" placeholder="{{ __('common.zip') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="two-cols">
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" disabled class="form-control" value="{{ $player_info->email }}" placeholder="Email">
                                        </div>
                                    </div>
                                    {{--<div class="col">--}}
                                        {{--<div class="field">--}}
                                            {{--<input type="text" name="phone" value="{{ $player_info->phone }}" class="form-control" placeholder="{{ __('registration.phone') }}">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                                <div class="two-cols">
                                    {{--<div class="col">--}}
                                        {{--<div class="field">--}}
                                            {{--<input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($player_info->dob)->format('Y-m-d') }}" placeholder="1989-08-11">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                                <button type="submit" class="btn">{{ __('common.save') }}</button>
                            </form>
                        </div>
                        <div class="tab">
                            {{ __('common.checking_tab') }}
                        </div>
                        <div class="tab">
                            <form action="{{ URL::to('/update-password') }}" method="post" id="change_password" class="form change-password">
                                {{ csrf_field() }}
                                <div class="two-cols">
                                    <div class="col">
                                        <div class="field">
                                            <input type="password" class="form-control" name="password" placeholder="{{ __('common.new_password') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="two-cols">
                                    <div class="col">
                                        <div class="field">
                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="{{ __('common.repeat_password') }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn">{{ __('common.save') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="deposit-box office-item">
                <div class="private-office-tabs">
                    <ul class="tabs-list tabs">
                        <li>
                            <span class="tab-btn">{{ __('common.balance') }}</span>
                        </li>
                        <!--<li>
                            <span class="tab-btn">{{ __('common.history') }}</span>
                        </li>-->
                        <li>
                            <span class="tab-btn">{{ __('common.payment_history') }}</span>
                        </li>
                    </ul>
                    <div class="tabs-content tabs">
                        <div class="tab">
                            <div class="data-list">
                                <div class="item">
                                    <p>{{ __('common.withdraw_done') }}:</p>
                                    <p class="sum withdraw-display"><strong>0.00</strong> {{ $player_info->currency->char_code }}</p>
                                </div>
                                <div class="item">
                                    <p>{{ __('common.your_bonuses') }}: {{ $player_info->bonus }}</p>
                                    <p class="sum bonus-display"><strong>{{ $player_info->bonus }}</strong> {{ $player_info->currency->char_code }}</p>
                                </div>
                                <div class="item">
                                    <p>{{ __('common.your_balance') }}: {{$player_info->balance}}</p>
                                    <p class="sum balance-display"><strong>{{ $player_info->balance }}</strong> {{ $player_info->currency->char_code }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            @php
                            $payment_history = \App\Helpers\Functions::getPlayerPaymentHistory();
                            @endphp
                            @if(count($payment_history) > 0)
                                <table class="table">
                                    <tr>
                                        <th>Id</th>
                                        <th>Currency</th>
                                        <th>Value</th>
                                        <th>Result</th>
                                        <th>Date</th>
                                    </tr>
                                    @foreach($payment_history as $payment)
                                    <tr>
                                        <td>{{ $payment->id }}</td>
                                        <td>{{ $payment->currency }}</td>
                                        <td>{{ $payment->value }}</td>
                                        <td>{{ $payment->result }}</td>
                                        <td>{{ \date('d-m-Y', \strtotime($payment->created_at)) }}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            @else
                                {{ __('common.no_operations_found') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="withdrawal-box office-item">
                <div class="private-office-tabs">
                    <ul class="tabs-list tabs">
                        <li>
                            <span class="tab-btn">{{ __('common.new_withdraw') }}</span>
                        </li>
                        <li>
                            <span class="tab-btn">{{ __('common.done_withdraw') }}</span>
                        </li>
                    </ul>
                    <div class="tabs-content tabs">
                        <div class="tab">
                            <div class="data-list">
                                <div class="item">
                                    <p>{{ __('common.your_balance') }}:</p>
                                    <p class="sum"><strong>{{ $player_info->balance }}</strong> {{ $player_info->currency->char_code }}</p>
                                </div>
                                <div class="item">
                                    <p>{{ __('common.choose_withdraw_method') }}</p>
                                    <form class="form" action="#">
                                        <div class="two-cols">
                                            <div class="col">
                                                <div class="field">
                                                    <select name="sel11" id="sel11" class="img-select">
                                                        <option value="NETELLER" data-img="{{ asset('img/uploads/select-img1.png') }}">NETELLER</option>
                                                        <option value="NETELLER 2" data-img="{{ asset('img/uploads/select-img2.png') }}">NETELLER 2</option>
                                                        <option value="NETELLER 3" data-img="{{ asset('img/uploads/select-img3.png') }}">NETELLER 3</option>
                                                        <option value="NETELLER 4" data-img="{{ asset('img/uploads/select-img4.png') }}">NETELLER 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn">{{ __('common.withdraw') }}</button>
                                    </form>
                                </div>
                                <div class="item">
                                    <div class="additional-info">
                                        <p>Lorem Ipsum is simply dummy text of the printing<br>+11 1111 11 1111<br>Lorem Ipsum</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            {{ __('common.done_withdraw') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="bonus-box office-item">
                <div class="private-office-tabs">
                    <ul class="tabs-list tabs">
                        <li>
                            <span class="tab-btn">{{ __('common.bonus_tab') }}</span>
                        </li>
                        <li>
                            <span class="tab-btn">{{ __('common.bonus_tab') }}2</span>
                        </li>
                    </ul>
                    <div class="tabs-content tabs">
                        <div class="tab">
                            {{ __('common.bonus_tab') }}
                        </div>
                        <div class="tab">
                            {{ __('common.bonus_tab') }}2
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <span class="js-close-popup" title="Закрыть"></span>
</div>