@extends('layouts.dashboard.app-admin')
@section('title', 'إنشاء مجموعة جديدة')


@section('breadcrumb')
	<li class="breadcrumb-item active">@yield('title')</li>
@endsection


@section('content')

    <form action="{{ url()->current() }}" method="post">@csrf
        
        <div class="row">
            <div class="col-md-6">
				<label>إســـم المجموعة <span class="important">*</span></label>
				<input type="text" class="form-control" name="group_name" value="{{ old('group_name') }}" />
				<br />
            </div>
        </div>

        <div class="row">
			<div class="col-md-6">
                <input type="checkbox" id="checkall" class="ml-1" />
                <label for="checkall">تحديد الكل</label>
            </div>
        </div>

                
        <div class="row">
            <div class="col-12">

                <div class="table-responsive">
                    <table class="table table-bordered mg-b-0 text-md-nowrap table-hover">
                        <thead>
                            <tr class="thead-dark">
                                <th><i class="fas fa-fw fa-copy"></i> إســـم الصفحة</th>
                                <th><i class="fas fa-fw fa-eye"></i> إظهار</th>
                                <th><i class="fas fa-fw fa-plus"></i> إنشاء</th>
                                <th><i class="fas fa-fw fa-edit"></i> تعديل</th>
                                <th><i class="fas fa-fw fa-trash-alt"></i>  حذف</th>
                            </tr>
                        </thead>
                        <tbody>

                            

                            <tr>
                                <td scope="row">المدراء</td>
                                <td><input type="checkbox" name="admin_show" value="enable" @if( old('admin_show') ) checked="checked" @endif /></td>
                                <td><input type="checkbox" name="admin_create" value="enable" @if( old('admin_create') ) checked="checked" @endif /></td>
                                <td><input type="checkbox" name="admin_edit" value="enable" @if( old('admin_edit') ) checked="checked" @endif /></td>
                                <td><input type="checkbox" name="admin_delete" value="enable" @if( old('admin_delete') ) checked="checked" @endif /></td>
                            </tr>

                            <tr>
                                <td scope="row">مجموعات الصلاحيات</td>
                                <td><input type="checkbox" name="group_show" value="enable" @if( old('group_show') ) checked="checked" @endif /></td>
                                <td><input type="checkbox" name="group_create" value="enable" @if( old('group_create') ) checked="checked" @endif /></td>
                                <td><input type="checkbox" name="group_edit" value="enable" @if( old('group_edit') ) checked="checked" @endif /></td>
                                <td><input type="checkbox" name="group_delete" value="enable" @if( old('group_delete') ) checked="checked" @endif /></td>
                            </tr>

                            <tr>
                                <td scope="row">الاعدادات</td>
                                <td><input type="checkbox" name="setting_show" value="enable" @if( old('setting_show') ) checked="checked" @endif /></td>
                                <td><i class="fa-fw far fa-star"></i></td>
                                <td><input type="checkbox" name="setting_edit" value="enable" @if( old('setting_edit') ) checked="checked" @endif /></td>
                                <td><i class="fa-fw far fa-star"></i></td>
                            </tr>

                           

                            <tr>
                                <td scope="row">بيانات المشرف</td>
                                <td><i class="fa-fw far fa-star"></td>
                                <td><i class="fa-fw far fa-star"></i></td>
                                <td><input type="checkbox" name="profile_edit" value="enable" @if( old('profile_edit') ) checked="checked" @endif /></td>
                                <td><i class="fa-fw far fa-star"></i></td>
                            </tr>

                            <tr>
                                <td scope="row">مدير الملفات</td>
                                <td><input type="checkbox" name="filemanager_show" value="enable" @if( old('filemanager_show') ) checked="checked" @endif /></td>
                                <td><i class="fa-fw far fa-star"></td>
                                <td><i class="fa-fw far fa-star"></i></td>
                                <td><i class="fa-fw far fa-star"></i></td>
                            </tr>

                        </tbody>

                        <tfoot>
                            <tr class="thead-dark">
                                <th><i class="fas fa-fw fa-copy"></i> إســـم الصفحة</th>
                                <th><i class="fas fa-fw fa-eye"></i> إظهار</th>
                                <th><i class="fas fa-fw fa-plus"></i> إنشاء</th>
                                <th><i class="fas fa-fw fa-edit"></i> تعديل</th>
                                <th><i class="fas fa-fw fa-trash-alt"></i>  حذف</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div> {{-- End Col-12 --}}
        </div>{{-- End Row --}}

        <div class="row">
            <div class="col-12 mt-2">
                <button class="btn btn-info">إنشاء المجموعة</button>
            </div>
        </div>

    </form>

@endsection


@section('script')
    <script>        
        $('#checkall').on('change', function() {

            if( $(this).is(":checked") )
            {
                $('input[type=checkbox]').prop('checked', true);
            }
            else {
                $('input[type=checkbox]').prop('checked', false);
            }            
        });
    </script>
@endsection

@section('style')
    <style>
        input[type=checkbox], input[type=radio] {
            transform: scale(1.3);
        }
    </style>
@endsection