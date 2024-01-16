@extends('front.layouts.master')

@section('content')

 <!--start top section-->
 <header>
    <div class="swiper mySwipertwo">
        <div class="swiper-wrapper">
     @foreach ( $sliders as $slider)
        @foreach ( $slider->subsections()->where('active',1)->where('is_banner',1)->get() as $slider)
        <div class="swiper-slide background-transparent">
                    <img src="{{getImagePath($slider->images()->first()->image)}}" class="header-img-ab" alt="">
                    <div class="cont-text">
                        <h3>{{$slider->title}}</h3>
                <p>{{ \Illuminate\Support\Str::limit($slider->description, 120, $end='...') }} </p>
                        <a href="{{route('sliderDetails', $slider->id)}}" class="cont-text-contact">@lang('website.more')</a>
                    </div>
        </div>
       @endforeach
    @endforeach
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-prev "><i class="fas fa-arrow-right"></i></div>
        <div class="swiper-button-next "><i class="fas fa-arrow-left"></i></div>
        <!-- </div>
    <div class="cont-text">
        <h3>مكتب رامي الخضر محاسبون قانونيون ومستشارون</h3>
        <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص..</p>
        <a href="#" class="cont-text-contact">تواصل معنا </a>
    </div> -->

</header>


<!-- End section -->
<!--start gallery  -->
<div class="gallery">
    <img src="{{ asset('FrontS/img/ppttre.png')}}" class="ppsps"/>
    <div class="container">
        <div class="title-section">
            <h2>@lang('website.news')</h2>
            <p>{{ \Illuminate\Support\Str::limit($news->description, 120, $end='...') }}</p>
            <a href="{{route('news')}}">@lang('website.more')<img src="{{ asset('FrontS/img/Arrow.png')}}" alt=""></a>
        </div>

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ( $news->subsections as $new)
                <div class="swiper-slide">
                    <img src="{{getImagePath($new->images()->first()->image)}}" alt="{{$new->title}}">
                    <div class="cont-swiper">
                        <a href="{{route('newsdetails',$new->id)}}" title="{{$new->title}}"><h4>{{$new->title}}</h4></a>
                        <h6>{{$new->created_at->format('d-m-Y')}}</h6>
                        <p>{{$new->description}}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-prev "><i class="fas fa-arrow-right"></i></div>
            <div class="swiper-button-next "><i class="fas fa-arrow-left"></i></div>
        </div>
    </div>
</div>

