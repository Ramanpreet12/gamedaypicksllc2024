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

                        Upcoming Matches

                    </h2>

                    <div class="row">

                        <div class="col-12">

                            <div class="table-responsive">

                                <table class="table table-dark table-striped  tableBoard">

                                    <thead>

                                        <tr class="table-primary">

                                            <th scope="col">Match</th>

                                            <th scope="col" class="matchDate matchFColDate">Date</th>

                                            <th scope="col" class="matchDate matchFColDate">Time</th>

                                        </tr>

                                    </thead>

                                    <tbody>
                                        @if (isset($upcoming) && $upcoming->isNotEmpty())
                                            @foreach ($upcoming as $week => $weakData)
                                                <tr>

                                                    <td style="color: #db9a29;font-weight:bold;">Week : {{ $week }}
                                                    </td>

                                                    <td class="matchDate matchFColDate"></td>

                                                    <td class="matchDate matchFColDate"></td>

                                                </tr>

                                                @foreach ($weakData as $weaks => $team)
                                                    @if ($week == $team->week)
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="fixureMatch d-flex align-items-center justify-content-center">

                                                                    <div class="teamOne teamCard">

                                                                        @if (!empty($team->first_team_id))
                                                                            <img src="{{ asset('storage/images/team_logo/' . $team->first_team_id->logo) }}"
                                                                                alt="" class="img-fluid">



                                                                            <div style="min-width:100px">
                                                                                {{ $team->first_team_id->name }}

                                                                            </div>
                                                                        @else
                                                                            <div style="min-width:100px">TBD

                                                                            </div>
                                                                        @endif



                                                                    </div>

                                                                    <div class="versis">

                                                                        <h5>VS</h5>

                                                                    </div>

                                                                    <div class="teamOne teamCard">

                                                                        @if (!empty($team->second_team_id))
                                                                            <img src="{{ asset('storage/images/team_logo/' . $team->second_team_id->logo) }}"
                                                                                alt="" class="img-fluid">



                                                                            <div style="min-width:100px">
                                                                                {{ $team->second_team_id->name }}

                                                                            </div>
                                                                        @else
                                                                            <div style="min-width:100px">TBD

                                                                            </div>
                                                                        @endif



                                                                    </div>

                                                                </div>

                                                            </td>

                                                            <td class="matchDate matchFColDate">
                                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $team->date)->format('M d , Y') }}

                                                            </td>

                                                            @if ($team->time == '12:00:00' && ($team->time_zone = 'am'))
                                                                <td class="matchDate matchFColDate">TBD</td>
                                                            @else
                                                                <td class="matchDate matchFColDate">
                                                                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $team->time)->format('H:i') }}
                                                                    {{ ucfirst($team->time_zone) }} ET

                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @else

                                        <tr>
                                            <td colspan="3" class="text-center">No upcoming match found</td>
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
