@extends('front.layout.app')
@section('content')


<section id="abouttexting">
<div class="container">
<div class="row">
            <div class="col-12">
                <h2 class="about_head">{{$about_details['about_page_heading'] ?? ''}}</h4>
            </div>

            <div class="col-12">
                <h6 class="about_head mt-4">{{$about_details['about_page_sub_heading'] ?? ''}}</h6>
            </div>
</div>
<div class="aboutText">
    <div class="row">

        <div class="col-md-6 order-md-last mb-4">
        <div class="aboutusImg">

                            {{-- <img src="front/img/arenaOne.jpg" alt="" class="img-fluid"> --}}
                            @if ($about_details['about_page_image'])
                            <img src="{{asset('storage/images/static_page/'.$about_details['about_page_image'])}}" alt="" class="img-fluid">
                            @else
                            <img src="{{asset('front/img/arenaOne.jpg')}}" alt="" class="img-fluid">
                            @endif

                        </div>
        </div>
        <div class="col-md-6">
            <p class="about_text">{!! $about_details['about_page_content'] ?? '' !!}</p>
        </div>
    </div>
</div>
</div>
</section>
<style>
    .about_head{
        color: <?php echo $colorSection['about']['header_color']; ?>;
    }
    .about_text{
        color: <?php echo $colorSection['about']['text_color']; ?>;
    }
</style>
@endsection
