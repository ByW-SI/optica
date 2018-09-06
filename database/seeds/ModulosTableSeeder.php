<?php

use App\Modulo;
use Illuminate\Database\Seeder;

class ModulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$modulos = array(
    		array('nombre' => 'seguridad'),
    		array('nombre' => 'rh'),
    		array('nombre' => 'proveedores'),
    		array('nombre' => 'sucursales'),
    		array('nombre' => 'pacientes'),
    	);

    	Modulo::insert($modulos);
    }
}
