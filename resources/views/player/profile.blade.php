@extends('layouts.2.app')

@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <h1>Profile</h1>
            </div>

            <form action="/profile/update" method="post">
                <div class="row">
                    {{ csrf_field() }}
                    <input type="hidden" name="player_id" value="{{ $player->id }}">


                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="firstname">Name</label>
                        <input type="text" class="form-control" name="firstname" value="{{ $player->name }}">
                    </div>
                </div>

                <!--<div class="col-sm-6">
                    <div class="form-group">
                        <label for="firstname">FirlstName</label>
                        <input type="text" class="form-control" name="firstname">
                    </div>
                </div>-->

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" class="form-control">
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="dob">Birthdate</label>
                        <input type="date" class="form-control" name="dob" value="{{ date('Y-m-d', strtotime($player->dob)) }}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ $player->phone }}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" value="">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" disabled class="form-control" name="email" value="{{ $player->email }}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="status">Account Status</label>
                        <input type="text" disabled class="form-control" name="status" value="{{ $player->status }}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="currency">Currency</label>
                        <input type="text" disabled class="form-control" name="currency" value="{{ $player->currency->char_code }}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="lang">Language</label>
                        <input type="text" class="form-control" name="country_id" id="country_id" value="{{ $player->country->name }}" disabled>
                    </div>
                </div>

                </div>

                <div class="row">
                    <div class="col-md-12">

                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </div>

            </form>

        </div>
    </section>
@endsection