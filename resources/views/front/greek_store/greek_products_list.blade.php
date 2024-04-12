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

/* tabs functionality css  */
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}


/* loder css */
.loader {
  border: 16px solid #06083b;
  border-radius: 50%;
  border-top: 16px solid #DA9A29;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* manual css  */
.productBlock{
  min-height: calc( 100vh - 224px);
  position: relative;
}
.loaderBlock {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: 0;
    left: 0;
    background-color: #00000021;
}
.tab.navTopTab {
  background-color: transparent;
  border: none !important;
  box-shadow: none;
  display: flex;
  justify-content: center;
}
.navTopTab .tablinks {
  background-color: #DA9A29;
  color: #fff;
  font-size: 16px;
  text-transform: uppercase;
  font-weight: 600;
  font-family: "Oxanium", "cursive";
  margin: 0 3px;
  padding: 13px 30px;
}
.navTopTab .tablinks.active, .navTopTab .tablinks:hover {
  background-color: #06083b;
}
.productBlock .product-item-filter {
  border-top: none;
}
.notfoundJerseyPr {
  text-align: center;
  margin-top: 20px;
}
.notfoundJerseyPr .img-fluid {
  max-width: 200px;
  margin-bottom: 20px;
}
.notfoundJerseyPr #nojersey {
  font-size: 40px;
  font-weight: 700;
}

/* Popup container styles */
.popup-container {
    display: none; /* Hide the popup by default */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    z-index: 9999; /* Ensure the popup appears above other content */
}



</style>
@endpush
@section('content')
<div class="shop-box-inner productBlock">
<div class="container">
    <div class="tab navTopTab">
  <button class="tablinks active" type="men" onClick="submitForm('men')">Men</button>
  <button class="tablinks" type="women" onClick="submitForm('women')">women</button>
  <button class="tablinks" type="youth" onClick="submitForm('youth')">youth</button>
</div>
</div>

    <div class="container">
    <div class="loaderBlock" style="display:none;"> <div class="loader"></div> </div>
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
                                <div class="row" id="tabcontentmainDiv">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Popup container -->
<div id="popupContainer" class="popup-container">
    <!-- Popup content -->
    <div class="popup-content">
        <!-- Close button -->
        <span class="close" onclick="closePopup()">&times;</span>
        <!-- Your popup message -->
        <p class="text-center">WE TAKE GREEK ORDERS FROM <br> MARCH 1<sup>ST </sup> TO AUGUST  15<sup>TH</sup> OF EACH YEAR</p>
        <!-- Add any additional content or elements as needed -->
    </div>
</div>


@endsection




<!-- yaman work start -->
@section('script')
<script>
// // Function to display the popup
// function showPopup() {
//     document.getElementById('popupContainer').style.display = 'block';
// }

// // Function to close the popup
// function closePopup() {
//     document.getElementById('popupContainer').style.display = 'none';
// }

// // Call showPopup() when the page loads
// window.onload = function() {
//     showPopup();
// };




    function submitForm(type){
        $(".loaderBlock").show();
        $("#tabcontentmainDiv").html('');
        let base_url =  window.location.origin;
        // let base_url = 'https://gamedaypicksllc.com/';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/greektabcontent',
                type: 'POST',
                data: {
                    contentType: type
                },
                success: function(response) {
                    console.log('raman', response);
                    $(".loaderBlock").hide();
                    if(response.length > 0){
                        console.log(response);
                        for(i=0;i<response.length;i++){
                            // var image_name = response[i]['product_images'][0]['image_name'];
                            var image_name = response[i]['product_image'];
                            var product_url = response[i]['product_url'];
                            var product_id = response[i]['id'];

                            if (response[i]['product_variations'].length > 0) {
                              $("#tabcontentmainDiv").append('<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3"><div class="products-single fix"><div class="box-img-hover"><a href="'+base_url+'/greek-store/'+product_url+'"><img src="'+base_url+'/storage/images/products/'+image_name+'" class="img-fluid" alt="Image"></a></div><div class="why-text"><span>'+response[i]['product_name']+'</span><h5>$'+response[i]['product_variations'][0]['product_price']+'</h5></div></div></div>');

                            } else {
                              $("#tabcontentmainDiv").append('<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3"><div class="products-single fix"><div class="box-img-hover"><a href="'+base_url+'/greek-store/'+product_url+'"><img src="'+base_url+'/storage/images/products/'+image_name+'" class="img-fluid" alt="Image"></a></div><div class="why-text"><span>'+response[i]['product_name']+'</span></div></div></div>');

                            }
                        }
                    }else{
                        $("#tabcontentmainDiv").append('<div class="col-sm-12"><div class="notfoundJerseyPr"><img src="'+base_url+'/storage/images/notfound/jersey-shirt_0002.png" class="img-fluid" alt="Image"><h1 id="nojersey">No Jersey Found</h1></div></div>');
                    }
                },
                error: function (error) {
            console.log(error);
        },
            });
    }
</script>
@endsection
<!-- yaman work ends  -->
