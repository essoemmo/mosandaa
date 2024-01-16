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

                    <li class="breadcrumb-item"><a href="">@lang('admin.rates')</a>
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

                    {{ $dataTable->table([
                        'class'=> 'datatables-ajax table table-bordered rate-table'
                    ],true) }}

                </div>
            </div>
        </div>
    </div>

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


       $('body').on('click','#check',function () {
            //e.preventDefault();
            var active = $(this).prop('checked') == true ? 1 : 0; 
            var rate_id = $(this).data('id');
            $.ajax({
                url:'{{ route('rateactive') }}',
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
                $('.rate-table').DataTable().ajax.reload();

                    }
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
                $('.rate-table').DataTable().ajax.reload();
             }
           });
        })
    
</script>
@endpush
