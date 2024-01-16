@extends('front.layouts.master')

@section('content')

<div class="title-section">
    <h2>{{$responss->title}}</h2>
    <p>{{ \Illuminate\Support\Str::limit($responss->description, 120, $end='...') }}</p>

</div>

<!-- start video -->
<div class="video">
    <div class="container">
            <iframe width="100%" height="300px" style="margin-top: 150px;" poster=""
            src="{{$responss->url}}">
            </iframe>
    </div>
</div>
<div class="gallery-saad">
    <div class="container">
                <center>
            <button class="btn btn-primary clipboard" style="background: #664d79;color: white;border: none; margin-bottom: 20px;">@lang('website.share')</button>
        </center>
        <div class="swiper mySwipertwo" style="height:900px">
            <div class="swiper-wrapper">
            @foreach ($responss->images as $image)
                <div class="swiper-slide" style="height:1000px">
                                <img src="{{getImagePath($image->image)}}" style="border-radius: 30px; width:90%; margin:auto; " alt="">

                </div>
            @endforeach
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-prev "><i class="fas fa-arrow-right"></i></div>
            <div class="swiper-button-next "><i class="fas fa-arrow-left"></i></div>
        </div>
    </div>
</div>
<!-- End video -->
<div id="services " class="services detbac">
    <div class="container">

        <div class="title-section">
            <p>{{$responss->description}}</p>
        </div>
        
                <center>
            <button class="btn btn-primary clipboard" style="background: #664d79;color: white;border: none; margin-bottom: 20px;">@lang('website.share')</button>
        </center>

    </div>
</div>
<!-- start gallery -->


@endsection
