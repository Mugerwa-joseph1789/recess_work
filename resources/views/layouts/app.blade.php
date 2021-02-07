<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <style>
        ul{
            float: right;
            list-style-type: none;
            margin-top: 25px;
        }
        ul li{
            display: inline-block;
        }
        ul li a{
            text-decoration: none;
            color: #fff;
            padding: 5px 20px;
            border: 1px solid #fff;
            transition: 0.6s ease;
        }
        ul li a:hover{
            background-color: #fff;
            color: #000;
        }
        .positioning{
            position:sticky !important;
            top: 0;
            z-index: 100;
        }
    </style>
    

    <div style="background-image:url({{asset('/images/covid.png')}});height:100vh">
    
    
    <header>
    <div class="more">
    <ul>
    <li><a href="/">Home</a></li>
    <li><a href="/services">Services</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="/contactus">Contact Us</a></li>
    </ul>
    </div>
    </header>
    <br><br><br>
    <div id="app">
        
        <div class="positioning">
        
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <h1 style="color:#0000ff">COVID-19 CASE MANAGEMENT AND REPORTING SYSTEM</h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
    
                        </ul>
    
                        <!-- Right Side Of Navbar -->
                       <ul class="navbar-nav ml-auto"> 
                            <!-- Authentication Links -->

                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}"><h2>{{ __('Login') }}</h2></a>
                                    </li>
                                @endif
                                
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}"><h2>{{ __('Register') }}</h2></a>
                                    </li>
                                @endif
                                
                            @else
                                 @if(Auth::user()->role === 'Director')
                                <li class="nav-item dropdown">
    
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a href="{{ route('patientlist') }}" 
                                        class="dropdown-item">Patients</a>
                                        <a href="{{ route('money') }}" 
                                        class="dropdown-item">Payments</a>
                                        <a href="{{ route('graphs') }}" 
                                        class="dropdown-item">Graphs</a>
                                        <a href="{{ route('graphical') }}" 
                                        class="dropdown-item">Charts</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endif
                                 @if (Auth::user()->role === 'Administrator')
                                 <li class="nav-item dropdown" >
                                    
                                 <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
    
    
                                    
                                    

                                        <a   href="{{ route('registerofficer') }}" 
                                        class="dropdown-item">Add health officer</a>
                                        <a href="{{ route('registerdonormoney') }}" 
                                        class="dropdown-item">Funds</a>
                                        <a href="{{ route('records') }}" 
                                        class="dropdown-item">Records</a>
                                        <a href="{{ route('patientlist') }}" 
                                        class="dropdown-item">Patients</a>
                                        <a href="{{ route('money') }}" 
                                        class="dropdown-item">Payments</a>
                                        <a href="{{ route('graphs') }}" 
                                        class="dropdown-item">Graphs</a>
                                        <a href="{{ route('graphical') }}" 
                                        class="dropdown-item">Charts</a>
                                        
                                    
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        
                                       
                                        
                                        </div>
                                    
                                </li>
                                 @endif
                                
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
    

       
        </div>
        
        <main >
            @yield('content')
        </main>
       
    </div>
    
</div>
    
</body>
</html>
