<?php

namespace App\Http\Controllers\Producto;


use App\ProductoArmazon;
use App\ProductoGeneral;
use App\ProductoMica;
use App\ProductoOrto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductoOrtoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductoOrto::create($request->all());
        return redirect()->route('productoschidos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductoOrto  $productoOrto
     * @return \Illuminate\Http\Response
     */
    public function show(ProductoOrto $productoOrto)
    {
        return "chingue a su el sa";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductoOrto  $productoOrto
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductoOrto $productoOrto)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductoOrto  $productoOrto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $orto)
    {
        $proorto = ProductoOrto::find($orto);
        $proorto->cantidad = $request->cantidad;
        $proorto->save();

        $armazones = ProductoArmazon::get();
    $generales = ProductoGeneral::get();
    $micas = ProductoMica::get();
    $ortos = ProductoOrto::get();
     return view("inventario.create", ['armazones'=>$armazones, 'generales'=>$generales, 'micas'=>$micas, 'ortos'=>$ortos]);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductoOrto  $productoOrto
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductoOrto $productoOrto)
    {
        return "chingue a su el sa";
    }
}
