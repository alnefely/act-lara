@extends('layouts.dashboard.app-admin')
@section('title', 'انشاء مشارك جديد')


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('admin/users')}}">المشاركين</a></li>
	<li class="breadcrumb-item active">@yield('title')</li>
@endsection


@section('content')
    <form action="{{ url()->current() }}" method="post">@csrf
        <div class="row">
            <div class="col-md-3 mb-3">
				<label>اسم المشارك <span class="important">*</span></label>
				<input type="text" class="form-control" required name="name" value="{{ old('name') }}" />
            </div>

            <div class="col-md-3 mb-3">
				<label>جوال المشارك <span class="important">*</span></label>
				<input type="number" class="form-control" required name="owner_phone" value="{{ old('owner_phone') }}" />
            </div>
            
            <div class="col-md-3 mb-3">
				<label>البريد الالكترونى <span class="important">*</span></label>
				<input type="email" class="form-control" required name="email" value="{{ old('email') }}" />
            </div>

            <div class="col-md-3 mb-3">
                <label>كلمة المرور <span class="important">*</span></label>
				<div class="form-group pass_show"> 
					<input type="password" class="form-control" required="required" name="password" /> 
				</div>
			</div>

            <div class="col-md-3 mb-3">
                <label>الفئة <span class="important">*</span></label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 mb-3">
				<label>اسم المدرسة <span class="important">*</span></label>
				<input type="text" class="form-control" required name="school_name" value="{{ old('school_name') }}" />
            </div>

            <div class="col-md-3 mb-3">
				<label>اسم مدير المدرسة <span class="important">*</span></label>
				<input type="text" class="form-control" required name="manger_name" value="{{ old('manger_name') }}" />
            </div>
            
            <div class="col-md-3 mb-3">
				<label>جوال مدير المدرسة <span class="important">*</span></label>
				<input type="number" class="form-control" required name="manger_phone" value="{{ old('manger_phone') }}" />
            </div>

            <div class="col-md-3 mb-3">
				<label>اسم رائد النشاط <span class="important">*</span></label>
				<input type="text" class="form-control" required name="captin_name" value="{{ old('captin_name') }}" />
            </div>

            <div class="col-md-3 mb-3">
				<label>جوال رائد النشاط <span class="important">*</span></label>
				<input type="number" class="form-control" required name="captin_phone" value="{{ old('captin_phone') }}" />
            </div>
            
            <div class="col-md-3 mb-3">
                <label>تعديل المشاركة <span class="important">*</span></label>
                <select name="edit" class="form-control" required>
                    <option value="enable">نعم</option>
                    <option value="disable">لا</option>
                </select>
            </div>

            <div class="col-12 mt-2">
                <button class="btn btn-primary">انشاء البيانات</button>
            </div>
        </div>
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
	</script>
@endsection

@section('style')
@endsection