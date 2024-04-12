<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $general->name ? $general->name : 'NFL' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('landing_pages/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_pages/assets/css/style.css') }}" rel="stylesheet">
    <style>
        .button-link .next_btn {
            /* background: #aa0245; */
            background: #fff;
            border: 4px solid #dad9d9;

            color: #303030;
            font-family: 'Bebas Neue';
            border-radius: 0;
            /* border: 4px solid #cf0052; */
            padding: 4px 20px;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .button-link .next_btn:hover {
            background: #cf0052;
        }
        .craftsmenWantedAd .container {
            max-width: 1300px;
        }

        .craftsmenWantedAd {
            text-align: center;
            background-color: #000;
            padding-bottom: 50px;
        }

        h4.HeadingText {
            color: #fff;
        }

        .countdownBlock {
            background-color: #111;
            border: 4px solid #fff;
        }



        .button-link .next_btn:hover {
            background: #a0a0a0;
        }

        .img-box {
    overflow-x: scroll;
    scrollbar-color: #ffffff47 #0000001c;
    display: grid;
}
.craftsmenWantedAd img {
    max-width: inherit;
}
    </style>
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
</head>

<body>

    <section class="craftsmenWantedAd">
        <div class="img-box">
           <img src="{{ asset('landing_pages/assets/images/afterSchoolPsd3500.jpg') }}" alt="">
           {{-- <img src="{{ asset('landing_pages/assets/images/afterSchool3500.jpg') }}" alt=""> --}}
           {{-- <img src="{{ asset('landing_pages/assets/images/afterSchoolSports.jpg') }}" alt=""> --}}

            <div class="campaignBlock">
                {{-- <div class="voteBlockimg">
             <div class="campaignBlockcontent mt-3">
                 <h4 class="HeadingText" >Total Visitor</h4>
                 <div class="campaignBlockWrap">
                     <div class="google-row">
                         <div class="countdownBlock mt-0" id="gVoteNum">

                         </div>
                     </div>
                 </div>
             </div>
         </div> --}}
                <div class="button-link text-center mt-4">

                        <a href="{{ route('pony-express-flag-football') }}">
                        <button class="btn btn-outline-primary next_btn" type="submit">Go To Pony Express Flag Football</button>
                     </a>

                </div>
            </div>

        </div>
    </section>




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
                    {{-- {{ dd($general) }} --}}
                    <div class="col">
                        {{ $general->footer_bar ? $general->footer_bar : 'GAMEDAY PICKS, LLC © 2023. All Rights Reserved' }}
                    </div>
                </div>
            </div>
        </div>
    </footer>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</body>

</html>
