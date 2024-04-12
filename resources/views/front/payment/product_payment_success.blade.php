@extends('front.layout.app')
@section('content')
    <section id="successForm">
        <div class="container ">
            <div class="row">

                <div class="col-sm-6 mx-auto border">

                    <div class="successPage">
                        <h2>Thank you for your order!</h2>
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <div class="d-flex justify-content-around p-3">
                        <div>
                            {{-- {{dd($jersey_Payment)}} --}}
                            <p>Transaction ID</p>
                            <p>Reference ID</p>
                            <p>Name</p>
                            <p>Email</p>
                            <p>Subtotal </p>
                            <p>Tax </p>
                            <p>Total Amount</p>
                            <p>Payment Method </p>
                            <p>Date</p>
                        </div>
                        <div>
                            @if (isset($product_Payment))
                                <p>{{ $product_Payment->transaction_id }}</p>
                                <p>{{ $product_Payment->ref_num }}</p>
                                <p>{{ $product_Payment->name }}</p>
                                <p>{{ $product_Payment->email }}</p>
                                <p>{{ $product_Payment->amount }} {{ env('AMOUNT_CURRENCY') }}</p>
                                <p>{{ config('app.tax_amount')}}</p>
                                <p>{{ $product_Payment->payment_method }}</p>
                                <p>{{ \Carbon\Carbon::parse($product_Payment->created_at)->format('j F, Y ,H:i') }}

                                </p>
                            @endif


                            {{-- for shop  --}}

                            {{-- {{ dd(session()->get('buynow_payment_success_session')) }} --}}
                            @if (session()->has('buynow_payment_success_session'))
                                @if (!empty(session()->get('buynow_payment_success_session')))
                                    @php
                                        $get_buynow_payment_success_session = session()->get(
                                            'buynow_payment_success_session',
                                        );
                                    @endphp

                                    <p>{{ $get_buynow_payment_success_session['transaction_id'] }}</p>
                                    <p>{{ $get_buynow_payment_success_session['ref_num'] }}</p>
                                    <p>{{ $get_buynow_payment_success_session['name'] }}</p>
                                    <p>{{ $get_buynow_payment_success_session['email'] }}</p>
                                    <p>${{ $get_buynow_payment_success_session['subtotal_amount'] }}
                                        {{ env('AMOUNT_CURRENCY') }}</p>
                                    <p>{{ config('app.tax_amount')}}</p>
                                    <p>
                                        ${{ $get_buynow_payment_success_session['amount'] }}</p>
                                    <p>{{ $get_buynow_payment_success_session['payment_method'] }}</p>
                                    <p>{{ \Carbon\Carbon::parse($get_buynow_payment_success_session['created_at'])->format('j F, Y ,H:i') }}

                                    </p>
                                    {{ Session::forget('buynow_payment_success_session') }}
                                @endif
                            @elseif(session()->has('shop_cart_payment_success_session'))
                                @if (!empty(session()->get('shop_cart_payment_success_session')))
                                    @php
                                        $get_shop_cart_payment_success_session = session()->get(
                                            'shop_cart_payment_success_session',
                                        );
                                    @endphp

                                    <p>{{ $get_shop_cart_payment_success_session['transaction_id'] }}</p>
                                    <p>{{ $get_shop_cart_payment_success_session['ref_num'] }}</p>
                                    <p>{{ $get_shop_cart_payment_success_session['name'] }}</p>
                                    <p>{{ $get_shop_cart_payment_success_session['email'] }}</p>
                                    <p>${{ $get_shop_cart_payment_success_session['subtotal_amount'] }}
                                        {{ env('AMOUNT_CURRENCY') }}</p>
                                        <p>{{ config('app.tax_amount')}}</p>
                                        <p>${{ $get_shop_cart_payment_success_session['amount'] }}</p>
                                    <p>{{ $get_shop_cart_payment_success_session['payment_method'] }}</p>
                                    <p>{{ \Carbon\Carbon::parse($get_shop_cart_payment_success_session['created_at'])->format('j F, Y ,H:i') }}

                                    </p>
                                    {{ Session::forget('shop_cart_payment_success_session') }}
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-center">Your order has been successfully placed. Please check your email for details regarding your order.</p>
                        <a
                            @if (Auth::user()->age <= config('app.jersey_kid_age_limit')) href="{{ route('pony-express-flag-football-shop') }}"
                            @else onclick="javascript:history.go(-2)" @endif>
                            <button class="btn btn-primary my-3">Continue</button>
                        </a>

                    </div>

                </div>
            </div>
    </section>
@endsection
@section('script')
    {{-- <script>
      window.onbeforeunload = function(e) {
        var base_url = window.location.origin;
//   location.href = '{{ route("greek-store-cart") }}';
  window.location.replace('http://127.0.0.1:8000/greek-store-cart');
};
    </script> --}}
@endsection
