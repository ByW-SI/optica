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
            $data = Excel::load($path, null, null, true, null)->get();
            dd($data);
    		if($data->count()) {
                foreach ($data as $sheet) {
        			foreach ($sheet as $key => $value) {
                        $arr[] = [
                            // 'clave' => $value->clave,
                            // 'descripcion' => $value->descripcion,
                            // 'precio_lista' => $value->precio_de_lista,
                            // 'm60' => $value['60'],
                            // 'm48' => $value['48'],
                            // 'm36' => $value['36'],
                            // 'm24' => $value['24'],
                            // 'm12' => $value['12'],
                            // 'apertura' => $value->apertura,
                            // 'marca' => $value->marca,
                            // 'tipo' => $value->tipo,
                            // 'categoria' => $value->categoria,
                            // 'created_at' => date('Y-m-d h:m:s'),
                            // 'updated_at' => date('Y-m-d h:m:s'),
                        ];
                    }
                }
    			if (!empty($arr)) {
                    // dd($arr[0]);
                    // Paciente::insert($arr);
    				return redirect()->back()->with('success', 'Archivo subido correctamente.');
    			} else
    				return redirect()->back()->with('error', 'Los registros están vacíos.');
    		} else
    			return redirect()->back()->with('error', 'El archivo está vacío.');
    	} else
    		return redirect()->back()->with('error', 'No se subió ningún archivo.');

    	return redirect()->back()->with('error', 'Error al subir el archivo.');
	}

}
