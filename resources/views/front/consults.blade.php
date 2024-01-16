    
   @extends('front.layouts.master')

   @section('content') 
    <!-- start partner -->

    <div id="services d-ser" class="services">
        <div class="containewr">

            <div class="title-section">
                <h2>@lang('website.consultants')</h2>
                <p>@lang('website.consultantsdesc')</p>
            </div>
            <div class="main-manger">
                <div class="card-mm">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{getImagePath($consultmanage->image)}}" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="cont-manger-text">
                                <h3>{{$consultmanage->name}}</h3>
                                <h6>{{$consultmanage->position}}</h6>
                                <p>{{$consultmanage->title}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="click-manger">
                @lang('website.branchs')
            </div>
        </div>
        <div class="main-manger">
             @foreach ($consults as $consult )
             @break($loop->iteration >1)
             <div class="card-mm">
                <div class="row">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{getImagePath($consult->image)}}" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="cont-manger-text">
                                <a href="{{route('consultantdetails',$consult->id)}}"><h3>{{$consult->name}}</h3></a>
                                <h6>{{$consult->position}}</h6>
                                <p>{{$consult->title}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
            @endforeach
            <div class="card-mm">
                <div class="row">
                    <ul>
{!!  $consultbr->description !!}
                    </ul>
                </div>
            </div>
         @foreach ($consults as $consult )
            @continue($loop->iteration <=1);

             <div class="card-mm">
                <div class="row">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{getImagePath($consult->image)}}" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="cont-manger-text">
                                <a href="{{route('consultantdetails',$consult->id)}}"><h3>{{$consult->name}}</h3></a>
                                <h6>{{$consult->position}}</h6>
                                <p>{{$consult->title}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
            @endforeach
        </div>



        <div class="click-manger">
            @lang('website.department')
        </div>

        <div class="main-manger dmanger three">
            @foreach ($consultsdepart as $consultd )
            <div class="card-mm">
                <div class="row">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{getImagePath($consultd->image)}}" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="cont-manger-text">
                                <a href="{{route('consultantdetails',$consultd->id)}}"><h3>{{$consultd->name}}</h3></a>
                                <h6>{{$consultd->position}}</h6>
                                <p>{{$consultd->title}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="main-manger">
            <div class="card-mm">
                <div class="row">
                    <ul>
                        {!!  $consultdb->description !!}
                    </ul>
                </div>
            </div>
        </div>

        <div class="click-manger">
            @lang('website.consultants')
        </div>
        <div class="main-manger dmanger three">
            @foreach ($consultscon as $consuls )
            <div class="card-mm">
                <a href="#">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{getImagePath($consuls->image)}}" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="cont-manger-text">
                                <a href="{{route('consultantdetails',$consuls->id)}}"><h3>{{$consuls->name}}</h3></a>
                                <h6>{{$consuls->position}}</h6>
                                <p>{{$consuls->title}}</p>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <!-- End partner -->

    @endsection