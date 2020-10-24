<?php

namespace Database\Seeders;

use App\Models\Projects;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Projects::create(array(
            'name' => 'Proyecto 1',
            'description' => 'Hacer una página web',
            'courseId' => 1,
        ));
    }
}
