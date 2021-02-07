@extends('layouts.app')
@section('content')
<div style="background-image:url({{asset('/images/covid.png')}});height:100vh">
<br><br>
 <h2 style="color:white; text-align: center">
        <i> RECORDS</i>
    </h2>
    <br>
    <P style="color: #ffffff; text-align: center">
        <button onclick="window.location='general'"><h2>General</h2></button>
        <button onclick="window.location='regional'"><h2>Regional</h2></button>
        <button onclick="window.location='national'"><h2>National</h2></button>
    </P>
   
    @endsection