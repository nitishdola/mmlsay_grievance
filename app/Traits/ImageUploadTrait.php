<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Storage;

trait ImageUploadTrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function imageUpload($file, $directory = 'images') {
        //dd($file);
        $photoname = uniqid().md5(time()).'.'. $file->getClientOriginalExtension();

        $file->move(public_path($directory), $photoname);

        //$file->move(public_path().$directory, $photoname);
        return $directory.'/'.$photoname;

    }

}