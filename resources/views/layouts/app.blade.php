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

    <!-- ********************************** -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
         <script src="{{ asset('js/peticion.js') }}"></script>
         

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" {{-- style="background: #55688a;" --}}>
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{-- <img src="{{ asset('img/logo.jpeg') }}" height="32" width="70"> --}}
                        {{-- {{ config('app.name', 'Optica') }} --}}
                    </a>
                </div>


                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        {{-- @guest
                            <li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
                            <li><a href="{{ route('register') }}"><i class="fa fa-clipboard" aria-hidden="true"></i> Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i>Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest --}}
                        <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i> Clientes<span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/personals/create')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Alta</a>
                                <a href="{{ url('/personals') }}"><i class="fa fa-search" aria-hidden="true"></i> Busqueda</a>
                                <a href="#"><i class="fa fa-location-arrow" aria-hidden="true"></i> Seguimiento</a>    
                            </li>                     
                        </ul>
                    </li> -->
                    
                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Productos <span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('import-export-csv-excel') }}"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Alta por excel</a>
                                <a href="{{ url('productos') }}"><i class="fa fa-search" aria-hidden="true"></i> Busqueda</a>  
                            </li>                     
                        </ul>
                    </li> -->
                   

                    <li class="dropdown">
                        <a tabindex="-1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"><i class="fa fa-briefcase" aria-hidden="true"></i> Recursos Humanos <span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('/empleados/create')}}','Agrega Empleado')">
                                <i class="fa fa-user-plus" aria-hidden="true">
                                </i> Alta de Empleado
                                </a>

                                <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('/empleados')}}','Buscar empleado')">
                            <i class="fa fa-search" aria-hidden="true"></i> Busqueda de Empleados
                                </a>

                           

                                

                                <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('/bonos')}}','Bonos')">
                            <i class="fa fa-gift" aria-hidden="true"></i> Bonos
                                </a>

                                 <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('/comision')}}','Comisiones')">
                            <i class="fa fa-money" aria-hidden="true"></i> Comisiones
                                </a>


                                <li class="dropdown-submenu">

                                <a tabindex="-1" href="#"><i class="fa fa-refresh" aria-hidden="true"></i> Precargas:</a>
                                    <ul class="dropdown-menu">

                                      <li><a href="#" onclick="AgregarNuevoTab('{{ url('bajas') }}','Bajas')"><i class="fa fa-level-down" aria-hidden="true"></i> Bajas</a></li>
                                      <li><a href="#" onclick="AgregarNuevoTab('{{ url('contratos') }}','Contratos')"><i class="fa fa-file-text-o" aria-hidden="true"></i> Contratos</a></li>
                                       <li>
                                         <a href="#" onclick="AgregarNuevoTab('{{ url('/areas') }}','Areas')"><i class="fa fa-refresh" aria-hidden="true"></i> Precargas Areas</a>
                                        </li>
                                        <li>
                                          <a href="#" onclick="AgregarNuevoTab('{{ url('/puestos') }}','Puestos')"><i class="fa fa-refresh" aria-hidden="true"></i> Precargas Puestos</a>
                                        </li>
                                        
                                    </ul>

                                </li>



                            </li>                     
                        </ul>
                    </li>


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-truck" aria-hidden="true"></i> Proveedores<span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#" 
                                   onclick="AgregarNuevoTab('{{ url('/provedores/create')}}','Agregar Proveedor')">
                                <i class="fa fa-user-plus" aria-hidden="true"></i> Alta</a>

                                <a href="#" 
                                onclick="AgregarNuevoTab('{{ url('/provedores') }}','Buscar Proveedor')">
                                <i class="fa fa-search" aria-hidden="true"></i> Busqueda</a>
                                <li class="dropdown-submenu">
                                <a tabindex="-1" 
                                   href="#">
                                   <i class="fa fa-refresh" 
                                      aria-hidden="true"></i> 
                                  Precargas:</a>
                                    <ul class="dropdown-menu">
                                      <li>
                                        <a href="#" 
                                           onclick="AgregarNuevoTab('{{ url('/giros') }}','Giros')">
                                           <i class="fa fa-refresh" aria-hidden="true"></i> 
                                       Giros</a></li>

                                      <li><a href="#" 
                                             onclick="AgregarNuevoTab('{{ url('/formacontactos') }}','Forma de Contacto')">
                                             <i class="fa fa-refresh" aria-hidden="true"></i>Forma Contactos</a></li>
                                    </ul>
                                  </li>





                            </li>                     
                        </ul>
                    </li>


                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-cube" aria-hidden="true"></i>Productos<span class="caret"></span> </a>
                       <!--  <ul class="dropdown-menu" role="menu">
                            <li>
                                 <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('almacens.index')}}','Almacenes')">
                            <i class="fa fa-plus" aria-hidden="true"></i> Almacenes
                                </a>

                            
                                  </li>
                                  </ul> -->





                            </li> 

                             <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-database" aria-hidden="true"></i> Inventarios<span class="caret"></span> </a>
                     <!--    <ul class="dropdown-menu" role="menu">
                            <li>
                                 <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('almacens.index')}}','Almacenes')">
                            <i class="fa fa-plus" aria-hidden="true"></i> Almacenes
                                </a>

                            
                                  </li>
                                  </ul> -->





                            </li> 


                            


 <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-university" aria-hidden="true"></i> Sucursales<span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                 <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('sucursales.index')}}','Ver Sucursales')">
                            <i class="fa fa-bars" aria-hidden="true"></i> Lista de Sucursales
                                </a>

                            
                                  </li>

                                  <li>
                                 <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('sucursales.create')}}','Nueva Sucursal')">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Sucursal
                                </a>

                            
                                  </li>

                                </ul>





                            </li>                     
                     


                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-industry" aria-hidden="true"></i> Almacenes<span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                 <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('almacens.index')}}','Ver Almacenes')">
                            <i class="fa fa-bars" aria-hidden="true"></i> Lista de Almacenes
                                </a>

                            
                                  </li>

                                  <li>
                                 <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('almacens.create')}}','Nuevo Almacen')">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Almacen
                                </a>

                            
                                  </li>

                                </ul>





                            </li>                     
                     









                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user-md" aria-hidden="true"></i> Pacientes<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#" 
                                   onclick="AgregarNuevoTab('{{ url('/pacientes/create')}}','Agregar Paciente')">
                                   <i class="fa fa-user-plus" aria-hidden="true"></i> Agregar Paciente</a>

                                <a href="#" 
                                onclick="AgregarNuevoTab('{{ url('/pacientes') }}','Buscar Paciente')">
                                <i class="fa fa-search" aria-hidden="true"></i> Busqueda</a>

                                <!-- <a href="#" 
                                onclick="AgregarNuevoTab('{{ url('/') }}','Buscar Proveedor')">
                                <i class="fa fa-address-book-o" aria-hidden="true"></i> C.R.M.</a> -->
                                
                                <li class="dropdown-submenu pull-left">
                                <a tabindex="-1" href="#"><i class="fa fa-refresh" aria-hidden="true"></i> Precargas:</a>
                                    <ul class="dropdown-menu">
                                      <li><a href="#" onclick="AgregarNuevoTab('{{ url('bajas') }}','Bajas')"><i class="fa fa-level-down" aria-hidden="true"></i> Bajas</a></li>
                                      <li><a href="#" onclick="AgregarNuevoTab('{{ url('contratos') }}','Contratos')"><i class="fa fa-file-text-o" aria-hidden="true"></i> Contratos</a></li>
                                    </ul>
                                </li>
                            </li>
                        </ul>
                    </li>


                    
                    {{-- <li class="dropdown-submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Productos <span class="caret"></span> </a>
                    <ul class="dropdown-menu">
                      <li class="dropdown-submenu">
                        <a class="test" href="#"><i class="fa fa-car" aria-hidden="true"></i> Vehiculos <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i> Alta</a></li>
                          <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i> Busqueda</a></li>
                        </ul>
                        <a class="test" href="#"><i class="fa fa-motorcycle" aria-hidden="true"></i> Motocicletas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i> Alta</a></li>
                          <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i> Busqueda</a></li>
                        </ul>
                         <a class="test" href="#"><i class="fa fa-home" aria-hidden="true"></i> Casas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i> Alta</a></li>
                          <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i> Busqueda</a></li>
                        </ul>
                      </li>
                    </ul>
                </li> --}}
                </div>
            </div>
        </nav>
        @yield('content')
        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>
    <script src="{{ asset('bootstrap-toggle/js/bootstrap-toggle.js') }}"></script>

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
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    @include('sweet::alert')
<!-- ********************************************** -->
        
    
        <!-- /.container -->
    <div class="container" style="width: 100%; height: 100%;">
        <ul id="tabsApp" class="nav nav-tabs"></ul>
        <div id="contenedortab" class="tab-content"></div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/pestanas.js') }}"></script>
    <script src="{{ asset('js/forms.js') }}"></script>
    <script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
   
</body>
</html>