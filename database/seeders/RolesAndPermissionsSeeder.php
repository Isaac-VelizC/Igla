<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'estudiante']);
        Role::create(['name' => 'chef']);

        // Crear permisos
        Permission::create(['name' => 'editar contenido']);
        Permission::create(['name' => 'ver contenido']);

        // Asignar permisos a roles
        $adminRole = Role::findByName('admin');
        $adminRole->givePermissionTo(['editar contenido', 'ver contenido']);
        $chefRole = Role::findByName('chef');
        $chefRole->givePermissionTo(['ver contenido']);

        // Asignar roles a usuarios
        $userAdmin = User::find(1);
        $userAdmin->assignRole('admin');
        $userChef = User::find(2);
        $userChef->assignRole('chef');
    }
}

