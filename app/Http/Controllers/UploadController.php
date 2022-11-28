<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request){
       
        $file_name = time() . "-SS." . $request -> file("File")->getClientOriginalExtension();
        echo $request -> file("File")->storeAs('uploadedImage' , $file_name);
    }
}
