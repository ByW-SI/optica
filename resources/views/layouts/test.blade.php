<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img//favicon.ico') }}" type="image/x-icon">
    
    <!-- Styles -->
    <script href="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    
   
    <link rel="stylesheet" href="{{ asset('bootstrap-toggle/css/bootstrap-toggle.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <!-- Optional theme -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    Latest compiled and minified JavaScript
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}

     <!-- Custom Fonts -->
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
     <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">

</head>
<body>
    <div id="app">
        @yield('content1')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ asset('js/forms.js') }}"></script> -->

    {{-- <script type="text/javascript">
        function formulario(elemento){
            if (elemento.value == "Prospecto") {
                document.getElementById('cliente').style.display='none';
                document.getElementById('cliente1').style.display='none';
                document.getElementById('cliente2').style.display='none';
            }
            if (elemento.value == "Cliente") {
                document.getElementById('cliente').style.display='inline';
                document.getElementById('cliente1').style.display='inline';
                document.getElementById('cliente2').style.display='inline';
            }
        }
        function persona(elemento){
            if(elemento.value == "Fisica"){
                document.getElementById('perfisica').style.display='inline';
                document.getElementById('permoral').style.display='none';
            }
            if(elemento.value =="Moral"){
                document.getElementById('perfisica').style.display='none';
                document.getElementById('permoral').style.display='inline';
            }
        }
    </script> --}}
    <script src="{{ asset('bootstrap-toggle/js/bootstrap-toggle.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <!-- Include this after the sweet alert js file -->
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

        <script src="{{asset('js/citas.js')}}"></script>
      <script src="{{asset('js/crm.js')}}"></script>
	<script type="text/javascript">
	
		// $("#si-cita").hide();
		// $("#no-cita").hide();

	function getSucursal(){
			$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
			});
			$.ajax({
				url: "{{ url('/getsucursal') }}",
			    type: "GET",
			    dataType: "html",
			}).done(function(resultado){
			    $("#sucursal").html(resultado);
			});
		}
		
	function previewFile(input){
		if(input.files && input.files[0]){
			var filered = new FileReader();
			filered.onload = function(e){
				$('#imagenpre').attr('src', e.target.result);
			}
			filered.readAsDataURL(input.files[0]);
		}
	}

	function previewFile2(input){
		if(input.files && input.files[0]){
			var filered = new FileReader();
			filered.onload = function(e){
				$('#imagenpie').attr('src', e.target.result);
			}
			filered.readAsDataURL(input.files[0]);
		}
	}

	function cocultar(e){
		if(e.value=="si"){
			$("#no-cita").hide();
			$("#si-cita").show();
		}else if(e.value=="no"){
			$("#si-cita").hide();
			$("#no-cita").show();
		}
	}
	</script>
    @include('sweet::alert')
   
</body>
</html>