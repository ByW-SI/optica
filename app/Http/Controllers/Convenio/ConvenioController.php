<?php

namespace App\Http\Controllers\Convenio;

use App\Convenio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;


class ConvenioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $convenios = Convenio::sortable()->paginate(5);
        return view('convenios.index',['convenios'=>$convenios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('convenios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $convenio = Convenio::where('rfc',$request->rfc)->get();
        // dd(count($convenio));
        if (count($convenio) != 0) {
            # code...
            // alert()->error('Error Message', 'Optional Title');
            // return redirect()->route('clientes.create');
            Alert::error("Error, El RFC ya existe")->persistent("Cerrar");
            return redirect()->back()->with('errors', 'El RFC ya existe');
        } else {
            # code...
            $convenio = Convenio::create($request->all());
            Alert::success("Convenio creado con exito, sigue agregando información")->persistent("Cerrar");
            return redirect()->route('convenios.direccionfisica.create',['convenio'=>$convenio]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function show(Convenio $convenio)
    {
        //
        return view('convenios.view',['convenio'=>$convenio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function edit(Convenio $convenio)
    {
        //
         return view('convenios.edit',['convenio'=>$convenio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convenio $convenio)
    {
        //

        $convenio->update($request->all());
        Alert::success('Convenio actualizado')->persistent("Cerrar");
        return redirect()->route('convenios.show',['convenio'=>$convenio]);
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
    public function buscar(Request $request){
    // dd($request);
    $query = $request->input('busqueda');
    $wordsquery = explode(' ',$query);
    $convenios = Convenio::where(function($q) use($wordsquery){
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
    return view('convenios.busqueda', ['convenios'=>$convenios]);
        

    }
}
