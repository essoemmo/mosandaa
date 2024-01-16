@extends('front.layouts.master')

@section('content')

    <style>
        .categories{
            flex-wrap: wrap;
        }

        .categories  a{
            background: #664080;
            color: #fff;
            padding: 10px 50px;
            width:20%;
            border-radius: 40px;
            margin:5px ;
            text-align:center;
            transition: all .6s ease-in-out;
            flex-wrap:wrap;
        }
        .categories  a:hover{
            background:#dfd9e4;
            color:#000
        }
        .categories  a.active{
            background:#dfd9e4;
            color:#000 !important
        }
        @media screen and (max-width: 992px) {
            .categories  a{

                width:100%;
            }
        }
    </style>
    <div class="auctions">
        <div class="container">
            <div class="title-section">
                <h2>@lang('website.respons')</h2>
                <p>{{ \Illuminate\Support\Str::limit($respons->description, 120, $end='...') }}</p>

            </div>
            <div class="categories d-flex" style=" justify-content:space-around; margin:10px 0 ">
            <a href="{{route('respons')}}" > الكل</a>
                @foreach(\App\Models\Category::where('section_id',$respons->id)->get() as $cat)  
                <a href="{{route('responsFilter',$cat)}}" @if ($cat->id == $id) class="active" @endif > {{$cat->title}} </a>
                @endforeach    
        </div>
            <div class="row">


                @foreach ( $responsAll as $respon)
                    <div class="col-md-4">
                        <div class="swiper-slide sw-enter">
                            <img src="{{getImagePath($respon->images()->first()->image)}}" alt="">
                            <div class="cont-swiper">
                                <a href="{{route('responsdetails',$respon->id)}}"><h4>{{$respon->title}}</h4></a>
                                <h6>{{$respon->created_at->format('d-m-Y')}}</h6>
                                <p>{{$respon->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
