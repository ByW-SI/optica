<?php

namespace App\Http\Controllers\Convenio;

use App\Convenio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;
use Illuminate\Support\Facades\Auth;


class ConvenioController extends Controller
{
    
    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                foreach (Auth::user()->perfil->componentes as $componente)
                    if($componente->modulo->nombre == "convenios")
                        return $next($request);
                return redirect()->route('denegado');
            } else
                return redirect()->route('login');
        });
    }

    private function hasComponent($nombre) {
        foreach (Auth::user()->perfil->componentes as $componente)
            if($componente->nombre == $nombre)
                return true;
        return false;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->hasComponent('indice convenios')) {
            $convenios = Convenio::sortable()->paginate(5);
            return view('convenios.index', ['convenios' => $convenios]);
        }
        return redirect()->route('denegado');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if($this->hasComponent('crear convenio')) {
            return view('convenios.create');
        }
        return redirect()->route('denegado');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->hasComponent('crear convenio')) {
            $convenio = Convenio::where('rfc', $request->rfc)->get();
            if (count($convenio) != 0) {
                Alert::error("Error, El RFC ya existe")->persistent("Cerrar");
                return redirect()->back()->with('errors', 'El RFC ya existe');
            } else {
                $convenio = Convenio::create($request->all());
                Alert::success("Convenio creado con exito, sigue agregando información")->persistent("Cerrar");
                return redirect()->route('convenios.show', ['convenio' => $convenio]);
            }
        }
        return redirect()->route('denegado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function show(Convenio $convenio)
    {
        if($this->hasComponent('ver convenio')) {
            return view('convenios.view', ['convenio' => $convenio]);
        }
        return redirect()->route('denegado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function edit(Convenio $convenio)
    {
        if($this->hasComponent('editar convenio')) {
            return view('convenios.edit', ['convenio' => $convenio]);
        }
        return redirect()->route('denegado');
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
        if($this->hasComponent('editar convenio')) {
            $convenio->update($request->all());
            Alert::success('Convenio actualizado')->persistent("Cerrar");
            return redirect()->route('convenios.show', ['convenio'=>$convenio]);
        }
        return redirect()->route('denegado');
    }

}