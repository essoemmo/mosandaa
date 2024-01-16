@extends('front.layouts.master')

@section('content')
<div class="title-section padad">
    <h2>{{$service->title}}</h2>
    <p>{{ \Illuminate\Support\Str::limit($service->description, 120, $end='...') }} </p>
</div>

<div class="gallery-saad">
    <div class="container">
        <center>
            <button class="btn btn-primary clipboard" style="background: #664d79;color: white;border: none; margin-bottom: 20px;">@lang('website.share')</button>
        </center>
    <div class="swiper-slide" style="width: 50%; margin:auto;">
        <img src="{{getImagePath($service->images()->first()->image)}}" style="border-radius: 30px; " alt="">
    </div>

    </div>
</div>
<div id="services " class="services detbac">
    <div class="container">

        <div class="title-section">
            <p>{{$service->description}}</p>
        </div>

    </div>
</div>
<!-- start gallery -->
<div class="title-section padad">
    <h2 style="max-width: 70%; margin: auto; line-height: 1.7; margin-bottom: 30px;"> @lang('website.serreq')</h2>
    <a href="{{route('servicereq')}}" class="cont-text-contact" style="padding:10px 150px">@lang('website.serreq')</a>
</div>
@endsection
