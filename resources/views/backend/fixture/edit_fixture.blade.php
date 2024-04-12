@extends('../layout/' . $layout)

@section('subhead')
    <title>
        {{ $general->name ? $general->name : 'NFL' }} | Fixtures</title>
@endsection

@section('subcontent')
@if (session()->has('success'))
<div class="alert alert-success show flex items-center mb-2 alert_messages" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
        class="bi bi-check2-circle" viewBox="0 0 16 16">
        <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
        <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
    </svg>
    &nbsp; {{ session()->get('success') }}
</div>
@endif
@if (session('message_error'))
<div class="alert alert-danger-soft show flex items-center mb-2 alert_messages" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
        class="feather feather-alert-octagon w-6 h-6 mr-2">
        <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
        <line x1="12" y1="8" x2="12" y2="12"></line>
        <line x1="12" y1="16" x2="12.01" y2="16"></line>
    </svg>
    {{ session('message_error') }}
</div>
@endif

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Edit Fixture</h2>

        <a href="{{ route('fixtures.index') }}"><button class="btn btn-primary">Back</button></a>

    </div>
    <div class="grid grid-cols-6 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('fixtures.update' , $fixture->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="intro-y box p-5">
                    <div class="mt-3">

                        <label for="season" class="form-label">Season <span class="text-danger">*</span></label>
                        <select data-placeholder="Select Season" class="tom-select w-full" id="season" name="season">
                            <option value="">--select--</option>
                            @foreach ($seasons as $season)
                                <option value="{{ $season->id }}"
                                    {{ $season->id == $fixture->season_id ? 'selected' : '' }}>{{ $season->season_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('season')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input type="hidden" name="week" value="{{ $fixture->week }}">
                    </div>
                    <div class="mt-3">
                        <label for="first_team" class="form-label">First Team <span class="text-danger">*</span></label>
                        <select data-placeholder="Select Team" class="tom-select w-full" id="first_team" name="first_team">
                            <option value="">--select--</option>
                            <option value="TBD_team_one" {{$fixture->first_team == 'TBD_team_one' ? 'selected' : ''}}>TBD</option>
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}"
                                    {{ $team->id == $fixture->first_team ? 'selected' : '' }}>{{ $team->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('first_team')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mt-3">
                        <label for="second_team" class="form-label">Second Team <span class="text-danger">*</span></label>
                        <select data-placeholder="Select Team" class="tom-select w-full" id="second_team"
                            name="second_team">
                            <option value="">--select--</option>
                            <option value="TBD_team_two" {{$fixture->second_team == 'TBD_team_two' ? 'selected' : ''}}>TBD</option>
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}"
                                    {{ $team->id == $fixture->second_team ? 'selected' : '' }}>{{ $team->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('second_team')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Date & Time <span class="text-danger">*</span></label>
                        <div class="sm:grid grid-cols-2 gap-2">
                            <div class="input-group">
                                <div id="date" class="input-group-text">Date</div>

                                    @php
                                        $dateTime = array();
                                        array_push($dateTime , $fixture->date);
                                        array_push($dateTime , $fixture->time);
                                        array_push($dateTime , $fixture->time_zone);
                                        $get_dateTime = implode(' '  , $dateTime  );
                                    @endphp

                                    <div>

                                        <span class="lastDate_Data" data="{{$get_dateTime}}"></span>
                                        <div id="picker"></div>
                                        <input type="hidden" id="result" value="{{ $get_dateTime }}"  name="date"/>
                                    </div>
                            </div>
                        </div>
                        <div class="sm:grid grid-cols-2 gap-2">
                            <div>
                                @error('date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <br><br>
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                </div>
                <div class="text-right mt-5">
                    <button type="submit" class="btn btn-primary w-24">Update</button>
                    <button type="reset" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                </div>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection

@section('script')

    <script type="text/javascript">
        $(document).ready( function () {
            $('#picker').dateTimePicker();
            $('#picker-no-time').dateTimePicker({ showTime: false, dateFormat: 'DD/MM/YYYY hh:mm A', title: 'Select Date'});
        })

        </script>
@endsection
