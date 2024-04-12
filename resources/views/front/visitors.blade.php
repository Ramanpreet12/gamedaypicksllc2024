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
      .button-link .next_btn { background: #aa0245; color: #fff; font-family: 'Bebas Neue'; border-radius: 0; border: 4px solid #cf0052; padding: 4px 20px; font-size: 24px; }
      .button-link .next_btn:hover{background: #cf0052;}
   </style>
      <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-KFQ62F0F5W"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
         gtag('config', 'G-KFQ62F0F5W');
         </script>
   </head>
   <body>
      <section id="campaign-section" class="full-section getInTheGameSection" style="background-image:url({{ asset('landing_pages/assets/images/bgimg-002.jpg')}})">
         <div class="container position-relative">


            <div class="row align-items-center  justify-content-center">
               <div class="col-md-11">
                  <div class="campaignBlock getInTheGameBlock">
                     <div class="campaignBlockimg"><img src="{{ asset('landing_pages/assets/images/GETINTHEGAME_AFL02.png') }}" class="img-fluid" alt=""></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container position-relative">
            <div class="campaignBlock">
				 <div class="voteBlockimg">
					<div class="campaignBlockcontent mt-3">
					   <h4 class="HeadingText">Total Visitor</h4>
					   <div class="campaignBlockWrap">
						  <div class="google-row">
							 <div class="countdownBlock mt-0" id="gVoteNum">{{ $get_visitor_count ? $get_visitor_count : 0 }}</div>
						  </div>
					   </div>
					</div>
				 </div>
				 <div class="button-link text-center mt-2">
             @if(!empty($get_ip_address))
               <a href="{{route('home')}}" class="btn btn-outline-primary">Next</a>
               @else


               <form action="{{ route('store/visitors') }}" method="post">
                  {{-- <a href="" class="btn btn-outline-primary">Next</a> --}}
                  @csrf
                  <button class="btn btn-outline-primary next_btn" type="submit">Next</button>

               </form>

               @endif
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
					         <a href="{{ $social_links['Facebook'] }}" target="_blank" class="fa fa-facebook"></a>
                        @endif
                        @if ($social_links['Twitter'] != '')
                        <a href="{{ $social_links['Twitter'] }}" target="_blank" class="fa fa-twitter"></a>
                        @endif
                        @if ($social_links['Instagram'] != '')
						      <a href="{{ $social_links['Instagram'] }}" target="_blank" class="fa fa-instagram"></a>
                        @endif
                        @if ($social_links['Linkedin'] != '')
                        <a href="{{ $social_links['Linkedin'] }}" target="_blank" class="fa fa-linkedin"></a>
                        @endif
                        @if ($social_links['Youtube'] != '')
                        <a href="{{ $social_links['Youtube'] }}" target="_blank" class="fa fa-youtube-play"></a>
                        @endif
                        @if ($social_links['Pinterest'] != '')
                        <a href="{{ $social_links['Pinterest'] }}" target="_blank" class="fa fa-pinterest"></a>

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
                  <div class="col">{{ $general->footer_bar  ? $general->footer_bar : 'GAMEDAY PICKS, LLC © 2023. All Rights Reserved' }}</div>
               </div>
            </div>
         </div>
      </footer>




	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



<script id='pixel-script-poptin' src='https://cdn.popt.in/pixel.js?id=50df6b4a857a8' async='true'></script>
   </body>
</html>
