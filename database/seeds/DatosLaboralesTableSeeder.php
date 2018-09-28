<?php

use App\EmpleadosDatosLab;
use Illuminate\Database\Seeder;

class DatosLaboralesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$datos = [
    		'empleado_id' => 1,
	        'fechacontratacion' => date("Y-m-d"),
	        'fechaactualizacion' => date("Y-m-d"),
	        'periodopaga' => 'Semanal',
	        'regimen' => 'Sueldos y salarios',
	        'hcomida' => '0 min',
            'prestaciones' => 'De Ley',
            'lugartrabajo' => 'Oficinas',
    	];

    	EmpleadosDatosLab::create($datos);

    }
}
