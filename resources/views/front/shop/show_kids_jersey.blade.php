@extends('front.layout.app')
@section('content')
    <main class="main">
        <section id="abouttexting">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul id="gamedayJersey" class="lightSlider">
                            @if ($kids_product->product_images->isNotEmpty())
                                @foreach ($kids_product->product_images as $product_image)
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
                        @error('size')
                            <div class="alert alert-danger show flex items-center mb-2 " role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2">
                                    <polygon
                                        points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                    </polygon>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                                &nbsp;{{ $message }}
                            </div>
                        @enderror

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
                        <!-- Product Description -->
                        <div class="jersey-product-description">
                            <a class="jersey_back_link" type="button" onclick="history.back()">NFL Jersey</a>
                            <h2>{{ $kids_product->product_name }}</h2>
                            <div class="jersey-product-price">
                                @if ($kids_product->product_variations->isNotEmpty())
                                    <span id="price-heading">${{ $kids_product->product_variations[0]->product_price }}</span>
                                @else
                                    <span id="price-heading"></span>
                                @endif
                            </div>

                            <span class="text-danger qty-counter"></span>
                        </div>

                        <div class="jersey_form_box">

                            <form action="{{ route('shop-product') }}" method="POST" enctype="multipart/form-data"
                                id="jersey_form">

                                @csrf
                                <div class="row">
                                    <div class="mb-3">
                                        @if (Auth::user())
                                            <label for="">Email</label>

                                            <input type="email" class="form-control" name="email"
                                                value="{{ Auth::user()->email }}" placeholder="Enter email" readonly>
                                        @endif
                                        <input type="hidden" name="product_name" id="product_name"
                                            value="{{ $kids_product->product_name }}">
                                        <input type="hidden" name="product_price" id="product_price"
                                            value="{{ $kids_product->price }}">
                                            <input type="hidden" name="product_variation_id" id="product_variation_id" value="">

                                        <input type="hidden" name="quantity" id="quantity" value="1">
                                        <input type="hidden" name="gender" id="gender"
                                            value="{{ $kids_product->product_type }}">

                                        <span class="text-danger" id="email_error_msg">{!! $errors->first('email', ':message') !!} </span>

                                    </div>

                                    <div class="mb-3">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name') }}" placeholder="Enter name">
                                        <span class="text-danger">{!! $errors->first('name', ':message') !!} </span>

                                    </div>
                                    <div class="mb-3">
                                        <label for="">Jersey Number</label>
                                        <input type="text" class="form-control" name="product_number" id="product_number"
                                            value="{{ old('product_number') }}"
                                            placeholder="Enter jersey number (For ex: 0, 00-99)">
                                        <span class="text-danger" id="jersey_number_error_msg">{!! $errors->first('product_number', ':message') !!}
                                        </span>

                                    </div>

                                    <div class="mb-3">
                                        <div class="jersey_sizes_radio_button cf">
                                            <section class="plan cf">
                                                <h6 class="jersey_radio_button_label">Age Group</h6>
                                                <div class="youth_sizes">
                                                    <input type="radio" name="age_group" id="10_13" value="10-13"
                                                        checked><label class="small-label four gender_col"
                                                        for="10_13">10-13</label>

                                                    <input type="radio" name="age_group" id="14_17"
                                                        value="14-17"><label class="small-label four gender_col"
                                                        for="14_17">14-17</label>
                                                </div>
                                            </section>
                                            <span class="text-danger" id="age_group_error_msg">{!! $errors->first('age_group', ':message') !!} </span>
                                            @error('age_group')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <input type="hidden" value="{{ $kids_product->id }}" name="product_id">
                                        <input type="hidden"
                                            value="{{ $kids_product->product_images['0']->image_name }}"
                                            name="product_image" id="product_image">
                                        @if (Auth::user())
                                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id"
                                                id="user_id">
                                        @endif
                                        @if (Auth::user())
                                            <input type="hidden" value="{{ Auth::user()->zipcode }}" name="zipcode"
                                                id="zipcode" readonly>
                                        @endif
                                    </div>

                                    <div class="mb-3">

                                        <div class="jersey_sizes_radio_button cf">
                                            <section class="plan cf">
                                                <h6 class="jersey_radio_button_label">Size</h6>
                                                <div class="youth_sizes">
                                                        @if (isset($get_sizes) && $get_sizes->isNotEmpty())
                                                        @foreach ($get_sizes as $size)

                                                        <input  type="radio" name="size" id="{{ $size->productSize->product_size }}" value="{{ $size->productSize->product_size }}"
                                                        ><label class="{{ $size->productSize->product_size }}-label four gender_col size-button"
                                                            data-product_id="{{ $size->product_id }}" data-size_id="{{ $size->size_id }}" data-quantity = "{{ $size->product_quantity }}"
                                                        for="{{ $size->productSize->product_size }}">{{ $size->productSize->product_size }}</label>
                                                        @endforeach

                                                        @endif


                                                </div>
                                            </section>
                                            <span class="text-danger" id="size_error_msg">{!! $errors->first('size', ':message') !!} </span>

                                        </div>


                                        <input type="hidden" value="{{ $kids_product->id }}" name="product_id">
                                        <input type="hidden"
                                            value="{{ $kids_product->product_images['0']->image_name }}"
                                            name="product_image" id="product_image">
                                        @if (Auth::user())
                                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id"
                                                id="user_id">
                                        @endif
                                        @if (Auth::user())
                                            <input type="hidden" value="{{ Auth::user()->zipcode }}" name="zipcode"
                                                id="zipcode" readonly>
                                        @endif
                                    </div>

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
    @if ($get_kids_product->isNotEmpty())
        <section>
            <h6 class="slider_heading"> You may also like</h6>

            <div class="slider">

                <ul id="autoWidth" class="cs-hidden">

                    @foreach ($get_kids_product as $kids_product)
                        <!--1------------------------------------>
                        <li class="item-a">
                            <a
                                href="{{ url('pony-express-flag-football-shop/' . $kids_product->product_url . '/' . $kids_product->id) }}">
                                <!--box-slider--------------->
                                <div class="box">
                                    <!--img-box---------->
                                    <div class="slide-img">

                                        @if ($kids_product->product_images->isNotEmpty())
                                            <img src="{{ asset('storage/images/products/' . $kids_product->product_images['0']->image_name) }}"
                                                alt="{{ $kids_product->product_images['0']->image_name }}">
                                        @else
                                            <img src="{{ asset('dist/images/no-image.png') }}" alt="Image">
                                        @endif

                                    </div>
                                    <!--detail-box--------->
                                    <div class="detail-box">
                                        <!--type-------->
                                        <div class="type">
                                            <a href="#">{!! \Illuminate\Support\Str::limit($kids_product->product_name, 50, '...') !!}</a>
                                        </div>
                                        @if ($kids_product->product_variations->isNotEmpty())
                                        <a href="#"
                                        class="price">${{ $kids_product->product_variations[0]->product_price }}</a>
                                        @else
                                        <a href="#"
                                        class="price"></a>
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

    @if (Auth::user())
        @if ($get_zipcodes->isNotEmpty())
            <div style="background:#DA9A29; color:#fff; padding:10px 0; font-size:17px;">
                <marquee behavior="scroll" scrollamount="6" direction="left" width="100%" style="padding-top:8px">
                    Recent Sign-up Zip Codes :
                    @if ($get_zipcodes->isNotEmpty())
                        @php
                            $myArray = [];
                            foreach ($get_zipcodes as $zipcodes) {
                                $myArray[] = $zipcodes->zipcode;
                            }

                            echo implode(', ', $myArray);
                        @endphp
                    @endif
                </marquee>
            </div>
        @endif
    @endif

@endsection
