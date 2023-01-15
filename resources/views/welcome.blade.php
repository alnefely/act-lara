<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  dir="rtl">
  
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
      <!-- ===============================================-->
      <!--    Document Title-->
      <!-- ===============================================-->
      <title>Productly | Design Agency Landing Page UI</title>
  
  
      <!-- ===============================================-->
      <!--    Favicons-->
      <!-- ===============================================-->
      <link rel="apple-touch-icon" sizes="180x180" href="{{asset('homeUIElo/assets/img/favicons/apple-touch-icon.png')}}">
      <link rel="icon" type="image/png" sizes="32x32" href="{{asset('homeUIElo/assets/img/favicons/favicon-32x32.png')}}">
      <link rel="icon" type="image/png" sizes="16x16" href="{{asset('homeUIElo/assets/img/favicons/favicon-16x16.png')}}">
      <link rel="shortcut icon" type="image/x-icon" href="{{asset('homeUIElo/assets/img/favicons/favicon.png')}}">
      <link rel="manifest" href="{{asset('homeUIElo/assets/img/favicons/manifest.json')}}">
      <meta name="msapplication-TileImage" content="{{asset('homeUIElo/assets/img/favicons/mstile-150x150.png')}}">
      <meta name="theme-color" content="#ffffff">
      <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@500&family=Marhey:wght@300&display=swap" rel="stylesheet">
  
  
  
      <!-- ===============================================-->
      <!--    Stylesheets-->
      <!-- ===============================================-->
      <link href="{{asset('homeUIElo/assets/css/theme.css')}}" rel="stylesheet" />
      <style> @import url('https://fonts.googleapis.com/css2?family=El+Messiri:wght@500&family=Marhey:wght@300&display=swap'); </style>
  
    </head>
  
    <body>
  
      <!-- ===============================================-->
      <!--    Main Content-->
      <!-- ===============================================-->
      <main class="main" id="top">
        <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
          <div class="container"><a class="navbar-brand" href="index.html"><img src="{{asset('homeUIElo/assets/img/logo.png')}}" height="31" alt="logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
            <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" aria-current="page" href="#feature">الأدلة والملفات</a></li>
                <li class="nav-item"><a class="nav-link" aria-current="page" href="#validation">الفئات</a></li>
                <li class="nav-item"><a class="nav-link" aria-current="page" href="#superhero">العداد الزمني</a></li>
                <li class="nav-item"><a class="nav-link" aria-current="page" href="#marketing">المعرض</a></li>
              </ul>
              <div class="d-flex ms-lg-4"><a class="btn btn-secondary-outline" href="{{ url('auth/') }}">الدخول</a><a class="btn btn-warning ms-3" href="{{ url('/user/register') }}">التسجيل</a></div>
            </div>
          </div>
        </nav>
        <section class="pt-7">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-6 text-md-start text-center py-6">
                <h1 class="mb-4 fs-9 fw-bold text-center">أولمبياد اللغة الانجليزية</h1>
                <h3 class="mb-2 fs-3 fw-bold text-center">ENGLISH LANGUAGE OLYMPIA - ELO 2023</h3>
  
                <p class="mb-6 lead text-secondary text-center">الاولمبياد الأهم والأكبر من نوعه على مستوى العالم<br class="d-none d-xl-block" />للإرتقاء بمهارات اللغة الانجليزية وأساليب البحث<br class="d-none d-xl-block" />  العلمي الحديث لدى الطلبة</p>
                <div class="text-center  "><a class="btn btn-warning me-3 btn-lg" href="{{ url('/user/register') }}" role="button">تسجيل الفرق</a><a class="btn btn-link text-warning fw-medium" href="#!" role="button" data-bs-toggle="modal" data-bs-target="#popupVideo"><span class="fas fa-play me-2"></span> فيديو تعريفي </a></div>
              </div>
              <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid" src="{{asset('homeUIElo/assets/img/hero/hero-img.png')}}" alt="" /></div>
            </div>
          </div>
        </section>
  
  
        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="pt-5 pt-md-9 mb-6" id="feature">
  
          <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block" style="background-image:url(homeUIElo/assets/img/category/shape.png);opacity:.5;">
          </div>
          <!--/.bg-holder-->
  
          <div class="container">
            <h1 class="fs-9 fw-bold mb-4 text-center"> الأدلة والملفات <br class="d-none d-xl-block" /></h1>
            <div class="row text-center">
              <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="{{asset('homeUIElo/assets/img/category/icon1.png')}}" width="75" alt="Feature" />
                <h4 class="mb-3">الدليل التنظيمي</h4>
                <p class="mb-0 fw-medium text-secondary">لأولمبياد اللغة الانجليزية</p>
              </div>
              <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="{{asset('homeUIElo/assets/img/category/icon2.png')}}" width="75" alt="Feature" />
                <h4 class="mb-3">عناصر التحكيم</h4>
                <p class="mb-0 fw-medium text-secondary">فئة الصغار</p>
              </div>
              <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="{{asset('homeUIElo/assets/img/category/icon3.png')}}" width="75" alt="Feature" />
                <h4 class="mb-3">عناصر التحكيم</h4>
                <p class="mb-0 fw-medium text-secondary">فئة الكبار</p>
              </div>
              <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="{{asset('homeUIElo/assets/img/category/icon4.png')}}" width="75" alt="Feature" />
                <h4 class="mb-3">مقر الأولمبياد</h4>
                <p class="mb-0 fw-medium text-secondary">الذهاب الى الخريطة</p>
              </div>
            </div>
            <!-- <div class="text-center"><a class="btn btn-warning" href="#!" role="button">SIGN UP NOW</a></div> -->
          </div><!-- end of .container-->
  
        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->
  
  
  
  
        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="pt-5" id="validation">
  
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
              <br><br><br><br>  
              <h2 class="mb-2 fs-7 fw-bold">فئات الفرق المشاركة</h2><br>
                
                <h4 class="fs-1 fw-bold">فئة الصغار</h4>
                <p class="mb-4 fw-medium text-secondary">الفئة العمرية من 6 - 10 سنوات<br />وتشمل الطلاب والطالبات من مختلف المدارس الحكومية والأهلية<br />يتكون أعضاء الفريق من 3 أفراد، ومدرب واحد لكل فريق </p>
                
                <h4 class="fs-1 fw-bold">فئة الكبار</h4>
                <p class="mb-4 fw-medium text-secondary">الفئة العمرية من 11 - 17 سنة<br />وتشمل الطلاب والطالبات من مختلف المدارس الحكومية والأهلية<br />يتكون أعضاء الفريق من 5 أفراد، ومدرب واحد لكل فريق</p>
  
              </div>
              <div class="col-lg-6"><img class="img-fluid" src="{{asset('homeUIElo/assets/img/validation/validation.png')}}" alt="" /></div>
            </div>
          </div><!-- end of .container-->
  
        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->
  
  
  
  
        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="pt-5" id="manager">
  
          <div class="container">
            <div class="row">
              <div class="col-lg-6"><img class="img-fluid" src="{{asset('homeUIElo/assets/img/manager/manager.png')}}" alt="" /></div>
  
              <div class="col-lg-6">
                <p class="fs-7 fw-bold mb-2">المحاور الرئيسية</p>
                <h4 class="text-secondary">فئة الصغار</h4>
                  <h5 class="text-secondary">يشمل أولمبياد اللغة الانجليزية فئة الصغار من ثلاثة محاور رئيسية هي:</h5>
                <p class="mb-4 fw-medium text-secondary">عرض أدائي | مجموع الدرجات 35%<br />المشروع | مجموع الدرجات 33%<br />خدمة المجتمع المحلي | مجموع الدرجات 32%</p>            
              <h4 class="text-secondary">فئة الكبار</h4>
              <h5 class="text-secondary">يشمل أولمبياد اللغة الانجليزية فئة الكبار من خمسة محاور رئيسية هي:</h5>
              <p class="mb-4 fw-medium text-secondary">العرض الأدائي | مجموع الدرجات 24%<br />المشروع  | مجموع الدرجات 22%<br />اختبار اللغة الانجليزية | مجموع الدرجات 20%<br />خدمة المجتمع المحلي | مجموع الدرجات 21%<br />العمل الجماعي | مجموع الدرجات 13%</p>
  
              </div>
            </div>
          </div><!-- end of .container-->
  
        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->
  
  
  
  
        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="pt-5" id="marketer">
  
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <p class="fs-7 fw-bold mb-2">الجدول الزمني</p>
                <h4 class="fw-bold fs-1">2022/12/29-28</h4>
                <p class="mb-4 fw-medium text-secondary">ورشة منسقي ومنسقات الأولمبياد عن بعد</p>
                <h4 class="fw-bold fs-1">2023/01/2-1</h4>
                <p class="mb-4 fw-medium text-secondary">ورشة المحكمين عن بعد</p>
                <h4 class="fw-bold fs-1">2023/01/9-3</h4>
                <p class="mb-4 fw-medium text-secondary">المرحلة الأولى - المسابقة المحلية</p>
                <h4 class="fw-bold fs-1">2023/01/19-10</h4>
                <p class="mb-4 fw-medium text-secondary">المرحلة الثانية - المسابقة المحلية عن بعد</p>
                <h4 class="fw-bold fs-1">2023/02/16-14</h4>
                <p class="mb-4 fw-medium text-secondary">المرحلة الثالثة - التصفيات المؤهلة للمشاركة الدولية</p>
                <h4 class="fw-bold fs-1">2023/05/13-11</h4>
                <p class="mb-4 fw-medium text-secondary">الـمـسـابـقـة الـدولـيـة</p>
              </div>
              <div class="col-lg-6"><img class="img-fluid" src="{{asset('homeUIElo/assets/img/marketer/marketer.png')}}" alt="" /></div>
            </div>
          </div><!-- end of .container-->
  
        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->
  
  
  
  
        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-md-11 py-8" id="superhero">
  
          <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block background-position-top" style="background-image:url(homeUIElo/assets/img/superhero/oval.png);opacity:.5; background-position: top !important ;">
          </div>
  
          <div class="container text-center">
              <h1 id="headline">الوقت المتبقي لبدء المسابقة الدولية</h1>
              <div id="countdown" class="coont">
                <ul>
                  <li class="coont" style="background-color: #ff9900; color: #fff;"><span id="days"></span>يوم</li>
                  <li class="coont"><span id="hours"></span>ساعة</li>
                  <li class="coont"><span id="minutes"></span>دقيقة</li>
                  <li class="coont"><span id="seconds"></span>ثانية</li>
                </ul>
              </div>
              <!-- <div id="content" class="emoji">
                <span>🥳</span>
                <span>🎉</span>
                <span>🎂</span>
              </div> -->
          </div><!-- end of .container-->
  
        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->
  
  
  
  
        <!-- ============================================-->
        <!-- <section> begin ============================-->
        {{-- <section class="pt-5" id="marketing">
  
          <div class="container text-center">
            <h1 class="fw-bold fs-6 mb-3">معرض الصور</h1><br>
            <!-- <p class="mb-6 text-secondary">Join 40,000+ other marketers and get proven strategies on email marketing</p> -->
            <div class="row">
              <div class="col-md-4 mb-4">
                <div class="card"><img class="card-img-top" src="assets/img/marketing/marketing01.png" alt="" />
                  <div class="card-body ps-0">
                    <!-- <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">Abdullah</a>|<span class="ms-1">03 March 2019</span></p> -->
                    <h3 class="fw-bold"></h3>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-4">
                <div class="card"><img class="card-img-top" src="assets/img/marketing/marketing02.png" alt="" />
                  <div class="card-body ps-0">
                    <h3 class="fw-bold"></h3>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-4">
                <div class="card"><img class="card-img-top" src="assets/img/marketing/marketing03.png" alt="" />
                  <div class="card-body ps-0">
                    <h3 class="fw-bold"></h3>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- end of .container-->
  
        </section> --}}
        <!-- <section> close ============================-->
        <!-- ============================================-->
  
  
  
  
        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="pb-2 pb-lg-5 text-center">
  
          <div class="container">
            <div class="row border-top border-top-secondary pt-7">
              <div class="col-lg-3 col-md-6 mb-4 mb-md-6 mb-lg-0 mb-sm-2 order-1 order-md-1 order-lg-1"><img class="mb-4" src="{{asset('homeUIElo/assets/img/logo.png')}}" width="184" alt="" /></div>
              <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 order-3 order-md-3 order-lg-2">
                <p class="fs-2 mb-lg-4">
                 للاستفسارات أو الاقتراحات الرجاء التواصل معنا</p>

              </div>
              <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 order-3 order-md-3 order-lg-3">
                <ul class="list-unstyled mb-0">
                  <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">التواصل واتساب</a></li>
                </ul>
              </div>
              <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 order-4 order-md-4 order-lg-4">
                <ul class="list-unstyled mb-0">
                  <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">البريد الالكتروني</a></li>
                </ul>
              </div>

            </div>
          </div><!-- end of .container-->
  
        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->
  
  
  
  
        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="text-center py-0">
  
          <div class="container">
            <div class="container border-top py-3">
              <div class="row justify-content-between">
                <!-- <div class="col-12 col-md-auto mb-1 mb-md-0">
                  <p class="mb-0">&copy; جميع الحقوق محفوظة 2023 </p>
                </div> -->
                <div class="col-12">
                  <p class="mb-0">
                    2023 &copy; برمجة وتصميم |  <span class="fas fa-reply mx-1 text-danger"> </span> <a class="text-decoration-none ms-1" href="" target="_blank">أحمد الزهراني</a></p>
                </div>
              </div>
            </div>
          </div><!-- end of .container-->
  
        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->
  
  
      </main>
      <!-- ===============================================-->
      <!--    End of Main Content-->
      <!-- ===============================================-->
  
  
      <div class="modal fade" id="popupVideo" tabindex="-1" aria-labelledby="popupVideo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <iframe class="rounded" style="width:100%;height:500px;" src="https://www.youtube.com/embed/_lhdhL4UDIo" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div>
  
  
      <!-- ===============================================-->
      <!--    JavaScripts-->
      <!-- ===============================================-->
      <script src="{{asset('homeUIElo/vendors/@popperjs/popper.min.js')}}"></script>
      <script src="{{asset('homeUIElo/vendors/bootstrap/bootstrap.min.js')}}"></script>
      <script src="{{asset('homeUIElo/vendors/is/is.min.js')}}"></script>
      <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
      <script src="{{asset('homeUIElo/vendors/fontawesome/all.min.js')}}"></script>
      <script src="{{asset('homeUIElo/assets/js/theme.js')}}"></script>
  
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet">
    
      <script>
        (function () {
    const second = 1000,
          minute = second * 60,
          hour = minute * 60,
          day = hour * 24;
  
    //I'm adding this section so I don't have to keep updating this pen every year :-)
    //remove this if you don't need it
    let today = new Date(),
        dd = String(today.getDate()).padStart(2, "0"),
        mm = String(today.getMonth() + 1).padStart(2, "0"),
        yyyy = today.getFullYear(),
        nextYear = yyyy + 1,
        dayMonth = "05/11/",
        birthday = dayMonth + yyyy;
    
    today = mm + "/" + dd + "/" + yyyy;
    if (today > birthday) {
      birthday = dayMonth + nextYear;
    }
    //end
    
    const countDown = new Date(birthday).getTime(),
        x = setInterval(function() {    
  
          const now = new Date().getTime(),
                distance = countDown - now;
  
          document.getElementById("days").innerText = Math.floor(distance / (day)),
            document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
            document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
            document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);
  
          //do something later when date is reached
          if (distance < 0) {
            document.getElementById("headline").innerText = "It's my birthday!";
            document.getElementById("countdown").style.display = "none";
            document.getElementById("content").style.display = "block";
            clearInterval(x);
          }
          //seconds
        }, 0)
    }());
      </script>
    </body>
  
  </html>
