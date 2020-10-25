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
        $myid = Auth::user()->id;


        $query = "select c.id courseId, c.name courseName, u.name studentName, us.name professorName
                  from courses c, users u, users us
                  where c.studentId = u.id
                  and c.professorId = us.id
                  and c.".$cond." = ".$myid;

        $courses = DB::select($query);
        if(Auth::user()->roleId==1){
            $squ = "select uf.path
	                from upload_files uf, courses c, projects p
                    where c.id  = p.courseId
                    and p.id= uf.projectId
                    and c.professorId=".$myid."
                    order by uf.created_at
                    limit 1";
            $sq = DB::select($squ);
            return view('courses', ['courses' => $courses, 'a'=>$sq]);
        }
        return view('courses', ['courses' => $courses]);
    }
}
