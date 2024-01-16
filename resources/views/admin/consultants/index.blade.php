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

                    <li class="breadcrumb-item"><a href="">@lang('admin.consults')</a>
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
                    <h4 class="card-title"> @lang('admin.consults')</h4>
                    @if(Auth::guard('admin')->user()->hasPermission('consults-create'))
                    <button class="dt-button create-new btn btn-dark d-inline-flex" type="button" data-toggle="modal"
                        data-target="#modal-add-consults">
                        <span style="font-size: 15px;">+ @lang('admin.addconsults')</span>
                    </button>
                    @else
                    <button class="dt-button create-new btn btn-dark d-inline-flex disabled" type="button">
                        <span style="font-size: 15px;">+ @lang('admin.addconsults')</span>
                    </button>
                    @endif

                </div> 

                    {{ $dataTable->table([
                        'class'=> 'datatables-ajax table table-bordered consults-table'
                    ],true) }}

                </div>
            </div>
        </div>
    </div>

    
    <!-- Modal to add new record -->
    @if(Auth::guard('admin')->user()->hasPermission('consults-create'))
    <div class="modal modal-slide-in fade" id="modal-add-consults">
        <div class="modal-dialog sidebar-sm">
            <form id="addconsults" method="POST" class="add-new-record modal-content pt-0" enctype="multipart/form-data" data-parsley-validate>
                @csrf
                @method('post')

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('admin.addconsults')</h5>
                </div>
                <div class="modal-body flex-grow-1">

                    <div class="form-group">
                        <label for="customFile">@lang('admin.image')</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input image" name="image" id="image" />
                            <label class="custom-file-label" for="customFile">@lang('admin.image')</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <img src="" width="130" height="130" alt="" style="width: 100%;" class="image-show"/>
                    </div>

                    <div class="form-group">
                        <label for="select-country1">@lang('admin.type')</label>
                        <select class="form-control" name="type" >
                            <option value="" selected>----</option>
                            <option value="branch">@lang('admin.branch')</option>
                            <option value="department">@lang('admin.department')</option>
                            <option value="consult">@lang('admin.consult')</option>
                            <option value="manage">@lang('admin.manage')</option>
                        </select>
                    </div>

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
                        <label class="form-label">@lang('admin.ar.title')</label>
                        <input type="text" name="title_ar" value="{{old('title_ar')}}" parsley-trigger="change" 
                        placeholder="@lang('admin.ar.title')" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.en.title')</label>
                        <input type="text" name="title_en" value="{{old('title_en')}}" parsley-trigger="change" 
                        placeholder="@lang('admin.en.title')" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.ar.position')</label>
                        <input type="text" name="position_ar" value="{{old('position_ar')}}" parsley-trigger="change" 
                        placeholder="@lang('admin.ar.position')" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.en.position')</label>
                        <input type="text" name="position_en" value="{{old('position_en')}}" parsley-trigger="change" 
                        placeholder="@lang('admin.en.position')" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.ar.description')</label>
                        <textarea class="form-control" name="description_ar" value="{{old('description_ar')}}" cols="10" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.en.description')</label>
                        <textarea class="form-control" name="description_en" value="{{old('description_en')}}" cols="10" rows="10"></textarea>
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
    @if(Auth::guard('admin')->user()->hasPermission('consults-update'))
    <div class="modal modal-slide-in fade" id="modal-edit-consults">
        <div class="modal-dialog sidebar-sm">
            <form id="editconsults" method="post" class="add-new-record modal-content pt-0" enctype="multipart/form-data" data-parsley-validate>
               @csrf
               @method('put')
               <input type="hidden" name="consultsId" id="Consults_id" class="form-control">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('admin.editconsults')</h5>
                </div>
                <div class="modal-body flex-grow-1">

                    <div class="form-group">
                        <label for="customFile">@lang('admin.image')</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input image" name="image" id="image" />
                            <label class="custom-file-label" for="customFile">@lang('admin.image')</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <img src="" width="130" height="130" alt="" style="width: 100%;" class="image-show"/>
                    </div>

                    <div class="form-group">
                        <label for="select-country1">@lang('admin.type')</label>
                        <select class="form-control" name="type" id="Typelist" >
                            <option value="" selected>----</option>
                            <option value="branch">@lang('admin.branch')</option>
                            <option value="department">@lang('admin.department')</option>
                            <option value="consult">@lang('admin.consult')</option>
                             <option value="manage">@lang('admin.manage')</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">@lang('admin.ar.name')</label>
                        <input type="text" name="name_ar" id="name_ar" parsley-trigger="change" 
                        placeholder="@lang('admin.ar.name')" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.en.name')</label>
                        <input type="text" name="name_en" id="name_en" parsley-trigger="change" 
                        placeholder="@lang('admin.en.name')" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.ar.title')</label>
                        <input type="text" name="title_ar" id="title_ar" parsley-trigger="change" 
                        placeholder="@lang('admin.ar.title')" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.en.title')</label>
                        <input type="text" name="title_en" id="title_en" parsley-trigger="change" 
                        placeholder="@lang('admin.en.title')" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.ar.position')</label>
                        <input type="text" name="position_ar" id="position_ar" parsley-trigger="change" 
                        placeholder="@lang('admin.ar.position')" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.en.position')</label>
                        <input type="text" name="position_en" id="position_en" parsley-trigger="change" 
                        placeholder="@lang('admin.en.position')" class="form-control" />
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

$('body').on('submit','#addconsults',function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('consults.store') }}",
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
                    $('.consults-table').DataTable().ajax.reload();
                    $modal = $('#modal-add-consults');
                    $modal.find('form')[0].reset();
                    $('#modal-add-consults').modal('hide');
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

            var id = $(this).data('consultsid');
            var name_ar = $(this).data('name_ar');
            var name_en = $(this).data('name_en');
            var title_ar = $(this).data('title_ar');
            var title_en = $(this).data('title_en');
            var position_ar = $(this).data('position_ar');
            var position_en = $(this).data('position_en');
            var description_ar = $(this).data('description_ar');
            var description_en = $(this).data('description_en');
            var type = $(this).data('type');
            var photo = $(this).data('consults_image');
            var photo_url = "{{url('')}}/" + photo ;

            $('#Consults_id').val(id);
            $('#name_ar').val(name_ar);
            $('#name_en').val(name_en);
            $('#title_ar').val(title_ar);
            $('#title_en').val(title_en);
            $('#position_ar').val(position_ar);
            $('#position_en').val(position_en);
            $('#description_ar').val(description_ar);
            $('#description_en').val(description_en);
            $('#Typelist').val(type);
            $('.image-show').attr('src' , photo_url);
            $('.custom-file-label').html('');
        })


      $('body').on('submit','#editconsults',function (e) {
                e.preventDefault();
                let id = $('#Consults_id').val();
                var url = "{{ route('consults.update', ':id') }}";
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
                    $('.consults-table').DataTable().ajax.reload();
                    $modal = $('#modal-edit-consults');
                    $modal.find('form')[0].reset();
                    $('#modal-edit-consults').modal('hide');
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
                $('.consults-table').DataTable().ajax.reload();
             }
           });
        })
    
</script>
@endpush
