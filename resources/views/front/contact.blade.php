@extends('front.layout.app')

@section('content')

    <style>

        .input-error {

            color: #ff5555;

        }



        .input-success {

            color: green;

        }



        .error {

            color: #ff5555;

        }

    </style>

    <section id="contactPart">

        <div class="container">

            <div class="row align-items-center justify-content-center">

                <div class="col-12">

                    {{-- {{dd($contact_details)}} --}}

                    <h2>{{ $contact_details['contact_section_heading'] }}</h2>

                </div>

            </div>

            <div class="contactDetail">

                <div class="row">

                    <div class="col-sm-12 col-md-12 col-lg-8">

                        {{-- <h5>{{ $get_contact_details->sub_heading }}</h5> --}}

                        <p>{!! $contact_details['contact_page_content'] !!}</p>

                        <div class="imagesBoth">

                            <div class="row mt-3">

                                <div class="col-sm-6">

                                    @if (!empty($contact_details['contact_page_image']))

                                        <img src="{{ asset('storage/images/static_page/' . $contact_details['contact_page_image']) }}"

                                            alt="" class="img-fluid">

                                    @else

                                        <img src="front/img/contacts-1.jpg" alt="" class="img-fluid">

                                    @endif



                                    <div class="socialIcon d-flex mb-3">

                                        <h5> {{ $contact_details['contact_social_links_heading'] }}:</h5>

                                        {{-- <i class="fa-brands fa-facebook-f"></i>

                                        <i class="fa-brands fa-instagram"></i>

                                        <i class="fa-brands fa-youtube"></i>

                                        <i class="fa-brands fa-twitter"></i> --}}



                                        @if (!empty($social_links))

                                            @if ($social_links['Facebook'] != '')

                                                <a href="{{ $social_links['Facebook'] }}"> <i

                                                        class="fa-brands fa-facebook-f"></i></a>

                                            @endif



                                            @if ($social_links['Twitter'] != '')

                                                <a href="{{ $social_links['Twitter'] }}"> <i

                                                        class="fa-brands fa-twitter"></i></a>

                                            @endif

                                            @if ($social_links['Instagram'] != '')

                                                <a href="{{ $social_links['Instagram'] }}"> <i

                                                        class="fa-brands fa-square-instagram"></i></a>

                                            @endif





                                            @if ($social_links['Google'] != '')

                                                <a href="{{ $social_links['Google'] }}"> <i

                                                        class="fa-brands fa-google-plus-g"></i></a>

                                            @endif





                                            @if ($social_links['Linkedin'] != '')

                                                <a href="{{ $social_links['Linkedin'] }}"> <i

                                                        class="fa-brands fa-linkedin"></i></a>

                                            @endif





                                            @if ($social_links['Youtube'] != '')

                                                <a href="{{ $social_links['Youtube'] }}"> <i

                                                        class="fa-brands fa-youtube"></i></a>

                                            @endif

                                            @if ($social_links['Pinterest'] != '')

                                                <a href="{{ $social_links['Pinterest'] }}"> <i

                                                        class="fa-brands fa-pinterest"></i></a>

                                            @endif

                                        @endif



                                    </div>

                                </div>

                                <div class="col-sm-6 mb-3">

                                    <h4>{{ $contact_details['contact_location_heading'] }}</h4>

                                    <div class="contactUs d-flex">

                                        <div class="iconitem">

                                            <i class="fa-solid fa-location-dot"></i>

                                        </div>

                                        <div class="inputText">

                                            {{-- <span>USA, California 20, First Avenue, California</span> --}}

                                            <span>{{ $general->footer_address ?? '' }}</span>

                                        </div>

                                    </div>



                                    <div class="contactUs d-flex">

                                        <div class="iconitem">

                                            <i class="fa-solid fa-mobile"></i>

                                        </div>

                                        <div class="inputText">

                                            {{-- <span>+7 888 71 140 30 20</span> --}}

                                            <span>{{ $general->footer_contact ?? '' }}</span>

                                        </div>

                                    </div>



                                    <div class="contactUs d-flex">

                                        <div class="iconitem">

                                            <i class="fa-solid fa-fax"></i>

                                        </div>

                                        <div class="inputText">

                                            {{-- <span>+7 888 71 140 30 20</span> --}}

                                            <span>{{ $general->footer_contact2 ?? '' }}</span>



                                        </div>

                                    </div>

                                    <div class="contactUs d-flex">

                                        <div class="iconitem">

                                            <i class="fa-solid fa-envelope"></i>

                                        </div>

                                        <div class="inputText">

                                            {{-- <span>info@stylemixthemes.com</span> --}}

                                            <span>{{ $general->email ?? '' }}</span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-8 col-md-6 col-lg-4">





                        @if (Session::has('success'))

                            <div class="alert alert-success show flex items-center mb-2 " role="alert">

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

                        @if (Session::has('error'))

                            <span class="input-error">{{ session()->get('error', 'Something went wrong') }}</span>

                        @endif

                        <div class="contactForm">

                            <h4>{{ $contact_details['contact_form_heading'] }}</h4>



                            <form id="contactForm" method="post">

                                @csrf

                                <div class="mb-3">

                                    <input type="text" class="form-control" value="{{ old('subject') }}" id="subject"

                                        name="subject" placeholder="Subject">

                                    @error('subject')

                                        <div class="input-error">{{ $message }}</div>

                                    @enderror

                                </div>



                                <div class="mb-3">

                                    <input type="text" class="form-control" id="name" name="name"

                                        placeholder="Name" value="{{ old('name') }}">

                                    @error('name')

                                        <div class="input-error">{{ $message }}</div>

                                    @enderror

                                </div>

                                <div class="mb-3">

                                    <input type="email" class="form-control" name="email" id="email"

                                        aria-describedby="emailHelp" placeholder="E-mail" value="{{ old('email') }}">

                                    @error('email')

                                        <div class="input-error">{{ $message }}</div>

                                    @enderror

                                </div>

                                <div class="mb-3">

                                    <textarea id="message" class="form-control" name="message" rows="4" cols="50" placeholder="Message"> {{ old('message') }}</textarea>

                                    @error('message')

                                        <div class="input-error">{{ $message }}</div>

                                    @enderror

                                </div>

                                <input type="hidden" name="g-capcha" id="g-capcha">

                                @error('g-capcha')

                                    <div class="input-error">Invalid capcha</div>

                                @enderror

                                <button type="submit" class="btn btn-primary">Submit</button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    {{-- <script src="https://www.google.com/recaptcha/api.js?render={{env('CAPCHA_SITE_KEY')}}"></script> --}}

    {{-- <script>

        var key = "6LdADdolAAAAAHIeEIKLbXaIWBmtyedK516d0tYo";

        // var key = "{{env('CAPCHA_SITE_KEY')}}";

           grecaptcha.ready(function() {

      grecaptcha.execute(key,

      {

        action: '{{route('contact_us')}}'

        }

        ).then(function(token) {

            if(token){

                document.getElementById('g-capcha').value = token;

            }else{

                document.getElementById('g-capcha').after('<span class="error">Invalid capcha</span>');

            }

      });

  });

        $('form[id="contactForm"]').validate({

            rules: {

                subject: 'required',

                name: 'required',

                email: {

                    required: true,

                    email: true,

                },

            },

            messages: {

                subject: 'This field is required',

                name: 'This field is required',

                email: 'Enter a valid email',

            },

            submitHandler: function(form) {

                form.submit();

            }

        });

    </script> --}}



    <script src="https://www.google.com/recaptcha/api.js?render={{ env('CAPCHA_SITE_KEY') }}"></script>

    <script>

        grecaptcha.ready(function() {

            grecaptcha.execute('{{ env('CAPCHA_SITE_KEY') }}', {

                action: 'contact'

            }).then(function(token) {

                if (token) {

                    document.getElementById('g-capcha').value = token;

                }

            });

        });

    </script>



@endsection

