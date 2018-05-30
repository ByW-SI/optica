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
        
        
        $oculars=PacienteOcular::create($request->except('padecimientos_array',
                                                         'padec_text',
                                                         'antecedentes_array',
                                                         'antecedente_text',
                                                         'opciones',
                                                         'archivo_imagen'));
    
        $padecimientos='';

        if($request->padecimientos_array!=null){
            foreach($request->padecimientos_array as $p){
            if($p=='Otra'){
                 $padecimientos.=$request->padec_text;
            }else{
                $padecimientos.=$p.",";
            }
            
          }
        }
        
       
       
        $antecedentes='';
        if($request->antecedentes_array!=null){
           foreach($request->antecedentes_array as $p){
             if($p=='Otra'){
                 $antecedentes.=$request->antecedente_text;
            }else{
                $antecedentes.=$p.",";
            }
           }
        }
       
       
        //-------------------------------------------
        $operaciones='';
        foreach($request->opciones as $p){
            $operaciones.=$p.",";
        }
        
        if($padecimientos!=null || $padecimientos!=''){

            $oculars->padecimientos_array=$padecimientos;
        }else{
            $oculars->padecimientos_array='NINGUNO';
        }

        if($antecedentes!=null || $antecedentes!=''){

            $oculars->antecedente_array=$antecedentes;
        }else{
            $oculars->antecedente_array='NINGUNO';
        }

        if($operaciones!=null || $operaciones!=''){

            $oculars->opciones=$operaciones;
        }else{
            $oculars->opciones='NINGUNO';
        }
        
        $path='ImagenOcular/'.$paciente->identificador;
        if($request->file('archivo_imagen')!=null){
            $oculars->archivo_imagen=$request->file('archivo_imagen')->store($path);
        }
        
        

        $oculars->save();
    //***************************************************************/
       
        //
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
