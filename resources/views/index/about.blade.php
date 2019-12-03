@extends('layouts.app')


@section('content')
<div id="page-bg">
    <main id="main">
        <div class="container">
            <div class="accordion">

                @include('partials.about-us_' . \App::getLocale())

            </div>
        </div>
    </main>

    <div id="top-page-bg" class="responsimg" data-responsimg780="{{ asset('img/top-page-bg.png') }}" data-responsimg10="{{ asset('img/top-page-bg-mobile.png') }}"></div>
    <div id="bottom-page-bg" class="responsimg" data-responsimg780="{{ asset('img/bottom-page-bg.png') }}" data-responsimg10="{{ asset('img/bottom-page-bg-mobile.png') }}"></div>
</div>
@endsection