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
                <td style="font-size: 13px"><a style="background-color: rgb(243, 238, 228)"> اسم مدرب الفريق</a> {{$user->name}} || {{ $user->owner_phone }} </td>
                <td style="font-size: 13px"><a style="background-color: rgb(243, 238, 228)"> اسم الفريق</a> {{ $user->school_name }}</td>
                <td style="font-size: 13px"><a style="background-color: rgb(243, 238, 228)"> اسم المدرسة</a>  {{ $user->school_real }} || {{ $user->education->name }} </td>
            </tr>      
            <tr>
                <td style="font-size: 13px"><a style="background-color: rgb(243, 238, 228)"> أعضاء الفريق </a> 1- {{ $user->member1 }} | {{ date('Y', strtotime($user->member1_date))}}</td>
                <td style="font-size: 13px"> 2- {{ $user->member2 }} | {{ date('Y', strtotime($user->member2_date))}}</td>
                <td style="font-size: 13px"> 3- {{ $user->member3 }} | {{ date('Y', strtotime($user->member3_date))}}</td>
                <td style="font-size: 13px"> 4- {{ $user->member4 }} | @if($user->member4_date != NULL)  {{ date('Y', strtotime($user->member4_date))}} @else -- @endif</td>
                <td style="font-size: 13px"> 5- {{ $user->member5 }} | @if($user->member5_date != NULL)  {{ date('Y', strtotime($user->member5_date))}} @else -- @endif</td>
                </tr>
        </thead>
    </table>
<br>


    <div style="overflow: auto">
        <table class="table table-warning">
            <thead class="thead-dark">
                <tr>
                    <th style="font-size: 15px">#</th>
                    <th style="font-size: 15px">المعيار</th>
                    <th style="font-size: 15px">المحكم"1"</th>
                    <th style="font-size: 15px">الدرجة</th>
                    <th style="font-size: 15px">المحكم"2"</th>
                    <th style="font-size: 15px">الدرجة</th>
                    <th style="font-size: 15px">المحكم"3"</th>
                    <th style="font-size: 15px">الدرجة</th>
                    <th style="font-size: 15px">المتوسط</th>
                    <th style="font-size: 15px">الرابط</th>
                    <th style="font-size: 15px">نموذج التحكيم</th>
                </tr>
            </thead>

            <tbody>

                @php
                    $TotalAV = 0;
                @endphp
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
                                if( isset($item->governor1->id) ):
                                    $deg1 = \App\Models\Degree::where(['governor_id'=>$item->governor1->id,'reg_id'=>$item->id])->sum('degree');
                                else:
                                    $deg1 = 0;
                                endif;
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
                                if( isset($item->governor2->id) ):
                                    $deg2 = \App\Models\Degree::where(['governor_id'=>$item->governor2->id,'reg_id'=>$item->id])->sum('degree');
                                else:
                                    $deg2 = 0;
                                endif;
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
                                if( isset($item->governor3->id) ):
                                    $deg3 = \App\Models\Degree::where(['governor_id'=>$item->governor3->id,'reg_id'=>$item->id])->sum('degree');
                                else:
                                    $deg3 = 0;
                                endif;
                                
                            @endphp
                            {{ number_format($deg3) }}
                        </td>
                        <td>
                            @php
                                $average = ($deg1+$deg2+$deg3)/3;
                                $TotalAV +=  ceil($average);
                            @endphp
                            {{ ceil($average) }}
                        </td>
                        <td>
                            <strong><a target="_blank" href="{{ $item->url }}">الرابط</a></strong>
                        </td>
                        <td>
                            <strong><a target="_blank" href="/admin/user/reg/{{ $item->id }}">نموذج التحكيم</a></strong>
                        </td>

                    </tr>
                    
                @endforeach

                <tr>
                    <th style="font-size: 15px"></th>
                    <th style="font-size: 15px"></th>
                    <th style="font-size: 15px"></th>
                    <th style="font-size: 15px"></th>
                    <th style="font-size: 15px"></th>
                    <th style="font-size: 15px"></th>
                    <th style="font-size: 15px"></th>
                    <th style="font-size: 15px"></th>

                    <th style="font-size: 15px">{{ ceil($TotalAV) }}</th>
                    @php 
                    if ($user->type == 'كبار')
                    $perc = ( ($TotalAV + 100) / 1340) * 100;
                    else
                    $perc = ($TotalAV / 375) * 100;
                    @endphp
                    <th style="font-size: 15px">{{$perc}} %</th>
                    {{-- <th style="font-size: 15px"></th> --}}

                    <th style="font-size: 15px"><strong><a style="background-color: rgb(204, 5, 5); color:#fff"
                        href="{{ url('/admin/prindpdf/user',$user->id)}}" target="_blank"><i class="fa fa-print"> PDF</i></a></strong></th>
                </tr>

            </tbody>
        </table>
    </div>

@endsection