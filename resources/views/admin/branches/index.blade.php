@extends('admin.layout.master')
@section('content')

<div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">@lang('admin.dashboard')</h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">@lang('admin.home')</a>
                    </li>

                    <li class="breadcrumb-item"><a href="">@lang('admin.branches')</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

 {{-- main section crud in one page --}}
<section>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-datatable">

                     <div class="card-header border-bottom">
                    <h4 class="card-title"> @lang('admin.branches')</h4>
                    @if(Auth::guard('admin')->user()->hasPermission('branches-create'))
                    <button class="dt-button create-new btn btn-dark d-inline-flex" type="button" data-toggle="modal"
                        data-target="#modal-add-branches">
                        <span style="font-size: 15px;">+ @lang('admin.addbranches')</span>
                    </button>
                    @else
                    <button class="dt-button create-new btn btn-dark d-inline-flex disabled" type="button">
                        <span style="font-size: 15px;">+ @lang('admin.addbranches')</span>
                    </button>
                    @endif

                </div> 

                    {{ $dataTable->table([
                        'class'=> 'datatables-ajax table table-bordered branches-table'
                    ],true) }}

                </div>
            </div>
        </div>
    </div>

    
    <!-- Modal to add new record -->
    @if(Auth::guard('admin')->user()->hasPermission('branches-create'))
    <div class="modal modal-slide-in fade" id="modal-add-branches">
        <div class="modal-dialog sidebar-sm">
            <form id="addbranches" method="POST" class="add-new-record modal-content pt-0" enctype="multipart/form-data" data-parsley-validate>
                @csrf
                @method('post')

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('admin.addbranches')</h5>
                </div>
                <div class="modal-body flex-grow-1">

                    <div class="form-group">
                        <label class="form-label">@lang('admin.ar.name')</label>
                        <input type="text" name="name_ar" value="{{old('name_ar')}}" parsley-trigger="change" 
                        placeholder="@lang('admin.ar.name')" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.en.name')</label>
                        <input type="text" name="name_en" value="{{old('name_en')}}" parsley-trigger="change" 
                        placeholder="@lang('admin.en.name')" class="form-control" />
                    </div>


                    <div class="form-group">
                        <label class="form-label">@lang('admin.ar.address')</label>
                        <input type="text" name="address_ar" value="{{old('address_ar')}}" parsley-trigger="change" 
                        placeholder="@lang('admin.ar.address')" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.en.address')</label>
                        <input type="text" name="address_en" value="{{old('address_en')}}" parsley-trigger="change" 
                        placeholder="@lang('admin.en.address')" class="form-control" />
                    </div>


                    
                    <div class="form-group">
                        <label class="form-label" >@lang('admin.phone')</label>
                        <input type="text" name="phone" value="{{old('phone')}}" parsley-trigger="change" 
                        placeholder="@lang('admin.phone')" class="form-control"  required />
                    </div>

                    
                    <div class="form-group">
                        <label class="form-label" >@lang('admin.whatsapp')</label>
                        <input type="text" name="whatsapp" value="{{old('whatsapp')}}" parsley-trigger="change" 
                        placeholder="@lang('admin.whatsapp')" class="form-control"  required />
                    </div>

                    <div class="form-group">
                        <label class="form-label" >@lang('admin.fax')</label>
                        <input type="text" name="fax" value="{{old('fax')}}" parsley-trigger="change" 
                        placeholder="@lang('admin.fax')" class="form-control"  required />
                    </div>

                    
                    <div class="form-group" id="map" style="height: 250px">
                    </div>

                    <div class="form-group">
                        <label for="customFile">@lang('admin.lat') </label>
                        <input type="text" id="lat" class="form-control" name="lat">
                    </div>

                    <div class="form-group">
                        <label for="customFile">@lang('admin.lang') :</label>
                        <input type="text" id="lang" class="form-control" name="lang">
                    </div>


                    <div class="row" style="margin-top: 15px;">
                        <div class="col-12">
                            <button type="submit" name="submit"
                            class="btn btn-dark data-submit mr-1">@lang('admin.save')</button>
                        <button type="reset" class="btn btn-outline-secondary"
                            data-dismiss="modal">@lang('admin.cancel')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif

</section>

@endsection

@push('js')
<script type="text/javascript">
    $.extend(true, $.fn.dataTable.defaults, {
        language: {
            url : '{{asset('AdminS/assets_ar/app-assets/js/scripts/tables/'. app()->getLocale() . '.json') }}'
        }
    });
</script>
{{ $dataTable->scripts() }}

<script>

$('body').on('submit','#addbranches',function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('branches.store') }}",
                method: "post",
                data: new FormData(this),
                dataType: 'json',
                cache       : false,
                contentType : false,
                processData : false,
                success: function (response) {
                if(response.status == 'success'){
                    toastr.options =
                    {
                        "closeButton" : true,
                        "progressBar" : true,
                        "showDuration": 500, 
                    }
                    toastr['success']("@lang('admin.added')");
                }
                    $('.branches-table').DataTable().ajax.reload();
                    $modal = $('#modal-add-branches');
                    $modal.find('form')[0].reset();
                    $('#modal-add-branches').modal('hide');
                },
                error: function (response) {
                    var errors = response.responseJSON.errors;
                    $.each(errors, function( index, value ) {
                    toastr.options ={
                            "closeButton" : true,
                            "progressBar" : true,
                            "showDuration": 500, 
                        }
                    toastr['error'](value);
                    });
                }


            });
      });
        
      $('body').on('submit','#delform',function (e) {
           e.preventDefault();
           var url = $(this).attr('action');
           $.ajax({
             url: url,
             method: "delete",
             data: {
                 _token: '{{ csrf_token() }}',
             },
             success: function (response) {
                $('.branches-table').DataTable().ajax.reload();
             }
           });
        })
    
</script>

<script>
    var map;
    var markers = [];

    function initMap() {
        var haightAshbury = {
            lat: 24.713866131913335, 
            lng: 46.675723737695755
        };

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: haightAshbury,
            mapTypeId: 'terrain'
        });
         geocoder = new google.maps.Geocoder();
        $('#lat').val('24.713866131913335');
        $('#lang').val('46.675723737695755');
        // This event listener will call addMarker() when the map is clicked.
        map.addListener('click', function(event) {
            addMarker(event.latLng);
            var latitude = event.latLng.lat();
            var longitude = event.latLng.lng();
            // console.log(event);
            geocoder.geocode({ 'latLng': event.latLng }, function(results, status) {
                if (status !== google.maps.GeocoderStatus.OK) {
                    alert(status);
                }
               if (status == google.maps.GeocoderStatus.OK) {
                //    console.log(results);
                   var address = (results[1].formatted_address);
                   $('#address').val(address);
                }
            });
    
            $('#lat').val(latitude);
            $('#lang').val(longitude);
           
        });

        // Adds a marker at the center of the map.
        addMarker(haightAshbury);
    }

    // Adds a marker to the map and push to the array.
    function addMarker(location) {
        clearMarkers();
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

    // Removes the markers from the map, but keeps them in the array.
    function clearMarkers() {
        setMapOnAll(null);
    }

    // Shows any markers currently in the array.
    function showMarkers() {
        setMapOnAll(map);
    }

    // Deletes all markers in the array by removing references to them.
    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }

</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWr3ACfKVkWFBl9pAFhmunLHQtK0UjMVY&libraries=places&callback=initMap">
</script>
@endpush
