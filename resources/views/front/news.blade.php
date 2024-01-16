@extends('front.layouts.master')

@section('content')

<div class="auctions">
    <div class="container">
        <div class="title-section">
            <h2>@lang('website.news')</h2>
            <p>{{ \Illuminate\Support\Str::limit($news->description, 120, $end='...') }}</p>

        </div>

        <div class="row">

                @foreach ( $news->subsections as $new)
            <div class="col-md-4">
                <div class="swiper-slide sw-enter">
                    <img src="{{getImagePath($new->images()->first()->image)}}" alt="{{$new->title}}">
                    <div class="cont-swiper">
                       <a href="{{route('newsdetails',$new->id)}}" title="{{$new->title}}"><h4>{{$new->title}}</h4></a>
                        <h6>{{$new->created_at->format('d-m-Y')}}</h6>
                        <p>{{$new->description}}</p>
                    </div>
                </div>
            </div>
                @endforeach

        </div>
    </div>
</div>

@endsection
