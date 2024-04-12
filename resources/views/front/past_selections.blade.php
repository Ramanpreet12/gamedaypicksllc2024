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
                        Past Selections
                    </h2>
                    <br>

                    @if ($past_selections->isNotEmpty())
                        @foreach ($past_selections as $seasons => $season_data)
                            <h6 style="color:{{ $colorSection['leaderboard']['header_color'] }};">
                                Season : {{ $seasons }}
                            </h6>

                            <div class="row mt-3 mb-5">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-dark table-striped tableBoard">
                                            <thead>
                                                <tr class="table-primary">
                                                    <th scope="col">Match</th>
                                                    <th scope="col">Win</th>
                                                    <th scope="col">Loss</th>
                                                    <th scope="col">My Pick</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Points</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @foreach ($past_selections as $week => $weakData) --}}
                                                @foreach ($season_data as $week => $weakData)
                                                    {{-- {{ dd($weakData) }} --}}
                                                    <tr>
                                                        <td data-label="Match" style="color: #db9a29;font-weight:bold;">Week
                                                            :
                                                            {{ $week }}</td>
                                                        <td data-label="Win"></td>
                                                        <td data-label="Loss"></td>
                                                        <td data-label="My Pick"></td>
                                                        <td data-label="Date"></td>
                                                        <td data-label="Time"></td>
                                                        <td data-label="Points"></td>
                                                    </tr>
                                                    @foreach ($weakData as $weaks => $team)
                                                        {{-- {{dd($team)}} --}}
                                                        @if ($week == $team->fweek)
                                                            <tr>
                                                                {{-- <td>1</td> --}}

                                                                <td>
                                                                    <div
                                                                        class="fixureMatch d-flex align-items-center justify-content-center">
                                                                        <div class="teamOne teamCard">
                                                                            <img src="{{ asset('storage/images/team_logo/' . $team->first_logo) }}"
                                                                                alt="" class="img-fluid">

                                                                            <div style="min-width:100px">
                                                                                {{ $team->first_name }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="versis">
                                                                            <h5>VS</h5>

                                                                        </div>
                                                                        <div class="teamOne teamCard">
                                                                            <img src="{{ asset('storage/images/team_logo/' . $team->second_logo) }}"
                                                                                alt="" class="img-fluid">

                                                                            <div style="min-width:100px">
                                                                                {{ $team->second_name }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                {{-- <td>{{ get_team_name($team->team_win) }}
                                                    </td>
                                                    <td class="matchDate">{{ get_team_name($team->team_loss) }}
                                                    </td> --}}

                                                                <td>
                                                                    {{-- <div class="fixureMatch"> --}}
                                                                    <div class="teamOne teamCard">
                                                                        <img src="{{ asset('storage/images/team_logo/' . get_team_logo($team->team_win)) }}"
                                                                            alt="" class="img-fluid"
                                                                            style="height: 30px">

                                                                        <div style="min-width:100px">
                                                                            {{ get_team_name($team->team_win) }}</div>
                                                                    </div>
                                                                    {{-- </div> --}}
                                                                </td>
                                                                <td>
                                                                    {{-- <div
                                                            class="fixureMatch d-flex align-items-center justify-content-center"> --}}
                                                                    <div class="teamOne teamCard">
                                                                        <img src="{{ asset('storage/images/team_logo/' . get_team_logo($team->team_loss)) }}"
                                                                            alt="" class="img-fluid"
                                                                            style="height: 30px">

                                                                        <div style="min-width:100px">
                                                                            {{ get_team_name($team->team_loss) }}</div>
                                                                    </div>
                                                                    {{-- </div> --}}
                                                                </td>


                                                                <td>
                                                                    <div class="teamOne teamCard">
                                                                        <img src="{{ asset('storage/images/team_logo/' . $team->tlogo) }}"
                                                                            alt="" class="img-fluid"
                                                                            style="height: 30px">

                                                                        <div style="min-width:100px">{{ $team->user_team }}
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="matchDate">
                                                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $team->fdate)->format('M d , Y') }}
                                                                </td>
                                                                @if ($team->ftime == '12:00:00' && ($team->ftime_zone = 'am'))
                                                                    <td>TBD</td>
                                                                @else
                                                                    <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $team->ftime)->format('H:i') }}
                                                                        {{ ucfirst($team->tformat) }} ET
                                                                    </td>
                                                                @endif
                                                                {{-- <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $team->ftime)->format('H:i') }}{{ $team->tformat }}
                                                    </td> --}}
                                                                <td>{{ $team->user_point }}
                                                                </td>

                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                                {{-- @endforeach --}}
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else

                    <div class="row mt-3 mb-5">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-dark table-striped tableBoard">
                                    <thead>
                                        <tr class="table-primary">
                                            <th scope="col">Match</th>
                                            <th scope="col">Win</th>
                                            <th scope="col">Loss</th>
                                            <th scope="col">My Pick</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="7">No Data Found</td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    @endif

                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection
