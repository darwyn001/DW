<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CopyFile extends Controller
{
    public function index($fileInfo)
    {
        $ar = explode("-", $fileInfo);

        $rootPath = $ar[0];
        $fileName = $ar[count($ar) - 1];
        $fileOriginalPath = "";
        $sameRouteCounter = 0;

        foreach ($ar as $item) {
            $fileOriginalPath = $fileOriginalPath . "/" . $item;
        }

        $selectNotLike = "select path from upload_files where path not like '" . $rootPath . "';";
        $resultNotLike = DB::select($selectNotLike);

        $orf = str_replace("/".$rootPath, "", $fileOriginalPath);
        foreach ($resultNotLike as $notLike) {
            $listFilesInOtherDirs = Storage::disk('public')->allFiles($notLike->path);
            foreach ($listFilesInOtherDirs as $fileOtherDir) {
                $fop = str_replace($notLike->path, "", $fileOtherDir);
                if($fop == $orf)
                    $sameRouteCounter=1+$sameRouteCounter;
            }
        }
        $sameContent = "0%";

        return view('copy-file', [
                'fileOriginalPath' => $fileOriginalPath,
                'rootPath' => $rootPath,
                'sameRoute' => $sameRouteCounter,
                'sameCotent' => $sameContent
            ]
        );
    }
}
