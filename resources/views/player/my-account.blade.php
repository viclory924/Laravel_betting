@extends('layouts.2.app')


@section('content')
<section class="content my-profile">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="account-item">
                    <a href="{{ URL::to('/profile') }}" class="d-block btn btn-outline-success btn-lg">
                        <i class="d-block display-3 fa fa-user"></i>
                        My Profile
                    </a>
                </div>
            </div>
            <div class="col">
                <a href="{{ URL::to('/game-history') }}" class="d-block d-block btn btn-outline-success btn-lg">
                    <i class="d-block display-3 fa fa-history"></i>
                    Game History
                </a>
            </div>
            <div class="col">
                <a href="{{ URL::to('/active-games') }}" class="d-block btn btn-outline-success btn-lg">
                    <i class="d-block display-3 fa fa-hourglass-half"></i>
                    Active Games
                </a>
            </div>
            <div class="col">
                <a href="{{ URL::to('/favourite-games') }}" class="d-block btn btn-outline-success btn-lg">
                    <i class="d-block display-3 fa fa-star"></i>
                    Favourite Games
                </a>
            </div>
            <div class="col">
                <a href="{{ URL::to('/favourite-sports') }}" class="d-block btn btn-outline-success btn-lg">
                    <i class="d-block display-3 fa-futbol-o"></i>
                    Favourite Sports
                </a>
            </div>
            <div class="col">
                <a href="{{ URL::to('/kyc-docs') }}" class="d-block btn btn-outline-success btn-lg">
                    <i class="d-block display-4 fa-address-card-o"></i>
                    KYC Documents
                </a>
            </div>
            <div class="col">
                <a href="#" data-target=".deposit-modal" data-toggle="modal" class="btn btn-info btn-lg">Deposit</a>
            </div>
            <div class="col">
                <a href="#" class="btn btn-info btn-lg">Withdrawal</a>
            </div>
            <div class="col">
                <a href="#" class="btn btn-info btn-lg">VIP</a>
            </div>
            <div class="col">
                <a href="#" class="btn btn-info btn-lg">Bonus</a>
            </div>
            <div class="col">
                <a href="#" class="btn btn-info btn-lg">My Ratings</a>
            </div>
            <div class="col">
                <a href="" class="btn btn-info btn-lg">Account History</a>
            </div>
        </div>
    </div>
</section>
@endsection

