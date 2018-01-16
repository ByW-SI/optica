<?php

namespace App\Http\Controllers\Gasto;

use App\Gasto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gastos = Gasto::sortable()->paginate(10);
        return view('gastos.index',['gastos'=>$gastos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('gastos.create');
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

        Gasto::create($request->all());
        return redirect('gastos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function show(Gasto $gasto)
    {
        //
        // return view('gastos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function edit(Gasto $gasto)
    {
        //
        return view('gastos.edit',['gasto'=>$gasto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gasto $gasto)
    {
        //
        $gasto->update($request->all());
        return redirect('gastos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gasto $gasto)
    {
        //
        // var_dump($gasto);
        // $gasto = Gasto::findoorFail($gasto);
        // Gasto::destroy($gasto);
        $gasto->delete();
        return  redirect('gastos');
    }
    public function buscar(Request $request){
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        $gastos = Gasto::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                $q->orWhere('nombre','LIKE',"%$word%")
                    ->orWhere('etiqueta','LIKE',"%$word%");
            }
        })->paginate(10);
        return view('gastos.index',['gastos'=>$gastos]);
    }
}
