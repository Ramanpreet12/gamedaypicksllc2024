@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Region</title>
@endsection

@section('subcontent')
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
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Regions Management</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a class="btn btn-primary shadow-md mr-2" href="{{route('region.create')}}" id="add_banner">Add New Region</a>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5 p-5 bg-white">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="region_table">
                <thead class="bg-primary text-white">
                    <tr>

                        <th class="text-center whitespace-nowrap">Region Name</th>
                        <th class="text-center whitespace-nowrap">Serial Order</th>
                        <th class="text-center whitespace-nowrap">Created At</th>
                        <th class="text-center whitespace-nowrap">Updated At</th>
                        <th class="text-center whitespace-nowrap">Status</th>
                        <th class="text-center whitespace-nowrap">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($regions->isNotEmpty())


                    @forelse ($regions as $region)
                        <tr class="intro-x">
                            <td  class="text-center">
                                <div class="text-slate-500 font-medium whitespace-nowrap mx-4">  {{$region->region}} </div>
                            </td>

                            <td class="text-center">{{$region->position}}</td>
                            <td class="text-center">{{\Carbon\Carbon::parse($region->created_at)->format('j F, Y')}}</td>
                            <td class="text-center">{{\Carbon\Carbon::parse($region->updated_at)->format('j F, Y')}}</td>

                            <td class="w-40">

                                <div class="flex items-center justify-center {{ $region->status =='active' ? 'text-success' : 'text-danger' }}">
                                    <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{ $region->status =='active' ? 'Active' : 'Inactive' }}
                                </div>
                            </td>

                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="{{route('region.edit',$region->id)}}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    {{-- <form action="{{route('region.destroy', $region->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <button class="btn btn-danger show_sweetalert" type="submit" data-toggle="tooltip">  <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>
                                      </form> --}}

                                      <a data-toggle="tooltip" title="Delete">
                                        <button class="btn btn-danger confirmDelete" data-toggle="tooltip"
                                        title="Delete" module="region" module_id={{ $region->id }}>
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
        <!-- END: Data List -->

    </div>


@endsection

@section('script')
<script>
 $(function() {
   $('#region_table').DataTable();
 });
</script>
@endsection
