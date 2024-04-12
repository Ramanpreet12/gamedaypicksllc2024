@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Winners</title>
@endsection

@section('subcontent')
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
        <h2 class="text-lg font-medium mr-auto">All Winners</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a class="btn btn-primary shadow-md mr-2" href="{{route('winner.index')}}" id="">Back</a>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5 p-5 bg-white mb-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2 table-responsive" id="view_winners">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center">Season </th>
                        <th class="text-center">User Name </th>
                        <th class="text-center">User Email </th>
                        <th class="text-center">User Photo </th>
                        <th class="text-center">Points </th>
                        <th class="text-center">Prize</th>
                        <th class="text-center">Prize Photo</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Updated At</th>
                        <th class="text-center">Action</th>

                    </tr>
                </thead>

                <tbody>

                    @if ($get_winners->isNotEmpty())
                    @foreach ($get_winners as $winner)

                        <tr class="intro-x">
                            <td class="text-center">{{$winner->season->season_name ?? ''}}</td>
                            <td class="text-center">
                               {{ $winner->user->name ?? ''}}
                            </td>
                            <td class="text-center">
                               {{ $winner->user->email ?? ''}}
                            </td>
                            <td class="">
                                <div class="flex">

                                    <div class="w-10 h-10 image-fit zoom-in">


                                        @if (!empty($winner->user->photo))
                                        <img src="{{asset('storage/images/user_images/'.$winner->user->photo)}}" alt="" height="120px" width="200px" class="rounded-full">
                                        @else

                                                <img src="{{asset('dist/images/dummy_image.webp')}}" alt="" class="img-fluid rounded-full">
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                               {{ $winner->total_points ?? '0' }}
                            </td>
                            <td class="text-center">
                                {{$winner->prize->name ?? ''}}
                            </td>
                            <td class="">
                                <div class="flex">
                                    <div class="zoom-in">
                                        @if (!empty($winner->prize->image))
                                        <img src="{{asset('storage/images/prize/'.$winner->prize->image)}}" alt=""    height="50px" width="100px">
                                        @else
                                                <img src="{{asset('dist/images/dummy_image.webp')}}" alt="" class="img-fluid rounded-full">
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                               {{\Carbon\Carbon::parse($winner->created_at)->format('j F, Y')}}
                            </td>
                            <td class="text-center">
                                {{\Carbon\Carbon::parse($winner->updated_at)->format('j F, Y')}}
                            </td>

                            <td class="table-report__action">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="{{ route('winner.edit',$winner->id) }}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <a data-toggle="tooltip" title="Delete">
                                        <button class="btn btn-danger confirmDelete" data-toggle="tooltip"
                                            title="Delete" module="view_winner" module_id={{ $winner->id }}>
                                            <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>
                                    </a>

                                    {{-- <form action="{{ route('winner.destroy', $winner->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <button class="btn btn-danger show_sweetalert" type="submit" data-toggle="tooltip">  <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>
                                      </form> --}}
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
      $('#view_winners').DataTable({
        // scrollX: true,
      });
    });
   </script>
   @endsection
