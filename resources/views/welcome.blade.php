<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{env('APP_NAME')}}</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>

    @include('layouts.partial.register-popup')

    <div class="deposit">
<div class="modal fade deposit-modal" id="player-deposit-modal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Deposit
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form class="form-horizontal" role="form" action="{{ URL::to('/deposit') }}" method="post">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">Amount</label>
                    <div class="col-sm-10">
                        {{csrf_field()}}
                        <input type="hidden" id="merchant_id" name="merchant_id" value="{{env('MERCHANT_ID')}}">
                       <input type="number" required class="form-control" id="amount" name="amount" placeholder="Enter amount to deposit">
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Done</button>
                    </div>
                  </div>
                </form>
                
            </div>
            
            
      </div>
    </div>
</div>
        
    </div>

    @include('layouts.partial.header')

    <section class="top-content">
        <div class="top-content__inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-lg-push-2 col-md-12">
                        <div class="top-content__center">
                            <nav>
                                <ul class="clearfix">
                                    <li><a class="text-right" href="#">slots</a></li>
                                    <li><a class="text-center" href="#">live casino</a></li>
                                    <li><a class="text-left" href="#">sport</a></li>
                                </ul>
                            </nav>
                            <div class="top-content__carousel">
                                <div class="title">popular games</div>
                                <div class="carousel-box">
                                    <div class="item">
                                        <a href="#" style="background-image: url(img/popular-games/1.jpg);">
                                            <span class="game-title">Game Name</span>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" style="background-image: url(img/popular-games/2.jpg);">
                                            <span class="game-title">Game Name</span>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" style="background-image: url(img/popular-games/3.jpg);">
                                            <span class="game-title">Game Name</span>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" style="background-image: url(img/popular-games/4.jpg);">
                                            <span class="game-title">Game Name</span>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" style="background-image: url(img/popular-games/1.jpg);">
                                            <span class="game-title">Game Name</span>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" style="background-image: url(img/popular-games/2.jpg);">
                                            <span class="game-title">Game Name</span>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" style="background-image: url(img/popular-games/3.jpg);">
                                            <span class="game-title">Game Name</span>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" style="background-image: url(img/popular-games/4.jpg);">
                                            <span class="game-title">Game Name</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-lg-pull-8 col-xs-6">
                        <div class="top-content__left text-center">
                            <a href="#" style="background-image: url('img/popular-games/7.jpg');">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-xs-6">
                        <div class="top-content__right text-center">
                            <a href="#" style="background-image: url(img/popular-games/8.jpg);">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-content__bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-8 col-xs-6">
                        <div class="search-bar">
                            <form>
                                <div class="input-group">
                                    <input type="text" name="game_name" class="form-control" placeholder="SEARCH GAMES...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-6">
                        <div class="select-provider">
                            <select class="selectpicker dropdown" title="POPULAR GAMES" >
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
    </section>

    @yield('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="content__games">
                    <div class="content__col col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="content__item">
                            <a href="#" style="background-image: url(img/popular-games/1.jpg)">
							<span class="game-title">
		                        Game Name
		                    </span>
                            </a>
                        </div>
                    </div>
                    <div class="content__col col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="content__item">
                            <a href="#" style="background-image: url(img/popular-games/1.jpg)">
							<span class="game-title">
		                        Game Name
		                    </span>
                            </a>
                        </div>
                    </div>
                    <div class="content__col col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="content__item">
                            <a href="#" style="background-image: url(img/popular-games/1.jpg)">
							<span class="game-title">
		                        Game Name
		                    </span>
                            </a>
                        </div>
                    </div>
                    <div class="content__col col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="content__item">
                            <a href="#" style="background-image: url(img/popular-games/1.jpg)">
							<span class="game-title">
		                        Game Name
		                    </span>
                            </a>
                        </div>
                    </div>
                    <div class="content__col col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="content__item">
                            <a href="#" style="background-image: url(img/popular-games/1.jpg)">
							<span class="game-title">
		                        Game Name
		                    </span>
                            </a>
                        </div>
                    </div>
                    <div class="content__col col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="content__item">
                            <a href="#" style="background-image: url(img/popular-games/1.jpg)">
							<span class="game-title">
		                        Game Name
		                    </span>
                            </a>
                        </div>
                    </div>
                    <div class="content__col col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="content__item">
                            <a href="#" style="background-image: url(img/popular-games/1.jpg)">
							<span class="game-title">
		                        Game Name
		                    </span>
                            </a>
                        </div>
                    </div>
                    <div class="content__col col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="content__item">
                            <a href="#" style="background-image: url(img/popular-games/1.jpg)">
							<span class="game-title">
		                        Game Name
		                    </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer" class="wrapper footer">

    </footer>


    <!-- scripts
    ___________________________________________________________________________-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/common.js"></script>
    </body>
</html>
