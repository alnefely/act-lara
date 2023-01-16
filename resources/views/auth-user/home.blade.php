@extends('auth-user.app')
@section('title', 'لوحة الفريق المشارك')

@section('style')

@endsection

@php
    $user = auth()->user()
@endphp

@section('content')
    <br>
    
    <h5 class="mb-4"> <i class="fas fa-calendar"></i>الرجاء وضع كل معيار في مجلد ورابط مختلف في google drive لتسهل عملية مراجعتها من المحكمين</h5>
    <h4 class="mb-4"><i class="fas fa-star"></i> فئة الفريق المشارك :  <a style="color: rebeccapurple">{{ $user->category->name }}</a></h4>

    
    <div style="overflow: auto">
        @php $user = App\Models\User::find(Auth::user()->id); @endphp
        @if ($user->status == 1)
        <table class="table table-warning">
            <thead class="thead-dark">
                <tr>
                    <th style="font-size: 15px">#</th>
                    <th style="font-size: 15px">المعيار</th>
                    <th style="font-size: 15px">الرابط</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($standards as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td style="max-width: 300px">
                            @if ($user->edit=='enable')
                                <form action="{{ url()->current() }}" method="post" enctype="multipart/form-data">@csrf

                                    <input type="hidden" name="standard_id" value="{{ $item->id }}">
                                    @php
                                        $check = \App\Models\UserReg::where(['user_id'=>$user->id,'standard_id'=>$item->id]);
                                        $data = $check->first();
                                    @endphp

                                    @if ( $check->count() > 0 )
                                        <input type="text" class="form-control mb-2" dir="ltr" name="url" value="{{ $data->url }}" />
                                        <button class="btn btn-success btn-sm">تحديث الرابط</button>
                                    @else
                                    <input type="text" class="form-control mb-2" dir="ltr" name="url" />
                                    <button class="btn btn-primary btn-sm">حفظ الرابط</button>
                                    @endif
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
    <h5 class="mb-4 text-center text-danger"> يتم مراجعة بيانات الحساب وسيتم تفعيله خلال 24 ساعة من التسجيل .. شكراً لك</h5>
    @endif

    </div>

@endsection