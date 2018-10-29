<?php

namespace App\Http\Controllers\Excel;

use Illuminate\Http\Request;
use App\Paciente;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Excel;

class PacienteExcel extends Controller
{

	public function index() {
		return view('excel.pacientes');
	}

	public function upload(Request $request) {
    	if($request->hasFile('pacientes')) {
    		$path = $request->file('pacientes')->getPathName();
			\Excel::filter('chunk')->load($path)->chunk(250, function($data) {
                set_time_limit(0); 
    			foreach ($data as $key => $value) {
                    $pacientes[] = [
                        'nombre' => $value->nom,
                        'appaterno' => $value->appater,
                        'apmaterno' => $value->apmater,
                        'created_at' => date('Y-m-d h:m:s'),
                        'updated_at' => date('Y-m-d h:m:s'),
                    ];
                }
    			if (!empty($pacientes))
    				Paciente::insert($pacientes);
    			else
    				return redirect()->back()->with('error', 'Los registros están vacíos.');
			});
			return redirect()->back()->with('success', 'Archivo subido correctamente.');
		} else
    		return redirect()->back()->with('error', 'No se subió ningún archivo.');
    	return redirect()->back()->with('error', 'Error al subir el archivo.');
	}

}
