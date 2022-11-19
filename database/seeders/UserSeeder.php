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
            'balance' => '10',
            'status' => 'activo'
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Usuario1',
            'email' => 'usuario1@usuario1.com',
            'password' => bcrypt('12345678'),
            'username' => 'Usuario1',
            'lastname' => 'User1',
            'phone' => 'xxxxxxxxxx',
            'telegram' => 'xxxxxxx',
            'balance' => '10',
            'status' => 'activo'
        ])->assignRole('Usuario');

        User::create([
            'name' => 'Usuario2',
            'email' => 'usuario2@usuario2.com',
            'password' => bcrypt('12345678'),
            'username' => 'Usuario2',
            'lastname' => 'User2',
            'phone' => 'xxxxxxxxxx',
            'telegram' => 'xxxxxxx',
            'balance' => '10',
            'status' => 'activo'
        ])->assignRole('Usuario');

        User::create([
            'name' => 'Usuario3',
            'email' => 'usuario3@usuario3.com',
            'password' => bcrypt('12345678'),
            'username' => 'Usuario3',
            'lastname' => 'User3',
            'phone' => 'xxxxxxxxxx',
            'telegram' => 'xxxxxxx',
            'balance' => '10',
            'status' => 'activo'
        ])->assignRole('Usuario');

        User::create([
            'name' => 'Usuario4',
            'email' => 'usuario4@usuario4.com',
            'password' => bcrypt('12345678'),
            'username' => 'Usuario4',
            'lastname' => 'User4',
            'phone' => 'xxxxxxxxxx',
            'telegram' => 'xxxxxxx',
            'balance' => '10',
            'status' => 'activo'
        ])->assignRole('Usuario');

    }
}
