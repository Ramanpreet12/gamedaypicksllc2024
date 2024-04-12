@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }}  | Team</title>
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
            <h2 class="font-medium text-base mr-auto">Edit Team </h2>
            <a class="btn btn-primary shadow-md mr-2" href="{{route('team.index')}}" id="">Back</a>

        </div>
        <form action="{{route('team.update' , $team->id)}}" method="post" enctype="multipart/form-data">
            @csrf
@method('put')
            <div id="horizontal-form" class="p-5">
                <div class="preview  mr-5">
                    <div class="form-inline">
                        <label for="league" class="font-medium form-label sm:w-60">League <span class="text-danger">*</span></label>
                        <input id="league" type="text" class="form-control" placeholder="Enter League" name="league"  value="{{ ucwords($team->league) }}">
                    </div>
                    <div class="form-inline mt-2">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('league')<p class="text-danger">{{$message}}</p> @enderror
                    </div>

                    <div class="form-inline mt-2">
                        <label for="region" class="font-medium form-label sm:w-60">Region <span class="text-danger">*</span></label>
                        <select name="region_id" id=""  class="form-control">
                            <option value="">select</option>
                            @foreach ($get_regions as $region)
                                <option value="{{$region->id}}" @if ($region->id == $team->region_id)  {{'selected'}} @endif>{{$region->region}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-inline mt-2">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('region_id')<p class="text-danger">{{$message}}</p> @enderror
                    </div>


                    <div class="form-inline mt-5">
                        <label for="name" class="font-medium form-label sm:w-60">Name <span class="text-danger">*</span></label>
                        <input id="name" type="text" class="form-control" placeholder="Enter Team name" name="name"  value="{{($team->name) }}">
                    </div>
                    <div class="form-inline mt-2">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('name')<p class="text-danger">{{$message}}</p> @enderror
                    </div>

                    <div class="form-inline mt-5">
                        <label for="logo" class="font-medium form-label sm:w-60">Logo <span class="text-danger">*</span></label>
                        <input id="logo" type="file" class="form-control" placeholder="Image" name="logo">

                    </div>
                    <div class="form-inline mt-2">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('logo')<p class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="form-inline mt-5">
                        <label for="logo" class="font-medium form-label sm:w-60"></label>
                      <img src="{{asset('storage/images/team_logo/'.$team->logo)}}" alt="" height="40px" width="80px">
                    </div>


                    <div class="form-inline mt-5 mt-2">
                        <label for="status" class="font-medium form-label sm:w-60">Status <span class="text-danger">*</span></label>
                        <select class="form-control" id="status" name="status">

                            <option value="active" {{$team->status == 'active' ? 'selected' : ''}}>Active</option>
                            <option value="inactive" {{$team->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
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

@section('script')
    <script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>
@endsection
