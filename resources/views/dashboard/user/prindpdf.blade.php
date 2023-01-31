<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<style>

 .header {
  display: flex;
  text-align: center;
  align-items: center;
  padding: 20px;
  margin: 10px;
  border: solid 2px rgb(225, 205, 169) ;
}

 img {
    max-width: 30%;
    display: inline-block;
}
    .header h3,
    .header p {margin: 0;}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: right;
  padding: 8px;
}
tr:nth-child(even) {background-color: #fbf7ee;}


#footer {
  position: fixed;
  width: 100%;
  bottom:0;
 height: 30px;
 text-align: left;
}

</style>
</head>
<body>

    <div class="header">
        <img src="{{ public_path('logo.png') }}" >
            <div class="text">
                <p>وزارة التعليم</p>
                <p>الادارة العامة للتعليم بمحافظة الطائف</p>
                <p>إدارة النشاط الطلابي</p>
                <p>أولمبياد اللغة الانجليزية 2023</p>
            </div>
          </div>
        {{-- <p>My supercool header</p> --}}

    {{-- <hr> --}}
<h2>بيانات الفريق المشارك</h2>
          <table>
              <tr>
              <th>الفئة</th>
              <th>الادارة التعليمية</th>
              <th>اسم المدرسة</th>
              <th>اسم الفريق</th>
              </tr>
              <tr>
              <td>{{ $user->category->name }} - {{$user->gender}} </td>
              <td>{{ $user->education->name }}</td>
              <td>{{ $user->school_real }}</td>
              <td>{{ $user->school_name }}</td>
              </tr>
         </table>
         {{-- ###################################################### --}}
          <br>
         <h2>نموذج نتيجة التحكيم</h2>
          <table>
              <tr>
              <th>المعيار</th>
              <th>المحكم "1"</th>
              <th>الدرجة</th>
              <th>المحكم "2"</th>
              <th>الدرجة</th>
              <th>المحكم "3"</th>
              <th>الدرجة</th>
              <th>المتوسط</th>
              </tr>
              @php $TotalAV = 0;  @endphp
          @foreach ($evidences as $key => $item)
              <tr>
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
              </tr>
              
          @endforeach
         </table>
         {{-- ###################################################### --}}
<br>

<p>مجموع درجات ونسبة المشارك النهائية بناءاً على حساب المتوسط لكل معيار</p>
          <table>
              <tr>
              <th style="background-color: rgb(225, 205, 169); width: 30%;">مجموع متوسط الدرجات</th>
              <th>{{$TotalAV}}</th>
              <th style="background-color: rgb(225, 205, 169);width: 30%;">النسبة</th>
              @php 
              if ($user->type == 'كبار')
              $perc = ( ($TotalAV + 100) / 1340) * 100;
              else
              $perc = ($TotalAV / 375) * 100;
              @endphp
              <th>{{$perc}} %</th>
              </tr>
         </table>
         {{-- ###################################################### --}}

         <br>
         <br>
         <br>  
         <br>
         <table>
          <tr>
            <th style="width: 33%;">المحكم1:</th>
            <th style="width: 34%;">المحكم2:</th>
            <th style="width: 33%;">المحكم3:</th>
          </tr>
          <tr>
          <td style="width: 33%; height:82px;"><img src="{{public_path('sign.png')}}" /></td>
          <td style="width: 34%; color:rgb(159, 159, 159) ; text-align: center; height:82px;">التوقيع </td>
          <td style="width: 33%; color:rgb(159, 159, 159) ; text-align: center; height:82px;">التوقيع </td>
          </tr>
     </table>

     <div id="footer">
        <p>https://taifelo.taifedu.gov.sa</p>
      </div>
</body>
</html>


