@extends('front.layout.app')
@section('content')
    <style>
        .aSidebarCard {
            background-color: #fff;
            border-radius: 7px;
            padding: 20px 0;
            color: #333;
        }

        .aSidebarCard {
            text-align: left;
        }

        .aSidebarCard h4 {
            font-size: 20px;
            margin-bottom: 25px;
            padding: 0 20px;
        }

        .aSidebarCard h4>span {
            border-bottom: 3px solid #db9a29;
            padding-bottom: 3px;
            display: inline-block;
        }

        ul.sidebarLink {
            list-style: none;
            padding: 0px;
            border-top: 1px solid #eee;
            margin-bottom: 0;
        }

        ul.sidebarLink li+li {
            border-top: 1px solid #eee;
        }

        ul.sidebarLink li a {
            padding: 8px 20px;
            display: block;
            text-decoration: none;
            color: #333;
            position: relative;
            z-index: 1;
        }

        ul.sidebarLink li a:hover {
            color: #fff;
        }

        ul.sidebarLink li a:before {
            left: 0;
            position: absolute;
            content: "";
            background-color: #db9a29;
            top: 0;
            z-index: -1;
            height: 100%;
            transition: 0.5s;
            min-width: 0;
            opacity: 0;
        }

        ul.sidebarLink li a:hover:before {
            min-width: calc(100% + 0px);
            opacity: 1;
        }

        .btn.pickTeam {
            line-height: 20px;
            display: flex;
            align-items: center;
            margin-left: auto;
        }

        .btn.pickTeam .bi-check {
            font-size: 28px;
            color: rgb(0, 128, 55);
            line-height: 27px;
            display: inline-flex;

        }

        .btn.pickTeam .bi-check[class*=" bi-"]::before {
            line-height: 20px;
        }

        #nextmatchBoard .table-dark tr td.tdTeamBtnCheck {
            text-align: right;
            padding-right: 30px;
            width: 170px;
        }

        .week {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .week .week-data {
            padding: 3px 10px;
            background-color: #fff;
            border-radius: 3px;
            margin: 0 5px;
            color: #111;
        }

        .week .week-data.activeWeek {
            background-color: #db9a29;
        }

        @media (min-width: 768px) {
            .tablePickTeam {
                padding-right: 30px;
            }
        }
    </style>

    <section id="nextmatchBoard"
        style="background-image:url({{ asset('front/img/football-2-bg.jpg') }});color:{{ $colorSection['leaderboard']['text_color'] }};">
        <div class="container-fluid text-center">
            <div class="row">

                <div class="col-sm-12">
                    <h2 style="color:{{ $colorSection['leaderboard']['header_color'] }};">
                        Pick a Team
                    </h2>

                    <div class="leaderBoard">

                        <br>

                        <div class="loader d-none">
                            <img height="100px" width="100px" src="{{ asset('front/img/orange_circles.gif') }}"
                                alt="loader">
                        </div>
                    </div>
                </div>

                {{-- <div class="col-sm-4 col-md-3">
                    <div class="aSidebar">
                        <div class="aSidebarCard">
                            <h4><span>SideBar</span></h4>
                            <ul class="sidebarLink">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">User profile</a></li>
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Dashboard</a></li>
                            </ul>


                        </div>
                    </div>

                </div> --}}
                @include('front.layout.sidebar')
                <div class="col-sm-10 col-md-9">
                    @if (Session::has('success'))
                        <span class="alert alert-success">{{ Session::get('success') }}</span>
                    @endif
                    @if (Session::has('error'))
                        <span class="alert alert-danger">{{ Session::get('error') }}</span>
                        <a href="{{ route('payment') }}">Click here to Pay</a>
                    @endif
                    <div class="tablePickTeam">
                        <div class="table-responsive" id="rosterTable">

                            <table class="table table-dark table-striped  tableBoard" id="roaster-table">

                                <thead>
                                    <tr class="table-primary">
                                        {{-- <th scope="col">Week</th> --}}
                                        <th scope="col" colspan="2" class="">Team</th>
                                        <th scope="col" class="text-center teamBtnCheck">Action </th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">

                                    @foreach ($fixture as $key => $fix)
                                        <tr class="intro-x">

                                            <td>week {{ $key }} </td>

                                        </tr>
                                        <tr class="intro-x">

                                            @foreach ($fix as $k => $f)
                                                @if ($key == $f->week)
                                                @endif
                                        <tr class="intro-x">
                                            <td>
                                                @if (!empty($f->first_team_id))
                                                    <img src="{{ $f->first_team_id->image }}" alt="" height="50px"
                                                        width="100px">
                                                @else
                                                    <img src="{{ asset('dist/images/no-image.png') }}" alt=""
                                                        class="img-fluid">
                                                @endif

                                            </td>

                                            <td class="text-center">{{ $f->first_team_id->name }}</td>
                                            <td class="text-center">
                                                {{-- <button class="btn btn-primary teamPick" data="{{ auth()->user()->id }}"
                                                    season-id="{{ $f->season_id }}" team-id="{{ $f->first_team_id->id }}"
                                                    week="{{ $key }}">Pick Team</button> --}}
                                                @if (isSelected($f->season_id, $key) == false)
                                                    <form action="{{ route('pickTeam') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="team"
                                                            value="{{ $f->first_team_id->id }}">
                                                        <input type="hidden" name="season" value="{{ $f->season_id }}">
                                                        <input type="hidden" name="week" value="{{ $key }}">
                                                        <button type="submit" class="btn btn-primary">Pick Team</button>
                                                    </form>
                                                    @else
                                                    <button class="btn btn-primary">Already Picked</button>
                                                @endif

                                            </td>
                                        </tr>
                                        <tr class="intro-x">
                                            <td>
                                                @if (!empty($f->second_team_id))
                                                    <img src="{{ $f->second_team_id->image }}" alt=""
                                                        height="50px" width="100px">
                                                @else
                                                    <img src="{{ asset('dist/images/no-image.png') }}" alt=""
                                                        class="img-fluid">
                                                @endif

                                            </td>

                                            <td class="text-center">{{ $f->second_team_id->name }}</td>
                                            <td class="text-center">
                                                @if (isSelected($f->season_id, $key) == false)
                                                <form action="{{ route('pickTeam') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="team"
                                                        value="{{ $f->second_team_id->id }}">
                                                    <input type="hidden" name="season" value="{{ $f->season_id }}">
                                                    <input type="hidden" name="week" value="{{ $key }}">
                                                    <button type="submit" class="btn btn-primary">Pick Team</button>
                                                </form>
                                                @else
                                                <button class="btn btn-primary">Already Picked</button>
                                                @endif
                                        </tr>
                                    @endforeach
                                    @endforeach

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

@section('script')
    <script>
        $('.teamPick').click(function teamPick() {
            let user_id = $(this).attr('data');
            let team_id = $(this).attr('team-id');
            let season_id = $(this).attr('season-id');
            let week = $(this).attr('week');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'post',
                url: '/pickTeam',
                data: {
                    id: user_id,
                    season_id: season_id,
                },
                success: function(response) {
                    //console.log(response);
                    if (response.status == false && response.plan == '') {
                        swal({
                                title: `Subscribe first to pick the team`,
                                text: "",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    window.location.href = "{{ route('payment') }}";
                                }
                            });
                    } else if (response.status == false && response.plan == 'expired') {
                        swal({
                                title: `Your Plan is Expired pay first`,
                                text: "",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    window.location.href = "{{ route('payment') }}";
                                }
                            });
                    } else {
                        $.ajax({
                            method: 'post',
                            url: '/selectTeam',
                            data: {
                                user_id: user_id,
                                team_id: team_id,
                                season_id: season_id,
                                week: week
                            },
                            success: function(response) {
                                console.log(response);
                                if (response.status == 200 && response.select ==
                                    'already') {
                                    swal({
                                        title: `Team is already selected for week ${week}`,
                                        text: "",
                                        icon: "warning",
                                        buttons: true,
                                        dangerMode: true,
                                    })
                                } else if (response.status == 200 && response.select ==
                                    '') {
                                    window.location.href = "{{ route('dashboard') }}";
                                } else {
                                    window.location.href = "{{ route('teams') }}";
                                }
                            }
                        });
                    }
                }
            });
        });
    </script>
@endsection
