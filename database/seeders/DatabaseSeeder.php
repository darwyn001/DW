<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\FileUploaded;
use App\Models\Role;
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
        $this->call(CourseSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(ProjectSeeder::class);
        //$this->call(UploadedFileSeeder::class);
    }
}
