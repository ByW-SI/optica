<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('img//favicon.ico') }}" type="image/x-icon">
        <script href="{{ asset('js/jquery-3.2.1.min.js') }}"></script> 
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        Latest compiled and minified JavaScript
        
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --> --}}
        <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"> 
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="{{ asset('js/peticion.js') }}"></script>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top" {{-- style="background: #55688a;" --}}>
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{-- <img src="{{ asset('img/logo.jpeg') }}" height="32" width="70"> --}}
                            {{-- {{ config('app.name', 'Optica') }} --}}
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @auth
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
                            {{-- SEGURIDAD --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                            @if($componente->modulo->nombre == "seguridad")
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-lock" aria-hidden="true"></i> Seguridad<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach(Auth::user()->perfil->componentes as $c)
                                    @if($c->nombre == "indice perfiles")
                                    <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{url ('perfil')}}','Perfiles')">
                                            <i class="fa fa-universal-access" aria-hidden="true"></i> Perfiles
                                        </a>
                                    </li>
                                    @endif
                                    @if($c->nombre == "indice usuarios")
                                    <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{url ('usuario')}}','Usuarios')">
                                            <i class="fa fa-user-circle" aria-hidden="true"></i> Usuarios
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach          
                                </ul>
                            </li>
                            @break
                            @endif
                            @endforeach
                            {{-- RECURSOS HUMANOS --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                            @if($componente->modulo->nombre == "rh")
                            <li class="dropdown">
                                <a tabindex="-1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"><i class="fa fa-briefcase" aria-hidden="true"></i> Recursos Humanos <span class="caret"></span> </a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach(Auth::user()->perfil->componentes as $c)
                                    @if($c->nombre == "crear empleado")
                                    <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/empleados/create')}}','Agrega Empleado')">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i> Alta de Empleado
                                        </a>
                                    </li>
                                    @endif
                                    @if($c->nombre == "indice empleados")
                                    <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/empleados')}}','Buscar empleado')">
                                            <i class="fa fa-search" aria-hidden="true"></i> Busqueda de Empleados
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach                 
                                </ul>
                            </li>
                            @break
                            @endif
                            @endforeach
                            {{-- PRECARGAS --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                            @if($componente->modulo->nombre == "precargas")
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-refresh" aria-hidden="true"></i> Precargas<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#" onclick="AgregarNuevoTab('{{ url('bajas') }}','Bajas')"><i class="fa fa-level-down" aria-hidden="true"></i> Bajas</a></li>
                                    <li><a href="#" onclick="AgregarNuevoTab('{{ url('contratos') }}','Contratos')"><i class="fa fa-file-text-o" aria-hidden="true"></i> Contratos</a></li>
                                    <li><a href="#" onclick="AgregarNuevoTab('{{ url('/areas') }}','Areas')"><i class="fa fa-refresh" aria-hidden="true"></i> Precargas Areas</a></li>
                                    <li><a href="#" onclick="AgregarNuevoTab('{{ url('/puestos') }}','Puestos')"><i class="fa fa-refresh" aria-hidden="true"></i> Precargas Puestos</a></li>
                                    <li><a href="#" onclick="AgregarNuevoTab('{{ url('/bancos') }}','Bancos')"><i class="fa fa-refresh" aria-hidden="true"></i> Precargas Bancos</a></li>
                                    <li><a href="#" onclick="AgregarNuevoTab('{{ url('/giros') }}','Giros')"><i class="fa fa-refresh" aria-hidden="true"></i> Giros</a></li>
                                    <li><a href="#" onclick="AgregarNuevoTab('{{ url('/formacontactos') }}','Forma de Contacto')"><i class="fa fa-refresh" aria-hidden="true"></i> Forma Contactos</a></li>
                                    <li><a href="#" onclick="AgregarNuevoTab('{{ route('productoschidos.create') }}','Productos')"><i class="fa fa-refresh" aria-hidden="true"></i> Productos</a></li>
                                    <li><a href="#" onclick="AgregarNuevoTab('{{ route('inventario.create') }}','Inventario')"><i class="fa fa-refresh" aria-hidden="true"></i> Inventario</a></li>
                                    <li><a href="#" onclick="AgregarNuevoTab('{{ route('inventario.index') }}','Precios')"><i class="fa fa-refresh" aria-hidden="true"></i> Precios</a></li>
                                </ul>
                            </li>
                            @break
                            @endif
                            @endforeach

                            {{-- CRMS --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                            @if($componente->modulo->nombre == "crms")
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" onclick="AgregarNuevoTab('{{url ('crm2')}}','CRMs')">
                                    <i class="fa fa-calendar" aria-hidden="true"></i> CRM
                                </a>
                            </li>
                            @break
                            @endif
                            @endforeach

                            {{-- PROVEEDORES --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                            @if($componente->modulo->nombre == "proveedores")
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-truck" aria-hidden="true"></i> Proveedores<span class="caret"></span> </a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach(Auth::user()->perfil->componentes as $c)
                                    @if($c->nombre == "crear proveedor")
                                    <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/provedores/create')}}','Agregar Proveedor')">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i> Alta
                                        </a>
                                    </li>
                                    @endif
                                    @if($c->nombre == "indice proveedores")
                                    <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/provedores') }}','Buscar Proveedor')">
                                            <i class="fa fa-search" aria-hidden="true"></i> Busqueda
                                        </a>
                                   </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                            @break
                            @endif
                            @endforeach
                            {{-- SUCURSALES --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                            @if($componente->modulo->nombre == "sucursales")
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-university" aria-hidden="true">
                                    </i> Sucursales<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach(Auth::user()->perfil->componentes as $c)
                                    @if($c->nombre == "indice sucursales")
                                    <li>
                                       <a href="#" onclick="AgregarNuevoTab('{{ url('sucursales.index')}}','Ver Sucursales')">
                                            <i class="fa fa-bars" aria-hidden="true"></i> Lista de Sucursales
                                        </a>
                                    </li>
                                    @endif
                                    @if($c->nombre == "crear sucursal")
                                    <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('sucursales.create')}}','Nueva Sucursal')">
                                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Sucursal
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                            @break
                            @endif
                            @endforeach
                            {{-- CONVENIOS --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                            @if($componente->modulo->nombre == "convenios")
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-handshake-o" aria-hidden="true"></i> Convenios<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach(Auth::user()->perfil->componentes as $c)
                                    @if($c->nombre == "crear convenio")
                                    <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/convenios/create')}}','Agregar Convenio')">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i> Alta
                                        </a>
                                    </li>
                                    @endif
                                    @if($c->nombre == "indice convenios")
                                    <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/convenios') }}','Buscar Convenios')">
                                            <i class="fa fa-search" aria-hidden="true"></i> Busqueda
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                            @break
                            @endif
                            @endforeach
                            {{-- PACIENTES --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                            @if($componente->modulo->nombre == "pacientes")
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user-md" aria-hidden="true"></i> Pacientes<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach(Auth::user()->perfil->componentes as $c)
                                    @if($c->nombre == "crear paciente")
                                    <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/pacientes/create')}}','Agregar Paciente')">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i> Agregar Paciente
                                        </a>
                                    </li>
                                    @endif
                                    @if($c->nombre == "indice pacientes")
                                    <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/pacientes') }}','Buscar Paciente')">
                                            <i class="fa fa-search" aria-hidden="true"></i> Busqueda
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                                    {{-- <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/excel/pacientes') }}','Alta por Excel')">
                                            <i class="fa fa-file-excel-o" aria-hidden="true"></i> Alta por Excel
                                        </a>
                                    </li> --}}
                                </ul>
                            </li>
                            @break
                            @endif
                            @endforeach
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('bootstrap-toggle/js/bootstrap-toggle.js') }}"></script> 
        <script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>

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

        <script src="{{ asset('js/pestanas.js') }}"></script>
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