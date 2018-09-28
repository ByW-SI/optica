<?php

namespace App\Http\Controllers\Provedor;

use App\DatosBancariosProveedor;
use App\Provedor;
use App\Banco;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProveedorDatosBancariosController extends Controller
{
    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                foreach (Auth::user()->perfil->componentes as $componente)
                    if($componente->modulo->nombre == "proveedores")
                        return $next($request);
                return redirect()->route('denegado');
            } else
                return redirect()->route('login');
        });
    }

    public function index(Provedor $provedore)
    {
        $bancario = $provedore->datosBancarios->first();
        if(!$bancario) {
            $bancos = Banco::get();
            return view('datosbancariosproveedores.create', ['provedore' => $provedore, 'bancos' => $bancos]);
        }
        return view('datosbancariosproveedores.view', ['provedore' => $provedore, 'bancario' => $bancario]);
    }

    public function create(Provedor $provedore)
    {
        $bancos = Banco::get();
        return view('datosbancariosproveedores.create', ['provedore' => $provedore, 'bancos' => $bancos]);
    }

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

    public function view() {

    }

    public function edit(Provedor $provedore)
    {
        $bancario = DatosBancariosProveedor::get()->first();
        $bancos = Banco::get();
        return view('datosbancariosproveedores.edit', ['provedore' => $provedore, 'bancario' => $bancario, 'bancos' => $bancos]);
    }

    public function update(Request $request, Provedor $provedore)
    {
        $bancario = $provedore->datosBancarios->first();
        $bancario->update($request->all());
        return $this->index($provedore);
    }

    public function destroy() {

    }

}
