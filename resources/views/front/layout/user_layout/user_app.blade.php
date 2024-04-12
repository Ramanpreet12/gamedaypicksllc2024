<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
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
</head>

<body>
    @include('front.layout.user_layout.user_header')
    @yield('content')
    @include('front.layout.user_layout.user_footer')

</body>

</html>
