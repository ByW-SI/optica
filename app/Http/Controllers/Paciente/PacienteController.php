<?php

namespace App\Http\Controllers\Paciente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paciente;
use UxWeb\SweetAlert\SweetAlert as Alert;

class PacienteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes=Paciente::sortable()->paginate(10);
        return view('paciente.index',['pacientes'=>$pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        // Alert::message('Welcome back!');
        return view('paciente.create',
                   ['edit'=>false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->identificador);
        $ident=Paciente::where('identificador',$request->identificador)->get();

         if (count($ident)!=0) {
            # code...
            Alert::error('Error', 'Ya se ha Registrado un paciente con le mismo ID')->persistent("Cerrar");
           
            return redirect()->back();

             
        }
        else {
            $paciente = Paciente::create($request->all());
            Alert::success('Paciente Creado', 'Siga agregando información del Paciente');
            if($paciente->generales==null){

              return redirect()->route('pacientes.datosgenerales.create',['paciente'=>$paciente]);
              
            }else{
                    return redirect()->route('pacientes.show',['paciente'=>$paciente->id]);
                }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente=Paciente::where('id',$id)->first();
       return view('paciente.view',['paciente'=>$paciente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $paciente=Paciente::where('id',$id)->first();

       return view('paciente.create',
                  ['paciente'=>$paciente,
                   'edit'=>true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paciente=Paciente::where('id',$id)->first();
        $paciente->update($request->all());
        Alert::success('Datos de Paciente Actualizados');
        return view('paciente.view',['paciente'=>$paciente]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function buscar(Request $request){
    
    $query = $request->input('busqueda');
    $wordsquery = explode(' ',$query);
    $pacientes= Paciente::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
              $q->orWhere('nombre','LIKE',"%$word%")
                ->orWhere('appaterno','LIKE',"%$word%")
                ->orWhere('apmaterno','LIKE',"%$word%")
                ->orWhere('identificador','LIKE',"%$word%");
                //->orWhere('ed','LIKE',"%$word%");
                
            }
        })->get();
    return view('paciente.busqueda', ['pacientes'=>$pacientes]);
        

    }
}
