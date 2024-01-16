@extends('front.layouts.master')

@section('content')

<div class="contact-us page-contact" style="background-color: transparent;">
    <div class="container">

        <div class="title-section">
            <h2>@lang('website.serreq')</h2>
            <p>@lang('website.serdesc')</p>

        </div>


        <form id="addSerReq" method="POST" class="form-main" enctype="multipart/form-data" data-parsley-validate>
           @csrf
           @method('post')

            <div class="row">
                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.name')</label>
                        <input type="text" placeholder="@lang('website.name')" name="name" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.phone')</label>
                        <input type="text" placeholder="@lang('website.phone')" name="phone" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.org_name')</label>
                        <input type="text" placeholder="@lang('website.org_name')" name="organization_name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.email')</label>
                        <input type="email" placeholder="@lang('website.email')" name="email" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.acttype')</label>
                        <select name="activity_type" id="se-other2"  required>
                            <option value="">---</option>
                            <option value="commercial">@lang('website.commercials')</option>
                            <option value="industrial ">@lang('website.industrial')</option>
                            <option value="services">@lang('website.servicess')</option>
                            <option value="contracting ">@lang('website.contracting')</option>
                            <option value="financial">@lang('website.financials')</option>
                            <option value="other">@lang('website.other')</option>
                          </select>
                    </div>
                     <div class="mf se-show2 d-none">
                       <textarea name="activity_type_desc"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.legal')</label>
                        <select name="legal_entity" required>
                            <option value="">---</option>
                            <option value="individual">@lang('website.individual')</option>
                            <option value="joint">@lang('website.joint')</option>
                            <option value="closed">@lang('website.closed')</option>
                            <option value="closed">@lang('website.open')</option>
                            <option value="closed">@lang('website.limited')</option>
                          </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.location')</label>
                        <select name="service_location" id="se-other" required>
                            <option value="">---</option>
                            <option value="jeddah">@lang('website.jeddah')</option>
                            <option value="medina">@lang('website.medina')</option>
                            <option value="khobar">@lang('website.khobar')</option>
                            <option value="riyadh">@lang('website.riyadh')</option>
                            <option value="southern">@lang('website.southern')</option>
                            <option value="northern">@lang('website.northern')</option>
                            <option value="other">@lang('website.other')</option>
                          </select>
                    </div>
                       <div class="mf se-show d-none">
                       <textarea name="service_location_desc"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mf">
                        <label for="">@lang('website.reqserv')</label>
                        <select name="request_service" required>
                            <option value="">---</option>
                            <option value="financial">@lang('website.financialr')</option>
                            <option value="advice ">@lang('website.advice')</option>
                            <option value="vat">@lang('website.vat')</option>
                            <option value="ifrs">@lang('website.ifrs')</option>
                            <option value="bookkeeping ">@lang('website.bookkeeping')</option>
                            <option value="audit">@lang('website.audit')</option>
                            <option value="zakat ">@lang('website.zakat')</option>
                            <option value="judicial">@lang('website.judicial')</option>
                            <option value="double">@lang('website.double')</option>
                          </select>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="mf ch-f">
                        <input type="checkbox" class="check-in" name="price_offer" id="" value="1">
                        <label for="" style="font-weight: bold;">@lang('website.priceoffer')</label>
                        <p>@lang('website.priceofferdesc')</p>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
                <div class="uploud-flile d-flex disac">
                    <div class="col-md-6">
                        <div class="mf">
                            <label for="">@lang('website.commercial')</label>
                            <input type="file" placeholder="@lang('website.commercial')" name="commercial_register" id="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mf">
                            <label for="">@lang('website.contract')</label>
                            <input type="file" placeholder="@lang('website.contract')" name="found_contract" id="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mf">
                            <label for="">@lang('website.financial')</label>
                            <input type="file" placeholder="@lang('website.financial')" name="financial" id="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mf">
                            <label for="">@lang('website.balance')</label>
                            <input type="file" placeholder="@lang('website.balance')" name="balance" id="">
                        </div>
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
        $('body').on('submit','#addSerReq',function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{route('servicestore')}}",
                method: "post",
                data: new FormData(this),
                dataType: 'json',
                cache       : false,
                contentType : false,
                processData : false,
                success: function (response) {
                    if(response.status == 'success'){
                        swal("@lang('website.serviceadded')", response.message, "success");
                        $('#addSerReq').trigger("reset");
                    }

                },

            });
        });
    </script>
@endpush
