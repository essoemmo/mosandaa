
<!-- Input fields for title and description -->
<label for="subserviceTitleAr">العنوان:</label>
<input type="text" id="subserviceTitleAr" name="subserviceTitleAr" class="form-control" value="{{ $subservice->title_ar }}" required>
@error('subserviceTitleAr')
    <span class="text-danger">{{ $message }}</span>
@enderror

<label for="subserviceTitleEn">Title:</label>
<input type="text" id="subserviceTitleEn" name="subserviceTitleEn" class="form-control" value="{{ $subservice->title_en }}" required>
@error('subserviceTitleEn')
    <span class="text-danger">{{ $message }}</span>
@enderror
<input type="hidden" id="subserviceId" name="subserviceId" value="{{ $subservice->id }}">

<label for="subserviceDescriptionAr">الوصف:</label>
<textarea id="subserviceDescriptionAr" name="subserviceDescriptionAr" class="form-control" required>{{ $subservice->description_ar }}</textarea>
@error('subserviceDescriptionAr')
    <span class="text-danger">{{ $message }}</span>
@enderror
<label for="subserviceDescriptionEn">Description:</label>
<textarea id="subserviceDescriptionEn" name="subserviceDescriptionEn" class="form-control" required>{{ $subservice->description_en }}</textarea>
@error('subserviceDescriptionEn')
    <span class="text-danger">{{ $message }}</span>
@enderror
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('admin.cancel')</button>
    <!-- Add your update button here -->
    <button type="button" class="btn btn-primary" onclick="updateSubservice()">@lang('admin.update')</button>
</div>