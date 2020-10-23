<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    public function uploadFile(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');

        $file = time().'_'.$request->file('file_upload')->getClientOriginalName();
        $filename = $request->file('file_upload')->storeAs('uploads', $file, 'public');

        $query = "INSERT INTO upload_files (name, description, path)
                    values('" . $name . "','" . $description . "','" . $filename. "')";
        DB::insert($query);
        return back()
            ->with('success','El archivo se cargó correctamente')
            ->with('file', $filename);
    }

    public function index()
    {
        $projects = DB::select('select * from upload_files');
        return view('projects', ['projects' => $projects]);
    }
}
