<?php

namespace App\Http\Controllers\Almacen;

use App\Almacen;
use UxWeb\SweetAlert\SweetAlert as Alert;
use Illuminate\Http\Request;
use App\Empleado;
use App\EmpleadosDatosLab;
use App\Http\Controllers\Controller;


class AlmacenController extends Controller{
 // use Alert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $almacenes = Almacen::get();
       
        return view('almacenes.index', ['almacenes'=>$almacenes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $almacen=new Almacen;
        return view('almacenes.create',['edit'=>false,'almacen'=>$almacen]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            
        $almacen = Almacen::create($request->all());

Alert::success("Almacen registrada con exito")->persistent("Cerrar");

return view('almacenes.view',['almacen'=>$almacen]);
//return redirect()->route('almacenes.view',['almacen'=>$almacen]);
    //Alert::success("Almacen registrada con exito")->persistent("Cerrar");    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Almacene  $almacen
     * @return \Illuminate\Http\Response
     */
    public function show( $almacen)
    {
        
        $alm= Almacen::find($almacen);
       // dd($alm);
        return view('almacenes.view',['almacen'=>$alm]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit( $almacen)
    {
        $alm= Almacen::find($almacen);
        return view('almacenes.create',['edit'=>true,'almacen'=>$alm]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $almacen)
    {
        $alm= Almacen::find($almacen);
        $alm->update($request->all());
        Alert::success('Alamacen actualizado')->persistent("Cerrar");
        return redirect()->route('almacens.show',['almacen'=>$almacen]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy($almacen)
    {
        

    }




    public function buscar( $almacen){
   
        

    }



     public function getAlmacen(){
        $almacenes = Almacen::get();
        return view('precargas.select',['precargas'=>$almacenes]);
    }
   


}