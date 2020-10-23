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
            'name' => 'Usuario1',
            'email' => 'usuario@mail.com',
            'password' => Hash::make('password')
        ));

        Course::create(array(
            'name' => 'Mate'
        ));
        Course::create(array(
            'name' => 'Lang'
        ));

        UploadFile::create(array(
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
        ));
    }
}
