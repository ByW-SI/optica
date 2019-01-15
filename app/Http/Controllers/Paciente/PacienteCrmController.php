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
            if(count($paciente->crms) > 0)
                $crms[] = $paciente->crms->last();
        }
        return view('crm.index', ['crms' => $crms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Paciente $paciente)
    {
        return view('paciente.crm.create', ['paciente' => $paciente]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Paciente $paciente)
    {
        $request->fecha_act = date('Y-m-d');
        $crm = PacienteCRM::create($request->all());
        return redirect()->route('crms.index');
    }

    public function buscar(Request $request) {
        $desde = $request->input('desde') ? $request->input('desde') : date('Y-m-d');
        $hasta = $request->input('hasta') ? $request->input('hasta') : '9999-12-31';
        $query = $request->input('query');
        $crms = PacienteCRM::whereBetween('fecha_cont', [$desde, $hasta]);
        if($query) {
            $pacientes = Paciente::where('identificador','LIKE',"%$query%")->get();
            $arrs = [];
            foreach ($pacientes as $paciente)
                $arrs[] = $paciente->id;
            $crms = $crms->whereIn('paciente_id', $arrs);
        }
        $crms = $crms->get();
        $arrs = [];
        $auxs = [];
        foreach ($crms as $crm) {
            if(!in_array($crm->paciente->identificador, $arrs)) {
                $arrs[] = $crm->paciente->identificador;
                $tmp = [];
                foreach ($crms as $crm2)
                    if($crm->paciente->identificador == $crm2->paciente->identificador)
                        $tmp[] = $crm2;
                $auxs[$crm->paciente->identificador] = $tmp;
            }
        }
        $crms = [];
        foreach ($auxs as $aux)
            $crms[] = end($aux);
        return view('paciente.crm.busqueda', ['crms' => $crms]);
    }

    public function pacientes(Request $request) {
        $query = $request->input('query');
        $pacientes = Paciente::where('identificador','LIKE',"%$query%")->get();
        return view('paciente.crm.pacientes', ['pacientes' => $pacientes]);
    }

}
