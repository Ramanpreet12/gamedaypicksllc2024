@extends('front.layout.app')
@section('content')
    <style>
        label.error {
            color: red;
        }
    </style>
   <section id="loginForm">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-8 col-lg-6 col-md-8">

          @if (session()->has('pre_signup_success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('pre_signup_success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
            @if (session()->has('success'))
                <div class="alert alert-success show flex items-center mb-2 alert_messages" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-check2-circle" viewBox="0 0 16 16">
                        <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                        <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                    </svg>
                    &nbsp; {{ session()->get('success') }}
                </div>
                @endif

                @if (session()->has('userLogin_error'))
                <div class="alert alert-danger show flex items-center mb-2 alert_messages" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-alert-octagon w-6 h-6 mr-2">
                    <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                    &nbsp; {{ session()->get('userLogin_error') }}
                </div>
                @endif
                <div class="formStart">
                  <!-- <div class="logoImage text-center">
                    <a class="navbar-brand" href="#">
                      <img src="img/NFL-small.png" alt="" class="img-fluid"> </a>
                  </div> -->
                  <h2>Log in</h2>
                  <div class="inputsForm">
                    <form method="post" action="{{route('login')}}">
                        @csrf
                         <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="johndoe@gmail.com">
                          </div>
                          <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" id="password" name="password" placeholder="**********">
                          </div>
                      <div class="checkButton text-center">
                      <button type="submit" name="submit" class="btn btn-primary">Log In</button>

                        <!-- <a href="{{route('register')}}">
                          SIGN UP
                        </a> -->
                      </div>
                    </form>
                    <!-- <div class="forgotPassword">
                      <a href="{{ route('forget_password') }}">Forgot Password</a>
                  </div> -->
<div class="sinupForgot text-center">
<div class="loginForForgot">
  <a href="{{ route('forget_password') }}"> Forgot Password</a><br>
  <span class="fontDiff">Don't have an account?<span> <a class="signupLink" href="{{route('register')}}">Sign up </a>
</div>
</div>

                  </div>
                </div>
        </div>
      </div>
    </div>
  </section>
@endsection
