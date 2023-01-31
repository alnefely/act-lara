@extends('layouts.dashboard.app-admin')
@section('title', 'تعديل: '.$row->name)


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('admin/addld')}}">تاريخ التحكيم والرابط</a></li>
	<li class="breadcrumb-item active">@yield('title')</li>
@endsection


@section('content')
    <form action="{{ url()->current() }}" method="post">@csrf
        <div class="row">
            <div class="col-md-4">
				<label>تاريخ التحكيم<span class="important">*</span></label>
				<input type="text" class="form-control" required name="j_date" value="{{ $row->j_date }}" />
				<br />
				<label>رابط الزوم<span class="important">*</span></label>
				<input type="text" class="form-control" required name="u_link" value="{{ $row->u_link }}" />
				<br />
                <label>المؤشر <span class="important">*</span></label>
                <select name="id" class="form-control" required>
                    @foreach ($users as $user)
                        <option @if($row->user==$user->id) selected @endif value="{{ $user->id }}">{{ $user->school_name }}</option>
                    @endforeach
                </select>
                <br />

            </div>
            <div class="col-12 mt-2">
                <input type="hidden" name="id" value="{{ $row->id }}" />
                <button class="btn btn-primary">تحديث البيانات</button>
            </div>
        </div>
    </form>
@endsection


@section('script')
@endsection

@section('style')
@endsection