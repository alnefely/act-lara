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
                <select name="category_id" class="form-control category" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" data-type="{{ $category->type }}">{{ $category->name }} | {{ $category->type }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-3 mb-3">
                <label>المنطقة التعليمية <span class="important">*</span></label>
                <select name="education_id" class="form-control" required>
                    @foreach ($educations as $ed)
                        <option value="{{ $ed->id }}">{{ $ed->name }}</option>
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
                <label>الجنس <span class="important">*</span></label>
                <select name="gender" class="form-control" required>
                    <option value="بنين">بنين</option>
                    <option value="بنات">بنات</option>
                </select>
            </div>
            
            <div class="col-md-3 mb-3">
                <label>تعديل المشاركة <span class="important">*</span></label>
                <select name="edit" class="form-control" required>
                    <option value="enable">نعم</option>
                    <option value="disable">لا</option>
                </select>
            </div>
        </div>

        <h3 class="my-3">أسماء أعضاء الفريق</h3>

        <div class="row">
            <div class="col-md-4 mb-3">
				<label>اسم العضو 1</label>
				<input type="text" class="form-control" name="member1" value="{{ old('member1') }}" />
            </div>
            <div class="col-md-4 mb-3">
				<label>تاريخ ميلاد العضو 1</label>
				<input type="date" class="form-control" name="member1_date" value="{{ old('member1_date') }}" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
				<label>اسم العضو 2</label>
				<input type="text" class="form-control" name="member2" value="{{ old('member2') }}" />
            </div>
            <div class="col-md-4 mb-3">
				<label>تاريخ ميلاد العضو 2</label>
				<input type="date" class="form-control" name="member2_date" value="{{ old('member2_date') }}" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
				<label>اسم العضو 3</label>
				<input type="text" class="form-control" name="member3" value="{{ old('member3') }}" />
            </div>
            <div class="col-md-4 mb-3">
				<label>تاريخ ميلاد العضو 3</label>
				<input type="date" class="form-control" name="member3_date" value="{{ old('member3_date') }}" />
            </div>
        </div>

        <div class="row big">
            <div class="col-md-4 mb-3">
				<label>اسم العضو 4</label>
				<input type="text" class="form-control" name="member4" value="{{ old('member4') }}" />
            </div>
            <div class="col-md-4 mb-3">
				<label>تاريخ ميلاد العضو 4</label>
				<input type="date" class="form-control" name="member4_date" value="{{ old('member4_date') }}" />
            </div>
        </div>

        <div class="row big">
            <div class="col-md-4 mb-3">
				<label>اسم العضو 5</label>
				<input type="text" class="form-control" name="member5" value="{{ old('member5') }}" />
            </div>
            <div class="col-md-4 mb-3">
				<label>تاريخ ميلاد العضو 5</label>
				<input type="date" class="form-control" name="member5_date" value="{{ old('member5_date') }}" />
            </div>
        </div>

        <div class="row">                
            <div class="col-12 mt-2">
                <button class="btn btn-primary">انشاء البيانات</button>
            </div>
        </div>
        
    </form>
@endsection

@section('script')
	<script>

        $('.category').on('input', function() {
            var type = $(this).find(':selected').data('type');
            if(type == 'صغار'){
                $('.big').css('display','none');
            }else {
                $('.big').css('display','flex');
            }
        });

        $(window).on('load', function() {
            $('.category').trigger('input');
        });


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