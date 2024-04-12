@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Greek Order Users Details</title>
@endsection

@section('subcontent')

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
        <h2 class="text-lg font-medium mr-auto">Users Details</h2>
        <a href="{{ route('admin/greek-order-payments') }}"><button class="btn btn-primary">Back</button></a>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5 p-5 bg-white mb-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">

                    <tr>
                        <td> <b> User Name :</b> </td>
                        <td>{{ $get_users_order_details->name ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b> User Email : </b></td>
                        <td>{{ $get_users_order_details->email ?? '' }}</td>
                    </tr>
                    <tr>
                        <td><b> Coupon Code : </b></td>
                        <td>{{ $get_users_order_details->coupon_code ?? '' }}</td>
                    </tr>
                    <tr>
                        <td><b> D.O.B : </b></td>
                        <td>{{ $get_users_order_details->dob ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b> Age : </b></td>
                        <td>{{ $get_users_order_details->age ?? '' }}</td>
                    </tr>
                    <tr>
                        <td><b> Phone Number : </b></td>
                        <td>{{ $get_users_order_details->country_code ?? '' }}
                            {{ $get_users_order_details->phone_number ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b> Address : </b></td>
                        <td>{{ $get_users_order_details->address ?? '' }}</td>
                    </tr>
                    <tr>
                        <td><b> City : </b></td>
                        <td>{{ $get_users_order_details->city ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b> Zip code : </b></td>
                        <td>{{ $get_users_order_details->zipcode ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b> Country : </b></td>
                        <td>{{ $get_users_order_details->country ?? '' }}</td>
                    </tr>

                    <tr>

                        <td><b> User Image : </b></td>
                        <td>
                            @if (!empty($get_users_order_details->photo))
                                <img class="rounded-md w-40" alt="User Image"
                                    src="{{ asset('storage/images/user_images/' . $get_users_order_details->photo) }}">
                            @else
                                <img class="rounded-md w-40" alt="User Image"
                                    src="{{ asset('dist/images/dummy_image.webp') }}">
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    {{-- jersey Details  --}}

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Product Details</h2>
        <a href="{{ route('admin/greek-order-payments') }}"><button class="btn btn-primary">Back</button></a>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5 p-5 bg-white mb-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <tr>
                        <td><b>Order ID : </b></td>
                        <td>{{ $get_users_order_details->greek_order_id ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b>Jersey Name: </b></td>
                        <td>{{ $get_users_order_details->product_jersy_name ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b> Jersey Number : </b></td>
                        <td>{{ $get_users_order_details->line_number ?? '' }}</td>
                    </tr>
                    <tr>
                        <td > <b> Product Name :</b> </td>
                        <td style="width:700px;">{{ $get_users_order_details->product_title ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b> Product Price : </b></td>
                        <td>{{ $get_users_order_details->product_price ?? '' }}</td>
                    </tr>
                    <tr>
                        <td><b> Product Size : </b></td>
                        <td>{{ $get_users_order_details->product_size ?? '' }}</td>
                    </tr>


                    <tr>
                        <td><b> Product Quantity : </b></td>
                        <td>{{ $get_users_order_details->product_qty ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b> Product Type : </b></td>
                        <td>{{ ucfirst($get_users_order_details->gender)  ?? '' }}</td>
                    </tr>


                    <tr>

                        <td><b> Product Image : </b></td>
                        <td>
                            @if (!empty($get_users_order_details->image_name))
                                <img class="rounded-md w-40" alt="Product Image"
                                    src="{{ asset('storage/images/greek_store/' . $get_users_order_details->image_name) }}">
                            @else
                                <img class="rounded-md w-40" alt="User Image"
                                    src="{{ asset('dist/images/no-image.png') }}">
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
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
