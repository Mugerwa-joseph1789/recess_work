@extends('layouts.app')

@section('content')
<html>
<head>
   <!-- <link href="{{URL::asset('css/health.css') }}" rel="stylesheet"> -->
    
</head>
<div style="background-image:url({{asset('/images/covid.png')}});height:100vh">
    <div   >    
        
            @if (session('status'))
        <div class="officer-created" id="remove">
            <h4>
                {{ session('status') }}
            </h4>    
        </div>
        @endif

            <div class="shadow">
            
               
                <a href="{{ route('home') }}"><h3 style="color: #ffffff">HOME</h3></a>
            

                <div class="h2 text-center mt-4 mb-5" style="color: #ffffff">Add health officer</div>
                <form method="POST" action="{{ route('registerofficer') }}" class="m-5">
                    @csrf
            <!--get officer name-->
                    <div class="form-group  ">
                        <label for="name" class="col-md-12 col-form-label
                        @error('officer_name') invalid @enderror
                        "><h2 style="color:white">Name</h2></label>

                        <div class="col-md-12">
                            <input id="name" type="name" 
                            class="form-control 
                            @error('officer_name') is-invalid
                             @enderror" name="officer_name" value="{{ old('officer_name') }}"
                              autocomplete="name"
                              autofocus>

                            @error('officer_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--get username-->
                        <div class="form-group  ">
                        <label for="name" class="col-md-12 col-form-label
                        @error('username') invalid @enderror
                        "><h2 style="color:white">Username</h2></label>

                        <div class="col-md-12">
                            <input id="name" type="name" 
                            class="form-control 
                            @error('Username') is-invalid
                             @enderror" name="Username" value="{{ old('Username') }}"
                              autocomplete="name"
                              autofocus>

                            @error('Username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--get gender-->
                        <div class="form-group  ">
                        <label for="name" class="col-md-12 col-form-label
                        @error('Gender') invalid @enderror
                        "><h2 style="color:white">Gender</h2></label>

                        <div class="col-md-12">
                            <input id="name" type="name" 
                            class="form-control 
                            @error('Gender') is-invalid
                             @enderror" name="Gender" value="{{ old('Gender') }}"
                              autocomplete="name"
                              autofocus>

                            @error('Gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group ml-6 mt-4 ">
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
    </html>
@endsection


