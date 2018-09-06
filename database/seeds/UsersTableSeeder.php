<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = [
        	'perfil_id' => 1,
        	'name' => 'admin',
        	'email' => 'admin@optica.com',
        	'password' => bcrypt('123456'),
        	'nombre' => 'admin',
        	'appaterno' => 'admin',
        	'apmaterno' => 'admin'
        ];

        User::create($usuario);
    }
}
