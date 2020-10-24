<?php

namespace Database\Seeders;

use App\Models\UploadFile;
use Illuminate\Database\Seeder;

class UploadedFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UploadFile::create(array(
            'name' => 'prueba 1',
            'description' => 'prueba 1',
            'path' => 'prueba 1',
            'projectId' => 1
        ));
    }
}
