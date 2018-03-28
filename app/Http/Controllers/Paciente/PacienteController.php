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
        //
        return view('paciente.index');
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
        return view('paciente.create');
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
            return redirect()->route('pacientes.show',['paciente'=>$paciente->id]);//->with('success','Paciente Creado');
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
        //
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
        //
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
}
