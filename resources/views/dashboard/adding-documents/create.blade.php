@extends('layouts.dashboard.app-admin')
@section('title', 'اسناد محكم')

@section('breadcrumb')
	<li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('style')
<link rel="stylesheet" href="/dashboard/plugins/select2/css/select2.min.css" />
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #966702;
        border: 1px solid #35a17a;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: #f44336;
        opacity: 1;
        left: 0;
    top: -12px;
    }
</style>
@endsection


@section('content')
    <form action="{{ url()->current() }}" method="post">@csrf
        <div class="row">
            <div class="col-md-4 mb-4">
				<label>الفئات <span class="important">*</span></label>
				<select class="form-control category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-4">
				<label>الفريق المشارك <span class="important">*</span></label>
				<select class="form-control users" name="user_id" required></select>
            </div>
            <div class="col-md-4 mb-4">
				<label>المحكم <span class="important">*</span></label>
				<select name="governor_id[]" dir="rtl" class="form-control select2 governors" multiple required>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="data" style="overflow: auto">
                    <table class="table table-warning">
                        <thead class="thead-dark">
                            <tr>
                                <th style="font-size: 15px">#</th>
                                <th style="font-size: 15px">المعيار</th>
                                <th style="font-size: 15px">الرابط</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <div class="loding"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-2">
                <button class="btn btn-success">انشاء البيانات</button>
            </div>
        </div>
    </form>
@endsection


@section('script')
<script src="/dashboard/plugins/select2/js/select2.min.js"></script>
<script>

    $(document).ready(function() {
		$('.select2').select2({
			placeholder: 'يجب اختيار 3 محكمين',
            maximumSelectionLength: 3,
            language: "ar"
		});
	});

    $(window).on('load', function() {
        $('.category_id').trigger('input');
    });

    $('.users').on('input', function() {
        var user_id = $(this).val();
        $.ajax({
            url: "{{ url('admin/get/standards/ajax') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                user_id: user_id
            },
            beforeSend: function() {
                $('.loding').html('<div class="text-center"><i class="fas fa-spinner fa-3x fa-spin"></i></div>');
                $('tbody').html('');
            },
        }).done(function(res) {
            $.each(res.regs, function(name, val) {
                var data = `
                    <tr>
                        <td style="font-size: 15px">
                            <input type="checkbox" name="standard[]" value="`+val.id+`">
                        </td>
                        <td style="font-size: 15px">`+val.standard.name+`</td>
                        <td style="font-size: 15px"><a target="_blank" href="`+val.url+`">الرابط</a></td>
                    </tr>
                `;
                $('tbody').append(data);
            });

                $.ajax({
                    url: "{{ url('admin/get/governors/ajax') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        user_id: user_id
                    },
                    beforeSend: function() {
                        $('.governors').html('');
                    },
                }).done(function(res) {
                    $.each(res.data, function(key, value) {
                        $('.governors').append('<option value=' + value.id + '>' + value.name + '</option>')
                    });
                });
            

            if( res.regs.length == 0) {
                $('.loding').html('<div class="text-center">لا توجد اي بيانات</div>');
            }else {
                $('.loding').html('');
            }
        });
    });

    $('.category_id').on('input', function() {
        var cat_id = $(this).val();
        $.ajax({
            url: "{{ url('admin/get/users/ajax') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                cat_id: cat_id
            },
            beforeSend: function() {
                $('.users').html('');
            },
        }).done(function(res) {
            $.each(res.users, function(key, value) {
                $('.users').append('<option value=' + value.id + '>' + value.school_name + ' - '+value.gender+'</option>')
            });
            $('.users').trigger('input');
        });
    });
</script>
@endsection

@section('style')
<style>
input[type=checkbox] {
    transform: scale(1.5);
}
</style>
@endsection