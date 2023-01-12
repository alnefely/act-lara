@extends('layouts.dashboard.app-admin')
@section('title', 'الفئات')

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{url('admin/create/category')}}">انشاء فئة جديدة</a></li>
	<li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ url('/dashboard/dataTables/dataTables.bootstrap4.min.css') }}" />
@endsection


@section('content')
    <table class="table table-striped data-table text-md-nowrap" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>الاسم</th>
                <th>تاريخ الإنشاء</th>
                <th>خيارات</th>
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
                ajax: "{{ url('/admin/categories/json') }}",
                scrollY:550,
                scrollX:true,
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'created_at', name: 'created_at'},
                ],
                columnDefs: [
                    {
                        targets: 2,
                        render: function (data, type, row, meta) {
                            return data.substr(0, 10);
                        }
                    },
                    {
                        targets: 3,
                        render: function (data, type, row, meta) {
                            var edit = '<a href="{{ url('/admin/edit/category') }}/'+row.id+'" class="btn btn-sm btn-success"><i class="far fa-fw fa-edit"></i></a>';
                            var del = '<form style="display:inline-block" action="{{url('/admin/destroy/category')}}" method="post">@csrf<button onclick="if(confirm(`هل أنت متاكد من حذف البيانات؟`)){return true;}else{return false;}" class="btn btn-sm btn-danger"><i class="far fa-fw fa-trash-alt"></i></button><input type="hidden" name="id" value="'+row.id+'"></form>';
                            return edit +' '+ del;
                        }
                    },

                ]
            });


        });
    </script>
@endsection