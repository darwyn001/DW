<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{

    public function index()
    {
        $cond = "professorId";
        if(Auth::user()->roleId==2)
            $cond = "studentId";

        $myId = Auth::user()->id;


        $query = "select c.id courseId, c.name courseName, u.name studentName, us.name professorName
                  from courses c, users u, users us
                  where c.studentId = u.id
                  and c.professorId = us.id
                  and c.".$cond." = ".$myId;

        $courses = DB::select($query);

        return view('courses', ['courses' => $courses]);
    }
}
