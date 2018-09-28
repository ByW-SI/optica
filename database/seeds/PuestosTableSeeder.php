<?php

use App\Puesto;
use Illuminate\Database\Seeder;

class PuestosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$puestos = array(
    		array('nombre' => 'Administrador', 'etiqueta' => 'admin'),
    		array('nombre' => 'Doctor', 'etiqueta' => 'doc'),
    		array('nombre' => 'Proveedor', 'etiqueta' => 'prov'),
    	);

    	Puesto::insert($puestos);
    }
}
