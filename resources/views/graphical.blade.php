@extends('layouts.app');


@section('content')
<head>
   <link href="{{URL::asset('css/graphical.css') }}" rel="stylesheet">
</head>
<div class="black"></div>
    <div class="container">
        <div class="col-md-12 mt-3 mb-3">
            <p class="tab">HierachicalDisplays</p>
        </div>
        <div class="contained">
            <div class="col-md-12 mt-3 mb-3">
                <p class="tab-hospitals">GeneralHospitalHierarchy</p>
            </div>
            <ol>
                <h2 class="level-3 rectangle">HeadGeneralHospital</h2>
                <ol class="level-4-wrapper">
                  <li>
                    <h4 class="level-4 rectangle">Officers</h4>
                  </li>
                </ol>
            </ol>
            <div class="col-md-12 mt-3 mb-3">
                <p class="tab-hospitals">ReferalHospitalHierarchy</p>
            </div>
            <ol>
                <h2 class="level-3 rectangle">Superintendent</h2>
                <ol class="level-4-wrapper">
                  <li>
                    <h4 class="level-4 rectangle">SeniorOfficers</h4>
                  </li>
                </ol>
                <div class="col-md-12 mt-3 mb-3">
                    <p class="tab-hospitals">NationalHospitalHierarchy</p>
                </div>
                <ol>
                    <h2 class="level-3 rectangle">DirectorCovid19Pandemic</h2>
                    <ol class="level-4-wrapper">
                      <li>
                        <h4 class="level-4 rectangle">StaffMembers</h4>
                      </li>
                    </ol>

        </div>

        <div class="footer">
            <small>2021 All Rights Reserved</small>
            <a href="{{ route('home') }}">BackHome</a>
        </div>
    </div>
</div>'
    
@endsection