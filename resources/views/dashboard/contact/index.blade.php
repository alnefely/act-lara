@extends('layouts.dashboard.app-admin')
@section('title', 'الفئات')

@section('breadcrumb')
	<li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ url('/dashboard/dataTables/dataTables.bootstrap4.min.css') }}" />
@endsection


@section('content')
    <table class="table table-striped data-table text-md-nowrap" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>اسم المرسل</th>
                <th>ايميل المرسل</th>
                <th>الرسالة</th>
                <th>وقت الارسال</th>

            </tr>
        </thead>
        <tbody>
            
            @php $count = 1; @endphp
            @forelse($contacts as $data)
                <tr>
                    <td>{{ $count++ }}</td>

                    <td>{{ $data->user_chat }}</td>
                    <td>{{ $data->email_chat }}</td>
                    <td>{{ $data->messag_send }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d - m - Y')}}</td>


                </tr>
                @empty
                    لا يوجد رسائل
                @endforelse

        </tbody>
    </table>
@endsection

@section('script')
    <script src="{{ url('/dashboard/dataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('/dashboard/dataTables/dataTables.bootstrap4.min.js') }}"></script>

@endsection