<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'John Vo',
            'email' => 'john@gmail.com',
            'password' => bcrypt('Administrador1')
        ]);

        $user->assignRole('Admin');

        User::factory(99)->create();
    }
}
