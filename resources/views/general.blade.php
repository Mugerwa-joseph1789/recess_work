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
@foreach($general_hospitals as $general_hospital)
<tr>
<td>{{$general_hospital['id']}}</td>
<td>{{$general_hospital['hospital_name']}}</td>
<td>{{$general_hospital['officer_total']}}</td>
<td>{{$general_hospital['created_at']}}</td>
<td>{{$general_hospital['updated_at']}}</td>
</tr>
@endforeach
</table>

@endsection