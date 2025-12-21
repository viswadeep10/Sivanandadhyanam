<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    function storeBase64($imageBase64)

    {

        list($type, $imageBase64) = explode(';', $imageBase64);

        list(, $imageBase64)      = explode(',', $imageBase64);

        $imageBase64 = base64_decode($imageBase64);

        $imageName = time() . '.png';

        $path = public_path() . "/uploads/" . $imageName;

        file_put_contents($path, $imageBase64);

        return $imageName;
    }

    function removeFile($path)
    {
        if (file_exists($path)) {
            unlink($path);
        }

    }
}
