@extends('../layout/' . $layout)

@section('subhead')
    <title>
        NFL | Leaderboard</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Add New Record</h2>
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
    </div>
    <div class="grid grid-cols-6 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('admin/leaderboard/create') }}" method="post">
                @csrf
                <div class="intro-y box p-5">
                    {{-- <div class="mt-3">
                        <label for="season" class="form-label">Season</label>
                        <select data-placeholder="Select Season" class="tom-select w-full" id="season" name="season">
                            <option value="">--select--</option>
                            @foreach ($seasons as $season)
                                <option value="{{ $season->id }}">{{ $season->name }}</option>
                            @endforeach
                        </select>
                        @error('season') <p class="text-danger">{{$message}}</p> @enderror
                    </div> --}}
                    <div class="mt-3">
                        <label for="region" class="form-label">Region</label>
                        <select data-placeholder="Select Team" class="tom-select w-full" id="region" name="region">
                            <option value="">--select--</option>
                            <option value="north">North</option>
                            <option value="west">West</option>
                            <option value="south">South</option>
                            <option value="east">East</option>
                            <option value="midwest">Midwest</option>
                            <option value="overseas">Overseas</option>

                        </select>
                        @error('region')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="teams" class="form-label">Teams</label>
                        <select data-placeholder="Select your favorite actors" class="tom-select w-full" id="teams"
                            name="teams">
                            <option value="">--select--</option>
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('teams')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="win" class="form-label">Win</label>
                        <div class="input-group">
                            <input id="win" type="text" class="form-control" placeholder="win"
                                aria-describedby="input-group-1" name="win">
                        </div>
                        @error('win')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="loss" class="form-label">Loss</label>
                        <div class="input-group">
                            <input id="loss" type="text" class="form-control" placeholder="loss"
                                aria-describedby="input-group-1" name="loss">
                        </div>
                        @error('loss')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="pts" class="form-label">PTS</label>
                        <div class="input-group">
                            <input id="pts" type="text" class="form-control" placeholder="pts"
                                aria-describedby="input-group-1" name="pts">
                        </div>
                        @error('pts')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-3">

                            <label class="form-label">Status</label>
                            <div class="sm:grid grid-cols-2 gap-2">
                                <div class="input-group mt-2 sm:mt-0">
                                    <select class="form-select w-full" id="status" name="status">
                                        <option value="">--select--</option>
                                        <option value="active">active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>

                        <div>
                        </div>
                        <div class="sm:grid grid-cols-2 gap-2">
                            <div>
                                @error('result_status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="sm:grid grid-cols-2 gap-2">
                                @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                {{-- @error('time_zone')
                                    <p class="ml-5 text-danger">{{ $message }}</p>
                                @enderror --}}
                            </div>
                        </div>
                    </div>
                    <div class="text-left mt-5">
                        <button type="submit" class="btn btn-primary w-24">Save</button>
                        <button type="reset" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    </div>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>
@endsection
