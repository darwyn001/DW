<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    public function index()
    {

        $cond = "professorId";
        if(Auth::user()->roleId==2)
            $cond = "studentId";

        $myId = Auth::user()->id;

        $projects = DB::select('select p.id, p.name, p.description, p.uploadedFileId, c.name courseName
                                      from projects p, courses c
                                      where p.courseId = c.id
                                      and c.'.$cond.' =' . $myId . ';');

        $path = DB::select('select uf.path, uf.projectId as id
                                  from projects p, courses c, upload_files uf
                                  where uf.projectId = p.id
                                  and p.courseId = c.id
                                  and c.'.$cond.' =' . $myId . ';');

        return view('projects', ['projects' => $projects, 'paths' => $path]);
    }
}
