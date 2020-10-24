<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\FileUploaded;
use App\Models\UploadFile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'name' => 'Profesor 1',
            'email' => 'profesor1@mail.com',
            'documentId' => null,
            'password' => Hash::make('password')
        ));
        User::create(array(
            'name' => 'Profesor 2',
            'email' => 'profesor2@mail.com',
            'documentId' => null,
            'password' => Hash::make('password')
        ));
        User::create(array(
            'name' => 'Estudiante 1',
            'email' => 'student1@mail.com',
            'documentId' => '5190150000',
            'password' => Hash::make('password')
        ));
        User::create(array(
            'name' => 'Estudiante 2',
            'email' => 'student2@mail.com',
            'documentId' => '5190150000',
            'password' => Hash::make('password')
        ));

        Course::create(array(
            'name' => 'Desarrollo web',
            'studentId' => 3,
            'professorId' => 2,
        ));
        Course::create(array(
            'name' => 'Redes II',
            'studentId' => 4,
            'professorId' => 1,
        ));

        /*UploadFile::create(array(
            'name' => 'archivo1',
            'description' => 'Prueba1',
            'path' => 'Ruta1',
        ));
        UploadFile::create(array(
            'name' => 'archivo2',
            'description' => 'Prueba2',
            'path' => 'Ruta2',
        ));
        UploadFile::create(array(
            'name' => 'archivo3',
            'description' => 'Prueba3',
            'path' => 'Ruta3',
        ));*/
    }
}
