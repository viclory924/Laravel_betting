<!DOCTYPE html>
<html lang="{{ \App::getLocale() }}" class="home-page-html overflow-hidden">
<head>
    <meta charset="utf-8">

    <title>Bettend</title>
    <meta name="description" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicon/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicon/apple-touch-icon-114x114.png') }}">

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#000">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#000">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">

    <script src="{{ asset('js/loader.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/loader.css?v=1') }}">
</head>
<body class="home-page home-page-bg">

    @yield('content')

<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/main.min.css') }}?v=<?php echo md5(rand()); ?>">
<script src="{{ asset('js/scripts.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>
<script src="{{ asset('js/validation.js') }}?v=<?php echo md5(rand()); ?>"></script>

</body>
</html>