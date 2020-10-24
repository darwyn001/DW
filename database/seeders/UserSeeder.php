<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'name' => 'Profesor 1',
            'email' => 'profesor1@mail.com',
            'documentId' => null,
            'roleId' => 1,
            'password' => Hash::make('password')
        ));
        User::create(array(
            'name' => 'Profesor 2',
            'email' => 'profesor2@mail.com',
            'documentId' => null,
            'roleId' => 1,
            'password' => Hash::make('password')
        ));
        User::create(array(
            'name' => 'Estudiante 1',
            'email' => 'student1@mail.com',
            'documentId' => '5190150000',
            'roleId' => 2,
            'password' => Hash::make('password')
        ));
        User::create(array(
            'name' => 'Estudiante 2',
            'email' => 'student2@mail.com',
            'documentId' => '5190150000',
            'roleId' => 2,
            'password' => Hash::make('password')
        ));
    }
}
