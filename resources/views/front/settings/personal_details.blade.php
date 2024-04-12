@extends('front.layout.user_layout.user_app')
@section('content')

    <section id="personalInfoBoard"
        style="background-image:url({{ asset('front/img/football-2-bg.jpg') }});color:{{ $colorSection['leaderboard']['text_color'] }};">
        <div class="container-fluid text-center">
            <div class="row">

                <div class="col-sm-12">
                    <div class="personalleaderBoard">
                        <br>
                        <div class="loader d-none">
                            <img height="100px" width="100px" src="{{ asset('front/img/orange_circles.gif') }}"
                                alt="loader">
                        </div>
                    </div>
                </div>
                @include('front.layout.user_layout.user_sidebar')
                <div class=" col-sm-8 col-md-9">
                    <div class="personal_details_div px-4">
                    @if (session()->has('success'))
        <div class="alert alert-success show flex items-center mb-2" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2-circle"
                viewBox="0 0 16 16">
                <path
                    d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                <path
                    d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
            </svg>
            &nbsp; {{ session()->get('success') }}
        </div>
    @endif
                    {{-- <h2 style="color:{{ $colorSection['leaderboard']['header_color'] }};">
                        Personal Details
                    </h2> --}}
                    <div class="row">
                        <div class="ml-3 col-md-12">
                            <div class="text-center">
                                <div class="flex" id="">
                                    <h2 class="my-4">Personal Details</h2>

                                    {{-- <div class="row"> --}}
                                    <form id="personal_detailsForm" action="{{ route('settings') }}" method="POST" enctype="multipart/form-data" >
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-sm-8 col-md-6 mb-3 text-start">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="John" value="{{Auth::user()->name}}">
                                                @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                </div>

                                                <div class="mb-3">
                                                <label for="dob" class="form-label">Date of Birth</label>
                                                <input type="date" class="form-control" id="dob" name="dob"
                                                    value="{{Auth::user()->dob}}">
                                                @error('dob')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                </div>

                                                <div class="mb-3 countryTelCode">
                                                    <label for="phone" class="form-label">Mobile No.</label>
                                                <input type="tel" class="form-control" id="phone" name="phone"
                                                    placeholder="0123456789" value="{{Auth::user()->phone_number}}">
                                                @error('phone')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                <p class="text-danger hide" id="valid-msg"></p>
                                                <p class="text-danger hide" id="error-msg"></p>
                                            </div>

                                                <div class="mb-3">
                                                <label for="photo" class="form-label">Upload photo</label>
                                                <input type="file" class="form-control" name="photo"
                                                    id="photo">
                                                @error('photo')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            </div>

                                            <div class="col-sm-4 col-md-6 mb-3">

                                                <div class="personal-Img">
                                                    @if (Auth::user()->photo)
                                                    <img src="{{asset('storage/images/user_images/'.Auth::user()->photo)}}"  alt="" class="img-fluid borderImg border">

                                                    @else
                                                    <img src="{{asset('dist/images/dummy_image.webp')}}"  alt="" class="img-fluid border borderImg">

                                                    @endif
                                                </div>

                                            </div>

                                        </div>
                                        <div class="personalInfoButton">
                                            <div class="row g-5 justify-content-center">
                                                <div class="col-auto">
                                          <button type="submit" name="submit" class="btn btn-primary  ">Update</button>
                                          </div>
                                          <div class="col-auto">
                                          <button type="reset"  class="btn btn-default">reset</button>
                                          </div>
                                          </div>
                                         </div>
                                    </form>
                                {{-- </div> --}}
                                {{-- <div class="row">
                                    <h2>kdflkkg</h2>
                                </div> --}}


                                </div>
                            </div>
                        </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        var input = document.querySelector("#phone");
        errorMsg = document.querySelector("#error-msg"),
            validMsg = document.querySelector("#valid-msg");
        var errorMap = ["personal details Invalid number", "Invalid country code", "Phone number is Too short", "Phone number is Too long", "Invalid number"];
        var intl = window.intlTelInput(input, {
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.1.6/js/utils.js"
        });
        var reset = function() {
            input.classList.remove("error");
            errorMsg.innerHTML = "";
            errorMsg.classList.add("hide");
            validMsg.classList.add("hide");
        };
        input.addEventListener('blur', function() {
            reset();
            if (input.value.trim()) {

                if (intl.isValidNumber()) {
                    validMsg.classList.remove("hide");

                } else {
                    input.classList.add("error");
                    var errorCode = intl.getValidationError();
                    errorMsg.innerHTML = errorMap[errorCode];
                    errorMsg.classList.remove("hide");

                }
            }
        });
        input.addEventListener('change', reset);
        input.addEventListener('keyup', reset);

    </script>
@endsection
