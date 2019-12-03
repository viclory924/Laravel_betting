@extends('layouts.2.app')

@section('banner-slider')
    @include('layouts.2.partials.banner-slider')
@endsection

@section('main-menu')
    @include('layouts.2.partials.main-menu')
@endsection


@section('content')

    <section class="content">


        <div class="container-fluid games-section text-center {{$type}}-games" data-games-type="{{$type}}">
            <div class="row">
                <div class="col">
                    <h5 class="my-0 mr-md-auto font-weight-normal">Games</h5>
                </div>
            </div>

            <div class="row games"></div>
            <a href="#" class="btn btn-info view-more show-more">View More ></a>
        </div>

    </section>

@endsection