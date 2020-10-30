<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CopyFile extends Controller
{
    public function index($fileInfo)
    {
        $filePath = explode("-", $fileInfo);

        $rootPath = $filePath[0];

        $fileOriginalPath = "";
        for ($i = 0; $i < count($filePath); $i++) {
            if ($i == 0)
                $fileOriginalPath = $filePath[$i];
            else
                $fileOriginalPath = $fileOriginalPath . "/" . $filePath[$i];
        }

        $selectNotLike = "select path from upload_files where path not like '" . $rootPath . "';";
        $resultNotLike = DB::select($selectNotLike);

        $sameRouteCounter = 0;
        $orf = str_replace($rootPath, "", $fileOriginalPath);
        foreach ($resultNotLike as $notLike) {
            $listFilesInOtherDirs = Storage::disk('public')->allFiles($notLike->path);
            foreach ($listFilesInOtherDirs as $fileOtherDir) {
                $fop = str_replace($notLike->path, "", $fileOtherDir);
                if ($fop == $orf)
                    $sameRouteCounter = 1 + $sameRouteCounter;
            }
        }

        $fileCounter = 0;
        $levenshteinDistanceTotal=0;

        $contentSelectedFile = Storage::disk('public')->get($fileOriginalPath);
        foreach ($resultNotLike as $notLike) {
            $listFilesInOtherDirs = Storage::disk('public')->allFiles($notLike->path);
            foreach ($listFilesInOtherDirs as $fileOtherDir) {
                $fileCounter = $fileCounter + 1;
                $contentOtherFile = Storage::disk('public')->get($fileOtherDir);
                $levenshteinDistanceTotal = $levenshteinDistanceTotal + levenshtein($contentSelectedFile, $contentOtherFile);
            }
        }
        $sameContent = $levenshteinDistanceTotal / $fileCounter;

        return view('copy-file', [
                 'fileOriginalPath' => $fileOriginalPath,
                 'rootPath' => $rootPath,
                 'sameRoute' => $sameRouteCounter,
                 'sameCotent' => $sameContent
             ]
         );
    }
}
