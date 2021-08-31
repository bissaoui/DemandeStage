<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    //
    function generateRandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    function upload($file, $path)
    {

        // dd($file->file('inp_img'));
        $imgName =  $file->getClientOriginalName();
        $pieces = explode(".", $imgName);
        $count = count($pieces);
        $newname = time() . '_' . $this->generateRandomString() . '.' . $pieces[$count - 1];
        $upload = $file->storeAs($path, $newname);
        if ($upload) {
            return $newname;
        } else
            return response('is not save in backends ', 440);
    }
}
