@extends('front.layouts.master')

@section('content')

<div class="nav_bar fourth-nav">
    <div class="containewr">
        <div class="nav_cont">

            <!-- start list-mob -->
            @foreach ($tabs as $tab)
            <div class="ad">
                   <p>{{$tab->title}}</p>
                </div>
                @endforeach
        </div>
    </div>
</div>
<!-- start gallery -->



<div class="contact-us page-contact" style="background-color: transparent;">
    <div class="container">

        <div class="title-section">
            <h2>@lang('website.jobs')</h2>
            <p></p>

        </div>

        <form action="{{route('jobstore')}}" id="addJobReq" method="POST" class="form-main" data-parsley-validate>
            @csrf
            @method('post')
            <div class="row">
                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.jobtype') : *</label>
                        <select name="job_type" id="jobs">
                            <option value="now">@lang('website.now')</option>
                            <option value="future">@lang('website.future')</option>
                            <option value="training">@lang('website.training')</option>
                          </select>
                    </div>
                </div>

                <div class="col-md-6 jobData ">
                    <div class="mf">
                        <label for="">@lang('website.jobaddress') : *</label>
                        <input type="text" placeholder="@lang('website.jobaddress') " name="job_address">
                    </div>
                </div>

                <div class="col-md-6 jobData">
                    <div class="mf">
                        <label for="">@lang('website.jobnumb') :</label>
                        <input type="text" placeholder="@lang('website.jobnumb')" name="job_numb">
                    </div>
                </div>
                <div class="col-md-6 jobData">
                    <div class="mf">
                        <label for="">@lang('website.jobcity') : *</label>
                        <input type="text" placeholder="@lang('website.jobcity')" name="job_city">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.name') : *</label>
                        <input type="text" placeholder="@lang('website.name')" name="name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.phone') : *</label>
                        <input type="text" placeholder="@lang('website.phone')" name="phone" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.email'): *</label>
                        <input type="email" placeholder="@lang('website.email')" name="email" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.sex'): *</label>
                        <select name="sex">
                            <option value="male">@lang('website.male')</option>
                            <option value="female">@lang('website.female')</option>
                          </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.national') : *</label>
                        <input type="text" placeholder="@lang('website.national')" name="national" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.birthdate') : *</label>
                        <input type="date" placeholder="@lang('website.birthdate')" name="birth_date" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.birthplace'): *</label>
                        <input type="text" placeholder="@lang('website.birthplace')" name="birth_place">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.region'): *</label>
                        <input type="text"  placeholder="@lang('website.region')" name="region" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.special'): *</label>
                        <input type="text" placeholder="@lang('website.special')" name="special"  required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.certificate'): *</label>
                        <input type="text" placeholder="@lang('website.certificate')" name="certificate" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.graduationrate'): *</label>
                        <input type="text" placeholder="@lang('website.graduationrate')" name="graduation_rate" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.graduationyear'): *</label>
                        <input type="text" placeholder="@lang('website.graduationyear') " name="graduation_year" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.fellowships'):</label>
                        <input type="text" placeholder="@lang('website.fellowships')" name="Fellowships">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.experience'): *</label>
                        <input type="text" placeholder="@lang('website.experience')" name="experience" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.experienceyear'): *</label>
                        <input type="text" placeholder="@lang('website.experienceyear')" name="experience_year" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.note') :</label>
                        <!--<input type="text" placeholder="@lang('website.note')" name="note">-->
                        <textarea placeholder="@lang('website.note')" name="note" ></textarea>
                    </div>
                </div>



                <div class="col-md-12">
                    <div class="mf">
                        <input type="submit" name="submit" value="@lang('website.send')">
                    </div>
                </div>
            </div>
        </form>


    </div>
</div>

@endsection

@push('js')
    <script>
        $('body').on('submit','#addJobReq',function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('jobstore') }}",
                method: "post",
                data: new FormData(this),
                dataType: 'json',
                cache       : false,
                contentType : false,
                processData : false,
                success: function (response) {
                    if(response.status == 'success'){
                        swal("@lang('website.jobadded')", response.message, "success");
                        $('#addJobReq').trigger("reset");
                    }

                },

            });
        });
    </script>
@endpush
