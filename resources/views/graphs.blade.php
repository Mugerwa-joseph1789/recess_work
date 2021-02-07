@extends('layouts.app')

@section('content')
<html>
     <head>
       
       <link href="{{URL::asset('css/register.css') }}" rel="stylesheet">
       </head>
       <body>
<div class="layout">
<a href="{{ route('home') }}">HOME</a>
      <!-- Chart's container -->
      <div class="container mt-3">
        <div class="col-md-12 mt-3 mb-3">
          <p class="tab">Graph</p>
      </div>
        <div id="wellwishers" style="height: 500px;" class="m-4"></div>
        <div class="col-md-12 mt-3 mb-3">
          <p class="tab">Graph</p>
      </div>
        <div id="months" style="height: 500px;" class="m-5"></div>
      </div>

     
        
    </div>
    
</div>
<!-- Charting library -->
<script  src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

 <script>
        
      // your Chart code here ex: new Chart
      const chart = new Chartisan({
     el: '#wellwishers',
     url: "@chart('donations_chart')",
     hooks:new ChartisanHooks()
            .beginAtZero()
            .responsive()
           .colors()
           .title({display:true,
           color:"red",
            text:"A graph of Donations  versus Wellwishers",
            font:{
              style:"bold"
            }
            })
           .legend({position:"bottom"})
           .datasets([{type:"bar", 
           label:"wellwishers",
           borderColor:"orange",
           backgroundColor:"orange",
           hoverBackgroundColor:"blue",
           barPercentage: 0.6,
           minBarLength: 2,
           axis:true,
           }])
           
   });

   const chart2 = new Chartisan({
     el: '#months',
     url: "@chart('months_chart')",
     hooks:new ChartisanHooks()
            .beginAtZero()
            .responsive()
           .colors()
           .title("A graph of Donations  versus months")
           .legend({position:"bottom"})
           .datasets([{type:"bar", 
           label:"months",
           borderColor:"orange",
           backgroundColor:"darkgreen",
           hoverBackgroundColor:"red",
           barPercentage: 0.6,
           minBarLength: 2,
           axis:true
           }])
           
   });

    </script>

 <script>
   
 </script>
 </body>
    </html>
@endsection