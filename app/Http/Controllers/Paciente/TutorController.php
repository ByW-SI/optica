<?php

namespace App\Http\Controllers\Paciente;

use App\Paciente;
use App\Tutor;
use App\PacienteTutor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert as Alert;

class TutorController extends Controller
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
    public function index(Paciente $paciente)
    {
        $arr = [];
        foreach($paciente->relaciones as $relacion)
            $arr[] = $relacion->tutor->id;
        $tutores = Tutor::whereNotIn('id', $arr)->get();
        return view('paciente.tutores.index', ['paciente' => $paciente, 'tutores' => $tutores]);
    }

    public function select(Paciente $paciente, Tutor $tutor)
    {
        return view('paciente.tutores.select', ['paciente' => $paciente, 'tutor' => $tutor]);
    }

    public function bind(Request $request, Paciente $paciente, Tutor $tutor)
    {
        $relacion = new PacienteTutor(['paciente_id' => $paciente->id, 'tutor_id' => $tutor->id, 'relacion' => $request->relacion]);
        $paciente->relaciones()->save($relacion);
        return redirect()->route('pacientes.show', ['paciente' => $paciente->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente, $tutor)
    {
        $tutor = Tutor::find($tutor);
        $relacion = PacienteTutor::find([$paciente->id, $tutor->id])->first();
        return view('paciente.tutores.edit', ['paciente' => $paciente, 'tutor' => $tutor, 'relacion' => $relacion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente, $tutor)
    {
        $tutor = Tutor::find($tutor);
        $relacion = PacienteTutor::find([$paciente->id, $tutor->id])->first();
        $relacion->relacion = $request->relacion;
        $relacion->save();
        return redirect()->route('pacientes.show', ['paciente' => $paciente]);
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