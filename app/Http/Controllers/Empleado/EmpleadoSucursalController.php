<?php

namespace App\Http\Controllers\Empleado;

use App\Empleado;
use App\Sucursal;
use App\Area;
use App\Puesto;
use App\EmpleadosDatosLab;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class EmpleadoSucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
    $empleados=array();
   
    $datos=EmpleadosDatosLab::orderBy('updated_at','desc')->get()
                            ->where('sucursal_id',$request->sucursal)
                            //->where('tipobaja_id',null)
                            ->unique('empleado_id');
    // dd($datos);
    $areas=Area::get();
    $puestos=Puesto::get();
   
    foreach ($datos as $dato ): 

    if($dato->tipobaja_id!=null||$dato->sucursal_id!=null){
    $empleado=$dato->empleado;
     
     array_push($empleados, $empleado);
    }
     

    endforeach;

      
// dd($empleados);
    return view('sucursales.show',[
        'empleados'=>$empleados,
        'areas'=>$areas,
        'puestos'=>$puestos
         ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }



}
