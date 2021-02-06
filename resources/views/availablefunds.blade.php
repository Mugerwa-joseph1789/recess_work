@extends('layouts.app')
@section('content')
<table border="1">
<tr>
<td>id</td>
<td>user_id</td>
<td>Donor</td>
<td>month</td>
<td>Amount</td>
<td>created_at</td>
<td>updated_at</td>
</tr>
@foreach($funds as $fund)
<tr>
<td>{{$fund['id']}}</td>
<td>{{$fund['user_id']}}</td>
<td>{{$fund['Donor']}}</td>
<td>{{$fund['month']}}</td>
<td>{{$fund['Amount']}}</td>
<td>{{$fund['created_at']}}</td>
<td>{{$fund['updated_at']}}</td>
</tr>
@endforeach
</table>

@endsection