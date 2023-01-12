@extends('layouts.dashboard.app-admin')
@section('title', 'المدراء')

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
                <th>id</th>
                <th>صورة المدير</th>
                <th>اسم المدير</th>
                <th>البريد</th>
                <th>مجموعة الصلاحيات</th>
                <th>تاريخ الانشاء</th>
                <th>خيارات</th>
            </tr>
        </thead>
        <tbody>
        </tbody>

    </table>

@endsection

@section('script')
    <script src="{{ url('/dashboard/dataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('/dashboard/dataTables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        $(document).ready(function(){

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                order: [[ 1, 'desc' ]],
                language: {
                    "url": "{{ url('/dashboard/dataTables/Arabic.json') }}"
                },
                ajax: "{{ url('/admin/all/json') }}",
                scrollY:550,
                scrollX:true,
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'img', name: 'img', "orderable": false},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'group', name: 'group'},
                    {data: 'created_at', name: 'created_at'},
                ],
                columnDefs: [
                    {
                        targets: 1,
                        render: function (data, type, row, meta) {
                            if ( data == null ) {
                                return '<img src="/dashboard/img/profile.png" width="50" height="50" />';
                            }else {
                                return '<img style="border-radius:50%" src="'+data+'" width="50" height="50" alt="'+data+'" />';
                            }
                        }   
                    },
                    {
                        targets: 5,
                        render: function (data, type, row, meta) {
                            return data.substr(0, 10);
                        }
                    },
                    {
                        targets: 6,
                        render: function (data, type, row, meta) {
                            var edit = '<a href="{{ url('/admin/edit/admin') }}/'+row.id+'" class="btn mb-1 btn-sm btn-info"><i class="fa-fw fas fa-pen-alt"></i></a>';
                        	var del = '<form style="display:inline-block" action="{{url('/admin/destroy/admin')}}" method="post">@csrf<button onclick="if(confirm(`هل أنت متاكد من الحذف`)){return true;}else{return false;}" class="btn btn-sm mb-1 btn-danger"><i class="far fa-fw fa-trash-alt"></i></button><input type="hidden" name="id" value="'+row.id+'"></form>';
                        	if( row.main == 'normal' )
                            {
                                return edit+' '+ del;
                            }else {
                                return '';
                            }
                        }
                    },
                    
                ]
            });


        });
    </script>
@endsection