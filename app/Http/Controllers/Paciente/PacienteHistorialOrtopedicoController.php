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
                $user = Auth::user();
                $modulos = $user->perfil->modulos;
                foreach ($modulos as $modulo) {
                    if($modulo->nombre == "pacientes")
                        return $next($request);
                }
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
        $ult_Cita = $paciente->ortopedias->last();
        if($ult_Cita && $ult_Cita->fecha == Carbon::now()->toDateString()) {
            if($request->citaradio == "si") {
                if($request->image) {
                    $rules = [
                        'image' => 'image|mimes:jpg,jpeg,png',
                        'diagnostico' => 'required|max:1000',
                        'tipo_tratamiento' => 'required|max:1000',
                        'tratamiento' => 'required',
                        'medida' => 'required|numeric',
                        'plantilla' => 'required',
                        'medida_plant' => 'required|numeric',

                    ];
                    $this->validate($request, $rules);
                    $path_image = $request->image->storeAs('/ortopedia/cita/' . $paciente->id . '/' . Carbon::now()->toDateString() . '.jpg');
                    $ult_Cita->update([
                        'fecha' => Carbon::now()->toDateString(),
                        'cita' => true,
                        'diagnostico' => $request->diagnostico,
                        'recomendacion' => $request->recomendacion,
                        'tratamiento' => $request->tipo_tratamiento,
                        'tipo' => $request->tratamiento,
                        'medida' => $request->medida,
                        'plantilla' => $request->plantilla,
                        'medida_plant' => $request->medida_plant,
                        'path_image' => $path_image,
                        'clinica' => null
                    ]);
                    Alert::success('Cita actualizada', 'La cita se a actualizado correctamente')->persistent("Cerrar");
                } else {
                    $rules=[
                        'diagnostico' => 'required|max:1000',
                        'tipo_tratamiento' => 'required|max:1000',
                        'tratamiento' => 'required',
                        'medida' => 'required|numeric',
                        'plantilla' => 'required',
                        'medida_plant' => 'required|numeric',

                    ];
                    $this->validate($request, $rules);
                    $ult_Cita->update([
                        'fecha' => Carbon::now()->toDateString(),
                        'cita' => true,
                        'diagnostico' => $request->diagnostico,
                        'recomendacion' => $request->recomendacion,
                        'tratamiento' => $request->tipo_tratamiento,
                        'tipo' => $request->tratamiento,
                        'medida' => $request->medida,
                        'plantilla' => $request->plantilla,
                        'medida_plant' => $request->medida_plant,
                        'clinica' => null
                    ]);
                    Alert::success('Cita actualizada', 'La cita se a actualizado correctamente')->persistent("Cerrar");
                }

            } else {
                if($request->image) {
                    $rules=[
                        'image' => 'image|mimes:jpg,jpeg,png',
                        'clinica' => 'required',
                        'tratamiento' => 'required',
                        'medida' => 'required|numeric',
                        'plantilla' => 'required',
                        'medida_plant' => 'required|numeric',

                    ];
                    $this->validate($request, $rules);
                    $path_image = $request->image->storeAs('/ortopedia/receta/' . $paciente->id . '/' - Carbon::now()->toDateString() . '.jpg');
                    $ult_Cita->update([
                        'fecha' => Carbon::now()->toDateString(),
                        'paciente_id' => $paciente->id,
                        'cita' => false,
                        'diagnostico' => null,
                        'recomendacion' => null,
                        'tratamiento' => null,
                        'clinica' => $request->clinica,
                        'tipo' => $request->tratamiento,
                        'medida' => $request->medida,
                        'plantilla' => $request->plantilla,
                        'medida_plant' => $request->medida_plant,
                        'path_image' => $path_image

                    ]);
                    Alert::success('Receta actualizada', 'La receta se a actualizado correctamente')->persistent("Cerrar");
                } else {
                    $rules=[
                        'clinica' => 'required',
                        'tratamiento' => 'required',
                        'medida' => 'required|numeric',
                        'plantilla' => 'required',
                        'medida_plant' => 'required|numeric',
                    ];
                    $this->validate($request, $rules);
                    $ult_Cita->update([
                        'fecha' => Carbon::now()->toDateString(),
                        'paciente_id' => $paciente->id,
                        'cita' => false,
                        'diagnostico' => null,
                        'recomendacion '=> null,
                        'tratamiento' => null,
                        'clinica' => $request->clinica,
                        'tipo'=> $request->tratamiento,
                        'medida' => $request->medida,
                        'plantilla' =>  $request->plantilla,
                        'medida_plant' => $request->medida_plant,
                    ]);
                    Alert::success('Receta actualizada', 'La receta se a actualizado correctamente')->persistent("Cerrar");
                }
            }

        } else {

            // dd($request->all());
            if ($request->citaradio == "si") {
                $rules=[
                        'image'=>'image|mimes:jpg,jpeg,png',
                        'diagnostico' => 'required|max:1000',
                        'tipo_tratamiento' => 'required|max:1000',
                        'tratamiento' => 'required',
                        'medida' => 'required|numeric',
                        'plantilla' => 'required',
                        'medida_plant' => 'required|numeric',

                    ];
                $this->validate($request,$rules);

                $path_image = Storage::putFileAs('ortopedia/cita/'.$paciente->id, $request->file('image'),Carbon::now()->toDateString().'.jpg');
                // $request->file('image')->storeAs(Carbon::now()->toDateString().'.jpg');
                PacienteOrtopedia::create([
                    'fecha'=>Carbon::now()->toDateString(),
                    'paciente_id'=> $paciente->id,
                    'cita'=>true,
                    'diagnostico'=>$request->diagnostico,
                    'recomendacion'=>$request->recomendacion,
                    'tratamiento'=>$request->tipo_tratamiento,
                    'tipo'=>$request->tratamiento,
                    'medida'=>$request->medida,
                    'plantilla'=>$request->plantilla,
                    'medida_plant'=>$request->medida_plant,
                    'path_image'=>$path_image
                ]);

                Alert::success('Cita registrada', 'La cita se a registrado correctamente')->persistent("Cerrar");
                
            } else {
                 $rules=[
                        'image'=>'image|mimes:jpg,jpeg,png',
                        'clinica'=>'required',
                        'tratamiento' => 'required',
                        'medida' => 'required|numeric',
                        'plantilla' => 'required',
                        'medida_plant' => 'required|numeric',

                    ];
                $this->validate($request,$rules);
                $path_image = $request->image->storeAs('/ortopedia/receta/'.$paciente->id.'/'.Carbon::now()->toDateString().'.jpg','public');
                PacienteOrtopedia::create([
                    'fecha'=>Carbon::now()->toDateString(),
                    'paciente_id'=> $paciente->id,
                    'cita'=>false,
                    'clinica'=>$request->clinica,
                    'tipo'=>$request->tratamiento,
                    'medida'=>$request->medida,
                    'plantilla'=>$request->plantilla,
                    'medida_plant'=>$request->medida_plant,
                    'path_image'=>$path_image

                ]);
                Alert::success('Receta agregada', 'La receta se a registrado correctamente')->persistent("Cerrar");
           
                
            }
        }

        return redirect()->route('pacientes.show',['paciente'=>$paciente]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PacienteOrtopedia  $pacienteOrtopedia
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        return view('pacienteortopedia.view', ['paciente' => $paciente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PacienteOrtopedia  $pacienteOrtopedia
     * @return \Illuminate\Http\Response
     */
    public function edit(PacienteOrtopedia $pacienteOrtopedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PacienteOrtopedia  $pacienteOrtopedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PacienteOrtopedia $pacienteOrtopedia)
    {
        //
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
