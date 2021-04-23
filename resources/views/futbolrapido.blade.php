<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- <style>
      body {background: url({{ asset('img/Canadon.jpeg') }}) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;}
    </style> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('js/fullcalendar.js') }}"></script>
    <script src="{{ asset('js/es.js') }}"></script>
    
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
  
	<div class="container-fluid">
	    <br>
	    <br>
	<div class="row">
    	<div class="col">
     	 	<a href="{{ route('home') }}"><button type="button" class="btn btn-primary">Inicio</button></a>
    	</div>
    	<div class="col-9">
    		{{-- <h1 style="text-align:center">Hola</h1> --}}
    		<br>

    		@if(session('status'))
            	<div class="alert alert-success" role="alert">
                	{{ session('status') }}
            	</div>
            @endif
            
            @if(session('failed'))
            	<div class="alert alert-danger" role="alert">
                	{{ session('failed') }}
            	</div>
            @endif

    		<br>
      		<div id="calendar"></div>
    	</div>
	    <div class="col">
	      
	    </div>
	
	</div>
	   
	<script>

	$(document).ready(function () {

	    $.ajaxSetup({
	        headers:{
	            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
	        }
	    });

	    var calendar = $('#calendar').fullCalendar({
	        lang: 'es',
	        editable:true,
	        header:{
	            left:'prev,next today',
	            center:'title',
	            right:'month'
	        },
	        selectable:true,
	        selectHelper: true,
	        select:function(start, end, allDay)
	        {
	            /*var start = $.fullCalendar.formatDate(start, 'Y-MM-DD');*/
	            var start = $.fullCalendar.formatDate(start, 'Y-MM-DD');
	            console.log(start);
	            $(".modal-body #dia").val( start );
	            $('#modalreservarap').modal('show');
	        },

	    });

	});
	  
	</script>
	@include('modalreservarap')


</body>
</html>
