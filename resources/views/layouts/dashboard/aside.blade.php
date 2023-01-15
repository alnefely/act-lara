<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        
        <h5 class="desktop-logo logo-light active" style="font-family: 'Cairo';">
            {{-- <a href="{{ url('/') }}">{{ setting()->site_name }}</a> --}}
            <a>أولمبياد اللغة الانجليزية</a>
        </h5>

        {{-- <a class="desktop-logo logo-dark active" href="#"><img src="/dashboard/img/logo.png" class="main-logo dark-theme" alt="logo"></a> --}}
        <a class="logo-icon mobile-logo icon-light active" href="#"><img src="/dashboard/img/logo.png" class="logo-icon" alt="logo"></a>
    </div>

    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">

                    @if( !empty(adminInfo('img')) )
                        <img alt="{{ adminInfo('name') }}" class="avatar avatar-xl brround" src="/dashboard/img/logo.png"><span class="avatar-status profile-status bg-green"></span>
                    @else
                        <img alt="{{ adminInfo('name') }}" class="avatar avatar-xl brround" src="/dashboard/img/logo.png"><span class="avatar-status profile-status bg-green"></span>
                    @endif
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ adminInfo('name') }}</h4>
                </div>
            </div>
        </div>

        <ul class="side-menu " style="font-family: 'Cairo'; ">
            <li class="slide">
                <a class="side-menu__item" href="{{ url('/admin/home') }}">
                    <i class="fas fa-home side-menu__icon"></i>
                    <span class="side-menu__label ">الرئيسية</span>
                </a>
            </li>
            <hr />

            <li class="slide">
                <a class="side-menu__item" href="{{ url('/admin/users') }}">
                    <i class="fa fa-users side-menu__icon"></i>
                    <span class="side-menu">المشاركات</span>
                </a>
            </li>
            <hr />
            
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fas fa-gavel side-menu__icon"></i>
                    <span class="side-menu__label">المحكمين</span><i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ url('/admin/governors') }}">المحكمين</a></li>
                    <li><a class="slide-item" href="{{ url('/admin/adding/documents') }}">إسناد محكم</a></li>

                </ul>
            </li>
            <hr />

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fas fa-plus side-menu__icon"></i>
                    <span class="side-menu__label">الاضافة</span><i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ url('/admin/categories') }}">الفئات</a></li>
                    <li><a class="slide-item" href="{{ url('/admin/standards') }}">المعايير</a></li>
                    <li><a class="slide-item" href="{{ url('/admin/indicators') }}">المؤشرات</a></li>
                    <li><a class="slide-item" href="{{ url('/admin/evidences') }}">الشواهد</a></li>
                </ul>
            </li>
            <hr />
            

            {{-- <li class="slide">
                <a class="side-menu__item" href="{{ url('/admin/settings') }}">
                    <i class="fas fa-cog side-menu__icon"></i>
                    <span class="side-menu__label">الاعدادات</span>
                </a>
            </li> --}}

            {{-- <li class="slide">
                <a class="side-menu__item" href="{{ route('contact.index') }}">
                    <i class="fa fa-quote-right side-menu__icon"></i>
                    <span class="side-menu__label">الرسائل</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ url('/admin/profile') }}">
                    <i class="fa fa-user side-menu__icon"></i>
                    <span class="side-menu__label">الملف التعريفي</span>
                </a>
            </li> --}}
            {{-- <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fas fa-users side-menu__icon"></i>
                    <span class="side-menu__label">المدراء</span><i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ url('/admin/all') }}">المدراء</a></li>
                    <li><a class="slide-item" href="{{ url('/admin/add-new-admin') }}">إنشاء مدير جديد</a></li>
                   <li><a class="slide-item" href="{{ url('/admin/groups') }}">مجموعات الصلاحيات</a></li>
                    <li><a class="slide-item" href="{{ url('/admin/create/group') }}">إنشاء مجموعة جديدة</a></li> 
               </ul>
            </li> --}}
            <hr />
            <li class="slide">
                <a class="side-menu__item" href="{{ url('/admin/logout') }}">
                    <i class="bx bx-log-out side-menu__icon"></i>
                    <span class="side-menu__label">تسجيل خروج</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
<!-- main-sidebar