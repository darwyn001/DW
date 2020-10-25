<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use ZanySoft\Zip\Zip;

class UploadFileController extends Controller
{
    public function uploadFile(Request $request)
    {
        $this->validate($request, [
            'file' => 'mimes:zip,rar'
        ], $messages = [
            'required' => 'El campo :attribute es requerido',
            'mimes' => 'Solo se cargaran archivos zip y rar'
        ]);

        $name = $request->input('name');
        $description = $request->input('description');

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
        $projectSelectedQuery = "select p.id
                                 from projects p, courses c
                                 where p.courseid = c.id
                                 and c.studentId =" . Auth::user()->id;
        $projectSelected = DB::select($projectSelectedQuery);

        $query = "INSERT INTO upload_files (name, description, path, projectId)
                  values('" . $name . "','" . $description . "','" . $path . "', " . ($projectSelected[0])->id . ")";
        DB::insert($query);

        $recentUploadedFileQuery = "select id from upload_files order by created_at limit 1;";
        $recentUploadedFile = DB::select($recentUploadedFileQuery);


        $update = "UPDATE projects
                   SET uploadedFileId = '" . ($recentUploadedFile[0])->id . "'
                   WHERE (`id` = '" . ($projectSelected[0])->id . "');";

        DB::update($update);
        //</editor-fold>

        return back()
            ->with('success',  'El archivo se cargó correctamente')
            ->with('file', $storedFile);
    }


    public function index()
    {
        return view('upload-file');
    }
}
