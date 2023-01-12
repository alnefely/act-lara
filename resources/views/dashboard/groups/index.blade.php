@extends('layouts.dashboard.app-admin')
@section('title', 'مجموعات الصلاحيات')


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
                <th>ID</th>
                <th>إســم المجموعة</th>
                <th>عدد المدراء</th>
                <th>تاريخ الإنشاء</th>
                <th>منذ</th>
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
                ajax: "{{ url('/admin/groups/json') }}",
                scrollY:550,
                scrollX:true,
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'group_name', name: 'group_name'},
                    {data: 'admins', name: 'admins', "orderable": false},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'ago', name: 'ago', "orderable": false},
                ],
                columnDefs: [
                    {
                        targets: 1,
                        render: function (data, type, row, meta) {
                            if ( row.main == 'main' ) {
                                return '<i class="fas fa-check-circle" style="color:#080"></i> '+data;
                            }else {
                                return data;
                            }
                        }
                    },
                    {
                        targets: 3,
                        render: function (data, type, row, meta) {
                            return data.substr(0, 10);
                        }
                    },
                    
                    {
                        targets: 5,
                        render: function (data, type, row, meta) {
                            if ( row.main == 'main' ) {
                                return '';
                            }else {
                                var edit = '<a href="{{ url('/admin/edit/group') }}/'+row.id+'" class="btn btn-sm btn-success"><i class="far fa-fw fa-edit"></i></a>';
                                var del = '<form style="display:inline-block" action="{{url('/admin/destroy/group')}}" method="post">@csrf<button onclick="if(confirm(`هل أنت متاكد من حذف المجموعة؟`)){return true;}else{return false;}" class="btn btn-sm btn-danger"><i class="far fa-fw fa-trash-alt"></i></button><input type="hidden" name="id" value="'+row.id+'"></form>';
                                return edit +' '+ del;
                            }
                            
                        }
                    },

                ]
            });


        });
    </script>
    <script>
        // $(document).ready(function(){
        //     $('.multi-del').on('click', function() {
                
        //         if( confirm("{{ __('global.alert_delete') }}") ){
        //             if( ids.length == 0 ) {
        //                 Swal.fire({
        //                     position: 'top-center',
        //                     type: 'error',
        //                     html: "<span style='font-size:1.5em'>{{ __('global.select_empty') }}</span>",
        //                     showConfirmButton: true,
        //                     confirmButtonText: 'Ok'
        //                 });
        //             }else {
        //                 $.ajax({
        //                     url:'{{ url("/admin/messages/multi-delete") }}',
        //                     type:'POST',
        //                     data:{
        //                         _token: "{{ csrf_token() }}",
        //                         ids: ids,
        //                     }
        //                 }).done(function(data) {
        //                     if(data.status == 'done') {
        //                         Swal.fire({
        //                             position: 'top-center',
        //                             type: 'success',
        //                             html: "<span style='font-size:1.5em'>{{ __('global.confirm_delete') }}</span>",
        //                             showConfirmButton: true,
        //                             confirmButtonText: 'Ok'
        //                         });
        //                         setTimeout(window.location.reload(true));
        //                     };
        //                 });
        //             }
        //         }

        //     });
        // });
    </script>
@endsection