@extends('layouts.dashboard.app-admin')
@section('title', 'تعديل: '.$row->name)


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('admin/governors')}}">المحكمين</a></li>
	<li class="breadcrumb-item active">@yield('title')</li>
@endsection


@section('content')
    <form action="{{ url()->current() }}" method="post">@csrf
        <div class="row">
            <div class="col-md-4 mb-3">
				<label> إسم المحكم الثلاثي<span class="important">*</span></label>
				<input type="text" class="form-control" required name="name" value="{{ $row->name }}" />
            </div>
            
            <div class="col-md-4 mb-3">
				<label>إسم المستخدم <span class="important">*</span></label>
				<input type="text" class="form-control" required name="username" value="{{ $row->username }}" />
            </div>
            
            <div class="col-md-4 mb-3">
				<label>الجوال <span class="important">*</span></label>
				<input type="number" class="form-control" required name="phone" value="{{ $row->phone }}" />
            </div>
            
            <div class="col-md-4 mb-3">
				<label>الادارة التابع لها <span class="important">*</span></label>
				<input type="text" class="form-control" required name="manger_name" value="{{ $row->manger_name }}" />
            </div>

            <div class="col-md-4 mb-3">
                <label>كلمة المرور <span class="important">*</span></label>
				<div class="form-group pass_show"> 
					<input type="password" class="form-control" name="password" /> 
				</div>
			</div>

            <div class="col-12 mt-2">
                <input type="hidden" name="id" value="{{ $row->id }}" />
                <button class="btn btn-primary">تحديث</button>
            </div>
        </div>
    </form>
@endsection


@section('script')
@endsection

@section('style')
@endsection