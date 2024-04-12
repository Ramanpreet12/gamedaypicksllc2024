@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Subscribers Payments</title>
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


        <h2 class="text-lg font-medium mr-auto">Subscribers Payments</h2>

    </div>

    <div class="grid grid-cols-12 gap-6 mt-5 p-5 bg-white mb-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="payment_table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center">S.no.</th>
                        <th class="text-center ">Season Name</th>
                        <th class="text-center">User Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Transaction ID</th>
                        <th class="text-center">Reference No.</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Created At</th>
                        {{-- <th class="text-center whitespace-nowrap"></th> --}}
                        <th class="text-center whitespace-nowrap">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($get_payments->isNotEmpty())


                    @php
                        $count = 1;
                    @endphp
                    @forelse ($get_payments as $payment)
                        <tr class="intro-x">
                            <td>
                                <div class="text-slate-500 font-medium mx-4"> {{$count++}} </div>
                            </td>
                            <td class="text-center">{{ $payment->season->season_name ?? ''}}</td>

                            <td class="text-center">{{ $payment->user->name ?? ''}}</td>
                            <td class="text-center">{{ $payment->user->email ?? ''}}</td>
                            <td class="text-center">{{ $payment->amount}} {{ $payment->currency}}</td>
                            <td class="text-center">{{$payment->transaction_id}}</td>
                            <td class="text-center">{{$payment->ref_num}}</td>
                            {{-- <td class="text-center">{{$payment->Action}}</td> --}}
                            <td class="">
                                @if ($payment->status == 'succeeded' )
                                <div class="flex items-center justify-center text-success">
                                    <i data-feather="check-square" class="w-4 h-4 mr-2"></i>{{$payment->status}}
                                </div>
                                @else
                                <div class="flex items-center justify-center text-danger">
                                    <i data-feather="alert-circle" class="w-4 h-4 mr-2"></i> {{$payment->status}}
                                </div>
                                @endif

                            </td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($payment->created_at)->format('j F, Y , H:i') }}</td>
                            {{-- <td class="text-center">{{ \Carbon\Carbon::parse($user->updated_at)->format('j F, Y') }}</td> --}}
                            <td class="table-report__action w-60">
                                <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="{{ url('admin/Userdetails/'.$payment->user_id) }}">
                                    <button class="btn btn-primary w-32"><i data-feather="eye" class="w-4 h-4 mr-2"></i> View User </button>
                                </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center">No Records found</td>
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
      $('#payment_table').DataTable({
        // scrollX: true,
      });
    });
   </script>
   @endsection
