<?php

namespace App\Http\Controllers\Convenio;

use App\Convenio;
use App\ConvenioDireccionFiscal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert as Alert;


class ConvenioDireccionFiscalController extends Controller
{

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
    public function index(Convenio $convenio)
    {
        $direccion = $convenio->direccionFiscal;
        if($direccion == null)
            return redirect()->route('convenios.direccionfiscal.create', ['convenio' => $convenio]);
        else
            return view('convenios.direccionfiscal.view', ['direccion' => $direccion, 'convenio' => $convenio]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Convenio $convenio)
    {
         return view('convenios.direccionfiscal.create', ['convenio' => $convenio]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Convenio $convenio)
    {
        $direccion = ConvenioDireccionFiscal::create($request->all());
        Alert::success('Dirección Fiscal del Convenio Actualizada')->persistent("Cerrar");
        return redirect()->route('convenios.contactos.index', ['convenio' => $convenio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function edit(Convenio $convenio)
    {
        //
        $direccion = $convenio->direccionFiscal;
        return view('convenios.direccionfiscal.edit',['convenio'=>$convenio, 'direccion'=>$direccion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convenio $convenio)
    {
        $convenio->direccionFiscalConvenio->update($request->all());
        Alert::success('Dirección Fiscal del Convenio Actualizada')->persistent("Cerrar");
        return redirect()->route('convenios.direccionfiscal.index',['convenio'=>$convenio]);
    }

}
