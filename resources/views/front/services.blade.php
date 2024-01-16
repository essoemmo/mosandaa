@extends('front.layouts.master')

@section('content')
<div class="auctions">
    <div class="container">
        <div class="title-section">
            <h2>@lang('website.services')</h2>
            <p>{{$services->description}}</p>

        </div>

        <div class="row">
            @foreach ($services->subsections as $service)
            <div class="col-md-4">
                <div class="card-auctions">
                        <img src="{{getImagePath($service->images()->first()->image)}}" alt="">
                        <div class="cont-titlee height-w">
                          <a href="{{route('servicesingle',$service->id)}}"><h3> {{$service->title}} </h3></a>  
                        </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection