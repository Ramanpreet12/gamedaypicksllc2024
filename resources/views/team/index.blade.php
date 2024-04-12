@extends('../layout/' . $layout)

@section('subhead')
    <title>NFL | Teams</title>
@endsection

@section('subcontent')
    {{-- <h2 class="intro-y text-lg font-medium mt-10">Banners Management</h2> --}}
    @if (session()->has('success_msg'))
    <div class="alert alert-success show flex items-center mb-2 alert_messages" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-check2-circle" viewBox="0 0 16 16">
            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
        </svg>
        &nbsp; {{ session()->get('success_msg') }}
    </div>

@endif

@if (session('error_msg'))
<div class="alert alert-danger-soft show flex items-center mb-2 alert_messages" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
        class="feather feather-alert-octagon w-6 h-6 mr-2">
        <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
        <line x1="12" y1="8" x2="12" y2="12"></line>
        <line x1="12" y1="16" x2="12.01" y2="16"></line>
    </svg>
    {{ session('error_msg') }}
</div>
@endif

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">


        <h2 class="text-lg font-medium mr-auto">Teams Management</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a class="btn btn-primary shadow-md mr-2" href="{{route('team.create')}}" id="add_banner">Add New Team</a>

        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5 p-5 bg-white mb-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="team_table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center">League</th>
                        <th class="text-center">Region</th>
                        <th class="text-center">Logo </th>
                        <th class="text-center">Name </th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Updated At</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($teams->isNotEmpty())
                    @forelse ($teams as $team)
                        <tr class="intro-x">
                            <td>
                                <div class="text-slate-500 font-medium mx-4">  {{$team->league}} </div>
                            </td>
                            <td class="text-center">{{ $team->region->region ?? ''}}</td>

                            <td class="">
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        @if (!empty($team->logo))
                                        <img src="{{asset('storage/images/team_logo/'.$team->logo)}}" alt="" height="50px" width="100px" class="rounded-full">
                                        @else
                                                <img src="{{asset('dist/images/no-image.png')}}" alt="" class="img-fluid rounded-full">
                                        @endif
                                    </div>

                                </div>
                            </td>


                            <td class="text-center">{{ $team->name }}</td>
                            <td class="">
                                <div class="flex items-center justify-center {{ $team->status =='active' ? 'text-success' : 'text-danger' }}">
                                    <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{ $team->status =='active' ? 'Active' : 'Inactive' }}
                                </div>
                            </td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($team->created_at)->format('j F, Y') }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($team->updated_at)->format('j F, Y') }}</td>


                            <td class="table-report__action">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="{{ route('team.edit',$team->id) }}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>

                                    <form action="{{ route('team.destroy', $team->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <button class="btn btn-danger show_sweetalert" type="submit" data-toggle="tooltip">  <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>
                                      </form>


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
        <!-- END: Data List -->

@endsection
   @section('script')
   <script>
    $(function() {
      $('#team_table').DataTable();
    });
   </script>
   @endsection
