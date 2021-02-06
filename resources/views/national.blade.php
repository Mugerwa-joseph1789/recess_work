@extends('layouts.app')
@section('content')
<br>
<table border="1" style="background-color: #ffffff; font-size: 23px">
<tr  style="color: #0000ff">
<td>id</td>
<td>Hospital_Name</td>
<td>Officer_Total</td>
<td>Created_at</td>
<td>Updated_at</td>
</tr>
@foreach($national_hospitals as $national_hospital)
<tr>
<td>{{$national_hospital['id']}}</td>
<td>{{$national_hospital['hospital_name']}}</td>
<td>{{$national_hospitalal_hospital['officer_total']}}</td>
<td>{{$national_hospital['created_at']}}</td>
<td>{{$national_hospital['updated_at']}}</td>
</tr>
@endforeach
</table>

@endsection