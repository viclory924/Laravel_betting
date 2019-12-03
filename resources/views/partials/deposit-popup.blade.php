@if(Auth::user())
    <?php $balanceObj = App\StaygamingBO::getBalanceByPlayerId(Auth::user()->player_id); ?>
    <?php $playerInfo = \App\Helpers\Functions::getPlayerInfo(); ?>
    <?php $bonuses = \App\Helpers\Functions::getBonusesList(); ?>
    <div class="simple-popup payment-order hidden">
		 <p class="h2" data-text="Депозит с neteller">{{ __('depo.depo_with') }} Credit Card</p>
        <div class="max-w">
            <p class="large">Min deposit amount: {{ $balanceObj->result->min_depo }} {{ $playerInfo->currency->char_code }}<br> Max deposit amount: {{ $balanceObj->result->max_depo }} {{ $playerInfo->currency->char_code }}</p>
            <!--
            <form action="#" class="form">
                <div class="field">
                    <input type="text" class="form-control" placeholder="Amount">
                    <button type="button" class="btn sub-color field-btn">{{ $playerInfo->currency->char_code }}</button>
                </div>
                <button type="button" class="btn full-width">{{ __('common.continue') }}</button>
            </form>
            -->

            <form class="deposit-form" role="form" action="{{ URL::to('/deposit') }}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="depo_url" value="{{ \App\Helpers\Functions::getDepositUrl() }}">
                <input type="hidden" class="bo_url" value="{{ env('BO_URL') }}">

                <input type="hidden" name="player_id" value="{{ $playerInfo->id }}"/>
                {{--<input type="hidden" name="new_card" value="1" id="depositNewCard">--}}
                <input type="hidden" name="cardtype" value="VISA">



                <input type="hidden" name="account_type" value="live">
                <input type="hidden" name="first_name" value="{{ $playerInfo->name }}">
                <input type="hidden" name="last_name" value="{{ $playerInfo->name }}">
                <input type="hidden" name="email" required="" value="{{ $playerInfo->email }}">
                <input type="hidden" name="address" required="" value="{{ $playerInfo->address }}">
                <input type="hidden" name="city" required="" value="{{ $playerInfo->city }}">
                <input type="hidden" name="state" value="{{ $playerInfo->city }}">
                <input type="hidden" name="country" value="{{ $playerInfo->country->iso_code_2 }}">
                <input type="hidden" name="country_three" value="{{ $playerInfo->country->iso_code_3 }}"/>
                <input type="hidden" name="zip" value="{{ $playerInfo->zip }}">
                <input type="hidden" name="currency" value="{{ $playerInfo->currency->char_code }}">
                <input type="hidden" name="merchant_id" value="{{env('MERCHANT_ID')}}">
                <input type="hidden" name="mobile" value="{{ $playerInfo->phone }}">


                @if(count($bonuses)>0)
                    <div class="form-group">
                        <label  class="col-sm-2 control-label" for="inputEmail3">Bonus</label>
                        <div class="col-sm">
                            <select class="form-control" id="bonuses" name="bonus_id">
                                <option value="0">select bonus</option>

                                @foreach($bonuses as $bonus)
                                    <option value="{{ $bonus->id }}">{{ $bonus->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div/>
                @else
                    <input type="hidden" name="bonus_id" value="0">
                @endif

                <div class="form-group">
                    <label  class="control-label" for="amount">Amount</label>
                    <div>
                        <input type="number" required class="form-control" name="amount" min="{{ $balanceObj->result->min_depo }}" max="{{ $balanceObj->result->max_depo }}" placeholder="Enter amount to deposit">
                    </div>
                </div>
                <div class="form-group form-inline psp-types">
                    <div class="col-md-4 box">
                        <label class="" href="#">
                            <img src="{{ asset('img/payments/logo_creditcard.png') }}" alt="..." class="">
                            <input type="radio" name="payment_method" value="RAVEDIRECTFP" required class="d-none" autocomplete="off" checked>
                        </label>
                    </div>
                </div>

                <!--<div class="form-group">
                    <p class="alert alert-danger error-text">
                        {{ __('common.depo_profile_not_filled') }}
                    </p>
                </div>!-->


                <div class="form-group">
                    {{--<div class="col-sm-offset-2 col-sm-10">--}}
                    <button type="button" @if ($playerInfo->can_depo == false)  {{'disabled'}} @endif class="btn btn-primary mt-3">Done</button>
                    {{--</div>--}}
                </div>




            </form>
        </div>
        <span class="js-close-popup" title="{{ __('common.close') }}"></span>
    </div>

	<div class="simple-popup invoke-gateway hidden" style="padding-bottom:0px">
	 <iframe id="invoke-payment" class="invoke-payment" style="position:relative;width:100%;height:600px;"></iframe>
	<span class="js-close-popup" title="{{ __('common.close') }}"></span>
	</div>

@endif
