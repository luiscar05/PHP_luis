<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function crear(){
        return view('auth.register');
    }
    public function store(Request $request){
        $this->validate($request,[
            "nombre"=>"required|min:3|max:50|regex:/^[\pL\s\-]+$/u",
            "UserName"=>"required|unique:usuarios",
            "email"=>"required||unique:usuarios|email",
            "pasword"=>"required|min:7",
            "password-confirmation"=>"required|min:7|confirmed"
        ]);
    }
}
