<?php

namespace App\Http\Controllers\Convenio;

use App\Convenio;
use App\ConvenioDireccionFiscal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert as Alert;


class ConvenioDireccionFiscalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Convenio $convenio)
    {
        //
        $direccion = $convenio->direccionFiscalConvenio;
        if ($direccion ==null) {
            # code...
            return redirect()->route('conveniosdireccionfiscal.create',['convenio'=>$convenio]);
        }
        else{
            return view('conveniosdireccionfiscal.view',['direccion'=>$direccion,'convenio'=>$convenio]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Convenio $convenio)
    {
        //
         return view('conveniosdireccionfiscal.create',['convenio'=>$convenio]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Convenio $convenio)
    {
        //
        $direccion = ConvenioDireccionFiscal::create($request->all());

        Alert::success('Dirección Fiscal del Convenio Actualizada')->persistent("Cerrar");
        return redirect()->route('convenios.contactos.index',['convenio'=>$convenio]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function show(Convenio $convenio)
    {
        //
        $direccion = $convenio->direccionFiscalConvenio;
        return view('conveniosdireccionfiscal.view',['direccion'=>$direccion,'convenio'=>$convenio]);
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
        $direccion = $convenio->direccionFiscalConvenio;
        return view('conveniosdireccionfiscal.edit',['convenio'=>$convenio, 'direccion'=>$direccion]);
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
        //
        $convenio->direccionFiscalConvenio->update($request->all());
        Alert::success('Dirección Fiscal del Convenio Actualizada')->persistent("Cerrar");
        return redirect()->route('convenios.direccionfiscal.index',['convenio'=>$convenio]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convenio $convenio)
    {
        //
    }
}
