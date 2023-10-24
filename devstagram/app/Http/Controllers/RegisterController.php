<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function crear(){
        return view('auth.register');
    }
    public function store(Request $request){
        $request->request->add(["username"=>str::slug($request->username)]);
        $this->validate($request,[
            "name"=>"required|min:3|max:50|regex:/^[\pL\s\-]+$/u",
            "username"=>"required|unique:users",
            "email"=>"required||unique:users|email",
            "password"=>"required|confirmed|min:3",   
        ]);

        User::create([
            'name'=>$request->name,
            "username"=>str::slug($request->username),
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        auth()->attempt($request->only('email','password'));

        return redirect()->route("post.index");
    }
}
