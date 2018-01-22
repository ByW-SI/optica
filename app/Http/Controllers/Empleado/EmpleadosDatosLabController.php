<?php

namespace App\Http\Controllers\Empleado;

use App\Empleado;
use App\Sucursal;
use App\EmpleadosDatosLab;
use App\Http\Controllers\Controller;
use App\TipoBaja;
use App\TipoContrato;
use App\Area;
use App\Puesto;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert as Alert;

class EmpleadosDatosLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empleado $empleado)
    {
        //
        $datoslab = $empleado->datosLab;

        $area='';
      if($datoslab->area_id==null){
        $area='NO DEFINIDO';
      }else{
        $areas=Area::where('id',$datoslab->area_id)->first();
      $area=$areas->nombre;
      }
      
      $puesto='';
      if($datoslab->puesto_id==null){
        $puesto='NO DEFINIDO';
      }else{
        $puestos=Puesto::where('id',$datoslab->puesto_id)->first();
      $puesto=$puestos->nombre;
      }
        
        // 
        if ($datoslab == null) {
            # code...
            return redirect()->route('empleados.datoslaborales.create',['empleado'=>$empleado]);
        } else {
            $sucursal=Sucursal::find($datoslab->sucursal_id);
            return view('empleadodatoslab.view',[
                'empleado'=>$empleado,
                'datoslab'=>$datoslab,
                'sucursal'=>$sucursal,
                'area'=>$area,
                'puesto'=>$puesto]); 
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empleado $empleado)
    {
        //
        $datoslab = new EmpleadosDatosLab;
        $contratos = TipoContrato::get();
        $bajas = TipoBaja::get();
        $areas =   Area::get();
        $puestos = Puesto::get();
        $sucursales =Sucursal::get();
        $edit = false;
        
        return view('empleadodatoslab.create',[
            'empleado'=>$empleado,
            'bajas'=>$bajas,
            'contratos'=>$contratos,
            'datoslab'=>$datoslab,
            'areas'=>$areas, 
            'puestos'=>$puestos,
            'edit'=>$edit,
            'sucursales'=>$sucursales]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Empleado $empleado)
    {
        //
        $datoslab = new EmpleadosDatosLab;
        $datoslab->empleado_id = $request->empleado_id;

        $datoslab->fechacontratacion = $request->fechacontratacion;
        $datoslab->fechaactualizacion = date("Y-m-d");

        $datoslab->area_id = $request->area_id;
        $datoslab->puesto_id = $request->puesto_id;

        $datoslab->salarionom = $request->salarionom;
        $datoslab->salariodia = $request->salariodia ;
        $datoslab->puesto_inicio = $request->puesto_inicio ;
        $datoslab->periodopaga = $request->periodopaga ;
        $datoslab->prestaciones = $request->prestaciones ;
        $datoslab->regimen = $request->regimen ;
        $datoslab->hentrada = $request->hentrada ;
        $datoslab->hsalida = $request->hsalida ;
        $datoslab->hcomida = $request->hcomida ;
        $datoslab->lugartrabajo = $request->lugartrabajo ;
        $datoslab->banco = $request->banco ;
        $datoslab->cuenta = $request->cuenta ;
        $datoslab->clabe = $request->clabe ;
        $datoslab->fechabaja = $request->fechabaja ;
        $datoslab->tipobaja_id = $request->tipobaja_id ;
        $datoslab->comentariobaja = $request->comentariobaja ;
        $datoslab->contrato_id = $request->contrato_id ;
        $datoslab->sucursal_id = $request->sucursal_id ;
        if ($request->bonopuntualidad == 'on') {
            # code...
            $datoslab->bonopuntualidad = true;
            // dd($request->all());
        } else {
            # code...
            $datoslab->bonopuntualidad = false;
        }
        $datoslab->save();
        Alert::success('Datos laborales creado', 'Siga agregando información al empleado');
        
        return redirect()->route('empleados.datoslaborales.index',['empleado'=>$empleado,'datoslab'=>$datoslab]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        dd($request->sucursal_id);
    $empleados=EmpleadoDatosLab::where('sucursal_id',$request->sucursal_id);
    
    $area='';
      if($datos->area_id==null){
        $area='NO DEFINIDO';
      }else{
        $areas=Area::where('id',$datos->area_id)->first();
      $area=$areas->nombre;
      }
      
      $puesto='';
      if($datos->puesto_id==null){
        $puesto='NO DEFINIDO';
      }else{
        $puestos=Puesto::where('id',$datos->puesto_id)->first();
      $puesto=$areas->nombre;
      }

    return view('empleadodatoslab.view',[
                'empleado'=>$empleado,
                'datoslab'=>$datos,
                'area'=>$area,
                'puesto'=>$puesto
                
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado,$datoslaborale)
    {
        //
        $datoslab = $empleado->datosLab;
        $contratos = TipoContrato::get();
        $bajas = TipoBaja::get();
        $areas =   Area::get();
        $puestos = Puesto::get();
        $sucursales =Sucursal::get();
        $edit = true;
        return view('empleadodatoslab.create',[
            'datoslab'=>$datoslab,
            'bajas'=>$bajas,
            'contratos'=>$contratos,
            'empleado'=>$empleado,
            'areas'=>$areas, 
            'puestos'=>$puestos,
            'edit'=>$edit,
            'sucursales'=>$sucursales]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado, $datoslaborale)
    {
        //
        $datoslab = EmpleadosDatosLab::findOrFail($datoslaborale);

        $datoslab->fechacontratacion = $request->fechacontratacion;
        
        $datoslab->fechaactualizacion = date("Y-m-d");

        $datoslab->area_id = $request->area_id;
         //dd($request->all());
        $datoslab->puesto_id = $request->puesto_id;


        $datoslab->salarionom = $request->salarionom;
        $datoslab->salariodia = $request->salariodia ;
        $datoslab->puesto_inicio = $request->puesto_inicio ;
        $datoslab->periodopaga = $request->periodopaga ;
        $datoslab->prestaciones = $request->prestaciones ;
        $datoslab->regimen = $request->regimen ;
        $datoslab->hentrada = $request->hentrada ;
        $datoslab->hsalida = $request->hsalida ;
        $datoslab->hcomida = $request->hcomida ;
        $datoslab->lugartrabajo = $request->lugartrabajo ;
        $datoslab->banco = $request->banco ;
        $datoslab->cuenta = $request->cuenta ;
        $datoslab->clabe = $request->clabe ;
        $datoslab->fechabaja = $request->fechabaja ;
        $datoslab->tipobaja_id = $request->tipobaja_id ;
        $datoslab->comentariobaja = $request->comentariobaja ;
        $datoslab->contrato_id = $request->contrato_id ;
        $datoslab->sucursal_id = $request->sucursal_id ;

        if ($request->bonopuntualidad == 'on') {
            # code...
            $datoslab->bonopuntualidad = true;
            // dd($request->all());
        } else {
            # code...
            $datoslab->bonopuntualidad = false;
        }
        $datoslab->update();
        Alert::success('Datos laborales actualizados');
        return redirect()->route('empleados.datoslaborales.index',['empleado'=>$empleado,'datoslab'=>$datoslab]);
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
