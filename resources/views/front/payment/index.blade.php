@extends('front.layout.app')
@section('content')
    <style>

::-webkit-input-placeholder {
  color: #bdbdbd;
}
::-moz-placeholder {
  color: #bdbdbd;
}
:-ms-input-placeholder {
  color: #bdbdbd;
}
:-moz-placeholder {
  color: #bdbdbd;
}
        .errorValidation {
            border: 2px solid red;
        }
        #clover__form iframe {
	    height: 50px!important;


	}

    #loader {
            border: 12px solid #f3f3f3;
            border-radius: 50%;
            border-top: 12px solid #444444;
            width: 70px;
            height: 70px;
            animation: spin  1.1s infinite linear;

        }

        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }

        .center {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }
	button-container button {
	    font-size: 1rem;

	    border: 1px #dee2e6 solid;
	    padding: .375rem .75rem;
	    height: auto;
	    line-height: 1.5;
	    border-radius: 0.375rem;

	    background-color: #333;
	    color: #fff;
	}

	.input-errors {
	    color: red;
	    font-size: 12px;
	    margin-bottom: 13px;
	    margin-top: -12px;
	}
    </style>
    <div id="loader" class="center"></div>
    <section id="paymentForm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-lg-12 col-md-12">
                @foreach($errors as $error)

                      {{$error}}

                @endforeach


                </div>
                <div class="col-sm-12 col-lg-8 col-md-12">
                    <div class="loginFormSubmit">
                        <div class="row">
                            <div class="textHeader mb-5 text-center">
                                <h2>Payment Information</h2>
                            </div>
                            <div class="text-center">
                                @if (session('message_error'))
                                <div class="alert alert-danger show flex items-center mb-2" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                    {{session('message_error')}}
                                </div>
                                @endif
                            </div>


                            <div class="col-sm-5">
                                <div class="billingInfo">
                                    <div class="numberBiling d-flex mb-3">
                                        <div class="numberRound text-center me-3">
                                            <span>1</span>
                                        </div>
                                        <div class="textItem">
                                            <h6>Billing Info</h6>
                                        </div>
                                    </div>
                                    <form action="{{ route('clover_charge') }}" method="post" id="payment-form">
                                        @csrf

                                    <input type="hidden" name="leauge" id="leauge" value="{{ $season->league }}">
                                    <input type="hidden" name="season" id="season" value="{{ $season->id }}">
                                    <div class="mb-3">
                                        <label for="fname" class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="fname" name="fname"
                                            placeholder="John" value="{{ ucfirst(auth()->user()->name) }}">

                                    </div>
                                    <div class="input-errors" id="fname-error" role="alert"></div>
                                    {{-- <div class="mb-3">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="text" class="form-control" id="amount" name="amount"
                                            placeholder="Enter Amount" value="">
                                    </div> --}}

                                    <div class="mb-3 pt-3">
                                        <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            placeholder="Street Address">

                                    </div>
                                    <div class="input-errors" id="address-error" role="alert"></div>
                                    <div class="row">
                                        <div class="mb-2 pt-3">
                                            <label for="validationCustom03" class="form-label">City <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="City" id="city" name="city">

                                        </div>
                                        <div class="input-errors" id="city-error" role="alert"></div>
                                        {{-- <div class="col-sm-6 mb-3">
                                            <label for="validationCustom05" class="form-label">Zip</label>
                                            <input type="text" class="form-control" placeholder="Zip" id="zip" name="zip"
                                                required>
                                            <div class="invalid-feedback">
                                                Please provide a valid zip.
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="mb-3 pt-2">
                                        <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="country" name="country"
                                            placeholder="Country">

                                    </div>
                                     <div class="input-errors" id="country-error" role="alert"></div>
                                    <a href="{{ route('teams') }}" type="button" class="btn btn-primary mt-3">Return Back
                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-6" id="clover__form">

                                <div class="numberBiling d-flex mb-3">
                                    <div class="numberRound text-center me-3">
                                        <span>2</span>
                                    </div>
                                    <div class="textItem">
                                        <h6>Credit Card Info</h6>
                                    </div>
                                </div>

                                    <div class="form-row top-row ">
                                        <div id="amount" class="field card-number">
                                            <input type="hidden" name="amount" placeholder="Amount" class="form-control" value="{{$season->season_amount}}">
                                        </div>
                                    </div>

                                    <div class="form-row top-row">
                                    	<label for="country" class="form-label">Card Number <span class="text-danger">*</span></label>
                                        <div id="card-number" class="field card-number ramesh"></div>
                                        <div class="input-errors " id="card-number-errors" role="alert"></div>
                                    </div>

                                    <div class="form-row">
                                    	<label for="country" class="form-label">Card Expiry Date <span class="text-danger">*</span></label>
                                        <div id="card-date" class="field third-width"></div>
                                        <div class="input-errors" id="card-date-errors" role="alert"></div>
                                    </div>

                                    <div class="form-row">
                                    <label for="country" class="form-label">CVV number <span class="text-danger">*</span></label>
                                        <div id="card-cvv" class="field third-width"></div>
                                        <div class="input-errors" id="card-cvv-errors" role="alert"></div>
                                    </div>

                                    <div class="form-row">
                                    	<label for="country" class="form-label">Postal Code <span class="text-danger">*</span></label>
                                        <div id="card-postal-code" class="field third-width"></div>
                                        <div class="input-errors" id="card-postal-code-errors" role="alert"></div>
                                    </div>

                                    <div id="card-response" role="alert"></div>
                                    <div class="button-container" id="card-submit-button">
                                        <button class="btn btn-primary">Submit Payment</button>

                                    </div>

                                </form>

                            </div>
                            <div class="col-sm-1">

                                    <div class="textItem">

                                        <div class="form-row top-row ">
                                            <div id="" class="field">
                                                <img src="{{asset('front/img/clover_device_img.png')}}" alt="" height="200px " width="200px">

                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection

@section('script')
    <script src="https://cdn.polyfill.io/v3/polyfill.min.js"></script>

    @if(env('PAYMENT_MODE') == 'TEST' )
    <script src="https://checkout.sandbox.dev.clover.com/sdk.js"></script>
    @else
    <script src="https://checkout.clover.com/sdk.js"></script>
    @endif



    <script>

        @if(env('PAYMENT_MODE') == 'TEST' )
        const clover = new Clover('{{env("CLOVER_PUBLIC_KEY")}}');
        @else
        const clover = new Clover('{{env("CLOVER_PUBLIC_KEY_PRODUCTION")}}');
        @endif


        const elements = clover.elements();
        const form = document.getElementById('payment-form');





        const styles = {
  'card-number input': {
    'width': '100%',
    'font-size': '20px',
    'border': '1px #dee2e6 solid ',
    'padding': '.375rem .75rem',
    'margin': '0'
  },
  'card-number input': {
    'width': '100%',
    'font-size': '1rem',
    'border': '1px #dee2e6 solid ',
    'padding': '.375rem .75rem',
    'height': 'auto',
    'line-height': '1.5',
    'border-radius': '0.375rem',
    'background-color': '#fff'
  },
  'card-date input': {
    'width': '100%',
    'font-size': '1rem',
    'border': '1px #dee2e6 solid ',
    'padding': '.375rem .75rem',
    'height': 'auto',
    'line-height': '1.5',
    'border-radius': '0.375rem',
    'background-color': '#fff'
  },
  'card-cvv input': {
    'width': '100%',
    'font-size': '1rem',
    'border': '1px #dee2e6 solid ',
    'padding': '.375rem .75rem',
    'height': 'auto',
    'line-height': '1.5',
    'border-radius': '0.375rem',
    'background-color': '#fff'
  },
  'card-postal-code input': {
    'width': '100%',
    'font-size': '1rem',
    'border': '1px #dee2e6 solid ',
    'padding': '.375rem .75rem',
    'height': 'auto',
    'line-height': '1.5',
    'border-radius': '0.375rem',
    'background-color': '#fff'
  },
  'card-number img.brand': {
    'right': '7px',
    'top': '4px'
  },
  'card-number iframe': {
    'height': '38px !important',
    'margin-bottom': '15px'
},
'button-container button': {
    'font-size': '1rem',
    'border': '1px #dee2e6 solid ',
    'padding': '.375rem .75rem',
    'height': 'auto',
    'line-height': '1.5',
    'border-radius': '0.375rem',
    'background-color': '#333',
    'color': '#fff',
}



};

const cardNumber = elements.create('CARD_NUMBER', styles);
const cardDate = elements.create('CARD_DATE', styles);
const cardCvv = elements.create('CARD_CVV', styles);
const cardPostalCode = elements.create('CARD_POSTAL_CODE', styles);
//const cardSubmitButton = elements.create('CARD_SUBMIT_BUTTON', styles);
//const cardCity = elements.create('CARD_CITY', styles);



        // const cardNumber = elements.create('CARD_NUMBER');
        // const cardDate = elements.create('CARD_DATE');
        // const cardCvv = elements.create('CARD_CVV');
        // const cardPostalCode = elements.create('CARD_POSTAL_CODE');

        cardNumber.mount('#card-number');
        cardDate.mount('#card-date');
        cardCvv.mount('#card-cvv');
        cardPostalCode.mount('#card-postal-code');
        //cardSubmitButton.mount('#card-submit-button');

        const cardResponse = document.getElementById('card-response');
        const displayCardNumberError = document.getElementById('card-number-errors');
        const displayCardDateError = document.getElementById('card-date-errors');
        const displayCardCvvError = document.getElementById('card-cvv-errors');
        const displayCardPostalCodeError = document.getElementById('card-postal-code-errors');


        const city = document.getElementById('city');
        const displayCityError = document.getElementById('city-error');

        city.addEventListener('change', function(event) {
            console.log(city.value);
            if(city.value == ''){
                 displayCityError.innerHTML = 'Billing City name required';

            } else{
			displayCityError.innerHTML = '';
		}
        });

        city.addEventListener('blur', function(event) {
            console.log(`cardNumber blur ${JSON.stringify(event)}`);
             if(city.value == ''){
                 displayCityError.innerHTML = 'Billing City name required';

            } else{
			displayCityError.innerHTML = '';
		}
        });



        cardNumber.addEventListener('change', function(event) {
            console.log(`cardNumber changed ${JSON.stringify(event)}`);
            //console.log(displayCardNumberError.title);
            displayCardNumberError.title = displayCardNumberError.innerHTML = event.CARD_NUMBER.error || '';
						//clover_gateway.resetValidationFlag();
        });

        cardNumber.addEventListener('blur', function(event) {
            console.log(`cardNumber blur ${JSON.stringify(event)}`);
            displayCardNumberError.title = displayCardNumberError.innerHTML = event.CARD_NUMBER.error || '';
        });

        cardDate.addEventListener('change', function(event) {
            console.log(`cardDate changed ${JSON.stringify(event)}`);
            displayCardDateError.title = displayCardDateError.innerHTML = event.CARD_DATE.error || '';
        });

        cardDate.addEventListener('blur', function(event) {
            console.log(`cardDate blur ${JSON.stringify(event)}`);
            displayCardDateError.title = displayCardDateError.innerHTML = event.CARD_DATE.error || '';
        });

        cardCvv.addEventListener('change', function(event) {
            console.log(`cardCvv changed ${JSON.stringify(event)}`);
            displayCardCvvError.title = displayCardCvvError.innerHTML = event.CARD_CVV.error || '';
        });

        cardCvv.addEventListener('blur', function(event) {
            console.log(`cardCvv blur ${JSON.stringify(event)}`);
            displayCardCvvError.title = displayCardCvvError.innerHTML = event.CARD_CVV.error || '';
        });

        cardPostalCode.addEventListener('change', function(event) {
            console.log(`cardPostalCode changed ${JSON.stringify(event)}`);
            displayCardPostalCodeError.title = displayCardPostalCodeError.innerHTML = event.CARD_POSTAL_CODE.error || '';
        });

        cardPostalCode.addEventListener('blur', function(event) {
            console.log(`cardPostalCode blur ${JSON.stringify(event)}`);
            displayCardPostalCodeError.title = displayCardPostalCodeError.innerHTML = event.CARD_POSTAL_CODE.error || '';
        });

        // Listen for form submission
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            // cloverTokenHandler('69fa6e60-6d8b-ef84-4b8e-e6b6b35cc048');
            //Use the iframe's tokenization method with the user-entered card details
            var flag=false;
            	let x = document.getElementById("fname").value;
		  if (x.trim()=="") {
		    document.getElementById("fname-error").innerHTML = "Billing user name required";
		    flag=true;
		  }else{
		  	document.getElementById("fname-error").innerHTML = "";
		  }

            	let address= document.getElementById("address").value;
		  if (address.trim()=="") {
		    document.getElementById("address-error").innerHTML = "Billing address required";
		    flag=true;
		  }else{
		  	document.getElementById("address-error").innerHTML = "";
		  }

		  let city = document.getElementById("city").value;
		  if (city.trim()=="") {
		    document.getElementById("city-error").innerHTML = "Billing City name required";
		    flag=true;
		  }else{
		  	document.getElementById("city-error").innerHTML = "";
		  }
              let country = document.getElementById("country").value;
		  if (country.trim()=="") {
		    document.getElementById("country-error").innerHTML = "Billing country required";
		    flag=true;
		  }else{
		  	document.getElementById("country-error").innerHTML = "";
		  }





            clover.createToken()
                .then(function(result) {
                    console.log('token_result:', result);



                    if (result.errors || flag==true) {
                    	let i=0;
                        Object.entries(result.errors).forEach(function([key, value]) {
                            console.log(' Error for key=> '+key+' i=> '+value);



                            if(key=="CARD_NUMBER"){
                            	var div = document.getElementById('card-number-errors');
				div.innerHTML = value;
                            }
                            if(key=="CARD_DATE"){
                            	var div = document.getElementById('card-date-errors');
				div.innerHTML = value;
                            }
                            if(key=="CARD_CVV"){
                            	var div = document.getElementById('card-cvv-errors');
				div.innerHTML = value;
                            }
                            if(key=="CARD_POSTAL_CODE"){
                            	var div = document.getElementById('card-postal-code-errors');
				div.innerHTML = value;
                            }
                            //displayError.textContent = value;
                        });
                    } else {
                        cloverTokenHandler(result.token);
                    }
                });
        });

        function cloverTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'cloverToken');
            hiddenInput.setAttribute('value', token);
            form.appendChild(hiddenInput);
            form.submit();
        }

        document.onreadystatechange = function () {
            if (document.readyState !== "complete") {
                document.querySelector(
                    "body").style.visibility = "hidden";
                document.querySelector(
                    "#loader").style.visibility = "visible";
            } else {
                document.querySelector(
                    "#loader").style.display = "none";
                document.querySelector(
                    "body").style.visibility = "visible";
            }
        };

    </script>

@endsection
