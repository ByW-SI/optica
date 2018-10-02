<?php

namespace App\Http\Controllers\Paciente;

use App\Paciente;
use App\Convenio;
use App\PacientesDatosGenerales;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert as Alert;

class PacientesDatosGeneralesController extends Controller
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
        $convenios = Convenio::get();
        // dd($paciente->generales);
        return view('pacientedatos.create',
                    ['paciente'=>$paciente,
                     'edit'=>false, 'convenios' => $convenios]);
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
       $datosGenerales->trabajo = $request->trabajo;
       $datosGenerales->servicio = $request->servicio;
       $datosGenerales->save();

      
       Alert::success('Datos Generales Guardados', 'Continuar');

       return redirect()->route('pacientes.show',
                               ['paciente'=>$paciente->id]);//
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
        
        $convenios = Convenio::get();
        return view('pacientedatos.create',
                    ['paciente'=>$paciente,
                     'edit'=>true, 'convenios' => $convenios]);
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
       $datosGenerales= $paciente->generales;
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
       $datosGenerales->trabajo = $request->trabajo;
       $datosGenerales->servicio = $request->servicio;
       $datosGenerales->save();

        Alert::success('Datos Generales Guardados', 'Continuar');

       return redirect()->route('pacientes.show',['paciente'=>$paciente->id]);//
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
