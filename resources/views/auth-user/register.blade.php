<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>تسجيل مستخدم جديد</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Creative Portfolio Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Kross Template v1.0">
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="{{asset('homeUi/images/favicon.png')}}" />
      
      <!-- ** Plugins Needed for the Project ** -->
      <!-- Bootstrap -->
      <link rel="stylesheet" href="{{asset('homeUi/plugins/bootstrap/bootstrap.min.css')}}">
      <!-- slick slider -->
      <link rel="stylesheet" href="{{asset('homeUi/plugins/slick/slick.css')}}">
      <!-- themefy-icon -->
      <link rel="stylesheet" href="{{asset('homeUi/plugins/themify-icons/themify-icons.css')}}">
    
      <!-- Main Stylesheet -->
      <link href="{{asset('homeUi/css/style.css')}}" rel="stylesheet">
      {{-- font --}}
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;700&display=swap" rel="stylesheet">
  
  

</head>
<body>
 

<!-- clients -->

<!-- contact -->
<section class="section section-on-footer" data-background="images/backgrounds/bg-dots.png">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
       <a href="{{ url('/') }}"> <img  src="{{asset('homeUi/images/logoReg.png')}}" alt="icon"></a>

      </div>
      <div class="col-lg-8 mx-auto">
        <div class="bg-white rounded text-center p-5 shadow-down">
          <h4 class="mb-40" style="background-color:#50437b; color:#fff;">تسجيل مشارك جديد</h4>

          <form action="{{route('register.store')}}" method="POST">
            {{ csrf_field() }}
            <div class="col-md-12">
              <select  name="category_id" class="form-control px-0 mb-4  text-right" required>
                <option readonly>اختر فئة الجائزة</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
              </select>
            </div>
            <div class="col-md-12">
              <input type="text" name="name" placeholder=" اسم المشارك الثلاثي" class="form-control px-0 mb-4  text-right" required>
            </div>
            <div class="col-md-12">
              <input type="number"  name="owner_phone" placeholder="رقم جوال المشارك" class="form-control px-0 mb-4  text-right" required>
            </div>
            <div class="col-md-12">
              <input type="text"  name="school_name" placeholder="اسم المدرسة" class="form-control px-0 mb-4  text-right" required>
            </div>
            <div class="col-md-12">
              <input type="text"  name="manger_name" placeholder="اسم مدير المدرسة الثلاثي" class="form-control px-0 mb-4 text-right" required>
            </div>
            <div class="col-md-12">
              <input type="number"  name="manger_phone" placeholder="رقم جوال مدير المدرسة" class="form-control px-0 mb-4  text-right" required>
            </div>
            <div class="col-md-12">
              <input type="text" name="captin_name" placeholder="اسم رائد النشاط الثلاثي" class="form-control px-0 mb-4  text-right" required>
            </div>
            <div class="col-md-12">
              <input type="number"  name="captin_phone" placeholder="رقم جوال رائد النشاط" class="form-control px-0 mb-4  text-right" required>
            </div>
            <div class="col-md-12">
                <input type="email" name="email" placeholder="name@name.com الايميل" class="form-control px-0 mb-4  text-right" required>
              </div>
            <div class="col-md-12">
              <input type="password"  name="password" placeholder="كلمة المرور" class="form-control px-0 mb-4  text-right" required>
            </div>
            {{-- <div class="col-md-12">
              <input type="password" id="password" name="password_confirmation" placeholder="اعادة كلمة المرور " class="form-control px-0 mb-4  text-right" required>
            </div> --}}

            <div class="col-lg-6 col-10 mx-auto">
              <button type="submit" class="btn btn-primary w-100">تسجيل</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /contact -->

<!-- /footer -->
  
    <!-- jQuery -->
    <script src="{{ asset('homeUi/plugins/jQuery/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('homeUi/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <!-- slick slider -->
    <script src="{{ asset('homeUi/plugins/slick/slick.min.js') }}"></script>
    <!-- filter -->
    <script src="{{ asset('homeUi/plugins/shuffle/shuffle.min.js') }}"></script>
    
    <!-- Main Script -->
    <script src="{{ asset('homeUi/js/script.js') }}"></script>
    







      @if( session('error') )
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
          <script>
              Swal.fire({
                  type: 'error',
                  html: "<span style='font-size:1.5em'>{{ session('error') }}</span>",
                  showConfirmButton: true,
                  confirmButtonText: 'Ok'
              });
          </script>
      @endif

      @if( session('success') )
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
          <script>
              Swal.fire({
                  position: 'top-center',
                  type: 'success',
                  html: "<span style='font-size:1.5em'>{{ session('success') }}</span>",
                  showConfirmButton: true,
                  confirmButtonText: 'Ok'
              })
          </script>
      @endif


    </body>
</html>
