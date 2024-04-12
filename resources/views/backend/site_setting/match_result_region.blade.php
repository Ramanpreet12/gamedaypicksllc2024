@extends('../layout/' . $layout)
@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Match Result</title>
@endsection
@section('subcontent')
    <div class="intro-y box mt-5">
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

        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">Match Results Setting</h2>
        </div>
        <form action="{{route('admin/match_result_edit')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="horizontal-form" class="p-5">
                <div class="preview">
                    <div class="form-inline">
                        <label for="page_heading" class="font-medium form-label sm:w-60">Page Heading <span class="text-danger">*</span></label>
                        <input id="page_heading" type="text" class="form-control" placeholder="Match Results By Region" name="page_heading" value="{{$match_result->page_heading}}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('page_heading')<p class="text-danger">{{$message}}</p> @enderror
                    </div>

                    <div class="form-inline mt-5">
                        <label for="selected_season_heading" class="font-medium form-label sm:w-60"> Selected Season Heading <span class="text-danger">*</span></label>
                        <input id="selected_season_heading" type="text" class="form-control" placeholder="Selected Season" name="selected_season_heading" value="{{$match_result->selected_season_heading}}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('selected_season_heading')<p class="text-danger">{{$message}}</p> @enderror
                    </div>

                    <div class="form-inline mt-5">
                        <label for="select_season_heading" class="font-medium form-label sm:w-60"> Select Season Heading <span class="text-danger">*</span></label>
                        <input id="select_season_heading" type="text" class="form-control" placeholder="Select Season" name="select_season_heading" value="{{$match_result->select_season_heading}}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('select_season_heading')<p class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="form-inline mt-5">
                        <label for="total_player_heading" class="font-medium form-label sm:w-60"> Total Players Heading <span class="text-danger">*</span></label>
                        <input id="total_player_heading" type="text" class="form-control" placeholder="Total Players" name="total_player_heading" value="{{$match_result->total_player_heading}}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('total_player_heading')<p class="text-danger">{{$message}}</p> @enderror
                    </div>

                    <div class="form-inline mt-5">
                        <label for="region_heading" class="font-medium form-label sm:w-60">Region Heading <span class="text-danger">*</span></label>
                        <input id="region_heading" type="text" class="form-control" placeholder="Region" name="region_heading" value="{{$match_result->region_heading}}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('region_heading')<p class="text-danger">{{$message}}</p> @enderror
                    </div>

                    <div class="form-inline mt-5">
                        <label for="players_total_win" class="font-medium form-label sm:w-60">Players Total Win <span class="text-danger">*</span></label>
                        <input id="players_total_win" type="text" class="form-control" placeholder="Players Total Win" name="players_total_win" value="{{$match_result->players_total_win}}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('players_total_win')<p class="text-danger">{{$message}}</p> @enderror
                    </div>

                    <div class="form-inline mt-5">
                        <label for="players_total_loss" class="font-medium form-label sm:w-60">Players Total Loss <span class="text-danger">*</span></label>
                        <input id="players_total_loss" type="text" class="form-control" placeholder="Players Total Loss" name="players_total_loss" value="{{$match_result->players_total_loss}}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('players_total_loss')<p class="text-danger">{{$message}}</p> @enderror
                    </div>
                </div>
                <br><br>
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                </div>
                <div class="text-right mt-5">
                    <button type="submit" class="btn btn-primary w-24">Update</button>
                    <button type="reset" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>
@endsection
