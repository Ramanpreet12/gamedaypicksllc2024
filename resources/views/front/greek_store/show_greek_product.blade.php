@extends('front.layout.app')

@push('css')

@endpush

@section('content')
    <main class="main">

        <section id="abouttexting">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul id="gamedayJersey" class="lightSlider">

                            @if ($product->product_images->isNotEmpty())
                                @foreach ($product->product_images as $product_image)
                                    <li data-thumb="{{ asset('storage/images/products/' . $product_image->image_name) }}"
                                        data-src="{{ asset('storage/images/products/' . $product_image->image_name) }}">
                                        <img src="{{ asset('storage/images/products/' . $product_image->image_name) }}" />
                                    </li>
                                @endforeach
                            @else
                                <img src="{{ asset('dist/images/no-image.png') }}" alt="Image">
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-6">
                        @if (session()->has('error'))
                            <div class="alert alert-danger show flex items-center mb-2 alert_messages" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2">
                                    <polygon
                                        points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                    </polygon>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                                &nbsp; {{ session()->get('error') }}
                            </div>
                        @endif

                        @error('size')
                            <div class="alert alert-danger show flex items-center mb-2 alert_messages" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2">
                                    <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                    </polygon>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                                &nbsp;{{ $message }}
                            </div>
                        @enderror

                        <!-- Product Description -->
                        <div class="jersey-product-description">
                            <a class="jersey_back_link" type="button" onclick="history.back()">Back</a>
                            <h2>{{ $product->product_name }}</h2>
                            <div class="jersey-product-price">
                                @if ($product->product_variations->isNotEmpty())
                                    <span id="price-heading">${{ $product->product_variations[0]->product_price }}</span>
                                @else
                                    <span id="price-heading"></span>
                                @endif
                            </div>
                            <span class="text-danger qty-counter"></span>

                        </div>
                        <div class="jersey_form_box">
                            <form action="{{ route('shop-product') }}" method="POST" enctype="multipart/form-data"
                                {{-- <form action="{{ route('shop-greek-product') }}" method="POST" enctype="multipart/form-data" --}} id="jersey_form">
                                @csrf
                                <div class="row">
                                    <div class="mb-3">
                                        @if (Auth::user())
                                            <label for="">Email</label>

                                            <input type="email" class="form-control" name="email"
                                                value="{{ Auth::user()->email }}" placeholder="Enter email" readonly>
                                        @endif
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                        {{-- <input type="text" name="product_price" id="product_price" value=""> --}}
                                        <input type="hidden" name="product_variation_id" id="product_variation_id"
                                            value="">
                                        {{-- <input type="text" name="quantity" id="quantity" value="1"> --}}
                                        <span class="text-danger" id="email_error_msg">{!! $errors->first('email', ':message') !!} </span>

                                    </div>

                                    <div class="mb-3">
                                        <label for="">Name on Back</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{!! old('name') !!}" placeholder="Enter name">
                                        <span class="text-danger">{!! $errors->first('name', ':message') !!} </span>
                                        {{-- @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror --}}
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Chapter Name</label>
                                        <input type="text" class="form-control" name="chapter_name" id="chapter_name"
                                            value="{{ old('chapter_name') }}" placeholder="Enter chapter name">
                                        <span class="text-danger">{!! $errors->first('chapter_name', ':message') !!} </span>
                                        {{-- @error('chapter_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror --}}
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Line Number</label>
                                        <input type="text" class="form-control" name="product_number"
                                            id="product_number" value="{{ old('product_number') }}"
                                            placeholder="Enter Line number">
                                        <span class="text-danger" id="jersey_number_error_msg">{!! $errors->first('product_number', ':message') !!}
                                        </span>
                                        {{-- @error('jersey_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror --}}
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Cross Over Year</label>
                                        <input type="text" class="form-control" name="cross_over_year"
                                            id="cross_over_year" value="{{ old('cross_over_year') }}"
                                            placeholder="E.g. SPR 1989 or WTR. 1989.">
                                        <span class="text-danger">{!! $errors->first('cross_over_year', ':message') !!} </span>

                                    </div>

                                    <div class="mb-3">
                                        <label for="">University Name</label>
                                        <input type="text" class="form-control" name="university_name"
                                            id="university_name" value="{{ old('university_name') }}"
                                            placeholder="Enter university name">
                                        <span class="text-danger">{!! $errors->first('university_name', ':message') !!} </span>
                                        {{-- @error('university_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror --}}
                                        <small><b>{{ $product->university_sale_text ?? '' }}</b> </small>
                                    </div>


                                    <div class="mb-3">
                                        <div class="jersey_radio_button cf">
                                            <section class="plan cf">
                                                <h6 class="jersey_radio_button_label">Gender</h6>
                                                <input type="radio" name="gender" id="{{ $product->product_type }}"
                                                    value="{{ $product->product_type }}" checked class="gender"><label
                                                    class="{{ $product->product_type }}-label four gender_col"
                                                    for="{{ $product->product_type }}">{{ Str::ucfirst($product->product_type) }}</label>

                                            </section>

                                            <span class="text-danger" id="gender_error_msg">{!! $errors->first('gender', ':message') !!}
                                            </span>
                                            {{-- @error('gender')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror --}}
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="jersey_sizes_radio_button cf">
                                            <section class="plan cf">
                                                <h6 class="jersey_radio_button_label">Size</h6>
                                                <div class="men_sizes">
                                                    @if (isset($get_sizes) && $get_sizes->isNotEmpty())
                                                        @foreach ($get_sizes as $size)
                                                            <input type="radio" name="size"
                                                                id="{{ $size->productSize->product_size }}"
                                                                value="{{ $size->productSize->product_size }}"><label
                                                                class="{{ $size->productSize->product_size }}-label four gender_col greek-size-button"
                                                                data-product_id="{{ $size->product_id }}"
                                                                data-size_id="{{ $size->size_id }}"
                                                                data-quantity = "{{ $size->product_quantity }}"
                                                                for="{{ $size->productSize->product_size }}">{{ $size->productSize->product_size }}</label>
                                                        @endforeach
                                                    @endif

                                                    {{-- @if (isset($product->product_variations) && $product->product_variations->isNotEmpty())
                                                    @foreach ($product->product_variations as $product_variant)
                                                    <input type="radio" name="size" id="{{ $product_variant->product_size }}" value="{{ $product_variant->product_size }}"
                                                    checked><label class="{{ $product_variant->product_size }}-label four gender_col"
                                                    for="{{ $product_variant->product_size }}">{{ $product_variant->product_size }}</label>
                                                    @endforeach

                                                    @endif --}}
                                                </div>

                                            </section>
                                        </div>

                                        <span class="text-danger" id="size_error_msg">{!! $errors->first('size', ':message') !!}
                                        </span>

                                    </div>
                                </div>

                                <div>
                                    <label class="small-label four gender_col" for="">Quantity</label>
                                    <input type="number" name="quantity" class="form-control" value="1"
                                        min="1">
                                    <span class="text-danger" id="quantity_error_msg">{!! $errors->first('quantity', ':message') !!}
                                    </span>
                                </div>
                                @if (Auth::user())
                                    <button class="buy-btn" type="submit" name="action" value="buy_now">Buy
                                        Now</button>
                                    <button class="cart-btn" id="" type="submit" name="action"
                                        value="add_to_cart"> Add
                                        to cart</button>
                                @else
                                    <a href="{{ route('pre-sign-up') }}"><button class="buy-btn" type="button">Buy
                                            Now</button></a>
                                    <a href="{{ route('pre-sign-up') }}"><button class="cart-btn" type="button">Add to
                                            cart</button></a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>




    </main>

    <!-- Product slider -->
    @if ($get_product->isNotEmpty())
        <section>
            <h6 class="slider_heading"> You may also like</h6>

            <div class="slider">
                <ul id="autoWidth" class="cs-hidden">
                    @foreach ($get_product as $product)
                        <!--1------------------------------------>
                        <li class="item-a">
                            <a href="{{ url('greek-store/' . $product->product_url) }}">
                                {{-- <a href="{{ url('shop/'.$product->id.'/'.request()->segment(3)) }}"> --}}
                                <!--box-slider--------------->
                                <div class="box">
                                    <!--img-box---------->
                                    <div class="slide-img">
                                        {{-- @if ($product->product_images->isNotEmpty())
                                            <img src="{{ asset('storage/images/products/' . $product->product_images['0']->image_name) }}"
                                                alt="{{ $product->product_images['0']->image_name }}">
                                        @else
                                            <img src="{{ asset('dist/images/no-image.png') }}" alt="Image">
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


                                    </div>
                                    <!--detail-box--------->
                                    <div class="detail-box">
                                        <!--type-------->
                                        <div class="type">
                                            <a href="#">{!! \Illuminate\Support\Str::limit($product->product_name, 50, '...') !!}</a>
                                        </div>
                                        <!--price-------->
                                        @if ($product->product_variations->isNotEmpty())
                                            <a href="#"
                                                class="price">${{ $product->product_variations[0]->product_price }}</a>
                                        @else
                                            <a href="#" class="price"></a>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach

                </ul>

            </div>
        </section>
    @endif
    {{-- scroll zipcode --}}

    {{-- <div class="scroll_text_box">
        <div class="marquee">
            <p>ZipCode: {{ $pre_signups_user->zipcode }}</p>
        </div>
    </div> --}}
@endsection
