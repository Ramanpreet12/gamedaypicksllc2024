@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }}  | Pre Signup Users</title>
@endsection

@section('subcontent')
    {{-- <h2 class="intro-y text-lg font-medium mt-10">Banners Management</h2> --}}
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

        <h2 class="text-lg font-medium mr-auto">All Pre-signup Users</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5 p-5 bg-white mb-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="user_table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center whitespace-nowrap">S.no.</th>
                        <th class="text-center whitespace-nowrap">Pre Signup User Name</th>
                        <th class="text-center whitespace-nowrap">Email </th>
                        <th class="text-center whitespace-nowrap">Zipcode </th>
                        <th class="text-center whitespace-nowrap">Created At</th>
                        <th class="text-center whitespace-nowrap">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($pre_signup_users->isNotEmpty())
                        @php
                            $count = '';
                        @endphp
                        @foreach ($pre_signup_users as $user)
                            <tr class="intro-x">
                                <td>
                                    <div class="text-slate-500 font-medium whitespace-nowrap"> {{ ++$count }}
                                    </div>
                                </td>

                                <td>
                                    <div class="text-slate-500 font-medium whitespace-nowrap"> {{ $user->name }}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-slate-500 font-medium whitespace-nowrap"> {{ $user->email }}
                                    </div>
                                </td>

                                <td>
                                    <div class="text-slate-500 font-medium whitespace-nowrap"> {{ $user->zipcode }}
                                    </div>
                                </td>

                                <td class="text-center">{{ \Carbon\Carbon::parse($user->created_at)->format('j F, Y') }}
                                </td>
                                <td class="table-report__action w-60">
                                    <div class="flex justify-center items-center">

                                        <a class="flex items-center mr-3"
                                            href="{{ url('admin/pre_user_paymentdetails/' . $user->id) }}">
                                            <button class="btn btn-primary"> <i data-feather="dollar-sign"
                                                    class="w-4 h-4 mr-2"></i> View Payments </button>
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
            $('#user_table').DataTable();
        });
    </script>
@endsection
