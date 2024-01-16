<!DOCTYPE html>
<html dir="{{ app()->getLocale() }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="I'm Here admin">
    <meta name="keywords" content="I'm Here admin">
    <meta name="author" content="">
    <title>@lang('admin.adminwebsiteTitle')</title>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('AdminS/assets_ar/app-assets/images/ico/herew.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_ar/app-assets/vendors/css/vendors-rtl.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_ar/app-assets/vendors/css/extensions/toastr.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_ar/app-assets/vendors/css/animate/animate.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_ar/app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_ar/app-assets/vendors/css/vendors.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_ar/app-assets/vendors/css/forms/select/select2.min.css') }}">
        <script rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_ar/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}"></script>
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_ar/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
            <link rel="stylesheet" type="text/css"
                href="{{ asset('AdminS/assets_ar/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_ar/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_ar/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') }}">
        <!-- END: Vendor CSS-->
    @if (app()->getlocale() == 'ar')

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" 
            href="{{ asset('AdminS/assets_ar/app-assets/css-rtl/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_ar/app-assets/css-rtl/bootstrap-extended.css') }}">
        <link rel="stylesheet" type="text/css" 
            href="{{ asset('AdminS/assets_ar/app-assets/css-rtl/colors.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_ar/app-assets/css-rtl/components.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_ar/app-assets/css-rtl/themes/dark-layout.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_ar/app-assets/css-rtl/themes/bordered-layout.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_ar/app-assets/css-rtl/themes/semi-dark-layout.css') }}">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_ar/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" type="text/css" 
            href="{{ asset('AdminS/assets_ar/app-assets/css/plugins/charts/chart-apex.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_ar/app-assets/css-rtl/pages/dashboard-ecommerce.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_ar/app-assets/css-rtl/plugins/extensions/ext-component-toastr.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_ar/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css') }}">
        <link rel="stylesheet" type="text/css" 
            href="{{ asset('AdminS/assets_ar/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_ar/app-assets/css-rtl/custom-rtl.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('AdminS/assets_ar/assets/css/style-rtl.css') }}">
        <!-- END: Custom CSS-->

    @else

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_en/app-assets/vendors/css/vendors.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_en/app-assets/vendors/css/charts/apexcharts.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_en/app-assets/vendors/css/extensions/toastr.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_en/app-assets/vendors/css/animate/animate.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_en/app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_en/app-assets/vendors/css/vendors.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_en/app-assets/vendors/css/forms/select/select2.min.css') }}">
         <script rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_en/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}"></script>
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_en/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
            <link rel="stylesheet" type="text/css"
                href="{{ asset('AdminS/assets_en/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_en/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_en/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') }}">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" 
            href="{{ asset('AdminS/assets_en/app-assets/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_en/app-assets/css/bootstrap-extended.css') }}">
        <link rel="stylesheet" type="text/css" 
            href="{{ asset('AdminS/assets_en/app-assets/css/colors.css') }}">
        <link rel="stylesheet" type="text/css" 
            href="{{ asset('AdminS/assets_en/app-assets/css/components.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_en/app-assets/css/themes/dark-layout.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_en/app-assets/css/themes/bordered-layout.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_en/app-assets/css/themes/semi-dark-layout.css') }}">
        <!-- END: Theme CSS-->

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_en/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" type="text/css" 
            href="{{ asset('AdminS/assets_en/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_en/app-assets/css/pages/dashboard-ecommerce.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_en/app-assets/css/plugins/charts/chart-apex.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_en/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('AdminS/assets_en/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css') }}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('AdminS/assets_en/assets/css/style.css') }}">
        <!-- END: Custom CSS-->

    @endif

    @stack('css')

    {{-- parsly --}}
    <link rel="stylesheet" href="{{ asset('AdminS/parsley/parsly.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
<style>
      body {
        font-family: 'Cairo';
        /* font-size: 18px; */
    }
    .btn .badge{
        background-color: red;
        right: 8px;
        position: absolute;
        top: 5px;
        padding: 0;
        width: 20px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
    }
    .dropdown-item .badge{
        background-color: red;
        left: 8px;
        position: absolute;
        top: 5px;
        padding: 0;
        width: 20px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
    }
    .dropdown-item{
        position: relative;
    }
</style>
</head>

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static" data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i
                                class="ficon" data-feather="menu"></i></a></li>
                </ul>

                <ul class="nav navbar-nav bookmark-icons">
                    @if(app()->isLocale('ar'))
                    <a href="{{route('lang','en')}}" class="round" style="font-family: cairo;margin-left: 10px;"><i class="flag-icon flag-icon-us" style="font-size: 200%;border-radius: 15px;"></i></a>
                   @else
                    <a href="{{route('lang','ar')}}" class="round" style="font-family: cairo;margin-right: 10px;"><i class="flag-icon flag-icon-sa" style="font-size: 200%;border-radius: 15px;"></i></a>
                   @endif
                </ul>
            </div>
            <?php 
                $JobRequestCount=App\Models\JobRequest::where('is_read',0)->count();
                $ServiceRequestCount=App\Models\ServiceRequest::where('is_read',0)->count();
                $RateCount=App\Models\Rate::where('active',0)->count();
                $ContactCount=App\Models\ContactUs::count();
                $totalNotification=$JobRequestCount+$ServiceRequestCount+$RateCount+$ContactCount;
            ?>
            <ul class="nav navbar-nav align-items-center ml-auto">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell" style="font-size: 20px;"></i>
                    <span class="badge">{{$totalNotification}}</span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('request_service.index')}}">@lang('admin.request_services') <span class="badge"> {{$ServiceRequestCount}}</span></a>
                    <a class="dropdown-item" href="{{route('request_jobs.index')}}">@lang('admin.request_jobs') <span class="badge">{{$JobRequestCount}}</span></a>
                    <a class="dropdown-item" href="{{route('rates.index')}}">@lang('admin.customer_reviews') <span class="badge">{{$RateCount}}</span></a>
                    <a class="dropdown-item" href="{{route('contactus.index')}}">@lang('admin.contactus') <span class="badge">{{$ContactCount}}</span></a>
                </div>
            </div>
                    <a class="nav-link dropdown-toggle dropdown-user-link"
                        id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span
                                class="user-name font-weight-bolder">{{ auth()->user()->guard(['admin'])->name }}</span></div>
                    </a>
                    <div class=" dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="{{ route('admin.logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="mr-50" data-feather="power"></i>@lang('admin.logout')</a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                            class="d-none">
                            @csrf
                        </form>
                    </div>
               
            </ul>
            
        </div>
    </nav>
    <!-- END: Header-->
