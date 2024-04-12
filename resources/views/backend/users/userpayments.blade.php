@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Users</title>
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
        <h2 class="text-lg font-medium mr-auto">Users Payment Details</h2>
        <a href="{{route('admin/user')}}"><button class="btn btn-primary">Back</button></a>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5 p-5 bg-white mb-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <div class="table-responsive">
              <table class="table table-striped table-hover table-bordered">


                {{-- {{dd($userPaymentData)}} --}}
                <tr>
                    <td> <b> Season :</b> </td>
                    <td>{{$userPaymentData->season_name }}</td>
                </tr>

                <tr>
                    <td> <b> Transaction Id  :</b> </td>
                    <td>{{$userPaymentData->transaction_id }}</td>
                </tr>

                <tr>
                    <td><b>  Payment Status: </b></td>
                    <td>{{$userPaymentData->status }}</td>
                </tr>
                <tr>
                    <td><b>  Payment Method : </b></td>
                    <td>{{$userPaymentData->payment_method }}</td>
                </tr>


                <tr>
                    <td><b>Amount : </b></td>
                    <td>{{$userPaymentData->amount }}</td>
                </tr>
                <tr>
                    <td><b> Payment Expire Date  : </b></td>
                    <td>{{$userPaymentData->exp_month_card }} {{$userPaymentData->exp_year_card}}</td>
                </tr>
                <tr>
                    <td><b>Biller Name  : </b></td>
                    <td>{{$userPaymentData->name ?? ''}} </td>
                </tr>


                <tr>
                    <td><b> Biller Address  : </b></td>
                    <td>{{$userPaymentData->address}}</td>
                </tr>
                <tr>
                    <td><b> Biller City : </b></td>
                    <td>{{$userPaymentData->city}}</td>
                </tr>

                <tr>
                    <td><b> Biller Country : </b></td>
                    <td>{{$userPaymentData->country}}</td>
                </tr>


              </table>
        </div>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->

        <!-- END: Pagination -->
    </div>
@endsection



   @section('script')
   <script>
    $(function() {
      $('#user_table').DataTable({
        scrollX: true,
      });
    });
   </script>
   @endsection
