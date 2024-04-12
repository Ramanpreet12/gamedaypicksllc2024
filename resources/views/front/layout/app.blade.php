<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- intl-tel-input  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.1.6/css/intlTelInput.css">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KFQ62F0F5W"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-KFQ62F0F5W');
    </script>

    @stack('css')
    @if (!empty($general->favicon))
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/images/general/' . $general->favicon) }}">
    @else
        <link rel="icon" type="image/x-icon" href="">
    @endif

    <title>{{ $general->name ? $general->name : 'NFL' }}</title>
    {{-- jersey display css --}}
    <link rel="stylesheet" href="{{ asset('front/css/jersey_display_style.css') }}">
    <!--light-slider.css------------->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/lightslider/dist/css/lightslider.css') }}">

</head>


<body >

<!-- Loader -->
{{-- <div class="global-loader-wrapper">
    <div class="global-loader"></div>
</div> --}}

    {{-- <div class="global-content"> --}}
        @include('front.layout.header')
        @yield('content')
        @include('front.layout.footer')
        @yield('script')
    {{-- </div> --}}


    <script id='pixel-script-poptin' src='https://cdn.popt.in/pixel.js?id=50df6b4a857a8' async='true'></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>




</body>

</html>
