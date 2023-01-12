<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  dir="rtl">

    <head>
    
      <!-- Basic Page Needs
      ================================================== -->
      <meta charset="utf-8">
      <title>جائزة التميز</title>
    
      <!-- Mobile Specific Metas
      ================================================== -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="Creative Portfolio Template">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
      <meta name="author" content="Themefisher">
      <meta name="generator" content="Themefisher Kross Template v1.0">
      
      <!-- theme meta -->
      <meta name="theme-name" content="kross" />
      
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
    
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;700&display=swap" rel="stylesheet">
    
    </head>
    <body>
      
    
    <header class="navigation fixed-top">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand font-tertiary h3" href="#"><img src="{{asset('homeUi/images/logo.png')}}" alt="Myself"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
          aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" style=" background-color: indigo; "></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navigation">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="">الرئيسية</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" target="_blank" href="{{ asset('homeUi/pdf/taif-award.pdf') }}">تحميل ملف الجائزة</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="{{ url('auth/') }}">تسجيل الدخول</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/user/register') }}">تسجيل مستخدم جديد</a>
            </li>
          </ul>
        </div>
        <a class="navbar-brand font-tertiary h3" href="#"><img src="{{asset('homeUi/images/r2.png')}}" alt="Myself"></a>
    
      </nav>
    </header>
    
    <!-- hero area -->
    <section class="hero-area bg-primary" id="parallax">
      <div class="container" >
        <div class="row">
          <div class="col-lg-12 mx-auto">
            <h1 class="text-white font-tertiary " style="text-align: center;  text-shadow: 0 0 10px #5a3367 ;">
              جــــائــــزة إدارة
              <br>
              <!-- <br> -->
               النشاط الطلابي 
               <br> للأداء المـتـمـيز
               <br> <a style="font-size: 30px;">الادارة العامة للتعليم بمحافظـة الطائـف </a>  
              </h1>
          </div>
        </div>
      </div>
    
      <div class="layer" id="l2">
        <img src="{{ asset('homeUi/images/illustrations/dots-cyan.png') }}" alt="bg-shape">
      </div>
      {{-- <div class="layer" id="l3">
        <img src="{{ asset('homeUi/images/illustrations/leaf-orange.png') }}" alt="bg-shape">
      </div> --}}
      <div class="layer" id="l4">
        <img src="{{ asset('homeUi/images/illustrations/dots-orange.png') }}" alt="bg-shape">
      </div>
      <div class="layer" id="l5">
        <img src="{{ asset('homeUi/images/illustrations/leaf-yellow.png') }}" alt="bg-shape">
      </div>
      <div class="layer" id="l6">
        <img src="{{ asset('homeUi/images/illustrations/leaf-cyan.png') }}" alt="bg-shape">
      </div>
      <div class="layer" id="l7">
        <img src="{{ asset('homeUi/images/illustrations/dots-group-orange.png') }}" alt="bg-shape">
      </div>
      {{-- <div class="layer" id="l8">
        <img src="{{ asset('homeUi/images/illustrations/leaf-orange.png') }}" alt="bg-shape">
      </div> --}}
      <div class="layer" id="l9">
        <img src="{{ asset('homeUi/images/illustrations/leaf-cyan-2-.png') }}" alt="bg-shape">
      </div>
      <div class="layer-bg w-100">
        <img class="img-fluid w-100" src="{{ asset('homeUi/images/illustrations/leaf-bgff.png') }}" alt="bg-shape">
      </div>
      <!-- social icon -->
    
      <!-- /social icon -->
    </section>
    <!-- /hero area -->
    
    <!-- about -->
    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <p class="font-secondary paragraph-lg text-dark  text-center">
              الحمد لله رب العالمين والصلاة والسلام على سيد الأنبياء والمرسلين، أما بعد : <br>
    انطلاقا من أهمية النشاط اللاصفي لأبنائنا، حيث يسهم في تعزيز قدرات الطلبة وتنمية مهاراتهم في مختلف المجالات: الشخصية والاجتماعية والعلمية والثقافية وغيرها، فقد أطلقت الإدارة العامة للتعليم بمحافظة الطائف ممثلة في إدارة النشاط الطلابي جائزة التميز لإدارة النشاط الطلابي رغبة منها في تشجيع المعلمين ورواد النشاط على المشاركة الفاعلة، واستنهاض أفكارهم الإبداعية في تنفيذ النشاطات المتميزة لبرامج النشاط الطلابي .
    وتعد هذه الجائزة بمثابة الخطوة الأولى في إيجاد بيئة محفزة للأنشطة الطلابية المتميزة.
    ونحن إذ نقدر الجهود التي تبذلها مكاتب التعليم والمدارس بقياداتها المختلفة في تفعيل برامج النشاط، فإننا نأمل استمرار الاهتمام والمشاركة الفاعلة في الجائزة، بما يعود بالنفع على أبنائنا الطلاب ووطننا الغالي.
            </p>
            <a class="btn btn-transparent text-left">إدارة النشاط الطلابي بتعليم الطائف</a><br>

          </div>
        </div>
      </div>
    </section>
    <!-- /about -->
    
    
    <!-- services -->
    <section class="section">
      <div class="container">
        <div class="row">
    
          <div class="col-md-4 mb-4 mb-md-0">
            <div class="card hover-shadow shadow">
              <div class="card-body text-center px-4 py-5">
                <i class="ti-align-justify icon icon-light mb-5 d-inline-block"></i>
                <h4 class="mb-4">الرؤية</h4>
                <p>نشـــــاط طـــلابي مميــــز منــــافــس محلــيـــا وعالميا </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4 mb-md-0">
            <div class="card active-bg-primary hover-shadow shadow">
              <div class="card-body text-center px-4 py-5">
                <i class="ti-cup icon mb-5 d-inline-block"></i>
                <h4 class="mb-4">أهداف الجائزة</h4>
                <p>1. تشجيع المعلمين والطلاب على المشاركة الفاعلة في برامج النشاط الطلابي
                  <br>
                  2. استنهاض الأفكار الإبداعية في اقتراح وتنفيذ الأنشطة
                  <br>
                  3. خلق بيئة تنافسية إبداعية محفزة للمستفيدين والقائمين على برامج النشاط
                  <br>
                  4. الاهتمام بميول الطلاب وإشباع رغباتهم واستثمار قدراتهم وتحفيزهم</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4 mb-md-0">
            <div class="card hover-shadow shadow">
              <div class="card-body text-center px-4 py-5">
                <i class="ti-align-justify icon icon-light mb-5 d-inline-block"></i>
                <h4 class="mb-4">الرسالة</h4>
                <p>تقديم أنشطة غير صفية إبداعية تنمي شخصية الـطــلاب
                 وتصــقــل مواهــبــهــــم وتستثمر طاقاتهم بما يخدم دينهــم ووطـــنــهــم</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /services -->
    
    <!-- experience -->
    <section class="section">
      <div class="container">
        <div class="row justify-content-around">
          <div class="col-lg-12 text-center">
            <h2 class="section-title">فئات الجائزة</h2>
          </div>
          <div class="col-lg-3 col-md-4 text-center">
            <img src="{{asset('homeUi/images/experience/icon-1.png')}}" alt="icon">
            <p class="mb-0">الفئة الأولى</p>
            <h4>المدرسة المتميزة </h4>
            <h6 class="text-light">مدارس التعليم العام الحكومية والأهلية والعالمية المتميزة في النشاط الطلابي</h6>
          </div>
          <div class="col-lg-3 col-md-4 text-center">
            <img src="{{asset('homeUi/images/experience/icon-2.png')}}" alt="icon">
            <p class="mb-0">الفئة الثانية</p>
            <h4>المشروع المتميز </h4>
            <h6 class="text-light">مشاريع النشاط الطلابي اللاصفي الإبداعية على مستوى المدرسة</h6>
          </div>
          <div class="col-lg-3 col-md-4 text-center">
            <img src="{{asset('homeUi/images/experience/icon-3.png')}}" alt="icon">
            <p class="mb-0">الفئة الثالثة</p>
            <h4>الطالب المتميز</h4>
            <h6 class="text-light">تشمل الطلاب المشاركين في مسابقات النشاط الطلابي المركزية الفردية  والجماعية</h6>
          </div>
        </div>
      </div>
    </section>
    <!-- ./experience -->
    
    <!-- education -->
    <section class="section position-relative">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-title">الجدول الزمني</h2>
          </div>
          <div class="col-lg-6 col-md-6 mb-80 text-right">
            <div class="d-flex">
              <div class="mr-lg-5 mr-3">
                <i class="ti-timer icon icon-light icon-bg bg-white shadow rounded-circle d-block"></i>
              </div>
              <div>
                <p class="text-dark mb-1">الفصل الدراسي الثاني</p>
                <h4 class="text-purp">الاسبوع الأول</h4>
                <p class="mb-0 text-light">تدشين الجائزة من قبل المدير العام للتعليم بمحافظة الطائف  </p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 mb-80 text-right">
            <div class="d-flex">
              <div class="mr-lg-5 mr-3">
                <i class="ti-timer icon icon-light icon-bg bg-white shadow rounded-circle d-block"></i>
              </div>
              <div>
                <p class="text-dark mb-1">الفصل الدراسي الثاني</p>
                <h4 class="text-purp">الاسبوع الثاني</h4>
                <p class="mb-0 text-light">اللقاء التعريفي بالجائزة والورش التدريبية</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 mb-80 text-right">
            <div class="d-flex">
              <div class="mr-lg-5 mr-3">
                <i class="ti-timer icon icon-light icon-bg bg-white shadow rounded-circle d-block"></i>
              </div>
              <div>
                <p class="text-dark mb-1">الفصل الدراسي الثاني</p>
                <h4 class="text-purp">الاسبوع الثالث</h4>
                <p class="mb-0 text-light">تعبئة نموذج الترشح الإلكتروني</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 mb-80 text-right">
            <div class="d-flex">
              <div class="mr-lg-5 mr-3">
                <i class="ti-timer icon icon-light icon-bg bg-white shadow rounded-circle d-block"></i>
              </div>
              <div>
                <p class="text-dark mb-1">الفصل الدراسي الثالث</p>
                <h4 class="text-purp">الاسبوع الرابع والخامس</h4>
                <p class="mb-0 text-light">رفع الملفات</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 mb-80 text-right">
            <div class="d-flex">
              <div class="mr-lg-5 mr-3">
                <i class="ti-timer icon icon-light icon-bg bg-white shadow rounded-circle d-block"></i>
              </div>
              <div>
                <p class="text-dark mb-1">الفصل الدراسي الثالث</p>
                <h4 class="text-purp">الاسبوع الثامن والعاشر</h4>
                <p class="mb-0 text-light">التحكيم والزيارات الميدانية</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 mb-80 text-right">
            <div class="d-flex">
              <div class="mr-lg-5 mr-3">
                <i class="ti-crown icon icon-light icon-bg bg-white shadow rounded-circle d-block"></i>
              </div>
              <div>
                <p class="text-dark mb-1">الفصل الدراسي الثالث</p>
                <h4 class="text-purp">الاسبوع الثاني عشر</h4>
                <p class="mb-0 text-light">الحفل الختامي وتكريم المتميزين   </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- bg image -->
      <img class="img-fluid edu-bg-image w-100" src="{{asset('homeUi/images/backgrounds/education-bg.png')}}" alt="bg-image">
    </section>
    <!-- /education -->
    
    <!-- testimonial -->
    <section class="section bg-primary position-relative testimonial-bg-shapes">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <h2 class="section-title text-dark mb-5">الفائزين والجوائز</h2>
          </div>
          <div class="col-lg-10 mx-auto testimonial-slider">
            <!-- slider-item -->
    
            <div class="text-center testimonial-content">
            <i class="ti-cup icon mb-5 d-inline-block icon-light"></i>
            <i class="ti-gift icon mb-5 d-inline-block icon-light"></i>
    
              <h4 class="text-purp">المدارس المتميزة في النشاط الطلابي</h4>
              <p class="text-dark mb-4">
                المستوى الذهبي للمدارس الحاصلة على درجة 95 فما فوق . (درع التمـــــيز  - شهادة استحقاق - جائزة تقديرية )
                <br>
                المستوى الفضي للمدارس الحاصلة على درجة من 90 إلى 94 درجة . (درع المستوى الفضي  - شهادة استحقاق)
                <br>
                المستوى البرونزي للمدارس الحاصلة على درجة من 85 إلى 89 درجة .  (درع المستوى البرونزي )            
              </p>
              <!--  -->
              <h4 class="text-purp">المشروع المتميز في النشاط الطلابي</h4>
              <p class="text-dark mb-4">
                المستوى الذهبي للمشروع المتميز  الحاصل على درجة 95 فما فوق . (درع التمـــــيز  - شهادة استحقاق - جائزة تقديرية )
                <br>
                المستوى الفضي للمشروع المتميز  الحاصل على درجة من 90 إلى 94 درجة . (درع المستوى الفضي  - شهادة استحقاق)
                <br>
                المستوى البرونزي للمشروع المتميز  الحاصل على درجة من 85 إلى 89 درجة .  (درع المستوى البرونزي )
                <br>          
              </p>
              <!--  -->
              <h4 class="text-purp">الطالب المتميز في النشاط الطلابي </h4>
              <p class="text-dark mb-4">
                كل طالب في جميع المراحل الدراسية يحصل على مركز على مستوى المملكة العربية السعودية أو العالم . 
                (درع التمـــــيز  - شهادة استحقاق - جائزة تقديرية )
                          
              </p>
            </div>
    
          </div>
        </div>
      </div>
      <!-- bg shapes -->
      <img src="{{ asset('homeUi/images/backgrounds/map.png') }}" alt="map" class="img-fluid bg-map">
      <img src="{{ asset('homeUi/images/illustrations/dots-group-v.png') }}" alt="bg-shape" class="img-fluid bg-shape-1">
      <img src="{{ asset('homeUi/images/illustrations/leaf-orange.png') }}" alt="bg-shape" class="img-fluid bg-shape-2">
      <img src="{{ asset('homeUi/images/illustrations/dots-group-sm.png') }}" alt="bg-shape" class="img-fluid bg-shape-3">
      {{-- <img src="{{ asset('homeUi/images/illustrations/leaf-pink-round.png') }}" alt="bg-shape" class="img-fluid bg-shape-4"> --}}
      <img src="{{ asset('homeUi/images/illustrations/leaf-cyan.png') }}" alt="bg-shape" class="img-fluid bg-shape-5">
    </section>
    <!-- /testimonial -->
    
    <!-- client logo slider -->
