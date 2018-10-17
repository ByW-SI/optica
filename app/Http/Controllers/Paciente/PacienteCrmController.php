<?php

namespace App\Http\Controllers\Paciente;

use App\Paciente;
use App\PacienteCRM;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert as Alert;

class PacienteCrmController extends Controller
{

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                foreach (Auth::user()->perfil->componentes as $componente)
                    if($componente->modulo->nombre == "pacientes")
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
    public function index()
    {
        $crms = [];
        foreach (Paciente::get() as $paciente) {
            if(count($paciente->crm) != 0)
                $crms[] = $paciente->crm->last();
        }
        // dd($crms);
        $pacientes = Paciente::orderBy('nombre','desc')->get();
        return view('crm.index', ['crms' => $crms, 'pacientes' => $pacientes]);
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
    public function store(Request $request, Paciente $paciente)
    {
        $crm = PacienteCRM::create($request->all());
        return redirect()->route('crm2.index');
    }

    public function porFecha(Request $request) {
        $crms = [];
        foreach (Paciente::get() as $paciente) {
            if(count($paciente->crm) != 0) {
                $tmp = $paciente->crm()->whereBetween('fecha_cont', [$request->fechaD, $request->fechaH])->orderBy('fecha_cont', 'asc')->get()->first();
                if($tmp != null)
                    $crms[] = $tmp;
            }
        }
        $todos = PacienteCRM::get();
        $pacientes = Paciente::orderBy('nombre','desc')->get();
        return view('crm.index',['crms' => $crms, 'todos' => $todos, 'pacientes' => $pacientes]);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        //
    }
}
