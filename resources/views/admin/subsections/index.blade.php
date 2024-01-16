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

                    <li class="breadcrumb-item"><a href="">@lang('admin.subsections')</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title"> @lang('admin.subsections')</h4>
                    @if(Auth::guard('admin')->user()->hasPermission('sections-create'))
                    <button class="dt-button create-new btn btn-dark d-inline-flex" type="button" data-toggle="modal"
                        data-target="#modal-add-subsection">
                        <span style="font-size: 15px;">+ @lang('admin.addsubsections')</span>
                    </button>
                    @else
                    <button class="dt-button create-new btn btn-dark d-inline-flex disabled" type="button">
                        <span style="font-size: 15px;">+ @lang('admin.addsubsections')</span>
                    </button>
                    @endif

                </div>
                <div class="card-datatable">
                    {{ $dataTable->table([
                        'class'=> 'datatables-ajax table table-bordered subsection-table'
                    ],true) }}

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade text-left" id="typesList" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">@lang('admin.image')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body" id="gallery">

                    </div>
            </div>
        </div>
    </div>


    <!-- Modal to add new record -->
    @if(Auth::guard('admin')->user()->hasPermission('sections-create'))
    <div class="modal modal-slide-in fade" id="modal-add-subsection">
        <div class="modal-dialog sidebar-sm">
            <form id="addsubsection" method="POST" class="add-new-record modal-content pt-0" enctype="multipart/form-data" data-parsley-validate>
                @csrf
                @method('post')

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('admin.addsubsections')</h5>
                </div>
                <div class="modal-body flex-grow-1">

                    <input type="hidden" name="section_id" value="{{$section->id}}">
                    <div class="form-group">
                                <label class="form-label">@lang('admin.en.title')</label>
                                <select name="category_id" id="category_id" class="form-control">
                                @foreach(\App\Models\Category::where('section_id',$section->id)->get() as  $sec)   
                                <option value="{{$sec->id}}">{{$sec->title}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label>@lang('admin.date')</label>
                        <input type="date" class="form-control invoice-edit-input" name="created_at" value="<?php echo date('Y-m-d'); ?>"  />

                    </div>

                    <div class="form-group">
                        <label for="customFile">@lang('admin.image')</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input image" name="images[]" id="image" multiple/>
                            <label class="custom-file-label" for="customFile">@lang('admin.image')</label>
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <img src="" width="130" height="130" alt="" style="width: 100%;" class="image-show"/>
                    </div> --}}

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
                        <label class="form-label">@lang('admin.ar.description')</label>
                        <textarea class="form-control" name="description_ar" value="{{old('description_ar')}}" cols="10" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.en.description')</label>
                        <textarea class="form-control" name="description_en" value="{{old('description_en')}}" cols="10" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.url')</label>
                        <input type="text" name="url" value="{{old('url')}}" parsley-trigger="change"
                        placeholder="@lang('admin.url')" class="form-control" />
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
    @if(Auth::guard('admin')->user()->hasPermission('sections-update'))
    <div class="modal modal-slide-in fade" id="modal-edit-subsection">
        <div class="modal-dialog sidebar-sm">
            <form id="editsubsection" method="post" class="add-new-record modal-content pt-0" enctype="multipart/form-data" data-parsley-validate>
               @csrf
               @method('put')
               <input type="hidden" name="subsectionId" id="Subsection_id" class="form-control">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('admin.editsubsections')</h5>
                </div>
                <div class="modal-body flex-grow-1">
                <div class="form-group">
                                <label class="form-label">@lang('admin.en.title')</label>
                                <select name="category_id" id="category_id" class="form-control">
                                @foreach(\App\Models\Category::where('section_id',$section->id)->get() as  $sec)   
                                <option value="{{$sec->id}}">{{$sec->title}}</option>
                                @endforeach
                            </select>
                    </div>
                     <div class="form-group">
                        <label>@lang('admin.date')</label>
                        <input type="date" id="datesecs" class="form-control" name="created_at" />

                    </div>


                    <div class="form-group">
                        <label for="customFile">@lang('admin.image')</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input image" name="images[]" id="image" multiple/>
                            <label class="custom-file-label" for="customFile">@lang('admin.image')</label>
                        </div>
                    </div>


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

                    <div class="form-group">
                        <label class="form-label">@lang('admin.ar.description')</label>
                        <textarea class="form-control" name="description_ar" id="description_ar" cols="10" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.en.description')</label>
                        <textarea class="form-control" name="description_en" id="description_en" cols="10" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">@lang('admin.url')</label>
                        <input type="text" name="url" id="url" parsley-trigger="change"
                        placeholder="@lang('admin.url')" class="form-control" />
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
    $('body').on('submit','#addsubsection',function (e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('subsections.store') }}',
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
                    $('.subsection-table').DataTable().ajax.reload();
                    $modal = $('#modal-add-subsection');
                    $modal.find('form')[0].reset();
                    $('#modal-add-subsection').modal('hide');
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
      
       $('body').on('click','#check',function () {
            //e.preventDefault();
            var active = $(this).prop('checked') == true ? 1 : 0; 
            var sub_id = $(this).data('id');
            $.ajax({
                url:'{{ route('subactive') }}',
                type:'GET',
                data:{
                    'active': active,
                    'sub_id': sub_id
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
       $('body').on('click','#checkBanner',function () {
            //e.preventDefault();
            var is_banner = $(this).prop('checked') == true ? 1 : 0; 
            var sub_id = $(this).data('id');
            $.ajax({
                url:'{{ route('subcheckBanner') }}',
                type:'GET',
                data:{
                    'is_banner': is_banner,
                    'sub_id': sub_id
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

      $('body').on('click','.photo',function () {
        var subsection_id = $(this).data('id');
        $.ajax({
            url:'{{ route('subimages') }}',
            type:'GET',
            data:{
                'subsection_id': subsection_id
            },

            success: function (response) {
                    var docRow = '';
                    $('#gallery').html('');
                    $.each(response, function(index, value){
                      var img = '{{url('/')}}/' + value.image;
                      var id = value.id;
                      var url = "{{ route('deleteimage', ':id') }}";
                      url = url.replace(':id', id);
                      var csrf = '{{ csrf_field() }}';
                      docRow = `<div class="col-md-6 col-lg-12"><div class="card mb-4 box"><img class="card-img-top" src="${img}" alt="Card image cap" style="height: 160px;"/><form class="delete" action= "${url}" method="POST" id="delform" ><input name="_method" type="hidden" value="DELETE">${csrf}<button type="submit" class="btn btn-icon btn-icon rounded-circle btn-danger" style="margin-right: -130px;margin-left: 190px;"><i data-feather="trash-2"></i></button></form></div></div>`;

                    $('#gallery').append(docRow);
                     feather.replace();
                });
            }
        });

    });



        $('body').on('click','.edit',function (e) {
            e.preventDefault();

            var id = $(this).data('subsectionid');
            var title_ar = $(this).data('title_ar');
            var title_en = $(this).data('title_en');
            var description_ar = $(this).data('description_ar');
            var description_en = $(this).data('description_en');
            var type = $(this).data('type');
            var url = $(this).data('url');
            var datesec = $(this).data('datesec');
            var photo = $(this).data('subsection_image');
            var photo_url = "{{url('')}}/" + photo ;
            

            $('#Subsection_id').val(id);
            $('#title_ar').val(title_ar);
            $('#title_en').val(title_en);
            $('#description_ar').val(description_ar);
            $('#description_en').val(description_en);
            $('#url').val(url);
            $('#datesecs').val(datesec);
            $('.image-show').attr('src' , photo_url);
            $('.custom-file-label').html('');
        })

        $('body').on('submit','#editsubsection',function (e) {
                e.preventDefault();
                let id = $('#Subsection_id').val();
                var url = '{{ route('subsections.update', ':id') }}';
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
                    $('.subsection-table').DataTable().ajax.reload();
                    $modal = $('#modal-edit-subsection');
                    $modal.find('form')[0].reset();
                    $('#modal-edit-subsection').modal('hide');
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
                $('.subsection-table').DataTable().ajax.reload();
                $('#typesList').modal('hide');
             }
           });
        })

</script>

@endpush
