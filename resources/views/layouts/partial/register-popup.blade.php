<div class="register">
    <div class="modal fade bs-example-modal-lg register-popup" id="player-register-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="register__title text-center">
                    <h2>Welcome</h2>
                </div>
                <form action="{{ URL::to('/player/register') }}" method="post" id="register-player-form" name="register-player-form">
                    {{csrf_field()}}
                    <input type="hidden" id="merchant_id" name="merchant_id" value="{{ env('MERCHANT_ID') }}">
                    <div class="fonr-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" required name="username" placeholder="Enter your username">
                    </div>
                    <div class="form-group clearfix">
                        <div class="col-sm-6">
                            <label for="username">Name</label>
                            <input type="text" class="form-control" id="name" required name="name" placeholder="Enter your name">
                        </div>
                        <div class="col-sm-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" required name="email" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <div class="col-sm-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" required name="password" placeholder="Enter password">
                        </div>
                        <div class="col-sm-6">
                            <label for="conf-password">Confirm password</label>
                            <input type="password" class="form-control" id="confirm_password" required name="confirm_password" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <div class="col-sm-6">
                            <label for="dob">BirthDate</label>
                            <input type="text" class="form-control" id="dob" name="dob" required placeholder="Date Of Birth" value="1985-07-12 12:00:00">
                        </div>
                        <div class="col-sm-6">
                            <label for="currency">Currency</label>
                            <select class="form-control" name="currency" id="currency" required>
                                <option value="">---</option>
                                @foreach($currencies as $currency)
                                    <option value="{{$currency->id}}">{{$currency->char_code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <div class="col-sm-6">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" required name="phone" placeholder="Phone" value="+380976534373">
                        </div>
                        <div class="col-sm-6">
                            <label for="country_id">Country</label>
                            <select class="form-control" name="country_id" id="country_id" required>
                                <option value="">---</option>
                                @foreach ($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="zip">Zip</label>
                            <input type="text" name="zip" id="zip" required class="form-control" placeholder="Zip">
                        </div>
                        <div class="col-sm-6">
                            <label for="city">City</label>
                            <input type="text" name="city" id="city" required class="form-control" placeholder="City">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="Address">Address</label>
                            <input type="text" name="address" id="address" required class="form-control" placeholder="Address">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <div class="col-sm-6 col-sm-offset-3 text-center">
                            <button type="button" id="register-player-submit" class="btn btn-default">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>