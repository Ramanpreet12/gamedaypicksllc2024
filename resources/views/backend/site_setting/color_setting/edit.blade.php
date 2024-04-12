@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Color Setting</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Edit {{ ucfirst($color_setting->section) }} Section</h2>
        <a href="{{route('admin/color_setting')}}"><button class="btn btn-primary">Back</button></a>

        @if (session()->has('message_success'))
        <div class="alert alert-success show flex items-center mb-2" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
            </svg>

            &nbsp; {{ session()->get('message_success') }}
        </div>
    @endif
    @if (session('message_error'))
            <div class="alert alert-danger-soft show flex items-center mb-2 alert_messages" role="alert">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                        {{session('message_error')}}
            </div>
    @endif
    </div>
    <div class="grid grid-cols-6 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{url('admin/update_color/'.$color_setting->id)}}" method="post">
                @csrf
            <div class="intro-y box p-5">
                <div class="mt-3">
                    <label for="section" class="form-label">Section</label>
                    <select data-placeholder="Select Team" class="tom-select w-full" id="section" name="section" disabled="disabled">
                        <option value="" >--select--</option>
                        @foreach ($color_section as $key => $value)
                        <option value="{{$key}}" {{$key == $color_setting->section ? 'selected' : '' }} >{{ucfirst($value)}}</option>
                        @endforeach
                    </select>
                    @error('section') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="mt-3">
                    <label for="header_color" class="form-label">Header Color</label>
                    <div class="input-group">
                        <input id="header_color" type="color" class="form-control" placeholder="color code" aria-describedby="input-group-1" name="header_color" value="{{$color_setting->header_color}}">
                    </div>
                    @error('text_color') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="mt-3">
                    <label for="text_color" class="form-label">Text Color</label>
                    <div class="input-group">
                        <input id="text_color" type="color" class="form-control" placeholder="color code" aria-describedby="input-group-1" name="text_color" value="{{$color_setting->text_color}}">
                    </div>
                    @error('text_color') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="mt-3">
                    <label for="button_color" class="form-label">Button Color</label>
                    <div class="input-group">
                        <input id="button_color" type="color" class="form-control" placeholder="color code" aria-describedby="input-group-1" name="button_color" value="{{$color_setting->button_color}}">
                    </div>
                    @error('button_color') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="mt-3">
                    <label for="bg_color" class="form-label">Background Color</label>
                    <div class="input-group">
                        <input id="bg_color" type="color" class="form-control" placeholder="color code" aria-describedby="input-group-1" name="bg_color" value="{{$color_setting->bg_color}}">
                    </div>
                    @error('bg_color') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="mt-3">
                    <label for="section" class="form-label">Status</label>
                    <select id="tabulator-html-filter-type" class="form-select w-full mt-2 sm:mt-0 sm:w-auto" id="status" name="status">
                        <option value="active" {{$color_setting->status =='active' ? 'selected' : '' }} >Active</option>
                        <option value="inactive" {{$color_setting->status =='inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('section') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="text-left mt-5">

                    <button type="submit" class="btn btn-primary w-24">Update</button>
                    <a class="btn btn-outline-secondary w-24 mr-1" href="{{ url('admin/color_setting/') }}">Cancel
                    </a>

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
