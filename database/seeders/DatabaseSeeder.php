<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\MetodoPago;
use App\Models\TipoEstadoInscripcion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call(UsersSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(TiposSeeder::class);

        /*factory(Periodo::class)->create([
            'start' => now()->subDays(rand(1, 30))->format('Y-m-d'),
            'end' => now()->addDays(rand(10, 90))->format('Y-m-d'),
            'year_id' => 1,
            'order' => 1,
        ]);*/

    }
}
