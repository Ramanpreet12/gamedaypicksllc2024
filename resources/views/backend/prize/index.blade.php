@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Prize</title>
@endsection

@section('subcontent')
    @if (session()->has('success_msg'))
        <div class="alert alert-success show flex items-center mb-2 alert_messages" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2-circle"
                viewBox="0 0 16 16">
                <path
                    d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                <path
                    d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
            </svg>
            &nbsp; {{ session()->get('success_msg') }}
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

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Prize Management</h2>
        <form action="{{ route('admin/prize/section_heading') }}" class="prizeManagementForm" method="post">
            @csrf
            <div id="horizontal-form" class="">
                @if (!empty($prizeHeading->value))
                    <div class="preview">
                        <div class="form-inline">
                            <label for="section_heading" class="font-medium form-label sm:">Section Title <span
                                    class="text-danger">*</span></label>
                            <input id="section_heading" type="text" class="form-control col" placeholder="Section Name"
                                name="section_heading"
                                @if (!empty($prizeHeading->value)) value="{{ $prizeHeading->value }}"  @else value="Prize" @endif>
                            <button type="submit" class="btn btn-primary ml-2">Update Title</button>
                        </div>
                        <div class="form-inline">
                            <label for="section_heading" class="font-medium form-label"></label>
                            @error('section_heading')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                @endif
            </div>
        </form>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a class="btn btn-primary shadow-md mr-2" href="{{ route('prize.create') }}" id="">Add New Prize</a>
        </div>
    </div>

    <div class="uploadFormBlock mt-8">
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">

        </div>
        <div class="">
            <div id="horizontal-form" class="">

                <form action="{{ route('admin/prize_banner') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="preview mx-2">
                        <div class="form-inline  uploadFormGroup  mt-5">
                            <label for="banner_prize">Select </label>
                            <select name="prize_banner_option" id="prize_banner_option">

                                <option value="uplaod_image"
                                    @php if($get_prize_banner->selected_option == 'uplaod_image'){ echo 'selected'; } @endphp>
                                    upload Image</option>
                                <option value="upload_video"
                                    @php if($get_prize_banner->selected_option == 'upload_video'){ echo 'selected'; } @endphp>
                                    Upload Mp4 Video</option>

                                <option value="youtube_link"
                                    @php if($get_prize_banner->selected_option == 'youtube_link'){ echo 'selected'; } @endphp>
                                    Youtube link</option>

                            </select>
                        </div>
                        <div class="form-inline  uploadFormGroup  mt-5" id="uploader_inputFeild">
                            <label for="prize_banner" class="font-medium form-label sm:w-60">Add Prize Banner</label>
                            <input id="prize_banner" type="file" class="form-control" placeholder="Enter prize banner"
                                name="prize_banner">
                        </div>

                        <div class="form-inline  uploadFormGroup  mt-5" id="uploader_videoFeild">
                            <label for="prize_banner" class="font-medium form-label sm:w-60">Add Prize Banner video</label>
                            <input id="prize_banner_video" type="file" class="form-control" name="prize_banner_video"
                                accept=".mp4">
                        </div>

                        <div class="form-inline  uploadFormGroup  mt-5" id="link_inputFeild">
                            <label for="prize_banner" class="font-medium form-label sm:w-60">Add Youtube Link</label>
                            <input id="youtube_link" type="text" class="form-control" placeholder="Enter you tube link"
                                name="youtube_link" value="{{ $get_prize_banner->youtubelink }}">
                        </div>

                        <div class="form-inline  uploadFormGroup  mt-5">
                            <button type="submit" class="btn btn-primary w-30">Upload</button>
                        </div>

                        <div class="form-inline">
                            <label for="prize_banner" class="font-medium form-label sm:w-60"></label>
                            @error('prize_banner')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-inline mt-5 uploadedPrize" id="uploadedPrize">
                        <label for="prize_banner" class="font-medium form-label sm:w-60"></label>

                        @if ($get_prize_banner != '' && $get_prize_banner->prize_banner)
                            <img src="{{ asset('storage/images/general/' . $get_prize_banner->prize_banner) }}"
                                alt="" height="100px" width="250px">
                        @else
                            <img src="{{ asset('dist/images/no-image.png') }}" alt="" height="100px"
                                width="250px">
                        @endif
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5 p-5 bg-white mb-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="prize_table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center whitespace-nowrap">Season </th>
                        <th class="text-center whitespace-nowrap">Name </th>
                        <th class="text-center whitespace-nowrap">Image</th>
                        <th class="text-center whitespace-nowrap">Amount</th>
                        <th class="text-center whitespace-nowrap">Status</th>
                        <th class="text-center whitespace-nowrap">Created At</th>
                        <th class="text-center whitespace-nowrap">Updated At</th>
                        <th class="text-center whitespace-nowrap">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($prizes->isNotEmpty())
                        {{-- @else --}}
                        @forelse ($prizes as $prize)
                            <tr class="intro-x">
                                <td>
                                    <div class="text-slate-500 font-medium whitespace-nowrap mx-4">
                                        {{ $prize->season->season_name ?? '' }} </div>
                                </td>
                                <td class="text-center">{{ $prize->name }}</td>
                                <td>
                                    @if (!empty($prize->image))
                                        <img src="{{ asset('storage/images/prize/' . $prize->image) }}" alt=""
                                            height="50px" width="100px">
                                    @else
                                        <img src="{{ asset('dist/images/no-image.png') }}" alt=""
                                            class="img-fluid" height="50px" width="100px">
                                    @endif

                                </td>

                                <td class="text-center">{{ $prize->amount }}</td>
                                <td class="">
                                    <div
                                        class="flex items-center justify-center {{ $prize->status == 'active' ? 'text-success' : 'text-danger' }}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-2"></i>
                                        {{ $prize->status == 'active' ? 'Active' : 'Inactive' }}
                                    </div>
                                </td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($prize->created_at)->format('j F, Y') }}
                                </td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($prize->updated_at)->format('j F, Y') }}
                                </td>

                                <td class="table-report__action">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3" href="{{ route('prize.edit', $prize->id) }}">
                                            <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                        </a>

                                        {{-- <form action="{{ route('prize.destroy', $prize->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <button class="btn btn-danger show_sweetalert" type="submit" data-toggle="tooltip">  <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>
                                      </form> --}}

                                        <a data-toggle="tooltip" title="Delete">
                                            <button class="btn btn-danger confirmDelete" data-toggle="tooltip"
                                                title="Delete" module="prize" module_id={{ $prize->id }}>
                                                <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>
                                        </a>



                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No Records found</td>

                            </tr>
                        @endforelse
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('#prize_table').DataTable();
        });
        $(document).ready(function() {

            let select_value = $("#prize_banner_option").val();
            console.log(select_value);
            if (select_value == 'uplaod_image') {
                $("#uploader_inputFeild").show();
                $('#uploadedPrize').show();
                $("#uploader_videoFeild").hide();
                $("#link_inputFeild").hide();
            } else if (select_value == 'upload_video') {
                $("#uploader_videoFeild").show();
                $("#uploader_inputFeild").hide();
                $('#uploadedPrize').hide();
                $("#link_inputFeild").hide();
            } else {
                $("#link_inputFeild").show();
                $("#uploader_inputFeild").hide();
                $('#uploadedPrize').hide();
                $("#uploader_videoFeild").hide();

            }

            $(document).on("change", "#prize_banner_option", function() {
                let select_value = $(this).val();
                console.log(select_value);
                if (select_value == 'uplaod_image') {
                    $("#uploader_inputFeild").show();
                    $('#uploadedPrize').show();
                    $("#uploader_videoFeild").hide();
                    $("#link_inputFeild").hide();
                } else if (select_value == 'upload_video') {
                    $("#uploader_videoFeild").show();
                    $("#uploader_inputFeild").hide();
                    $('#uploadedPrize').hide();
                    $("#link_inputFeild").hide();
                } else {
                    $("#link_inputFeild").show();
                    $("#uploader_inputFeild").hide();
                    $('#uploadedPrize').hide();
                    $("#uploader_videoFeild").hide();

                }
            });
        });
    </script>
@endsection
<style>
    .uploadFormGroup {
        justify-content: right;
    }

    .uploadFormBlock .form-inline .form-control {
        flex: 0 0 240px;
        box-shadow: none;
        border-radius: 0px;
    }

    #horizontal-form .uploadedPrize {
        justify-content: right;
    }

    form.prizeManagementForm {
        margin-bottom: 0px;
    }

    .prizeManagementForm #horizontal-form button.btn {
        white-space: pre;
    }

    @media (min-width: 581px) {
        .prizeManagementForm #horizontal-form {
            margin-right: 15px;
        }

    }

    @media (max-width: 580px) {
        #horizontal-form .preview label.form-label {
            flex: 0 0 100%;
        }

        #horizontal-form .preview input.form-control {
            flex: 1 0 0;
        }
    }
</style>
