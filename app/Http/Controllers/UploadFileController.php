<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use ZanySoft\Zip\Zip;

class UploadFileController extends Controller
{
    public function uploadFile($project)
    {
        $request = Request::capture();
        $this->validate($request, [
            'file' => 'mimes:zip,rar'
        ], $messages = [
            'required' => 'El campo :attribute es requerido',
            'mimes' => 'Solo se cargaran archivos zip y rar'
        ]);


        $uploadedFile = $request->file('file_upload')->getClientOriginalName();
        $storedFile = time() . '_' . $uploadedFile;
        $storedFileName = explode('.', $uploadedFile);
        $folderName = $storedFileName[0];

        $request->file('file_upload')->storeAs($folderName, $storedFile, 'public');
        $zipPath = "storage/" . $folderName . "/" . $storedFile;
        $path = "storage/" . $folderName;
        try {
            $zip = Zip::open($zipPath);
            $zip->extract($path);
            $zip->close();
        } catch (\Exception $e) {

        }

        File::delete($zipPath);

        //<editor-fold desc="Querys">
        $query = "INSERT INTO upload_files  path, projectId)
                          values('" . $folderName . "', " . $project . ")";
        DB::insert($query);

        $recentUploadedFileQuery = "select id from upload_files order by id desc limit 1;";
        $recentUploadedFile = DB::select($recentUploadedFileQuery);


        $update = "UPDATE projects
                           SET uploadedFileId = '" . ($recentUploadedFile[0])->id . "'
                           WHERE (`id` = '" . $project . "');";

        DB::update($update);
        //</editor-fold>

        return back()
            ->with('success', 'El archivo se cargó correctamente!!')
            ->with('file', $storedFile);

    }


    public function index($projectSelected)
    {
        $query = "select p.name, p.description, c.name as courseName
                  from courses c, projects p
                  where p.courseId = c.id
                  and p.id =".$projectSelected;
        $queryResult = DB::select($query);

        return view('upload-file', ['selectedProject' => $projectSelected, 'queryResult'=>$queryResult]);
    }
}
