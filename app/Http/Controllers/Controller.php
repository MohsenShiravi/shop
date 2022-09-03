<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadFile($file , $path)
    {
        $FileName=time() . '_' .$file->getClientOriginalName();
        $file->storeAs($path , $FileName);
        return new File([
            'name'=>$FileName,
            'path'=>$path,
            'size'=>$file->getSize(),
            'mime_type'=>$file->getMimeType(),
        ]);
    }
}
