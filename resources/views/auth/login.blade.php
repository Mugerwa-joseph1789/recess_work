@extends('layouts.app')

@section('content')
<div style="background-image:url({{asset('/images/covid.png')}});height:100vh">
<div class="container mt-4">
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ __('Login') }}</h2></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                              <p>  <button type="submit" class="btn btn-primary" style="width:110px" >
                                    {{ __('Login') }}
                                </button>
                                <button type="reset" class="btn btn-primary" style="width:110px">cancel</button></p>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
    <h2 style="color: #ffffff"> Welcome to the covid-19 case management system!</h2>
    <br>
    <h4 style="color: #ffffff">To start using the system login or register</h4>
    
    <h5 style="position:absolute;bottom:0; color: #ffffff">For help;<br>Contact us<br>
    <address>
    <a href="mailto:angellabukirwa99@gmail.com " style="color: #ffffff">angellabukirwa99@gmail.com</a><br>
    <a href="tel:0775479013" style="color: #ffffff">0775479013</a>
    </address>
</div>
@endsection
