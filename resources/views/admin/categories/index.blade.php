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

                        <li class="breadcrumb-item"><a href="">@lang('admin.categories')</a>
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
                        <h4 class="card-title"> @lang('admin.categories')</h4>
                        @if(Auth::guard('admin')->user()->hasPermission('categories-create'))
                            <button class="dt-button create-new btn btn-dark d-inline-flex" type="button" data-toggle="modal"
                                    data-target="#modal-add-category">
                                <span style="font-size: 15px;"> + @lang('admin.addcategories')</span>
                            </button>
                        @else
                            <button class="dt-button create-new btn btn-dark d-inline-flex disabled" type="button">
                                <span style="font-size: 15px;"> + @lang('admin.addcategories')</span>
                            </button>
                        @endif

                    </div>
                    <div class="card-datatable">
                        {{ $dataTable->table([
                           'class'=> 'datatables-ajax table table-bordered category-table'
                        ],true) }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal to add new record -->
        @if(Auth::guard('admin')->user()->hasPermission('categories-create'))
            <div class="modal modal-slide-in fade" id="modal-add-category">
                <div class="modal-dialog sidebar-sm">

                    <form id="addcategory" data-massage= "{{__('admin.added')}}" action="{{ route('categories.store') }}" method="POST" class="add-new-record modal-content pt-0" data-parsley-validate>
                        @csrf
                        @method('post')

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="exampleModalLabel">@lang('admin.addcategories')</h5>
                        </div>
                        <div class="modal-body flex-grow-1">


                            <div class="form-group">
                                <label class="form-label">@lang('admin.ar.title')</label>
                                <input type="text" name="title_ar" value="{{old('title_ar')}}" parsley-trigger="change"
                                       placeholder="@lang('admin.ar.title')" class="form-control" required/>
                            </div>

                            <div class="form-group">
                                <label class="form-label">@lang('admin.en.title')</label>
                                <input type="text" name="title_en" value="{{old('title_en')}}" parsley-trigger="change"
                                       placeholder="@lang('admin.en.title')" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('admin.en.title')</label>
                                <select name="section_id" id="section_id" class="form-control">
                                @foreach(\App\Models\Section::get() as  $sec)   
                                <option value="{{$sec->id}}">{{$sec->type}}</option>
                                @endforeach
                            </select>
                            </div>


                            <button type="submit" name="submit"
                                    class="btn btn-dark data-submit mr-1">@lang('admin.save')</button>
                            <button type="reset" class="btn btn-outline-secondary"
                                    data-dismiss="modal">@lang('admin.cancel')</button>

                        </div>
                    </form>
                </div>
            </div>
        @endif

        <!-- Modal to edit record -->
        @if(Auth::guard('admin')->user()->hasPermission('categories-update'))
            <div class="modal modal-slide-in fade" id="modal-edit-category">
                <div class="modal-dialog sidebar-sm">
                    <form id="editcategory" data-url="{{route('categories.update' , ':id')}}" data-massage= "{{__('admin.updated')}}" action="" method="post" class="add-new-record modal-content pt-0" data-parsley-validate enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="categoryId" id="Category_id" class="form-control">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="exampleModalLabel">@lang('admin.editcategories')</h5>
                        </div>

                        <div class="modal-body flex-grow-1">

                            <div class="form-group">
                                <label class="form-label">@lang('admin.ar.title')</label>
                                <input type="text" name="title_ar" id="title_ar" parsley-trigger="change"
                                       placeholder="@lang('admin.ar.title')" class="form-control" required/>
                            </div>

                            <div class="form-group">
                                <label class="form-label">@lang('admin.en.title')</label>
                                <input type="text" name="title_en" id="title_en" parsley-trigger="change"
                                       placeholder="@lang('admin.en.title')" class="form-control" required/>
                            </div>

                            <button type="submit" name="submit"
                                    class="btn btn-dark data-submit mr-1">@lang('admin.save')</button>
                            <button type="reset" class="btn btn-outline-secondary"
                                    data-dismiss="modal">@lang('admin.cancel')</button>
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
                url : '{{asset('adminstyle/assets_ar/app-assets/js/scripts/tables/'. app()->getLocale() . '.json') }}'
            }
        });
    </script>
    {{ $dataTable->scripts() }}
    <script>
        $('body').on('submit','#addcategory',function (e) {
            e.preventDefault();
            let url = $(this).attr('action');
            let success = $(this).data('massage');
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
                        toastr.options =
                            {
                                "closeButton" : true,
                                "progressBar" : true,
                                "showDuration": 500,
                                // "rtl": isRtl
                            }
                        toastr['success'](success);
                    }

                    $('.category-table').DataTable().ajax.reload();
                    $(".mainCategory").load(location.href + " .mainCategory");
                    let $modal = $('#modal-add-category');
                    $modal.find('form')[0].reset();
                    $('#modal-add-category').modal('hide');
                },

                error: function (response) {
                    let errors = response.responseJSON.errors;
                    $.each(errors, function( index, value ) {
                        toastr.options =
                            {
                                "closeButton" : true,
                                "progressBar" : true,
                                "showDuration": 500,
                                // "rtl": isRtl
                            }
                        toastr['error'](value);
                    });
                }

            });
        });

        $('body').on('click','#check',function () {
            //e.preventDefault();
            var active = $(this).prop('checked') == true ? 1 : 0;
            var category_id = $(this).data('id');
            var url = $(this).data('url');
            let success = $(this).data('massage');
            $.ajax({
                url: url,
                type:'GET',
                data:{
                    'active': active,
                    'category_id': category_id
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
                        toastr['success'](success);
                    }
                }
            });
        });

        $('body').on('click','.edit',function (e) {
            e.preventDefault();

            let id = $(this).data('categoryid');
            let url = $('#editcategory').data('url').replace(':id' , id);
            $('#editcategory').attr('action' , url);
            let category = $(this).data('parent_id');
            let title_ar = $(this).data('title_ar');
            let title_en = $(this).data('title_en');
            let description_ar = $(this).data('description_ar');
            let description_en = $(this).data('description_en');
            let image_url = $(this).data('path');

            $('#Category_id').val(id);
            $('#title_ar').val(title_ar);
            $('#title_en').val(title_en);
            $('#description_ar').val(description_ar);
            $('#description_en').val(description_en);
            $('#catMain').val(category);
            $('.image-show').attr('src' , image_url);
            $('.custom-file-label').html('');
        })

        $('body').on('submit','#editcategory',function (e) {
            e.preventDefault();
            let url = $(this).attr('action');
            let success = $(this).data('massage');
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
                            // "rtl": isRtl
                        }
                        toastr['success'](success);
                    }
                    $('#modal-edit-category').modal('hide');
                    $('.category-table').DataTable().ajax.reload();
                },
                error: function (response) {
                    let errors = response.responseJSON.errors;
                    $.each(errors, function( index, value ) {
                        toastr.options ={
                            "closeButton" : true,
                            "progressBar" : true,
                            "showDuration": 500,
                            // "rtl": isRtl
                        }
                        toastr['error'](value);
                    });
                }

            });
        })

        $('body').on('submit','#delform',function (e) {
            e.preventDefault();
            let url = $(this).attr('action');
            $.ajax({
                url: url,
                method: "delete",
                data: {
                    _token: $('#token').val(),
                },
                success: function (response) {
                    $('.category-table').DataTable().ajax.reload();
                }
            });
        })
    </script>

@endpush
