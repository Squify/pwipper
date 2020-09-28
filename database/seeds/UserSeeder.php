<?php

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
        $user = [
            'name' => 'Username',
            'email' => 'user@mail.fr',
            'password' => 'test',
            'pseudo' => 'pseudo',
            'description' => 'blablabla',
            'image_path' => null,
            'banner_path' => null,
            'location' => null,
            'website' => null,
            'birthdate'  => null,
            'isAdmin'  => true
        ];

        \App\User::create($user);
    }
}
