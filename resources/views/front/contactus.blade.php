
   @extends('front.layouts.master')

   @section('content')

    <!-- start products -->
    <div class="products">
        <div class="container">
@foreach ($branches as $branch)
         <div class="cont-project">
                <img src="{{ asset('FrontS/img/backproduct.png')}}" class="left-ba" alt="">
                <div class="row">

                    <div class="col-md-6">
                        <a href="#">
                            <div class="contant-products">
                                <div class="map">
                                    <div class="form-group" id="map-{{$branch->id}}" style="height: 100%">
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <div class="contant-products main_only">
                            <div class="contenttext">
                                <h2>{{$branch->name}}</h2>
                                <p>{{$branch->address}}</p>
                                <p><a href="">{{$branch->phone}}</a></p>
                                <p><a href="">{{$branch->whatsapp}}</a></p>
                                <p><a href="">{{$branch->fax}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
@endforeach


        </div>

    </div>
    <!-- End products -->
    <!--End auctions  -->
    <div class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="h-c">@lang('website.contactUs')</h2>
                    <p>@lang('website.contactUsdes') </p>
                    <a href="#">
                        <i class="fas fa-phone"></i> {{$setting->phone}}
                    </a>
                    <a href="#">
                        <i class="fas fa-phone"></i> {{$setting->email}}
                    </a>
                </div>
                <div class="col-md-8">
                    <form id="addContact" method="POST" class="form-main" >
                        @csrf
                        @method('post')
                        <div class="mf mmf">
                            <label for="">@lang('website.name')</label>
                        <input type="text" placeholder="@lang('website.name')" name="name" required>
                        </div>
                        <div class="mf mmf">
                            <label for="">@lang('website.phone')</label>
                            <input type="text" placeholder="@lang('website.phone')" name="phone" required>
                        </div>
                        <div class="mf mmf">
                            <label for="">@lang('website.email')</label>
                            <input type="email" placeholder="@lang('website.email')" name="email" required>
                        </div>

                        <div class="mf mmf">
                            <label for="">@lang('website.subject')</label>
                            <input type="text" placeholder="@lang('website.subject')" name="subject" required>
                        </div>

                        <div class="mf all-mf">
                            <label for="">@lang('website.description')</label>
                            <textarea name="description" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="mf">
                            <input type="submit" name="submit" value="إرسال">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   @endsection

   @push('js')
       <script>
           $('body').on('submit','#addContact',function (e) {
               e.preventDefault();
               $.ajax({
                   url: "{{ route('contactsusstore') }}",
                   method: "post",
                   data: new FormData(this),
                   dataType: 'json',
                   cache       : false,
                   contentType : false,
                   processData : false,
                   success: function (response) {
                       if(response.status == 'success'){
                           swal("@lang('website.contadd')", response.message, "success");
                           $('#addContact').trigger("reset");
                       }
                   },
               });
           });
       </script>
       <script>
           var brancches = {{ Js::from($branches) }};
                var map;
                var markers = [];
                    function initMap() {
                        $.each(brancches, function(index, value) {
                            var haightAshbury = {
                                lat: Number(value.lat),
                                lng: Number(value.lang),
                            };
                            map = new google.maps.Map(document.getElementById('map-'+value.id), {
                                zoom: 12,
                                center: haightAshbury,
                                mapTypeId: 'terrain'
                            });
                            var marker = new google.maps.Marker({
                                position: haightAshbury,
                                map: map
                            });
                        });
                     }

                   // Adds a marker to the map and push to the array.
                   function addMarker(location) {
                       var marker = new google.maps.Marker({
                           position: location,
                           map: map
                       });
                       markers.push(marker);
                   }

                   // Sets the map on all markers in the array.
                   function setMapOnAll(map) {
                       for (var i = 0; i < markers.length; i++) {
                           markers[i].setMap(map);
                       }
                   }

                   //Removes the markers from the map, but keeps them in the array.
                   function clearMarkers() {
                       setMapOnAll(null);
                   }




       </script>

       <script async defer
               src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWr3ACfKVkWFBl9pAFhmunLHQtK0UjMVY&libraries=places&callback=initMap">
       </script>

   @endpush
