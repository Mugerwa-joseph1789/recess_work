@extends('layouts.app')
@section('content')
<br>
<table border="1" style="background-color: #ffffff; font-size: 23px">
<tr style="color: #0000ff">
<td>id</td>
<td>Hospital_Name</td>
<td>Officer_Total</td>
<td>Created_at</td>
<td>Updated_at</td>
</tr>
@foreach($regional_hospitals as $regional_hospital)
<tr>
<td>{{$regional_hospital['id']}}</td>
<td>{{$regional_hospital['hospital_name']}}</td>
<td>{{$regional_hospitalal_hospital['officer_total']}}</td>
<td>{{$regional_hospital['created_at']}}</td>
<td>{{$regional_hospital['updated_at']}}</td>
</tr>
@endforeach
</table>

@endsection