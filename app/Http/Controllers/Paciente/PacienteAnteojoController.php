<?php

namespace App\Http\Controllers\Paciente;

use App\Paciente;
use App\Anteojo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class PacienteAnteojoController extends Controller
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


    private function reassign(Request $request) {
        $aux = $aux2 = $aux3 = null;
        if($request->input('tipo_desechable') != null)
            $aux = $request->input('tipo_desechable');
        else if($request->input('tipo_importado') != null)
            $aux = $request->input('tipo_importado');
        else if($request->input('tipo_multifocal') != null)
            $aux = $request->input('tipo_multifocal');
        $newVal[0] = $aux;
        if($request->input('diario') != null)
            $aux2 = $request->input('diario');
        else if($request->input('diario_torico') != null)
            $aux2 = $request->input('diario_torico');
        else if($request->input('diario_multifocal') != null)
            $aux2 = $request->input('diario_multifocal');
        $newVal[1] = $aux2;
        if($request->input('mensual') != null)
            $aux3 = $request->input('mensual');
        else if($request->input('mensual_torico') != null)
            $aux3 = $request->input('mensual_torico');
        else if($request->input('mensual_multifocal') != null)
            $aux3 = $request->input('mensual_multifocal');
        $newVal[2] = $aux3;
        return $newVal;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Paciente $paciente)
    {
        return view('lentillas.create', ['paciente'=>$paciente]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Paciente $paciente)
    {
        $aux = $this->reassign($request);
        $request['duracion'] = $aux[0];
        $request['diario'] = $aux[1];
        $request['mensual'] = $aux[2];
        $anteojo = Anteojo::create($request->except('opciones'));
        $opciones='';

        foreach ($request->opciones as $opcion) {
            $opciones.=$opcion."|";
        }

        $anteojo->opciones=$opciones;
        $anteojo->save();
        
        Alert::success('Historial Creado', 'Se ha Agregado Inforación sobre Anteojos');
        return redirect()->route('pacientes.show',['paciente'=>$paciente->id]);
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
