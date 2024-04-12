@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Product</title>
@endsection

@section('subcontent')
@if ($get_variation_count == 0 )
<div class="alert alert-primary-soft show flex items-center mb-2" role="alert">

    <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i>
    Product is inactive as there is no variation. Pleasae add at least one variation for product
</div>
@endif

    <div class="intro-y box mt-5">
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

        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">Edit Product </h2>
            <a href="{{ route('shop.index') }}"><button class="btn btn-primary">Back</button></a>
        </div>
        <form action="{{ route('shop.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="intro-y box p-5">

                <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                    {{-- <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="jersey_name" class="font-medium form-label sm:w-60">Store Type <span
                                    class="text-danger">*</span></label>
                        </div>
                        <select class="form-control input w-full border flex-1" id="store_type" name="store_type">

                            <option value="Shop" {{$product->store_type =='Shop' ? 'selected': ''}}>For Shop</option>
                            <option value="Greek Store" {{$product->store_type == 'Greek Store' ? 'selected' : '' }}>For Greek Store
                            </option>
                        </select>
                        @error('store_type')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div> --}}

                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="jersey_name" class="font-medium form-label sm:w-60">Product Name <span
                                    class="text-danger">*</span></label>
                        </div>
                        <input type="text" id="uploding_product_name" class="form-control input w-full border flex-1"
                            placeholder="Product name" name="product_name"
                            value="{{ old('product_name', $product->product_name) }}">
                        @error('product_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="product_url" class="font-medium form-label sm:w-60">Product URL <span
                                    class="text-danger">*</span></label>

                        </div>
                        <input id="product_url" type="text" class="form-control input w-full border flex-1"
                            placeholder="Product URL" name="product_url" readonly
                            value="{{ old('product_url', $product->product_url) }}">
                        @error('product_url')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="product_type" class="font-medium form-label sm:w-60">Product Type <span
                                    class="text-danger">*</span></label>

                        </div>
                        <select class="form-control input w-full border flex-1" id="product_type" name="product_type">

                            <option value="men"
                                {{ old('product_type', $product->product_type) == 'men' ? 'selected' : '' }}>For Men
                            </option>
                            <option value="women"
                                {{ old('product_type', $product->product_type) == 'women' ? 'selected' : '' }}>For Women
                            </option>
                            <option value="youth"
                                {{ old('product_type', $product->product_type) == 'youth' ? 'selected' : '' }}>For Youth
                            </option>
                        </select>

                        @error('product_type')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="product_price" class="font-medium form-label sm:w-60">Product Price <span
                                    class="text-danger">*</span></label>

                        </div>
                        <input id="product_price" type="text" class="form-control input w-full border flex-1 "
                            placeholder="Product price" name="product_price"
                            value="{{ old('product_price', $product->price) }}">
                        @error('product_price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div> --}}

                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="product_image" class="font-medium form-label sm:w-60">Product Image <span
                                    class="text-danger">*</span></label>

                        </div>
                        <input type="file" class="form-control input w-full border flex-1" name="product_image[]"
                            value="{{ old('product_image') }}" multiple>
                        @error('product_image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="status" class="font-medium form-label sm:w-60">Status <span
                                    class="text-danger">*</span></label>

                        </div>
                        <input id="status" type="text" class="form-control input w-full border flex-1"
                            placeholder="" name="status" readonly
                            value="{{ old('status', Str::ucfirst($product->status) ) }}">
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="border border-gray-200 rounded-md p-5 mt-5">
                    <div class="font-medium flex items-center border-b border-gray-200 pb-5"> Product Images </div>
                    <div class="mt-5">

                        <div class="mt-3">
                            <label>Uploaded Image</label>
                            @if (!empty($product->product_images))
                                <div class="border-2 border-dashed rounded-md mt-3 pt-4">
                                    <div class="flex flex-wrap px-4">

                                        @foreach ($product->product_images as $product_image)
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <img class="rounded-md"
                                                    src="{{ asset('storage/images/products/' . $product_image->image_name) }}"
                                                    style="position: relative">

                                                <div style="position: absolute; width:20px;">
                                                    <input type="radio" name="image_check"
                                                        value="{{ $product_image->id }}"
                                                        @if ($product_image->image_sort == '1') checked @endif>
                                                </div>
                                                <div title="Remove this image?" style="background: red"
                                                    class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2">
                                                    <i data-feather="x" class="w-4 h-4 confirmDelete"
                                                        title="Delete Image" module="products/product-image"
                                                        module_id={{ $product_image->id }}></i>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-md p-5 mt-5">
                    {{-- <div class="font-medium flex items-center border-b border-gray-200 pb-5">
                      Variants
                    </div> --}}

                    <div
                        class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">Variations </h2>
                        <a href="{{ url('admin/products/shop/add-variants/'.$product->id) }}" class="btn btn-primary">
                         Add Variants</a>
                        {{-- <a href="{{ route('product.add-variants' , $product->id) }}"><button class="btn btn-primary" type="button">Add Variants</button></a> --}}
                    </div>

                    <div class="mt-5">

                        <div class="mt-3">
                            <label></label>
                            <div class="border-2 border-solid rounded-md mt-3 pt-4">

                                <div class="grid grid-cols-12 gap-6 mt-5 p-5 bg-white mb-5">
                                    <!-- BEGIN: Data List -->
                                    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                                        <table class="table table-report -mt-2" id="product_variation_table">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th class="text-center whitespace-nowrap">Size</th>
                                                    <th class="text-center whitespace-nowrap">Price</th>
                                                    <th class="text-center whitespace-nowrap">Quantity</th>
                                                    <th class="text-center whitespace-nowrap">Status</th>
                                                    <th class="text-center whitespace-nowrap">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @if (isset($get_product_variations) && $get_product_variations->isNotEmpty())

                                                @foreach ($get_product_variations as $product_variation)
                                                <tr class="intro-x">

                                                    <td>
                                                        <div> {{ $product_variation->productSize->product_size }} </div>
                                                    </td>
                                                    <td class="text-center">{{ $product_variation->product_price }}</td>
                                                    <td class="text-center">{{ $product_variation->product_quantity }}</td>

                                                    <td class="w-40">

                                                        <div
                                                            class="flex items-center justify-center {{ $product_variation->status == '1' ? 'text-success' : 'text-danger' }}">
                                                            <i data-feather="check-square" class="w-4 h-4 mr-2"></i>
                                                            {{ $product_variation->status == '1' ? 'Active' : 'Inactive' }}
                                                        </div>
                                                    </td>

                                                    {{-- <td class="table-report__action w-56">
                                                        <div class="flex justify-center items-center">
                                                            <a class="flex items-center mr-3" href="">
                                                                <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
                                                                Edit
                                                            </a>

                                                            <a data-toggle="tooltip" title="Delete">
                                                                <button class="btn btn-danger confirmDelete"
                                                                    data-toggle="tooltip" title="Delete"
                                                                    module="products" module_id=>
                                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                                                    Delete</button>
                                                            </a>
                                                        </div>
                                                    </td> --}}

                                                    {{-- <td class="text-center">
                                                            {{ \Carbon\Carbon::parse($product->created_at)->format('j F , Y , H:i') }}</td>
                                                        <td class="text-center">
                                                            {{ \Carbon\Carbon::parse($product->updated_at)->format('j F , Y , H:i') }}</td> --}}

                                                    <td class="table-report__action w-56">
                                                            <div class="flex justify-center items-center">
                                                                <a class="flex items-center mr-3"
                                                                    href="{{ url('admin/products/shop/'.$product->id.'/edit-variants/'.$product_variation->id) }}">
                                                                    {{-- href="{{ url('admin/products/edit-variants/'.$product_variation->id) }}"> --}}
                                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                                                </a>

                                                                {{-- <a data-toggle="tooltip" title="Delete">
                                                                    <button class="btn btn-danger confirmDelete" data-toggle="tooltip"
                                                                        title="Delete" module="product-variation" module_id={{ $product_variation->id }}>
                                                                        <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>
                                                                </a> --}}

                                                                <a  class="btn btn-danger confirmDelete" data-toggle="tooltip"
                                                                title="Delete" module="products/product-variation" module_id={{ $product_variation->id }}>

                                                                        <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
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


                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                </div>
                <div class="text-right mt-5">
                    <button type="submit" class="btn btn-primary w-24">Update</button>
                    <button type="reset" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                </div>
            </div>
        </form>
        <!-- END: Form Layout -->
    </div>

@endsection


@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#product_details_editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>

<script>
    $(function() {
        $('#product_variation_table').DataTable({
            columnDefs: [
                // Center align both header and body content of columns 1, 2 & 3
                {
                    className: "dt-center",
                    targets: [0, 1, 2 , 3 , 4]
                }
            ]
        });

    });
</script>

@endsection
