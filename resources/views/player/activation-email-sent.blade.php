<!DOCTYPE html>
<html class="sub-page">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title>Casino</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <script src="{{ asset('/js/pace.min.js') }}"></script>
</head>
<body class="responsimg" data-responsimg780="{{ asset('/img/sub-page-bg.jpg') }}" data-responsimg10="{{ asset('/img/sub-page-mobile-bg.jpg') }}">


<div id="popup">
    <div class="container">
        <div class="control-box">
            <header class="header">
                <img src="{{ asset('/img/footer-logo.png') }}" alt="">
            </header>
            <div class="content-box">
                <div class="sub-box">
                    <p class="title golden-text">{{ $title }}</p>
                    <p>{{ $text }}</p>
                    <!-- <p class="title golden-text" data-text="Активация прошла успешно!">Активация прошла успешно!</p>&lt;!&ndash;Страница не найдена!&ndash;&gt;
                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>-->

                </div>
            </div>
            <footer class="footer">
                <a href="{{ URL::to('/') }}" class="btn">{{ __('common.home') }}</a>
            </footer>
        </div>
    </div>
</div>

<div id="page-preloader">
    <img src="{{ asset('/img/prelodaer-logo.png') }}" alt="">

    <div id="loading-progress">
        <svg class="lds-spin" width="160px" height="160px" viewbox="0 0 100 100" preserveaspectratio="xMidYMid">
            <g transform="translate(75,50)">
                <g transform="rotate(0)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="1">
                        <animatetransform attributename="transform" type="scale" begin="-1.2833333333333332s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-1.2833333333333332s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(71.65063509461098,62.5)">
                <g transform="rotate(29.999999999999996)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.9166666666666666">
                        <animatetransform attributename="transform" type="scale" begin="-1.1666666666666667s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-1.1666666666666667s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(62.5,71.65063509461096)">
                <g transform="rotate(59.99999999999999)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.8333333333333334">
                        <animatetransform attributename="transform" type="scale" begin="-1.05s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-1.05s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(50,75)">
                <g transform="rotate(90)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.75">
                        <animatetransform attributename="transform" type="scale" begin="-0.9333333333333332s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-0.9333333333333332s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(37.50000000000001,71.65063509461098)">
                <g transform="rotate(119.99999999999999)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.6666666666666666">
                        <animatetransform attributename="transform" type="scale" begin="-0.8166666666666665s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-0.8166666666666665s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(28.34936490538903,62.5)">
                <g transform="rotate(150.00000000000003)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.5833333333333334">
                        <animatetransform attributename="transform" type="scale" begin="-0.6999999999999998s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-0.6999999999999998s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(25,50)">
                <g transform="rotate(180)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.5">
                        <animatetransform attributename="transform" type="scale" begin="-0.5833333333333334s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-0.5833333333333334s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(28.34936490538903,37.50000000000001)">
                <g transform="rotate(209.99999999999997)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.4166666666666667">
                        <animatetransform attributename="transform" type="scale" begin="-0.4666666666666666s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-0.4666666666666666s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(37.499999999999986,28.349364905389038)">
                <g transform="rotate(239.99999999999997)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.3333333333333333">
                        <animatetransform attributename="transform" type="scale" begin="-0.3499999999999999s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-0.3499999999999999s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(49.99999999999999,25)">
                <g transform="rotate(270)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.25">
                        <animatetransform attributename="transform" type="scale" begin="-0.2333333333333333s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-0.2333333333333333s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(62.5,28.349364905389034)">
                <g transform="rotate(300.00000000000006)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.16666666666666666">
                        <animatetransform attributename="transform" type="scale" begin="-0.11666666666666665s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-0.11666666666666665s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(71.65063509461096,37.499999999999986)">
                <g transform="rotate(329.99999999999994)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.08333333333333333">
                        <animatetransform attributename="transform" type="scale" begin="0s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="0s"></animate>
                    </circle>
                </g>
            </g>
        </svg>
    </div>
</div>


<script src="{{ asset('/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('/js/modernizr.custom.js') }}"></script>
<script src="{{ asset('/js/jquery.responsImg.min.js') }}"></script>
<script src="{{ asset('/js/jquery.cookie.js') }}"></script>
<script src="js\select2.full.min.js"></script>
{{--<script src="js\tabs.min.js"></script>--}}
<script src="js\jquery.date-dropdowns.js"></script>
<script src="{{ asset('/js/swiper.min.js') }}"></script>
<script src="{{ asset('/js/sticky.min.js') }}"></script>
<script src="{{ asset('/js/iframeResizer.min.js') }}"></script>
<script src="{{ asset('/js/main.js') }}"></script>


</body>
</html>
