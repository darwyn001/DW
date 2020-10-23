<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function index(){
        $courses = DB::select('select * from courses');
        return view('courses', ['courses'=>$courses]);
    }
}
