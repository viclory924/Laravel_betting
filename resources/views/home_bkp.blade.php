@extends('layouts.2.app')

@section('banner-slider')
    @include('layouts.2.partials.banner-slider')
@endsection

@section('main-menu')
    @include('layouts.2.partials.main-menu')
@endsection

@section('content')

    <section class="content">

        <div class="container-fluid text-center games-section popular-games" data-games-type="popular" data-param="limit">
            <div class="row">
                <div class="col">
                    <h5 class="my-0 mr-md-auto font-weight-normal">
                        Popular Games
                    </h5>

                </div>
            </div>
            <div class="row games justify-content-center">
                <img class="loader" src="{{ asset('/img/layout2.0/loader.gif') }}" alt="">
            </div>
            <a href="#" class="btn btn-info view-more show-more">View More ></a>
        </div>

        <!--
        <div class="container-fluid text-center games-section table-games" data-games-type="table" data-param="limit">
            <div class="row">
                <div class="col">
                    <h5 class="my-0 mr-md-auto font-weight-normal">
                        Table Games
                        <a href="#" class="view-more pull-right show-more">View More ></a>
                    </h5>
                </div>
            </div>

            <div class="row games justify-content-center">
                <img class="loader" src="{{ asset('/img/layout2.0/loader.gif') }}" alt="">
            </div>
            <a href="#" class="btn btn-info view-more show-more">View More ></a>
        </div>
        -->

        <div class="container-fluid games-section text-center casino-games d-none" data-games-type="casino">
            <div class="row">
                <div class="col">
                    <h5 class="my-0 mr-md-auto font-weight-normal">
                        Casino Games
                    </h5>
                </div>
            </div>

            <div class="row games justify-content-center"></div>
        </div>

        <div class="container-fluid games-section text-center all-games d-none" data-games-type="all">
            <div class="row">
                <div class="col">
                    <h5 class="my-0 mr-md-auto font-weight-normal">
                        Games
                    </h5>
                </div>
            </div>

            <div class="row games justify-content-center"></div>
            <a href="#" class="btn btn-info view-more show-more">View More ></a>
        </div>

    </section>


@endsection
