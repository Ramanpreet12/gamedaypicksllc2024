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
        <h2 class="text-lg font-medium mr-auto">Users Details</h2>
        <a href="{{route('admin/payments')}}"><button class="btn btn-primary">Back</button></a>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5 p-5 bg-white mb-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <div class="table-responsive">
              <table class="table table-striped table-hover table-bordered">


                {{-- {{dd($user_type)}} --}}
                <tr>
                    <td> <b> User Name :</b> </td>
                    <td>{{  $userDetails->name ?? ''}}</td>
                </tr>

                <tr>
                    <td><b> User Email : </b></td>
                    <td>{{$userDetails->email ?? ''}}</td>
                </tr>
                <tr>
                    <td><b> Group : </b></td>
                    <td>{{$userDetails->group ?? ''}}</td>
                </tr>
                @if ((isset($userDetails->user_team_name )) && (isset($userDetails->user_team_logo)))
                <tr>
                    <td><b> User Team : </b></td>
                    <td>


                        <img src="{{asset('storage/images/team_logo/'.$userDetails->user_team_logo)}}" alt="">
                        {{$userDetails->user_team_name ?? ''}}
                        @else
                            {{''}}
                       </td>
                </tr>
                @endif

                <tr>
                    <td><b> D.O.B : </b></td>
                    <td>{{$userDetails->dob ?? ''}}</td>
                </tr>
                <tr>
                    <td><b> Phone Number : </b></td>
                    <td>{{$userDetails->country_code ?? '' }} {{$userDetails->phone_number ?? ''}}</td>
                </tr>

                <tr>
                    <td><b> ID Proof : </b></td>
                    @if ($userDetails !=  null)
                    <td>
                        @if ($userDetails->id_proof == 'driver_license')
                            @php
                                $id_proof = "Valid Driver's License";
                            @endphp
                        @endif

                        @if ($userDetails->id_proof == 'birth_certificate')
                        @php
                            $id_proof = "Birth Certificate";
                        @endphp
                        @endif

                        @if ($userDetails->id_proof == 'state_issued_id_card')
                        @php
                            $id_proof = "State-issued Identification Card";
                        @endphp
                        @endif

                        @if ($userDetails->id_proof == 'social_security_card')
                        @php
                            $id_proof = "Social Security Card";
                        @endphp
                        @endif

                        @if ($userDetails->id_proof == 'military_id_card')
                        @php
                            $id_proof = "Military Identification Card";
                        @endphp
                        @endif

                        @if ($userDetails->id_proof == 'passort_card')
                        @php
                            $id_proof = "Passport or Passport Card";
                        @endphp
                        @endif



                        {{$id_proof ?? ''}}
                    </td>
                    @endif

                    {{-- <td>{{$userDetails->id_proof}} </td> --}}
                </tr>

                <tr>
                    <td><b> ID Proof Number  : </b></td>
                    <td>{{$userDetails->id_proof_number ?? ''}} </td>
                </tr>


                <tr>
                    <td><b> Address : </b></td>
                    <td>{{$userDetails->address ?? ''}}</td>
                </tr>
                <tr>
                    <td><b> City : </b></td>
                    <td>{{$userDetails->city ?? ''}}</td>
                </tr>
                <tr>
                    <td><b> State : </b></td>
                    <td>{{$userDetails->state_name ?? ''}}</td>
                </tr>
                <tr>
                    <td><b> Zip code : </b></td>
                    <td>{{$userDetails->zipcode ?? ''}}</td>
                </tr>

                <tr>
                    <td><b> Country : </b></td>
                    <td>{{$userDetails->country ?? ''}}</td>
                </tr>
                <tr>
                    <td><b> Region :  </b></td>
                    <td>{{$userDetails->regionName ?? ''}}</td>
                </tr>

                <tr>
                    <td><b> User Type :  </b></td>
                    <td>{{$user_type ?? ''}}</td>
                </tr>


                {{-- <tr>
                    <td><b> Subscribed :  </b></td>
                    <td>@if (isset($userDetails->payment_user_id))
                        {{'Subscribed'}}
                    @else
                    {{'Not Subscribed'}}
                    @endif</td>
                </tr> --}}

                <tr>

                    <td><b> User Image :  </b></td>
                    <td>
                        @if (!empty($userDetails->photo))
                            <img class="rounded-md w-40" alt="Admin Image" src="{{asset('storage/images/user_images/'. $userDetails->photo) }}">
                        @else
                            <img class="rounded-md w-40" alt="Admin Image" src="{{asset('dist/images/dummy_image.webp')}}">
                        @endif
                    </td>
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
