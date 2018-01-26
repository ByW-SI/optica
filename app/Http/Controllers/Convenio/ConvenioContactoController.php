<?php

namespace App\Http\Controllers\Convenio;

use App\Convenio;
use App\ConvenioContacto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert as Alert;

class ConvenioContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Convenio $convenio)
    {
        //
        $contactos = $convenio->contactosConvenio;
        // dd($contactos);
        return view('convenioscontactos.index', ['convenio'=>$convenio, 'contactos'=>$contactos]);
    }
    public function busqueda(){
        $contactos = $convenio->contactosConvenio;
        // dd($contactos);
        return view('convenioscontactos.busqueda', ['convenio'=>$convenio, 'contactos'=>$contactos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Convenio $convenio)
    {
        //
        return view('convenioscontactos.create',['convenio'=>$convenio]);
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
        $contacto = ConvenioContacto::create($request->all());
        Alert::success('Contacto creado con éxito');

        return redirect()->route('convenios.contactos.index', ['convenio'=>$convenio]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function show(Convenio $convenio, $contacto)
    {
        //
         $contacto = ConvenioContacto::findOrFail($contacto);
        return view('convenioscontactos.view',['convenio'=>$convenio, 'contacto'=>$contacto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function edit(Convenio $convenio, $contacto)
    {
        //
        $contacto = ConvenioContacto::findOrFail($contacto);
        return view('convenioscontactos.edit',['convenio'=>$convenio, 'contacto'=>$contacto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convenio $convenio,$contacto)
    {
        //
        $contacto = ConvenioContacto::findOrFail($contacto);
        $contacto->update($request->all());
        Alert::success('Contacto actualizado con éxito');
        return redirect()->route('convenios.contactos.index',['convenio'=>$convenio]);
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
