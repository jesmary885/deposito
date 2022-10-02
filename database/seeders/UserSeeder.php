<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'username' => 'Administrador',
            'lastname' => 'Admin',
            'phone' => 'xxxxxxxxxx',
            'telegram' => 'xxxxxxx',
            'reputation' => '10',
            'balance' => '10',
            'status' => 'activo'
        ])->assignRole('Administrador');
    }
}
