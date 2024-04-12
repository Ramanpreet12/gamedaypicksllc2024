@extends('front.layout.app')

@push('css')
<link rel="stylesheet" href="{{ asset('front/shop/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('front/shop/css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('front/shop/css/custom.css') }}">

<style>



    .empty_card {
        margin:30px;
        margin-bottom: 30px;
        border: 0;
        -webkit-transition: all .3s ease;
        transition: all .3s ease;
        letter-spacing: .5px;
        border-radius: 8px;
        -webkit-box-shadow: 1px 5px 24px 0 rgba(68,102,242,.05);
        box-shadow: 1px 5px 24px 0 rgb(68 102 241 / 9%);
    }

    /* .card .card-header {
        background-color: #fff;
        border-bottom: none;
        padding: 24px;
        border-bottom: 1px solid #f6f7fb;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    } */


    .empty_card .empty_card-body {
        padding: 70px;
        background-color: transparent;
    }

    .empty_continue_shopping_btn{

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

    .empty_continue_shopping_btn:hover{
        background-color: #d18605;
    }

    .products-single a img {
    aspect-ratio: 1 / 1;
    object-fit: contain;
    /* object-fit: cover; */
}


</style>
@endpush
@section('content')

{{-- <div class="all-title-box" style="background-image: url('{{ asset('front/img/jerseys/nfl_shop_bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Shop</h2>
            </div>
        </div>
    </div>
</div> --}}

@if ($get_kids_product->isNotEmpty())
<div class="shop-box-inner container">
<div class="row"><div class="col-xl-12 col-lg-9 col-sm-12 col-xs-12 shop-content-right"><a style="
    
    font-size: 24px;
    margin-bottom: 10px;

" href="{{route('pony-express-flag-football-shop')}}">Pony Express Flag Football Shop</a></div></div>

    <div class="container">
        <div class="row">

            <div class="col-xl-12 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                <div class="right-product-box">
                    <div class="product-item-filter row">
                        <div class="col-12 col-sm-8 text-center text-sm-left">
                        </div>
                    </div>
                    <div class="row product-categorie-box">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                <div class="row">
                                    {{-- {{ dd($get_kids_product) }} --}}
                                    @foreach ($get_kids_product as $product)
                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                        <div class="products-single fix">
                                            <div class="box-img-hover">
                                                <a   href="{{ url('pony-express-flag-football-shop/'.$product->product_url.'/'.$product->id) }}" >

                                                    @if ($product->product_images->isNotEmpty())
                                                    <img src="{{ asset('storage/images/products/'.$product->product_images['0']->image_name) }}" class="img-fluid" alt="Image">

                                                    @else
                                                    <img src="{{ asset('dist/images/no-image.png') }}" class="img-fluid" alt="Image">


                                                    @endif
                                            </a>
                                            </div>
                                            <div class="why-text">
                                                <span>{!! \Illuminate\Support\Str::limit( $product->product_name, 50,'...')  !!} </span>

                                                    @if ($product->product_variations->isNotEmpty())
                                                    <h5> ${{ $product->product_variations[0]->product_price }}</h5>
                                                    @else
                                                    <h5> </h5>
                                                    @endif

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@else
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">

            <div class="empty_card">

                <div class="empty_card-body">
                    <div class="col-sm-12 text-center">
                        {{-- <img src="{{ asset('dist/images/cart_shopping_icon.svg') }}" width="130" height="130"
                            class="img-fluid mb-4 mr-3"> --}}
                        <p><strong>No Jersey Found
                        </strong></p>
                        <a href="{{ route('home') }}" class="empty_continue_shopping_btn"
                        data-abc="true">Go to Home</a>

                    </div>

                </div>
            </div>


        </div>

    </div>

</div>
@endif
@endsection
