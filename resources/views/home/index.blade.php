@extends('front.layout.app')

@section('content')

    <section id="heroBanner">

        <div class="owl-carousel owl-heroSlider">

            @forelse ($banners as $banner)
                <div class="owlItem" style="background-image:url({{ asset('storage/images/banners/' . $banner->image) }})">

                    <div class="bannerCaption">

                        <div class="container">

                            <div class="row justify-content-lg-end">

                                <div class="col-sm-12 col-md-8 col-lg-5 ">

                                    <h1 style="color:{{ $colorSection['header']['header_color'] }};">

                                        {{ $general->homepage_title }}</h1>

                                    <p style="color:{{ $colorSection['header']['text_color'] }};">

                                        {{ $general->homepage_subtitle }}</p>

                                    <div class="booking mt-5 text-center">

                                        <a href="{{ route('register') }}">

                                            <button type="button" class="btn btn-primary  btn-lg"
                                                style="color:{{ $colorSection['header']['text_color'] }};">SUBSCRIBE</button>

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="owlItem" style="background-image:url({{ asset('front/img/crousel1.jpg') }})">

                    <div class="bannerCaption">

                        <div class="container">

                            <div class="row justify-content-lg-end">

                                <div class="col-sm-12 col-md-8 col-lg-5 ">



                                    {{-- <h1 style="color:{{ $colorSection['scoreboard']["header_color"] }};">We Love<span class="#textColor">Football</span></h1> --}}

                                    <h1 style="color:{{ $colorSection['scoreboard']['header_color'] }};">

                                        {{ $general->homepage_title }}</h1>



                                    <p style="color:{{ $colorSection['scoreboard']['text_color'] }};">

                                        {{ $general->homepage_subtitle }}</p>

                                    <div class="booking mt-5 text-center">

                                        <a href="{{ route('register') }}">

                                            <button type="button" class="btn btn-primary  btn-lg"
                                                style="color:{{ $colorSection['scoreboard']['text_color'] }};">SUBSCRIBE

                                            </button>

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="owlItem" style="background-image:url({{ asset('front/img/crousel3.jpg') }})">

                    <div class="bannerCaption">

                        <div class="container">

                            <div class="row justify-content-lg-end">

                                <div class="col-sm-12 col-md-8 col-lg-5 ">

                                    <h1 style="color:{{ $colorSection['scoreboard']['text_color'] }};">We Love<span
                                            class="#textColor">Football</span></h1>

                                    <p style="color:{{ $colorSection['scoreboard']['text_color'] }};">Don't walk through

                                        life just playing football. Don't walk through life just being an athlete.

                                        Athletics will fade.</p>

                                    <div class="booking mt-5 text-center">

                                        <a href="{{ route('register') }}">

                                            <button type="button" class="btn btn-primary  btn-lg">SUBSCRIBE</button>

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            @endforelse

        </div>

    </section>



    <!-- matchBoard with header -->
    <section id="matchBoard" style="color:{{ $colorSection['scoreboard']['text_color'] }};">
        <div class="container text-center">
            @if ($matchBoards_win_loss->isNotEmpty())
                <div class="row g-0 team-vs">
                    @if (!empty($matchBoards_win_loss[0]->win_team_id) && !empty($matchBoards_win_loss[1]->loss_team_id))
                        <span
                            class="score">{{ $matchBoards_win_loss[0]->total_win_pts_of_team }}-{{ $matchBoards_win_loss[1]->total_loss_pts_of_team }}</span>
                    @else
                        <span class="score">0 - 0</span>
                    @endif

                    <div class="col-sm-6">
                        <div class="firstBoard boardItem"
                            style="background-color:{{ $colorSection['scoreboard']['bg_color'] }};">
                            <div class="boardItem-inner">

                                {{-- @if ($matchBoards_win_loss) --}}
                                    @if (!empty($matchBoards_win_loss[0]->win_team_id))
                                        <img src="{{ asset('storage/images/team_logo/' . $matchBoards_win_loss[0]->win_team_logo) }}"
                                            alt="" class="img-fluid">
                                    {{-- @else
                                        <img src="{{ asset('storage/images/team_logo/Lions.png') }}" alt=""
                                            class="img-fluid"> --}}
                                    @endif
                                {{-- @else
                                    <img src="{{ asset('dist/images/no-image.png') }}" alt="" class="img-fluid">
                                @endif --}}



                                @if (!empty($matchBoards_win_loss[0]->win_team_id))
                                    <h3 class="mt-3">
                                        {{ $matchBoards_win_loss[0]->win_team_name }}</h3>
                                {{-- @else
                                    <h3 class="mt-3">Detroit Lions</h3> --}}
                                @endif

                                {{-- <h4>{{ $matchBoard_team->first_team_id->win > $matchBoard_team->second_team_id->loss ? 'Win' : 'Loss' }}</h4> --}}
                            </div>

                        </div>

                    </div>

                    <div class="col-sm-6">

                        <div class="secondBoard boardItem"
                            style="background-color:{{ $colorSection['scoreboard']['bg_color'] }};">

                            <div class="boardItem-inner">

                                {{-- @if ($matchBoards_win_loss) --}}
                                    @if (!empty($matchBoards_win_loss[1]->loss_team_id))
                                        <img src="{{ asset('storage/images/team_logo/' . $matchBoards_win_loss[1]->loss_team_logo) }}"
                                            alt="" class="img-fluid">
                                    {{-- @else
                                        <img src="{{ asset('storage/images/team_logo/Chiefs.png') }}" alt=""
                                            class="img-fluid"> --}}
                                    @endif
                                {{-- @else
                                    <img src="{{ asset('front/img/Philly-Eagles.png') }}" alt="" class="img-fluid">
                                @endif --}}



                                @if (!empty($matchBoards_win_loss[1]->loss_team_id))
                                    <h3 class="mt-3">{{ $matchBoards_win_loss[1]->loss_team_name }}</h3>
                                {{-- @else
                                    <h3 class="mt-3">Chiefs</h3> --}}
                                @endif

                                {{-- <h4>{{ $matchBoard_team->second_team_id->win > $matchBoard_team->first_team_id->loss ? 'Win' : 'Loss' }}</h4> --}}

                            </div>

                        </div>

                    </div>

                </div>
            @else

            <div class="row g-0 team-vs">
                    <span class="score">0 - 0</span>
                <div class="col-sm-6">
                    <div class="firstBoard boardItem"
                        style="background-color:{{ $colorSection['scoreboard']['bg_color'] }};">
                        <div class="boardItem-inner">
                            <img src="{{ asset('storage/images/team_logo/Lions.png') }}" alt=""
                            class="img-fluid">
                                <h3>Detroit Lions</h3>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="secondBoard boardItem"
                        style="background-color:{{ $colorSection['scoreboard']['bg_color'] }};">
                        <div class="boardItem-inner">
                            <img src="{{ asset('storage/images/team_logo/Chiefs.png') }}" alt=""
                            class="img-fluid">
                                <h3>Kansas City Chiefs</h3>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    <section id="nextmatchBoard"
        style="background-image:url({{ asset('front/img/football-2-bg.jpg') }});color:{{ $colorSection['leaderboard']['text_color'] }};">

        <div class="container text-center">

            <div class="row">
                <div class="col-md-5">

                    <div class="upcomingMatchBlock">

                        <h2 style="color:{{ $colorSection['leaderboard']['header_color'] }};">
                            @if (!empty($fixtureHeading->value))
                                {{ strtoupper($fixtureHeading->value) }}
                            @else
                                UPCOMING MATCHES
                            @endif

                        </h2>

                        @if ($upcoming_matches->isNotEmpty())
                            @foreach ($upcoming_matches as $upcoming_match)
                                <div class="tabletwo">

                                    <div class="matchTable align-items-center justify-content-center">

                                        <div class="firstTeam teamCard">

                                            @if ($upcoming_match)
                                                @if (!empty($upcoming_match->first_team_id))
                                                    <img src="{{ asset('storage/images/team_logo/' . $upcoming_match->first_team_id->logo) }}"
                                                        alt="" class="img-fluid">
                                                @else
                                                    {{ ' ' }}
                                                @endif
                                            @else
                                                <img src="{{ asset('dist/images/no-image.png') }}" alt=""
                                                    class="img-fluid">
                                            @endif

                                            @if (!empty($upcoming_match->first_team_id))
                                                <h5 style="word-wrap: break-word;">

                                                    {{ $upcoming_match->first_team_id->name ? $upcoming_match->first_team_id->name : '' }}

                                                </h5>
                                            @else
                                                <h5 style="word-wrap: break-word;">{{ 'TBD' }}</h5>
                                            @endif

                                        </div>

                                        <div class="teamVs">

                                            <h5>VS</h5>

                                        </div>

                                        <div class="secondTeam teamCard">

                                            @if ($upcoming_match)
                                                @if (!empty($upcoming_match->second_team_id))
                                                    <img src="{{ asset('storage/images/team_logo/' . $upcoming_match->second_team_id->logo) }}"
                                                        alt="" class="img-fluid">
                                                @else
                                                    {{ ' ' }}
                                                @endif
                                            @else
                                                <img src="{{ asset('dist/images/no-image.png') }}" alt=""
                                                    class="img-fluid">
                                            @endif



                                            @if (!empty($upcoming_match->second_team_id))
                                                <h5 style="word-wrap: break-word;">
                                                    {{ $upcoming_match->second_team_id->name ? $upcoming_match->second_team_id->name : '' }}

                                                </h5>
                                            @else
                                                <h5 style="word-wrap: break-word;">{{ 'TBD' }}

                                                </h5>
                                            @endif

                                        </div>

                                    </div>

                                    <div class="matchTime d-flex justify-content-between">
                                        <div> {{ \Carbon\Carbon::parse($upcoming_match->date)->format('j F, Y') }}</div>
                                        <div>{{ \Carbon\Carbon::createFromFormat('H:i:s', $upcoming_match->time)->format('H:i') }}
                                                {{ ucfirst($upcoming_match->time_zone) }} ET</div>
                                    </div>

                                </div>
                            @endforeach
                        @else

                        @for ($i = 1; $i <= 5 ; $i++)
                        <div class="tabletwo">
                            <div class="matchTable align-items-center justify-content-center">
                                <div class="firstTeam teamCard">

                                    @if ($i == 1)
                                    <img src="{{ asset('front/img/team_logo/New-York-Gaints.png') }}" alt=""
                                    class="img-fluid">
                                        <h5 style="word-wrap: break-word;">{{ 'New York Giants' }}</h5>
                                    @endif

                                    @if ($i == 2)
                                    <img src="{{ asset('front/img/team_logo/Seahaws.png') }}" alt=""
                                    class="img-fluid">
                                        <h5 style="word-wrap: break-word;">{{ 'Seattle Seahawks' }}</h5>
                                    @endif
                                    @if ($i == 3)
                                    <img src="{{ asset('front/img/team_logo/Jets.png') }}" alt=""
                                    class="img-fluid">
                                        <h5 style="word-wrap: break-word;">{{ 'New York Jets' }}</h5>
                                    @endif
                                    @if ($i == 4)
                                    <img src="{{ asset('front/img/team_logo/Dolphins.png') }}" alt=""
                                    class="img-fluid">
                                        <h5 style="word-wrap: break-word;">{{ 'Miami Dolphins' }}</h5>
                                    @endif
                                    @if ($i == 5)
                                    <img src="{{ asset('front/img/team_logo/Patriots.png') }}" alt=""
                                    class="img-fluid">
                                        <h5 style="word-wrap: break-word;">{{ 'New England Patriots' }}</h5>
                                    @endif

                                </div>

                                <div class="teamVs">
                                    <h5>VS</h5>
                                </div>
                                <div class="secondTeam teamCard mt-1">

                                    @if ($i == 1)
                                    <img src="{{ asset('front/img/team_logo/AZ-Cardinals.png') }}" alt=""
                                    class="img-fluid">
                                        <h5  style="word-wrap: break-word;">{{ 'Arizona Cardinals' }} </h5>
                                    @endif

                                    @if ($i == 2)
                                    <img src="{{ asset('front/img/team_logo/Lions.png') }}" alt=""
                                    class="img-fluid">
                                        <h5 style="word-wrap: break-word;">{{ 'Detroit Lions' }}</h5>
                                    @endif
                                    @if ($i == 3)
                                    <img src="{{ asset('front/img/team_logo/Dallas-Cowboys.png') }}" alt=""
                                    class="img-fluid">
                                        <h5 style="word-wrap: break-word;">{{ 'Dallas-Cowboys' }}</h5>
                                    @endif
                                    @if ($i == 4)
                                    <img src="{{ asset('front/img/team_logo/Jaguars.png') }}" alt=""
                                    class="img-fluid">
                                        <h5 style="word-wrap: break-word;">{{ 'Jacksonville Jaguars' }}</h5>
                                    @endif
                                    @if ($i == 5)
                                    <img src="{{ asset('front/img/team_logo/Browns.png') }}" alt=""
                                    class="img-fluid">
                                        <h5 style="word-wrap: break-word;">{{ 'Cleveland Browns' }}</h5>
                                    @endif


                                </div>

                            </div>

                            <div class="matchTime d-flex justify-content-between">

                                <div>TBD</div>
                            </div>
                        </div>
                        @endfor
                        @endif
                    </div>
                </div>

                <div class="col-md-7">

                    <div class="leaderBoard">

                        <h2 style="color:{{ $colorSection['leaderboard']['header_color'] }};">

                            @if (!empty($leaderboardHeading->value))
                                {{ strtoupper($leaderboardHeading->value) }}
                            @else
                                LEADERBOARD
                            @endif
                        </h2>
                        <div class="tabletwo">
                            @php

                                $faker = Faker\Factory::create();

                                //random team logos

                                $logos = DB::table('teams')->pluck('logo');

                                $randomTeamLogo = ['AZ-Cardinals.png', 'Bears.png', 'Bengals.png', 'Bills.png', 'Broncos.png', 'Browns.png', 'Buccaneers.png', 'Chargers.png', 'Chiefs.png', 'Colts.png', 'Dolphins.png'];

                            @endphp

                            <div class="table-responsive">

                                <table class="table table-dark table-striped  tableBoard"
                                    style="background-color:{{ $colorSection['leaderboard']['bg_color'] }};color:{{ $colorSection['leaderboard']['text_color'] }};">

                                    <thead>

                                        <tr class="table-primary">

                                            <th scope="col" class="teamRegion">Region</th>

                                            <!-- <th scope="col" class="teamNumber"></th>                                              -->

                                            <th scope="col" class="text-start teamLogo"> Players</th>

                                            <th scope="col" class="teamName"> </th>

                                            <th scope="col" class="teamW">W</th>

                                            <th scope="col" class="teamL">L</th>

                                            <th scope="col" class="teamPts">PTS</th>

                                        </tr>

                                    </thead>

                                    {{-- {{dd($leader_board_regions_wise_users_results)}} --}}

                                    <tbody class="table-group-divider">

                                        @foreach ($leader_board_regions_wise_users_results as $regions => $players)
                                            @php $random_key = random_int(100000000, 9999999999); @endphp

                                            @if (count($players) == 0)
                                                @for ($i = $random_key; $i <= $random_key + 2; $i++)
                                                    @php

                                                        $players[$i]['user_name'] = $faker->name;

                                                        $players[$i]['team_logo'] = $logos[rand(0, 10)];

                                                        $players[$i]['user_points'] = ['win' => 0, 'loss' => 0];

                                                    @endphp
                                                @endfor
                                            @elseif(count($players) == 1)
                                                @for ($i = $random_key; $i <= $random_key + 1; $i++)
                                                    @php

                                                        $players[$i]['user_name'] = $faker->name;

                                                        $players[$i]['team_logo'] = $logos[rand(0, 10)];

                                                        $players[$i]['user_points'] = ['win' => 0, 'loss' => 0];

                                                    @endphp
                                                @endfor
                                            @elseif(count($players) == 2)
                                                @for ($i = $random_key; $i < $random_key + 1; $i++)
                                                    @php

                                                        $players[$i]['user_name'] = $faker->name;

                                                        $players[$i]['team_logo'] = $logos[rand(0, 10)];

                                                        $players[$i]['user_points'] = ['win' => 0, 'loss' => 0];

                                                    @endphp
                                                @endfor
                                            @endif

                                            @if ($players)
                                                @php $incrementor = 0; @endphp

                                                @foreach ($players as $player)
                                                    <tr>



                                                        @if ($loop->first)
                                                            <th class="teamRegion region_{{ $regions }}"
                                                                scope="row" rowspan="{{ sizeof($players) }}">

                                                                {{ $regions }}</th>
                                                        @endif

                                                        <td class="teamLogo">

                                                            @if ($player['team_logo'])
                                                                <img src="{{ asset('storage/images/team_logo/' . $player['team_logo']) }}"
                                                                    alt="{{ $player['team_logo'] }}" class="img-fluid">
                                                            @endif



                                                        </td>

                                                        <td class="teamName">

                                                            <span>{{ $player['user_name'] ?? '' }}</span>



                                                        </td>

                                                        <td class="teamW">{{ $player['user_points']['win'] }}</td>

                                                        <td class="teamL">{{ $player['user_points']['loss'] }}</td>

                                                        <td class="teamPts">{{ $player['user_points']['win'] }}</td>

                                                    </tr>
                                                @endforeach
                                            @endif
                                        @endforeach

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- player roster section --}}





    <section id="nextmatchBoard"
        style="background-image:url({{ asset('front/img/football-2-bg.jpg') }});color:{{ $colorSection['leaderboard']['text_color'] }};">

        <div class="container text-center">

            <div class="row">



                <div class="col-sm-12">

                    <div class="leaderBoard">

                        <h2 style="color:{{ $colorSection['players']['header_color'] }};">

                            @if (!empty($playerRosterHeading->value))
                                {{ strtoupper($playerRosterHeading->value) }}
                            @else
                                Player's Roster
                            @endif





                        </h2>

                        <br>

                        <h4 id="alphabets_links">

                            {{-- <span class="alphabets">A</span> / <span class="alphabets">B</span> /

                         <span class="alphabets">C</span> / <span class="alphabets">D</span> /

                         <span class="alphabets">E</span> / <span class="alphabets">F</span> /

                         <span class="alphabets">G</span> / <span class="alphabets">H</span> /

                         <span class="alphabets">I</span> / <span class="alphabets">J</span> /

                         <span class="alphabets">K</span> / <span class="alphabets">L</span> /

                         <span class="alphabets">M</span> / <span class="alphabets">N</span> /

                         <span class="alphabets">O</span> / <span class="alphabets">P</span> /

                         <span class="alphabets">Q</span> / <span class="alphabets">R</span> /

                         <span class="alphabets">S</span> / <span class="alphabets">T</span> /

                         <span class="alphabets">U</span> / <span class="alphabets">V</span> /

                         <span class="alphabets">W</span> / <span class="alphabets">X</span> /

                         <span class="alphabets">Y</span> / <span class="alphabets">Z</span> --}}



                            <a href="{{ url('player-standing/A') }}">A / </a>

                            <a href="{{ url('player-standing/B') }}">B / </a>

                            <a href="{{ url('player-standing/C') }}">C / </a>

                            <a href="{{ url('player-standing/D') }}">D / </a>

                            <a href="{{ url('player-standing/E') }}">E / </a>

                            <a href="{{ url('player-standing/F') }}">F / </a>

                            <a href="{{ url('player-standing/G') }}">G / </a>

                            <a href="{{ url('player-standing/H') }}">H / </a>

                            <a href="{{ url('player-standing/I') }}">I / </a>

                            <a href="{{ url('player-standing/J') }}">J / </a>

                            <a href="{{ url('player-standing/K') }}">K / </a>

                            <a href="{{ url('player-standing/L') }}">L / </a>

                            <a href="{{ url('player-standing/M') }}">M / </a>

                            <a href="{{ url('player-standing/N') }}">N / </a>

                            <a href="{{ url('player-standing/O') }}">O / </a>

                            <a href="{{ url('player-standing/P') }}">P / </a>

                            <a href="{{ url('player-standing/Q') }}">Q / </a>

                            <a href="{{ url('player-standing/R') }}">R / </a>

                            <a href="{{ url('player-standing/S') }}">S / </a>

                            <a href="{{ url('player-standing/T') }}">T / </a>

                            <a href="{{ url('player-standing/U') }}">U / </a>

                            <a href="{{ url('player-standing/V') }}">V / </a>

                            <a href="{{ url('player-standing/W') }}">W / </a>

                            <a href="{{ url('player-standing/X') }}">X / </a>

                            <a href="{{ url('player-standing/Y') }}">Y / </a>

                            <a href="{{ url('player-standing/Z') }}">Z </a>





                        </h4>

                        <div class="loader d-none">

                            <img height="100px" width="100px" src="{{ asset('front/img/orange_circles.gif') }}"
                                alt="loader">

                        </div>

                        <div class="tabletwo">



                            <div class="table-responsive">

                                <table class="table table-dark table-striped  tableBoard d-none" id="roaster-table">

                                    <thead>

                                        <tr class="table-primary">

                                            <th scope="col" class="teamNumber">Region</th>

                                            <th scope="col" class="teamNumber">N.</th>

                                            <th scope="col" colspan="2" class="text-start"> Players</th>

                                            <th scope="col">W</th>

                                            <th scope="col">L</th>

                                            <th scope="col">PTS</th>

                                        </tr>

                                    </thead>

                                    <tbody class="table-group-divider" id="table-data">

                                    </tbody>

                                </table>

                            </div>

                        </div>



                    </div>

                </div>

            </div>

        </div>

    </section>









    <section id="videoBoard" style="background-color:{{ $colorSection['video']['bg_color'] }};">

        <div class="container">

            <div class="row">

                <div class="col-12">

                    {{-- {{dd($videosHeading->value)}} --}}

                    <h2 style="color:{{ $colorSection['video']['header_color'] }};">
                        @if (!empty($videosHeading->value))
                            {{ strtoupper($videosHeading->value) }}
                        @else
                            VACATION PAC
                        @endif
                    </h2>

                    <div class="owl-carousel owl-videoslider">
                        {{-- @if (!empty($vacations)) --}}
                        @if ($vacations->isNotEmpty())
                            @foreach ($vacations as $vacation)
                                <div class="item">

                                    <div class="video-container" id="video-container">

                                        @php

                                            $get_imageName = $vacation->image_video;

                                            $get_extension = explode('.', $get_imageName);

                                            $ext = end($get_extension);

                                        @endphp

                                        @if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'svg' || $ext == 'webp')
                                            <img src="{{ asset('storage/images/vacation/' . $vacation->image_video) }}"
                                                alt="" height="100%" width="100%">
                                        @else
                                            <video width="250" height="250" loop="true" autoplay="autoplay"
                                                controls muted id="video" preload="metadata"
                                                poster="{{ asset('front/img/poster 1.png') }}">

                                                <source
                                                    src="{{ asset('storage/images/vacation/' . $vacation->image_video) }}"
                                                    type="video/mp4">

                                            </video>
                                        @endif



                                        <div class="play-button-wrapper">

                                            <div title="Play video" class="play-gif" id="circle-play-b">

                                                <!-- SVG Play Button -->

                                                {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80">

                                                <path

                                                    d="M40 0a40 40 0 1040 40A40 40 0 0040 0zM26 61.56V18.44L64 40z" />

                                            </svg> --}}

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            @endforeach
                        @else
                            <div class="item">
                                <div class="video-container" id="video-container">
                                    <img src="{{ asset('dist/images/no-image.png') }}" alt="" height="100%"
                                        width="100%">
                                    <div class="play-button-wrapper">
                                        <div title="Play video" class="play-gif" id="circle-play-b">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>

    </section>



    <!-- newssection -->

    <section id="newsPart" style="background-color:{{ $colorSection['news']['bg_color'] }};">

        <div class="container">

            <div class="row">

                <div class="col-12">

                    <h2 style="color:{{ $colorSection['news']['header_color'] }};">

                        @if (!empty($newsHeading->value))
                            {{ strtoupper($newsHeading->value) }}
                        @else
                            NEWS
                        @endif
                    </h2>

                    <div class="owl-carousel owl-videoslider owl-theme mt-10">

                        @if ($news->isNotEmpty())
                            @foreach ($news as $news_item)
                                <div class="newsBanner">

                                    <div class="mainImage">

                                        <img src="{{ asset('storage/images/news/' . $news_item->image) }}"
                                            alt="" class="img-fluid">

                                    </div>

                                    <div class="newsItemText">

                                        <div class="itemTextinner">

                                            <h6>{{ $news_item->title }}</h6>

                                            <div class="newsimgText d-flex align-items-center">

                                                <div class="imgRound me-3">

                                                    <img src="{{ asset('storage/images/news/' . $news_item->image) }}"
                                                        alt="" class="img-fluid">

                                                </div>

                                                <div class="textItem">

                                                    <h6>{{ $news_item->header }}</h6>

                                                    <span>{!! $news_item->description !!}</span>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            @endforeach
                        @else
                            <div class="newsBanner">
                                <div class="mainImage">
                                    <img src="{{ asset('dist/images/no-image.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Reviews section  ------------------Reviews section -------------------->

    <section id="testimonialPart" style="background-image:url({{ asset('front/img/testimonials_banner.jpg') }})">

        {{-- style="background-image:url(https://nfl.kloudexpert.com/front/img/testimonials_banner.jpg)"> --}}

        <div class="container">

            <div class="row">

                <div class="col-12">

                    <!-- <h2 id="reviews_head">Reviews</h2> -->

                    @if (!empty($reviewsHeading->value))
                        <h2 id="reviews_head">{{ strtoupper($reviewsHeading->value) }}</h2>
                    @else
                        <h2 id="reviews_head">Reviews</h2>
                    @endif

                </div>

            </div>



            <div class="row">

                <div class="col-12">

                    <div class="owl-carousel owl-testimonial owl-theme mt-10">

                        @forelse ($get_reviews as $review)
                            <div class="item">

                                <div class="testimonialPart">

                                    <i class="fa-solid fa-quote-left leftQuote"></i>

                                    <div class="nametestmoial text-center">

                                        {{-- <p class="review_name">{{$review->comment}}</p> --}}

                                        <p class="review_name">{!! \Str::words($review->comment, 10, ' ...') !!}</p>

                                    </div>



                                    <div class="ratingStar text-center">



                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i < $review->rating)
                                                <i class="fa-solid fa-star text-warning"></i>
                                            @else
                                                <i class="fa-solid fa-star"></i>
                                            @endif
                                        @endfor

                                    </div>

                                    <div class="namedesgination text-center review_name">

                                        <h6>- {{ $review->username }} -</h6>

                                    </div>

                                </div>

                            </div>

                        @empty

                            <div class="item">

                                <div class="testimonialPart">

                                    <i class="fa-solid fa-quote-left leftQuote"></i>

                                    <div class="nametestmoial text-center">

                                        <p>No Review Found</p>

                                    </div>

                                    {{-- <div class="ratingStar text-center">

                                <i class="fa-solid fa-star"></i>

                                <i class="fa-solid fa-star"></i>

                                <i class="fa-solid fa-star"></i>

                                <i class="fa-solid fa-star"></i>

                                <i class="fa-solid fa-star"></i>

                            </div> --}}

                                    {{-- <div class="namedesgination text-center">

                                <h6>- ELENA GILBERT -</h6>

                            </div> --}}

                                </div>

                            </div>
                        @endforelse





                        {{-- <div class="item">

                        <div class="testimonialPart">

                            <i class="fa-solid fa-quote-left leftQuote"></i>

                            <div class="nametestmoial text-center">

                                <p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem

                                    Ipsum has been the

                                    industry's standard dummy text ever</p>

                            </div>

                            <div class="ratingStar text-center">

                                <i class="fa-solid fa-star"></i>

                                <i class="fa-solid fa-star"></i>

                                <i class="fa-solid fa-star"></i>

                                <i class="fa-solid fa-star"></i>

                                <i class="fa-solid fa-star"></i>

                            </div>

                            <div class="namedesgination text-center">

                                <h6>- ELENA GILBERT -</h6>

                            </div>

                        </div>

                    </div>



                    <div class="item">

                        <div class="testimonialPart">

                            <i class="fa-solid fa-quote-left leftQuote"></i>

                            <div class="nametestmoial text-center">

                                <p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem

                                    Ipsum has been the

                                    industry's standard dummy text ever</p>

                            </div>

                            <div class="ratingStar text-center">

                                <i class="fa-solid fa-star"></i>

                                <i class="fa-solid fa-star"></i>

                                <i class="fa-solid fa-star"></i>

                                <i class="fa-solid fa-star"></i>

                                <i class="fa-solid fa-star"></i>

                            </div>

                            <div class="namedesgination text-center">

                                <h6>- ELENA GILBERT -</h6>

                            </div>

                        </div>

                    </div> --}}



                        {{-- <div class="item">

                        <div class="testimonialPart">

                            <i class="fa-solid fa-quote-left leftQuote"></i>

                            <div class="nametestmoial text-center">

                                <p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem

                                    Ipsum has been the

                                    industry's standard dummy text ever</p>

                            </div>

                            <div class="ratingStar text-center">

                                <i class="fa-solid fa-star"></i>

                                <i class="fa-solid fa-star"></i>

                                <i class="fa-solid fa-star"></i>

                                <i class="fa-solid fa-star"></i>

                                <i class="fa-solid fa-star"></i>

                            </div>

                            <div class="namedesgination text-center">

                                <h6>- ELENA GILBERT -</h6>

                            </div>

                        </div>

                    </div> --}}





                    </div>

                </div>

            </div>



        </div>





    </section>



    <style type="text/css">
        /* players roatsers css  */

        #alphabets_links {

            color: <?php echo $colorSection['players']['text_color']; ?>;

        }



        #nextmatchBoard {

            background-color: <?php echo $colorSection['players']['button_color']; ?>;

        }



        /* rewiews page css */

        #reviews_head {

            color: <?php echo $colorSection['reviews']['header_color']; ?>;

        }



        .review_name {

            color: <?php echo $colorSection['reviews']['text_color']; ?>;

        }







        #heroBanner .btn-primary:before {

            background-color: <?php echo $colorSection['header']['button_color']; ?>;

        }



        #heroBanner .btn-primary:after {

            background-color: <?php echo $colorSection['header']['button_color']; ?>;

        }



        #heroBanner .owl-nav button span {

            background-color: <?php echo $colorSection['header']['button_color']; ?>;

        }



        #heroBanner .owl-nav button.owl-prev span:after {

            background: <?php echo $colorSection['header']['button_color']; ?>;

        }



        #heroBanner .owl-nav button.owl-next span:after {

            background: <?php echo $colorSection['header']['button_color']; ?>;

        }



        #matchBoard .team-vs .secondBoard:before {

            background: <?php echo $colorSection['scoreboard']['button_color']; ?>;

        }



        #nextmatchBoard .matchTable .teamVs {

            background-color: <?php echo $colorSection['leaderboard']['button_color']; ?>;

            ;

        }



        #nextmatchBoard .matchTable {

            background-color: <?php echo $colorSection['leaderboard']['bg_color']; ?>;

            border-top: <?php echo $colorSection['leaderboard']['button_color']; ?>;

        }



        #nextmatchBoard .matchTime a {

            color: <?php echo $colorSection['leaderboard']['text_color']; ?>;

        }



        #nextmatchBoard .table-primary {

            --bs-table-bg: <?php echo $colorSection['leaderboard']['button_color']; ?>;

        }



        #nextmatchBoard .table-striped>tbody>tr:nth-of-type(odd)>* {

            color: <?php echo $colorSection['leaderboard']['text_color']; ?>;

        }



        #nextmatchBoard .table-dark {

            color: <?php echo $colorSection['leaderboard']['text_color']; ?>;

        }



        #nextmatchBoard .table-primary {

            color: <?php echo $colorSection['leaderboard']['text_color']; ?>;

        }



        /* #nextmatchBoard .table>:not(caption)>*>* {

            background-color: <?php echo $colorSection['leaderboard']['bg_color']; ?>;

          }*/







        #videoBoard h2:before {

            background: <?php echo $colorSection['video']['button_color']; ?>;

        }



        #videoBoard .owl-nav button span {

            background-color: <?php echo $colorSection['video']['button_color']; ?>;

        }



        #videoBoard .owl-nav button.owl-prev span:after {

            background: <?php echo $colorSection['video']['button_color']; ?>;

        }



        #videoBoard .owl-nav button.owl-next span:after {

            background: <?php echo $colorSection['video']['button_color']; ?>;

        }



        #newsPart h2:before {

            background: <?php echo $colorSection['news']['button_color']; ?>;

        }



        #newsPart .owl-nav button span {

            background-color: <?php echo $colorSection['news']['button_color']; ?>;

        }



        #newsPart .owl-nav button.owl-prev span:after {

            background: <?php echo $colorSection['news']['button_color']; ?>;

        }



        #newsPart .owl-nav button.owl-next span:after {

            background: <?php echo $colorSection['news']['button_color']; ?>;

        }



        #newsPart .newsBanner .newsItemText {

            color: <?php echo $colorSection['news']['text_color']; ?>;



        }



        .table-striped>tbody>tr:nth-of-type(odd)>th {

            --bs-table-accent-bg: #44455b;

        }





        /*  */



        .matchTable .teamCard h5 {

            min-height: 48px;

        }

        @media (min-width:1367px) {

            .matchTable img.img-fluid {

                margin-bottom: 7px;

            }



        }



        @media (max-width:1366px) {

            .tabletwo .tableBoard tr {

                height: 57.7px;

            }

        }
    </style>

@endsection
