@extends('layouts.dashboard.app-admin')
@section('title', 'اضالة تاريخ ورابط')


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('admin/AddLD')}}">تاريخ التحكيم والرابط</a></li>
	<li class="breadcrumb-item active">@yield('title')</li>
@endsection


@section('content')
    <form action="{{ url()->current() }}" method="post">@csrf
        <div class="row">
            <div class="col-md-4">
				{{-- <label>وقت التحكيم<span class="important">*</span></label>
				<input type="text" class="form-control" required name="j_date" value="{{ old('j_date') }}" />
				<br /> --}}
                <label>رابط الزوم<span class="important">*</span></label>
				<input type="text" class="form-control" required name="u_link" value="{{ old('u_link') }}" />
				<br />

                <label>الفريق <span class="important">*</span></label>
                <select name="id" class="form-control" required>
                    @foreach ($users as $user)
                    @if($user->u_link === null)
                        <option value="{{ $user->id }}">{{ $user->school_name }} || {{ $user->education->name }}</option>
                    @endif
                    @endforeach
                </select>
                <br />

            </div>
            <div class="col-12 mt-2">
                <button class="btn btn-primary">حفظ البيانات</button>
            </div>
        </div>
    </form>
@endsection


@section('script')
@endsection

@section('style')
@endsection