<br>
    <!-- /client logo slider -->
    
    <!-- team -->
    <section class="section bg-cover" data-background="{{ asset('homeUi/images/backgrounds/team-bg.png') }}">
      <div class="container">
        <div class="row">
          <div class="col-12 text-right">
            <h2 class="section-title text-purp">الشروط والضوابط</h2>
          </div>
    
          <div class="col-lg-10 mx-auto text-right">
            <p class="font-secondary paragraph-slgs text-dark">
              1.	تتاح المشاركة في الجائزة لجميع الفئات دون قيد أو شرط .
    <br>
    2.	أن تكون جميع الوثائق والشواهد حديثة لا تتجاوز العام الحالي 1443 – 1444 هـ ، إلا ما تم استثناؤه في المعايير والمؤشرات.
    <br>
    3.	أن تكون جميع الوثائق والشواهد موثقة من جهة رسمية معتمدة داخل إدارة التعليم أو خارجها.
    <br>
    4.	أن يتطابق محتوى جميع الوثائق والشواهد المقدمة للجائزة مع الواقع الفعلي، ويحدد ذلك من خلال الزيارة الميدانية.
    <br>
    5.	يحق للجنة المحكمة للجائزة اتخاذ كافة الإجراءات اللازمة في حالة عدم تطابق الشواهد والوثائق مع الواقع الفعلي.
    <br>
    6.	يرفع ملف الجائزة إلكترونيا، مع التزام المترشح بجميع النماذج والقوالب وآلية الترشح الموضحة بالدليل الإجرائي  للجائزة.
    
        </p>
          </div>
        </div>
      </div>
    </section>
    <!-- /team -->
    
    <!-- portfolio -->
    <section class="section">
      <div class="container">
    
        <div class="row shuffle-wrapper">
    
    
          <div class="col-lg-4 col-6 mb-4 shuffle-item">
            <div class="position-relative rounded hover-wrapper">
              <img src="{{ asset('homeUi/images/portfolio/item-6---.png') }}" alt="portfolio-image" class="img-fluid rounded w-100 d-block">
            </div>
          </div>
          <div class="col-lg-4 col-6 mb-4 shuffle-item">
            <div class="position-relative rounded hover-wrapper">
              <img src="{{ asset('homeUi/images/portfolio/item-6-.png') }}" alt="portfolio-image" class="img-fluid rounded w-100 d-block">
              <div class="hover-overlay">
                <div class="hover-content">
                  <a class="btn btn-light btn-sm" href="{{ url('/user/register') }}">سجل الآن</a>
                </div>
              </div>
            </div>
          </div>      <div class="col-lg-4 col-6 mb-4 shuffle-item">
            <div class="position-relative rounded hover-wrapper">
              <img src="{{ asset('homeUi/images/portfolio/item-6--.png') }}" alt="portfolio-image" class="img-fluid rounded w-100 d-block">
            </div>
          </div>
          </div>
    
        </div>
      </div>
    </section>
    <!-- /portfolio -->
    
    <!-- contact -->
    <section class="section section-on-footer" data-background="{{ asset('homeUi/images/backgrounds/bg-dots.png') }}">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <h2 class="section-title">تواصل معنا</h2>
          </div>
          <div class="col-lg-8 mx-auto">
            <div class="bg-white rounded text-center p-5 shadow-down">
              <h4 class="mb-80">اكتب استفسارك وسيتم الرد عليك في أقرب وقت</h4>
                <form name="chat_form" class="row chat_form has-validation-callback" id="chat_form" action="{{route('contact.store')}}" method="POST"
                onsubmit="return checkform(this);">
                 {{ csrf_field() }}
                <div class="col-md-6">
                  <input type="text" name="user_chat" placeholder="الاسم كاملاً" class="form-control px-0 mb-4 " required>
                </div>
                <div class="col-md-6">
                  <input type="email" name="email_chat" placeholder="اليريد الالكتروني" class="form-control px-0 mb-4" required>
                </div>
                <div class="col-12">
                  <textarea name="messag_send" class="form-control px-0 mb-4"
                    placeholder="اكتب رسالتك هنا" required></textarea>
                </div>

                <div class="capbox form-control">
                  <div id="CaptchaDiv"></div>
                    <div class="capbox-inner" >
                <input type="hidden" id="txtCaptcha">
                <input type="text" name="CaptchaInput" id="CaptchaInput" size="15"><br>
                    </div>
                </div>
                
                <div class="col-lg-6 col-10 mx-auto" style="margin-top: 20px">
                  <button id="chat_submit" name="chat_submit" type="submit" class="btn btn-primary w-100">ارسال</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /contact -->
    
    <!-- footer -->
    <footer class="bg-prup footer-section">
      <div class="section">
        <div class="container">
          <div class="row text-center">
            <div class="col-md-4">
              <h5 class="text-light">بريد إدارة النشاط الطلابي</h5>
              <p class="text-white paragraph-lg font-secondary">N.b.taif@gmail.com</p>
            </div>
            <div class="col-md-4">
              <h5 class="text-light">رقم الواتساب</h5>
              <p class="text-white paragraph-lg font-secondary"><a style="color: #fff" target="_blank" href="https://wa.me/966541033314">0541033314</a></p>
            </div>
            <div class="col-md-4">
              <h5 class="text-light">العنوان</h5>
              <p class="text-white paragraph-lg font-secondary ">مبنى إدارة النشاط الطلابي - الفيصلية</p>
            </div>
          </div>
        </div>
        <hr>
        <div class="container-fluid pd-t-0-f ht-100p text-center text-light">
        </div>
      </div>
    
    </footer>
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

    <script>
