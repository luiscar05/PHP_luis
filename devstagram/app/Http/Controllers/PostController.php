<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');  
    }
    public function index($user){
        return view('dashboard');
        dd(auth()->user());
    }
}
