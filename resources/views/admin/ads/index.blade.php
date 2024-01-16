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

                    <li class="breadcrumb-item"><a href="">@lang('admin.ads')</a>
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
                    <h4 class="card-title"> @lang('admin.ads')</h4>
                    @if(Auth::guard('admin')->user()->hasPermission('ads-create'))
                    <button class="dt-button create-new btn btn-dark d-inline-flex" type="button" data-toggle="modal"
                        data-target="#modal-add-ads">
                        <span style="font-size: 15px;">+ @lang('admin.addads')</span>
                    </button>
                    @else
                    <button class="dt-button create-new btn btn-dark d-inline-flex disabled" type="button">
                        <span style="font-size: 15px;">+ @lang('admin.addads')</span>
                    </button>
                    @endif

                </div>

                    {{ $dataTable->table([
                        'class'=> 'datatables-ajax table table-bordered ads-table'
                    ],true) }}

                </div>
            </div>
        </div>
    </div>


    <!-- Modal to add new record -->
    @if(Auth::guard('admin')->user()->hasPermission('ads-create'))
    <div class="modal modal-slide-in fade" id="modal-add-ads">
        <div class="modal-dialog sidebar-sm">
            <form id="addads" method="POST" class="add-new-record modal-content pt-0" enctype="multipart/form-data" data-parsley-validate>
                @csrf
                @method('post')

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('admin.addads')</h5>
                </div>
                <div class="modal-body flex-grow-1">

                    <div class="form-group">
                        <label class="form-label">@lang('admin.ar.description')</label>
                        <textarea class="form-control" name="title_ar" value="{{old('title_ar')}}" cols="10" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.en.description')</label>
                        <textarea class="form-control" name="title_en" value="{{old('title_en')}}" cols="10" rows="10"></textarea>
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

     <!-- Modal to edit record -->
    @if(Auth::guard('admin')->user()->hasPermission('ads-update'))
    <div class="modal modal-slide-in fade" id="modal-edit-ads">
        <div class="modal-dialog sidebar-sm">
            <form id="editads" method="post" class="add-new-record modal-content pt-0" enctype="multipart/form-data" data-parsley-validate>
               @csrf
               @method('put')
               <input type="hidden" name="adsId" id="Ads_id" class="form-control">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('admin.editads')</h5>
                </div>
                <div class="modal-body flex-grow-1">

                    <div class="form-group">
                        <label class="form-label">@lang('admin.ar.description')</label>
                        <textarea class="form-control" name="title_ar" id="title_ar" cols="10" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.en.description')</label>
                        <textarea class="form-control" name="title_en" id="title_en" cols="10" rows="10"></textarea>
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

$('body').on('submit','#addads',function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('ads.store') }}",
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
                    $('.ads-table').DataTable().ajax.reload();
                    $modal = $('#modal-add-ads');
                    $modal.find('form')[0].reset();
                    $('#modal-add-ads').modal('hide');
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


      $('body').on('click','.edit',function (e) {
            e.preventDefault();

            var id = $(this).data('adsid');
            var title_ar = $(this).data('title_ar');
            var title_en = $(this).data('title_en');

            $('#Ads_id').val(id);
            $('#title_ar').val(title_ar);
            $('#title_en').val(title_en);
        })


      $('body').on('submit','#editads',function (e) {
                e.preventDefault();
                let id = $('#Ads_id').val();
                var url = "{{ route('ads.update', ':id') }}";
                url = url.replace(':id', id);

                $.ajax({
                    url: url,
                    method: "post",
                    data: new FormData(this),
                    dataType: 'json',
                    cache       : false,
                    contentType : false,
                    processData : false,
                    success: function (response) {
                    if(response.status == 'success'){
                        toastr.options = {
                            "closeButton" : true,
                            "progressBar" : true,
                            "showDuration": 500,
                        }
                        toastr['success']("@lang('admin.updated')");
                    }
                    $('.ads-table').DataTable().ajax.reload();
                    $modal = $('#modal-edit-ads');
                    $modal.find('form')[0].reset();
                    $('#modal-edit-ads').modal('hide');
                    },
                    error: function (response) {
                     var errors = response.responseJSON.errors;
                     $.each(errors, function( index, value ) {
                    toastr.options =
                    {
                        "closeButton" : true,
                        "progressBar" : true,
                        "showDuration": 500,
                    }
                    toastr['error'](value);
                });
                }

                });
       });

$('body').on('click','#check',function () {
            //e.preventDefault();
            var active = $(this).prop('checked') == true ? 1 : 0;
            var ads_id = $(this).data('id');
            $.ajax({
                url:'{{ route('adsactive') }}',
                type:'GET',
                data:{
                    'active': active,
                    'ads_id': ads_id
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
                $('.ads-table').DataTable().ajax.reload();
             }
           });
        })

</script>
@endpush
