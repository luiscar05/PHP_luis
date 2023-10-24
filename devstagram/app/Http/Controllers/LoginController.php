<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function store(Request $request)
{
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (!auth()->attempt($request->only('email', 'password'))) {
        return back()->with('message', 'Credenciales Incorrectas');
    }

    return redirect()->route('post.index'); // Reemplaza 'ruta_correcta' con la ruta a donde quieres redirigir después de la autenticación exitosa.
}

}
