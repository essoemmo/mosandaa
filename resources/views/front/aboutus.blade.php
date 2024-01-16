@extends('front.layouts.master')

@section('content')

<div id="services" class="services">
    <div class="container">

        <div class="title-section">
            <h2>@lang('website.aboutus')</h2>
            <p>{{$abouts->description}}</p>

        </div>
        <div class="row">
            @foreach ( $abouts->subsections as $about)
            <div class="col-md-4 col-12">
                <div class="cont-ser">
                    <div class="cont-ser-section">
                        <img class="ser-img" src="{{getImagePath($about->images()->first()->image)}}" />
                        <h4>{{$about->title}}</h4>
                        <p> {{$about->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- End about-us -->

<!-- start dwonload  -->
<div class="download">
    <div class="container">

        <div class="title-section">
            <h2 style="max-width: 70%; margin: auto; line-height: 1.7;">@lang('website.book') </h2>
            <p style="padding-bottom: 40px;">@lang('website.bookdesc')</p>
            <a href="{{ asset('FrontS/brochure.pdf')}}" class="cont-text-contact" style="padding:10px 50px">@lang('website.download')</a>
        </div>
    </div>
</div>

@endsection
