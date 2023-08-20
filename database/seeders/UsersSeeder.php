<?php

namespace Database\Seeders;

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
    }
}
