<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class RegistationController extends Controller
{

    public function index(){
        return view('form');
    }
    public function ragister(Request $request){
        
        $request->validate(
            [
                "name" => 'Required',
                "email" => 'Required|email',
                'password' => 'Required|confirmed',
                "password_confirmation" => 'Required'
            ]
        );
        echo "<pre>";
        print_r($request->all());
    }
}
