@extends('layouts.dashboard.app-admin')
@section('title', 'الملف التعريفي')

@section('breadcrumb')
	<li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')

	<form action="{{ url()->current() }}" method="post">@csrf
		<div class="row">
			<div class="col-xl-6">
				
				<label>إسم المشرف <span class="important">*</span></label>
				<input type="text" class="form-control" name="name" value="{{ adminInfo('name') }}" />
				<br />

				<label>البريد الالكترونى <span class="important">*</span></label>
				<input type="email" class="form-control" name="email" value="{{ adminInfo('email') }}" style="text-align: left;" />
				<br />

				<label>كلمة المرور</label>
				<div class="form-group pass_show"> 
					<input type="password" class="form-control" name="password" /> 
				</div>
				<br />

				<label><i class="fab fa-fw fa-facebook"></i> Facebook</label>
				<input type="text" class="form-control" name="facebook" value="{{ adminInfo('facebook') }}" />
				<br />

				<label><i class="fab fa-fw fa-twitter"></i> Twitter</label>
				<input type="text" class="form-control" name="twitter" value="{{ adminInfo('twitter') }}" />
				<br />

				<label><i class="fab fa-fw fa-instagram"></i> instagram</label>
				<input type="text" class="form-control" name="instagram" value="{{ adminInfo('instagram') }}" />
				<br />

				<label><i class="fab fa-fw fa-linkedin"></i> Linkedin</label>
				<input type="text" class="form-control" name="linkedin" value="{{ adminInfo('linkedin') }}" />
				<br />

				<label><i class="fab fa-fw fa-youtube"></i> Youtube</label>
				<input type="text" class="form-control" name="youtube" value="{{ adminInfo('youtube') }}" />
				<br />

			</div>

			<div class="col-xl-6">

				<label>معلومات عن المشرف</label>
				<textarea class="form-control" rows="5" name="info">{{ str_replace('<br />', '', adminInfo('info')) }}</textarea>
				<br />

				<label><i class="fas fa-fw fa-image"></i> صورة المشرف </label>
				<div class="input-group">
					<span class="input-group-btn">
						<a id="admin-logo" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
							<i class="fas fa-image"></i> اختر
						</a>
					</span>
					<input id="thumbnail" readonly="readonly" dir="ltr" class="form-control text-left" type="text" name="admin_logo" value="{{ adminInfo('img') }}" />
			 	</div>
				<div id="holder" style="margin-top:15px;max-height:100px;">
					@if(!empty(adminInfo('img')))
						<img src="{{ adminInfo('img') }}" style="height: 5rem;">
					@endif
				</div>
				<br />

				<button onclick="if(confirm('هل أنت متاكد من تحديث البيانات؟')){return true;}else{return false;}" class="btn btn-success">تحديث البيانات</button>
				
				
			</div>
		</div>{{-- End Row --}}
	</form>

@endsection

@section('script')

	
	<script>

		$(document).ready(function(){
			$('.pass_show').append('<span class="ptxt">إظهار</span>');  
		});
		$(document).on('click','.pass_show .ptxt', function(){ 
			$(this).text($(this).text() == "إظهار" ? "إخفاء" : "إظهار"); 
			$(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 
		});
		$('#admin-logo').filemanager('image');
	</script>
@endsection