<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Storage;

trait VideoUploadTrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function videoUpload($file, $directory = 'videos') {
        $videoname = uniqid().md5(time()).'.'. $file->getClientOriginalExtension();
        $file->move(public_path($directory), $videoname);
        return $directory.'/'.$videoname;
    }

}