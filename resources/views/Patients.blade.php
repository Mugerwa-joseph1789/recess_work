@extends('layouts.app');


@section('content')
<html>
    
    <head>
    <link href="{{URL::asset('css/patients.css') }}" rel="stylesheet">
    </head>
<body>

<div style="background-image:url({{asset('/images/covid.png')}});height:100vh">
<!--<div class="black">-->
<a href="{{ route('home') }}"><h4 style="color: #ffffff">HOME</h4></a>
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="patients"><h2 style="color:white"> Patients</h2>
            @if ($patients_general->count())
                <div class="col-md-12" style="text-align:right">
                    <p  class="tab-patients">TotalPatients    {{ $patients_total }}</p>
                </div>
                <div class="col-md-12">
                    <p class="tab">ByGeneralHospital</p>
                </div>
                <table class="table table-striped table-dark ">
                    <thead>
                      <tr>
                        <th scope="col">PatientID</th>
                        <th scope="col">PatientName</th>
                        <th scope="col">Gender</th>
                        <th scope="col">DOI</th>
                        <th scope="col">Status</th>
                        <th scope="col">OFficerName</th>
                        <th scope="col">HospitalName</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients_general as $patient)
                        <tr>
                            <th scope="row">{{ $patient->patient_id }}</th>
                            <td>{{ $patient->patient_name }}</td>
                            <td>{{ $patient->gender }}</td>
                            <td>{{\Carbon\Carbon::parse($patient->created_at)->diffForHumans()}}</td>
                            <td>{{ $patient->category }}</td>
                            <td>{{ $patient->officer_name }}</td>
                            <td>{{ $patient->hospital_name }}</td>
                          </tr>
                        @endforeach  
                    </tbody>
                  </table>
                  {{ $patients_general->links() }}

            @else
            <div class="mt-5">
                <h2 style="color: #ffffff">There are no patients yet in general hospital</h2>
            </div>

            @endif
            <div class="col-md-12 m-5 ">
                <p class="tab">ByRegionalHospital</p>
            </div>
              @if ($patients_referals->Count())
              <table class="table table-striped table-dark ">
                <thead>
                  <tr>
                    <th scope="col">PatientID</th>
                    <th scope="col">PatientName</th>
                    <th scope="col">Gender</th>
                    <th scope="col">DOI</th>
                    <th scope="col">Status</th>
                    <th scope="col">OFficerName</th>
                    <th scope="col">HospitalName</th>
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach ($patients_referals as $patient)
                    <tr>
                        <th scope="row">{{ $patient->patient_id }}</th>
                        <td>{{ $patient->patient_name }}</td>
                        <td>{{ $patient->gender }}</td>
                        <td>{{\Carbon\Carbon::parse($patient->created_at)->diffForHumans()}}</td>
                        <td>{{ $patient->category }}</td>
                        <td>{{ $patient->officer_name }}</td>
                        <td>{{ $patient->hospital_name }}</td>
                      </tr>
                    @endforeach  
                </tbody>
              </table>
              {{ $patients_referals->links() }}
                  
              @else
              <div class="mt-5">
                <h2 style="color: #ffffff">There are no patients yet in referal hospital</h2>
            </div>
              @endif
              <div class="col-md-12">
                <p class="tab">ByNationalHospital</p>
            </div>
            
                 @if ($patients_nationals->count())
            
                
                    
                    
                    <table class="table table-striped table-dark ">
                        <thead>
                          <tr>
                            <th scope="col">PatientID</th>
                            <th scope="col">PatientName</th>
                            <th scope="col">Gender</th>
                            <th scope="col">DOI</th>
                            <th scope="col">Status</th>
                            <th scope="col">OFficerName</th>
                            <th scope="col">HospitalName</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients_nationals as $patient)
                            <tr>
                                <th scope="row">{{ $patient->patient_id }}</th>
                                <td>{{ $patient->patient_name }}</td>
                                <td>{{ $patient->gender }}</td>
                                <td>{{\Carbon\Carbon::parse($patient->created_at)->diffForHumans()}}</td>
                                <td>{{ $patient->category }}</td>
                                <td>{{ $patient->officer_name }}</td>
                                <td>{{ $patient->hospital_name }}</td>
                              </tr>
                            @endforeach  
                        </tbody>
                      </table>
                      {{ $patients_nationals->links() }}
    
                @else
                <div class="mt-5">
                    <h2 style="color: #ffffff">There are no patients yet in national hospital</h2>
                </div>
                @endif 
               
        </div>
   </div>
</div>
</body>
</html>
    @endsection