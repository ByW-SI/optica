<?php

namespace App\Http\Controllers\Convenio;

use App\Convenio;
use App\Http\Controllers\Controller;
use App\TipoConvenio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert as Alert;

class ConvenioTipoConvenioController extends Controller
{
    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                foreach (Auth::user()->perfil->componentes as $componente)
                    if($componente->modulo->nombre == "sucursales")
                        return $next($request);
                return redirect()->route('denegado');
            } else
                return redirect()->route('login');
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Convenio $convenio)
    {
        //
        // dd($convenio);
        return view('convenios.tipo.create',['convenio'=>$convenio]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Convenio $convenio)
    {
        //
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Convenio $convenio, Request $request)
    {
        if($request->convenio_id == $convenio->id){
            $rules = [
                'nombre'=>'required',
                'descripcion'=>'required',
                'desc_prod'=>'nullable|numeric|min:0',
                'num_prod'=>'nullable|numeric|min:0',
                'desc_cita'=>'nullable|numeric|min:0',
                'num_cita'=>'nullable|numeric|min:0',
                'valido_inicio'=>'required|date',
                'valido_fin'=>'required|date',
                'aplican'=>'required|string',
                'convenio_id'=>'required|numeric'

            ];
            $this->validate($request, $rules);
            $tipoconvenio = TipoConvenio::create($request->all());
            Alert::success("Convenio ".$tipoconvenio->nombre." fue creado con éxito")->persistent("Cerrar");
            return redirect()->route('convenios.tipoconvenios.index', ['convenio' => $convenio]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function show(Convenio $convenio, TipoConvenio $tipoconvenio)
    {
        //
        return view('convenios.tipo.show',['convenio'=>$convenio,'tipoconvenio'=>$tipoconvenio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function edit(Convenio $convenio, TipoConvenio $tipoconvenio)
    {
        //
        // dd($tipoconvenio);
        return view('convenios.tipo.edit', ['convenio'=>$convenio,'tipoconvenio'=>$tipoconvenio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convenio $convenio, TipoConvenio $tipoconvenio)
    {
        //
        $rules=[
            'nombre'=>'required',
            'descripcion'=>'required',
            'desc_prod'=>'nullable|numeric|min:0',
            'num_prod'=>'nullable|numeric|min:0',
            'desc_cita'=>'nullable|numeric|min:0',
            'num_cita'=>'nullable|numeric|min:0',
            'valido_inicio'=>'required|date',
            'valido_fin'=>'required|date',
            'aplican'=>'required|string',

        ];
        $this->validate($request,$rules);
        $tipoconvenio->update($request->all());
        Alert::success("Convenio ".$tipoconvenio->nombre." fue actualizado con éxito")->persistent("Cerrar");
        return redirect()->route('convenios.tipoconvenios.index',['convenio'=>$convenio]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convenio $convenio)
    {
        //
    }
}
