<?php

namespace App\Http\Controllers\Provedor;

use App\DatosBancariosProveedor;
use App\Provedor;
use App\Banco;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProveedorDatosBancariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Provedor $provedore)
    {
        $bancario = DatosBancariosProveedor::get()->first();
        if(!$bancario) {
            $bancos = Banco::get();
            return view('datosbancariosproveedores.create', ['provedore' => $provedore, 'bancos' => $bancos]);
        }
        return view('datosbancariosproveedores.view', ['provedore' => $provedore, 'bancario' => $bancario]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Provedor $provedore)
    {
        $bancos = Banco::get();
        return view('datosbancariosproveedores.create', ['provedore' => $provedore, 'bancos' => $bancos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Provedor $provedore)
    {
        $bancario = new DatosBancariosProveedor();
        $bancario->banco_id = $request->banco_id;
        $bancario->provedor_id = $provedore->id;
        $bancario->cuenta = $request->cuenta;
        $bancario->clabe = $request->clabe;
        $bancario->beneficiario = $request->beneficiario;
        $bancario->save();
        return view('datosbancariosproveedores.view', ['provedore' => $provedore, 'bancario' => $bancario]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Provedor $provedore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Provedor $provedore)
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
    public function update(Request $request, Provedor $provedore, $id)
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
