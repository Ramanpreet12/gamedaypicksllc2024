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

                        Dashboard

                    </h2>

                    <div class="row">



                            <div class="col-md-12 col-lg-6 mb-3">

                                <div class="dashboardCard">

                                    <div class="dashboardCard-inner">

                                    <div class="card-body">

                                        <h4 class="card-title" style="color:#fff;">Team Pick</h4>

                                        <div class="table-responsive" id="rosterTable">

                                            <table class="table table-dark table-striped  tableBoard" id="roaster-table">

                                                <thead>

                                                    <tr class="table-primary">

                                                        <th scope="col" colspan="2">Teams</th>

                                                        <th></th>

                                                        <th></th>

                                                        <th>Week</th>

                                                        <th scope="col">Points</th>



                                                    </tr>

                                                </thead>

                                                <tbody class="table-group-divider">



                                                    {{-- {{dd($user)}} --}}

                                                    
                                                    @if (isset($user) &&  $user->isNotEmpty())

                                                        @foreach ($user as $item)

                                                            <tr>

                                                                <td class="teamLogo">

                                                                    <img src="{{ asset('storage/images/team_logo/' . $item->logo) }}"

                                                                        alt="" class="img-fluid">

                                                                </td>

                                                                <td class="teamName">

                                                                    <span>{{ ucwords($item->name) }}</span>

                                                                </td>

                                                                <td></td>

                                                                <td></td>

                                                                <td>{{ $item->week }}</td>

                                                                <td>{{ $item->points }}</td>

                                                            </tr>

                                                        @endforeach

                                                        <tr>

                                                            <td colspan="6"><a href="{{route('past_selections')}}">See More</a></td>

                                                        </tr>

                                                    @else

                                                        <tr>

                                                            <td colspan="6">

                                                                <span>No Data Found</span>

                                                            </td>

                                                        </tr>

                                                    @endif

                                                </tbody>

                                            </table>

                                        </div>

                                    </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-12 col-lg-6 mb-3">

                                <div class="dashboardCard">

                             <div class="dashboardCard-inner">

                                    <div class="card-body">

                                        <h4 class="card-title" style="color:#fff;">Payments</h4>

                                          <div class="table-responsive" id="rosterTable">

                                            <table class="table table-dark table-striped  tableBoard" id="roaster-table">

                                                <thead>

                                                    <tr class="table-primary">

                                                        <th scope="col">S.no.</th>

                                                        {{-- <th scope="col">Intended Id</th> --}}

                                                        <th scope="col">Status</th>

                                                        <th scope="col">Payed At</th>

                                                        <th scope="col">Invoice</th>

                                                    </tr>

                                                </thead>

                                                <tbody class="table-group-divider">
                                                    @if ($payment->isNotEmpty())

                                                        @foreach ($payment as $key => $item)

                                                            <tr>

                                                                <td>{{ $key + 1 }}</td>

                                                                {{-- <td>{{ $item->payment }}</td> --}}

                                                                <td>{{ $item->status }}</td>

                                                                <td>{{ $item->created_at }}</td>

                                                                <td>Invoice</td>

                                                            </tr>

                                                        @endforeach

                                                        <tr>

                                                            <td colspan="4"><a href="{{route('userPayment')}}">See More</a></td>

                                                        </tr>

                                                    @else

                                                        <tr>

                                                            <td colspan="4">No Payment Found</td>

                                                        </tr>

                                                    @endif

                                                </tbody>

                                            </table>

                                          </div>

                                      </div>

                                  </div>

                                  </div>

                                </div>
                            <div class="col-md-12 col-lg-6 mb-3">

                                <div class="dashboardCard">

                                    <div class="dashboardCard-inner">

                                    <div class="card-body">

                                        <h4 class="card-title" style="color:#fff;">Upcoming Matches</h4>

                                        <div class="table-responsive" id="rosterTable">

                                            <table class="table table-dark table-striped  tableBoard" id="roaster-table">

                                                <thead>

                                                    <tr class="table-primary">

                                                        <th scope="col">Match</th>

                                                        <th scope="col" class="matchFColDate">Date</th>



                                                    </tr>

                                                </thead>

                                                <tbody class="table-group-divider">
                                                    @if ( isset( $upcoming) && $upcoming->isNotEmpty())

                                                        @foreach ($upcoming as $k => $i)

                                                            <tr>

                                                                <td> week : {{ $k }}</td>

                                                                <td class="matchFColDate"></td>

                                                            </tr>

                                                            @foreach ($i as $team)

                                                                <tr>

                                                                    <td>

                                                                        <div

                                                                            class="fixureMatch d-flex align-items-center justify-content-center">

                                                                            <div class="teamOne teamCard">
                                                                                @if (!empty($team->first_team_id))
                                                                                <img src="{{ asset('storage/images/team_logo/' . $team->first_team_id->logo) }}"

                                                                                    alt="" class="img-fluid">



                                                                                <div style="min-width:100px">

                                                                                    {{ $team->first_team_id->name }}</div>
                                                                                    @else

                                                                                    <div style="min-width:100px">TBD

                                                                                    </div>

                                                                                    @endif

                                                                            </div>

                                                                            <div class="versis">

                                                                                <h5>VS</h5>

                                                                                <div class="d-md-none">

                                                                                    <span class="matchFixtureDate" data-title="Date"> Sep 08 , 2023</span>



                                                                                </div>

                                                                            </div>

                                                                            <div class="teamOne teamCard">
                                                                                @if (!empty($team->second_team_id))
                                                                                <img src="{{ asset('storage/images/team_logo/' . $team->second_team_id->logo) }}"

                                                                                    alt="" class="img-fluid">

                                                                                <div style="min-width:100px">

                                                                                    {{ $team->second_team_id->name }}</div>

                                                                                    @else

                                                                                    <div style="min-width:100px">TBD

                                                                                    </div>

                                                                                    @endif
                                                                            </div>

                                                                        </div>

                                                                    </td>



                                                                    <td class="matchDate matchFColDate">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $team->date)->format('M d , Y') }}

                                                                    </td>

                                                                </tr>

                                                            @endforeach

                                                        @endforeach

                                                        <tr>

                                                            <td colspan="3"><a href="{{route('upcomingMatches')}}">See More</a></td>

                                                        </tr>

                                                    @else

                                                        <tr>

                                                            <td colspan="5">

                                                                <span>No Data Found</span>

                                                            </td>

                                                        </tr>

                                                    @endif

                                                </tbody>

                                            </table>

                                        </div>

                                    </div>

                                </div>

                                </div>

                            </div>

                            <div class="col-md-12 col-lg-6 mb-3">

                                <div class="dashboardCard">

                                    <div class="dashboardCard-inner">

                                    <div class="card-body">

                                        <h4 class="card-title" style="color:#fff;">Prizes</h4>

                                        <div class="table-responsive" id="rosterTable">

                                            <table class="table table-dark table-striped  tableBoard" id="roaster-table">

                                                <thead>

                                                    <tr class="table-primary">

                                                        <th scope="col">Season</th>

                                                        <th scope="col" >Prize</th>

                                                        <th scope="col"></th>

                                                        {{-- <th scope="col">Payed At</th>

                                                    <th scope="col">Time Before</th> --}}

                                                    </tr>

                                                </thead>

                                                <tbody class="table-group-divider">



                                                    {{-- {{ dd($get_prizes) }} --}}
                                                    @if ($get_prizes->isNotEmpty())

                                                        @foreach ($get_prizes as $prize)

                                                            <tr>

                                                                <td>{{$prize->season->season_name}}</td>

                                                                <td style="word-wrap: break-word;min-width: 50px;max-width: 100px;">{{$prize->prize->name}}</td>

                                                                <td>

                                                                <div class="flex">

                                                                    <div class="w-10 h-10 image-fit zoom-in">

                                                                        @if (!empty($prize->prize->image))

                                                                        <img src="{{asset('storage/images/prize/'.$prize->prize->image)}}" alt="" height="50px" width="100px" class="rounded-full">

                                                                        @else

                                                                                <img src="{{asset('dist/images/no-image.png')}}" alt="" class="img-fluid rounded-full">

                                                                        @endif

                                                                    </div>

                                                                    <!-- <div class="text-slate-500 font-medium mx-4">

                                                                        {{ $prize->prize->name }}

                                                                    </div> -->

                                                                </div>



                                                                </td>

                                                            </tr>

                                                        @endforeach

                                                        <tr>

                                                            <td colspan="4"><a href="{{route('prizes')}}">See More</a></td>

                                                        </tr>
                                                    @else

                                                        <tr>

                                                            <td colspan="4">No Prize Found</td>

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

            </div>

        </div>

        </div>

        </div>

    </section>

@endsection

