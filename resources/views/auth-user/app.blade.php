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
        
        {{-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --}}
        <!-- main-sidebar -->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar sidebar-scroll">
            <div class="main-sidemenu">
                <div class="app-sidebar__user clearfix">
                    <div class="dropdown user-pro-body">
                        <div class="">
                            <img alt="{{ adminInfo('name') }}" class="avatar avatar-xl brround" src="/dashboard/img/profile.png"><span class="avatar-status profile-status bg-green"></span>
                        </div>
                        <div class="user-info">
                            <h4 class="font-weight-semibold mt-3 mb-0">{{ auth()->user()->name }}</h4>
                        </div>
                    </div>
                </div>
                <ul style="font-family: 'Cairo';" class="side-menu">

                    <li class="slide">
                        <a class="side-menu__item" href="{{ url('/user/home') }}">
                            <i class="fas fa-star side-menu__icon"></i>
                            <span class="side-menu__label">المشاركة</span>
                        </a>
                    </li>
                    @php $user = App\Models\User::find(Auth::user()->id); @endphp
                    @if ($user->status == 1)
                    <li class="slide">
                        <a class="side-menu__item" href="{{ url('/user/profile') }}">
                            <i class="fa fa-user side-menu__icon"></i>
                            <span class="side-menu__label">الملف التعريفي</span>
                        </a>
                    </li>
                    @endif
                    <li class="slide">
                        <a class="side-menu__item" href="{{ url('/user/logout') }}">
                            <i class="bx bx-log-out side-menu__icon"></i>
                            <span class="side-menu__label">تسجيل خروج</span>
                        </a>
                    </li>

                </ul>
            </div>
        </aside>

{{-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --}}
        
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
                    <div class="main-header-right"></div>
                </div>
            </div>
            <!-- /main-header -->
            
            <!-- container -->
            <div style="font-family: 'Cairo';" class="container-fluid" id="app">
                <!-- content -->
                <div class="content mb-3 mt-3">
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

