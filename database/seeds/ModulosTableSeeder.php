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
    	$modulos = array(                               // id
    		array('nombre' => 'seguridad'),             // 1
    		array('nombre' => 'rh'),                    // 2
    		array('nombre' => 'proveedores'),           // 3
    		array('nombre' => 'sucursales'),            // 4
    		array('nombre' => 'pacientes'),             // 5
            array('nombre' => 'precargas'),             // 6
            array('nombre' => 'convenios'),             // 7
            array('nombre' => 'productos'),             // 8
            array('nombre' => 'bonos'),                 // 9
            array('nombre' => 'comisiones'),            // 10
    	);

    	Modulo::insert($modulos);
    }
}