<!-- end section -->
<div id="services" class="services">
    <div class="container">

        <div class="title-section">
            <h2>@lang('website.aboutus')</h2>
            <p>{{ \Illuminate\Support\Str::limit($abouts->description, 120, $end='...') }}</p>
            <a href="{{route('aboutus')}}">@lang('website.more')<img src="{{ asset('FrontS/img/Arrow.png')}}" alt=""></a>
        </div>
        <div class="row">
            @foreach ( $abouts->subsections as $about)
            <div class="col-md-4 col-12">
                <div class="cont-ser">
                    <div class="cont-ser-section">
                        <img src="{{getImagePath($about->images()->first()->image)}}" class="ser-img" alt="{{$about->title}}">
                        <h4>{{$about->title}}</h4>
                        <p> {{$about->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End services  -->


<!-- start video -->
<div class="video">
    <div class="container">
            <iframe width="100%" height="400px" style="border-radius:20px;"  poster="" src="{{$video->url}}"></iframe>
    </div>
</div>
<!-- End video -->

<!-- auctions -->
<div class="auctions">
    <div class="container">
        <div class="title-section">
            <h2>@lang('website.services')</h2>
            <p>{{ \Illuminate\Support\Str::limit($services->description, 120, $end='...') }}</p>
            <a href="{{route('services')}}">@lang('website.more')<img src="{{ asset('FrontS/img/Arrow.png')}}" alt=""></a>
        </div>

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($services->subsections as $service)
                   <div class="swiper-slide">
                    <div class="card-auctions">
                        <img src="{{getImagePath($service->images()->first()->image)}}" alt="">
                        <div class="cont-titlee">
                            <a href="{{route('servicesingle',$service->id)}}"><h3> {{$service->title}} </h3></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-prev "><i class="fas fa-arrow-right"></i></div>
            <div class="swiper-button-next "><i class="fas fa-arrow-left"></i></div>
        </div>
    </div>
</div>

<!-- end section -->
<div id="services" class="services">
    <div class="container">

        <div class="title-section">
            <h2>@lang('website.join')</h2>
            <p>{{ \Illuminate\Support\Str::limit($joins->description, 120, $end='...') }}</p>
        </div>
        <div class="row">
            @foreach ($joins->subsections as $join)
            <div class="col-md-6 col-12">
                <div class="cont-ser">
                    <div class="cont-ser-section th-cont-ser">
                        <img src="{{getImagePath($join->images()->first()->image)}}" class="ser-img" alt=" ">
                       <a href="{{$join->url}}"><h4>{{$join->title}}</h4></a>
                        <p> {{$join->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End services  -->

<!-- start comments -->

<div class="comments">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h2>@lang('website.addreview')</h2>
                        <p>@lang('website.reviewdesc') </p>
                    </div>

                </div>
                <div class="modal-body">
                    <form id="addRate" method="POST" data-parsley-validate>
                        @csrf
                        @method('post')
                        <label for="name">@lang('website.name')</label>
                        <input name="name" type="text" required>
                        <label for="">@lang('website.comment')</label>
                        <textarea name="comment" id="" cols="30" rows="10" required></textarea>
                        <input type="submit" name="submit" style="margin-top: 20px;" value="@lang('website.save')">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="title-section">
            <h2>@lang('website.review')</h2>
            <p>@lang('website.reviewdesc')</p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                @lang('website.addreview')<img src="{{ asset('FrontS/img/Arrow.png')}}" alt="">
              </button>


        </div>
        <div class="gallery-saad">

            <div class="swiper mySwipertwo">
                <div class="swiper-wrapper">

                            @foreach ($reviews as $review)
                    <div class="swiper-slide background-transparent">
                        <div class="row">
                              <div class="col-md-12">
                                <div class="contant-products main_only">
                                    <div class="contenttext">
                                        <h2>{{$review->name}}</h2>
                                        <p>{{$review->created_at->format('d-m-Y')}}</p>
                                        <p>{{$review->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            @endforeach
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-prev "><i class="fas fa-arrow-right"></i></div>
                <div class="swiper-button-next "><i class="fas fa-arrow-left"></i></div>
            </div>

        </div>
    </div>
</div>

<!-- End comments -->


<div id="services d-ser " class="par-de">
    <div class="container">

        <div class="title-section">
            <h2>@lang('website.clients')</h2>
           <p>{{ \Illuminate\Support\Str::limit($clients->description, 120, $end='...') }}</p>
               <a href="{{route('clients')}}">@lang('website.more')<img src="{{ asset('FrontS/img/Arrow.png')}}" alt=""></a>
        </div>
         @foreach ($clients->subsections as $client)
            @break($loop->iteration>1)
            <div class="swiper mySwiperfour">
            <div class="swiper-wrapper">

                @foreach ($client->images as $image )
                <div class="swiper-slide" style="height: 90px;">
                      <div class="partner">
                        <img src="{{getImagePath($image->image)}}" class="" alt="">
                       </div>


                    </div>
                    @endforeach

            </div>
         </div>
         @endforeach


    </div>
</div>
<!-- End partner -->

@endsection

@push('js')
    <script>
    $('body').on('submit','#addRate',function (e) {
           e.preventDefault();
        $.ajax({
            url: "{{ route('storerate') }}",
            method: "post",
            data: new FormData(this),
            dataType: 'json',
            cache       : false,
            contentType : false,
            processData : false,
         success: function (response) {
            if(response.status == 'success'){
                swal("@lang('website.rateadd')", response.message, "success");
                $modal = $('#staticBackdrop');
                $modal.find('form')[0].reset();
                $('#staticBackdrop').modal('hide');
            }

            },

         });
    });
    </script>
@endpush
