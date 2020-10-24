<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function index(){
        $query = "select c.id courseId, c.name courseName, u.name studentName, us.name professorName
                  from courses c, users u, users us
                  where c.studentId = u.id
                  and c.professorId = us.id";

        $courses = DB::select($query);
        return view('courses', ['courses'=>$courses]);
    }
}
