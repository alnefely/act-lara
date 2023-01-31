@extends('layouts.dashboard.app-admin')
@section('title', 'الفرق المشاركة')

@section('breadcrumb')
	{{-- <li class="breadcrumb-item"><a href="{{url('admin/create/user')}}">انشاء مشارك جديد</a></li> --}}
	<li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('style')

    <link rel="stylesheet" href="{{ url('/dashboard/datatable/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ url('/dashboard/datatable/buttons.dataTables.min.css') }}" />
@endsection
    <style>

    </style>

@section('content')
    <table class="table table-warning data-table text-md-nowrap" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>المنطقة التعليمية</th>
                {{-- <th>رقم الجوال</th> --}}
                <th>اسم الفرق</th>
                <th>فئة المشاركة</th>
                <th>الجنس</th>
                <th style="display: none" >الاعضاء</th>
                <th>الدرجة الاجمالية</th>
                <th>تاريخ الإنشاء</th>
                <th>التفاصيل</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
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
                ajax: "{{ url('/admin/users/json') }}",
                scrollY:550,
                scrollX:true,
                columns: [
                    
                    {data: 'id', name: 'id'},
                    {data: 'education.name', name: 'education.name'},
                    {data: 'school_name', name: 'school_name'},
                    {data: 'category.name', name: 'category.name'},
                    {data: 'gender', name: 'gender'},
                    { data: 'member1', name: 'member1', "visible": false},
                    {data: 'degree', name: 'degree'},
                    {data: 'created_at', name: 'created_at'},                    
                ],
                columnDefs: [
                    {
                        targets: 7,
                        render: function (data, type, row, meta) {
                            return data.substr(0, 10);                    
                        }
                    },
                    {
                        targets: 6,
                        render: function (data, type, row, meta) {
                        if( row.category.name === 'فئة الصغار'){
                           var percent = (row.degree /375) *100;
                          }  else {
                        var percent = ((row.degree + 100) /1340) *100;
                        }
                        return  Math.round(percent) + '%';                
                    }
                    },
                    {
                        targets: 5,
                        render: function (data, type, row, meta) {
                            return  row.member1 + ' | ' + row.member2+ ' | ' + row.member3+ ' | ' + row.member4+ ' | ' + row.member5;  
                        }   
                    },
                    {
                        targets: 8,
                        render: function (data, type, row, meta) {
                            var edit = '<a href="{{ url('/admin/edit/user') }}/'+row.id+'" class="btn btn-sm btn-warning"><i class="far fa-fw fa-edit"></i></a>';
                            var show = '<a title="التفاصيل" href="{{ url('/admin/show/user') }}/'+row.id+'" class="btn btn-sm btn-secondary"><i class="far fa-fw fa-eye"></i></a>';
                            var del = '<form style="display:inline-block" action="{{url('/admin/destroy/user')}}" method="post">@csrf<button onclick="if(confirm(`هل أنت متاكد من حذف البيانات؟`)){return true;}else{return false;}" class="btn btn-sm btn-danger"><i class="far fa-fw fa-trash-alt"></i></button><input type="hidden" name="id" value="'+row.id+'"></form>';                            
                            if ( row.status == 0) {
                            var approve = '<a title="الموافقة" href="{{ url('/admin/approve/user') }}/'+row.id+'" class="btn btn-sm btn-success"><i class="far fa-fw fa fa-check"></i></a>';
                            return show+' ' + approve +' ' + del+' ';
                             } else {
                            return show+' '+ del+' ' + edit+ ' ';
                            }
                        }
                    },

                ]
            });


        });
    </script>
@endsection