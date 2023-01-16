@extends('layouts.dashboard.app-admin')
@section('title', 'انشاء محكم جديد')


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('admin/governors')}}">المحكمين</a></li>
	<li class="breadcrumb-item active">@yield('title')</li>
@endsection


@section('content')
    <form action="{{ url()->current() }}" method="post">@csrf
        <div class="row">
            <div class="col-md-4 mb-3">
				<label> إسـم المحكم الثلاثي<span class="important">*</span></label>
				<input type="text" class="form-control" required name="name" value="{{ old('name') }}" />
            </div>
            
            <div class="col-md-4 mb-3">
				<label>إسم المستخدم <span class="important">*</span></label>
				<input type="text" class="form-control" required name="username" value="{{ old('username') }}" />
            </div>
            
            <div class="col-md-4 mb-3">
				<label>الجوال <span class="important">*</span></label>
				<input type="number" class="form-control" required name="phone" value="{{ old('phone') }}" />
            </div>
            
            <div class="col-md-4 mb-3">
				<label> الادارة التابع لها <span class="important">*</span></label>
				<input type="text" class="form-control" required name="manger_name" value="{{ old('manger_name') }}" />
            </div>

            <div class="col-md-3 mb-3">
                <label>الجنس <span class="important">*</span></label>
                <select name="gender" class="form-control" required>
                    <option value="بنين">بنين</option>
                    <option value="بنات">بنات</option>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label>كلمة المرور <span class="important">*</span></label>
				<div class="form-group pass_show"> 
					<input type="password" class="form-control" required="required" name="password" /> 
				</div>
			</div>


            <div class="col-12 mt-2">
                <button class="btn btn-primary">انشاء</button>
            </div>
        </div>
    </form>
@endsection


@section('script')
@endsection

@section('style')
@endsection