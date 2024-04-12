@extends('../layout/' . $layout)

@section('subhead')
    <title>NFL | Team</title>
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
            <h2 class="font-medium text-base mr-auto">Add Team </h2>
            <a class="btn btn-primary shadow-md mr-2" href="{{route('team.index')}}" id="">Back</a>

        </div>
        <form action="{{ route('team.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div id="horizontal-form" class="p-5">
                <div class="preview  mr-5">
                    <div class="form-inline">
                        <label for="league" class="font-medium form-label sm:w-60">League <span class="text-danger">*</span></label>
                        <input id="league" type="text" class="form-control" placeholder="Enter League" name="league" value="">
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
                                <option value="{{$region->id}}">{{$region->region}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-inline mt-2">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('region_id')<p class="text-danger">{{$message}}</p> @enderror
                    </div>


                    <div class="form-inline mt-5">
                        <label for="name" class="font-medium form-label sm:w-60">Name <span class="text-danger">*</span></label>
                        <input id="name" type="text" class="form-control" placeholder="Enter Team name" name="name" value="">
                    </div>
                    <div class="form-inline mt-2">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('name')<p class="text-danger">{{$message}}</p> @enderror
                    </div>

                    {{-- <div class="form-inline mt-5">
                        <label for="match_played" class="font-medium form-label sm:w-60">Match Played <span class="text-danger">*</span></label>
                        <input id="match_played" type="text" class="form-control" placeholder="Enter number of match played" name="match_played" value="">
                    </div> --}}


                    {{-- <div class="form-inline mt-5">
                        <label for="win" class="font-medium form-label sm:w-60">Win <span class="text-danger">*</span></label>
                        <input id="win" type="text" class="form-control" placeholder="Enter number of wins " name="win" value="">
                    </div>


                    <div class="form-inline mt-5">
                        <label for="loss" class="font-medium form-label sm:w-60">Loss <span class="text-danger">*</span></label>
                        <input id="loss" type="text" class="form-control" placeholder="Enter number of loss" name="loss" value="">
                    </div>

                    <div class="form-inline mt-5">
                        <label for="pts" class="font-medium form-label sm:w-60">PTS <span class="text-danger">*</span></label>
                        <input id="pts" type="text" class="form-control" placeholder="Enter number of PTS" name="pts" value="">
                    </div> --}}

                    <div class="form-inline mt-5">
                        <label for="logo" class="font-medium form-label sm:w-60">Logo <span class="text-danger">*</span></label>
                        <input id="logo" type="file" class="form-control" placeholder="Image" name="logo">
                    </div>
                    <div class="form-inline mt-2">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('logo')<p class="text-danger">{{$message}}</p> @enderror
                    </div>

                    <div class="form-inline mt-5 mt-2">
                        <label for="status" class="font-medium form-label sm:w-60">Status <span class="text-danger">*</span></label>
                        <select class="form-control" id="status" name="status">

                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="form-inline mt-2">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('status')<p class="text-danger">{{$message}}</p> @enderror
                    </div>

                    {{-- @if (!empty($general->logo))
                        <div class="form-inline mt-5">
                            <label for="logo" class="font-medium form-label sm:w-60"></label>
                            <img src="{{asset('storage/images/general/'.$general->logo)}}" alt="" height="50px" width="100px">
                        </div>

                    @else
                        <div class="form-inline mt-5">
                            <label for="logo" class="font-medium form-label sm:w-60"></label>
                            <img alt="Admin Image" class="rounded-full" height="50px" width="100px"
                            src="{{asset('dist/images/dummy_image.webp')}}">
                        </div>

                    @endif --}}




                    {{-- <div class="form-inline mt-5">
                        <label for="logo" class="font-medium form-label sm:w-60"></label>
                        <img src="{{asset('public/images/general/'.$general->favicon)}}" alt="" height="50px" width="100px">

                    </div> --}}


                </div>

                <br><br>
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                </div>
                <div class="text-right mt-5">
                    <button type="submit" class="btn btn-primary w-24">Save</button>
                    <button type="reset" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>
@endsection
