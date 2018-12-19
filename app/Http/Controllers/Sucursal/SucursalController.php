<?php

namespace App\Http\Controllers\Sucursal;

use App\Sucursal;
use UxWeb\SweetAlert\SweetAlert as Alert;
use Illuminate\Http\Request;
use App\Empleado;
use App\EmpleadosDatosLab;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class SucursalController extends Controller {

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                foreach (Auth::user()->perfil->componentes as $componente)
                    if($componente->modulo->nombre == "sucursales")
                        return $next($request);
                return redirect()->route('denegado');
            } else
                return redirect()->route('login');
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursales = Sucursal::get(); 
        return view('sucursales.index', ['sucursales' => $sucursales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $integer = count(Sucursal::get()) > 0 ? count(Sucursal::get()) : 1;
        return view('sucursales.create', ['integer' => $integer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sucursal = Sucursal::create($request->all());
        return redirect()->route('sucursales.show', ['sucursal' => $sucursal]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sucursale  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show($sucursal)
    {
        $sucursal = Sucursal::find($sucursal);
        return view('sucursales.view', ['sucursal' => $sucursal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit( $sucursal)
    {
        $sucursal = Sucursal::find($sucursal);
        $integer = $sucursal->id;
        return view('sucursales.edit', ['sucursal' => $sucursal, 'integer' => $integer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sucursal)
    {
        $sucursal = Sucursal::find($sucursal);
        $sucursal->update($request->all());
        return redirect()->route('sucursales.show', ['sucursal' => $sucursal]);
    }

    public function getSucursal() {
        $sucursales = Sucursal::get();
        return view('precargas.select', ['precargas' => $sucursales]);
    }

}