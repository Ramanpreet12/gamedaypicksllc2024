@extends('front.layout.app')


@section('content')
    <main class="jersey_main_container">
        <!-- Left Column / Headphones Image -->
        <div class="jersey-left-column">
            <img data-image="black" class="active" src="{{ asset('storage/images/jerseys/' . $jersey->image) }}"
                alt="{{ $jersey->image }}">
        </div>
        <!-- Right Column -->
        <div class="jersey-right-column">

            @if (session()->has('error'))
                <div class="alert alert-danger show flex items-center mb-2 alert_messages" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-alert-octagon w-6 h-6 mr-2">
                        <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                        </polygon>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    &nbsp; {{ session()->get('error') }}
                </div>
            @endif
            <!-- Product Description -->
            <div class="jersey-product-description">
                {{-- <a class="back_link" type="button" href="{{ url('shop/'.request()->segment(2)) }}" >NFL Jersey</a> --}}
                <a class="jersey_back_link" type="button" onclick="history.back()">NFL Jersey</a>
                <h2>{{ $jersey->name }}</h2>
                <div class="jersey-product-price">
                    <span>${{ $jersey->price }}</span>
                </div>


            </div>
            {{-- {{ dd( $jersey) }} --}}
            <div class="jersey_form_box">
                {{-- {{ dd('shop.'.request()->segment(2).'.'.request()->segment(3)) }} --}}
                <form action="{{ route('shop-jersey') }}" method="POST" enctype="multipart/form-data" id="jersey_form">
                {{-- <form action="{{ route('shop.'.request()->segment(2).'.'.request()->segment(3)) }}" method="POST" enctype="multipart/form-data" id="jersey_form"> --}}
                    @csrf
                    <div class="row">
                        {{-- <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user_email }}"
                                placeholder="Enter email" readonly>
                            <input type="hidden" name="pre_signups_id" value="{{ $pre_signups_user->id }}" >
                            <input type="hidden" name="jersey_name" id="jersey_name" value="{{ $jersey->name }}" >
                            <span class="text-danger" id="email_error_msg">{!! $errors->first('email', ':message') !!} </span>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
                                placeholder="Enter name">
                                <span class="text-danger">{!! $errors->first('name', ':message') !!} </span>
                            {{-- @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                        </div>
                        <div class="mb-3">
                            <label for="">Jersey Number</label>
                            <input type="text" class="form-control" name="jersey_number" id="jersey_number"
                                value="{{ old('jersey_number') }}" placeholder="Enter jersey number (For ex: 0, 00-99)">
                                {{-- <span style="color: #DC3545" id="jersey_number_error_msg">{!! $errors->first('jersey_number', ':message') !!} </span> --}}
                                <span class="text-danger" id="jersey_number_error_msg">{!! $errors->first('jersey_number', ':message') !!} </span>
                                {{-- @error('jersey_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                        </div>
                        <div class="mb-3">
                            <label for="age_group">Age Group </label>
                            <select name="age_group" id="age_group" class="form-control">
                                <option value="">Select Age Group</option>
                                <option value="1" @if(old('age_group') ==  '1') selected @endif>10-13</option>
                                <option value="2" @if(old('age_group') ==  '2') selected @endif>14-17</option>
                                <option value="3" @if(old('age_group') ==  '3') selected @endif>Above 17</option>
                            </select>
                            <span class="text-danger">{!! $errors->first('age_group', ':message') !!} </span>
                            {{-- @error('age_group')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                        </div>
                        <div class="mb-3">
                            <div class="jersey_radio_button cf">
                                <section class="plan cf">
                                    <h6 class="jersey_radio_button_label">Gender</h6>
                                    <input type="radio" name="gender" id="men" value="men" checked  class="gender"><label
                                        class="men-label four gender_col" for="men">Men</label>
                                    <input type="radio" name="gender" id="women" value="women" class="gender"><label
                                        class="women-label four gender_col" for="women">Women</label>
                                    <input type="radio" name="gender" id="youth" value="youth" class="gender"><label
                                        class="youth-label four gender_col" for="youth">Youth</label>
                                </section>

                                <span class="text-danger" id="gender_error_msg">{!! $errors->first('gender', ':message') !!} </span>
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
                                        <input type="radio" name="size" id="men_small" value="small"
                                        checked  ><label class="small-label four gender_col" for="men_small">S</label>
                                        <input type="radio" name="size" id="men_medium" value="medium"><label
                                            class="medium-label four gender_col" for="men_medium">M</label>
                                        <input type="radio" name="size" id="men_large" value="large"><label
                                            class="large-label four gender_col" for="men_large">L</label>
                                        <input type="radio" name="size" id="men_xl" value="xl"><label
                                            class="xl-label four gender_col" for="men_xl">XL</label>
                                        <input type="radio" name="size" id="men_2xl" value="2xl"><label
                                            class="2xl-label four gender_col" for="men_2xl">2XL</label>
                                        <input type="radio" name="size" id="men_3xl" value="3xl"><label
                                            class="3xl-label four gender_col" for="men_3xl">3XL</label>
                                        <input type="radio" name="size" id="men_4xl" value="4xl"><label
                                            class="4xl-label four gender_col" for="men_4xl">4XL</label>
                                    </div>
                                </section>
                            </div>
                            <div class="jersey_sizes_radio_button cf">
                                <section class="plan cf">
                                    <div class="women_sizes" style="display: none">
                                        <input type="radio" name="size" id="women_small" value="small" ><label
                                            class="small-label four gender_col" for="women_small">S</label>
                                        <input type="radio" name="size" id="women_medium" value="medium"><label
                                            class="medium-label four gender_col" for="women_medium">M</label>
                                        <input type="radio" name="size" id="women_large" value="large"><label
                                            class="large-label four gender_col" for="women_large">L</label>
                                        <input type="radio" name="size" id="women_xl" value="xl"><label
                                            class="xl-label four gender_col" for="women_xl">XL</label>
                                        <input type="radio" name="size" id="women_xxl" value="xxl"><label
                                            class="xxl-label four gender_col" for="women_xxl">2XL</label>
                                    </div>
                                </section>
                            </div>
                            <div class="jersey_sizes_radio_button cf">
                                <section class="plan cf">
                                    <div class="youth_sizes" style="display: none">
                                        <input type="radio" name="size" id="youth_small" value="small" ><label
                                            class="small-label four gender_col" for="youth_small">S</label>
                                        <input type="radio" name="size" id="youth_medium" value="medium"><label
                                            class="medium-label four gender_col" for="youth_medium">M</label>
                                        <input type="radio" name="size" id="youth_large" value="large"><label
                                            class="large-label four gender_col" for="youth_large">L</label>
                                        <input type="radio" name="size" id="youth_xl" value="xl"><label
                                            class="xl-label four gender_col" for="youth_xl">XL</label>
                                        {{-- <input type="radio" name="size" id="youth_xxl" value="xxl"><label
                                    class="xxl-label four col" for="youth_xxl">xxl</label> --}}
                                    </div>
                                </section>
                                <span class="text-danger" id="size_error_msg">{!! $errors->first('size', ':message') !!} </span>
                                @error('size')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <input type="hidden" value="{{ $jersey->image }}" name="jersey_image" id="jersey_image">
                            <input type="hidden" value="{{ $jersey->id }}" name="jersey_id">
                            <input type="hidden" value="{{ $jersey->price }}" name="price" id="price">
                            @if (Auth::user())
                            <input type="text" value="{{ Auth::user()->id }}" name="user_id" id="user_id">
                            @endif

                            {{-- <input type="hidden" value="{{ $pre_signups_user->zipcode }}" name="zipcode" id="zipcode"> --}}
                        </div>
                    </div>

                    @if (Auth::user())
                    <button class="buy-btn" type="submit">Buy Now</button>
                    <button class="cart-btn" id="reserve_btn" type="button"
                    jersey_id="{{ $jersey->id }}">Reserve</button>

                    @else
                    <a href="{{ route('pre-sign-up') }}"><button class="buy-btn" type="button">Buy Now</button></a>
                    <a href="{{ route('pre-sign-up') }}"><button class="cart-btn" id="reserve_btn" type="button">Reserve</button></a>

                    @endif

                    {{-- <button class="cart-btn" id="reserve_btn" type="button"
                     email = "{{ $user_email }}" jersey_id="{{ $jersey->id }}">Reserve</button> --}}

                   


                </form>
            </div>
        </div>
    </main>

    <!-- Product slider -->
    @if ($get_jersey->isNotEmpty())

   <section>
    <h6 class="slider_heading"> You may also like</h6>

    <div class="slider">

       <ul id="autoWidth" class="cs-hidden">

          @foreach ($get_jersey as $jersey)


          <!--1------------------------------------>
          <li class="item-a">
             <a href="{{ url('shop/'.$jersey->jersey_url.'/'.$jersey->id) }}">
             {{-- <a href="{{ url('shop/'.$jersey->id.'/'.request()->segment(3)) }}"> --}}
                <!--box-slider--------------->
                <div class="box">
                   <!--img-box---------->
                   <div class="slide-img">

                      <img alt="1" src="{{ asset('storage/images/jerseys/'.$jersey->image) }}">
                      {{-- {{ asset('storage/images/jerseys/' . $jersey->image) }} --}}
                      <!--overlayer---------->
                      {{--
                      <div class="overlay">
                         <!--buy-btn------>
                         <a href="#" class="buy-btn">Buy Now</a>
                      </div>
                      --}}
                   </div>
                   <!--detail-box--------->
                   <div class="detail-box">
                      <!--type-------->
                      <div class="type">
                         <a href="#" >{{ $jersey->name }}</a>
                         {{-- <span>Noe Arrival</span> --}}
                      </div>
                      <!--price-------->
                      <a href="#" class="price">${{ $jersey->price }}</a>
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
