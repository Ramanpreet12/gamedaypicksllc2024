@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Season</title>
@endsection

@section('subcontent')
    <div class="intro-y box mt-5">
        @if (session()->has('success_msg'))
            <div class="alert alert-success show flex items-center mb-2 alert_messages" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-check2-circle" viewBox="0 0 16 16">
                    <path
                        d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                    <path
                        d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                </svg>
                &nbsp; {{ session()->get('success_msg') }}
            </div>
        @endif
        @if (session()->has('error_message'))
            <div class="alert alert-danger-soft show flex items-center mb-2 alert_messages" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-alert-octagon w-6 h-6 mr-2">
                    <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                &nbsp; {{ session()->get('error_message') }}
            </div>
        @endif

        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">Edit Season </h2>
            <a href="{{route('season.index')}}"><button class="btn btn-primary">Back</button></a>
        </div>
        <form action="{{route('season.update' , $season->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div id="horizontal-form" class="p-5">
                <div class="preview  mr-5">
                    <div class="form-inline">
                        <input type="hidden" name="league" id="league" value="1">
                        <label for="name" class="font-medium form-label sm:w-60">Name <span class="text-danger">*</span></label>
                        <input id="name" type="text" class="form-control" placeholder="Name" name="season_name" value="{{$season->season_name}}">
                    </div>
                    <div class="form-inline mt-2">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('season_name')<p class="text-danger">{{$message}}</p> @enderror
                    </div>


                    <div class="form-inline mt-5">
                        <label for="start_date" class="font-medium form-label sm:w-60">Start Date <span class="text-danger">*</span></label>
                        <input id="start_date" type="date" class="form-control" placeholder="Start date" name="starting" value="{{ \Carbon\Carbon::parse($season->starting)->format('Y-m-d') }}" >
                    </div>
                    <div class="form-inline mt-2">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('season_name')<p class="text-danger">{{$message}}</p> @enderror
                    </div>

                    <div class="form-inline mt-5">
                        <label for="end_date" class="font-medium form-label sm:w-60">End Date <span class="text-danger">*</span></label>
                        <input id="end_date" type="date" class="form-control" placeholder="End date" name="ending" value="{{ \Carbon\Carbon::parse($season->ending)->format('Y-m-d') }}" >
                    </div>
                    <div class="form-inline mt-2">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('ending')<p class="text-danger">{{$message}}</p> @enderror
                    </div>

                    <div class="form-inline mt-5">
                        <label for="season_amount" class="font-medium form-label sm:w-60">Amount <span class="text-danger">*</span></label>
                        <input id="season_amount" type="text" class="form-control" placeholder="Season Amount" name="season_amount" value="{{$season->season_amount}}">
                    </div>
                    <div class="form-inline mt-2">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('season_amount')<p class="text-danger">{{$message}}</p> @enderror
                    </div>

                    <div class="form-inline mt-5 mt-2">
                        <label for="status" class="font-medium form-label sm:w-60">Status <span class="text-danger">*</span></label>
                        <select class="form-control" id="status" name="status">

                            <option value="active" {{$season->status =='active' ? 'selected' : ''}}>Active</option>
                            <option value="inactive" {{$season->status =='inactive' ? 'selected' : ''}}>Inactive</option>
                        </select>
                    </div>
                    <div class="form-inline mt-2">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('status')<p class="text-danger">{{$message}}</p> @enderror
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
    </div>
@endsection
