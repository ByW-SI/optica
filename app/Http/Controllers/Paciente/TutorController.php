<?php

namespace App\Http\Controllers\Paciente;

use App\Paciente;
use App\Tutor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class TutorController extends Controller
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
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Paciente $paciente)
    {
        
        $tutor=new Tutor;
        $tutor->create($request->all());
         Alert::success('Nuevo Tutor Guardado', 'Continuar');


       return redirect()->route('pacientes.show',
                               ['paciente'=>$paciente->id]);
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
        $tutor=Tutor::where('id',$request->id)->first();
        $tutor->nombre=$request->nombre;
        $tutor->appaterno=$request->appaterno;
        $tutor->apmaterno=$request->apmaterno;
        $tutor->edad=$request->edad;
        $tutor->fecha_nacimiento=$request->fecha_nacimiento;
        $tutor->sexo=$request->sexo;
        $tutor->relacion=$request->relacion;
        $tutor->tel_casa=$request->tel_casa;
        $tutor->tel_cel=$request->tel_cel;
        $tutor->save();
        Alert::success('Información Editada', 'Continuar');
        return redirect()->route('pacientes.show',
                               ['paciente'=>$paciente->id]);

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
