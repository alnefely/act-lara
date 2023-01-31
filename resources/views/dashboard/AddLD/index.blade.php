@extends('layouts.dashboard.app-admin')
@section('title', 'التاريخ والرابط')

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{url('admin/create/AddLD')}}">اضافة تاريخ ورابط</a></li>
	<li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ url('/dashboard/dataTables/dataTables.bootstrap4.min.css') }}" />
@endsection


@section('content')
    <table class="table table-warning data-table text-md-nowrap" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>الفريق</th>
                <th>تاريخ التحكيم</th>
                <th>الرابط</th>
                <th>تاريخ الإنشاء</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
@endsection

@section('script')
    <script src="{{ url('/dashboard/dataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('/dashboard/dataTables/dataTables.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                order: [[ 1, 'desc' ]],
                @if( getLang() == 'ar' )
                    language: {
                        "url": "{{ url('/dashboard/dataTables/Arabic.json') }}"
                    },
                @endif
                ajax: "{{ url('/admin/AddLD/json') }}",
                scrollY:550,
                scrollX:true,
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'school_name', name: 'school_name'},
                    {data: 'j_date', name: 'j_date'},
                    {data: 'u_link', name: 'u_link'},
                    {data: 'created_at', name: 'created_at'},
                ],
                columnDefs: [
                    {
                        targets: 4,
                        render: function (data, type, row, meta) {
                            return data.substr(0, 10);
                        }
                    },

                ]
            });


        });
    </script>
@endsection