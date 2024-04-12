@extends('../layout/base')

@section('body')
    <body class="login">
        @yield('content')
        @include('../layout/components/dark-mode-switcher')
        @include('../layout/components/main-color-switcher')

        <!-- BEGIN: JS Assets-->
        <script src="{{ mix('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->

        <!-- BEGIN: custom js -->
        <script src="{{ asset('dist/js/custom.js') }}"></script>
        <!-- END: custom js -->

        <!-- BEGIN: jquery -->
        {{-- <script src="{{ asset('dist/js/jquery.min.js') }}"></script> --}}
        <!-- END: jquery -->





        @yield('script')
    </body>
@endsection
