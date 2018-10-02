<?php

use App\Componente;
use Illuminate\Database\Seeder;

class ComponentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$componentes = array (
            // perfil
            array('nombre' => 'indice perfiles', 'modulo_id' => 1),
            array('nombre' => 'ver perfil', 'modulo_id' => 1),
            array('nombre' => 'crear perfil', 'modulo_id' => 1),
            array('nombre' => 'editar perfil', 'modulo_id' => 1),
            array('nombre' => 'eliminar perfil', 'modulo_id' => 1),
            // usuario
            array('nombre' => 'indice usuarios', 'modulo_id' => 1),
            array('nombre' => 'ver usuario', 'modulo_id' => 1),
            array('nombre' => 'crear usuario', 'modulo_id' => 1),
            array('nombre' => 'editar usuario', 'modulo_id' => 1),
            array('nombre' => 'eliminar usuario', 'modulo_id' => 1),
            // empleado
            array('nombre' => 'indice empleados', 'modulo_id' => 2),
            array('nombre' => 'ver empleado', 'modulo_id' => 2),
            array('nombre' => 'crear empleado', 'modulo_id' => 2),
            array('nombre' => 'editar empleado', 'modulo_id' => 2),
            // proveedores
            array('nombre' => 'indice proveedores', 'modulo_id' => 3),
            array('nombre' => 'ver proveedor', 'modulo_id' => 3),
            array('nombre' => 'crear proveedor', 'modulo_id' => 3),
            array('nombre' => 'editar proveedor', 'modulo_id' => 3),
            // sucursales
            array('nombre' => 'indice sucursales', 'modulo_id' => 4),
            array('nombre' => 'ver sucursal', 'modulo_id' => 4),
            array('nombre' => 'crear sucursal', 'modulo_id' => 4),
            array('nombre' => 'editar sucursal', 'modulo_id' => 4),
            // pacientes
            array('nombre' => 'indice pacientes', 'modulo_id' => 5),
            array('nombre' => 'ver paciente', 'modulo_id' => 5),
            array('nombre' => 'crear paciente', 'modulo_id' => 5),
            array('nombre' => 'editar paciente', 'modulo_id' => 5),
            // precargas
            array('nombre' => 'algo', 'modulo_id' => 6),
            // convenios
            array('nombre' => 'indice convenios', 'modulo_id' => 7),
            array('nombre' => 'ver convenio', 'modulo_id' => 7),
            array('nombre' => 'crear convenio', 'modulo_id' => 7),
            array('nombre' => 'editar convenio', 'modulo_id' => 7),
            // productos
            array('nombre' => 'algo', 'modulo_id' => 8),
            // bonos
            array('nombre' => 'algo', 'modulo_id' => 9),
            // comisiones
            array('nombre' => 'algo', 'modulo_id' => 10),
    	);

    	Componente::insert($componentes);
    }
}
