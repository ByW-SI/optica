<?php

namespace App\Http\Controllers\Provedor;


use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Provedor;
use App\DatosGeneralesProvedor;
use App\FormaContacto;
use App\Giro;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProvedorDatosGeneralesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Provedor $provedore, DatosGeneralesProvedor $datosgenerale){
        //
        $datos = $provedore->datosGeneralesProvedor;
        // dd($datos);
        if ($datos == null) {
            # code...
            return redirect()->route('provedores.datosgenerales.create',['provedore'=>$provedore]);
        }
        elseif ($datos != null){
            $giro = Giro::find($datos->giro_id);
            // dd($giro);
            $formaContacto = FormaContacto::find($datos->forma_contacto_id);
            // dd($giro);
            return view('datosgeneralesprovedores.view', ['provedore'=>$provedore, 'datos'=>$datos, 'giro'=>$giro, 'formaContacto'=>$formaContacto]);
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Provedor $provedore)
    {
        //
        $giros = Giro::get();
        $formaContactos = FormaContacto::get();
        // dd($giros);}
        return view('datosgeneralesprovedores.create',['provedore'=>$provedore, 'giros'=>$giros, 'formaContactos'=>$formaContactos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Provedor $provedore)
    {
        //
        // dd($request->all());
        $datos = DatosGeneralesProvedor::create($request->all());
        Alert::success('Datos generales creados con éxito');
        // dd('listo');
        return redirect()->route('provedores.datosgenerales.index',['provedore'=>$provedore]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Provedor $provedore, DatosGeneralesProvedor $datosgenerale)
    {
        //
        $datos = $provedore->datosGeneralesProvedor;
        // dd($datos);
        if ($datos == null) {
            # code...
            return redirect()->route('provedores.datosgenerales.create',['provedore'=>$provedore]);
        }
        elseif ($datos != null){
            $giro = Giro::find($datos->giro_id);
            // dd($giro);
            $formaContacto = FormaContacto::find($datos->forma_contacto_id);
            // dd($giro);
            return view('datosgeneralesprovedores.view', ['provedore'=>$provedore, 'datos'=>$datos, 'giro'=>$giro, 'formaContacto'=>$formaContacto]);
            
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Provedor $provedore)
    {
        //
        $datos = $provedore->datosGeneralesProvedor;
        $giros = Giro::get();
        $formaContactos = FormaContacto::get();
        // dd($datos);
        return view('datosgeneralesprovedores.edit',['provedore'=>$provedore, 'datos'=>$datos, 'giros'=>$giros, 'formaContactos'=>$formaContactos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provedor $provedore, DatosGeneralesProvedor $datosgenerale)
    {
        //
        // dd($datosgenerale);
        $datos =$provedore->datosGeneralesProvedor->update($request->all());
        $giro = Giro::find($datosgenerale->giro_id);
        $formaContacto = FormaContacto::find($datosgenerale->forma_contacto_id);
        Alert::success('Datos generales actualizados con éxito');
        // dd('listo');
        return redirect()->route('provedores.datosgenerales.index',['provedore'=>$provedore]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provedor $provedore)
    {
        //
    }
}
