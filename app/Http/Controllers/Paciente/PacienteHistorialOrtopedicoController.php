<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Paciente;
use App\PacienteOrtopedia;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert as Alert;


class PacienteHistorialOrtopedicoController extends Controller
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
        return view('pacienteortopedia.create', ['paciente' => $paciente]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Paciente $paciente)
    {
        $orto = new PacienteOrtopedia();
        $orto->fecha = Carbon::now()->toDateString();
        $orto->cita = $request->citaradio == 'si';
        $orto->paciente_id = $paciente->id;
        $orto->diagnostico = $request->diagnostico;
        $orto->recomendacion = $request->recomendacion;
        $orto->tratamiento = $request->tipo_tratamiento;
        $orto->clinica = $request->clinica;
        $orto->tipo = $request->tratamiento;
        $orto->medida =  $request->medida;
        $orto->plantilla = $request->plantilla;
        $orto->medida_plant =  $request->medida_plant;
        if($request->image != null) {
            $orto->path_image = Storage::putFileAs('ortopedia/receta/' . $paciente->id, $request->file('image'), Carbon::now()->toDateString() . '.jpg');
        } else if($request->image2 != null) {
            $orto->path_image = Storage::putFileAs('ortopedia/cita/' . $paciente->id, $request->file('image2'), Carbon::now()->toDateString() . '.jpg');
        } else {
            $orto->path_image = 'https://upmaa-pennmuseum.netdna-ssl.com/collections/images/image_not_available_300.jpg';
        }
        $orto->save();

        return redirect()->route('pacientes.show', ['paciente' => $paciente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PacienteOrtopedia  $pacienteOrtopedia
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente, $id)
    {
        $cita = PacienteOrtopedia::find($id);
        return view('pacienteortopedia.view', ['paciente' => $paciente, 'cita' => $cita]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PacienteOrtopedia  $pacienteOrtopedia
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente, $id)
    {
        $cita = PacienteOrtopedia::find($id);
        return view('pacienteortopedia.edit', ['paciente' => $paciente, 'cita' => $cita]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PacienteOrtopedia  $pacienteOrtopedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente, $id)
    {
        $orto = PacienteOrtopedia::find($id);
        $orto->fecha = Carbon::now()->toDateString();
        $orto->cita = $request->citaradio == 'si';
        $orto->paciente_id = $paciente->id;
        $orto->diagnostico = $request->diagnostico;
        $orto->recomendacion = $request->recomendacion;
        $orto->tratamiento = $request->tipo_tratamiento;
        $orto->clinica = $request->clinica;
        $orto->tipo = $request->tratamiento;
        $orto->medida =  $request->medida;
        $orto->plantilla = $request->plantilla;
        $orto->medida_plant =  $request->medida_plant;
        if($request->image != null) {
            $orto->path_image = Storage::putFileAs('ortopedia/receta/' . $paciente->id, $request->file('image'), Carbon::now()->toDateString() . '.jpg');
        } else if($request->image2 != null) {
            $orto->path_image = Storage::putFileAs('ortopedia/cita/' . $paciente->id, $request->file('image2'), Carbon::now()->toDateString() . '.jpg');
        } else {
        }
        $orto->save();

        return view('pacienteortopedia.view', ['paciente' => $paciente, 'cita' => $orto]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PacienteOrtopedia  $pacienteOrtopedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(PacienteOrtopedia $pacienteOrtopedia)
    {
        //
    }
}
