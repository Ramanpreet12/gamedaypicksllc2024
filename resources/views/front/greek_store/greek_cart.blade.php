@extends('front.layout.app')

@section('content')

@push('css')
<style>
    /* cart css  */

.jersey_heading {
    font-size: 20px;
    /* font-weight: 600; */
}

img {
    width: 32%;
}

.jersey_container {
    display: flex;
    justify-content: space-around;
    margin: 13px;
    padding: 21px;
    border-top: 1px solid #f1eded;
    padding-top: 35px;

}

.cart_summary_heading {
    font-size: 20px;
}

.jersey_cart_total {
    font-size: 18px;
    font-weight: 600;
}

button.jersey_proceed_to_checkout_btn.my-3.py-3 {
    outline: none;
    border: none;
    float: right;
    background: #DA9A29;
    color: #fff;
    padding: 12px;
    box-shadow: 0 0 7px 1px rgba(14, 14, 14, .16);
    width: 100%;

}

.jersey_text {
    padding: 0 40px;
}

.card-body {
    margin-bottom: 38px;
}

span.jersey_end_text {
    /* margin-top: 20px; */
    /* padding-top: 20px; */
    color: #247e0c;
    font-weight: 600;
}

.empty_card {
    margin: 30px;
    margin-bottom: 30px;
    border: 0;
    -webkit-transition: all .3s ease;
    transition: all .3s ease;
    letter-spacing: .5px;
    border-radius: 8px;
    -webkit-box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, .05);
    box-shadow: 1px 5px 24px 0 rgb(68 102 241 / 9%);
}
.empty_card .empty_card-body {
    padding: 70px;
    background-color: transparent;
}

.empty_continue_shopping_btn {

    display: inline-block;
    background-color: #DA9A29;
    border-radius: 6px;
    font-size: 16px;
    color: #FFFFFF;
    text-decoration: none;
    padding: 12px 30px;
    transition: all .5s;
    outline: none;
    border: none;
    margin-top: 10px;
    text-align: center;


}

.empty_continue_shopping_btn:hover {
    background-color: #d18605;
}

.tooltipbox {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltipbox .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 100%;
    left: 50%;
    margin-left: -60px;

    /* Fade in tooltip - takes 1 second to go from 0% to 100% opac: */
    opacity: 0;
    transition: opacity 1s;
}

.tooltipbox:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}

