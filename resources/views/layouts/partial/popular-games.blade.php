<div class="top-content__inner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-push-2 col-md-12">
                <div class="top-content__center">
                    @if(Auth::user())
                        <a href="#" class="deposit" data-toggle="modal" data-target=".deposit-modal">
                            <img src="{{ URL::asset('img/depo.png') }}" alt="">
                        </a>
                    @else
                        <a href="#" class="deposit" data-toggle="modal" data-target=".bs-example-modal-lg">
                            <img src="{{ URL::asset('img/CREATE ACCOUNT.png') }}" alt="">
                        </a>
                    @endif
                    <div class="top-content__carousel">
                        <div class="title">popular games</div>
                        <div class="carousel-box">
                            <div class="item">
                                <a href="#" style="background-image: url('img/popular-games/1.jpg');">
                                    <span class="game-title">Game Name</span>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" style="background-image: url('img/popular-games/2.jpg');">
                                    <span class="game-title">Game Name</span>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" style="background-image: url('img/popular-games/3.jpg');">
                                    <span class="game-title">Game Name</span>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" style="background-image: url('img/popular-games/4.jpg');">
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