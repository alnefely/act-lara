@extends('layouts.dashboard.app-admin')
@section('title', 'الاعدادات')

@section('breadcrumb')
	<li class="breadcrumb-item active">@yield('title')</li>
@endsection


@section('content')

	<br />

	<h5>اخر تحديث للبيانات: {{ $sc->updated_at->diffForHumans() }}</h5>
	<br />

	<form action="{{ url()->current() }}" method="post"> @csrf
		<div class="row">
			<div class="col-xl-6">

				<input type="hidden" name="id" value="{{ $sc->id }}" />
									
				<label><i class="fas fa-fw fa-pen-alt"></i> إسم الموقع <span class="important">*</span></label>
				<input type="text" class="form-control" name="site_name" value="{{ $sc->site_name }}" />
				<br />

				<label>
					<i class="fas fa-fw fa-keyboard"></i> وصف الموقع لمحرك البحث <span class="important">*</span><span class="charNum"></span>
				</label>
				<textarea class="form-control" rows="5" id="count-len" maxlength="160" name="site_description">{{ $sc->site_description }}</textarea>
				<br />

				<label><i class="fas fa-fw fa-mobile-alt"></i> رقم الجوال</label>
				<input type="tel" class="form-control" name="phone" value="{{ $sc->phone }}"  />
				<br />


				<label><i class="fas fa-fw fa-envelope"></i> بريد الموقع <span class="important">*</span></label>
				<input type="email" class="form-control" name="email" value="{{ $sc->email }}"  />
				<br />

				<label><i class="fab fa-fw fa-facebook"></i> Facebook</label>
				<input type="text" class="form-control" name="facebook" value="{{ $sc->facebook }}" />
				<br />

				<label><i class="fab fa-fw fa-twitter"></i> Twitter</label>
				<input type="text" class="form-control" name="twitter" value="{{ $sc->twitter }}" />
				<br />

				<label><i class="fab fa-fw fa-instagram"></i> instagram</label>
				<input type="text" class="form-control" name="instagram" value="{{ $sc->instagram }}" />
				<br />

				<label><i class="fab fa-fw fa-linkedin"></i> Linkedin</label>
				<input type="text" class="form-control" name="linkedin" value="{{ $sc->linkedin }}" />
				<br />

				<label><i class="fab fa-fw fa-youtube"></i> Youtube</label>
				<input type="text" class="form-control" name="youtube" value="{{ $sc->youtube }}" />
				<br />

				<label><i class="fab fa-fw fa-whatsapp"></i> Whatsapp</label>
				<input type="text" class="form-control" name="whatsapp" value="{{ $sc->whatsapp }}" placeholder="https://wa.me/+201021464469" />
				<br />			

			</div>

			<div class="col-xl-6">

				<label><i class="fas fa-fw fa-map-marker-alt"></i> العنوان</label>
				<textarea class="form-control" rows="3" id="address" maxlength="160" name="address">{{ $sc->address }}</textarea>
				<br />

				<label><i class="fas fa-fw fa-image"></i> شعار الموقع <span class="important">*</span></label>
				<div class="input-group">
					<span class="input-group-btn">
						<a id="site_logo" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
							<i class="fas fa-image"></i> اختر
						</a>
					</span>
					<input id="thumbnail" readonly="readonly" dir="ltr" class="form-control" type="text" name="site_logo" value="{{ $sc->site_logo }}" />
			 	</div>
				<div id="holder" style="margin-top:15px;max-height:100px;">
					<img src="{{ $sc->site_logo }}" style="height: 5rem;">
				</div>
				<br />

				<label><i class="fas fa-fw fa-image"></i> ايكون الموقع <span class="important">*</span></label>
				<div class="input-group">
					<span class="input-group-btn">
						<a id="site_icon" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary text-white">
							<i class="fas fa-image"></i> اختر
						</a>
					</span>
					<input id="thumbnail2" readonly="readonly" dir="ltr" class="form-control" type="text" name="site_icon"  value="{{ $sc->site_icon }}" />
			 	</div>
				<div id="holder2" style="margin-top:15px;max-height:100px;">
					<img src="{{ $sc->site_icon }}" style="height: 5rem;">
				</div>
				<br />

				<label><i class="fas fa-fw fa-code"></i> ضافة أكواد لرأس الصفحة داخل وسم head { تحذير يدعم HTML - CSS - JS }</label>
				<textarea class="form-control" rows="7" name="head_code">{!! $sc->head_code !!}</textarea>
				<br />

				<label><i class="fas fa-fw fa-code"></i>  إضافة أكواد لذيل الصفحة داخل وسم footer { تحذير يدعم HTML - CSS - JS }</label>
				<textarea class="form-control" rows="7" name="footer_code">{!! $sc->footer_code !!}</textarea>
				<br />

				<button class="btn btn-info" onclick="if (confirm('هل أنت متاكد من تحديث البيانات')) {return true;}else{return false;}">تحديث البيانات</button>

			</div>
		</div> {{-- End Row Div --}}
	</form>

@endsection


@section('script')
<script>
	$('#site_logo').filemanager('image');
	$('#site_icon').filemanager('image');
</script>
@endsection