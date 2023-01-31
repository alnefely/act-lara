<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="Description" content="{{ setting()->site_description }}">
        <meta name="Author" content="https://facebook.com/alnefelys">
        <!-- Title -->
        <title>@yield('title')</title>
        <!-- Favicon -->
        <link rel="icon" href="{{ setting()->site_icon }}" type="image/x-icon"/>
        <!-- Icons css -->
        <link rel="stylesheet" href="{{ url('/dashboard/css/icons.css') }}">
        <!--  Custom Scroll bar-->
        <link rel="stylesheet" href="{{ url('/dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css') }}" />
        <!-- Sidemenu css -->
        <link rel="stylesheet" href="{{ url('/dashboard/css/ar/sidemenu.css') }}" />
        <!--- Style css -->
        <link rel="stylesheet" href="{{ url('/dashboard/css/ar/style.css') }}" />
        <link rel="stylesheet" href="{{ url('/dashboard/css/custom.css') }}" />
        {{-- font --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;700&display=swap" rel="stylesheet">
      
        @yield('style')
    </head>

    <body class="main-body app sidebar-mini">
        <!-- Loader -->
        <div id="global-loader">
            <img src="{{ url('/dashboard/img/loader.svg') }}" class="loader-img" alt="Loader">
        </div>
        <!-- /Loader -->

        @php
            $countMessages = 55;
        @endphp
        
        @include('layouts.dashboard.aside')
        
        <!-- main-content -->
        <div class="main-content app-content">
            <!-- main-header opened -->
            <div class="main-header sticky side-header nav nav-item">
                <div class="container-fluid">
                    <div class="main-header-left ">
                        <div class="responsive-logo">

                            <a href="#"><img src="/dashboard/img/brand/logo.png" class="logo-1" alt="logo"></a>

                        </div>
                        <div class="app-sidebar__toggle" data-toggle="sidebar">
                            <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
                            <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="main-header-right">
                        
                        <div class="nav-item full-screen fullscreen-button">
                            <a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a>
                        </div>
                        <div class="dropdown main-profile-menu nav nav-item nav-link">
                            <a class="profile-user d-flex" href="">
                                @if( !empty( adminInfo('img') ) )
                                    <img alt="" src="/dashboard/img/logo.png">
                                @else
                                    <img alt="" src="/dashboard/img/logo.png">
                                @endif
                            </a>
                            <div class="dropdown-menu">
                                <div class="main-header-profile bg-warning p-3">
                                    <div class="d-flex wd-100p">
                                        <div class="main-img-user">
                                            @if( !empty(adminInfo('img')) )
                                                <img alt="{{ adminInfo('name') }}" src="/dashboard/img/logo.png" class="">
                                            @else
                                                <img alt="{{ adminInfo('name') }}" src="/dashboard/img/logo.png" class="">
                                            @endif
                                        </div>
                                        <div class="mr-3 my-auto">
                                            <h6>{{ adminInfo('name') }}</h6>
                                        </div>
                                    </div>
                                </div>
                                {{-- <a class="dropdown-item" href="{{ url('/admin/profile') }}"><i class="bx bx-user-circle"></i>الملف التعريفي</a> --}}
                                {{-- <a class="dropdown-item" href="{{ url('/admin/settings') }}"><i class="bx bx-slider-alt"></i> إعدادت</a> --}}
                                <a class="dropdown-item" href="{{ url('/admin/logout') }}"><i class="bx bx-log-out"></i> تسجيل خروج</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /main-header -->
            
            <!-- container -->
            <div style="font-family: 'Cairo';" class="container-fluid" id="app">
                
                <!-- breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-2" style="background-color:#FFF">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">لوحة التحكم</a></li>
                        @yield('breadcrumb')
                    </ol>
                </nav>
                <!-- breadcrumb -->
                
                <!-- content -->
                <div class="content mb-3">

                    @include('layouts.dashboard.alert')
                    @yield('content')
                </div>
                <!-- content closed -->

            </div>
            <!-- Container closed -->
        </div>
        <!-- main-content closed -->
    


        <!-- Footer opened -->
        <div class="main-footer ht-40">
            <div class="container-fluid pd-t-0-f ht-100p">
          <span> {{ date('Y') }}© برمجة وتصميم <span class="fa fa-phone mx-1 text-success"> </span> <a target="_blank" href="https://wa.me/966540810007">أحمد الزهراني</a></span>
            </div>
        </div>
        <!-- Footer closed -->
        <!-- Back-to-top -->
        <a href="#top" id="back-to-top"><i class="far fa-arrow-alt-circle-up"></i></a>

        <script src="{{ url('/dashboard/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ url('/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('/dashboard/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        {{-- <script src="{{ url('/dashboard/plugins/perfect-scrollbar/p-scroll.js') }}"></script> --}}
        <script src="{{ url('/dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ url('/dashboard/js/custom.js') }}"></script><!-- Left-menu js-->
        <script src="{{ url('/dashboard/plugins/side-menu/sidemenu.js') }}"></script>

        <script src="{{ url('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
        <script>
            $('#app').css('padding-top', $('.main-header').innerHeight());
        </script>
        @yield('script')
    </body>
</html>

