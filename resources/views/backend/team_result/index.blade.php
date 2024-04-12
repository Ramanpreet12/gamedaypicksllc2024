@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Team Result</title>
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
        <h2 class="text-lg font-medium mr-auto">Team Result Management</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <form action="{{ route('admin/leaderboard/section_heading') }}" method="post">
                @csrf
                <div id="horizontal-form" class="px-3 flex">

                    <div class="preview mx-3">
                        <div class="form-inline">
                            <label for="section_heading" class="font-medium form-label sm:w-60">Section Title <span
                                    class="text-danger">*</span></label>
                            <input id="section_heading" type="text" class="form-control" placeholder="Section Name"
                                name="section_heading"
                                @if (!empty($leaderboardHeading->value)) value="{{ $leaderboardHeading->value }}" @else value="Player's Leadeboard" @endif>
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
        </div>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">

        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5 p-5 bg-white mb-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="team_result_table">
                <thead class="bg-primary text-white">
                    <tr>

                        <th class="text-center">S.no.</th>
                        <th class="text-center">Season</th>
                        <th class="text-center">Week</th>
                        <th class="text-center">Team One</th>
                        <th class="text-center"></th>
                        <th class="text-center">Team Two</th>
                        <th class="text-center">Win</th>
                        <th class="text-center">Loss</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @php
                        $count = '';
                    @endphp
                    @if ($fixtures->isNotEmpty())
                        @forelse ($fixtures as $fixture)
                            <tr class="intro-x">
                                <td class="text-center">{{ ++$count }}</td>
                                <td>
                                    <div class="text-slate-500 font-medium mx-4"> {{ $fixture->season->season_name ?? '' }}
                                    </div>
                                </td>

                                <td class="text-center">{{ $fixture->week ?? '' }}</td>

                                <td class="text-center">
                                    <div class="flex">
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            @if (!empty($fixture->first_team_id->logo))
                                                <img src="{{ asset('storage/images/team_logo/' . $fixture->first_team_id->logo) }}"
                                                    alt="" height="50px" width="100px" class="rounded-full">
                                            @else
                                                <img src="{{ asset('dist/images/no-image.png') }}" alt=""
                                                    class="img-fluid rounded-full">
                                            @endif
                                        </div>
                                        <div class="text-slate-500 font-medium mx-4">
                                            {{ $fixture->first_team_id->name ?? '' }}
                                        </div>
                                    </div>
                                </td>

                                <td class="text-center text-slate-500 font-medium mx-4">vs</td>

                                <td class="text-center">
                                    <div class="flex">
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            @if (!empty($fixture->second_team_id->logo))
                                                <img src="{{ asset('storage/images/team_logo/' . $fixture->second_team_id->logo) }}"
                                                    alt="" height="50px" width="100px" class="rounded-full">
                                            @else
                                                <img src="{{ asset('dist/images/no-image.png') }}" alt=""
                                                    class="img-fluid rounded-full">
                                            @endif
                                        </div>
                                        <div class="text-slate-500 font-medium mx-4">
                                            {{ $fixture->second_team_id->name ?? '' }}
                                        </div>
                                    </div>
                                </td>


                                <td class="text-center">
                                    <div class="flex">
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            @if (!empty($fixture->win_logo))
                                                <img src="{{ asset('storage/images/team_logo/' . $fixture->win_logo) }}"
                                                    alt="" height="50px" width="100px" class="rounded-full">
                                            @endif
                                        </div>
                                        <div class="text-slate-500 font-medium mx-4">
                                            {{ $fixture->win_name ?? '' }}
                                        </div>
                                    </div>
                                <td class="text-center">
                                    <div class="flex">
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            @if (!empty($fixture->loss_logo))
                                                <img src="{{ asset('storage/images/team_logo/' . $fixture->loss_logo) }}"
                                                    alt="" height="50px" width="100px" class="rounded-full">
                                            @endif
                                        </div>
                                        <div class="text-slate-500 font-medium mx-4">
                                            {{ $fixture->loss_name ?? '' }}
                                        </div>
                                    </div>
                                </td>

                                <td class="table-report__action w-60">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3"
                                            href="{{ url('admin/team_result/edit/' . $fixture->id) }}">
                                            <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">No Records found</td>

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
                $('#team_result_table').DataTable();
            });
        </script>
    @endsection
