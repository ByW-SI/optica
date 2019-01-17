<?php

namespace App\Http\Controllers\Paciente;

use App\Paciente;
use App\Convenio;
use App\PacientesDatosGenerales;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert as Alert;

class PacientesDatosGeneralesController extends Controller
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
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Paciente $paciente)
	{
		$convenios = Convenio::get();
		return view('paciente.generales.create', ['paciente' => $paciente, 'convenios' => $convenios]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, Paciente $paciente)
	{
		$datos = new PacientesDatosGenerales($request->all());
		$paciente->generales()->save($datos);
		return redirect()->route('pacientes.show', ['paciente' => $paciente]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Paciente  $paciente
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Paciente $paciente)
	{	
		$convenios = Convenio::get();
		return view('paciente.generales.edit', ['paciente' => $paciente, 'convenios' => $convenios]);
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
        $paciente->generales()->update($request->except(['_method', '_token']));
		return redirect()->route('pacientes.show', ['paciente' => $paciente]);//
	}

}
