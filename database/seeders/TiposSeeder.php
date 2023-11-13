<?php

namespace Database\Seeders;

use App\Models\Aula;
use App\Models\Horario;
use App\Models\MetodoPago;
use App\Models\Periodo;
use App\Models\TipoEvaluacion;
use App\Models\TipoTrabajo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Horario::create(['id' => '1', 'turno' => 'Mañana', 'inicio' => '08:15:00', 'fin' => '12:15:00']);
        Horario::create(['id' => '2', 'turno' => 'Tarde', 'inicio' => '15:00:00', 'fin' => '18:00:00']);
        Horario::create(['id' => '3', 'turno' => 'Noche', 'inicio' => '19:00:00', 'fin' => '09:30:00']);
        Horario::create(['id' => '4', 'turno' => 'Sabado', 'inicio' => '07:30:00', 'fin' => '12:30:00']);

        Aula::create(['nombre' => 'Aula de Cocina 101', 'codigo' => 'GA101', 'capacidad' => 25]);
        Aula::create(['nombre' => 'Aula de Pastelería 201', 'codigo' => 'GP201', 'capacidad' => 20]);
        Aula::create(['nombre' => 'Laboratorio de Enología 301', 'codigo' => 'GE301', 'capacidad' => 30]);
        Aula::create(['nombre' => 'Sala de Degustación 401', 'codigo' => 'GD401', 'capacidad' => 15]);
        Aula::create(['nombre' => 'Aula de Panadería 501', 'codigo' => 'GP501', 'capacidad' => 25]);
        
        Periodo::create(['nombre' => 'Primer Semestre', 'descripcion' => 'Modalidad Regular', 'costo' => 500]);
        Periodo::create(['nombre' => 'Segundo Semestre', 'descripcion' => 'Modalidad Intensiva', 'costo' => 600]);
        Periodo::create(['nombre' => 'Tercer Semestre', 'descripcion' => 'Modalidad Nocturna', 'costo' => 550]);
        Periodo::create(['nombre' => 'Cuarto Semestre', 'descripcion' => 'Modalidad Fin de Semana', 'costo' => 700]);

        TipoTrabajo::create(['nombre' => 'Teorica']);
        TipoTrabajo::create(['nombre' => 'Practica']);
        
        TipoEvaluacion::create(['nombre' => 'Teorica']);
        TipoEvaluacion::create(['nombre' => 'Practica']);
        
        MetodoPago::create(['nombre' => 'Cuotas', 'sigla' => 'CT']);
        MetodoPago::create(['nombre' => 'Todo', 'sigla' => 'TD']);
    }
}
