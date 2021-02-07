@extends('layouts.app')

@section('content')
<html>
<head>
<link href="{{URL::asset('css/money.css') }}" rel="stylesheet">
</head>
<body>
<div style="background-image:url({{asset('/images/covid.png')}});height:100vh">

    <div class="container mt-4">
    <a href="{{ route('home') }}">HOME</a>
    
   
  <form method="POST" action="{{ route('money') }}" class="m-2">
    @csrf

    <div class="form-group  ">
      <div class="form-group row">
        <label for="role" class="label">{{ __('SelectMonth') }}</label>
        <div class="col-md-12">
            <select name="month" id="" class="form-control">
              @if (count($months))
              @foreach ($months as $month)
              <option value={{ $month->month }}>{{ $month->month }}</option>
          @endforeach
              @else
              <option value="January">January</option>
              <option value="February">February</option>
              <option value="March">March</option>
              <option value="April">April</option>
              <option value="May">May</option>
              <option value="June">June</option>
              <option value="July">July</option>
              <option value="August">August</option>
              <option value="September">September</option>
              <option value="October">October</option>
              <option value="November">November</option>
               <option value="December">December</option>
              
              @endif
              

            </select>
            
            @error('role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
    <div class="form-group ml-6 mt-2">
            <button type="submit" class="btn btn-primary">
                {{ __('SelectMonth') }}
            </button>
        
    </div>
</form> 
        <div class="row justify-content-center">
            <div class="col-md-12 m-3">
                <!--<p class="tab-money">MoneyDistributionIn 
                  @if ($default)
                      {{ $default }}
                  @endif
                </p>-->
            </div>
            <div class="col-md-12 mt-3">
                <p class="tab">MoneyDistributionToStaffMembers</p>
            </div>
            @if (count($staff_payments))
            <table class="table table-striped table-dark ">
                <thead>
                  <tr>
                    <th scope="col">StaffMemberName</th>
                    <th scope="col">StaffMemberRole</th>
                    <th scope="col">Payments</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($staff_payments as $payment)
                    <tr>
                        <th scope="row">{{ $payment->name }}</th>
                        <td>{{ $payment->role }}</td>
                        <td> <small>shs</small>{{  $payment->monthly_allowane }}</td>
                      </tr>
                    @endforeach  
                </tbody>
              </table>
            
            @else
            <div class="mt-5">
                <h2>There was no payements this month</h2>
            </div>
            @endif

            <div class="col-md-12 mt-3">
                <p class="tab-money">MoneyDistributionToHealthOfficers</p>
            </div>

            <div class="col-md-12 mt-3">
                <p class="tab">HealthOfficersAtGeneralHospitals</p>
            </div>
            @if (count($officers_at_general))
            <table class="table table-striped table-dark ">
                <thead>
                  <tr>
                    <th scope="col">OfficerName</th>
                    <th scope="col">OfficerRole</th>
                    <th scope="col">Payments</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($officers_at_general as $payment)
                    <tr>
                        <th scope="row">{{ $payment->officer_name }}</th>
                        <td>{{ $payment->role }}</td>
                        <td> <small>shs</small>{{  $payment->monthly_allowane }}</td>
                      </tr>
                    @endforeach  
                </tbody>
              </table>
            @else
            <div class="mt-5">
                <h2>There was no payements made for general officers this month</h2>
            </div>
            @endif
            <div class="col-md-12 mt-3">
                <p class="tab">HealthOfficersAtReferalHospitals</p>
            </div>
            @if (count($officers_at_referal))
            <table class="table table-striped table-dark ">
                <thead>
                  <tr>
                    <th scope="col">OfficerName</th>
                    <th scope="col">OfficerRole</th>
                    <th scope="col">Payments</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($officers_at_referal as $payment)
                    <tr>
                        <th scope="row">{{ $payment->officer_name }}</th>
                        <td>{{ $payment->role }}</td>
                        <td> <small>shs</small>{{  $payment->monthly_allowane }}</td>
                      </tr>
                    @endforeach  
                </tbody>
              </table>
            @else
            <div class="mt-5">
                <h2>There was no payements made for  officers in Referal Hospitals this month</h2>
            </div>
            @endif


            <div class="col-md-12 mt-3">
                <p class="tab">HealthOfficersAtNationalHospitals</p>
            </div>
            @if (count($officers_at_national))
            <table class="table table-striped table-dark ">
                <thead>
                  <tr>
                    <th scope="col">OfficerName</th>
                    <th scope="col">OfficerRole</th>
                    <th scope="col">Payments</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($officers_at_national as $payment)
                    <tr>
                        <th scope="row">{{ $payment->officer_name }}</th>
                        <td>{{ $payment->role }}</td>
                        <td> <small>shs</small>{{  $payment->monthly_allowane }}</td>
                      </tr>
                    @endforeach  
                </tbody>
              </table>
            @else
            <div class="mt-5">
                <h2>There was no payements made for  officers in National Hospitals this month</h2>
            </div>
            @endif

           

            

            
        </div>
        
            
            
        
    </div>
</div>
</body>
</html>
@endsection