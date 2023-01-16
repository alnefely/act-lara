@extends('layouts.dashboard.app-admin')
@section('title', 'مشاركات '.$user->name)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{url('admin/users')}}">المشاركين</a></li>
	<li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')

<br>
<div style="overflow: auto">
    <table class="table table-striped ">
        <thead class="thead-dark">
            <tr>
                <td style="font-size: 13px;"><a style="background-color: rgb(243, 238, 228)" >الفئة </a> {{ $user->category->name }} - {{$user->gender}}  </td>
                <td style="font-size: 13px"><a style="background-color: rgb(243, 238, 228)"> اسم مدير الفريق</a> {{$user->name}}  </td>
                <td style="font-size: 13px"><a style="background-color: rgb(243, 238, 228)"> رقم مدير الفريق</a> {{ $user->owner_phone }}  </td>
                <td style="font-size: 13px"><a style="background-color: rgb(243, 238, 228)"> اسم الفريق</a> {{ $user->school_name }}</td>
            </tr>
                <td style="font-size: 13px"><a style="background-color: rgb(243, 238, 228)"> أعضاء الفريق</a> {{ $user->captin_name }}  </td>
            </tr>
        </thead>
    </table>
<br>


    <div style="overflow: auto">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th style="font-size: 15px">#</th>
                    <th style="font-size: 15px">المعيار</th>
                    <th style="font-size: 15px">المحكم 1</th>
                    <th style="font-size: 15px">درجات م 1</th>
                    <th style="font-size: 15px">المحكم 2</th>
                    <th style="font-size: 15px">درجات م 2</th>
                    <th style="font-size: 15px">المحكم 3</th>
                    <th style="font-size: 15px">درجات م 3</th>
                    <th style="font-size: 15px">المتوسط</th>
                    <th style="font-size: 15px">الرابط</th>
                    <th style="font-size: 15px">نموذج التحكيم</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($evidences as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->standard->name }}</td>
                        <td>
                            @if (!empty($item->governor1->name))
                                {{ $item->governor1->name }}
                            @endif
                        </td>
                        <td>
                            @php
                                $deg1 = \App\Models\Degree::where(['governor_id'=>$item->governor1->id,'reg_id'=>$item->id])->sum('degree');
                            @endphp
                            {{ number_format($deg1) }}
                        </td>
                        <td>
                            @if (!empty($item->governor2->name))
                                {{ $item->governor2->name }}
                            @endif
                        </td>
                        <td>
                            @php
                                $deg2 = \App\Models\Degree::where(['governor_id'=>$item->governor2->id,'reg_id'=>$item->id])->sum('degree');
                            @endphp
                            {{ number_format($deg2) }}
                        </td>
                        <td>
                            @if (!empty($item->governor3->name))
                                {{ $item->governor3->name }}
                            @endif
                        </td>
                        <td>
                            @php
                                $deg3 = \App\Models\Degree::where(['governor_id'=>$item->governor3->id,'reg_id'=>$item->id])->sum('degree');
                            @endphp
                            {{ number_format($deg3) }}
                        </td>
                        <td>
                            @php
                                $average = ($deg1+$deg2+$deg3)/3
                            @endphp
                            {{ number_format($average) }}
                        </td>
                        <td>
                            <strong><a target="_blank" href="{{ $item->url }}">الرابط</a></strong>
                        </td>
                        <td>
                            <strong><a target="_blank" href="/admin/user/reg/{{ $item->id }}">نموذج التحكيم</a></strong>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <li class="list-group-item text-center" style="font-size: 15px; background-color:rgb(36, 43, 68); color:white">مجموع الدرجات: <strong>{{ $TotalScores }}</strong></li> --}}


@endsection