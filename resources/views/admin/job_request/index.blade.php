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

                    <li class="breadcrumb-item"><a href="">@lang('admin.request_jobs')</a>
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
                <div class="card-header border-bottom">
                    <h4 class="card-title"> @lang('admin.request_jobs')</h4>
                </div>
                <div class="card-datatable">
                    {{ $dataTable->table([
                        'class'=> 'datatables-ajax table table-bordered jobrequest-table'
                    ],true) }}

                </div>
            </div>
        </div>
    </div>
    @if(Auth::guard('admin')->user()->hasPermission('request_jobs-read'))
    <div class="modal fade text-left" id="details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">@lang('admin.req')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body" id="job">

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

     $('body').on('click','.jobreq',function () {
        var job_id = $(this).data('id');
        $.ajax({
            url:"{{ route('jobdetails') }}",
            type:'GET',
            data:{'job_id': job_id},
            success: function (response) {
                    var docRow = '';
                    $('#job').html('');

                      docRow = '<div class="card"><div class="card-body"> <div class="row"> <div class="col-md-6"> <h5 class="mb-75">@lang("admin.name")</h5><p class="card-text"> ' +response.name+ '</p><div class="mt-2"><h5 class="mb-75">@lang("admin.email")</h5><p class="card-text">' +response.email+ '</p></div><div class="mt-2"><h5 class="mb-75">@lang("admin.phone")</h5><p class="card-text">' +response.phone+ '</p></div><div class="mt-2"><h5 class="mb-75">@lang("admin.jobt_ype")</h5><p class="card-text">' +response.job_type+ '</p></div><div class="mt-2"><h5 class="mb-50">@lang("admin.jobaddress")</h5><p class="card-text mb-0">' +response.job_address+ '</p></div><div class="mt-2"><h5 class="mb-50">@lang("admin.city")</h5><p class="card-text mb-0">' +response.job_city+ '</p></div><div class="mt-2"><h5 class="mb-50">@lang("admin.national")</h5><p class="card-text mb-0">' +response.national+ '</p></div><div class="mt-2"><h5 class="mb-50">@lang("admin.job_numb")</h5><p class="card-text mb-0">' +response.job_numb+ '</p></div><div class="mt-2"><h5 class="mb-50">@lang("admin.sex")</h5><p class="card-text mb-0">' +response.sex+ '</p></div>  </div>     <div class="col-md-6">      <div class="mt-2"><h5 class="mb-50">@lang("admin.birthdate")</h5><p class="card-text mb-0">' +response.birth_date+ '</p></div><div class="mt-2"><h5 class="mb-50">@lang("admin.birthplace")</h5><p class="card-text mb-0">' +response.birth_place+ '</p></div><div class="mt-2"><h5 class="mb-50">@lang("admin.special")</h5><p class="card-text mb-0">' +response.special+ '</p></div><div class="mt-2"><h5 class="mb-50">@lang("admin.certificate")</h5><p class="card-text mb-0">' +response.certificate+ '</p></div><div class="mt-2"><h5 class="mb-50">@lang("admin.Fellowships")</h5><p class="card-text mb-0">' +response.Fellowships+ '</p></div><div class="mt-2"><h5 class="mb-50">@lang("admin.experience")</h5><p class="card-text mb-0">' +response.experience+ '</p></div><div class="mt-2"><h5 class="mb-50">@lang("admin.graduationrate")</h5><p class="card-text mb-0">' +response.graduation_rate+ '</p></div><div class="mt-2"><h5 class="mb-50">@lang("admin.graduationyear")</h5><p class="card-text mb-0">' +response.graduation_year+ '</p></div><div class="mt-2"><h5 class="mb-50">@lang("admin.note")</h5><p class="card-text mb-0">' +response.note+ '</p></div></div></div> </div></div>';

                    $('#job').append(docRow);


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
                $('.jobrequest-table').DataTable().ajax.reload();
             }
           });
        })


        $('body').on('click','#check',function () {
            //e.preventDefault();
            var active = $(this).prop('checked') == true ? 1 : 0; 
            var rate_id = $(this).data('id');
            $.ajax({
                url:'{{ route('jopRequestactive') }}',
                type:'GET',
                data:{
                    'active': active,
                    'rate_id': rate_id
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
                        $('.jobrequest-table').DataTable().ajax.reload();

                }
                }
            });
        });

</script>

@endpush
