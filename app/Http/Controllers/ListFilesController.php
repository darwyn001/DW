<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class ListFilesController extends Controller
{
    public function index($filePath)
    {
        if (!Storage::disk('public')->exists($filePath)) {
            abort('404');
        }

        $listFiles = Storage::disk('public')->allFiles($filePath);
        $urlFiles = array();

        foreach ($listFiles as $item) {
            array_push($urlFiles, Storage::url($item));
        }

        return view('list-files',
            [
                'listFiles' => $listFiles,
                'urlFiles' => $urlFiles
            ]
        );
    }
}
