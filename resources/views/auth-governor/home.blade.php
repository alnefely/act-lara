@extends('auth-governor.app')
@section('title', 'لوحة المحكم')

@section('style')
    <style>
        .save-deg {cursor: pointer;}
    </style>
@endsection

@php
    $user = auth('governor')->user()
@endphp

@section('content')
    
    <h4  class="mb-4 text-danger text-center"><i class="fas fa-minus-circle"></i> <a class="mb-4 text-dark text-center"> عند اضافة الدرجة لا يمكن التعديل عليها، الدرجة للشاهد من 1 - 10</a></h4>


    <div style="overflow: auto">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th style="font-size: 15px">#</th>
                    <th style="font-size: 15px">الفئة</th>
                    <th style="font-size: 15px">المعيار</th>
                    <th style="font-size: 15px">الرابط</th>
                    <th style="font-size: 15px">مجموع الدرجات</th>
                    <th style="font-size: 15px">نموذج التحكيم</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($UserRegs as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->standard->name }}</td>
                        <td>
                            <a target="_blank" href="{{$item->url}}">الرابط</a>
                        </td>
                        <td>
                            @php
                                $degree = \App\Models\Degree::where(['governor_id'=>$governor->id,'reg_id'=>$item->id])->sum('degree');
                            @endphp
                            {{ number_format($degree) }}
                        </td>
                        <td>
                            <button data-standard_id="{{ $item->standard_id }}" data-reg_id="{{ $item->id }}" data-name="{{ $item->standard->name }}" class="btn btn-primary btn-show btn-sm" data-toggle="modal" data-target="#Form">
                                عرض
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


<div class="modal fade" id="Form" data-backdrop="static" tabindex="-1" aria-labelledby="FormLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="FormLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th style="font-size: 15px">#</th>
                        <th style="font-size: 15px">المؤشر</th>
                        <th style="font-size: 15px">الشاهد</th>
                        <th style="font-size: 15px">الدرجة</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div class="loding"></div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary closeX" data-dismiss="modal">الغاء</button>
        </div>
        </div>
    </div>
    </div>

@endsection


@section('script')

<script>

    $('.close,.closeX').on('click', function() {
        location.reload();
    });

    $('.btn-show').on('click', function() {
        var name = $(this).data('name');
        var reg_id = $(this).data('reg_id');
        var standard_id = $(this).data('standard_id');
        $('#FormLabel').html(name);

        $.ajax({
            url: "{{ url('governor/evidences/ajax') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                reg_id: reg_id,
                standard_id: standard_id,
            },
            beforeSend: function() {
                $('.loding').html('<div class="text-center"><i class="fas fa-spinner fa-3x fa-spin"></i></div>');
                $('.modal-body tbody').html('');
            },
        }).done(function(res) {

            $('.modal-body tbody').append(res);
            if(res.trim() == '') {
                $('.loding').html('<div class="text-center">لا توجد اي بيانات</div>');
            }else {
                $('.loding').html('');
            }

            // $.each(res.data, function(name, val) {
            //     var data = `
            //         <tr>
            //             <td style="font-size: 15px">`+(name+1)+`</td>
            //             <td style="font-size: 15px">`+val.indicator.name+`</td>
            //             <td style="font-size: 15px">`+val.name+`</td>
            //             <td style="font-size: 15px">
            //                 <input type="number" class="deg-`+name+`"  />
            //                 <span class="btn btn-sm btn-danger save-deg"
            //                 data-reg_id="`+reg_id+`"
            //                 data-evidence="`+val.id+`"
            //                 data-indicator="`+val.indicator.id+`"
            //                 data-class="deg-`+name+`">حفظ</span>
            //             </td>
            //         </tr>
            //     `;
            //     $('.modal-body tbody').append(data);
            // });

            // if( res.data.length == 0) {
            //     $('.loding').html('<div class="text-center">لا توجد اي بيانات</div>');
            // }else {
            //     $('.loding').html('');
            // }
        });

    });

    $(document).on('click', '.save-deg', function() {

        var inClass = $(this).data('class');
        var degree = $('.'+inClass).val();

        var indicator = $(this).data('indicator');
        var evidence = $(this).data('evidence');
        var reg_id = $(this).data('reg_id');

        if( degree == '' || degree <= 0 ){
            return alert('يجب ان تكون الدرجة اكبر من او تساوي 1');
        }


        if( confirm('هل أنت متاكد حفظ الدرجة؟') ){
            $.ajax({
                url: "{{ url('governor/store/degree') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    degree: degree,
                    indicator: indicator,
                    evidence: evidence,
                    reg_id: reg_id,
                },
            }).done(function(res) {
                if(res.status == 'done'){
                    $('.'+inClass).parent().html(degree);
                }
                if(res.status == 'error'){
                    return alert('تم اضافة الدرجة من قبل');
                }
            });
        }
    });

</script>

@endsection