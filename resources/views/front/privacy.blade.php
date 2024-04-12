@extends('front.layout.app')
@section('content')
    <section id="abouttexting">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <h2>{{ $privacy_details['privacy_page_heading'] ? $privacy_details['privacy_page_heading'] : 'Privacy Policy' }}
                        </h4>

                        {{-- <h6>{{$privacy_policy->sub_heading ? $privacy_policy->sub_heading : ''}}</h6> --}}
                </div>
            </div>
            <div class="aboutText">
                <div class="row">
                    <div class="col-md-12">
                        @if (!empty($privacy_details['privacy_page_content']))
                            <p>{!! $privacy_details['privacy_page_content'] !!}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
