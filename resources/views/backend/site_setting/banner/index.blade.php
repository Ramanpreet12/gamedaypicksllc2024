@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Banner</title>
@endsection

@section('subcontent')
    @if (session()->has('success'))
        <div class="alert alert-success show flex items-center mb-2 alert_messages" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2-circle"
                viewBox="0 0 16 16">
                <path
                    d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                <path
                    d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
            </svg>
            &nbsp; {{ session()->get('success') }}
        </div>
    @endif
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Banners Management</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a class="btn btn-primary shadow-md mr-2" href="{{ route('banner.create') }}" id="add_banner">Add New Banner</a>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5 p-5 bg-white mb-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="banner_table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center">Heading</th>
                        <th class="text-center">Serial</th>
                        <th class="text-center">Image</th>

                        <th class="text-center">Created At</th>
                        <th class="text-center">Updated At</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @if ($banners->isNotEmpty())
                        @foreach ($banners as $banner)
                            <tr class="intro-x">

                                <td><div class="text-slate-500 font-medium whitespace-nowrap mx-4"> {{ $banner->heading }}
                                    </div>

                                </td>
                                <td class="text-center">{{ $banner->serial }}</td>

                                <td>
                                    @if (!empty($banner->image))
                                        <img src="{{ asset('storage/images/banners/' . $banner->image) }}" alt=""
                                            height="50px" width="100px">
                                    @else
                                        <img src="{{ asset('dist/images/no-image.png') }}" alt="" class="img-fluid">
                                    @endif

                                </td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($banner->created_at)->format('j F, Y') }}
                                </td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($banner->updated_at)->format('j F, Y') }}
                                </td>
                                <td>

                                    <div class="flex items-center justify-center {{ $banner->status == 'Active' ? 'text-success' : 'text-danger' }}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-2"></i>
                                        {{ $banner->status == 'Active' ? 'Active' : 'Inactive' }}
                                    </div>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3" href="{{ route('banner.edit', $banner->id) }}">
                                            <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                        </a>
                                        {{-- <form action="{{ route('banner.destroy', $banner->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn btn-danger show_sweetalert" type="submit" data-toggle="tooltip">  <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>

                                  </form> --}}

                                        <a data-toggle="tooltip" title="Delete">
                                            <button class="btn btn-danger confirmDelete" data-toggle="tooltip"
                                                title="Delete" module="banner" module_id={{ $banner->id }}>
                                                <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(function() {
            $('#banner_table').DataTable();
        });
    </script>
@endsection
