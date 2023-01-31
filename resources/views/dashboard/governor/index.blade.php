@extends('layouts.dashboard.app-admin')
@section('title', 'المحكمين')

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{url('admin/create/governor')}}">انشاء محكم جديد</a></li>
	<li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('style')
<link rel="stylesheet" href="{{ url('/dashboard/datatable/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ url('/dashboard/datatable/buttons.dataTables.min.css') }}" />
@endsection


@section('content')
    <table class="table table-warning data-table text-md-nowrap" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>اسم المحكم</th>
                <th>اسم المستخدم</th>
                <th>الجوال</th>
                <th> الادارة</th>
                <th>الجنس</th>
                <th>تاريخ الإنشاء</th>
                <th>خيارات</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
@endsection

@section('script')
<script src="{{ url('/dashboard/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('/dashboard/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('/dashboard/datatable/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('/dashboard/datatable/jszip.min.js') }}"></script>
<script src="{{ url('/dashboard/datatable/buttons.html5.min.js') }}"></script>
<script src="{{ url('/dashboard/datatable/buttons.print.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function(){

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            order: [[ 1, 'desc' ]],
            dom: 'lBfrtip',
            buttons: {
                buttons: [
                    { extend: 'copyHtml5', text: 'نسخ', className: 'btn btn-sm'},
                    { extend: 'excelHtml5', text: 'تصدير', className: 'btn btn-sm'},
                    { extend: 'print', text: 'طباعة', className: 'btn btn-sm'}
                ]
            },
                @if( getLang() == 'ar' )
                    language: {
                        "url": "{{ url('/dashboard/dataTables/Arabic.json') }}"
                    },
                @endif
                ajax: "{{ url('/admin/governors/json') }}",
                scrollY:550,
                scrollX:true,
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'username', name: 'username'},
                    {data: 'phone', name: 'phone'},
                    {data: 'manger_name', name: 'manger_name'},
                    {data: 'gender', name: 'gender'},
                    {data: 'created_at', name: 'created_at'},
                ],
                columnDefs: [
                    {
                        targets: 6,
                        render: function (data, type, row, meta) {
                            return data.substr(0, 10);
                        }
                    },
                    {
                        targets: 7,
                        render: function (data, type, row, meta) {
                            var edit = '<a href="{{ url('/admin/edit/governor') }}/'+row.id+'" class="btn btn-sm btn-success"><i class="far fa-fw fa-edit"></i></a>';
                            var del = '<form style="display:inline-block" action="{{url('/admin/destroy/governor')}}" method="post">@csrf<button onclick="if(confirm(`هل أنت متاكد من حذف البيانات؟`)){return true;}else{return false;}" class="btn btn-sm btn-danger"><i class="far fa-fw fa-trash-alt"></i></button><input type="hidden" name="id" value="'+row.id+'"></form>';
                            return edit +' '+ del;
                        }
                    },

                ]
            });


        });
    </script>
@endsection