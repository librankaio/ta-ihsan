<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MdEncryptController extends Controller
{
    public static function md5Encrypt($str){
        $hash = md5( $str );
        return $hash;
    }
}
