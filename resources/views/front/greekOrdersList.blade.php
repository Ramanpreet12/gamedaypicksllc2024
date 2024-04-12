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
                <div class="col-sm-8 col-md-9">
                    <h2 style="color:{{ $colorSection['leaderboard']['header_color'] }};">
                        User Previous Greek Orders
                    </h2>
                    <div class="row">

                        <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-dark table-striped tableCardMobile tableBoard" id="roaster-table">
                                <thead>
                                    <tr class="table-primary">
                                        <th scope="col">S.no</th>
                                        <th scope="col">OrderId</th>
                                        <th scope="col">Product Title</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product Type</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Jersey No </th>
                                        <th scope="col">Jersey Name </th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>


                                <tbody>

                                    @if ($greek_orders->isNotEmpty())
                                    @foreach ($greek_orders as $order_items)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order_items->greek_order_id }}</td>
                                        <td>{{ $order_items->product_title }}</td>
                                        <td><img src="{{ asset('storage/images/greek_store/'.$order_items->image_name) }}" style="width:70px;height:70px;"></td>
                                        <td>{{ Str::ucfirst($order_items->product_type)  }}</td>
                                        <td>{{ $order_items->product_qty }}</td>
                                        <td>{{ $order_items->product_size }}</td>
                                        <td>{{ $order_items->line_number }}</td>
                                        <td>{{ $order_items->product_jersy_name }}</td>
                                        <td>${{ $order_items->product_price }}</td>
                                    </tr>
                                    @endforeach
                                    @else

                                    <tr>
                                        <td colspan="10">No Record Found</td>
                                    </tr>
                                    @endif

                                </tbody>

                            </table>
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
