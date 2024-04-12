@extends('../layout/' . $layout)

@section('head')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Login</title>
@endsection

@section('content')
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Rubick Tailwind HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
                    <span class="text-white text-lg ml-3">
                        {{ $general->name ? $general->name : 'NFL' }}
                    </span>
                </a>
                <div class="my-auto">

                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">{{ $general->name ? $general->name : 'NFL' }} <br> Management.</div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Manage all your Fixtures and Payments</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <!-- error alert -->
                    @if (session('message_error'))
                    {{-- <div class="alert alert-outline-danger alert-dismissible show flex items-center mb-2" role="alert">
                        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> {{session('message_error')}}
                        <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close">
                            <i data-feather="x" class="w-4 h-4"></i>
                        </button>
                    </div> --}}

                    <div class="alert alert-danger-soft show flex items-center mb-2 alert_messages" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                        {{session('message_error')}}
                    </div>
                    @endif

                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Sign In</h2>
                    <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                    <div class="intro-x mt-8">
                        <form id="login-form" method="POST" action="{{route('admin/login')}}">

                            @csrf
                            <input name="email" id="email" type="text" class="intro-x login__input form-control py-3 px-4 block" placeholder="Email" value="">
                            {{-- @error('email') <p class="text-danger">{{ $message }}</p>@enderror --}}
                            @error('email')<div id="error-email" class="login__input-error text-danger mt-2">{{ $message }}</div>@enderror
                            <input name="password" id="password" type="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password" value="">
                            @error('password')<div id="error-password" class="login__input-error text-danger mt-2">{{ $message }}</div>@enderror

                    </div>
                    {{-- <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                        <div class="flex items-center mr-auto">
                            <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                            <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                        </div>
                        <a href="">Forgot Password?</a>
                    </div> --}}
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button type="submit" id="btn-login" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>
                        {{-- <button class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Register</button> --}}
                    </div>
                    <div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left">
                        By signin up, you agree to our <a class="text-primary dark:text-slate-200" href="">Terms and Conditions</a> & <a class="text-primary dark:text-slate-200" href="">Privacy Policy</a>
                    </div>
                </form>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
    <style type="text/css">
        .login:after{
        background-image: url(https://gamedaypicksllc.com/front/img/login_bg.jpg);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    </style>
@endsection
