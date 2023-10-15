<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\MetodoPago;
use App\Models\Periodo;
use App\Models\TipoAsistensia;
use App\Models\TipoEstadoInscripcion;
use App\Models\TipoEvaluacion;
use App\Models\TipoResultado;
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
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        TipoEstadoInscripcion::create([
            'id' => 1,
            'nombre' => [
                'es' => 'PENDIENTE',
                'en' => 'PENDING',
                'fr' => 'NON-PAYÉ',
            ],
        ]);

        TipoEstadoInscripcion::create([
            'id' => 2,
            'nombre' => [
                'es' => 'PAGADA',
                'en' => 'PAID',
                'fr' => 'PAYÉ',
            ],
        ]);

        TipoResultado::create([
            'id' => 1,
            'nombre' => [
                'fr' => 'VALIDÉ',
                'es' => 'APROBADO',
                'en' => 'PASS',

            ],
            'descripcion' => [
                'fr' => 'Peut passer au niveau suivant',
                'es' => 'Puede pasar al nivel siguiente',
                'en' => 'May go to the next level',
            ],
        ]);

        TipoResultado::create([
            'id' => 2,
            'nombre' => [
                'fr' => 'NON-VALIDÉ',
                'es' => 'REPROBADO',
                'en' => 'FAIL',

            ],
            'descripcion' => [
                'fr' => 'Ne peut pas passer au niveau suivant',
                'es' => 'No puede pasar al nivel siguiente',
                'en' => 'Cannot go to the next level',
            ],
        ]);

        TipoEvaluacion::create([
            'id' => 1,
            'nombre' => 'NOTAS',
        ]);

        TipoAsistensia::create([
            'id' => 1,
            'nombre' => ['fr' => 'PRÉSENT(E)', 'es' => 'PRESENTE', 'en' => 'PRESENT'],
            'clase' => 'success',
            'icon' => '<i class="la la-user"></i>',
        ]);

        TipoAsistensia::create([
            'id' => 2,
            'nombre' => ['fr' => 'PRÉSENCE PARTIELLE', 'es' => 'PRESENCIA PARCIAL', 'en' => 'PARTIAL PRESENCE'],
            'clase' => 'warning',
            'icon' => '<i class="la la-clock-o"></i>',
        ]);

        TipoAsistensia::create([
            'id' => 3,
            'nombre' => ['fr' => 'EXCUSÉ(E)', 'es' => 'JUSTIFICADO', 'en' => 'EXCUSED'],
            'clase' => 'info',
            'icon' => '<i class="la la-exclamation"></i>',
        ]);

        TipoAsistensia::create([
            'id' => 4,
            'nombre' => ['fr' => 'ABSENT(E)', 'es' => 'AUSENTE', 'en' => 'ABSENT'],
            'clase' => 'danger',
            'icon' => '<i class="la la-user-times"></i>',
        ]);

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

        MetodoPago::create(['id' => '1', 'nombre' => 'Tarjeta de Crédito', 'code' => 'TC']);
        MetodoPago::create(['id' => '2', 'nombre' => 'Crédito', 'code' => 'CRC']);
        MetodoPago::create(['id' => '3', 'nombre' => 'Efectivo', 'code' => 'EFECT']);
        MetodoPago::create(['id' => '4', 'nombre' => 'Cheque', 'code' => 'CHR']);

        /*factory(Periodo::class)->create([
            'start' => now()->subDays(rand(1, 30))->format('Y-m-d'),
            'end' => now()->addDays(rand(10, 90))->format('Y-m-d'),
            'year_id' => 1,
            'order' => 1,
        ]);*/

    }
}
