<?php

namespace App\Http\Controllers\Sucursal;

use App\Sucursal;
use UxWeb\SweetAlert\SweetAlert as Alert;
use Illuminate\Http\Request;
use App\Empleado;
use App\EmpleadosDatosLab;
use App\Http\Controllers\Controller;


class SucursalController extends Controller{
 // use Alert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sucursales = Sucursal::get();
        // Alert::message('Robots are working!');
        return view('sucursales.index', ['sucursales'=>$sucursales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sucursal=new Sucursal;
        return view('sucursales.create',['edit'=>false,'sucursal'=>$sucursal]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            
        $sucursal = Sucursal::create($request->all());

Alert::success("Sucursal registrada con exito")->persistent("Cerrar");

return view('sucursales.view',['sucursal'=>$sucursal]);
//return redirect()->route('sucursales.view',['sucursal'=>$sucursal]);
    //Alert::success("Sucursal registrada con exito")->persistent("Cerrar");    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sucursale  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show( $sucursal)
    {
        
        $suc= Sucursal::find($sucursal);
       // dd($suc);
        return view('sucursales.view',['sucursal'=>$suc]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Sucursal $sucursal)
    {
        //
        return view('sucursales.create',['edit'=>true,'sucursal'=>$sucursal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sucursal $sucursal)
    {
        
        $sucursal->update($request->all());
        Alert::success('Proveedor actualizado')->persistent("Cerrar");
        return redirect()->route('sucursales.show',['sucursal'=>$sucursal]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sucursal $sucursal)
    {
         $empleados=array();
    $datos=EmpleadosDatosLab::where('sucursal_id',$sucursal->id)->get();

foreach ($datos as $dato ): 

$empleado=Empleado::where('id',$dato->empleado_id)->get();

array_push($empleados, $empleado);

endforeach;

  

    return view('empleado.index',['empleados'=>$empleados]);

    }




    public function buscar(Request $request){
    // dd($request);
    $query = $request->input('busqueda');
    $wordsquery = explode(' ',$query);
    $sucursales = Sucursal::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
            $q->orWhere('nombre','LIKE',"%$word%")
                ->orWhere('apellidopaterno','LIKE',"%$word%")
                ->orWhere('apellidomaterno','LIKE',"%$word%")
                ->orWhere('razonsocial','LIKE',"%$word%")
                ->orWhere('rfc','LIKE',"%$word%")
                ->orWhere('alias','LIKE',"%$word%")
                ->orWhere('tipopersona','LIKE',"%$word%");
            }
        })->get();
    return view('sucursales.busqueda', ['sucursales'=>$sucursales]);
        

    }



    public function empleados(Sucursal $sucursal)
    {
    
    
    $empleados=array();
    $datos=EmpleadosDatosLab::where('sucursal_id',$sucursal->id)->get();

foreach ($datos as $dato ): 

$empleado=Empleado::where('id',$dato->empleado_id)->get();

array_push($empleados, $empleado);

endforeach;

  

    return view('empleado.index',['empleados'=>$empleados]);
    }


}