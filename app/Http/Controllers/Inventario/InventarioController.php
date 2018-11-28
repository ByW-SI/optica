<?php

namespace App\Http\Controllers\Inventario;

use Illuminate\Http\Request;
use App\ProductoArmazon;
use App\ProductoGeneral;
use App\ProductoMica;
use App\ProductoOrto;
use App\Http\Controllers\Controller;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $armazones = ProductoArmazon::get();
        $generales = ProductoGeneral::get();
        $micas = ProductoMica::get();
        $ortos = ProductoOrto::get();
         return view("inventario.create2", ['armazones'=>$armazones, 'generales'=>$generales, 'micas'=>$micas, 'ortos'=>$ortos]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $armazones = ProductoArmazon::get();
        $generales = ProductoGeneral::get();
        $micas = ProductoMica::get();
        $ortos = ProductoOrto::get();
         return view("inventario.create", ['armazones'=>$armazones, 'generales'=>$generales, 'micas'=>$micas, 'ortos'=>$ortos]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
