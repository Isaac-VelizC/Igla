<?php

namespace Database\Seeders;

use App\Models\Docente;
use App\Models\Miembro;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' =>'Isaac Veliz',
            'email' => 'isa.veliz@gmail.com',
            'password' => bcrypt('IsaacVelizAdmin'),
        ]);
        User::create([
            'name' =>'Teagan Croft',
            'email' => 'teagan.croft@gmail.com',
            'password' => bcrypt('TeaganCroftChef'),
        ]);

        Persona::create(['user_id' => '1', 'nombre' => 'Isak', 'ci' => '8513398', 'genero' => 'Hombre']);
        Persona::create(['user_id' => '2', 'nombre' => 'Teagan', 'ci' => '6962512', 'genero' => 'Mujer']);
        Docente::create(['id_persona' => '2']);
        Miembro::create(['pers_id' => '1']);
        
    }
}
