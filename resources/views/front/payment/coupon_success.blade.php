@extends('front.layout.app')
@section('content')
<section id="successForm">
    <div class="container ">
        <div class="row">
            <div class="col-sm-6 mx-auto border">

                 <div class="successPage">
                    <h2>Coupon Applied Successfully</h2>
                    <i class="fa-solid fa-check"></i>
                 </div>
                 <div class="d-flex justify-content-around p-3">
                    <div>

                        <p>Name</p>
                        <p>Email</p>
                        {{-- <p>Date</p> --}}
                    </div>
                    <div>

                       <p>{{Auth::user()->name}}</p>
                       <p>{{Auth::user()->email}}</p>

                       {{-- <p>{{ \Carbon\Carbon::parse($Payment->created_at)->format('j F, Y ,H:i') }} --}}

                        </p>


                </div>

                {{-- <p>We've received your request ,  we'll be in touch shortly!</p> --}}
            </div>
            <div class="text-center">
                <p class="text-center">We've received your request ,  we'll be in touch shortly!</p>
               <a href="{{ route('teams') }}"> <button class="btn btn-primary my-3">Continue</button></a>

            </div>

        </div>
    </div>
</section>

@endsection
@section('script')
<script>
    let URL = "{{ route('teams') }}";
    setTimeout(function(){window.location=URL }, 10000);
    </script>
@endsection

