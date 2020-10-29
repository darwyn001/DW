<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    public function index()
    {
        $myId = Auth::user()->id;

        $projects = DB::select('select p.id, p.name, p.description, p.uploadedFileId, c.name courseName
                                      from projects p, courses c
                                      where p.courseId = c.id
                                      and c.studentId =' . $myId . ';');

        $path = DB::select('select uf.path, uf.projectId as id
                                  from projects p, courses c, upload_files uf
                                  where uf.projectId = p.id
                                  and p.courseId = c.id
                                  and c.studentId =' . $myId . ';');

        return view('projects', ['projects' => $projects, 'paths' => $path]);
    }
}
