@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Product Variation</title>
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
            <h2 class="font-medium text-base mr-auto">Add Product Variation</h2>
            <a href="{{ route('shop.edit', $id) }}"><button class="btn btn-primary">Back</button></a>
        </div>
        <form action="{{ url('admin/products/shop/add-variants/' . $id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="intro-y box p-5">

                <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="size_id" class="font-medium form-label sm:w-60">Size <span
                                    class="text-danger">*</span></label>
                        </div>
                        <select class="form-control input w-full border flex-1" id="size_id" name="size_id">

                            @if (isset($get_sizes) && $get_sizes->isNotEmpty())
                                @foreach ($get_sizes as $size)
                                    <option value="{{ $size->id }}" {{ old('size_id') == $size->id ? 'selected' : '' }}>
                                        {{ $size->product_size }}</option>
                                @endforeach
                            @endif


                        </select>
                        @error('size_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="product_price" class="font-medium form-label sm:w-60">Price <span
                                    class="text-danger">*</span></label>
                            <input id="product_price" type="text" class="form-control input w-full border flex-1"
                                placeholder="Price" name="product_price" value="{{ old('product_price') }}">
                        </div>
                        @error('product_price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="product_quantity" class="font-medium form-label sm:w-60">Quantity <span
                                    class="text-danger">*</span></label>

                        </div>
                        <input id="product_quantity" type="text" class="form-control input w-full border flex-1 "
                            placeholder="Product quantity" name="product_quantity" value="{{ old('product_quantity') }}">
                        @error('product_quantity')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">
                            <label for="status" class="font-medium form-label sm:w-60">Status <span
                                    class="text-danger">*</span></label>

                        </div>
                        <select class="form-control" id="status" name="status">

                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                </div>

                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                </div>
                <div class="text-right mt-5">
                    <button type="submit" class="btn btn-primary w-24">Save</button>
                    <button type="reset" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                </div>
            </div>
        </form>
        <!-- END: Form Layout -->
    </div>

@endsection
