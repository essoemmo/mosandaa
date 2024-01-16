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

                    <li class="breadcrumb-item"><a href="">@lang('admin.request_service')</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

 {{-- main section crud in one page --}}
<section >
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title"> @lang('admin.request_service')</h4>
                </div>
                <div class="card-datatable">
                    {{ $dataTable->table([
                        'class'=> 'datatables-ajax table table-bordered servicerequest-table'
                    ],true) }}

                </div>
            </div>
        </div>
    </div>
    @if(Auth::guard('admin')->user()->hasPermission('request_service-read'))
    <div class="modal fade text-left" id="details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">@lang('admin.req')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body" id="service">

                    </div>
            </div>
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

     $('body').on('click','.servicereq',function () {
        var service_id = $(this).data('id');

        $.ajax({
            url:"{{ route('servicedetails') }}",
            type:'GET',
            data:{'service_id': service_id},
            success: function (response) {
                    var docRow = '';
                    $('#service').html('');

                      docRow = '<div class="card"><div class="card-body"><h5 class="mb-75">@lang("admin.name")</h5><p class="card-text"> ' +response.name+ '</p><div class="mt-2"><h5 class="mb-75">@lang("admin.email")</h5><p class="card-text">' +response.email+ '</p></div><div class="mt-2"><h5 class="mb-75">@lang("admin.phone")</h5><p class="card-text">' +response.phone+ '</p></div><div class="mt-2"><h5 class="mb-75">@lang("admin.organizationname")</h5><p class="card-text">' +response.organization_name+ '</p></div><div class="mt-2"><h5 class="mb-75">@lang("admin.activitytype")</h5><p class="card-text">' +response.activity_type+ '</p></div><div class="mt-2"><h5 class="mb-75">@lang("admin.legalentity")</h5><p class="card-text">' +response.legal_entity+ '</p></div><div class="mt-2"><h5 class="mb-75">@lang("admin.servicelocation")</h5><p class="card-text">' +response.service_location+ '</p></div><div class="mt-2"><h5 class="mb-75">@lang("admin.servicerequests")</h5><p class="card-text">' +response.request_service+ '</p></div><div class="mt-2"><h5 class="mb-75">@lang("admin.region")</h5><p class="card-text">' +response.region+ '</p></div><div class="mt-2"><h5 class="mb-75">@lang("admin.neighbourhood")</h5><p class="card-text">' +response.neighbourhood+ '</p></div></div></div>';

                     $('#service').append(docRow);
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
                $('.servicerequest-table').DataTable().ajax.reload();
             }
           });
        })

        $('body').on('click','#check',function () {
            //e.preventDefault();
            var active = $(this).prop('checked') == true ? 1 : 0; 
            var is_read = $(this).data('id');
            $.ajax({
                url:'{{ route('requestserviceactive') }}',
                type:'GET',
                data:{
                    'active': active,
                    'is_read': is_read
                },
                success: function (response) {
                if (response.status == 'success'){
                        toastr.options =
                        {
                            "closeButton" : true,
                            "progressBar" : true,
                            "showDuration": 500, 
                            // "rtl": isRtl 
                        }
                        toastr['success']("@lang('admin.statuschange')");
                $('.servicerequest-table').DataTable().ajax.reload();
                    }
                }
            });
        });

</script>

@endpush
