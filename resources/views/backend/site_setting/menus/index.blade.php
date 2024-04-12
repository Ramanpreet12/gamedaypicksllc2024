@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Menu Setting</title>
@endsection

@section('subcontent')

    @if (session()->has('message_success'))
    <div class="alert alert-success show flex items-center mb-2 alert_messages" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-check2-circle" viewBox="0 0 16 16">
            <path
                d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
            <path
                d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
        </svg>
        &nbsp; {{ session()->get('message_success') }}
    </div>

@endif
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Menu Management</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a class="btn btn-primary shadow-md mr-2" href="{{route('menu.create')}}" id="menu">Add Menu</a>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5 p-5 bg-white mb-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="menus_table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center whitespace-nowrap">Title</th>
                        <th class="text-center whitespace-nowrap">Parent Menu</th>
                        <th class="text-center whitespace-nowrap">Created At</th>
                        <th class="text-center whitespace-nowrap">Updated At</th>
                        <th class="text-center whitespace-nowrap">Status</th>
                        <th class="text-center whitespace-nowrap">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($get_menus->isNotEmpty())
                    @forelse ($get_menus as $menu)
                        <tr class="intro-x">

                            <td>
                             <div class="text-slate-500 font-medium mx-4">  {{$menu->title}} </div>

                            </td>
                            <td class="text-center">{{ $menu->parent }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($menu->created_at)->format('j F, Y') }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($menu->updated_at)->format('j F,Y') }}</td>
                            <td class="w-40">

                                <div class="flex items-center justify-center {{ $menu->status =='active' ? 'text-success' : 'text-danger' }}">
                                    <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{ $menu->status =='active' ? 'Active' : 'Inactive' }}
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="{{ route('menu.edit',$menu->id) }}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    {{-- <form action="{{ route('menu.destroy', $menu->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <button class="btn btn-danger show_sweetalert" type="submit" data-toggle="tooltip">  <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>
                                      </form> --}}

                                      <a data-toggle="tooltip" title="Delete">
                                        <button class="btn btn-danger confirmDelete" data-toggle="tooltip"
                                            title="Delete" module="menu" module_id={{ $menu->id }}>
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
    </div>
@endsection



   @section('script')
   <script>
    $(function() {
      $('#menus_table').DataTable();
    });
   </script>
   @endsection
