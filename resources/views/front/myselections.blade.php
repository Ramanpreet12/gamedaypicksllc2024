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
                        My Selections
                    </h2>
                    <br>

                    @if ($my_selections->isNotEmpty())
                    @foreach ($my_selections as $season => $season_data)
                        {{-- @foreach ($my_selections as $week => $weakData) --}}
                        <h6 style="color:{{ $colorSection['leaderboard']['header_color'] }};">
                            Season : {{ $season }}
                            {{-- {{ Dd($season_data) }} --}}
                        </h6>

                        <div class="row mt-3 mb-5">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-dark table-striped  tableBoard">
                                        <thead>
                                            <tr class="table-primary">
                                                <th scope="col">S no.</th>
                                                <th scope="col" colspan="3">Match</th>
                                                <th scope="col">My Pick</th>
                                                <th scope="col" class="matchFColDate">Date</th>
                                                <th scope="col" class="matchFColTime">Time</th>
                                                <th scope="col">Points</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- {{dd($my_selections)}} --}}
                                            {{-- @if ($my_selections->isNotEmpty()) --}}
                                            {{-- @foreach ($my_selections as $week => $weakData) --}}
                                            {{-- <tr>
                                                <td data-label="Sno."></td>
                                                <td data-label="Season"></td>
                                                <td data-label="Match" style="color: #db9a29;font-weight:bold;"
                                                    colspan="3">Week : {{ $week }}</td>
                                                <td data-label="My Pick"></td>
                                                <td data-label="Date" class="matchFColDate"></td>
                                                <td data-label="Time" class="matchFColTime"></td>
                                                <td data-label="Points"></td>
                                            </tr> --}}
                                            @php
                                                $count = '';
                                            @endphp
                                            @foreach ($season_data as $weaks => $matches)
                                                <tr>
                                                    <td data-label="Sno."></td>
                                                    {{-- <td data-label="Season"></td> --}}
                                                    <td data-label="Match" style="color: #db9a29;font-weight:bold;"
                                                        colspan="3">Week : {{ $weaks }}</td>
                                                    <td data-label="My Pick"></td>
                                                    <td data-label="Date" class="matchFColDate"></td>
                                                    <td data-label="Time" class="matchFColTime"></td>
                                                    <td data-label="Points"></td>
                                                </tr>
                                                @foreach ($matches as $match)
                                                    @if ($weaks == $match->fweek)
                                                        <tr>
                                                            <td>{{ ++$count }}</td>
                                                            {{-- <td>{{ $match->season_name }}</td> --}}
                                                            <td>
                                                                <img src="{{ asset('storage/images/team_logo/' . $match->first_logo) }}"
                                                                    alt="" class="img-fluid">

                                                                <div style="min-width:100px">
                                                                    {{ $match->first_name }}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="versis">
                                                                    <h5>VS</h5>
                                                                </div>
                                                                <div class="d-md-none">
                                                                    <span class="matchFixtureDate" data-title="Date">
                                                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $match->fdate)->format('M d , Y') }}</span>
                                                                    <span class="matchFixtureTime"
                                                                        data-title="Time">{{ \Carbon\Carbon::createFromFormat('H:i:s', $match->ftime)->format('H:i') }}{{ $match->ftime_zone }}</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <img src="{{ asset('storage/images/team_logo/' . $match->second_logo) }}"
                                                                    alt="" class="img-fluid">

                                                                <div style="min-width:100px">
                                                                    {{ $match->second_name }}
                                                                </div>
                                                            </td>
                                                            </td>
                                                            <td>
                                                                <div class="teamOne teamCard">
                                                                    <img src="{{ asset('storage/images/team_logo/' . $match->team_logo) }}"
                                                                        alt="" class="img-fluid">

                                                                    <div style="min-width:100px">{{ $match->user_team }}
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="matchFColDate"> <span
                                                                    class="matchFixtureDate">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $match->fdate)->format('M d , Y') }}</span>
                                                            </td>
                                                            {{-- <td class="matchFColTime"><span class="matchFixtureTime">{{ \Carbon\Carbon::createFromFormat('H:i:s', $match->ftime)->format('H:i') }}{{ $match->ftime_zone }} </span> </td> --}}

                                                            @if ($match->ftime == '12:00:00' && ($match->ftime_zone = 'am'))
                                                                <td class="matchFColTime"><span class="matchFixtureTime">TBD
                                                                </td>
                                                            @else
                                                                <td class="matchFColTime"><span
                                                                        class="matchFixtureTime">{{ \Carbon\Carbon::createFromFormat('H:i:s', $match->ftime)->format('H:i') }}
                                                                        {{ ucfirst($match->ftime_zone) }} ET</span> </td>
                                                            @endif
                                                            </td>

                                                            <td>{{ $match->user_point }}
                                                            </td>


                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            {{-- @endforeach --}}
                                            {{-- @endif --}}
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
                                            <td colspan="7">No Team Selected Yet</td>
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
