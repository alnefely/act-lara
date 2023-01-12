@extends('layouts.dashboard.app-admin')
@section('title', 'إنشاء مدير جديد')

@section('breadcrumb')
	<li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')

	<form action="{{ url()->current() }}" method="post">@csrf
		<div class="row">
			<div class="col-xl-6">
				
				<label>إسم المشرف <span class="important">*</span></label>
				<input type="text" class="form-control" name="name" required="required" value="{{ old('name') }}" />
				<br />

				<label>البريد الالكترونى <span class="important">*</span></label>
				<input type="email" class="form-control" name="email" required="required" value="{{ old('email') }}" style="text-align: left;" />
				<br />

				<label>كلمة المرور <span class="important">*</span></label>
				<div class="form-group pass_show"> 
					<input type="password" class="form-control" required="required" name="password" /> 
				</div>
				<br />

				<label><i class="fab fa-fw fa-facebook"></i> Facebook</label>
				<input type="text" class="form-control" name="facebook" value="{{ old('facebook') }}" />
				<br />

				<label><i class="fab fa-fw fa-twitter"></i> Twitter</label>
				<input type="text" class="form-control" name="twitter" value="{{ old('twitter') }}" />
				<br />

				<label><i class="fab fa-fw fa-instagram"></i> instagram</label>
				<input type="text" class="form-control" name="instagram" value="{{ old('instagram') }}" />
				<br />

				<label><i class="fab fa-fw fa-linkedin"></i> Linkedin</label>
				<input type="text" class="form-control" name="linkedin" value="{{ old('linkedin') }}" />
				<br />

				<label><i class="fab fa-fw fa-youtube"></i> Youtube</label>
				<input type="text" class="form-control" name="youtube" value="{{ old('youtube') }}" />
				<br />

			</div>

			<div class="col-xl-6">

				<label>مجموعة الصلاحيات  <span class="important">*</span></label>
				<select class="form-control" name="group_id" required="required">
					@foreach($groups as $group)
						<option value="{{ $group->id }}">{{ $group->group_name }}</option>
					@endforeach
				</select>
				<br />

				<label>معلومات عن المشرف</label>
				<textarea class="form-control" rows="5" name="info">{{ str_replace('<br />', '', old('info')) }}</textarea>
				<br />

				<label><i class="fas fa-fw fa-image"></i> صورة المشرف </label>
				<div class="input-group">
					<span class="input-group-btn">
						<a id="admin-logo" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
							<i class="fas fa-image"></i> اختر
						</a>
					</span>
					<input id="thumbnail" readonly="readonly" dir="ltr" class="form-control text-left" type="text" name="img" value="{{ old('img') }}" />
				</div>
				<div id="holder" style="margin-top:15px;max-height:100px;">
					@if(!empty(old('img')))
						<img src="{{ old('img') }}" style="height: 5rem;">
					@endif
				</div>
				<br />

				<button onclick="if(confirm('هل أنت متاكد من إنشاء مدير جديد؟')){return true;}else{return false;}" class="btn btn-success">إنشاء البيانات</button>
				
				
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