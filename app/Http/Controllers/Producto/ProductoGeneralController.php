<?php

namespace App\Http\Controllers\Producto;

use App\ProductoArmazon;
use App\ProductoGeneral;
use App\ProductoMica;
use App\ProductoOrto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductoGeneralController extends Controller
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
        ProductoGeneral::create($request->all());
        return redirect()->route('productoschidos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductoGeneral  $productoGeneral
     * @return \Illuminate\Http\Response
     */
    public function show($orto)
    {
        $ortot = ProductoGeneral::find($orto);
        return view("producto.show", ['tipo'=>'gene', 'orto'=>$ortot]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductoGeneral  $productoGeneral
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductoGeneral $productoGeneral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductoGeneral  $productoGeneral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $orto)
    {
        $proorto = ProductoGeneral::find($orto);
        $proorto->cantidad = $request->cantidad;
        $proorto->save();

        $armazones = ProductoArmazon::get();
    $generales = ProductoGeneral::get();
    $micas = ProductoMica::get();
    $ortos = ProductoOrto::get();
     return view("inventario.create", ['armazones'=>$armazones, 'generales'=>$generales, 'micas'=>$micas, 'ortos'=>$ortos]);
    
    }

    public function updateprecio(Request $request, $orto){
        $proorto = ProductoGeneral::find($orto);
        $proorto->precio = $request->precio;
        $proorto->save();

        $armazones = ProductoArmazon::get();
    $generales = ProductoGeneral::get();
    $micas = ProductoMica::get();
    $ortos = ProductoOrto::get();
     return view("inventario.create2", ['armazones'=>$armazones, 'generales'=>$generales, 'micas'=>$micas, 'ortos'=>$ortos]);
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductoGeneral  $productoGeneral
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductoGeneral $productoGeneral)
    {
        //
    }
}
