<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Leer Cursos',
        ]);
        Permission::create([
            'name' => 'Crear Cursos',
        ]);
        Permission::create([
            'name' => 'Actualizar Cursos',
        ]);
        Permission::create([
            'name' => 'Eliminar Cursos',
        ]);
        Permission::create([
            'name' => 'Ver dashboard',
        ]);
        Permission::create([
            'name' => 'Crear role',
        ]);
        Permission::create([
            'name' => 'Listar role',
        ]);
        Permission::create([
            'name' => 'Editar role',
        ]);
        Permission::create([
            'name' => 'Eliminar role',
        ]);
        Permission::create([
            'name' => 'Leer usuarios',
        ]);
        Permission::create([
            'name' => 'Editar usuarios',
        ]);
    }
}
