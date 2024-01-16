@extends('front.layouts.master')

@section('content')

<div class="title-section padad">
    <h2>{{$news->title}}</h2>
    <p>{{ \Illuminate\Support\Str::limit($news->description, 120, $end='...') }}</p>

</div>
<div class="video">
    <div class="container">
            <iframe width="100%" height="300px" style="margin-top: 150px;" poster=""
            src="{{$news->url}}">
            </iframe>
    </div>
</div>
<div class="gallery-saad">
    <div class="container">
                <center>
            <button class="btn btn-primary clipboard" style="background: #664d79;color: white;border: none; margin-bottom: 20px;">@lang('website.share')</button>
        </center>
        <div class="" >
            <div class="">
            @foreach ($news->images as $image)
                <div class="" style="height:auto" >
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
<div id="services " class="services detbac">
    <div class="container">

        <div class="title-section padad">

            <p>{{$news->description}}</p>
        </div>

    </div>
</div>

@endsection