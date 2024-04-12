@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Team Result</title>
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


        <h2 class="text-lg font-medium mr-auto">Team Result Management</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">

        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5 p-5 bg-white mb-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="team_result_table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center whitespace-nowrap">Match</th>
                        <th class="text-center whitespace-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>

                        <tr class="intro-x">
                            <td>
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        @if (!empty($team_results->first_team_id->logo))
                                        <img src="{{asset('storage/images/team_logo/'.$team_results->first_team_id->logo)}}" alt="" height="50px" width="100px" class="rounded-full">
                                        @else
                                                <img src="{{asset('dist/images/no-image.png')}}" alt="" class="img-fluid rounded-full">
                                        @endif
                                    </div>
                                    <div class="text-slate-500 font-medium mx-4">
                                        {{ $team_results->first_team_id->name ?? '' }}
                                        </div>
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <form action="{{ url('admin/team_result/edit/' . $team_results->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $team_results->id }}"
                                        name="fixture_id">
                                        <input type="hidden" value="{{ $team_results->first_team_id->id }}"
                                            name="winner_team">
                                            <input type="hidden" value="{{ $team_results->second_team_id->id }}"
                                            name="loss_team">
                                        <button class="btn btn-success" type="submit" data-toggle="tooltip" fixture_id="{{$team_results->id}}" data="{{$team_results->first_team_id->id}}"> <i
                                                data-feather="check-square" class="w-4 h-4 mr-1"></i> Make win</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        @if (!empty($team_results->second_team_id->logo))
                                        <img src="{{asset('storage/images/team_logo/'.$team_results->second_team_id->logo)}}" alt="" height="50px" width="100px" class="rounded-full">
                                        @else
                                                <img src="{{asset('dist/images/no-image.png')}}" alt="" class="img-fluid rounded-full">
                                        @endif
                                    </div>
                                    <div class="text-slate-500 font-medium mx-4">
                                        {{ $team_results->second_team_id->name ?? '' }}
                                        </div>
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">

                                    <form action="{{ url('admin/team_result/edit/' . $team_results->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $team_results->id }}"
                                        name="fixture_id">
                                        <input type="hidden" value="{{ $team_results->second_team_id->id }}"
                                            name="winner_team">
                                            <input type="hidden" value="{{ $team_results->first_team_id->id }}"
                                            name="loss_team">
                                        <button class="btn btn-success" type="submit" data-toggle="tooltip"  fixture_id="{{$team_results->id}}" data="{{$team_results->second_team_id->id}}">
                                             <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Make win</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>

    </div>

@endsection
   @section('script')
   <script>
    $(function() {
      $('#team_result_table').DataTable();
    });
   </script>
   @endsection
