@extends('front.layout.app')
@section('content')
<section id="pageNotFound" class="no_data_found">

    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-auto">
                <div class="notFoundImg mt-5">
                    {{-- <img src="https://nfl.kloudexpert.com/front/img/soccerFootball.png" alt=""> --}}
                    <img src="{{ asset('front/img/soccerFootball.png') }}" alt="">
                </div>
                <h3>No Product Found</h3>

                <a href="{{ route('shop') }}" class="btn btn-primary">Contiue Shopping </a>
            </div>
        </div>
    </div>
</section>
@endsection
