<?php

namespace App\Http\Controllers\Paciente;

use App\Paciente;
use App\PacienteOcular;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class PacienteHistorialOcularController extends Controller
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
        return view('pacienteocular.create',
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
        //dd($request->except('padecimientos_array','padec_text',''));
        
        $oculars=new PacienteOcular();
    //***************************************************************
        $oculars->paciente_id=$request->paciente_id;
        $oculars->cirugias=$request->cirugias;
        $oculars->padecimientos=$request->padecimientos;
        $oculars->cirug_1=$request->cirug_1;
        $oculars->cirug_2=$request->cirug_2;
        $oculars->cirug_3=$request->cirug_3;
        //-------------------------------------------
        $padecimientos='';
        if($request->padecimientos_array!=null){
            foreach($request->padecimientos_array as $p){
            $padecimientos.=$p.",";
          }
        }
        
        $padecimientos.=$request->padec_text;
        $oculars->padecimientos_array=$padecimientos;
        //-------------------------------------------
        $oculars->problema_visual=$request->problema_visual;
        $oculars->usuario_lentes=$request->usuario_lentes;
        $oculars->edad_lentes=$request->edad_lentes;
        $oculars->molestia_luz=$request->molestia_luz;
        $oculars->usuario_computadora=$request->usuario_computadora;
        //--------------------------------------------
        $antecedentes='';
        if($request->antecedentes_array!=null){
           foreach($request->antecedentes_array as $p){
            $antecedentes.=$p.",";
           }
        }
        $antecedentes.=$request->antecedente_text;
        $oculars->antecedente_array=$antecedentes;
        //--------------------------------------------
        $oculars->snellen_1=$request->snellen_1;
        $oculars->snellen_2=$request->snellen_2;
        $oculars->dnp_od_lejos=$request->dnp_od_lejos;
        $oculars->dnp_od_cerca=$request->dnp_od_cerca;
        $oculars->dnp_oi_lejos=$request->dnp_oi_lejos;
        $oculars->dnp_oi_cerca=$request->dnp_oi_cerca;

        $oculars->unilateral_lejos=$request->unilateral_lejos;
        $oculars->unilateral_cerca=$request->unilateral_cerca;
        $oculars->alternamente_lejos=$request->alternamente_lejos;
        $oculars->alternamente_cerca=$request->alternamente_cerca;

        $oculars->queratometria_od_plana=$request->queratometria_od_plana;
        $oculars->queratometria_od_curva=$request->queratometria_od_curva;
        $oculars->queratometria_od_eje=$request->queratometria_od_eje;
        $oculars->queratometria_oi_plana=$request->queratometria_oi_plana;
        $oculars->queratometria_oi_curva=$request->queratometria_oi_curva;
        $oculars->queratometria_oi_eje=$request->queratometria_oi_eje;

        $oculars->vision_estereo=$request->vision_estereo;

        $oculars->papila_od=$request->papila_od;
        $oculars->papila_oi=$request->papila_oi;
        $oculars->excavacion_od=$request->excavacion_od;
        $oculars->excavacion_oi=$request->excavacion_oi;
        $oculars->radio_od=$request->radio_od;
        $oculars->radio_oi=$request->radio_oi;
        $oculars->profundidad_od=$request->profundidad_od;
        $oculars->profundidad_oi=$request->profundidad_oi;
        $oculars->vasos_od=$request->vasos_od;
        $oculars->vasos_oi=$request->vasos_oi;
        $oculars->rel_od=$request->rel_od;
        $oculars->rel_oi=$request->rel_oi;
        $oculars->macula_od=$request->macula_od;
        $oculars->macula_oi=$request->macula_oi;
        $oculars->reflejo_od=$request->reflejo_od;
        $oculars->reflejo_oi=$request->reflejo_oi;
        $oculars->retina_od=$request->retina_od;
        $oculars->retina_oi=$request->retina_oi;

        $oculars->nombre_archivo='Próximamente';
        $oculars->url_archivo='Próximamente';

        $oculars->anexos=$request->anexos;
        $oculars->fecha_tono=$request->fecha_tono;
        $oculars->hora_tono=$request->hora_tono;

        $oculars->tonometria_od=$request->tonometria_od;
        $oculars->tonometria_oi=$request->tonometria_oi;

        $oculars->esf_od=$request->esf_od;
        $oculars->esf_oi=$request->esf_oi;
        $oculars->cil_od=$request->cil_od;
        $oculars->cil_oi=$request->cil_oi;
        $oculars->eje_od=$request->eje_od;
        $oculars->eje_oi=$request->eje_oi;
        $oculars->add_od=$request->add_od;
        $oculars->add_oi=$request->add_oi;
        $oculars->av_od=$request->av_od;
        $oculars->av_oi=$request->av_oi;

        $oculars->refractivo=$request->refractivo;
        $oculars->patologico=$request->patologico;
        $oculars->binocularidad=$request->binocularidad;
        $oculars->optometrista=$request->optometrista;
        $oculars->tipo_anteojo=$request->tipo_anteojo;

        $oculars->tipo_lente=$request->tipo_lente;
        $oculars->monofocal=$request->monofocal;
        $oculars->bifocal=$request->bifocal;
        $oculars->material=$request->material;
        $oculars->tratamiento=$request->tratamiento;
        $oculars->antirreflejante=$request->antirreflejante;
        $oculars->fotocromatico=$request->fotocromatico;
        $oculars->polarizado=$request->polarizado;

        $oculars->tipo_antirreflejante=$request->tipo_antirreflejante;
        $oculars->tipo_fotocromatico=$request->tipo_fotocromatico;
        $oculars->tipo_polarizado=$request->tipo_polarizado;

        $oculars->anti_premium=$request->anti_premium;
        $oculars->foto_premium=$request->foto_premium;
        //-------------------------------------------
        $operaciones_doc='';
        foreach($request->opciones as $p){
            $operaciones_doc.=$p.",";
        }
        
        $oculars->operacion_documento=$operaciones_doc;

    //***************************************************************
       
        $oculars->save();
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
