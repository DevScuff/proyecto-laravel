<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear 1 Super Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@sistema.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // 2. Crear 3 Técnicos
        User::factory(3)->create([
            'password' => Hash::make('tecnico123'),
            'role' => 'tecnico',
        ]);

        // 3. Crear 50 clientes usando el Factory
        Client::factory(50)->create();

        // 4. Crear los servicios base
        Service::create(['name' => 'IP Pública', 'price' => 15.50]);
        Service::create(['name' => 'Filtro Parental', 'price' => 5.00]);
        Service::create(['name' => 'Soporte 24/7', 'price' => 25.00]);
    }
}