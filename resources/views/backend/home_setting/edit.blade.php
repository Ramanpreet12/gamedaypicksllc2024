@extends('../layout/' . $layout)

@section('subhead')
    <title>NFL | Home Setting</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Edit News</h2>
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
    </div>
    <div class="grid grid-cols-6 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('news.update',$news->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="intro-y box p-5">


                    <div class="mt-3">
                        <label for="title" class="form-label">Title</label>
                        <div class="input-group">
                            <input id="title" type="text" class="form-control" placeholder="title"
                                aria-describedby="input-group-1" name="title" value="{{old('title',$news->title)}}">
                        </div>
                        @error('title') <p class="text-danger">{{$message}}</p> @enderror
                    </div>

                    <div class="mt-3">
                        <label for="header" class="form-label">Header</label>
                        <div class="input-group">
                            <input id="header" type="text" class="form-control" placeholder="Header"
                                aria-describedby="input-group-1" name="header" value="{{old('header',$news->header)}}">
                        </div>
                        @error('header') <p class="text-danger">{{$message}}</p> @enderror
                    </div>

                    <div class="mt-3">
                        <label>Image</label>
                        <div class="mt-2">
                          <input type="file" name="image" id="image">
                        </div>
                        @if ($errors->has('image'))
                            {{ $errors->first('image')}}
                        @endif
                        {{-- <img src="/homeSetting/{{ $news->image }}" height="100px" width="100px"> --}}
                        <br>
                        <img src="{{asset('storage/images/news/'.$news->image)}}" height="100px" width="100px">
                        @error('image') <p class="text-danger"></p> @enderror
                    </div>

                    <div class="mt-3" id="classic-editor">
                        <label>Description</label>
                        <div class="preview">
                            <textarea id="description" class="editor"  rows="6" name="description" placeholder="">{{old('description',$news->description)}}</textarea>
                        </div>

                    </div>
                    <div class="mt-3">
                        <label for="crud-form-2" class="form-label">Staus</label>
                        <select data-placeholder="Select any option" name="status" class="tom-select w-full" id="crud-form-2">
                            <option value="active" {{ old('status',$news->status) == 'active' ? 'selected' :"" }}>Active</option>
                            <option value="inactive" {{ old('status',$news->status)  == 'inactive' ? 'selected' :"" }}>Inactive</option>
                        </select>
                        @if ($errors->has('status'))
                            {{ $errors->first('status')}}
                        @endif
                    </div>

                    <div class="text-left mt-5">
                        <button type="submit" class="btn btn-primary w-24">Save</button>
                        <a type="reset" href="{{route('news.index')}}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
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
