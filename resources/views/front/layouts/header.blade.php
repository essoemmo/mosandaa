<!doctype html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script src="https://use.fontawesome.com/d10920a460.js"></script>

    @stack('css')

    {{-- parsly --}}
    <link rel="stylesheet" href="{{ asset('AdminS/parsley/parsly.css') }}">
</head>

<body>

    <!--loader-->
    <!-- <div class="loader-container" id="loader-container">
        <div class="loader">
            <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_r4fvkt2p.json" background="transparent" speed=".5" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
        </div>
    </div> -->
    <!--sidebar-->
    <div class="mob-overlay"></div>
    <div class="sidebar-wrapper">
        <div class="container">
            <div>
                <h1 class="close-men">X</h1>
            </div>
            <div class="m-head">
                <img src="{{ asset('FrontS/img/Frame.png')}}" alt="" class="footer_logo">
            </div>
        
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('/')}}">@lang('website.home')</a>
                </li>

                 <li class="nav-item">
                    <a class="nav-link" href="{{route('aboutus')}}">@lang('website.aboutus')</a>
                </li>

                <li>
                    <!--<a class="nav-link" href="{{route('services')}}">@lang('website.services')</a>-->
                       <div class="dropdown">
                                <button class="btn  ser-dro dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    Services
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                </li>

                <li>
                    <a class="nav-link" href="{{route('consultants')}}">@lang('website.consultants')</a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('clients')}}">@lang('website.clients')</a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('requestjobs')}}">@lang('website.jobs') </a>
                </li>
                <li>
                    <!--<a class="nav-link" href="{{route('servicereq')}}">@lang('website.servicerequest')</a>-->
                          <div class="dropdown">
                                <button class="btn ser-dro dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    Services
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                </li>
                <li>
                    <a class="nav-link" href="{{route('news')}}">@lang('website.news')</a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('respons')}}">@lang('website.respons')</a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('rates')}}">@lang('website.comments')</a>
                </li>
                <li>
                    <a href="{{route('contactsus')}}" class="nav-link">@lang('website.contactUs')</a>
                </li>

                <li>
                    <a class="nav-link">
                        <a class="nav-link" href="#the_shop">
                            @if(app()->isLocale('ar'))
                            <a class="btn nav-link" href="{{route('langhome','en')}}" role="button">
                                English
                            </a>
                            @else
                            <a class="btn nav-link" href="{{route('langhome','ar')}}" role="button">
                                العربيه
                            </a>
                            @endif
                        </a>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- start navbar  -->
    <div class="nav_bar  first-nav">
        <div class="container">
            <div class="d-flexnavone">
                 <div class="nav-email">
                <i class="fas fa-phone"></i><a href="#">0559171666</a>
             <i class="far fa-envelope"></i>   <a href="#">info@rcpa.sa</a>
            </div>
                     <div class="nav_cont">
                <a href="{{ asset('FrontS/brochure.pdf')}}">@lang('website.book')</a>
                |
                <div class="social-nav">
                    <a href="{{$setting->facebook}}"> <i class="fab fa-facebook"></i></a>
                    <a href="{{$setting->twitter}}"> <i class="fab fa-twitter"></i></a>
                    <a href="{{$setting->instagram}}"> <i class="fab fa-linkedin"></i></a>
                </div>
                |
                <!-- start list-mob -->
                <a>
                    <div class="dropdown">
                        @if(app()->isLocale('ar'))
                        <a class="btn" href="{{route('langhome','en')}}" role="button">
                            English
                        </a>
                        @else
                        <a class="btn" href="{{route('langhome','ar')}}" role="button">
                            العربيه
                        </a>
                        @endif
                    </div>
                </a>
            </div>
           
            </div>
       
        </div>
    </div>
    <div class="nav_bar seconed-nav">
        <div class="container">
            <div class="nav_cont">
                <div class="d-flex-between">

                    <div class="logo_brand a-lo">
                        <i class="fas fa-bars mmenu"></i>
                    </div>

                </div>
                <img src="{{ asset('FrontS/img/logoo.png')}}" class="" alt="">
            </div>
        </div>
    </div>
    <div class="nav_bar third-nav">
        <div class="containewr">
            <div class="nav_cont">

                <!-- start list-mob -->
                <div class="list-item">
                    <ul class="">

                        <li class="nav-item">
                            <a  href="{{route('/')}}" title="home">@lang('website.home')</a>
                        </li>

                         <li class="nav-item">
                            <a  href="{{route('aboutus')}}">@lang('website.aboutus')</a>
                        </li>

                        <li>
                            <!--<a  href="{{route('services')}}">@lang('website.services')</a>-->
                        <li><a href="{{route('services')}}">@lang('website.services')</a>
                             <!-- <ul class="dropdown">-->
                             <!--     @foreach ($services->subsections as $service)-->
                             <!--     <li><a href="{{route('servicesingle',$service->id)}}">{{$service->title}}</a></li>-->
                             <!--     @endforeach-->
                             <!--</ul>-->
                        </li>
                        </li>

                        <li>
                            <a  href="{{route('consultants')}}">@lang('website.consultants')</a>
                        </li>
                        <li>
                            <a  href="{{route('clients')}}">@lang('website.clients')</a>
                        </li>
                        <li>
                            <a  href="{{route('requestjobs')}}">@lang('website.jobs') </a>
                        </li>
                        <li>
                            <a  href="{{route('servicereq')}}">@lang('website.servicerequest')</a>
                        </li>
                        <li>
                            <li><a href="{{route('news')}}">@lang('website.news')</a>
                                 <!-- <ul class="dropdown">-->
                                 <!--   @foreach ( $newss->subsections as $new)-->
                                 <!--     <li><a href="{{route('newsdetails',$new->id)}}">{{$new->title}}</a></li>-->
                                 <!--   @endforeach-->
                                 <!--</ul>-->
                            </li>
                        </li>

                         <li>
                            <li><a href="{{route('respons')}}">@lang('website.respons')</a>
                                 <!-- <ul class="dropdown">-->
                                 <!--   @foreach ( $respons->subsections as $respon)-->
                                 <!--     <li><a href="{{route('responsdetails',$respon->id)}}">{{$respon->title}}</a></li>-->
                                 <!--   @endforeach-->
                                 <!--</ul>-->
                            </li>
                        </li>
                        <li>
                            <a href="{{route('rates')}}" class="cont-text-contact">@lang('website.comments')</a>
                        </li>
                        <li>
                            <a href="{{route('contactsus')}}" class="cont-text-contact">@lang('website.contactUs')</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- start social  -->
    <div class="cont-social-icon one-s">
        <a href="https://wa.me/{{$setting->whatsapp}}">
            <i class="fab fa-whatsapp"></i>@lang('website.whatsapp')
        </a>
    </div>

    <div class="cont-social-icon two-s">
        <a href="tel:{{$setting->phone}}">
            <i class="fas fa-phone"></i>@lang('website.tele') </a>
    </div>
