@extends('layouts.app')
@section('content')
<html>
<head>
<!--<link href="{{URL::asset('css/home.css') }}" rel="stylesheet"> --> 
</head>
<body>
<div style="background-image:url({{asset('/images/covid.png')}});height:100vh">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <p class="tab" style="color: #ffffff">OfficersByGeneralHospital</p>
        </div>
        @if (count($officers_general))
        <table class="table table-striped table-dark ">
            <thead>
              <tr>
                <th scope="col">OfficerName</th>
                <th scope="col">OfficerHospital</th>
                <th scope="col">TotalPatients</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($officers_general as $officer)
                <tr>
                    <th scope="row">{{ $officer->officer_name }}</th>
                    <td>{{ $officer->hospital_name }}</td>
                    <td>{{  $officer->total_patients_number }}</td>
                  </tr>
                @endforeach  
            </tbody>
          </table>
        @else
        <div class="mt-5">
            <h2 style="color: #ffffff">There are no officers in general hospitals yet</h2>
        </div>
        @endif

        <div class="col-md-12 mt-3">
            <p class="tab-money" style="color: #ffffff">OfficersByRegionalHospital</p>
        </div>
        @if (count($officers_referal))
        <table class="table table-striped table-dark ">
            <thead>
              <tr>
                <th scope="col">OfficerName</th>
                <th scope="col">OfficerHospital</th>
                <th scope="col">TotalPatients</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($officers_referal as $officer)
                <tr>
                    <th scope="row">{{ $officer->officer_name }}</th>
                    <td>{{ $officer->hospital_name }}</td>
                    <td>{{  $officer->total_patients_number }}</td>
                  </tr>
                @endforeach  
            </tbody>
          </table>
        @else
        <div class="mt-5">
            <h2 style="color: #ffffff">There are no officers in  hospitals yet</h2>
        </div>
        @endif
        <div class="col-md-12 mt-3">
            <p class="tab" style="color: #ffffff">OfficersByReferalHospital</p>
        </div>
        @if (count($officers_national))
        <table class="table table-striped table-dark ">
            <thead>
              <tr>
                <th scope="col">OfficerName</th>
                <th scope="col">OfficerHospital</th>
                <th scope="col">TotalPatients</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($officers_national as $officer)
                <tr>
                    <th scope="row">{{ $officer->officer_name }}</th>
                    <td>{{ $officer->hospital_name }}</td>
                    <td>{{  $officer->total_patients_number }}</td>
                  </tr>
                @endforeach  
            </tbody>
          </table>
        @else
        <div class="mt-5">
            <h2 style="color: #ffffff">There are no officers in national hospitals yet</h2>
        </div>
        @endif

        <div class="col-md-12 mt-3">
            <p class="tab-red" style="color: #ffffff">PendingOfficerList</p>
        </div>

        @if (count($officers_pending))
        <table class="table table-striped table-dark ">
            <thead>
              <tr>
                <th scope="col">OfficerName</th>
                <th scope="col">OfficerHospital</th>
                <th scope="col">Promoted</th>
                <th scope="col">Award</th>
                <th scope="col">Pending</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($officers_pending as $officer)
                <tr>
                    <th scope="row">{{ $officer->officer_name }}</th>
                    <td>{{ $officer->hospital_name }}</td>
                    <td>{{ $officer->upgrade }}</td>
                    <td><small>shs</small>{{  $officer->award }}</td>
                    <td>{{ $officer->pending }}</td>
                  </tr>
                @endforeach  
            </tbody>
          </table>
        @else
        <div class="mt-5">
            <h2 style="color: #ffffff">There is no pending list of officers yet</h2>
        </div>
        @endif
       
    </div>
</div>
</div>
</body>
</html>
@endsection
