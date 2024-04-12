@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Product</title>
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
            <h2 class="font-medium text-base mr-auto">Add Product </h2>
            <a href="{{ route('shop.index') }}"><button class="btn btn-primary">Back</button></a>
        </div>
        <form action="{{ route('shop.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="intro-y box p-5">

                <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">

                    {{-- <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="jersey_name" class="font-medium form-label sm:w-60">Store Type <span
                                    class="text-danger">*</span></label>
                        </div>
                        <select class="form-control input w-full border flex-1" id="store_type" name="store_type">

                            <option value="Shop" {{old('store_type' ) =='Shop' ? 'selected': ''}}>For Shop</option>
                            <option value="Greek Store" {{ old('store_type' ) == 'Greek Store' ? 'selected' : '' }}>For Greek Store
                            </option>
                        </select>
                        @error('store_type')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div> --}}

                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="jersey_name" class="font-medium form-label sm:w-60">Product Name <span
                                    class="text-danger">*</span></label>
                        </div>
                        <input type="text" id="uploding_product_name" class="form-control input w-full border flex-1"
                            placeholder="Product name" name="product_name" value="{{ old('product_name') }}">
                        @error('product_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="product_url" class="font-medium form-label sm:w-60">Product URL <span
                                    class="text-danger">*</span></label>

                        </div>
                        <input id="product_url" type="text" class="form-control input w-full border flex-1"
                            placeholder="Jersey URL" name="product_url" value="{{ old('product_url') }}">
                        @error('product_url')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="product_type" class="font-medium form-label sm:w-60">Product Type <span
                                    class="text-danger">*</span></label>

                        </div>
                        <select class="form-control input w-full border flex-1" id="product_type" name="product_type">

                            <option value="men" {{old('product_type' ) =='men' ? 'selected': ''}}>For Men</option>
                            <option value="women" {{ old('product_type' ) == 'women' ? 'selected' : '' }}>For Women
                            </option>
                            <option value="youth" {{ old('product_type' ) == 'youth' ? 'selected' : '' }}>For Youth
                            </option>
                        </select>

                        @error('product_type')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="product_color" class="font-medium form-label sm:w-60">Product Color <span
                                    class="text-danger">*</span></label>

                        </div>
                        <input id="product_color" type="text" class="form-control input w-full border flex-1"
                            placeholder="Jersey color" name="product_color" value="{{ old('product_color') }}">
                        @error('product_color')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div> --}}

                    {{-- <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="product_price" class="font-medium form-label sm:w-60">Product Price <span
                                    class="text-danger">*</span></label>

                        </div>
                        <input id="product_price" type="text" class="form-control input w-full border flex-1 "
                            placeholder="Jersey price" name="product_price" value="{{ old('product_price') }}">
                        @error('product_price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div> --}}

                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="product_image" class="font-medium form-label sm:w-60">Product Image <span
                                    class="text-danger">*</span></label>

                        </div>
                        <input type="file" class="form-control input w-full border flex-1" name="product_image[]"
                            value="{{ old('product_image') }}" multiple>
                        @error('product_image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>




                    {{-- <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="jersey_details" class="font-medium form-label sm:w-60">Jersey Details <span
                                    class="text-danger">*</span></label>
                        </div>
                        <textarea class="input w-full border flex-1" data-feature="all" id="product_details_editor" name="jersey_details"
                            rows="1">{{ old('jersey_details') }}</textarea>

                        @error('jersey_details')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="description" class="font-medium form-label sm:w-60">Description <span
                                    class="text-danger">*</span></label>
                        </div>
                        <textarea class="input w-full border flex-1" data-feature="all" id="editor" name="description" rows="1">{{ old('description') }}</textarea>

                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div> --}}



                    {{-- <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="status" class="font-medium form-label sm:w-60">Status <span class="text-danger">*</span></label>

                        </div>
                        <select class="form-control" id="status" name="status">

                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @error('status')<p class="text-danger">{{$message}}</p> @enderror
                    </div> --}}


                </div>

                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                </div>
                <div class="text-right mt-5">
                    <button type="submit" class="btn btn-primary w-24">Save</button>
                    <button type="reset" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                </div>
            </div>
        </form>
        <!-- END: Form Layout -->
    </div>

@endsection


@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#product_details_editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection