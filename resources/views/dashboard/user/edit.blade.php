@extends('layouts.dashboard.app-admin')
@section('title', 'تعديل: '.$row->name)


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{url('admin/users')}}">المشاركين</a></li>
	<li class="breadcrumb-item active">@yield('title')</li>
@endsection


@section('content')
    <form action="{{ url()->current() }}" method="post">@csrf
        <div class="row">
            {{-- <div class="col-md-3 mb-3">
				<label>اسم المشارك <span class="important">*</span></label>
				<input type="text" class="form-control" required name="name" value="{{ $row->name }}" />
            </div>

            <div class="col-md-3 mb-3">
				<label>جوال المشارك <span class="important">*</span></label>
				<input type="number" class="form-control" required name="owner_phone" value="{{ $row->owner_phone }}" />
            </div>
            
            <div class="col-md-3 mb-3">
				<label>البريد الالكترونى <span class="important">*</span></label>
				<input type="email" class="form-control" required name="email" value="{{ $row->email }}" />
            </div>

            <div class="col-md-3 mb-3">
                <label>كلمة المرور</label>
				<div class="form-group pass_show"> 
					<input type="password" class="form-control" name="password" /> 
				</div>
			</div>

            <div class="col-md-3 mb-3">
                <label>الفئة <span class="important">*</span></label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option @if($row->category_id==$category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div> --}}

            <div class="col-md-3 mb-3">
				<label>اسم الفريق <span class="important">*</span></label>
				<input type="text" class="form-control"  name="school_name" value="{{ $row->school_name }}" disabled/>
            </div>
            
            <div class="col-md-3 mb-3">
                <label>امكانية رفع الروابط <span class="important">*</span></label>
                <select name="edit" class="form-control" >
                    <option @if($row->edit=='enable') selected @endif value="enable">نعم</option>
                    <option @if($row->edit=='disable') selected @endif value="disable">لا</option>
                </select>
            </div>

            <div class="col-12 mt-2">
                <input type="hidden" name="id" value="{{ $row->id }}" />
                <button class="btn btn-primary">تحديث</button>
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