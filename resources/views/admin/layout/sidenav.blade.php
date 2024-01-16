<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="#"><span class="brand-logo">
                        <img src="{{asset('AdminS/assets_ar/app-assets/images/ico/rcpa.png')}}"
                        style="max-width: 50px;margin-top: -14px;">
                    </span>

                    @if (app()->getlocale() == 'ar')
                        <h2 class="brand-text" style="margin-top: -8px;margin-left: 0px;font-size: 31px;margin-right: 23px;">RCPA</h2>
                    @else
                    <h2 class="brand-text" style="margin-top: -10px;margin-left: 5px;font-size: 31px;">RCPA</h2>
                    @endif

                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item {{ URL::route('adminhome') === URL::current() ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{route('adminhome')}}"><i data-feather='home'></i><span
                        style="font-family: cairo;" class="menu-title text-truncate"
                        data-i18n="City">@lang('admin.home')</span>
                </a>
            </li>

            @if(Auth::guard('admin')->user()->hasPermission('sections-read'))
            <li class="nav-item {{ URL::route('sections.index') === URL::current() ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{route('sections.index')}}"><i data-feather='layout'></i><span
                        style="font-family: cairo;" class="menu-title text-truncate"
                        data-i18n="Setting">@lang('admin.websection')</span>
                </a>
            </li>
            @endif

            @if(Auth::guard('admin')->user()->hasPermission('categories-read'))
                <li class="nav-item {{ URL::route('categories.index') === URL::current() ? 'active' : '' }}" >
                    <a class="nav-link d-flex align-items-center" href="{{route('categories.index')}}"><i data-feather='list'></i><span style="font-family: cairo;"  data-i18n="Dashboards">@lang('admin.categories')</span>
                    </a>
                </li>
            @endif

            @if(Auth::guard('admin')->user()->hasPermission('admins-read'))
            <li class="nav-item {{ URL::route('admins.index') === URL::current() ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{route('admins.index')}}"><i data-feather="user"></i><span
                        style="font-family: cairo;" class="menu-title text-truncate"
                        data-i18n="Admin">@lang('admin.admins')</span>
                </a>
            </li>
            @endif

            @if(Auth::guard('admin')->user()->hasPermission('roles-read'))
            <li class="nav-item {{ URL::route('roles.index') === URL::current() ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{route('roles.index')}}"><i
                        data-feather='book-open'></i><span style="font-family: cairo;" class="menu-title text-truncate"
                        data-i18n="Role">@lang('admin.roles')</span>
                </a>
            </li>
            @endif

            @if(Auth::guard('admin')->user()->hasPermission('request_jobs-read'))
            <li class="nav-item {{ URL::route('request_jobs.index') === URL::current() ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{route('request_jobs.index')}}"><i data-feather='file-text'></i><span style="font-family: cairo;" class="menu-title text-truncate"
                        data-i18n="Role">@lang('admin.request_jobs')</span>
                </a>
            </li>
            @endif

            @if(Auth::guard('admin')->user()->hasPermission('request_service-read'))
            <li class="nav-item {{ URL::route('request_service.index') === URL::current() ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{route('request_service.index')}}"><i data-feather='radio'></i><span style="font-family: cairo;" class="menu-title text-truncate"
                        data-i18n="Role">@lang('admin.request_services')</span>
                </a>
            </li>
            @endif

            @if(Auth::guard('admin')->user()->hasPermission('rates-read'))
            <li class="nav-item {{ URL::route('rates.index') === URL::current() ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{route('rates.index')}}"><i data-feather='star'></i><span
                        style="font-family: cairo;" class="menu-title text-truncate"
                        data-i18n="City">@lang('admin.customer_reviews')</span>
                </a>
            </li>
            @endif

            @if(Auth::guard('admin')->user()->hasPermission('ads-read'))
            <li class="nav-item {{ URL::route('ads.index') === URL::current() ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{route('ads.index')}}"><i data-feather='gift'></i><span
                        style="font-family: cairo;" class="menu-title text-truncate"
                        data-i18n="City">@lang('admin.ads')</span>
                </a>
            </li>
            @endif


            @if(Auth::guard('admin')->user()->hasPermission('consults-read'))
            <li class="nav-item {{ URL::route('consults.index') === URL::current() ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{route('consults.index')}}"><i data-feather='users'></i><span
                        style="font-family: cairo;" class="menu-title text-truncate"
                        data-i18n="City">@lang('admin.consults')</span>
                </a>
            </li>
            @endif


            @if(Auth::guard('admin')->user()->hasPermission('cons_details-read'))
            <li class="nav-item {{ URL::route('cons_details.index') === URL::current() ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{route('cons_details.index')}}"><i data-feather='edit-3'></i><span
                        style="font-family: cairo;" class="menu-title text-truncate"
                        data-i18n="City">@lang('admin.cons_details')</span>
                </a>
            </li>
            @endif

            @if(Auth::guard('admin')->user()->hasPermission('branches-read'))
            <li class="nav-item {{ URL::route('branches.index') === URL::current() ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{route('branches.index')}}"><i data-feather='maximize-2'></i><span style="font-family: cairo;" class="menu-title text-truncate"
                        data-i18n="contacts">@lang('admin.branches')</span>
                </a>
            </li>
            @endif

            @if(Auth::guard('admin')->user()->hasPermission('contactus-read'))
            <li class="nav-item {{ URL::route('contactus.index') === URL::current() ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{route('contactus.index')}}"><i
                        data-feather='phone-call'></i><span style="font-family: cairo;" class="menu-title text-truncate"
                        data-i18n="contacts">@lang('admin.contactus')</span>
                </a>
            </li>
            @endif

            @if(Auth::guard('admin')->user()->hasPermission('settings-read'))
            <li class="nav-item {{ URL::route('setting') === URL::current() ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{route('setting')}}"><i data-feather='settings'></i><span
                        style="font-family: cairo;" class="menu-title text-truncate"
                        data-i18n="Setting">@lang('admin.settings')</span>
                </a>
            </li>
            @endif

             @if(Auth::guard('admin')->user()->hasPermission('settings-read'))
            <li class="nav-item {{ URL::route('subscrips') === URL::current() ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{route('subscrips')}}"><i data-feather='settings'></i><span
                        style="font-family: cairo;" class="menu-title text-truncate"
                        data-i18n="Setting">@lang('admin.subscrips')</span>
                </a>
            </li>
            @endif


        </ul>
    </div>
</div>
<!-- END: Main Menu-->
