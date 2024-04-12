@extends('../layout/' . $layout)

@section('subhead')
    <title>
        {{ $general->name ? $general->name : 'NFL' }} | Team Result</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Add Team Result</h2>
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
            <form action="{{ route('admin/team_result/create') }}" method="post">
                @csrf
                <div class="intro-y box p-5">

                    <div class="mt-3">
                        <label for="team_one" class="form-label">Team One</label>
                        <select data-placeholder="Select Team" class="tom-select w-full" id="team_one" name="team_one">
                            <option value="">--select--</option>
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('team_one')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="team_two" class="form-label">Team Two</label>
                        <select data-placeholder="Select your favorite actors" class="tom-select w-full" id="team_two"
                            name="team_two">
                            <option value="">--select--</option>
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('team_two')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3 flex justify-content-between">
                        <div>
                            <label class="form-label">Result Status</label>
                            <div class="sm:grid grid-cols-2 gap-2">
                                <div class="input-group mt-2 sm:mt-0">
                                    <select class="form-select w-full" id="result_status" name="result_status">
                                        <option value="">--select--</option>
                                        <option value="win">Win</option>
                                        <option value="loss">Loss</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div>


                            <div>
                                <label class="form-label"> Status</label>
                                <div class="sm:grid grid-cols-2 gap-2">
                                    <div class="input-group mt-2 sm:mt-0 relative">
                                        <select class="form-select w-full" id="status" name="status">
                                            <option value="">--select--</option>
                                            <option value="active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

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
