<!doctype html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@lang('website.rcpa')</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="{{ asset('FrontS/img/logo.svg') }}" rel="icon" type="image/png" sizes="16x16">
    <link href="{{ asset('FrontS/css/simple-lightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('FrontS/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('FrontS/css/hover.css') }}" rel="stylesheet">
    <link href="{{ asset('FrontS/css/nice-select.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ asset('FrontS/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('FrontS/css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('FrontS/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('FrontS/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('FrontS/css/style-ar.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/d10920a460.js"></script>
</head>

<body>

    <div class="nav_bar seconed-nav">
        <div class="container">
            <div class="nav_cont">
                <div class="d-flex-between">

                    <div class="logo_brand a-lo">
                        <i class="fas  fa-bars mmenu"></i>
                    </div>

                </div>
                <img src="{{ asset('FrontS/img/logoo.png')}}" class="" alt="">
            </div>
        </div>
    </div>

    <div class="contact-us page-contact" style="background-color: transparent;">
        <div class="container">

            <div class="title-section">
                <h2>طلب التوظيف والتدريب</h2>
                <p></p>

            </div>

            <form action="" class="form-main">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mf">
                            <label for="">نوع الوظيفة </label>
                            <p> {{ $jobMailData['job_type'] }}</p>
                        </div>
                    </div>

                    <div class="col-md-6 jobData ">
                        <div class="mf">
                            <label for="">عنوان الوظيفة</label>
                           <p> {{ $jobMailData['job_address'] }}</p>
                        </div>
                    </div>

                    <div class="col-md-6 jobData">
                        <div class="mf">
                            <label for="">رقم الوظيفة</label>
                            <p> {{ $jobMailData['job_numb'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 jobData">
                        <div class="mf">
                            <label for=""> مدينة الوظيفة</label>
                            <p> {{ $jobMailData['job_city'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mf">
                            <label for=""> الاسم</label>
                            <p> {{ $jobMailData['name'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mf">
                            <label for="">الجنس</label>
                             <p> {{ $jobMailData['sex'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mf">
                            <label for=""> الجنسيه</label>
                             <p> {{ $jobMailData['national'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mf">
                            <label for=""> تاريخ الميلاد</label>
                             <p> {{ $jobMailData['birth_date'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mf">
                            <label for=""> مكان الميلاد</label>
                            <p> {{ $jobMailData['birth_place'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mf">
                            <label for=""> مدينه الاقامه </label>
                            <p> {{ $jobMailData['region'] }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mf">
                            <label for="">الشهاده العلميه</label>
                            <p> {{ $jobMailData['certificate'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mf">
                            <label for="">التخصص</label>
                            <p> {{ $jobMailData['special'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mf">
                            <label for="">معدل التخرج</label>
                            <p> {{ $jobMailData['graduation_rate'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mf">
                            <label for="">سنه التخرج</label>
                             <p> {{ $jobMailData['graduation_year'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mf">
                            <label for="">الزمالات </label>
                             <p> {{ $jobMailData['Fellowships'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mf">
                            <label for="">اهم الخبرات والوظائف التي عملت بها</lab
                             <p> {{ $jobMailData['experience'] }}</p>el>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mf">
                            <label for="">سنوات الخبره العمليه</label>
                             <p> {{ $jobMailData['experience_year'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mf">
                            <label for="">رقم الجوال</label>
                            <p> {{ $jobMailData['phone'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mf">
                            <label for="">البريد الالكتروني</label>
                            <p> {{ $jobMailData['email'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mf">
                            <label for="">ملاحظات هامة</label>
                            <p> {{ $jobMailData['note'] }}</p>
                        </div>
                    </div>

                </div>
            </form>


        </div>
    </div>

    <script src="{{ asset('FrontS/js/jquery-3.2.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js " integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN " crossorigin="anonymous "></script>
    <script src="{{ asset('FrontS/js/bootstrap.min.js') }} "></script>
    <script src="{{ asset('FrontS/js/main.js') }} "></script>
</body>

</html>