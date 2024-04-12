
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Laralink">
  <!-- Site Title -->
  <title>{{ $general->name ? $general->name : 'NFL' }} | Payment Invoice</title>
  <link rel="stylesheet" href="{{asset('front/css/invoice.css')}}">
</head>

<body>
  <div class="tm_container">

    <div class="tm_invoice_wrap">
      <div class="tm_invoice tm_style1" id="tm_download_section">
        <div class="tm_coffee_shop_img">
          <img src="assets/img/coffy_shop_img.svg" alt="">
        </div>
        <div class="tm_invoice_in">
          <div class="tm_invoice_head tm_align_center">
            <div class="tm_invoice_left">
              <div class="tm_logo"><img src="https://nfl.kloudexpert.com/storage/images/general/logo1680763239.png" alt="Logo"></div>
            </div>
            <div class="tm_invoice_right tm_text_right">
              <div class="tm_primary_color tm_f50 tm_text_uppercase">Invoice</div>
            </div>
          </div>
          <div class="tm_invoice_info tm_mb20">
            <div class="tm_invoice_seperator"></div>
            <div class="tm_invoice_info_list">
              <p class="tm_invoice_number tm_m0">Invoice No: <b class="tm_primary_color">#{{$order->id}}</b></p>
              <p class="tm_invoice_date tm_m0">Date: <b class="tm_primary_color">{{ date('jS F Y', strtotime($order->created_at))}}</b></p>
            </div>
          </div>
          <div class="tm_invoice_head tm_mb10">
            <div class="tm_invoice_left">
              <p class="tm_mb2"><b class="tm_primary_color">Invoice To:</b></p>
              <p>
                {{$order->name}}<br>
                {{$order->address}}, {{$order->city}} <br>{{$order->country}} <br>
                {{$order->zip}}
              </p>
            </div>
            <div class="tm_invoice_right tm_text_right">
              <p class="tm_mb2"><b class="tm_primary_color">Pay To:</b></p>
              <p>
              GAMEDAY PICKS, LLC
              </p>
            </div>
          </div>
          <div class="tm_table tm_style1 tm_mb30 tm_m0_md">
            <div class="tm_radius_0">
              <div class="tm_table_responsive">
                <table class="tm_border_bottom tm_border_top">
                    <tr>
                      <td class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg">Season</td>
                      <td class="tm_width_2">{{$order->season_name}}</td>
                    </tr>
                    <tr class="tm_table_baseline">
                      <td class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg">Transaction ID</td>
                      <td class="tm_width_2">{{$order->transaction_id}}</td>
                    </tr>
                    <tr class="tm_table_baseline">
                      <td class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg">Payment Method</td>
                      <td class="tm_width_2">{{$order->payment_method}}</td>
                    </tr>
                    <tr class="tm_table_baseline">
                      <td class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg">Payment Date</td>
                      <td class="tm_width_2">{{ \Carbon\Carbon::parse($order->created_at)}}</td>
                    </tr>
                    <tr class="tm_table_baseline">
                      <td class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg">Payment Status</td>
                      <td class="tm_width_2">{{$order->status}}</td>
                    </tr>
                    <tr class="tm_table_baseline">
                      <td class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg">Amount</td>
                      <td class="tm_width_2">{{$order->amount}}{{$order->currency}}</td>
                    </tr>
                </table>
              </div>
            </div>
            <div class="tm_invoice_footer">
              <div class="tm_left_footer tm_padd_left_15_md">
              </div>
              <div class="tm_right_footer">
                <table>
                  <tbody>
                    <tr class="tm_gray_bg tm_border_top">
                      <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Subtoal</td>
                      <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold">{{$order->amount}}{{$order->currency}}</td>
                    </tr>
                    <tr class="tm_border_top tm_border_bottom tm_gray_bg">
                      <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color">Grand Total	</td>
                      <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color tm_text_right">{{$order->amount}}{{$order->currency}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <hr class="tm_mb20">
          <div class="tm_text_center">
            <p class="tm_mb5"><b class="tm_primary_color">Terms & Conditions:</b></p>
            <p class="tm_m0">Your use of the Website shall be deemed to constitute your understanding and approval of, and agreement <br class="tm_hide_print">to be bound by, the Privacy Policy and you consent to the collection.</p>
          </div><!-- .tm_note -->
        </div>
      </div>
      <div class="tm_invoice_btns tm_hide_print">
        <a href="javascript:window.print()" class="tm_invoice_btn tm_color1">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><circle cx="392" cy="184" r="24" fill='currentColor'/></svg>
          </span>
          <span class="tm_btn_text">Print</span>
        </a>
        <button id="tm_download_btn" class="tm_invoice_btn tm_color2">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
          </span>
          <span class="tm_btn_text">Download</span>
        </button>
      </div>
    </div>
  </div>
  <script src="{{asset('front/js/jquery.min.js')}}"></script>
  <script src="{{asset('front/js/jspdf.min.js')}}"></script>
  <script src="{{asset('front/js/html2canvas.min.js')}}"></script>
  <script src="{{asset('front/js/main.js')}}"></script>
</body>
</html>
