<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    /*public function studentCourses(){
        $myid = Auth::user()->id;
        $query = "select c.id courseId, c.name courseName, u.name studentName, us.name professorName
                  from courses c, users u, users us
                  where c.studentId = u.id
                  and c.professorId = us.id
                  and c.studentid =".$myid;

        $courses = DB::select($query);
        return view('courses', ['courses'=>$courses]);
    }
    public function professorCourses(){
        $myid = Auth::user()->id;
        $query = "select c.id courseId, c.name courseName, u.name studentName, us.name professorName
                  from courses c, users u, users us
                  where c.studentId = u.id
                  and c.professorId = us.id
                  and c.professorId =".$myid;

        $courses = DB::select($query);
        return view('courses', ['courses'=>$courses]);
    }*/

    public function index()
    {
        $cond = "professorId";
        if(Auth::user()->roleId==2)
            $cond = "studentId";
        $myid = Auth::user()->id;


        $query = "select c.id courseId, c.name courseName, u.name studentName, us.name professorName
                  from courses c, users u, users us
                  where c.studentId = u.id
                  and c.professorId = us.id
                  and c.".$cond." = ".$myid;

        $courses = DB::select($query);
        return view('courses', ['courses' => $courses]);
    }
}
