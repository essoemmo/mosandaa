@extends('front.layouts.master')

@section('content')


<div id="services d-ser" class="services">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="img-baka">
                    <img src="{{getImagePath($consultant->image)}}" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="content-det-text">
                    <div>
                        <h3>{{$consultant->name}}</h3>
                        <h6>{{$consultant->position}}</h6>
                        <p>{{$consultant->title}}</p>
                    </div>
                </div>
            </div>
        </div>
        <p class="p-ca"><p>{{$consultant->description}}</p></p>
    </div>
</div>

@endsection