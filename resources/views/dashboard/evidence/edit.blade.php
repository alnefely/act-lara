@extends('layouts.dashboard.app-admin')
@section('title', 'تعديل: '.$row->name)


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('admin/evidences')}}">الشواهد</a></li>
	<li class="breadcrumb-item active">@yield('title')</li>
@endsection


@section('content')
    <form action="{{ url()->current() }}" method="post">@csrf
        <div class="row">
            <div class="col-md-4">
				<label>إســـم الشاهد <span class="important">*</span></label>
				<input type="text" class="form-control" required name="name" value="{{ $row->name }}" />
				<br />

                <label>المؤشر <span class="important">*</span></label>
                <select name="indicator_id" class="form-control" required>
                    @foreach ($indicators as $indicator)
                        <option @if($row->indicator_id==$indicator->id) selected @endif value="{{ $indicator->id }}">{{ $indicator->name }}</option>
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