@extends('front.layout.user_layout.user_app')
@section('content')
    <!-- Custom CSS -->
    <style>
        /* body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    color: #333;
                } */
        .container-fluid {
            padding: 20px;
        }

        /* .sidebar {
                    background-color: #333;
                    color: #fff;
                    padding: 20px;
                    min-height: 100vh;
                } */
        .order-content {
            padding: 20px;
        }

        .order-details {
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
        }

        .order-info {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #555;
        }

        .product-image {
            max-width: 150px;
            max-height: 150px;
            margin-right: 20px;
            border-radius: 5px;
        }

        .product-details {
            color: #333;
            margin-bottom: 10px;
        }

        .total-price {
            font-size: 22px;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 50px;
            color: #333;

        }

        .shipping-details {
            color: #333;
            margin-bottom: 20px;
        }

        .status-info {
            font-size: 18px;
            color: #333;
        }

        .track-order-btn {
            margin-top: 20px;
        }

        .border-bottom-light {
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .bold {
            font-weight: bold;
        }

        .icon {
            font-size: 24px;
            margin-right: 10px;
            color: #555;
        }

        .icon-text {
            display: inline-block;
            vertical-align: middle;
        }

        .section-title {
            font-size: 20px;
            margin-bottom: 15px;
        }
    </style>

    <section id="personalInfoBoard"
        style="background-image:url({{ asset('front/img/football-2-bg.jpg') }});color:{{ $colorSection['leaderboard']['text_color'] }};">
        <div class="container-fluid">
            <div class="row">
                @include('front.layout.user_layout.user_sidebar')
                {{-- <nav class="col-md-3 sidebar">
            <h2 class="mb-4">User Dashboard</h2>
            <!-- Sidebar content goes here -->
        </nav> --}}
                <main class="col-md-9 order-content">
                    <h2 class="mb-4">Order Details</h2>

                    <div class="order-details">
                        <div class="d-flex justify-content-between mb-5">
                            <div class="order-info">Order ID: #{{ $get_orderId }}</div>
                            <div class="order-info">Order Date: {{ $order->order_created_date }}</div>
                        </div>
                        @if ($getOrderItems->isNotEmpty())
                            @foreach ($getOrderItems as $order_item)
                                <div class="border-bottom-light">
                                    <div class="row">
                                        <div class="col-md-3">
                                            @if (!empty($order_item->product_image))
                                                <img src="{{ asset('storage/images/products/' . $order_item->product_image) }}"
                                                    alt="Product Image" class="product-image">
                                                {{-- @elseif (!empty($product->product_images['0']->image_name))
                                        <img src="{{ asset('storage/images/products/' . $product->product_images['0']->image_name) }}"
                                            alt="" height="50px" width="100px"> --}}
                                            @else
                                                <img src="{{ asset('dist/images/no-image.png') }}" alt="Product Image"
                                                    class="product-image">
                                            @endif

                                            {{-- <img src="{{ asset('storage/images/products/'.$order_item->product_image) }}" alt="Product Image" class="product-image"> --}}
                                        </div>
                                        <div class="col-md-9">
                                            <div class="product-details">
                                                <div class="bold"> {{ $order_item->product_title }}</div>
                                                <div class="bold">${{ $order_item->product_price }}</div>
                                                <div>Quantity: {{ $order_item->product_qty }}</div>
                                                <div>Size: {{ Str::ucfirst($order_item->product_size) }}</div>
                                                <div>Gender: {{ Str::ucfirst($order_item->product_gender) }}</div>
                                                @if ($order_item->store_type == 'shop')
                                                    <div>Jersey Name: {{ $order_item->product_jersy_name }}</div>
                                                    <div>Jersey Number: {{ $order_item->product_jersy_number }}</div>
                                                @elseif ($order_item->store_type == 'greek-store')
                                                    <div>Name on Back: {{ $order_item->product_jersy_name }}</div>
                                                    <div>Line Name: {{ $order_item->product_jersy_number }}</div>
                                                    <div>Chapter Name: {{ $order_item->chapter_name }}</div>
                                                    <div>University Name: {{ $order_item->university_name }}</div>
                                                    <div>Cross Over Year :- {{ $order_item->cross_over_year }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        @endif


                        <div class="text-end" style="color: #555"><b>Subtotal:</b> ${{ $order->subtotal_amount }}</div>
                        <div class="text-end" style="color: #555"><b>Tax:</b> {{ $order->tax }}</div>
                        <div class="text-end total-price border-bottom-light">Total Price: ${{ $order->total_amount }}
                        </div>

                        <div class="text-end shipping-details border-bottom-light">
                            <div class="section-title ">Shipping Address</div>
                            <div class="border-bottom-light">{{ $order_item->name }}, {{ $order_item->address }},
                                {{ $order_item->city }},
                                {{ $order_item->country }}</div>
                            <div class="payment-details border-bottom-light">
                                <div class="section-title">Payment Details</div>
                                <div>Transaction ID: {{ $order_item->transaction_id }}</div>
                                <div>Reference Number: {{ $order_item->ref_num }}</div>
                                <div>Payment Method: {{ Str::ucfirst($order_item->payment_method) }}</div>
                            </div>
                            <div class="section-title ">Contact Details</div>
                            @if (isset(Auth::user()->phone_number) && !empty(Auth::user()->phone_number))
                                <div>Contact Number: {{ Auth::user()->phone_number }}</div>
                            @endif

                            <div>Email: {{ $order_item->email }}</div>
                        </div>

                        {{-- <div class="status-info">Status: Shipped</div>
                <div class="status-info">Estimated Delivery: 2024-03-10</div> --}}

                        <div class="text-end track-order-btn">
                            {{-- <button class="btn btn-primary">Download Invoice</button> --}}
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </section>
@endsection
