@extends('auth-user.app')

@php
    $row = auth()->user();
@endphp

@section('title', 'تعديل: '.$row->name)


@section('content')
    <form action="{{ url()->current() }}" method="post">@csrf
        <div class="row">
            <div class="col-md-3 mb-3">
				<label>اسم المشارك <span class="important">*</span></label>
				<input type="text" class="form-control" disabled name="name" value="{{ $row->name }}" />
            </div>

            <div class="col-md-3 mb-3">
				<label>جوال المشارك <span class="important">*</span></label>
				<input type="number" class="form-control" dir="ltr" required name="owner_phone" value="{{ $row->owner_phone }}" />
            </div>
            
            <div class="col-md-3 mb-3">
				<label>البريد الالكترونى <span class="important">*</span></label>
				<input type="email" class="form-control" dir="ltr" required name="email" value="{{ $row->email }}" />
            </div>

            <div class="col-md-3 mb-3">
                <label>كلمة المرور</label>
				<div class="form-group pass_show"> 
					<input type="password" class="form-control" name="password" /> 
				</div>
			</div>


            <div class="col-md-3 mb-3">
				<label>اسم المدرسة</label>
				<input type="text" class="form-control" disabled name="school_name" value="{{ $row->school_name }}" />
            </div>

            <div class="col-md-3 mb-3">
				<label>اسم مدير المدرسة</label>
				<input type="text" class="form-control" disabled name="manger_name" value="{{ $row->manger_name }}" />
            </div>
            
            <div class="col-md-3 mb-3">
				<label>جوال مدير المدرسة</label>
				<input type="number" class="form-control" disabled name="manger_phone" value="{{ $row->manger_phone }}" />
            </div>

            <div class="col-md-3 mb-3">
				<label>اسم رائد النشاط</label>
				<input type="text" class="form-control" disabled name="captin_name" value="{{ $row->captin_name }}" />
            </div>

            <div class="col-md-3 mb-3">
				<label>جوال رائد النشاط</label>
				<input type="number" class="form-control" disabled name="captin_phone" value="{{ $row->captin_phone }}" />
            </div>
            
            <div class="col-md-3 mb-3">
                <label>حالة تعديل المشاركة</label>
                <select name="edit" class="form-control" disabled>
                    <option @if($row->edit=='enable') selected @endif value="enable">نعم</option>
                    <option @if($row->edit=='disable') selected @endif value="disable">لا</option>
                </select>
            </div>


            <div class="col-md-3 mb-3">
				<label>الفئة التابع لها</label>
				<input type="text" class="form-control" disabled value="{{ $row->category->name }}" />
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