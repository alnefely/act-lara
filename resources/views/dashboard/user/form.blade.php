@extends('layouts.dashboard.app-admin')
@section('title', $UserReg->standard->name)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{url('admin/users')}}">المشاركين</a></li>
	<li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')

<br>
<div style="overflow: auto">
    
    <div style="overflow: auto">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th style="font-size: 15px">#</th>
                    <th style="font-size: 15px">المحكم</th>
                    <th style="font-size: 15px">المؤشر</th>
                    <th style="font-size: 15px">الشاهد</th>
                    <th style="font-size: 15px">الدرجة</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($degrees as $key => $item)
                    <tr>
                        <th style="font-size: 15px">#</th>
                        <th style="font-size: 15px">{{ $item->governor->name }}</th>
                        <th style="font-size: 15px">{{ $item->indicator->name }}</th>
                        <th style="font-size: 15px">{{ $item->evidence->name }}</th>
                        <th style="font-size: 15px">{{ $item->degree }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <li class="list-group-item text-center" style="font-size: 15px; background-color:rgb(36, 43, 68); color:white">مجموع الدرجات: <strong>{{ number_format($degrees->sum('degree')) }}</strong></li>


@endsection