@extends('front.layout.app')
<style>
    .test {
        background: rgb(9, 106, 252);
    }
</style>
@section('content')

    <section id="nextmatchBoard"
        style="background-image:url({{ asset('front/img/football-2-bg.jpg') }});color:{{ $colorSection['leaderboard']['text_color'] }};">
        <div class="container-fluid">
            <div class="row">

                <div class="leaderBoard d-none">
                    <div class="loader">
                        <img height="100px" width="100px" src="{{ asset('front/img/orange_circles.gif') }}" alt="loader">
                    </div>
                </div>

                @include('front.layout.user_layout.user_sidebar')
                <div class="col-sm-8 col-md-9">
                    <h2 class="mb-3 text-center" style="color:{{ $colorSection['leaderboard']['header_color'] }};">
                        Pick The Team
                    </h2>

                    {{-- @if (isset($fixtures)) --}}
                    <div class="headerMenu row">
                        @if (session()->has('success'))
                            <div class="alert alert-success show flex items-center mb-2 alert_messages" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-check2-circle" viewBox="0 0 16 16">
                                    <path
                                        d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                                    <path
                                        d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                                </svg>
                                &nbsp; {{ session()->get('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger show flex items-center mb-2" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2">
                                    <polygon
                                        points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                    </polygon>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                                {{ session('error') }}
                                <a href="{{ route('payment') }}">Click here to Pay</a>
                            </div>
                        @endif
                        @if (session('select-error'))
                            <div class="alert alert-danger show flex items-center mb-2 alert_messages" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2">
                                    <polygon
                                        points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                    </polygon>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                                {{ session('select-error') }}
                            </div>
                        @endif
                        <div class="col">
                            <h5 class="seasonFixed" style="color:#fff" id="">Season:
                                {{ $c_season->season_name ?? '' }}
                            </h5>
                        </div>
                        <div class="col">

                            @if (isset($fixtures))
                                @foreach ($fixtures as $week => $data)
                                    <h5 style="color:#fff" id="set_week" class="seasonFixed selectWeekPart">Week :
                                        {{ $week }}</h5>
                                @endforeach
                            @else
                                {{ '' }}
                            @endif

                        </div>

                        <div class="fixtureForms col">
                            <form action="{{ url('teams') }}" method="get" class="seasonFixed formSpacing">
                                <div class="inner_form">
                                    <label for=""
                                        style="color:#fff; margin-right:10px; font-weight:800; font-size: 20px; font-family: 'Oxanium', 'cursive';">Seasons:
                                    </label>
                                    <select class="form-control" name="seasons" id="seasons">

                                        @if (isset($get_all_seasons) && $get_all_seasons->isNotEmpty())
                                            @foreach ($get_all_seasons as $season)
                                                <option value="{{ $season->id ?? '' }}"
                                                    {{ $c_season->id == $season->id ? 'selected' : '' }}>
                                                    {{ $season->season_name }}</option>
                                            @endforeach
                                        @endif

                                        <i class="fa-solid fa-angle-down"></i>
                                    </select>
                                </div>
                            </form>
                        </div>
                        {{-- for weeks --}}
                        <div class="col">
                            <form action="{{ url('teams') }}" method="get" class="seasonFixed ">
                                <div class="inner_form">
                                    {{-- @csrf --}}
                                    <input type="hidden" value="{{ $c_season->id ?? '' }}" name="seasons">
                                    {{-- <input type="hidden" value="{{ $c_season->id ?? '' }}" name="season_id"> --}}
                                    <label for=""
                                        style="color:#fff; margin-right:10px; font-weight:800; font-size: 20px; font-family: 'Oxanium', 'cursive';">Weeks:
                                    </label>
                                    <select class="form-control" name="weeks" id="weeks">
                                        @for ($i = 1; $i <= 18; $i++)
                                            <option value="{{ $i }}"
                                                @php if( request()->query('weeks') == $i){ echo "selected"; } @endphp>Week
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-dark table-striped text-center  tableBoard">
                                    <thead>
                                        <tr class="table-primary">
                                            <th scope="col" colspan="3">Match</th>
                                            <th scope="col" class="matchFColDate">Date</th>
                                            <th scope="col" class="matchFColTime">Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($fixtures) && $fixtures->isNotEmpty())
                                            @foreach ($fixtures as $week => $weakData)
                                                <tr>
                                                    <td style="color: #db9a29;font-weight:bold;" colspan="3">Week :
                                                        {{ $week }}</td>
                                                    <td class="matchFColDate"></td>
                                                    <td class="matchFColTime"></td>
                                                </tr>
                                                @foreach ($weakData as $weaks => $team)
                                                    {{-- {{dd($team->first_team_id->name)}} --}}
                                                    @if (!empty($team->first_team_id) && !empty($team->second_team_id))
                                                        @php
                                                            $formatted_first_team_name = str_replace(' ', '_', $team->first_team_id->name);
                                                        @endphp
                                                        @php
                                                            $formatted_second_team_name = str_replace(' ', '_', $team->second_team_id->name);
                                                        @endphp
                                                    @else
                                                        @php
                                                            $formatted_first_team_name = 'TBD';
                                                        @endphp

                                                        @php
                                                            $formatted_second_team_name = 'TBD';
                                                        @endphp
                                                    @endif
                                                    {{-- {{dd($formatted_team_name)}} --}}
                                                    @if ($week == $team->week)
                                                        <tr>
                                                            <td>

                                                                @if (!empty($team->first_team_id))
                                                                    <img src="{{ asset('storage/images/team_logo/' . $team->first_team_id->logo) }}"
                                                                        alt="" class="img-fluid">
                                                                @else
                                                                    {{ '' }}
                                                                @endif

                                                                <div style="">
                                                                    @if (!empty($team->first_team_id))
                                                                        {{ $team->first_team_id->name }}
                                                                    @else
                                                                        {{ 'TBD' }}
                                                                    @endif

                                                                </div>

                                                                @if (\Carbon\Carbon::now() > $team->season->ending)
                                                                    {{ '' }}
                                                                @else
                                                                    @if (!empty($team->first_team_id))
                                                                        @if (get_selected_teams($team->first_team_id->id, $team->season_id, $team->id, $team->week))
                                                                            <button disabled
                                                                                style="background:none;  border:none; color:#2c9412"
                                                                                class="btn btn-selected-team my-4"
                                                                                @if ($upcoming_week > $team->date) upcoming_selectable_week = "true"
                                                                                    @else
                                                                                    upcoming_selectable_week = "false" @endif
                                                                                @if ($upcoming_season_date < $team->date) fixture_id={{ $team->id }}
                                                                            team_id={{ $team->first_team_id->id }}
                                                                            season_id={{ $team->season_id }}
                                                                            week={{ $team->week }}
                                                                            teamName={{ $formatted_first_team_name }}
                                                                            first_teamName={{ $formatted_first_team_name }}
                                                                            second_teamName={{ $formatted_second_team_name }}
                                                                            fixture_date={{ $team->date }}
                                                                            fixture_time={{ \Carbon\Carbon::createFromFormat('H:i:s', $team->time)->format('H:i') }}{{ $team->time_zone }} @endif>
                                                                                {{ 'Picked Team' }}
                                                                            </button>
                                                                        @else
                                                                            <button
                                                                                style="background:none;  border:none; color:#212529"
                                                                                class="btn btn-primary my-4 team_name"
                                                                                @if ($upcoming_week > $team->date) upcoming_selectable_week = "true"
                                                                                    @else
                                                                                    upcoming_selectable_week = "false" @endif
                                                                                @if ($upcoming_season_date < $team->date) fixture_id={{ $team->id }}
                                                                            team_id={{ $team->first_team_id->id }}
                                                                            season_id={{ $team->season_id }}
                                                                            week={{ $team->week }}
                                                                            teamName={{ $formatted_first_team_name }}
                                                                            first_teamName={{ $formatted_first_team_name }}
                                                                            second_teamName={{ $formatted_second_team_name }}
                                                                            first_team_name={{ $formatted_first_team_name }}
                                                                            fixture_date={{ $team->date }}
                                                                            fixture_time={{ \Carbon\Carbon::createFromFormat('H:i:s', $team->time)->format('H:i') }}{{ $team->time_zone }} @endif>
                                                                                {{ 'Pick Team' }}
                                                                            </button>
                                                                        @endif
                                                                    @else
                                                                        {{ ' ' }}
                                                                    @endif
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="versis">
                                                                    <h5>VS</h5>
                                                                </div>

                                                                <div class="d-md-none">
                                                                    <span class="matchFixtureDate" data-title="Date">
                                                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $team->date)->format('M d , Y') }}</span>
                                                                    <span class="matchFixtureTime"
                                                                        data-title="Time">{{ \Carbon\Carbon::createFromFormat('H:i:s', $team->time)->format('H:i') }}{{ $team->time_zone }}</span>
                                                                </div>
                                                            </td>
                                                            <td>

                                                                @if (!empty($team->second_team_id))
                                                                    <img src="{{ asset('storage/images/team_logo/' . $team->second_team_id->logo) }}"
                                                                        alt="" class="img-fluid">
                                                                @else
                                                                    {{ ' ' }}
                                                                @endif

                                                                <div style="">
                                                                    @if (!empty($team->second_team_id))
                                                                        {{ $team->second_team_id->name }}
                                                                    @else
                                                                        {{ 'TBD ' }}
                                                                    @endif
                                                                </div>
                                                                @if (\Carbon\Carbon::now() > $team->season->ending)
                                                                    {{ '' }}
                                                                @else
                                                                    @if (!empty($team->second_team_id))
                                                                        @if (get_selected_teams($team->second_team_id->id, $team->season_id, $team->id, $team->week))
                                                                            <button disabled
                                                                                class="btn btn-selected-team my-4"
                                                                                style="background:none;  border:none;  color:#2c9412"
                                                                                @if ($upcoming_week > $team->date) upcoming_selectable_week = "true"
                                                                                    @else
                                                                                    upcoming_selectable_week = "false" @endif
                                                                                @if ($upcoming_season_date < $team->date) fixture_id={{ $team->id }}
                                                                            team_id={{ $team->second_team_id->id }}
                                                                            season_id={{ $team->season_id }}
                                                                            week={{ $team->week }}
                                                                            teamName={{ $formatted_second_team_name }}
                                                                            first_teamName={{ $formatted_first_team_name }}
                                                                            second_teamName={{ $formatted_second_team_name }}
                                                                            fixture_date={{ $team->date }}
                                                                            fixture_time={{ \Carbon\Carbon::createFromFormat('H:i:s', $team->time)->format('H:i') }}{{ $team->time_zone }} @endif>
                                                                                {{ 'Picked Team' }}
                                                                            </button>
                                                                        @else
                                                                            <button class="btn btn-primary my-4 team_name"
                                                                                style="background:none;  border:none; color:#212529"
                                                                                @if ($upcoming_week > $team->date) upcoming_selectable_week = "true"
                                                                                    @else
                                                                                    upcoming_selectable_week = "false" @endif
                                                                                @if ($upcoming_season_date < $team->date) fixture_id={{ $team->id }}
                                                                            team_id={{ $team->second_team_id->id }}
                                                                            season_id={{ $team->season_id }}
                                                                            week={{ $team->week }}
                                                                            teamName={{ $formatted_second_team_name }}
                                                                            first_teamName={{ $formatted_first_team_name }}
                                                                            second_teamName={{ $formatted_second_team_name }}
                                                                            fixture_date={{ $team->date }}
                                                                            fixture_time={{ \Carbon\Carbon::createFromFormat('H:i:s', $team->time)->format('H:i') }}{{ $team->time_zone }} @endif>
                                                                                {{ 'Pick Team' }}
                                                                            </button>
                                                                        @endif
                                                                    @else
                                                                        {{ ' ' }}
                                                                    @endif
                                                                @endif
                                                            </td>
                                                            </td>

                                                            <td class="matchFColDate"> <span
                                                                    class="matchFixtureDate">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $team->date)->format('M d , Y') }}</span>
                                                            </td>
                                                            @if ($team->time == '12:00:00' && ($team->time_zone = 'am'))
                                                                <td class="matchFColTime"><span
                                                                        class="matchFixtureTime">TBD
                                                                </td>
                                                            @else
                                                                <td class="matchFColTime"><span
                                                                        class="matchFixtureTime">{{ \Carbon\Carbon::createFromFormat('H:i:s', $team->time)->format('H:i') }}{{ ucfirst($team->time_zone) }}
                                                                        ET</span> </td>
                                                            @endif
                                                            </td>


                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach


                                        @else
                                        <tr><td colspan="5">No Data Found</td></tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{-- @else --}}

                    {{-- @include('no-data-found')
                    @endif --}}
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- Modal -->
    {{-- <div class="modal fade" id="selectTeam" tabindex="-1" aria-labelledby="selectTeamLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="teamSelectedMsg">
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary pr-4" data-bs-dismiss="modal" id="close_btn">Are You
                        sure</button>
                    <button type="button" class="btn btn-secondary pr-4" data-bs-dismiss="modal"
                        id="close_btn">Close</button>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Modal -->
    <div class="modal fade" id="SeasonExpireModal" tabindex="-1" aria-labelledby="selectTeamLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="expire_season_msg">fgdf
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary pr-4" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        jQuery(function() {
            jQuery('#seasons').change(function() {
                this.form.submit();
            });

            jQuery('#weeks').change(function() {
                this.form.submit();
            });

            //for testing

            $('.team_name').click(function() {
                let attr = $(this).attr('fixture_id');
                if (typeof attr == 'undefined') {
                    Swal.fire({
                        title: 'Time over ',
                        html: "Your Time to pick the team for week is over . You can pick the team <span style='color:#f27474'> before Thursday 12:00 AM </span> . You can still pick the team for next week.Good Luck",
                        icon: 'error',
                    });

                    return false;

                }

                let upcoming_selectable_week = $(this).attr('upcoming_selectable_week');
                // console.log(upcoming_selectable_week);
                if (upcoming_selectable_week != 'true') {
                    Swal.fire({
                        title: "Can't pick the team in advance ! ",
                        html: "You can pick the team before the week start. Please wait for the week to come.",
                        icon: 'error',
                    });

                    return false;

                }


                let season_id = $(this).attr('season_id');
                let fixture_id = $(this).attr('fixture_id');
                let team_id = $(this).attr('team_id');
                let teamName = $(this).attr('teamName');
                formatted_team_name = teamName.replace(/_/g, ' ');

                let first_teamName = $(this).attr('first_teamName');
                formatted_first_team_name = first_teamName.replace(/_/g, ' ');

                let second_teamName = $(this).attr('second_teamName');
                formatted_second_team_name = second_teamName.replace(/_/g, ' ');

                let fixture_date = $(this).attr('fixture_date');
                let fixture_time = $(this).attr('fixture_time');
                let week = $(this).attr('week');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    // url: '/check_user',
                    url: '/check_user_subscribe',
                    data: {
                        season_id: season_id,
                        fixture_id: fixture_id,
                        team_id: team_id,
                        week: week
                    },
                    success: function(resp) {
                        let url = "payment";
                        let coupon_url = "coupon";
                        if (resp.status == false) {
                            Swal.fire({
                                // title: 'Please subscribe first ?',
                                icon: 'warning',
                                showCancelButton: true,
                                html: `Please <a href="${url}">Subscribe!</a> or <a href="${coupon_url}">use the coupon !</a> To pick the team`

                            });
                        } else {
                            Swal.fire({
                                title: 'Are you sure?',
                                html: "Do you really want to pick the <span style='color:#3085d6'>" +
                                    formatted_team_name +
                                    " </span> team for the nfl battle between <span style='color:#3085d6'>" +
                                    formatted_first_team_name +
                                    "</span> and <span style='color:#3085d6'>" +
                                    formatted_second_team_name + " </span>?",
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, Pick it!'
                            }).then((result) => {
                                if (result.isConfirmed) {

                                    $.ajax({
                                        type: 'POST',
                                        // url: '/check_user',
                                        url: '/dashboard_team_pick',
                                        data: {
                                            season_id: season_id,
                                            fixture_id: fixture_id,
                                            team_id: team_id,
                                            week: week
                                        },
                                        success: function(resp) {
                                            console.log(resp);

                                            //check if user is selecting the team on the day of match
                                            if (resp.message ==
                                                'Time_is_over_for_thursday_12AM'
                                            ) {
                                                Swal.fire({
                                                    title: 'Your Time is over ',
                                                    html: "Your Time is over to pick the team for week " +
                                                        week +
                                                        "  as you can pick the team <span style='color:#f27474'> till Thursday 12:00 AM </span> .  You will receive <span style='color:#f27474'> loss </span> for this week . You can pick the team from next week .  ",
                                                    icon: 'error',
                                                    // showCancelButton: true,


                                                });
                                                setTimeout(() => {
                                                    location
                                                        .reload();
                                                }, 6000);
                                            }

                                            //User can't select previous weeks
                                            if (resp.message ==
                                                'Time_is_over_to_select_previous_weeks'
                                            ) {
                                                Swal.fire({
                                                    title: 'Your Time is over !',
                                                    html: "Can't select previous week. Your Time is over to pick the team for week " +
                                                        week +
                                                        " . You will receive <span style='color:#f27474'> loss </span> for this week . You can pick the team from next week .",
                                                    icon: 'error',
                                                    // showCancelButton: true,


                                                });
                                                setTimeout(() => {
                                                    location
                                                        .reload();
                                                }, 5000);
                                            }

                                            if (resp.message ==
                                                'Cannot_select_next_to_next_week'
                                            ) {
                                                Swal.fire({
                                                    title: "Can't pick the team in advance!",
                                                    html: "You can't pick the team from week <span style='color:#f27474'> " +
                                                        week +
                                                        " </span> before it's starts. Please wait for the week to come.",
                                                    icon: 'error',
                                                    // showCancelButton: true,


                                                });
                                                setTimeout(() => {
                                                    location
                                                        .reload();
                                                }, 6000);
                                            }

                                            if (resp.message == 'update') {
                                                Swal.fire({
                                                    title: 'Your Pick team has been updated',
                                                    html: "You have pick <span style='color:#3085d6'>" +
                                                        formatted_team_name +
                                                        " </span> team for  week <span style='color:#3085d6'>" +
                                                        week +
                                                        " </span> on <span style='color:#3085d6'>" +
                                                        fixture_date +
                                                        " </span> at <span style='color:#3085d6'>" +
                                                        fixture_time +
                                                        " </span> ",
                                                    icon: 'success',
                                                    // showCancelButton: true,


                                                });
                                                setTimeout(() => {
                                                    location
                                                        .reload();
                                                }, 5000);
                                            }
                                            if (resp.message == 'added') {
                                                Swal.fire({
                                                    title: 'You have pick the team',
                                                    html: "You have pick <span style='color:#3085d6'>" +
                                                        formatted_team_name +
                                                        " </span> team for  week <span style='color:#3085d6'>" +
                                                        week +
                                                        " </span> on <span style='color:#3085d6'>" +
                                                        fixture_date +
                                                        " </span> at <span style='color:#3085d6'>" +
                                                        fixture_time +
                                                        " </span>",
                                                    icon: 'success',
                                                    // showCancelButton: true,

                                                });
                                                setTimeout(() => {
                                                    location
                                                        .reload();
                                                }, 5000);
                                            }

                                            // else{
                                            //     location.reload();
                                            // }
                                        }
                                    });

                                } else {
                                    console.log('not');
                                }
                            });
                        }
                    }
                });

            });
            //end testing here






            /* $('.team_name').click(function() {



                 // Swal.fire({
                 //     title: 'Are you sure?',
                 //     text: "You won't be able to revert this!",
                 //     icon: 'warning',
                 //     showCancelButton: true,
                 //     confirmButtonColor: '#3085d6',
                 //     cancelButtonColor: '#d33',
                 //     confirmButtonText: 'Yes, delete it!'
                 // }).then((result) => {
                 //     if (result.isConfirmed) {
                 //         Swal.fire(
                 //             'Deleted!',
                 //             'Your file has been deleted.',
                 //             'success'



                 let season_id = $(this).attr('season_id');
                 let fixture_id = $(this).attr('fixture_id');
                 let team_id = $(this).attr('team_id');
                 let teamName = $(this).attr('teamName');
                 formatted_team_name = teamName.replace(/_/g, ' ');


                 let fixture_date = $(this).attr('fixture_date');
                 let fixture_time = $(this).attr('fixture_time');
                 let week = $(this).attr('week');
                 $('#close_btn').click(function() {
                    // return false;
                     location.reload(true);
                 });
                 $.ajaxSetup({
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                 });

                 $.ajax({
                     type: 'POST',
                     // url: '/check_user',
                     url: '/dashboard_team_pick',
                     data: {
                         season_id: season_id,
                         fixture_id: fixture_id,
                         team_id: team_id,
                         week: week
                     },
                     success: function(resp) {

                         if (resp.message == 'login') {
                             $('#selectTeam #teamSelectedMsg').html(
                                 '<p style="color:red"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2"> <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"> </polygon> <line x1="12" y1="8" x2="12" y2="12"></line> <line x1="12" y1="16" x2="12.01" y2="16"></line>  </svg> <span> Please <a href="{{ route('login') }}" style="color:red">login</a> first to continue . </span></p>'
                             );
                         }
                         if (resp.message == 'subscribe') {
                             $('#login_msg_div').hide();
                             $('#selectTeam #teamSelectedMsg').html(
                                 '<p style="color:red"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2"> <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"> </polygon> <line x1="12" y1="8" x2="12" y2="12"></line> <line x1="12" y1="16" x2="12.01" y2="16"></line>  </svg> <span> Please <a href="{{ route('payment') }}" style="color:red">subscribe</a> to pick the teams . It will cost you $100 . </span></p>'
                             );

                         }
                         if (resp.message == 'update') {
                             $('#selectTeam #teamSelectedMsg').html(
                                 'You have selected <span style="color:#06083B">' +
                                  formatted_team_name +
                                 '</span> for the week  <span style="color:#06083B"> ' +
                                 week + ' </span> on <span style="color:#06083B">' +
                                 fixture_date + '</span> at <span style="color:#06083B">' +
                                 fixture_time + '</span>');



                         }
                         if (resp.message == 'added') {
                             $('#selectTeam #teamSelectedMsg').html(
                                 'You have selected <span style="color:#06083B;">' +
                                     formatted_team_name +
                                 '</span> for the week <span style="color:#06083B"> ' +
                                 week + ' </span> on <span style="color:#06083B">' +
                                 fixture_date + '</span> at <span style="color:#06083B">' +
                                 fixture_time + '</span>');


                         }

                         // if (resp.message == 'already_selected') {
                         //     $('#selectTeam #teamSelectedMsg').html(
                         //         '<span style="color:green">You have already selected ' +
                         //             formatted_team_name +
                         //         ' for the week ' +
                         //         week + ' on ' +
                         //         fixture_date + ' at ' +
                         //         fixture_time + '</span>');

                         // }


                         if (resp.message == 'Time_id_over') {
                             $('#selectTeam #teamSelectedMsg').html(
                                 '<p style="color:red"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2"> <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"> </polygon> <line x1="12" y1="8" x2="12" y2="12"></line> <line x1="12" y1="16" x2="12.01" y2="16"></line>  </svg> <span> Your time is over to pick the team  as you can pick the team till Thursaday 12:00 am . You will receive loss for this week  </span></p>'
                             );
                         }

                     },
                 })

                 // )
                 //     }
                 // })
             });

             $('.expire_season_msg').click(function() {
                 $('#SeasonExpireModal #expire_season_msg').html(
                     '<p style="color:red"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2"> <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"> </polygon> <line x1="12" y1="8" x2="12" y2="12"></line> <line x1="12" y1="16" x2="12.01" y2="16"></line>  </svg> <span style="color:red" >Season has been expired </span></p>'
                 );
             });*/
        });
    </script>
@endsection
