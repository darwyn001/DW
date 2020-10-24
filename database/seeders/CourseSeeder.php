<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
