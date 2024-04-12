@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Greek Store</title>
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

    @if (session('message_error'))
        <div class="alert alert-danger-soft show flex items-center mb-2 alert_messages" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-alert-octagon w-6 h-6 mr-2">
                <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            {{ session('message_error') }}
        </div>
    @endif
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Greek Store Product Management</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a class="btn btn-primary shadow-md mr-2" href="{{ route('greek-store.create') }}" >Add New
                Product</a>
        </div>
    </div>


    <div class="grid grid-cols-12 gap-6 mt-5 p-5 bg-white mb-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="greek_product_table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center whitespace-nowrap">Heading</th>
                        {{-- <th class="text-center whitespace-nowrap">Price</th> --}}
                        <th class="text-center whitespace-nowrap">Type</th>
                        <th class="text-center whitespace-nowrap">Image</th>
                        <th class="text-center whitespace-nowrap">Created At</th>
                        <th class="text-center whitespace-nowrap">Updated At</th>
                        <th class="text-center whitespace-nowrap">Status</th>
                        <th class="text-center whitespace-nowrap">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($get_products->isNotEmpty())
                    @foreach ($get_products as $product)
                        <tr class="intro-x">

                            <td>
                                <div> {{ $product->product_name }} </div>
                            </td>
                            {{-- <td class="text-center">{{ $product->price }}</td> --}}
                            <td class="text-center">{{ Str::ucfirst($product->product_type)  }}</td>
                            <td>

                                <!-- if admin has not select any image as front image then show array's [0] index image as front image --->
                                {{-- @if (!empty($product->product_images['0']->image_name))
                                    <img src="{{ asset('storage/images/products/' . $product->product_images['0']->image_name) }}"
                                        alt="" height="50px" width="100px">
                                @else
                                    <img src="{{ asset('dist/images/no-image.png') }}" alt="" class="img-fluid">
                                @endif --}}

                                @if (!empty($product->product_image))
                                        <img src="{{ asset('storage/images/products/' . $product->product_image) }}"
                                            alt="" height="50px" width="100px">
                                    @elseif (!empty($product->product_images['0']->image_name))
                                        <img src="{{ asset('storage/images/products/' . $product->product_images['0']->image_name) }}"
                                            alt="" height="50px" width="100px">
                                    @else
                                        <img src="{{ asset('dist/images/no-image.png') }}" alt="" class="img-fluid">
                                    @endif


                            </td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($product->created_at)->format('j F, Y') }}</td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($product->updated_at)->format('j F, Y') }}</td>
                            <td class="">

                                <div
                                    class="flex items-center justify-center {{ $product->status == 'active' ? 'text-success' : 'text-danger' }}">
                                    <i data-feather="check-square" class="w-4 h-4 mr-2"></i>
                                    {{ $product->status == 'active' ? 'Active' : 'Inactive' }}
                                </div>
                            </td>
                            <td class="table-report__action">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3"
                                        href="{{ route('greek-store.edit', $product->id) }}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    {{-- <form action="{{ route('jerseys.destroy', $product->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn btn-danger show_sweetalert" type="submit" data-toggle="tooltip">  <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>
                                  </form> --}}

                                    <a data-toggle="tooltip" title="Delete">
                                        <button class="btn btn-danger confirmDelete" data-toggle="tooltip"
                                            title="Delete" module="products/greek-store" module_id={{ $product->id }}>
                                            <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>
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
            $('#greek_product_table').DataTable({
                columnDefs: [
                    // Center align both header and body content of columns 1, 2 & 3
                    {
                        className: "dt-center",
                        targets: [0, 1, 2,3,4,5,6]
                    }
                ]
            });
        });
    </script>
@endsection
