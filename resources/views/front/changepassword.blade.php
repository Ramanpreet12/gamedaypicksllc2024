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




                    <div class="formStart">
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            </symbol>

                          </svg>
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                            <div>
                            <span>Enter the token you get in your email </span>
                            </div>
                          </div>

                          @if (session()->has('success'))
                          <div class="alert alert-success show flex items-center mb-2 alert_messages" role="alert">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                  class="bi bi-check2-circle" viewBox="0 0 16 16">
                                  <path
                                      d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                                  <path
                                      d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                              </svg>
                              &nbsp; {{ session()->get('success') }}
                          </div>
                      @endif
                      @if (session()->has('error'))
                          <div class="alert alert-danger show flex items-center mb-2 alert_messages" role="alert">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"
                              class="feather feather-alert-octagon w-6 h-6 mr-2">
                              <polygon
                                  points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                              </polygon>
                              <line x1="12" y1="8" x2="12" y2="12"></line>
                              <line x1="12" y1="16" x2="12.01" y2="16"></line>
                          </svg>
                              &nbsp; {{ session()->get('error') }}
                          </div>
                      @endif
                        <div class="logoImage text-center">
                            <a class="navbar-brand" href="#">
                                <img src="img/NFL-small.png" alt="" class="img-fluid"> </a>
                        </div>
                        <h2>Change Password</h2>
                        <div class="inputsForm">
                            <form method="post" action="{{ route('change_password') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Enter Token</label>
                                    <input type="text" class="form-control" id="email" name="token"
                                         placeholder="Enter Token" value="{{old('token')}}">
                                </div>
                                @error('token')
                                <span style="color:red">{{ $message }}</span>
                                @enderror
                                <div class="mb-3">
                                    <label for="email" class="form-label">Enter New Password</label>
                                    <input type="password" class="form-control" id="email" name="password"
                                        placeholder="password">
                                </div>
                                @error('password')
                                <span style="color:red">{{ $message }}</span>
                                @enderror
                                <div class="mb-3">
                                    <label for="email" class="form-label">Enter Confirm Password</label>
                                    <input type="password" class="form-control" id="email" name="confirm"
                                         placeholder="Re-enter password">
                                </div>
                                @error('confirm')
                                <span style="color:red">{{ $message }}</span>
                                @enderror

                                <div class="checkButton d-flex">
                                    <a class="btn btn-secondary me-5" href="{{route('login')}}">
                                        Cancel
                                      </a>
                                    <button type="submit" name="submit" class="btn btn-primary">Continue</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
