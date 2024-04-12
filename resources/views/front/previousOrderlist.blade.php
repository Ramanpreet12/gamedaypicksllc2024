@extends('front.layout.user_layout.user_app')
@section('content')
    <!-- Custom CSS -->
    <style>
        .container-fluid {
            padding: 20px;
        }

        .order-content {
            padding: 20px;
        }

        .order-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            /* background-color: #fff; */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .order-info {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .order-actions {
            text-align: right;
            margin-right: 30px !important;
        }
    </style>
    </head>

    <body>
        <section id="personalInfoBoard"
            style="background-image:url({{ asset('front/img/football-2-bg.jpg') }});color:{{ $colorSection['leaderboard']['text_color'] }};">
            <div class="container-fluid">
                <div class="row">
                    @include('front.layout.user_layout.user_sidebar')
                    <main class="col-md-9 order-content">
                        <h2>Your Orders</h2>


                        @foreach ($getOrders as $order )


                        <div class="order-card">
                            <div class="order-info">Order ID: {{ $order->id }}</div>
                            <div>Order Date: {{ $order->order_created_date }}</div>
                            <div>Subtotal Amount: ${{ $order->subtotal_amount }}</div>
                            <div>Tax: {{ $order->tax }}</div>
                            <div>Total Amount: ${{ $order->total_amount }}</div>
                            {{-- <div>Status: Shipped</div> --}}
                            <div class="order-actions">
                                <a href="{{ url('view-order-detail/'.$order->id) }}">  <button class="btn btn-primary">View Order Details</button></a>

                            </div>
                        </div>

                        @endforeach


                    </main>
                </div>
            </div>
        </section>
    @endsection
