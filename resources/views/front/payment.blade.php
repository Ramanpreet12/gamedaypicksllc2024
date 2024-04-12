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
                        Payments
                    </h2>
                    <div class="row">
                        
                        <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-dark table-striped tableCardMobile tableBoard" id="roaster-table">
                                <thead>
                                    <tr class="table-primary">
                                        <th scope="col">Sno.</th>
                                        <th scope="col">Intended Id</th>
                                        <th scope="col">Season</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Payed At</th>
                                        <th scope="col">Time Before</th>
                                        <th scope="col">Invoice</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @if ($payment)
                                        @foreach ($payment as $key => $item)
                                            <tr>
                                                <td data-label="Sno.">{{ $key+1 }}</td>
                                                <td data-label="Intended Id">{{ $item->transaction_id }}</td>
                                                <td>{{ $item->season->season_name }}</td>
                                                <td data-label="Status">{{ $item->status }}</td>
                                                <td data-label="Payed At" class="matchDate">{{ \Carbon\Carbon::parse( $item->created_at)->format('j F, Y') }}</td>
                                                <td data-label="Time Before" class="matchDate">{{ $item->created_date }}</td>
                                                <td><a href="{{ route('download-invoice',['id'=>$item->id]) }}" class="btn btn-primary"> Invoice </a></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">No Payment is Found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
</div>
                            <div class="d-flex justify-content-center">
                                {!! $payment->links() !!}
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
