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

        /*LeaveType::create([
            'id' => 1,
            'nombre' => ['fr' => 'JOUR FÉRIÉ', 'es' => 'FERIADO', 'en' => 'NATIONAL HOLIDAY'],
        ]);

        LeaveType::create([
            'id' => 2,
            'name' => ['fr' => 'CONGÉ', 'es' => 'VACACIONES', 'en' => 'LEAVE'],
        ]);

        LeaveType::create([
            'id' => 3,
            'name' => ['fr' => 'SPÉCIAL', 'es' => 'ESPECIAL', 'en' => 'SPECIAL'],
        ]);

        LeaveType::create([
            'id' => 4,
            'name' => ['fr' => 'RÉCUPÉRATION', 'es' => 'RECUPERACIÓN', 'en' => 'RECOVERY'],
        ]);

        LeaveType::create([
            'id' => 5,
            'name' => ['fr' => 'MALADIE', 'es' => 'ENFERMEDAD', 'en' => 'SICK LEAVE'],
        ]);

        LeadType::create([
            'id' => '1',
            'name' => [
                'fr' => 'Actif',
                'en' => 'Active',
                'es' => 'Activo',
            ],
            'description' => [
                'fr' => 'Inscrit maintenant',
                'en' => 'Currently enrolled',
                'es' => 'Matriculado ahora',
            ],
            'icon' => 'la-check',
        ]);*/

        MetodoPago::create(['id' => '1', 'nombre' => 'Cuotas']);
        MetodoPago::create(['id' => '2', 'nombre' => 'Todo']);

        /*factory(Periodo::class)->create([
            'start' => now()->subDays(rand(1, 30))->format('Y-m-d'),
            'end' => now()->addDays(rand(10, 90))->format('Y-m-d'),
            'year_id' => 1,
            'order' => 1,
        ]);*/

    }
}
