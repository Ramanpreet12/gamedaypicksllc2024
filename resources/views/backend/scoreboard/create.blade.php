@extends('../layout/' . $layout)

@section('subhead')
    <title>NFL | Scoreboard</title>
@endsection

@section('subcontent')
    <div class="intro-y box mt-5">
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

        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">Add Scores</h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a class="btn btn-primary shadow-md mr-2" href="{{url('admin/scores')}}" id="">Back</a>
            </div>
        </div>

        {{-- <form action="{{url('admin/winner/assigned_prize/'.$get_winning_user->user_id)}}" method="post" enctype="multipart/form-data"> --}}
        <form action="{{url('admin/add_scores/'.$team_results->id)}}" method="post" enctype="multipart/form-data">
            @csrf
{{-- @method('PUT') --}}
            <div id="horizontal-form" class="p-5">
                <div class="preview  mr-5">

                    <input type="hidden" value="{{$team_results->season_id}}" name="season_id">
                    <div class="form-inline mt-5">
                        <label for="name" class="font-medium form-label sm:w-60">First Team  <span class="text-danger">*</span></label>

                        <input id="name" type="text" class="form-control" placeholder="Enter First Team name"  value="{{ $team_results->first_team_id->name }}" readonly>
                    </div>

                    <div class="form-inline mt-5">
                        <label for="name" class="font-medium form-label sm:w-60">First Team Points  <span class="text-danger">*</span></label>
                        <input type="hidden" value="" name="user_id" >
                        <input id="name" type="text" name="first_team_points" class="form-control" placeholder="Enter First Team points"  value="" >
                    </div>
                    <div class="form-inline mt-5">
                        <label for="name" class="font-medium form-label sm:w-60">Second Team  <span class="text-danger">*</span></label>
                        <input type="hidden" value="" name="user_id" >
                        <input id="name" type="text" class="form-control" placeholder="Enter Second Team name"  value="{{ $team_results->second_team_id->name }}" readonly>
                    </div>
                    <div class="form-inline mt-5">
                        <label for="name" class="font-medium form-label sm:w-60">Second Team Points <span class="text-danger">*</span></label>
                        <input type="hidden" value="" name="user_id" >
                        <input id="name" type="text" name="second_team_points" class="form-control" placeholder="Enter  Second Team points"  value="" >
                    </div>
                </div>
                <br><br>
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                </div>
                <div class="text-right mt-5">
                    <button type="submit" name="add_scores" class="btn btn-primary w-34">Add Scores</button>
                    <button type="reset" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>
@endsection
