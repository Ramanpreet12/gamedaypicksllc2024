@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Vacation Pac</title>
@endsection

@section('subcontent')
    @if (session()->has('message_success'))
        <div class="alert alert-success show flex items-center mb-2 alert_messages" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2-circle"
                viewBox="0 0 16 16">
                <path
                    d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                <path
                    d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
            </svg>
            &nbsp; {{ session()->get('message_success') }}
        </div>
    @endif
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">


        <h2 class="text-lg font-medium mr-auto">Vacation Pac Management</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <form action="{{ route('admin/vacation/section_heading') }}" method="post">
                @csrf
                <div id="horizontal-form" class="px-3 flex">

                    <div class="preview mx-3">
                        <div class="form-inline">
                            <label for="section_heading" class="font-medium form-label sm:w-60">Section Title <span
                                    class="text-danger">*</span></label>
                            <input id="section_heading" type="text" class="form-control" placeholder="Section Name"
                                name="section_heading"
                                @if (!empty($VacationHeading->value)) value="{{ $VacationHeading->value }}" @else value="Vacation Pac" @endif>
                        </div>

                        <div class="form-inline">
                            <label for="section_heading" class="font-medium form-label sm:w-60"></label>
                            @error('section_heading')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary w-30">Update Title</button>
                    </div>

                </div>
            </form>
            <a class="btn btn-primary shadow-md mr-2" href="{{ route('vacation.create') }}">Add Vacation Pac</a>
            <div class="dropdown ml-auto sm:ml-0">
            </div>
        </div>

    </div>

    <div class="grid grid-cols-12 gap-6 mt-5 p-5 bg-white mb-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="vacation_table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center">Heading</th>
                        <th class="text-center">Image / Video</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Serial</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Updated At</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($vacations->isNotEmpty())
                        @forelse ($vacations as $vacation)
                            <tr class="intro-x">
                                <td>
                                    <div class="text-slate-500 font-medium mx-4"> {{ $vacation->title }} </div>

                                </td>
                                <td class="w-40">
                                    @if (!empty($vacation->image_video))
                                        @php
                                            $get_imageName = $vacation->image_video;
                                            $get_extension = explode('.', $get_imageName);
                                            $ext = end($get_extension);
                                        @endphp
                                        @if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'svg' || $ext == 'webp')
                                            <img src="{{ asset('storage/images/vacation/' . $vacation->image_video) }}"
                                                alt="" height="100%" width="100%">
                                        @else
                                            <video width="250" height="250" loop="true" autoplay="autoplay" controls
                                                muted id="video" preload="metadata"
                                                poster="{{ asset('front/img/poster 1.png') }}">
                                                <source
                                                    src="{{ asset('storage/images/vacation/' . $vacation->image_video) }}"
                                                    type="video/mp4">
                                            </video>
                                        @endif
                                    @else
                                        <img src="{{ asset('dist/images/no-image.png') }}" alt=""
                                            class="img-fluid">
                                    @endif
                                </td>

                                <td>
                                    <div
                                        class="flex items-center justify-center {{ $vacation->status == 'active' ? 'text-success' : 'text-danger' }}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-2"></i>
                                        {{ $vacation->status == 'active' ? 'Active' : 'Inactive' }}
                                    </div>
                                </td>
                                <td class="text-center">{{ $vacation->serial }}</td>
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($vacation->created_at)->format('j F , Y , H:i') }}</td>
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($vacation->updated_at)->format('j F , Y , H:i') }}</td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3"
                                            href="{{ route('vacation.edit', $vacation->id) }}">
                                            <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                        </a>
                                        {{-- <form action="{{ route('vacation.destroy', $vacation->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <button class="btn btn-danger show_sweetalert" type="submit" data-toggle="tooltip">  <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>
                                      </form> --}}

                                        <a data-toggle="tooltip" title="Delete">
                                            <button class="btn btn-danger confirmDelete" data-toggle="tooltip"
                                                title="Delete" module="vacation" module_id={{ $vacation->id }}>
                                                <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No Records found</td>
                                <p>No Records found</p>
                            </tr>
                        @endforelse
                    @endif
                </tbody>
            </table>
        </div>
    @endsection
    @section('script')
        <script>
            $(function() {
                $('#vacation_table').DataTable();
            });
        </script>
    @endsection
