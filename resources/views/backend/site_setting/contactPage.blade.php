@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Contact </title>
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
            <h2 class="font-medium text-base mr-auto">Edit Contact Page </h2>
        </div>
        <form action="{{ route('admin/contact_page') }}" method="post" enctype="multipart/form-data">


            @csrf
            @method('PUT')
            <div id="horizontal-form" class="p-5">
                <div class="preview  mr-5">
                    <div class="form-inline">
                        <label for="contact_section_heading" class="font-medium form-label sm:w-60">Section Heading <span
                                class="text-danger">*</span></label>
                        <input id="contact_section_heading" type="text" class="form-control"
                            placeholder="Section Heading" name="contact_section_heading"
                            value="{{ old('contact_section_heading', $contact_details['contact_section_heading']) }}">
                    </div>
                    <div class="form-inline mt-2">
                        <label for="contact_section_heading" class="font-medium form-label sm:w-60"></label>
                        @error('contact_section_heading')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-inline">
                        <label for="contact_location_heading" class="font-medium form-label sm:w-60">Location Heading <span
                                class="text-danger">*</span> </label>
                        <input id="contact_location_heading" type="text" class="form-control"
                            placeholder="Address Location Heading" name="contact_location_heading"
                            value="{{ old('contact_location_heading', $contact_details['contact_location_heading']) }}">
                    </div>
                    <div class="form-inline mt-2">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('contact_location_heading')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-inline">
                        <label for="contact_page_content" class="font-medium form-label sm:w-60">Content <span
                                class="text-danger">*</span></label>
                        <textarea name="contact_page_content" id="editor" cols="10" rows="5" class="form-control sm:w-60">{{ old('contact_page_content', $contact_details['contact_page_content']) }}</textarea>
                    </div>
                    <div class="form-inline mt-2">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('contact_page_content')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-inline mt-5">
                        <label for="contact_page_image" class="font-medium form-label sm:w-60">Image <span
                                class="text-danger">*</span></label>
                        <input id="contact_page_image" type="file" class="form-control" placeholder="Image"
                            name="contact_page_image">

                    </div>
                    <div class="form-inline mt-2">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('contact_page_image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    @if (!empty($contact_details['contact_page_image']))
                        <div class="form-inline mt-5">
                            <label for="image" class="font-medium form-label sm:w-60"></label>
                            <img src="{{ asset('storage/images/static_page/' . $contact_details['contact_page_image']) }}"
                                alt="" class="img-fluid" srcset="" height="50px" width="200px">

                        </div>
                    @else
                        <div class="form-inline mt-5">
                            <label for="contact_page_image" class="font-medium form-label sm:w-60"></label>
                            <img src="{{ asset('dist/images/no-image.png') }}" alt="" class="img-fluid"
                                height="50px" width="100px">
                        </div>
                    @endif


                    <div class="form-inline">
                        <label for="contact_form_heading" class="font-medium form-label sm:w-60">Contact Form Heading
                            <span class="text-danger">*</span></label>
                        <input id="contact_form_heading" type="text" class="form-control"
                            placeholder="Contact Form Heading" name="contact_form_heading"
                            value="{{ old('contact_form_heading', $contact_details['contact_form_heading']) }}">
                    </div>
                    <div class="form-inline mt-2">
                        <label for="contact_form_heading" class="font-medium form-label sm:w-60"></label>
                        @error('contact_form_heading')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-inline">
                        <label for="contact_social_links_heading" class="font-medium form-label sm:w-60">Social Links
                            Heading <span class="text-danger">*</span></label>
                        <input id="contact_social_links_heading" type="text" class="form-control"
                            placeholder="Social Links Heading" name="contact_social_links_heading"
                            value="{{ old('contact_social_links_heading', $contact_details['contact_social_links_heading']) }}">
                    </div>
                    <div class="form-inline mt-2">
                        <label for="contact_social_links_heading" class="font-medium form-label sm:w-60"></label>
                        @error('contact_social_links_heading')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
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
    </script>
@endsection
