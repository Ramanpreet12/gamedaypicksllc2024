@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | News</title>
@endsection

@section('subcontent')
    {{-- <h2 class="intro-y text-lg font-medium mt-10">Vacation Pacs Management</h2> --}}
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
        <h2 class="text-lg font-medium mr-auto">News Management</h2>

        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <form action="{{ route('admin/news/section_heading') }}" method="post">
                @csrf
                <div id="horizontal-form" class="px-3 flex">

                    <div class="preview mx-3">
                        <div class="form-inline">
                            <label for="section_heading" class="font-medium form-label sm:w-60">Section Title <span
                                    class="text-danger">*</span></label>
                            <input id="section_heading" type="text" class="form-control" placeholder="Section Name"
                                name="section_heading"
                                @if (!empty($NewsHeading->value)) value="{{ $NewsHeading->value }}" @else value="News" @endif>
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
            <a class="btn btn-primary shadow-md mr-2" href="{{ route('news.create') }}">Add News</a>
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
                        <th class="text-center">Title</th>
                        <th class="text-center">Header</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Updated At</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if ($get_news->isNotEmpty())
                        @forelse ($get_news as $news)
                            <tr class="intro-x">


                                <td>
                                    <div class="text-slate-500 font-medium mx-4"> {{ $news->title }} </div>
                                </td>
                                <td>
                                    <div class="text-slate-500 font-medium mx-4"> {{ $news->header }} </div>
                                </td>

                                <td class="w-40">
                                    @if (!empty($news->image))
                                        <img src="{{ asset('storage/images/news/' . $news->image) }}" class="img-fluid"
                                            alt="" height="100%" width="100%">
                                    @else
                                        <img src="{{ asset('dist/images/no-image.png') }}" alt="" class="img-fluid">
                                    @endif
                                </td>

                                <td>
                                    <div
                                        class="flex items-center justify-center {{ $news->status == 'active' ? 'text-success' : 'text-danger' }}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-2"></i>
                                        {{ $news->status == 'active' ? 'Active' : 'Inactive' }}
                                    </div>
                                </td>

                                <td class="text-center">{{ \Carbon\Carbon::parse($news->created_at)->format('j F, Y') }}
                                </td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($news->updated_at)->format('j F, Y') }}
                                </td>
                                <td class="table-report__action">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3" href="{{ route('news.edit', $news->id) }}">
                                            <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                        </a>
                                        {{-- <form action="{{ route('news.destroy', $news->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <button class="btn btn-danger show_sweetalert" type="submit" data-toggle="tooltip">  <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>
                                      </form> --}}
                                        <a data-toggle="tooltip" title="Delete">
                                            <button class="btn btn-danger confirmDelete" data-toggle="tooltip"
                                                title="Delete" module="news" module_id={{ $news->id }}>
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
