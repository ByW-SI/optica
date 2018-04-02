<?php

namespace App\Http\Controllers\Paciente;

use App\Paciente;
use App\PacientesDatosGenerales;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class PacientesDatosGeneralesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Paciente $paciente)
    {

        return view('pacientedatos.create',
                    ['paciente'=>$paciente,
                     'edit'=>false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Paciente $paciente)
    {
        
       $datosGenerales= new PacientesDatosGenerales;
      
       $datosGenerales->paciente_id=$request->paciente_id;
       $datosGenerales->ocupacion=$request->ocupacion;
       $datosGenerales->convenio=$request->convenio;
       $datosGenerales->calle=$request->calle;
       $datosGenerales->numint=$request->numint;
       $datosGenerales->numext=$request->numext;
       $datosGenerales->cp=$request->cp;
       $datosGenerales->municipio=$request->municipio;
       $datosGenerales->estado=$request->estado;
       $datosGenerales->telcasa=$request->telcasa;
       $datosGenerales->teloficina=$request->teloficina;
       $datosGenerales->telcelular=$request->telcelular;
       $datosGenerales->email=$request->email;
       $datosGenerales->save();

      
       Alert::success('Datos Generales Guardados', 'Continuar');

       return redirect()->route('pacientes.show',['paciente'=>$paciente->id]);//
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        //
    }
}
