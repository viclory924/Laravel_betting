<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env('APP_NAME')}}</title>


    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script src="{{ asset('js/ie-detector.js') }}"></script>
    <script src="{{ asset('js/modernizr.js') }}"></script>

</head>
<body>
@if (!Auth::user())
@include('layouts.partial.register-popup')
@endif


@include('layouts.partial.header')
@include('layouts.partial.deposit-popup')

@include('layouts.partial.contact-us-form')
@include('layouts.partial.responsible-gambling')
@include('layouts.partial.about-us')
@include('layouts.partial.general-bonus-terms')
@include('layouts.partial.terms-and-conditions')

<section class="top-content">


    @if(!isset($notPopularGames))
        @include('layouts.partial.popular-games')
    @endif


    <div class="top-content__bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="games-category text-right">
                        <a href="#">
                            VIDEO SLOTS
                        </a>
                        <a href="#">
                            TABLE GAMES
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="games-form">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="search-bar">
                                    <form>
                                        <div class="input-group">
                                            <input type="text" name="game_name" id="game_name" class="form-control" placeholder="SEARCH GAMES">
                                            <span class="input-group-btn">
			                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
			                                </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="select-provider">
                                    <select class="selectpicker dropdown" title="CATEGORIES" >
                                        <option>test</option>
                                        <option>test</option>
                                        <option>test</option>
                                        <option>test</option>
                                        <option>test</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="games-category text-left">
                        <a href="#">
                            VIDEO POKER
                        </a>
                        <a href="#">
                            VIRTUAL GAMES
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@yield('content')


<footer id="footer" class="wrapper footer">
    <ul class="footer__menu">
        <li><a data-toggle="modal" data-target=".about-us" href="#">About Us</a></li>
        <li><a data-toggle="modal" data-target=".responsible-gambling" href="#">Responsible Gambling</a></li>
        <li><a data-toggle="modal" data-target=".general-bonus-terms" href="#">General Bonus Terms</a></li>
        <li><a data-toggle="modal" data-target=".terms-and-conditions" href="#">Terms and Conditions</a></li>
        <li><a data-toggle="modal" data-target=".contact-us-form" href="#">Contact Us</a></li>
        <!--<li><a data-toggle="modal" data-target=".affiliates" href="#">Affiliates</a></li>-->
    </ul>
    <div class="container">
        <div class="row">
            <div class="curacao-wrapper">
                <div id="ceg-1bce2df4-719c-4b44-ae9b-9367bdcdd8a7" data-ceg-seal-id="1bce2df4-719c-4b44-ae9b-9367bdcdd8a7" data-ceg-image-size="128" data-ceg-image-type="basic-small"></div>
                <script type="text/javascript" src="https://1bce2df4-719c-4b44-ae9b-9367bdcdd8a7.curacao-egaming.com/ceg-seal.js"></script>
            </div>
        </div>

        <div class="row">
            <div class="payment-systems-wrapper">
                <div class="col-md-4 hidden-mobile">
                    <a href="#" class="payment-system">
                        <img src="{{ asset('img/payments/footer/paysafecard.png') }}" alt="">
                    </a>

                    <a href="#" class="payment-system">
                        <img src="{{ asset('img/payments/footer/instantbanking.png') }}" alt="">
                    </a>
                </div>
                <div class="col-md-4">
                    <div class="copyright text-center">&copy; copyright {{ date('Y') }} www.{{ env('BRAND_NAME') }}.com</div>
                </div>
                <div class="col-md-4 hidden-mobile">
                    <a href="#" class="payment-system">
                        <img src="{{ asset('img/payments/footer/giropay.png') }}" alt="">
                    </a>
                    <a href="#" class="payment-system">
                        <img src="{{ asset('img/payments/footer/sofort.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <ul class="footer__payments">
                <li>
                    <a href="#">
                        <img src="{{ URL::asset('img/payments/logo_creditcard.png') }}" alt="credit card">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ URL::asset('img/payments/skrill1.png') }}" alt="skrill">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ URL::asset('img/payments/logo_paysafecard.png') }}" alt="paysafe">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ URL::asset('img/payments/logo_neteller.png') }}" alt="neteller">
                    </a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="owners-text text-center">
                <p>All www.{{ env('BRAND_NAME') }}.com products are jointly operated and registered address is The Black Church,St. Mary's Place Dublin D07 P4AX, Ireland and Kanga B.V registered address Dr. M.J. Hugenholtzweg Z/N UTS-Gebouw Curaçao, a Company holding a curacao license and is regulated by the laws of Curacao under the Curacao Egaming authority license number 1668/JAZ. Payments are processed by Hayron Service Partner Limited registered address The Black Church,St. Mary's Place Dublin D07 P4AX, Ireland, as per agreement between the two companies.</p>
            </div>
        </div>


    </div>



</footer>


<!-- scripts
___________________________________________________________________________-->

<script src="{{ URL::asset('js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ URL::asset('js/isotope.pkgd.min.js') }}"></script>
<script src="{{ URL::asset('js/slick.min.js') }}"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script src="{{ URL::asset('js/fit-columns.js') }}"></script>
<script src="{{ URL::asset('js/common.js') }}"></script>
</body>
</html>