// Captcha
// Captcha Script

function checkform(theform){
            var why = "";

            if(theform.CaptchaInput.value == ""){
            why += "- فضلاً أدخل الارقام.\n";
            }
            if(theform.CaptchaInput.value != ""){
            if(ValidCaptcha(theform.CaptchaInput.value) == false){
            why += "- الارقام المدخلة خاطئة.\n";
            }
          }
            if(why != ""){
            alert(why);
            return false;
            }
            }

            let alphabets = "AaBbCcDdEeFGgHhiJjKkLMmNnOoPpQqRrSsTUuVvWwXxYyZz";
            let romoz = "@#%&!";


            var a = alphabets[Math.floor(Math.random() * alphabets.length)];
            var b = Math.ceil(Math.random() * 9)+ '';
            var c = romoz[Math.floor(Math.random() * romoz.length)];
            var d = Math.ceil(Math.random() * 9)+ '';
            var e = alphabets[Math.floor(Math.random() * alphabets.length)];

            var code = a + b + c + d + e;
            document.getElementById("txtCaptcha").value = code;
            document.getElementById("CaptchaDiv").innerHTML = code;

            // Validate input against the generated number
            function ValidCaptcha(){
            var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
            var str2 = removeSpaces(document.getElementById('CaptchaInput').value);
            if (str1 == str2){
            alert("- تم الارسال، سيتم الرد على بريدكم المسجل في اقرب وقت.\n");
            return true;
            }else{
            return false;
            }
            }

            // Remove the spaces from the entered and generated code
            function removeSpaces(string){
            return string.split(' ').join('');
            }
// End captcha

</script>
    
    </body>
    </html>
    


