<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <title>NFL -404  </title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
        <!-- END: CSS Assets-->

        <style>
            .button.intro-x.button.button--lg.border.border-white.mt-10.back_btn {
    padding: 15px;
    border-radius: 8px;
}
.intro-x.text-6xl.font-medium.error_heading {
    font-size: 70px;
    padding-bottom: 50px;

}
        </style>
    </head>
    <!-- END: Head -->
    <body class="app">
       <div class="container">
    <!-- BEGIN: Error Page -->
    <div class="error-page flex flex-col lg:flex-row items-center justify-center h-screen text-center lg:text-left">
        <div class="-intro-x lg:mr-20">
            <img alt="Midone Tailwind HTML Admin Template" class="h-48 lg:h-auto" src="{{ asset('dist/images/error-illustration.svg') }}">
        </div>
        <div class="text-white mt-10 lg:mt-0">
            <div class="intro-x text-6xl font-medium error_heading">404</div>
            <div class="intro-x text-xl lg:text-3xl font-medium">Oops. No Record Found.</div>
            <div class="intro-x text-lg mt-3">You may have mistyped the address or the page may have moved.</div>
            {{-- <a href="{{ route('dashboard') }}"> --}}
                <button  onclick="history.back()" class="intro-x button button--lg border border-white mt-10 back_btn">Back to Home</button>
            {{-- </a> --}}
        </div>
    </div>
    <!-- END: Error Page -->
</div>
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="{{ asset('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->
    </body>
</html>


{{-- @extends('../layout/' . $layout)

@section('subhead')
    <title>NFL | Pre Signup Users</title>
@endsection


<div class="container">
    <!-- BEGIN: Error Page -->
    <div class="error-page flex flex-col lg:flex-row items-center justify-center h-screen text-center lg:text-left">
        <div class="-intro-x lg:mr-20">
            <img alt="Midone Tailwind HTML Admin Template" class="h-48 lg:h-auto" src="{{ asset('dist/images/error-illustration.svg') }}">
        </div>
        <div class="text-white mt-10 lg:mt-0">
            <div class="intro-x text-6xl font-medium">404</div>
            <div class="intro-x text-xl lg:text-3xl font-medium">Oops. This page has gone missing.</div>
            <div class="intro-x text-lg mt-3">You may have mistyped the address or the page may have moved.</div>
            <button class="intro-x button button--lg border border-white mt-10">Back to Home</button>
        </div>
    </div>
    <!-- END: Error Page -->
</div> --}}

