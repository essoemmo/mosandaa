    
   @extends('front.layouts.master')

   @section('content') 

   <div id="services d-ser" class="services">
    <div class="containewr">

        <div class="title-section">
            <h2>@lang('website.clients')</h2>
            <p>@lang('website.clientsdesc')</p>
        </div>
@foreach ($clients->subsections as $client)
      <div class="row">
            <div class="title-part">
                <h3>{{$client->title}}</h3>
            </div>
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
                <!-- Add Arrows -->

            </div>
        </div>
@endforeach
      

    </div>
</div>
   
   @endsection