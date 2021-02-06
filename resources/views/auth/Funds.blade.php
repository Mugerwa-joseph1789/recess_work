@extends('layouts.app')
@section('content')
<head>
   <!-- <link href="{{URL::asset('css/health.css') }}" rel="stylesheet"> -->
</head>
<body style="background-image:url({{asset('/images/covid.png')}});height:100vh">
<div >
    <div class="grid">
        <div class="grid">
            @if (session('status'))
        <div class="officer-created" id="remove">
            <h4>
                {{ session('status') }}
            </h4>    
        </div>
        @endif
        
        <div class="shadow">
        
            
            <a href="{{ route('home') }}"><h4 style="color: #ffffff">HOME</h4></a>
          
        
        <button style="position:absolute;right:30px;" onclick="window.location='availablefunds'" >  present</button>
            <div class="h2 text-center mt-4 mb-5">
            
                <h2 style="color: #ffffff">Funds</h2>
               
            </div>
            <form method="POST" action="{{ route('registerdonormoney') }}" class="m-5">
                @csrf

                <div class="form-group  ">
                    <label for="name" class="col-md-12 col-form-label
                    "><h2 style="color:white">Donor</h2></label>

                    <div class="col-md-12">
                        <input id="name" type="name" 
                        class="form-control 
                        @error('donor_name') is-invalid
                         @enderror" name="donor_name" value="{{ old('donor_name') }}"
                          >

                        @error('donor_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            
                  
                <div class="form-group  ">
                    <label for="month" class="col-md-12 col-form-label
                    "><h2 style="color:white">Month</h2></label>

                    <div class="col-md-12">
                        <input id="month" type="month" 
                        class="form-control 
                        @error('month') is-invalid
                         @enderror" name="month" value="{{ old('month') }}"
                          >

                        @error('month')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                

                <div class="form-group mb-4 ">
                    <label for="name" class="col-md-12 col-form-label
                    "><h2 style="color:white">Amount</h2></label>

                    <div class="col-md-12">
                        <input id="name" type="name" 
                        placeholder="eg;5000000"
                        class="form-control 
                        @error('amount') is-invalid
                         @enderror" name="amount" value="{{ old('amount') }}"
                          >

                        @error('amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group ml-6 mb-4 ">
                      <p>  <button type="submit" class="btn btn-primary" style="width:110px">
                            {{ __('Submit') }}
                        </button>
                        <button type="reset" class="btn btn-primary" style="width:110px">Cancel</button>
                    </p>
                </div>
            </form>
        </div>
        
    </div>
</div>
</div>

<script>
    const getId = document.querySelector('#remove');
    //document.querySelector('.shadow').classList.add('margin-top')
    getId?(
       setTimeout(()=>{
          getId.classList.toggle('remove-alert')
       }, 10000)
    ):null
    
  </script>
   </body>
@endsection