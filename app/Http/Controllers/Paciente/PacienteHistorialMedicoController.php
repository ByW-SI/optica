<?php

namespace App\Http\Controllers\Paciente;

use App\Paciente;
use App\PacienteHistorialMedico;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert as Alert;

class PacienteHistorialMedicoController extends Controller
{

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                foreach (Auth::user()->perfil->componentes as $componente)
                    if($componente->modulo->nombre == "pacientes")
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Paciente $paciente)
    {
        return view('pacientemedico.create',
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
        

  $medicos= new PacienteHistorialMedico;
  //------------------------------------------------
  $medicos->paciente_id=$request->paciente_id;
  if($request->alergia=='on'){
    $medicos->alergia='SI';
  }else{
    $medicos->alergia='NO';
  }

  $medicos->cual_alergia=$request->cual_alergia;
  $medicos->tratamiento_alergia=$request->tratamiento_alergia;

  if($request->enfermedad=='on'){

    $medicos->enfermedad='SI';

    foreach($request->enfermedades as $enf){
      if($enf=='Otra'){}
        else{$medicos->enfermedades_array.=",".$enf;}
    }
    }else{
    $medicos->enfermedad='NO';
  }
  
  

  $medicos->enfermedad_cronica=$request->enfermedad_cronica;
   if($request->tratamiento=='on'){
    $medicos->tratamiento='SI';
  }else{
    $medicos->tratamiento='NO';
  }
  $medicos->tratamiento_actual=$request->tratamiento_actual;
  if($request->embarazo=='on'){
    $medicos->embarazo='SI';
  }else{
    $medicos->embarazo='NO';
  }
  $medicos->tiempo_embarazo=$request->tiempo_embarazo;
  //-------------------------------------------------
  $medicos->save();

  Alert::success('Nuevo Historial Guardado', 'Continuar');


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