</style>
@endpush

    @if (session()->has('GreekshoppingCart'))
        @if (!empty(session()->get('GreekshoppingCart')))
            <form>
                <div class="container-fluid pt-5">
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
                    <div class="row px-xl-5">

                        <div class="row col-lg-8">
                            <div class="jersey_heading d-flex justify-content-between">
                                <h2>Your Jersey</h2>
                                <div>
                                    <a href="{{ route('remove_all_items_from_greek_cart') }}" style="text-decoration: none">
                                        <span style="font-size: 30px" class="text-danger" data-toggle="tooltip"
                                            title="Remove all the cart items">&times;</span>
                                    </a>
                                </div>

                            </div>
                        </div>

                        <?php $cart_total_amount = 0; ?>
                        <div class="col-lg-8 table-responsive mb-5">
                            @foreach (session('GreekshoppingCart') as $id => $product_details)
                                {{-- {{ dd($product_details) }} --}}
                                {{-- hidden values of cart items to send to controller and save into a table --}}
                                {{-- now not required as we are using sessions to get the cart item details --}}
                                {{-- <input type="text" name="jersey_id[]" value="{{ $jersey_details['jersey_id'] }}">
                        <input type="text" name="size[]" value="{{ $jersey_details['size'] }}">
                        <input type="text" name="quantity[]" value="{{ $jersey_details['quantity'] }}">
                        <input type="text" name="gender[]" value="{{ $jersey_details['gender'] }}">
                        <input type="text" name="jersey_number[]" value="{{ $jersey_details['jersey_number'] }}">
                        <input type="text" name="jersey_price[]" value="{{ $jersey_details['jersey_price'] }}"> --}}

                                <?php $cart_total_amount += $product_details['product_price'] * $product_details['product_qty']; ?>
                                {{-- <input type="text" name="cart_total_amount" value="{{ $cart_total_amount }}"> --}}
                                <div class="jersey_container">

                                    {{-- <div class="jersey_img"> --}}
                                    <img src="{{ asset('storage/images/greek_store/' . $product_details['product_image']) }}"
                                        alt="">
                                    {{-- <img src="{{ asset('dist/images/white_jersey.jpg') }}" alt=""> --}}

                                    {{-- </div> --}}
                                    <div class="jersey_text">
                                        <div>
                                            <p><b>{{ $product_details['product_title'] }}</b></p>

                                            <p> Size : {{ Str::ucfirst($product_details['product_size']) }}</p>
                                            @if ($product_details['age_group'] != null)
                                                <p> Age Group : {{ Str::ucfirst($product_details['age_group']) }}</p>
                                            @endif

                                            <p> Quantity : {{ $product_details['product_qty'] }}</p>
                                            <p> Gender : {{ Str::ucfirst($product_details['gender']) }} </p>
                                            <p> Name on Back : {{ $product_details['product_jersy_name'] }} </p>
                                            <p> Chapter Name : {{ $product_details['product_chapter_name'] }} </p>
                                            <p> University Name : {{ $product_details['product_university_name'] }} </p>
                                            <p> Line Number : {{ $product_details['line_number'] }} </p>
                                            <p> Price : ${{ $product_details['product_price'] }} </p>

                                            <span class="jersey_end_text">Order Now! Item in cart is only available for
                                                <b>30</b>
                                                days.</span>
                                        </div>
                                    </div>

                                    <div>
                                        <span style="font-size: 30px" class="text-danger remove-from-cart"
                                            data-toggle="tooltip" title="Remove"
                                            data-id="{{ $product_details['product_id'] }}">&times;</span>
                                    </div>

                                </div>
                            @endforeach

                        </div>


                        <div class="col-lg-4">

                            <div class="card cart_summary_container mb-5">
                                <div class="card-header border-0">
                                    <span class="cart_summary_heading m-0">Cart Summary</span>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3 pt-1">
                                        <span class="font-weight-medium">Order Total</span>
                                        <span class="font-weight-medium">$ {{ $cart_total_amount }}</span>
                                    </div>
                                    {{-- <div class="d-flex justify-content-between">
                                        <span class="font-weight-medium">Cart Total</span>
                                        <span class="font-weight-medium">${{ $get_jersey_from_admin_table->price }}</span>
                                    </div> --}}
                                </div>

                                <div class="card-footer  bg-transparent">

                                    <a
                                        @if (Auth::user()) href="{{ route('cart-checkout') }}" @else href="{{ route('login') }}" @endif>
                                        <button class="jersey_proceed_to_checkout_btn my-3 py-3" type="button">Proceed To
                                            Checkout</button>
                                    </a>

                                </div>
                            </div>
                            <span class="text-center">Looking for more?</span> <a onclick="history.back()">Continue shopping</a>
                        </div>
                    </div>


                </div>
            </form>
        @else
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <div class="empty_card">

                            <div class="empty_card-body">
                                <div class="col-sm-12 text-center">
                                    {{-- <img src="{{ asset('dist/images/cart_shopping_icon.svg') }}" width="130" height="130"
                                class="img-fluid mb-4 mr-3"> --}}
                                    <p><strong>Your Shopping Cart Is Empty
                                        </strong></p>
                                    <a href="{{ route('greek-store') }}" class="empty_continue_shopping_btn"
                                        {{-- <a href="{{ url('shop/' . request()->segment(2)) }}" class="empty_continue_shopping_btn" --}} data-abc="true">continue shopping</a>

                                </div>

                            </div>
                        </div>


                    </div>

                </div>

            </div>
        @endif
    @else
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="empty_card">

                        <div class="empty_card-body">
                            <div class="col-sm-12 text-center">
                                {{-- <img src="{{ asset('dist/images/cart_shopping_icon.svg') }}" width="130" height="130"
                                class="img-fluid mb-4 mr-3"> --}}
                                <p><strong>Your Shopping Cart Is Empty
                                    </strong></p>
                                <a href="{{ route('greek-store') }}" class="empty_continue_shopping_btn"
                                    {{-- <a href="{{ url('shop/' . request()->segment(2)) }}" class="empty_continue_shopping_btn" --}} data-abc="true">continue shopping</a>

                            </div>

                        </div>
                    </div>


                </div>

            </div>

        </div>
    @endif

@endsection



@section('script')
    <script type="text/javascript">
        $(".update-cart").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });


        $(".remove-from-cart").click(function(e) {
            e.preventDefault();
            var jersey_id = $(this).attr("data-id");


            if (confirm("Are you sure")) {
                $.ajax({
                    url: 'remove-from-greek-cart',
                    // url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: jersey_id
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
