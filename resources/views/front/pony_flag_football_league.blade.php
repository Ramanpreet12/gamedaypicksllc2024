<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $general->name ? $general->name : 'NFL' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('landing_pages/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_pages/assets/css/style.css') }}" rel="stylesheet">

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
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .bg {
            /* The image used */
            background-image: url('');
            /* Center and scale the image nicely */
            background-color: #000;
            padding-bottom: 20px;
            text-align: center;
        }

        .page_heading {
            background-color: #000;
            font-family: 'Bebas Neue';
            font-size: 30px;
            color: #fff;
        }

        .bannerImg {
            height: calc(100vh - 52px);
            object-fit: contain;
            max-width: 100%;
        }

        .go_signup_button_link {
            margin-top: 80px;
            text-align: center;
        }


        .go_signup_button_link a.btn {
            background: transparent;
            color: #39EAED;
            font-family: 'Bebas Neue';
            border-radius: 0;
            border: 1px solid #39EAED;
            padding: 4px 20px;
            font-size: 24px;
            margin-top: -50px;
            /* transition: all 1s; */
        }

        .go_signup_button_link a.btn:hover {
            background: #39EAED;
            color: black;
            /* transition: all 1s; */
        }
    </style>
</head>

<body>

    <div class="text-center py-5 page_heading">

        @if (!empty($pony_page_details['pony_page_heading']))
            {{ $pony_page_details['pony_page_heading'] }}
        @else
            {{ '' }}
        @endif
    </div>
    <div class="bg">

        @if (!empty($pony_page_details))
            <img src="{{ asset('storage/images/general/' . $pony_page_details['pony_page_image']) }}" class="bannerImg"
                alt="">
        @else
            <img src="{{ asset('front/img/pony-league.gif') }}" class="bannerImg" alt="">
        @endif

        {{-- @if ($get_zipcodes->isNotEmpty()) --}}

        <div style="color:#fff; padding:10px 0; font-size:17px;">
            <marquee behavior="scroll" scrollamount="6" direction="left" width="100%" style="padding-top:8px">

                @if (!empty($pony_page_details))
                    {{ $pony_page_details['pony_page_zipcode_heading'] }}
                @else
                    Recent Sign-up Zip Codes :
                @endif

                @if ($get_zipcodes->isNotEmpty())
                    @php
                        $myArray = [];
                        foreach ($get_zipcodes as $zipcodes) {
                            $myArray[] = $zipcodes->zipcode;
                        }

                        echo implode(', ', $myArray);
                    @endphp
                @endif


                {{-- Get the Coupon after &nbsp; <a href="{{ route('pre-sign-up') }}" > Buy jersey </a> &nbsp; of $150 to select the team --}}
            </marquee>
        </div>


        {{-- @endif --}}

        <div class="go_signup_button_link">

            <a href="{{ route('pre-sign-up') }}" class="btn btn-outline-primary">

                @if (!empty($pony_page_details))
                    {{ $pony_page_details['pony_page_button_text'] }}
                @else
                    Go Sign Up
                @endif
            </a>
        </div>
    </div>
    <footer>
        <div id="socialMedia">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div id="social_media_sharing_buttons">
                            @if (!empty($social_links))
                                @if ($social_links['Facebook'] != '')
                                    <a href="{{ $social_links['Facebook'] }}" target="_blank"
                                        class="fa fa-facebook"></a>
                                @endif
                                @if ($social_links['Twitter'] != '')
                                    <a href="{{ $social_links['Twitter'] }}" target="_blank" class="fa fa-twitter"></a>
                                @endif
                                @if ($social_links['Instagram'] != '')
                                    <a href="{{ $social_links['Instagram'] }}" target="_blank"
                                        class="fa fa-instagram"></a>
                                @endif
                                @if ($social_links['Linkedin'] != '')
                                    <a href="{{ $social_links['Linkedin'] }}" target="_blank"
                                        class="fa fa-linkedin"></a>
                                @endif
                                @if ($social_links['Youtube'] != '')
                                    <a href="{{ $social_links['Youtube'] }}" target="_blank"
                                        class="fa fa-youtube-play"></a>
                                @endif
                                @if ($social_links['Pinterest'] != '')
                                    <a href="{{ $social_links['Pinterest'] }}" target="_blank"
                                        class="fa fa-pinterest"></a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col">© Copyright 2023 <a href="{{ route('home') }}">gamedaypicksllc.com</a>. All
                        Rights Reserved</div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script id='pixel-script-poptin' src='https://cdn.popt.in/pixel.js?id=50df6b4a857a8' async='true'></script>
</body>

</html>
