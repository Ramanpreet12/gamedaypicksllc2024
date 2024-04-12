@extends('front.layout.app')
@section('content')
    <!-- mainheader -->
    <section id="matchResult">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Game Result</h2>
                    
                </div>
            </div>
            @foreach ($get_game_results as $week => $weakData)
            <div class="row">
                <div class="col-12">
                    <div class="seasonWeek d-flex">
                    <h5>Season : {{$season_name}}</h5>
                        <span>week {{$week}} of 18 </span>
                    </div>
                </div>
            </div>
            @foreach ($weakData as $weeks => $team)

            @if ($week == $team->week)
            <div id="matchResultSection">
                <div class="container">
                    <div class="matchDetail">
                        <div class="row">

                            <div class="col-md-5">
                                <div class="teamResult">
                                    <div class="teamInfo">
                                        <div class="result-content">
                                            <h4><span>
                                                @if ($team->win ==  $team->first_team)
                                                    {{$team->first_team_id->name}}

                                                   @elseif ($team->win == $team->second_team)
                                                   {{$team->second_team_id->name}}

                                                   @elseif ($team->win == 0)
                                                   {{''}}

                                                @endif

                                                    </span></h4>

                                            <p class="loseResult">WIN</p>
                                        </div>
                                    </div>
                                    <div class="resultteamLogo">
                                        {{-- <img src="{{ asset('front/img/LA-Rams.png') }}" alt=""
                                            class="img-fluid teamlogoImg"> --}}

                                            @if ($team->win ==  $team->first_team)
                                            <img src="{{asset('storage/images/team_logo/'.$team->first_team_id->logo)}}" alt="" class="img-fluid teamlogoImg">
                                           @elseif ($team->win == $team->second_team)
                                           <img src="{{asset('storage/images/team_logo/'.$team->second_team_id->logo)}}" alt="" class="img-fluid teamlogoImg">
                                           @elseif ($team->win == 0)
                                           {{''}}

                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="result-count">
                                    <div class="count_number">
                                        <span class="win-Team">
                                            @if ($team->win ==  $team->first_team)
                                               {{$team->first_team_points}}

                                               @elseif ($team->win == $team->second_team)
                                               {{$team->second_team_points}}

                                               @elseif ($team->win == 0)
                                               {{'0'}}

                                            @endif
                                        </span>
                                        <span>-</span>
                                        <span class="lose-Team">
                                            @if ($team->loss ==  $team->first_team)
                                            {{$team->first_team_points}}

                                            @elseif ($team->loss == $team->second_team)
                                            {{$team->second_team_points}}

                                            @elseif ($team->loss == 0)
                                            {{'0'}}

                                         @endif
                                        </span>
                                    </div>
                                    {{-- <p>May 16,2015 15:30PM
                                        WBEYSLEY STADIUM (LONDON)</p> --}}
                                        <p>{{ \Carbon\Carbon::parse($team->date)->format('j F, Y') }}&nbsp;</p>
                              <p>  {{ \Carbon\Carbon::createFromFormat('H:i:s', $team->time)->format('g:i') }}
                                {{ ucfirst($team->time_zone) }}</p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="teamResult resultDetail">

                                    <div class="resultteamLogo">
                                        {{-- <img src="{{ asset('front/img/Lions.png') }}" alt=""
                                            class="img-fluid teamlogoImg"> --}}
                                            @if ($team->loss ==  $team->first_team)
                                            <img src="{{asset('storage/images/team_logo/'.$team->first_team_id->logo)}}" alt="" class="img-fluid teamlogoImg">
                                           @elseif ($team->loss == $team->second_team)
                                           <img src="{{asset('storage/images/team_logo/'.$team->second_team_id->logo)}}" alt="" class="img-fluid teamlogoImg">
                                           @elseif ($team->loss == 0)
                                           {{''}}

                                        @endif

                                    </div>
                                    <div class="teamInfo">
                                        <div class="result-content">
                                            {{-- <h4><span>FC ZULU NINJAS</span></h4> --}}
                                            <h4><span>
                                                @if ($team->loss ==  $team->first_team)
                                                {{$team->first_team_id->name}}

                                                @elseif ($team->loss == $team->second_team)
                                                {{$team->second_team_id->name}}

                                                @elseif ($team->loss == 0)
                                                {{''}}

                                             @endif

                                                </span></h4>

                                            <p class="loseResult">LOSE</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @endif
            @endforeach
       @endforeach

        </div>
    </section>
@endsection
