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

                    <li class="breadcrumb-item"><a href="">@lang('admin.cons_details')</a>
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
                    <h4 class="card-title"> @lang('admin.cons_details')</h4>
                    @if(Auth::guard('admin')->user()->hasPermission('cons_details-create'))
                    <button class="dt-button create-new btn btn-dark d-inline-flex" type="button" data-toggle="modal"
                        data-target="#modal-add-cons_details">
                        <span style="font-size: 15px;">+ @lang('admin.addcons_details')</span>
                    </button>
                    @else
                    <button class="dt-button create-new btn btn-dark d-inline-flex disabled" type="button">
                        <span style="font-size: 15px;">+ @lang('admin.addcons_details')</span>
                    </button>
                    @endif

                </div> 

                    {{ $dataTable->table([
                        'class'=> 'datatables-ajax table table-bordered cons_details-table'
                    ],true) }}

                </div>
            </div>
        </div>
    </div>

    
    <!-- Modal to add new record -->
    @if(Auth::guard('admin')->user()->hasPermission('cons_details-create'))
    <div class="modal modal-slide-in fade" id="modal-add-cons_details">
        <div class="modal-dialog sidebar-sm" style="width: 41%;">
            <form id="addcons_details" method="POST" class="add-new-record modal-content pt-0" enctype="multipart/form-data" data-parsley-validate>
                @csrf
                @method('post')

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('admin.addcons_details')</h5>
                </div>
                <div class="modal-body flex-grow-1">

                    <div class="form-group">
                        <label for="select-country1">@lang('admin.type')</label>
                        <select class="form-control" name="type" >
                            <option value="" selected>----</option>
                            <option value="branch">@lang('admin.branch')</option>
                            <option value="department">@lang('admin.department')</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.ar.description')</label>
                        <textarea class="form-control" id="body" name="description_ar" value="{{old('description_ar')}}" cols="10" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.en.description')</label>
                        <textarea class="form-control" id="body2" name="description_en" value="{{old('description_en')}}" cols="10" rows="10"></textarea>
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
    @if(Auth::guard('admin')->user()->hasPermission('cons_details-update'))
    <div class="modal modal-slide-in fade" id="modal-edit-cons_details">
        <div class="modal-dialog sidebar-sm" style="width: 41%;">
            <form id="editcons_details" method="post" class="add-new-record modal-content pt-0" enctype="multipart/form-data" data-parsley-validate>
               @csrf
               @method('put')
               <input type="hidden" name="cons_detailsId" id="Cons_details_id" class="form-control">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('admin.editcons_details')</h5>
                </div>
                <div class="modal-body flex-grow-1">

                    <div class="form-group">
                        <label for="select-country1">@lang('admin.type')</label>
                        <select class="form-control" name="type" id="Typecons">
                            <option value="" selected>----</option>
                            <option value="branch">@lang('admin.branch')</option>
                            <option value="department">@lang('admin.department')</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.ar.description')</label>
                        <textarea class="form-control" name="description_ar" id="description_ar" cols="10" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.en.description')</label>
                        <textarea class="form-control" name="description_en" id="description_en" cols="10" rows="10"></textarea>
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
    ClassicEditor
    .create( document.querySelector( '#body' ) )
    .catch( error => {
    console.error( error );
    } );
</script>

<script>
    ClassicEditor
    .create( document.querySelector( '#body2' ) )
    .catch( error => {
    console.error( error );
    } );
</script>

<script>
    ClassicEditor
    .create( document.querySelector( '#description_ar' ) )
    .catch( error => {
    console.error( error );
    } );
</script>

<script>
    ClassicEditor
    .create( document.querySelector( '#description_en' ) )
    .catch( error => {
    console.error( error );
    } );
</script>

<script>

      $('body').on('submit','#addcons_details',function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('cons_details.store') }}",
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
                    $('.cons_details-table').DataTable().ajax.reload();
                    $modal = $('#modal-add-cons_details');
                    $modal.find('form')[0].reset();
                    $('#modal-add-cons_details').modal('hide');
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

            var id = $(this).data('cons_detailsid');
            var description_ar = $(this).data('description_ar');
            var description_en = $(this).data('description_en');
            var type = $(this).data('type');

            $('#Cons_details_id').val(id);
            $('#description_ar').val(description_ar);
            $('#description_en').val(description_en);
            $('#Typecons').val(type);
        })


       $('body').on('submit','#editcons_details',function (e) {
                e.preventDefault();
                let id = $('#Cons_details_id').val();
                var url = "{{ route('cons_details.update', ':id') }}";
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
                        $('.cons_details-table').DataTable().ajax.reload();
                        $modal = $('#modal-edit-cons_details');
                        $modal.find('form')[0].reset();
                        $('#modal-edit-cons_details').modal('hide');
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
                $('.cons_details-table').DataTable().ajax.reload();
             }
           });
        })
    
</script>
@endpush
