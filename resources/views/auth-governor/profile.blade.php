@extends('auth-governor.app')

@php
    $row = auth('governor')->user();
@endphp

@section('title', 'تعديل: '.$row->name)

@section('content')
    <form action="{{ url()->current() }}" method="post">@csrf
        <div class="row">
            <div class="col-md-4 mb-3">
				<label>إسـم المحكم <span class="important">*</span></label>
				<input type="text" class="form-control" disabled name="name" value="{{ $row->name }}" />
            </div>
            
            <div class="col-md-4 mb-3">
				<label>إسـم المستخدم</label>
				<input type="text" class="form-control" disabled name="username" value="{{ $row->username }}" />
            </div>
            
            <div class="col-md-4 mb-3">
				<label>الجوال <span class="important">*</span></label>
				<input type="number" class="form-control" required name="phone" value="{{ $row->phone }}" />
            </div>
            
            <div class="col-md-4 mb-3">
				<label>اسم الادارة <span class="important">*</span></label>
				<input type="text" class="form-control" disabled name="manger_name" value="{{ $row->manger_name }}" />
            </div>

            <div class="col-md-4 mb-3">
                <label>كلمة المرور <span class="important">*</span></label>
				<div class="form-group pass_show"> 
					<input type="password" class="form-control" name="password" /> 
				</div>
			</div>

            <div class="col-12 mt-2">
                <button class="btn btn-primary">تحديث البيانات</button>
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