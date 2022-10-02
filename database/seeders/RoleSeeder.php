<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Usuario']);

        //JUMPERS

       Permission::create(['name' => 'cint.index',
            'description' => 'Ver Cints'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'internals.index',
        'description' => 'Ver Cints'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'kmil.index',
        'description' => 'Ver Cints'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'kmilnoventaydos.index',
        'description' => 'Ver Cints'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'kdosmilsesentaydos.index',
        'description' => 'Ver Cints'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'kveintitres.index',
        'description' => 'Ver Cints'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'ksietemilcuarentayuno',
        'description' => 'Ver Cints'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'prodege.index',
        'description' => 'Ver Cints'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'scube.index',
        'description' => 'Ver Cints'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'spectrum.index',
        'description' => 'Ver Cints'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'toluna.index',
        'description' => 'Ver Cints'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'ssidkr.index',
        'description' => 'Ver Cints'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'marketplace.index',
        'description' => 'Ver Cints'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'sobrenosotros.index',
        'description' => 'Ver Cints'])->syncRoles([$role1,$role2]);
    }
}
