<?php

use Illuminate\Database\Seeder;
use \App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'Martinez Danielle',
            'email' => 'test1@test.fr',
            'password' => '$2y$10$fBLjYcKCgwBX1F5IhmP7g.OgAtyydk7EPKNqO.sKa5pFm1Cywi6/6',
            'pseudo' => 'ovopik',
            'description' => 'Ea eveniet iusto recusandae reiciendis tempora velit!',
            'image_path' => null,
            'banner_path' => null,
            'location' => null,
            'website' => null,
            'birthdate'  => null,
            'isAdmin'  => false
        ];
        User::create($user);
        $user = [
            'name' => 'Hector S. Harrison',
            'email' => 'test2@test.fr',
            'password' => '$2y$10$fBLjYcKCgwBX1F5IhmP7g.OgAtyydk7EPKNqO.sKa5pFm1Cywi6/6',
            'pseudo' => 'hectorha',
            'description' => 'Ea eveniet iusto recusandae reiciendis tempora velit!',
            'image_path' => null,
            'banner_path' => null,
            'location' => null,
            'website' => null,
            'birthdate'  => null,
            'isAdmin'  => false
        ];
        User::create($user);
        $admin = [
            'name' => 'Admin n°1',
            'email' => 'admin@test.fr',
            'password' => '$2y$10$fBLjYcKCgwBX1F5IhmP7g.OgAtyydk7EPKNqO.sKa5pFm1Cywi6/6',
            'pseudo' => 'adminnn',
            'description' => 'You shall not pass!',
            'image_path' => null,
            'banner_path' => null,
            'location' => null,
            'website' => null,
            'birthdate'  => null,
            'isAdmin'  => true
        ];
        User::create($admin);
    }
}
