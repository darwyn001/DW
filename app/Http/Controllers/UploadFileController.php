<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UploadFileController extends Controller
{
    public function uploadFile(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');

        $file = time() . '_' . $request->file('file_upload')->getClientOriginalName();
        $filename = $request->file('file_upload')->storeAs('uploads', $file, 'public');

        //<editor-fold desc="Querys">
        $query = "INSERT INTO upload_files (name, description, path)
                    values('" . $name . "','" . $description . "','" . $filename . "')";
        DB::insert($query);

        $recentUploadedFileQuery = "select id from upload_files order by created_at limit 1;";
        $recentUploadedFile = DB::select($recentUploadedFileQuery);

        $projectSelectedQuery = "select p.id
                            from projects p, courses c
                            where p.courseid = c.id
                            and c.studentId =" . Auth::user()->id;
        $projectSelected = DB::select($projectSelectedQuery);

        $update = "UPDATE projects
                   SET uploadedFileId = '" . ($recentUploadedFile[0])->id . "'
                   WHERE (`id` = '" . ($projectSelected[0])->id . "');";

        DB::update($update);
        //</editor-fold>

        return back()
            ->with('success',  'El archivo se cargó correctamente')
            ->with('file', $filename);
    }


    public function index()
    {
        return view('upload-file');
    }
}
