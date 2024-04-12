@extends('front.layout.app')
@section('content')
    <style>
        .couponFormSubmit input.form-control {
            margin-bottom: 15px;
            height: 42px;
            text-align: center;
        }

        .couponFormSubmit button.btn {
            max-width: 200px;
            color: #fff;
            width: 100%;
        }

        .couponFormSubmit .form-group {
            justify-content: center;
        }

        .full-section {
            padding: 70px 0;
        }

        .couponFormSubmit form {
            text-align: center;
        }

        .couponFormSubmit {
            background-color: #090B3E;
            background-image: linear-gradient(to bottom right, #090B3E, #6B53F1);
            padding: 0 50px;
            border-radius: 10px;
            color: #fff;
            position: relative;
        }

        .couponFormSubmitIntro {
            padding: 60px 30px;
            border-width: 0 2px 0 2px;
            border-style: dashed;
            border-color: #ffffff87;
        }

        .couponFormSubmit:after,
        .couponFormSubmit:before {
            content: "";
            width: 25px;
            height: 50px;
            background-color: #fff;
            position: absolute;
            border-radius: 0 50px 50px 0;
            top: 50%;
            transform: translateY(-50%);
        }

        .couponFormSubmit:after {
            left: 0;
            border-radius: 0 50px 50px 0;
        }

        .couponFormSubmit:before {
            right: 0;
            border-radius: 50px 0 0 50px;
        }

        #couponForm {
            position: relative;
        }

        #couponForm:before {
            content: "";
            background-image: url(https://nfl.kloudexpert.com/storage/images/banners/banner_1689838195.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            opacity: 0.1;
        }
    </style>

    <section id="couponForm" class="full-section">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-sm-12 col-lg-8 col-md-12">
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        </symbol>

                      </svg>
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                        <div>
                        <span>Enter the coupon code you get on your email after buy jersey</span>
                        </div>
                      </div>

                    <div class="couponFormSubmit">


                        <div class="couponFormSubmitIntro">
                            <div class="textHeader text-center">
                                <h2 class="mb-4">Enter coupon code </h2>
                                {{-- <h2>Payment Information</h2> --}}
                            </div>
                            <div class="text-center">

                               @error('coupon_code')


                               <div class="alert alert-danger show flex items-center mb-2" role="alert">
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
                                {{ $message}}
                            </div>
                                    @enderror

                                @if (session()->has('success'))
                                    <div class="alert alert-success show flex items-center mb-2 alert_messages"
                                        role="alert">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                                            <path
                                                d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                                        </svg>
                                        &nbsp; {{ session()->get('success') }}
                                    </div>
                                @endif


                                @if (session('message_error'))
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
                                        {{ session('message_error') }}
                                    </div>
                                @endif
                            </div>

                            {{-- <div class="textItem">

                                    <div class="form-row top-row ">
                                        <div id="" class="field">
                                            <img src="{{ asset('front/img/clover_device_img.png') }}" alt=""
                                                height="200px " width="200px">

                                        </div>

                                    </div>

                                </div> --}}
                            {{-- <div class="">
                                        <label for="coupon_code" class="form-label">Have a coupon ? <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="coupon_code" name="coupon_code"
                                            placeholder="Enter coupon code ">
                                    </div> --}}
                            {{-- form for submit coupon --}}
                            <form action="{{ route('coupon') }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="season_id" value="{{ $season->id }}">
                                <div class="">
                                    {{-- <label for="coupon_code" class="form-label mb-3">Have a coupon ?</label> --}}
                                    <div class="form-group">

                                        <input type="text" class="form-control" placeholder="Enter coupon code"
                                            name="coupon_code">
                                        <button class="btn btn-outline-secondary" type="submit">Apply</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
{{-- @section('script')
<script>
    let URL = "{{ URL::previous() }}";
    setTimeout(function(){window.location=URL }, 4000);
    </script>
@endsection --}}
