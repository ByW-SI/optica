<?php

namespace App\Http\Controllers\Personal;

use App\Personal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    // use Alert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $personals = Personal::sortable()->paginate(10);
        
        return view('clientes.index', ['personals'=>$personals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.create');
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
        $personal = Personal::where('rfc',$request->rfc)->get();
        // dd(count($personal));
        if (count($personal) != 0) {
            # code...
            // alert()->error('Error Message', 'Optional Title');
            // return redirect()->route('clientes.create');
            return redirect()->back()->with('errors', 'El RFC ya existe');
        } else {
            # code...
            $cliente = Personal::create($request->all());
            return redirect()->route('clientes.direccionfisica.create',['personal'=>$cliente]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $cliente)
    {
        return view('clientes.view',['personal'=>$cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $cliente)
    {
        //
        return view('clientes.edit',['personal'=>$cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $cliente)
    {
        //
        $cliente->update($request->all());
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $cliente)
    {
        //
    }
    public function buscar(Request $request){
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        
        $clientes = Personal::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
            $q->orWhere('nombre','LIKE',"%$word%")
                ->orWhere('apellidopaterno','LIKE',"%$word%")
                ->orWhere('apellidomaterno','LIKE',"%$word%")
                ->orWhere('razonsocial','LIKE','%$word%')
                ->orWhere('rfc','LIKE',"%$word%")
                ->orWhere('alias','LIKE',"%$word%")
                ->orWhere('tipopersona','LIKE',"%$word%");
            }
        })->paginate(10);
        // $clientes = Personal::sortable()->where('nombre','LIKE',"%$query%")
        // ->orWhere('apellidopaterno','LIKE',"%$query%")
        // ->orWhere('apellidomaterno','LIKE',"%$query%")
        // ->orWhere('razonsocial','LIKE','%$query%')
        // ->orWhere('rfc','LIKE',"%$query%")
        // ->orWhere('alias','LIKE',"%$query%")
        // ->orWhere('tipopersona','LIKE',"%$query%")
        // ->paginate(10);
        return view('clientes.index',['personals'=>$clientes]);
    }
}
