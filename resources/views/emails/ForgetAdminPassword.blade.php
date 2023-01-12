@component('mail::message')
# <center>{{'إستعادة كلمة السر'}}</center>

## <center>اسم المستخدم</center>
## <center>بريدكم الالكتروني</center>
## <center>{{'كلمة المرور الجديدة'}}</center>
## <center>{{ $data }}</center>

@component('mail::button', ['url' => url('/auth')])
	{{ __('تسجيل الدخول') }}
@endcomponent


## <center>{{ setting()->site_name }}</center>
## <center>اذا كنت لاتزال تواجه أي مشكلة في تسجيل الدخول الرجاء التواصل معنا</center>


@endcomponent
