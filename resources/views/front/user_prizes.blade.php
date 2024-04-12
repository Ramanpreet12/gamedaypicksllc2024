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
                        Prizes
                    </h2>
                    <div class="row">

                        <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-dark table-striped tableCardMobile tableBoard" id="roaster-table">
                                <thead>
                                    <tr class="table-primary">
                                        <th scope="col">S.no</th>
                                        <th scope="col">Season</th>
                                        <th scope="col">Prize Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Prize Details</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @if ($get_prizes->isNotEmpty())
                                    @foreach ($get_prizes as $prize)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $prize->season->season_name }}</td>
                                        <td>{{ $prize->prize->name }}</td>
                                        <td style="width: 380px">{!! $prize->prize->content !!}</td>
                                        <td><img src="{{ asset('storage/images/prize/'.$prize->prize->image) }}" style="width:240px;height:140px;"></td>
                                        {{-- <td>{{ $order_items->product_title }}</td>
                                        <td><img src="{{ asset('storage/images/products/'.$order_items->image_name) }}" style="width:70px;height:70px;"></td>
                                        <td>{{ $order_items->product_type }}</td>
                                        <td>{{ $order_items->product_qty }}</td>
                                        <td>{{ $order_items->product_size }}</td>
                                        <td>{{ $order_items->product_jersy_number }}</td>
                                        <td>{{ $order_items->product_jersy_name }}</td>
                                        <td>${{ $order_items->product_price }}</td> --}}
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
