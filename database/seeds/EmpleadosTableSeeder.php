<?php

use App\Empleado;
use Illuminate\Database\Seeder;

class EmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $empleado = [
        	'nombre' => 'Dummy',
            'identificador' => 'ADMIN',
            'appaterno' => 'Dummy',
            'apmaterno' => 'Dummy',
            'email' => 'admin@optica.com',
        ];

        Empleado::create($empleado);

    }
}
